<?php
// app/Controllers/BlogController.php
namespace App\Controllers;

use App\Helpers\FlashMessage;
use App\Domain\Services\InstagramService;
use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class BlogController extends BaseController {
    public function __construct (Container $container, private InstagramService $instagram_service) {
        parent ::__construct($container);
    }

    public function index (Request $request, Response $response): Response {
        try {
            $posts = $this -> instagram_service -> getPosts('sportsdecombats', 40);

            return $this -> render($response, 'pages/blog.php', [
                'posts' => $posts,
                'title' => 'Instagram Blog'
            ]);
        } catch (\Exception $e) {
            // Log error and show friendly message
            error_log($e -> getMessage());
            return $this -> render($response, 'pages/blog.php', [
                'posts' => $posts,
                'title' => 'Instagram Blog'
            ]);
        }
    }
}