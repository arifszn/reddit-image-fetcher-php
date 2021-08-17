<?php

namespace arifszn\RedditImageFetcher;

require_once('Utils.php');

use arifszn\RedditImageFetcher\Config\Config;
use arifszn\RedditImageFetcher\Utils;
use Exception;

class RedditImageFetcher
{
    /**
     * Utility class
     *
     * @var Utils
     */
    private $utils;

    /**
     * Config class
     *
     * @var Config
     */
    private $config;

    /**
     * Search type library
     *
     * @var string[]
     */
    private $searchType;

    /**
     * Max retry limit to fetch posts
     *
     * @var int
     */
    private $maxRetryLimit = 30;

    /**
     * Create a new instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->utils = new Utils();
        $this->config = new Config();
        $this->searchType = $this->config->getSearchType();
    }

    /**
     * Fetch images
     *
     * @param string $type 'meme' | 'wallpaper' | 'custom'
     * @param int $total number of images to get
     * @param array $subreddit Custom subreddit libray
     * @param array $addSubreddit Add subreddits to subreddit library
     * @param array $removeSubreddit Remove subreddits from subreddit library
     * @return array|exception returns array when success, exception when error
     * @throws Exception
     */
    public function fetch(string $type = 'meme', int $total = 1, array $subreddit = [], array $addSubreddit = [], array $removeSubreddit = [])
    {
        try {
            $searchLimit = 75;
            $subredditLibrary = $this->config->getMemeSubReddit();

            if ($type === 'wallpaper') {
                $subredditLibrary = $this->config->getWallpaperSubReddit();
            } elseif ($type === 'custom') {
                $subredditLibrary = [];
            }
            
            if ($total > 50) {
                throw new Exception('max value of total is 50');
            }
                
            if ($total < 1) {
                throw new Exception('min value of total is 1');
            }
            
            $subredditLibrary = array_merge($subredditLibrary, $addSubreddit);

            foreach ($removeSubreddit as $each) {
                $index = array_search($each, $subredditLibrary);

                if ($index === true) {
                    unset($subredditLibrary[$index]);
                }
            }

            if ($type === 'custom') {
                $subredditLibrary = $subreddit;
            }
            
            if (!count($subredditLibrary)) {
                return [];
            }

            return $this->getRandomPosts($total, $type, $subredditLibrary, $searchLimit);
        } catch (\Throwable $th) {
            return [];
        }
    }

    /**
     * Get n random posts where n = limit
     *
     * @param int $limit
     * @param string $type
     * @param array $subReddit
     * @param int $searchLimit
     * @param int $counter
     * @param array $fetchedPost
     * @return mixed
     * @throws Exception
     */
    private function getRandomPosts(int $limit, string $type, array $subReddit, int $searchLimit, int $counter = 0, array $fetchedPost = [])
    {
        // retry limit check
        $counter++;

        if ($counter == $this->maxRetryLimit) {
            throw new Exception('Maximum retry limit exceeded');
        }
            
        try {
            // get request
            $rand = array_rand($subReddit, 1);
            $rand2 = array_rand($this->searchType, 1);
            
            $url = 'https://api.reddit.com/r/'.$subReddit[$rand].'/'.$this->searchType[$rand2].'?limit='.$searchLimit;

            $response = $this->utils->getRequest($url);

            if (!isset($response->data->children)) {
                return $this->getRandomPosts($limit, $type, $subReddit, $searchLimit, $counter);
            }
        } catch (\Throwable $th) {
            // retry if error occurs
            return $this->getRandomPosts($limit, $type, $subReddit, $searchLimit, $counter);
        }
        
        // push image only post to post array
        $postArray = $response->data->children;

        foreach ($postArray as $post) {
            $includeGif = true;

            if ($type === 'wallpaper') {
                $includeGif = false;
            }

            if (isset($post->data->url) && is_string($post->data->url) && $this->utils->isImageUrl($post->data->url, $includeGif)) {
                array_push($fetchedPost, $this->utils->formatPost($post->data, $type));
            }
        }
        
        // if limit is not reached, retry with already fetched data

        if (count($fetchedPost) < $limit) {
            $fetchedPost = $this->getRandomPosts($limit, $type, $subReddit, $searchLimit, $counter, $fetchedPost);
        }
        
        shuffle($fetchedPost);
        $rand_keys = array_rand($fetchedPost, $limit);
        $resultArray = [];
        
        if ($limit === 1) {
            array_push($resultArray, $fetchedPost[$rand_keys]);
        } else {
            foreach ($rand_keys as $key => $index) {
                array_push($resultArray, $fetchedPost[$index]);
            }
        }

        return $resultArray;
    }
}
