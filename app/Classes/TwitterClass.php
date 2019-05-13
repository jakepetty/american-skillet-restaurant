<?php
namespace App\Classes;

use \Cache;

class TwitterClass
{
    public static function feed($usrname, $limit)
    {
        return self::parse($usrname, $limit);
    }
    private static function parse($username, $limit)
    {
        if (($tweets = Cache::get('tweets', [])) === []) {
            $text = @file_get_contents(sprintf('https://twitter.com/i/search/timeline?q=%s', $username));
            if ($text) {
                $json = json_decode($text);

                $doc = new \DomDocument();
                $doc->loadHTML($json->items_html);
                $path = new \DomXPath($doc);
                $messages = $path->query("//*[@class='content']");
                for ($i = 0; $i < (($messages->count() > $limit) ? $limit : $messages->count()); $i++) {
                    $tweet = $messages->item($i);
                    $text = trim($path->query("./div[@class='js-tweet-text-container']", $tweet)->item(0)->nodeValue);
                    $date = trim($path->query("./div/small[@class='time']", $tweet)->item(0)->nodeValue);
                    $tweets[] = compact('date', 'text');
                }
            }
            Cache::put('tweets', $tweets);
        }
        return $tweets;
    }
}
