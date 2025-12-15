<?php
// app/Services/InstagramService.php
namespace App\Domain\Services;

class InstagramService {
    private $api_key;

    public function __construct () {
        $this -> api_key = $_ENV['INSTAGRAM_API_KEY'] ??
            getenv('INSTAGRAM_API_KEY') ??
            "d013a2195cmsh6a1d9dd567e72e2p1f1a31jsn5d05f36901d7";
    }

    public function getPosts (string $username = 'sportsdecombats', int $count = 40): array {
        $postData = http_build_query([
            'url' => "https://instagram-scraper-stable-api.p.rapidapi.com/get_ig_user_posts.php/",
            'count' => $count
        ]);

        $headers = [
            'x-rapidapi-host' => 'instagram-scraper-stable-api.p.rapidapi.com',
            "x-rapidapi-key: {$this->api_key}",
            "Content-Type' => 'application/x-www-form-urlencoded",
        ];

        $context = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => implode("\r\n", $headers),
                'content' => $postData,
                'timeout' => 30,
                'ignore_errors' => true
            ],
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false
            ]
        ]);

        $response = @file_get_contents(
            'https://instagram-scraper-stable-api.p.rapidapi.com/get_ig_user_posts.php',
            false,
//            http_negotiate_content_type("application/x-www-form-urlencoded"),
            $context
        );

        if ($response === false) {
            // Check if allow_url_fopen is enabled
            if (!ini_get('allow_url_fopen')) {
                throw new \Exception('allow_url_fopen is disabled. Enable it or install an HTTP Client.');
            }
            throw new \Exception('Failed to fetch Instagram data try again :(((((');
        }

        $data = json_decode($response, true);
        return $this -> processPosts($data);
    }

    private function processPosts(array $apiData): array {
        $posts = [];

        if (!isset($apiData['data'])) {
            return $posts;
        }

        foreach ($apiData['data'] as $post) {
            $posts[] = [
                'feed_id' => $post['id'] ?? uniqid(),
                'post_image_url' => $post['image_url'] ?? $post['thumbnail_url'] ?? null,
                'post_title' => $this->createTitle($post['caption'] ?? ''),
                'hashtags' => $this->extractHashtags($post['caption'] ?? ''),
                'post_text' => $this->cleanText($post['caption'] ?? ''),
                'post_url' => $post['permalink'] ?? null,
                'timestamp' => $post['timestamp'] ?? time()
            ];
        }

        return $posts;
    }

    private function createTitle(string $caption): string {
        $clean = strip_tags($caption);
        $clean = trim(preg_replace('/\s+/', ' ', $clean));
        return substr($clean, 0, 60) ?: 'Instagram Post';
    }

    private function extractHashtags(string $caption): array {
        preg_match_all('/#(\w+)/', $caption, $matches);
        return $matches[1] ?? [];
    }

    private function cleanText(string $text): string {
        $clean = strip_tags($text);
        $clean = preg_replace('/https?:\/\/\S+/', '', $clean);
        return trim($clean);
    }
}
