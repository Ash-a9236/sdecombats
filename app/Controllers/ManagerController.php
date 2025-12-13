<?php

declare(strict_types = 1);

namespace App\Controllers;

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ManagerController extends BaseController {
    public function __construct(Container $container) {
        parent::__construct($container);
    }

    public function dashboard(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Manager Dashboard',
            'section' => 'dashboard',
        ];
        return $this->render($response, 'login-protected/manager-dashboard.php', $data);
    }

    public function updateEmployeeInfo(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Update Employee Information',
            'section' => 'update-employee-info',
        ];
        return $this->render($response, 'login-protected/manager-dashboard.php', $data);
    }

    public function employees(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Employees',
            'section' => 'employees',
        ];
        return $this->render($response, 'login-protected/manager-dashboard.php', $data);
    }

    public function addEmployee(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Add Employee',
            'section' => 'add-employee',
        ];
        return $this->render($response, 'login-protected/manager-dashboard.php', $data);
    }

    public function removeEmployee(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Remove Employee',
            'section' => 'remove-employee',
        ];
        return $this->render($response, 'login-protected/manager-dashboard.php', $data);
    }
}
