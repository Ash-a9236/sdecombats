<?php

namespace App\Domain\Models;

class BlogM {
    private $rss_blog_url;
    private $cache_timeout = 3600; // keep cache active on server for 1 hour

    public function __construct () {
        $this -> $rss_blog_url = "https://rss.app/feeds/oNEJD9sxon5xD0XP.xml";
    }

    public function getPosts (int $limit) {
        $cache_key = strval($limit) . '_posts';
        $cache = $this -> getCached($cache_key);

        if ($cache !== false) {
            return $cache;
        } else {
            $raw_data = $this -> fetchFeed();
            $posts = $this -> processRawFeed($raw_data, $limit);
            $this -> setCache($cache_key, $posts); //updating the cache to reflect the changes
            return $posts;
        }
    }

    private function fetchFeed () { //TODO UPDATE MASSIVELY
        $context = stream_context_create([
            'http' => [
                'header' => 'User-Agent: Mozilla/5.0 (compatible; YourApp/1.0)'
            ]
        ]);

        $xml_content = @file_get_contents($this -> rssFeedUrl, false, $context);

        if (!$xml_content) {
            throw new \Exception('Failed to fetch Instagram RSS feed');
        }

        return simplexml_load_string($xml_content);
    }

    private function processRawFeed ($xml, $limit) {
        $posts = [];
        $counter = 0;

        foreach ($xml -> channel -> item as $item) {
            if ($counter >= $limit) break;

            $posts[] = $this -> parseItem($item);
            $counter++;
        }

        return $posts;
    }

    private function parseItem ($item) {
        // Extract hashtags from description
        $hashtags = $this -> extractHashtags((string)$item -> description);

        // Extract image URL from content or enclosure
        $imageUrl = $this -> extractImageUrl($item);

        // Clean the post text (remove links, hashtags, etc.)
        $cleanText = $this -> cleanDescription((string)$item -> description);

        return [
            'feed_id' => $this -> generateId((string)$item -> guid),
            'post_image_url' => $imageUrl,
            'post_title' => (string)$item -> title,
            'hashtags' => $hashtags,
            'post_text' => $cleanText,
            'post_url' => (string)$item -> link,
            'publish_date' => date('Y-m-d H:i:s', strtotime((string)$item -> pubDate)),
            'raw_data' => [
                'description' => (string)$item -> description,
                'author' => (string)$item -> author ?? null
            ]
        ];
    }

    private function extractHashtags ($description) {
        preg_match_all('/#(\w+)/', $description, $matches);
        return $matches[1] ?? [];
    }

    private function extractImageUrl ($item) {
        // Try multiple methods to get the image URL

        // Method 1: Check for media:content
        if (isset($item -> children('media', true) -> content)) {
            $attributes = $item -> children('media', true) -> content -> attributes();
            if (isset($attributes['url'])) {
                return (string)$attributes['url'];
            }
        }

        // Method 2: Check enclosure
        if (isset($item -> enclosure)) {
            $attributes = $item -> enclosure -> attributes();
            if (isset($attributes['url']) && strpos($attributes['type'], 'image') !== false) {
                return (string)$attributes['url'];
            }
        }

        // Method 3: Extract from description
        preg_match('/<img[^>]+src="([^">]+)"/', (string)$item -> description, $matches);
        if (!empty($matches[1])) {
            return $matches[1];
        }

        return null; // No image found
    }

    private function cleanDescription ($description) {
        // Remove HTML tags
        $clean = strip_tags($description);

        // Remove URLs
        $clean = preg_replace('/https?:\/\/\S+/', '', $clean);

        // Remove hashtags (they're stored separately)
        $clean = preg_replace('/#\w+/', '', $clean);

        // Trim and clean up whitespace
        $clean = trim(preg_replace('/\s+/', ' ', $clean));

        // Limit length
        if (strlen($clean) > 300) {
            $clean = substr($clean, 0, 297) . '...';
        }

        return $clean;
    }

    private function generateId ($guid) {
        return md5($guid);
    }

    private function getCached ($key) {
        $cacheFile = $this -> getCachePath($key);

        if (file_exists($cacheFile) &&
            time() - filemtime($cacheFile) < $this -> cacheTime) {
            return json_decode(file_get_contents($cacheFile), true);
        }

        return false;
    }

    private function setCache ($key, $data) {
        $cacheFile = $this -> getCachePath($key);
        file_put_contents($cacheFile, json_encode($data));
    }

    private function getCachePath ($key) {
        $cacheDir = __DIR__ . '/../../cache/';

        if (!is_dir($cacheDir)) {
            mkdir($cacheDir, 0755, true);
        }

        return $cacheDir . $key . '.json';
    }

}
