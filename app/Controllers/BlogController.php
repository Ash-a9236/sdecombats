<?php

namespace App\Controllers;

use App\Models\BlogM;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class BlogController {
    private $instagramService;
    private $view;

    public function __construct ($container) {
        // Initialize Instagram service
        $this -> blog = new BlogM();

        // Get view from container (Slim MVC structure)
        $this -> view = $container -> get('view');
    }

    public function index (Request $request, Response $response, array $args) {
        try {
            // Get posts from Instagram service
            $posts = $this -> instagramService -> getPosts(12);

            // Prepare data for view
            $blogData = [
                'posts' => $posts,
                'total_posts' => count($posts),
                'last_updated' => date('F j, Y g:i a'),
                'page_title' => 'My Instagram Blog'
            ];

            // Render the view
            return $this -> view -> render($response, 'blog/index.twig', $blogData);

        } catch (\Exception $e) {
            // Log error
            error_log('Instagram feed error: ' . $e -> getMessage());

            // Show error page or fallback content
            return $this -> view -> render($response, 'blog/error.twig', [
                'error' => 'Unable to load blog posts at the moment.',
                'posts' => [] // Empty array so template doesn't break
            ]);
        }
    }

    public function singlePost (Request $request, Response $response, array $args) {
        $postId = $args['id'] ?? null;
        $allPosts = $this -> instagramService -> getPosts(50); // Get more for single view

        $currentPost = null;
        foreach ($allPosts as $post) {
            if ($post['feed_id'] === $postId) {
                $currentPost = $post;
                break;
            }
        }

        if (!$currentPost) {
            return $response -> withStatus(404);
        }

        return $this -> view -> render($response, 'blog/single.twig', [
            'post' => $currentPost,
            'related_posts' => array_slice($allPosts, 0, 3)
        ]);
    }

    public function apiFeed (Request $request, Response $response, array $args) {
        $format = $request -> getQueryParam('format', 'json');
        $limit = $request -> getQueryParam('limit', 12);

        $posts = $this -> instagramService -> getPosts((int)$limit);

        if ($format === 'json') {
            $response -> getBody() -> write(json_encode([
                'success' => true,
                'data' => $posts,
                'count' => count($posts)
            ]));
            return $response -> withHeader('Content-Type', 'application/json');
        }

        // You could add XML or other formats here
        return $response -> withStatus(400);
    }
}