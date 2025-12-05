<?php

declare(strict_types = 1);

namespace App\Controllers;

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController extends BaseController {
    public function __construct(Container $container) {
        parent::__construct($container);
    }

    public function dashboard(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Customer Dashboard',
            'section' => 'dashboard',
        ];
        return $this->render($response, 'login-protected/customer-dashboard.php', $data);
    }

    public function makeReservation(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Make Reservation',
            'section' => 'make-reservation',
        ];
        return $this->render($response, 'login-protected/customer-dashboard.php', $data);
    }

    public function displayReservations(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'My Reservations',
            'section' => 'reservations',
        ];
        return $this->render($response, 'login-protected/customer-dashboard.php', $data);
    }

    public function membership(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Membership',
            'section' => 'membership',
        ];
        return $this->render($response, 'login-protected/customer-dashboard.php', $data);
    }

    public function updateInfo(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Update Information',
            'section' => 'update-info',
        ];
        return $this->render($response, 'login-protected/customer-dashboard.php', $data);
    }
}
