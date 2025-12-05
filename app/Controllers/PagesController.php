<?php

declare(strict_types = 1);

namespace App\Controllers;

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PagesController extends BaseController {
    public function __construct(Container $container) {
        parent::__construct($container);
    }

    public function index(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Home',
            'message' => 'Welcome to the home page',
        ];
        return $this->render($response, 'homeView.php', $data);
    }

    public function error(Request $request, Response $response, array $args): Response {
        return $this->render($response, 'errorView.php');
    }

    public function displayActivities(Request $request, Response $response): Response {
        $data['data'] = [
            'title' => 'Activities',
        ];
        return $this->render($response, 'pages/activities.php', $data);
    }

    public function archery(Request $request, Response $response): Response {
        $data['data'] = [
            'title' => 'Archery',
        ];
        return $this->render($response, 'pages/archery.php', $data);
    }

    public function bigGroups(Request $request, Response $response): Response {
        $data['data'] = [
            'title' => 'Big Groups',
        ];
        return $this->render($response, 'pages/big-groups.php', $data);
    }

    public function birthdays(Request $request, Response $response): Response {
        $data['data'] = [
            'title' => 'Birthdays',
        ];
        return $this->render($response, 'pages/birthdays.php', $data);
    }

    public function blog(Request $request, Response $response): Response {
        $data['data'] = [
            'title' => 'Blog',
        ];
        return $this->render($response, 'pages/blog.php', $data);
    }

    public function outsideEvents(Request $request, Response $response): Response {
        $data['data'] = [
            'title' => 'Outside Events',
        ];
        return $this->render($response, 'pages/outside-events.php', $data);
    }

    public function smallGroups(Request $request, Response $response): Response {
        $data['data'] = [
            'title' => 'Small Groups',
        ];
        return $this->render($response, 'pages/small-groups.php', $data);
    }

    public function showLoginForm(Request $request, Response $response): Response {
        $data['data'] = [
            'title' => 'Sign Up',
        ];
        return $this->render($response, 'pages/signup.php', $data);
    }

    public function processSignup(Request $request, Response $response): Response {
        // Process registration logic here
        return $response->withHeader('Location', '/login')->withStatus(302);
    }

    public function showSigninForm(Request $request, Response $response): Response {
        $data['data'] = [
            'title' => 'Login',
        ];
        return $this->render($response, 'pages/login.php', $data);
    }

    public function processSignin(Request $request, Response $response): Response {
        // Process login logic here
        // After successful login, redirect based on role
        return $response->withHeader('Location', '/dashboard/user')->withStatus(302);
    }

    public function logout(Request $request, Response $response): Response {
        // Clear session/logout logic here
        return $response->withHeader('Location', '/')->withStatus(302);
    }
}
