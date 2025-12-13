<?php

declare(strict_types = 1);

namespace App\Controllers;

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class EmployeeController extends BaseController {
    public function __construct(Container $container) {
        parent::__construct($container);
    }

    public function dashboard(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Employee Dashboard',
            'section' => 'dashboard',
        ];
        return $this->render($response, 'login-protected/employee-dashboard.php', $data);
    }

    public function makeReservationForCustomer(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Make Reservation for Customer',
            'section' => 'make-reservation',
        ];
        return $this->render($response, 'login-protected/employee-dashboard.php', $data);
    }

    public function updateReservationForCustomer(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Update Reservation for Customer',
            'section' => 'update-reservation',
        ];
        return $this->render($response, 'login-protected/employee-dashboard.php', $data);
    }

    public function deleteReservationForCustomer(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Delete Reservation for Customer',
            'section' => 'delete-reservation',
        ];
        return $this->render($response, 'login-protected/employee-dashboard.php', $data);
    }

    public function displayReservations(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'All Reservations',
            'section' => 'reservations',
        ];
        return $this->render($response, 'login-protected/employee-dashboard.php', $data);
    }

    public function displayMemberships(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Memberships',
            'section' => 'memberships',
        ];
        return $this->render($response, 'login-protected/employee-dashboard.php', $data);
    }

    public function updateUserInfo(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Update User Information',
            'section' => 'update-user-info',
        ];
        return $this->render($response, 'login-protected/employee-dashboard.php', $data);
    }

    public function updateInfo(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Update My Information',
            'section' => 'update-info',
        ];
        return $this->render($response, 'login-protected/employee-dashboard.php', $data);
    }
}
