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
     * Constructor
     * 
     * @return void 
     */
    public function __construct()
    {
        $this->utils      = new Utils();
        $this->config     = new Config();
        $this->searchType = $this->config->getSearchType();
    }

    /**
     * Get memes
     * 
     * @param int $total | number of memes to get
     * @param array $addSubreddit | add subreddits to existing library
     * @param array $removeSubreddit | remove subreddits from existing library
     * @param int $searchLimit | number of posts to search
     * @param bool $removeAllSubreddit | remove all subreddits from existing library
     * @return array|exception | returns array when success, exception when error
     * @throws Exception
     */
    public function getMemes(int $total = 1, array $addSubreddit = [], array $removeSubreddit = [], int $searchLimit = 100, bool $removeAllSubreddit = false)
    {
        try {
            $memeSubReddit  = $this->config->getMemeSubReddit();
            
            if ($total > 50)
                throw new Exception('Get limit exceeded');
            if ($total < 1)
                throw new Exception('Get limit should be greater than 0');
            if ($searchLimit > 100) 
                throw new Exception('Search limit exceeded');
            if ($searchLimit < 1)
                throw new Exception('Search limit should be greater than 0');
            if ($removeAllSubreddit)
                $memeSubReddit = [];

            $memeSubReddit = array_merge($memeSubReddit, $addSubreddit);

            foreach ($removeSubreddit as $key => $subreddit) {
                $index = array_search($subreddit, $memeSubReddit);
                if ($index === true)
                    unset($memeSubReddit[$index]);
            }
            
            if (!count($memeSubReddit)) {
                throw new Exception('Subreddit library is empty');
            }
            return $this->getRandomPosts($total, 'meme', $memeSubReddit, $searchLimit);
        } catch (\Throwable $th) {
            throw new Exception($th);
        }
    }

    /**
     * Get wallpapers
     * 
     * @param int $total | number of wallpapers to get
     * @param array $addSubreddit | add subreddits to existing library
     * @param array $removeSubreddit | remove subreddits from existing library
     * @param int $searchLimit | number of posts to search
     * @param bool $removeAllSubreddit | remove all subreddits from existing library
     * @return array|exception | returns array when success, exception when error
     * @throws Exception
     */
    public function getWallpapers(int $total = 1, array $addSubreddit = [], array $removeSubreddit = [], int $searchLimit = 100, bool $removeAllSubreddit = false)
    {
        try {
            $wallpaperSubReddit  = $this->config->getWallpaperSubReddit();
            
            if ($total > 50)
                throw new Exception('Get limit exceeded');
            if ($total < 1)
                throw new Exception('Get limit should be greater than 0');
            if ($searchLimit > 100) 
                throw new Exception('Search limit exceeded');
            if ($searchLimit < 1)
                throw new Exception('Search limit should be greater than 0');
            if ($removeAllSubreddit)
                $wallpaperSubReddit = [];

            $wallpaperSubReddit = array_merge($wallpaperSubReddit, $addSubreddit);

            foreach ($removeSubreddit as $key => $subreddit) {
                $index = array_search($subreddit, $wallpaperSubReddit);
                if ($index === true)
                    unset($wallpaperSubReddit[$index]);
            }
            if (!count($wallpaperSubReddit)) {
                throw new Exception('Subreddit library is empty');
            }
            return $this->getRandomPosts($total, 'wallpaper', $wallpaperSubReddit, $searchLimit);
        } catch (\Throwable $th) {
            throw new Exception($th);
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
        //retry limit check
        $counter++;
        if ($counter == $this->maxRetryLimit)
            throw new Exception('Maximum retry limit exceeded');
        try {
            //get request
            $rand  = array_rand($subReddit, 1);
            $rand2 = array_rand($this->searchType, 1);
            
            $url = 'https://api.reddit.com/r/' . $subReddit[$rand] . '/' . $this->searchType[$rand2] . '?limit=' . $searchLimit;

            $response = $this->utils->getRequest($url);

            if (!isset($response->data->children))
                return $this->getRandomPosts($limit, $type, $subReddit, $searchLimit, $counter);
        } catch (\Throwable $th) {
            //retry if error occurs
            return $this->getRandomPosts($limit, $type, $subReddit, $searchLimit, $counter);
        }
        
        //push image only post to post array
        $postArray = $response->data->children;
        foreach ($postArray as $key => $post) {
            $includeGif = true;
            if ($type === 'wallpaper')
                $includeGif = false;
            if (isset($post->data->url) && is_string($post->data->url) && $this->utils->isImageUrl($post->data->url, $includeGif))
                array_push($fetchedPost, $this->utils->formatPost($post->data));
        }
        
        //if limit is not reached, retry with already fetched data 
        if (count($fetchedPost) < $limit)
            $fetchedPost = $this->getRandomPosts($limit, $type, $subReddit, $searchLimit, $counter, $fetchedPost);
        
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