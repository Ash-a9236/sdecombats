<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Domain\Models\MembershipM;
use App\Domain\Models\UserM;
use App\Helpers\FlashMessage;
use App\Helpers\SessionManager;
use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class UserController extends BaseController {
    public function __construct(Container $container, private UserM $userM, private MembershipM $membershipM) {
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
        if (SessionManager::get('membership_id') != null) {
            $data['data']['membership_info'] = $this->membershipM->getMembershipInfo(SessionManager::get("membership_id"));
        }
        return $this->render($response, 'login-protected/customer-dashboard.php', $data);
    }

    public function createMembership(Request $request, Response $response, array $args): Response {
        $membership_info = $request->getParsedBody();
        $data = [];

        if ($membership_info['duration'] == "") {
            FlashMessage::error("Please select a duration");
            return $this->redirect($request, $response, 'dashboard.membership');
        }

        $data['duration'] = intval($membership_info['duration']);
        if (isset($membership_info['bow_rental'])) {
            $data['bow_rental'] = 1;
        } else {
            $data['bow_rental'] = 0;
        }
        $locker = $membership_info['locker_type'];
        if ($locker != "") {
            $data['type'] = $membership_info['locker_type'];
        }
        $user_id = SessionManager::get('user_id');
        $name = SessionManager::get('fname') . " " . SessionManager::get('lname');

        $result = $this->membershipM->createMembership($data, $user_id, $name);
        if ($result == 500) {
            FlashMessage::error("There was an error when processing your request. Please try again.");
            return $this->redirect($request, $response, 'dashboard.membership');
        } else {
            SessionManager::set("membership_id", $result);
            FlashMessage::success("You have successfully subscribed to a membership.");
            return $this->redirect($request, $response, 'dashboard.membership');
        }
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
