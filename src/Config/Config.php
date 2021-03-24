<?php

namespace arifszn\RedditImageFetcher\Config;

use Exception;

class Config
{
    /**
     * Default meme subreddit
     * 
     * @var string[]
     */
    private $memeSubreddit = [
        'memes',
        'AdviceAnimals',
        'AdviceAnimals+funny+memes',
        'funny',
        'PrequelMemes',
        'SequelMemes',
        'MemeEconomy',
        'ComedyCemetery',
        'dankmemes',
        'terriblefacebookmemes',
        'shittyadviceanimals',
        'wholesomememes',
        'me_irl',
        '2meirl4meirl',
        'i_irl',
        'meirl',
        'BikiniBottomTwitter',
        'trippinthroughtime',
        'boottoobig',
        'HistoryMemes',
        'OTMemes',
        'starterpacks',
        'gifs',
        'rickandmorty',
        'FellowKids',
        'Memes_Of_The_Dank',
        'raimimemes',
        'comedyhomicide',
        'lotrmemes',
        'freefolk',
        'GameOfThronesMemes',
        'howyoudoin',
        'HolUp',
        'meme',
        'memeswithoutmods',
        'dankmeme',
        'suicidebywords',
        'puns',
        'PerfectTiming'
    ];

    /**
     * Default wallpaper subreddit
     * 
     * @var string[]
     */
    private $wallpaperSubreddit = [
        'wallpaper',
        'wallpapers',
        'iWallpaper',
        'earthporn',
        'SkyPorn',
        'Beachporn',
        'multiwall',
        'ImaginaryStarscapes',
        'ImaginaryLandscapes',
        'ImaginaryFuturism',
        'ExposurePorn',
        'phonewallpapers',
        'MobileWallpaper',
        'iphonewallpapers',
        'iphonexwallpapers',
        'ImaginaryBestOf',
        'ReasonableFantasy',
        'BirdsForScale',
        'SympatheticMonsters',
        'EpicMounts',
        'ImaginaryBehemoths',
        'mtgporn',
        'ImaginaryLeviathans',
        'ImaginaryColorscapes',
        'ImaginaryCityscapes',
        'ImaginaryMindscapes',
        'Cyberpunk',
        'ImaginaryCyberpunk',
        'ImaginaryFeels',
        'ImaginaryTechnology',
        'wallpaperengine'
    ];

    /**
     * Default search type
     * 
     * @var string[]
     */
    private $searchType = [
        'hot',
        'top',
        'rising'
    ];

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
     * Get default meme subreddit library
     * 
     * @return string[] 
     */
    public function getMemeSubReddit()
    {
        return $this->memeSubreddit;
    }

    /**
     * Get default meme subreddit library
     * 
     * @return string[] 
     */
    public function getWallpaperSubReddit()
    {
        return $this->wallpaperSubreddit;
    }

    /**
     * Get subreddit search type
     * 
     * @return string[] 
     */
    public function getSearchType()
    {
        return $this->searchType;
    }
}
