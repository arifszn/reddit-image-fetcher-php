<?php 

namespace arifszn\RedditImageFetcher;

use Exception;

class Utils
{
    /**
     * Constructor
     * 
     * @return void 
     */
    public function __construct()
    {
        //constructor
    }

    /**
     * Get random number from min and max range. Min is inclusive, Max is exclusive
     * 
     * @param int $min 
     * @param int $max 
     * @return int 
     */
    public function randomNumber(int $min, int $max)
    {
        return mt_rand($min, $max - 1);
    }

    /**
     * Check if url is image url
     *
     * @param string $url
     * @param boolean $includeGif
     * @return boolean
     */
    public function isImageUrl(string $url, bool $includeGif = true)
    {
        if ($includeGif) {
            if (strpos($url, 'gifv') === false) {
                if (strpos($url, 'jpg') !== false)
                    return true;
                elseif (strpos($url, 'png') !== false)
                    return true;
                elseif (strpos($url, 'gif') !== false)
                    return true;
                elseif (strpos($url, 'jpeg') !== false)
                    return true;
            }
        } else {
            if (strpos($url, 'gifv') === false) {
                if (strpos($url, 'jpg') !== false)
                    return true;
                elseif (strpos($url, 'png') !== false)
                    return true;
                elseif (strpos($url, 'jpeg') !== false)
                    return true;
            }
        }
    }

    /**
     * Make a get request
     * 
     * @param string $url 
     * @return mixed 
     * @throws Exception 
     */
    public function getRequest(string $url)
    {
        try {
            $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, $agent);

            $output=curl_exec($ch);
            curl_close($ch);
            $response = json_decode($output);
            return $response;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }


    /**
     * Format the raw post
     * 
     * @param object $post 
     * @param string $type 
     * @return array 
     * @throws Exception 
     */
    public function formatPost(object $post, string $type)
    {
        try {
            return [
                'id'          => isset($post->id) ? $post->id : null,
                'type'        => $type,
                'title'       => isset($post->title) ? $post->title : null,
                'postLink'    => isset($post->id) ? 'https://redd.it/' . $post->id : null,
                'image'       => isset($post->url) ? $post->url : null,
                'thumbnail'   => isset($post->thumbnail) ? $post->thumbnail : null,
                'subreddit'   => isset($post->subreddit) ? $post->subreddit : null,
                'NSFW'        => isset($post->over_18) ? $post->over_18 : null,
                'spoiler'     => isset($post->spoiler) ? $post->spoiler : null,
                'createdUtc'  => isset($post->created_utc) ? $post->created_utc : null,
                'upvotes'     => isset($post->upvotes) ? $post->upvotes : null,
                'downvotes'   => isset($post->downvotes) ? $post->downvotes : null,
                'upvoteRatio' => isset($post->upvoteRatio) ? $post->upvoteRatio : null,
            ];
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }
}