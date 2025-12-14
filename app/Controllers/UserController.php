<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Domain\Models\UserM;
use App\Helpers\FlashMessage;
use App\Helpers\SessionManager;
use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class UserController extends BaseController {
    public function __construct(Container $container, private UserM $userM) {
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

    public function updateUserInfo(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Update Account Information',
            'section' => 'update-user-info',
        ];
        return $this->render($response, 'login-protected/customer-dashboard.php', $data);
    }

    public function submitUpdateUserInfo(Request $request, Response $response, array $args): Response {
        $user_info = $request->getParsedBody();
        $fname = trim($user_info['first_name']);
        $lname = trim($user_info['last_name']);
        $email = trim($user_info['email']);
        $phone = trim($user_info['phone']);
        $password = trim($user_info['password']);

        $errors = [];

        foreach ($user_info as $key => $userData) {
            if (empty($userData)) {
                $errors[] = "All data must be filled";
                break;
            }
        }

        $fname = ucfirst($fname);
        $lname = ucfirst($lname);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please input a valid email example@gmail.com";
        }

        if (!ctype_digit($phone)) {
            $errors[] = "Phone number must only contain numbers";
        }

        if (strlen($password) < 8) {
            $errors[] = "Password must be at least 8 characters long";
        }

        if (!empty($errors)) {
            foreach ($errors as $key => $error) {
                FlashMessage::error($error);
                return $this->redirect($request, $response, 'dashboard.update-user-info');
            }
        }

        $user = $this->userM->verifyCredentials(SessionManager::get("email"), $password);

        if ($user == 500) {
            FlashMessage::error("Incorrect password");
            return $this->redirect($request, $response, "dashboard.update-user-info");
        }

        $user_id = SessionManager::get('user_id');

        $this->userM->updateUserEmail($user_id, $email);
        $this->userM->updateUserPhone($user_id, $phone);
        $this->userM->updateUserFirstName($user_id, $fname);
        $this->userM->updateUserLastName($user_id, $lname);

        SessionManager::set('fname', $fname);
        SessionManager::set('lname', $lname);
        SessionManager::set('email', $email);
        SessionManager::set('phone', $phone);

        FlashMessage::success("Successfully updated your information!");
        return $this->redirect($request, $response, 'dashboard.index');
    }

    public function updatePassword(Request $request, Response $response, array $args): Response {
        $data['data'] = [
            'title' => 'Change Password',
            'section' => 'update-password',
        ];
        return $this->render($response, 'login-protected/customer-dashboard.php', $data);
    }

    public function submitUpdatePassword(Request $request, Response $response, array $args): Response {
        $password_info = $request->getParsedBody();
        $password = trim($password_info['password']);
        $new_password = trim($password_info['new_password']);
        $confirm_new_password = trim($password_info['confirm_new_password']);

        $errors = [];

        foreach ($password_info as $key => $userData) {
            if (empty($userData)) {
                $errors[] = "All date must be filled";
                break;
            }
        }

        if (strlen($new_password) < 8) {
            $errors[] = "New password must be at least 8 characters long";
        }

        if ($new_password != $confirm_new_password) {
            $errors[] = "The passwords must match";
        }

        if (!empty($errors)) {
            foreach ($errors as $key => $error) {
                FlashMessage::error($error);
                return $this->redirect($request, $response, 'dashboard.update-password');
            }
        }

        $user = $this->userM->verifyCredentials(SessionManager::get("email"), $password);

        if ($user == 500) {
            FlashMessage::error("Incorrect Current Password");
            return $this->redirect($request, $response, "dashboard.update-password");
        }

        $user_id = SessionManager::get('user_id');

        $hashedPassword = password_hash($new_password, PASSWORD_BCRYPT);

        $this->userM->updateUserPassword($user_id, $hashedPassword);

        FlashMessage::success("Successfully updated your password");
        return $this->redirect($request, $response, 'dashboard.index');
    }
}
