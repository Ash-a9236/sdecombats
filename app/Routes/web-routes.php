<?php

declare(strict_types=1);

/**
 * This file contains the routes for the web application.
 */

use App\Controllers\HomeController;
use App\Controllers\AdminController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Routing\RouteCollectorProxy; // Useful type hint for the group

return static function (App $app): void {


    $app->get('/', [HomeController::class, 'index'])
        ->setName('home.index');

    $app->get('/home', [HomeController::class, 'index'])
        ->setName('home.home');

    //Admin Routes

    $app->group('/admin', function (RouteCollectorProxy $group) {

        $group->get('/dashboard', [AdminController::class, 'index'])
            ->setName('admin.dashboard');

        $group->get('/reservations', [AdminController::class, 'manageReservations'])
            ->setName('admin.reservations');

        $group->get('/reservations/edit/{id}', [\App\Controllers\AdminController::class, 'editReservation'])
            ->setName('admin.reservations.edit');

        $group->post('/reservations/edit/{id}', [\App\Controllers\AdminController::class, 'saveReservation'])
            ->setName('admin.reservations.save');

        $group->post('/reservations/delete/{id}', [\App\Controllers\AdminController::class, 'deleteReservation'])
            ->setName('admin.reservations.delete');

        $group->get('/memberships', [AdminController::class, 'manageMemberships'])
            ->setName('admin.memberships');

        $group->get('/employees', [AdminController::class, 'manageEmployees'])
            ->setName('admin.employees');

        $group->get('/employees/add', [AdminController::class, 'addEmployee'])
            ->setName('admin.employees.add');

        $group->post('/employees/add', [AdminController::class, 'saveEmployee'])
            ->setName('admin.employees.save');

        $group->get('/activities', [AdminController::class, 'manageActivities'])
            ->setName('admin.activities');

        $group->get('/events', [AdminController::class, 'manageEvents'])
            ->setName('admin.events');

        $group->get('/users', [AdminController::class, 'updateUsers'])
            ->setName('admin.users');
    });


    $app->get('/error', function (Request $request, Response $response, $args) {
        throw new \Slim\Exception\HttpNotFoundException($request, "Something went wrong");
    });
};
