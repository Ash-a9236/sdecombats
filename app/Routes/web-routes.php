<?php

declare(strict_types=1);

/**
 * This file contains the routes for the web application.
 */

use App\Controllers\HomeController;
use App\Controllers\AdminController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


return static function (Slim\App $app): void {


    //* NOTE: Route naming pattern: [controller_name].[method_name]
    $app->get('/', [HomeController::class, 'index'])
        ->setName('home.index');

    $app->get('/home', [HomeController::class, 'index'])
        ->setName('home.index');

    $app->group('/admin', function ($group) {
    $group->get('/dashboard', [\App\Controllers\AdminController::class, 'index'])
          ->setName('admin.dashboard');

    // Example: other admin sections
    $group->get('/reservations', [\App\Controllers\AdminController::class, 'manageReservations'])
          ->setName('admin.reservations');

    $group->get('/memberships', [\App\Controllers\AdminController::class, 'manageMemberships'])
          ->setName('admin.memberships');

    $group->get('/employees', [\App\Controllers\AdminController::class, 'manageEmployees'])
          ->setName('admin.employees');

    $group->get('/activities', [\App\Controllers\AdminController::class, 'manageActivities'])
          ->setName('admin.activities');

    $group->get('/events', [\App\Controllers\AdminController::class, 'manageEvents'])
          ->setName('admin.events');

    $group->get('/users', [\App\Controllers\AdminController::class, 'updateUsers'])
          ->setName('admin.users');
});


    // A route to test runtime error handling and custom exceptions.
    $app->get('/error', function (Request $request, Response $response, $args) {
        throw new \Slim\Exception\HttpNotFoundException($request, "Something went wrong");
    });
};
