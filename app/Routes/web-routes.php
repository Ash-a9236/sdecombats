<?php

declare(strict_types = 1);

/**
 * This file contains the routes for the web application.
 */

use App\Controllers\PagesController;
use App\Controllers\AdminController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


return static function(Slim\App $app): void {


    //* NOTE: Route naming pattern: [controller_name].[method_name]

    $app -> get('/', [PagesController::class, 'index']) -> setName('pages.index');
    $app -> get('/home', [PagesController::class, 'index']) -> setName('pages.index');
    $app -> get('/activities', [PagesController::class, 'displayActivities']) -> setName('pages.activities');
    $app -> get('/archery', [PagesController::class, 'archery']) -> setName('pages.archery');
    $app -> get('/big-groups', [PagesController::class, 'bigGroups']) -> setName('pages.big-groups');
    $app -> get('/birthdays', [PagesController::class, 'birthdays']) -> setName('pages.birthdays');
    $app -> get('/blog', [PagesController::class, 'blog']) -> setName('pages.blog');
    $app -> get('/outside-events', [PagesController::class, 'outsideEvents']) -> setName('pages.outside-events');
    $app -> get('/small-groups', [PagesController::class, 'smallGroups']) -> setName('pages.small-groups');

    // A route to test runtime error handling and custom exceptions.
    $app -> get('/error', function(Request $request, Response $response, $args) {
        throw new \Slim\Exception\HttpNotFoundException($request, "Something went wrong");
    });

    // LOGIN - PROTECTED ROUTES ////////////////////////////////////////////////////////////////////////////////////////

    // register
    $app -> get('/register', [PagesController::class, 'showLoginForm'])
        -> setName('pages.signup.form');

    $app -> post('/register', [PagesController::class, 'processSignup'])
        -> setName('pages.signup.submit');

    // login
    $app -> get('/login', [PagesController::class, 'showSigninForm'])
        -> setName('pages.signin.form');

    $app -> post('/login', [PagesController::class, 'processSignin'])
        -> setName('pages.signin.submit');

    // SIGN OUT
    $app -> get('/sign-out', [PagesController::class, 'logout'])
        -> setName('pages.logout');

    $app -> group('/dashboard/user', function($group) {
        $group -> get('', [UserController::class, 'dashboard']) -> setName('dashboard.index');
        $group -> get('/', [UserController::class, 'dashboard']) -> setName('dashboard.index');
        $group -> get('/make-reservation', [UserController::class, 'makeReservation']) -> setName('dashboard.make-reservation');
        $group -> get('/reservations', [UserController::class, 'displayReservations']) -> setName('dashboard.reservations');
        $group -> get('/membership', [UserController::class, 'membership']) -> setName('dashboard.membership');
        $group -> get('/update-info', [UserController::class, 'updateInfo']) -> setName('dashboard.update-info');
    });

    $app -> group('/dashboard/employee', function($group) {
        $group -> get('', [EmployeeController::class, 'dashboard']) -> setName('dashboard.index');
        $group -> get('/', [EmployeeController::class, 'dashboard']) -> setName('dashboard.index');
        $group -> get('/make-reservation', [EmployeeController::class, 'makeReservationForCustomer']) -> setName('dashboard.make-reservation');
        $group -> get('/update-reservation', [EmployeeController::class, 'updateReservationForCustomer']) -> setName('dashboard.update-reservation');
        $group -> get('/delete-reservation', [EmployeeController::class, 'deleteReservationForCustomer']) -> setName('dashboard.delete-reservation');
        $group -> get('/reservations', [EmployeeController::class, 'displayReservations']) -> setName('dashboard.reservations');
        $group -> get('/membership', [EmployeeController::class, 'displayMemberships']) -> setName('dashboard.memberships');
        $group -> get('/update-user-info', [EmployeeController::class, 'updateUserInfo']) -> setName('dashboard.update-user-info');
        $group -> get('/update-info', [EmployeeController::class, 'updateInfo']) -> setName('dashboard.update-info');
    });

    $app -> group('/dashboard/manager', function($group) {
        $group -> get('', [ManagerController::class, 'dashboard']) -> setName('dashboard.index');
        $group -> get('/', [ManagerController::class, 'dashboard']) -> setName('dashboard.index');
        $group -> get('/make-reservation', [EmployeeController::class, 'makeReservationForCustomer']) -> setName('dashboard.make-reservation');
        $group -> get('/update-reservation', [EmployeeController::class, 'updateReservationForCustomer']) -> setName('dashboard.update-reservation');
        $group -> get('/delete-reservation', [EmployeeController::class, 'deleteReservationForCustomer']) -> setName('dashboard.delete-reservation');
        $group -> get('/reservations', [EmployeeController::class, 'displayReservations']) -> setName('dashboard.reservations');
        $group -> get('/membership', [EmployeeController::class, 'displayMemberships']) -> setName('dashboard.memberships');
        $group -> get('/update-user-info', [EmployeeController::class, 'updateUserInfo']) -> setName('dashboard.update-user-info');
        $group -> get('/update-employee-info', [ManagerController::class, 'updateEmployeeInfo']) -> setName('dashboard.update-employee-info');
        $group -> get('/update-info', [EmployeeController::class, 'updateInfo']) -> setName('dashboard.update-info');
        $group -> get('/employees', [ManagerController::class, 'employees']) -> setName('dashboard.employees');
        $group -> get('/employees-add', [ManagerController::class, 'addEmployee']) -> setName('dashboard.add-employee');
        $group -> get('/employees-remove', [ManagerController::class, 'removeEmployee']) -> setName('dashboard.remove-employee');
    });

    $app -> group('/dashboard/admin', function($group) {
        $group -> get('', [AdminController::class, 'dashboard']) -> setName('dashboard.index');
        $group -> get('/', [AdminController::class, 'dashboard']) -> setName('dashboard.index');
        $group -> get('/make-reservation', [EmployeeController::class, 'makeReservationForCustomer']) -> setName('dashboard.make-reservation');
        $group -> get('/update-reservation', [EmployeeController::class, 'updateReservationForCustomer']) -> setName('dashboard.update-reservation');
        $group -> get('/delete-reservation', [EmployeeController::class, 'deleteReservationForCustomer']) -> setName('dashboard.delete-reservation');
        $group -> get('/reservations', [EmployeeController::class, 'displayReservations']) -> setName('dashboard.reservations');
        $group -> get('/membership', [EmployeeController::class, 'displayMemberships']) -> setName('dashboard.memberships');
        $group -> get('/update-user-info', [EmployeeController::class, 'updateUserInfo']) -> setName('dashboard.update-user-info');
        $group -> get('/update-employee-info', [AdminController::class, 'updateEmployeeInfo']) -> setName('dashboard.update-employee-info');
        $group -> get('/update-info', [EmployeeController::class, 'updateInfo']) -> setName('dashboard.update-info');
        $group -> get('/employees', [AdminController::class, 'employees']) -> setName('dashboard.employees'); //same as manager except is also lists the managers
        $group -> get('/employees-add', [AdminController::class, 'addEmployee']) -> setName('dashboard.add-employee'); //see previous line
        $group -> get('/employees-remove', [AdminController::class, 'removeEmployee']) -> setName('dashboard.remove-employee'); //see 2 lines before
        $group -> get('/activities', [AdminController::class, 'displayActivities']) -> setName('dashboard.activities');
        $group -> get('/activities-add', [AdminController::class, 'addActivities']) -> setName('dashboard.add-activities');
        $group -> get('/activities-update', [AdminController::class, 'updateActivity']) -> setName('dashboard.update-activities');
        $group -> get('/activities-remove', [AdminController::class, 'removeActivity']) -> setName('dashboard.remove-activities');
        $group -> get('/package', [AdminController::class, 'displayPackages']) -> setName('dashboard.packages');
        $group -> get('/packages-add', [AdminController::class, 'addPackages']) -> setName('dashboard.add-activities');
        $group -> get('/packages-update', [AdminController::class, 'updatePackages']) -> setName('dashboard.update-packages');
        $group -> get('/packages-remove', [AdminController::class, 'removePackages']) -> setName('dashboard.remove-packages');
    });
};
