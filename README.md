<p align="center">
    <a href="https://arifszn.github.io/reddit-image-fetcher-php" target="_blank">
        <img src="https://arifszn.github.io/reddit-image-fetcher-php/img/logo/logo.png" alt="Reddit Image Fetcher" title="Reddit Image Fetcher" width="80">
    </a>
</p>

<h1 align="center">Reddit Image Fetcher</h1>
<p align="center">A PHP package for fetching reddit images, memes, wallpapers and more.</p>
<p align="center"><a href="https://arifszn.github.io/reddit-image-fetcher-php">https://arifszn.github.io/reddit-image-fetcher-php</a></p>

<p align="center">
    <a href="https://packagist.org/packages/arifszn/reddit-image-fetcher"><img src="https://img.shields.io/packagist/v/arifszn/reddit-image-fetcher"/></a>
    <a href="https://github.com/arifszn/reddit-image-fetcher-php/blob/master/LICENSE"><img src="https://img.shields.io/github/license/arifszn/reddit-image-fetcher-php"/></a>
    <a href="https://arifszn.github.io/"><img src="https://img.shields.io/badge/author-arifszn-blueviolet" alt="Author arifszn"/></a>
</p>

<br/>

<p align="center">
  <a href="https://arifszn.github.io/reddit-image-fetcher-php">
    <img src="https://arifszn.github.io/reddit-image-fetcher-php/img/preview.gif" width="60%" alt="Preview"/>
  </a>
  <br/>
  <a href="#arifszn"><img src="https://arifszn.github.io/assets/img/drop-shadow.png" width="60%" alt="Shadow"/></a>
</p>

- Bulk images
- Bulk memes
- Bulk wallpapers
- Customizable
- Lightweight
- Zero dependency

JavaScript version: <a href="https://github.com/arifszn/reddit-image-fetcher">Reddit Image Fetcher</a>

## Table of Contents

* [Resources](#resources)
* [Installation](#installation)
* [Usage](#usage)
* [Result](#result)
* [Options](#options)
* [Contribute](#contribute)
* [Thank You](#thank-you)
* [Support](#support)
* [License](#license)

## Resources

- [Demo](https://memedb.netlify.app)
- [Documentation](https://arifszn.github.io/reddit-image-fetcher-php)

# Installation

Install via <a href="https://packagist.org/packages/arifszn/reddit-image-fetcher">composer</a>

```
composer require arifszn/reddit-image-fetcher
```

## Usage

Available function:
- fetch()

```php
use arifszn\RedditImageFetcher\RedditImageFetcher;

-------------------
-------------------


$redditImageFetcher = new RedditImageFetcher();
$redditImageFetcher->fetch('meme'); //returns 1 meme
$redditImageFetcher->fetch('wallpaper'); //returns 1 wallpaper


//options
$redditImageFetcher->fetch('wallpaper', 50); //returns 50 wallpapers 
 
$redditImageFetcher->fetch(
    'meme',
    50,
    [],
    ['memes', 'funny'],
    ['dankmemes']
); //returns 50 memes by adding two and removing 1 subreddits


//custom image fetch from given subreddits
$redditImageFetcher->fetch(
    'custom',
    50, 
    ['cats', 'Catswhoyell', 'sleepingcats']
); //returns 50 cat images
```

## Result

The function returns array.

```php
array:2 [▼
  0 => array:10 [▼
    "id" => "hfh51v"
    "type" => "wallpaper"
    "title" => "Illuminated City at Night [1920 x 1200]"
    "postLink" => "https://redd.it/hfh51v"
    "image" => "https://i.redd.it/b6x9i2n830751.jpg"
    "thumbnail" => "https://b.thumbs.redditmedia.com/mLCk8Bh0N4M8hZafHsbAmw8rM7JEEznsT2nRZSo3GsU.jpg"
    "subreddit" => "wallpaper"
    "NSFW" => false
    "spoiler" => false
    "createdUtc" => 1593066557.0
    "upvotes" => 1899
    "upvoteRatio" => 1.0
  ]
  1 => array:10 [▼
    "id" => "h9glhi"
    "type" => "wallpaper"
    "title" => "Missing Home by Just Jaker"
    "postLink" => "https://redd.it/h9glhi"
    "image" => "https://cdnb.artstation.com/p/assets/images/images/027/020/665/large/just-jaker-galax-noise.jpg"
    "thumbnail" => "https://b.thumbs.redditmedia.com/4utBLNbsIDDLl46z494PCRkDhmAnapQq9FL7l-07aJo.jpg"
    "subreddit" => "ImaginaryFuturism"
    "NSFW" => false
    "spoiler" => false
    "createdUtc" => 1592228591.0,
    "upvotes" => 462
    "upvoteRatio" => 1.0
  ]
]
```

## Options

| Property            |  Type   | Description                                               | Default |
| :-----------        | :---:   | :-------------------------------------                    | :----:  |
| type               | string  | meme, wallpaper or custom image to fetch                         | 'meme'       |
| total               | int  | How many images to get. Max is 50                         | 1       |
| subreddit        | array   | Custom subreddit libray                    |   [ ]   |
| addSubreddit        | array   | Add subreddits to subreddit library                    | [ ]     |
| removeSubreddit     | array   | Remove subreddits from subreddit library               | [ ]     |


## Contribute

To contribute, clone this repo locally and commit your code on a new branch. Feel free to create an issue or make a pull request.


## Thank You

[![Stargazers repo roster for @arifszn/reddit-image-fetcher-php](https://reporoster.com/stars/arifszn/reddit-image-fetcher-php)](https://github.com/arifszn/reddit-image-fetcher-php/stargazers)
[![Forkers repo roster for @arifszn/reddit-image-fetcher-php](https://reporoster.com/forks/arifszn/reddit-image-fetcher-php)](https://github.com/arifszn/reddit-image-fetcher-php/network/members)


## Support

Show your ❤️ and support by giving a ⭐ on <a href="https://github.com/arifszn/reddit-image-fetcher-php">Github</a>.

## License

<p>MIT Licensed.</p>
<p>Copyright © <a href="https://arifszn.github.io">MD. Ariful Alam</a> 2021.</p>
