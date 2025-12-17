<?php

namespace App\Controllers;

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Helpers\Core\PDOService;
use App\Domain\Models\MembershipModel;
use App\Domain\Models\ReservationModel;
use App\Domain\Models\UserModel;
use App\Domain\Models\StaffModel;
use App\Domain\Models\ActivityModel;

class AdminController extends BaseController
{
    private PDOService $dbService;

    public function __construct(Container $container)
    {
        parent::__construct($container);
        $this->dbService = $container->get(PDOService::class);
    }

    public function index(Request $request, Response $response, array $args): Response
    {
        $data = [
            'title' => 'Admin Dashboard',
            'message' => 'Welcome to the Admin Dashboard.',
            'active_page' => 'dashboard'
        ];
        return $this->render($response, 'admin/adminView.php', $data);
    }




    public function manageReservations(Request $request, Response $response): Response
    {
        $model = new ReservationModel($this->dbService);
        $data = [
            'title' => 'Manage Reservations',
            'reservations' => $model->getAllReservations(),
            'active_page' => 'reservations'
        ];
        return $this->render($response, 'admin/reservations.php', $data);
    }

    public function editReservation(Request $request, Response $response, array $args): Response
    {
        $id = (int)$args['id'];
        $model = new ReservationModel($this->dbService);
        $reservation = $model->getReservationById($id);

        if (!$reservation) {
            return $this->redirect($request, $response, 'admin.reservations');
        }

        $data = [
            'title' => 'Edit Reservation',
            'reservation' => $reservation,
            'active_page' => 'reservations'
        ];

        return $this->render($response, 'admin/reservations_edit.php', $data);
    }

    public function deleteReservation(Request $request, Response $response, array $args): Response
    {
        $id = (int)$args['id'];
        $model = new ReservationModel($this->dbService);
        $model->deleteReservation($id);

        return $this->redirect($request, $response, 'admin.reservations');
    }

    public function saveReservation(Request $request, Response $response, array $args): Response
    {
        $id = (int)$args['id'];
        $formData = $request->getParsedBody();

        $model = new ReservationModel($this->dbService);
        $model->updateReservation($id, $formData);

        return $this->redirect($request, $response, 'admin.reservations');
    }

    public function manageEmployees(Request $request, Response $response): Response
    {
        $model = new StaffModel($this->dbService);
        $data = [
            'title' => 'Manage Staff',
            'employees' => $model->getAllEmployees(),
            'active_page' => 'employees'
        ];
        return $this->render($response, 'admin/employees.php', $data);
    }

    public function addEmployee(Request $request, Response $response): Response
    {
        $data = [
            'title' => 'Add New Employee',
            'active_page' => 'employees'
        ];
        return $this->render($response, 'admin/employees_add.php', $data);
    }

    public function saveEmployee(Request $request, Response $response): Response
    {
        $formData = $request->getParsedBody();

        $model = new StaffModel($this->dbService);
        $model->createEmployee($formData);

        return $this->redirect($request, $response, 'admin.employees');
    }

    public function manageActivities(Request $request, Response $response): Response
    {
        $model = new ActivityModel($this->dbService);
        $data = [
            'title' => 'Manage Activities',
            'activities' => $model->getAllActivities(),
            'active_page' => 'activities'
        ];
        return $this->render($response, 'admin/activities.php', $data);
    }

    public function manageEvents(Request $request, Response $response): Response
    {
        $model = new ActivityModel($this->dbService);
        $data = [
            'title' => 'Manage Events',
            'packages' => $model->getAllPackages(),
            'active_page' => 'events'
        ];
        return $this->render($response, 'admin/events.php', $data);
    }

    public function updateUsers(Request $request, Response $response): Response
    {
        $model = new UserModel($this->dbService);
        $data = [
            'title' => 'User Directory',
            'users' => $model->getAllUsers(),
            'active_page' => 'users'
        ];
        return $this->render($response, 'admin/users.php', $data);
    }

    public function manageMemberships(Request $request, Response $response): Response
    {
        $data = [
            'title' => 'Create Membership',
            'active_page' => 'memberships'
        ];
        return $this->render($response, 'admin/memberships.php', $data);
    }
}
