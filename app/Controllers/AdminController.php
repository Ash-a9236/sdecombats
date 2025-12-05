<?php

declare(strict_types = 1);

namespace App\Controllers;

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AdminController extends BaseController {
    public function __construct(Container $container) {
        parent::__construct($container);
    }

    public function dashboard(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Admin Dashboard',
            'section' => 'dashboard',
        ];
        return $this->render($response, 'login-protected/admin-dashboard.php', $data);
    }

    public function updateEmployeeInfo(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Update Employee Information',
            'section' => 'update-employee-info',
        ];
        return $this->render($response, 'login-protected/admin-dashboard.php', $data);
    }

    public function employees(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'All Employees',
            'section' => 'employees',
        ];
        return $this->render($response, 'login-protected/admin-dashboard.php', $data);
    }

    public function addEmployee(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Add Employee',
            'section' => 'add-employee',
        ];
        return $this->render($response, 'login-protected/admin-dashboard.php', $data);
    }

    public function removeEmployee(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Remove Employee',
            'section' => 'remove-employee',
        ];
        return $this->render($response, 'login-protected/admin-dashboard.php', $data);
    }

    public function displayActivities(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Activities',
            'section' => 'activities',
        ];
        return $this->render($response, 'login-protected/admin-dashboard.php', $data);
    }

    public function addActivity(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Add Activity',
            'section' => 'add-activity',
        ];
        return $this->render($response, 'login-protected/admin-dashboard.php', $data);
    }

    public function updateActivity(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Update Activity',
            'section' => 'update-activity',
        ];
        return $this->render($response, 'login-protected/admin-dashboard.php', $data);
    }

    public function removeActivity(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Remove Activity',
            'section' => 'remove-activity',
        ];
        return $this->render($response, 'login-protected/admin-dashboard.php', $data);
    }

    public function displayPackages(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Packages',
            'section' => 'packages',
        ];
        return $this->render($response, 'login-protected/admin-dashboard.php', $data);
    }

    public function addPackage(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Add Package',
            'section' => 'add-package',
        ];
        return $this->render($response, 'login-protected/admin-dashboard.php', $data);
    }

    public function updatePackage(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Update Package',
            'section' => 'update-package',
        ];
        return $this->render($response, 'login-protected/admin-dashboard.php', $data);
    }

    public function removePackage(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Remove Package',
            'section' => 'remove-package',
        ];
        return $this->render($response, 'login-protected/admin-dashboard.php', $data);
    }
}
