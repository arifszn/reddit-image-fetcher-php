# Reddit Image Fetcher

A PHP package for fetching bulk reddit memes, wallpapers and more.

Features

- Bulk memes
- Bulk wallpapers
- Customizable
- Lightweight
- Zero dependency

Javascript package is available at <a href="https://www.npmjs.com/package/reddit-image-fetcher">NPM</a>.

> <p><strong><a href="https://memewall.netlify.app">Homepage</a></strong></p>

# Installation
Install via <a href="https://packagist.org/packages/arifszn/reddit-image-fetcher">Composer</a>
```
composer require arifszn/reddit-image-fetcher
```

## Usage

Available functions:
- getMemes()
- getWallpapers()

```php
use arifszn\RedditImageFetcher\RedditImageFetcher;

-------------------
-------------------


$redditImageFetcher = new RedditImageFetcher();
$redditImageFetcher->getMemes(); //returns 1 meme
$redditImageFetcher->getWallpapers(); //returns 1 wallpaper


//options
$redditImageFetcher->getWallpapers(50); //returns 50 wallpapers 
 
$redditImageFetcher->getMemes(
    50, 
    ['memes', 'funny'],
    ['dankmemes'],
    100
); //returns 50 memes by filtering


//can be use other than fetching memes and wallpapers
//use as cat image fetcher
$redditImageFetcher->getMemes(
    50, 
    ['cats', 'Catswhoyell', 'sleepingcats'],
    [],
    100,
    true
); //returns 50 cat images
```
## Result

The functions return array.
```php
array:2 [▼
  0 => array:9 [▼
    "id" => "hfh51v"
    "title" => "Illuminated City at Night [1920 x 1200]"
    "postLink" => "https://redd.it/hfh51v"
    "image" => "https://i.redd.it/b6x9i2n830751.jpg"
    "thumbnail" => "https://b.thumbs.redditmedia.com/mLCk8Bh0N4M8hZafHsbAmw8rM7JEEznsT2nRZSo3GsU.jpg"
    "subreddit" => "wallpaper"
    "NSFW" => false
    "spoiler" => false
    "createdUtc" => 1593066557.0
  ]
  1 => array:9 [▼
    "id" => "h9glhi"
    "title" => "Missing Home by Just Jaker"
    "postLink" => "https://redd.it/h9glhi"
    "image" => "https://cdnb.artstation.com/p/assets/images/images/027/020/665/large/just-jaker-galax-noise.jpg"
    "thumbnail" => "https://b.thumbs.redditmedia.com/4utBLNbsIDDLl46z494PCRkDhmAnapQq9FL7l-07aJo.jpg"
    "subreddit" => "ImaginaryFuturism"
    "NSFW" => false
    "spoiler" => false
    "createdUtc" => 1592228591.0
  ]
]
```

## Options

```php
public function getMemes(int $total = 1, array $addSubreddit = [], array $removeSubreddit = [], int $searchLimit = 100, bool $removeAllSubreddit = false)
```


| Property            |  Type   | Description                                     | Default |
| :-----------        | :---:   | :-------------------------------------          | :----:  |
| total                 | int     | How many images to get. Max is 50.              | 1       |
| addSubReddit        | array   | Add subreddits to subreddit library.            | [ ]     |
| removeSubReddit     | array   | Remove subreddits from subreddit library.       | [ ]     |
| searchLimit         | int     | Max reddit posts to search. Max is 100.         | 100     |
| removeAllSubReddit  | boolean | Remove all subreddits from subreddit library.   | false   |

## Demo
<p>See the package in action <a href="https://memewall.netlify.app">Here</a>.</p>

## License

<p>MIT Licensed.</p>
<p>Copyright © <a href="https://arifszn.github.io">MD. Ariful Alam</a> 2020.</p>
