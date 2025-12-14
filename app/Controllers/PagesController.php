<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Domain\Models\StaffM;
use App\Domain\Models\UserM;
use App\Helpers\FlashMessage;
use App\Helpers\SessionManager;
use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PagesController extends BaseController
{
    public function __construct(Container $container, private UserM $userM, private StaffM $staffM)
    {
        parent::__construct($container);
    }

    public function index(Request $request, Response $response, array $args): Response
    {
        $data['data'] = [
            'title' => 'Home',
            'message' => 'Welcome to the home page',
            //'carousel-images' => array of images
        ];
        return $this->render($response, 'homeView.php', $data);
    }

    public function menu(Request $request, Response $response, array $args): Response
    {
        $data['data'] = [
            'title' => 'Navigation',
        ];
        return $this->render($response, 'pages/menu.php', $data);
    }

    public function giftCards(Request $request, Response $response, array $args): Response
    {
        $data['data'] = [
            'title' => 'Gift Card',
        ];
        return $this->render($response, 'pages/gift-cards.php', $data);
    }

    public function contact(Request $request, Response $response, array $args): Response
    {
        $data['data'] = [
            'title' => 'Contact Us',
        ];
        return $this->render($response, 'pages/contact.php', $data);
    }

    public function error(Request $request, Response $response, array $args): Response
    {
        return $this->render($response, 'errorView.php');
    }

    public function displayActivities(Request $request, Response $response): Response
    {
        $data['data'] = [
            'title' => 'Activities',
        ];
        return $this->render($response, 'pages/activities.php', $data);
    }

    public function archery(Request $request, Response $response): Response
    {
        $data['data'] = [
            'title' => 'Archery',
        ];
        return $this->render($response, 'pages/archery.php', $data);
    }

    public function bigGroups(Request $request, Response $response): Response
    {
        $data['data'] = [
            'title' => 'Big Groups',
        ];
        return $this->render($response, 'pages/big-groups.php', $data);
    }

    public function birthdays(Request $request, Response $response): Response
    {
        $data['data'] = [
            'title' => 'Birthdays',
        ];
        return $this->render($response, 'pages/birthdays.php', $data);
    }

    public function blog(Request $request, Response $response): Response
    {
        $data['data'] = [
            'title' => 'Blog',
        ];
        return $this->render($response, 'pages/blog.php', $data);
    }

    public function outsideEvents(Request $request, Response $response): Response
    {
        $data['data'] = [
            'title' => 'Outside Events',
        ];
        return $this->render($response, 'pages/outside-events.php', $data);
    }

    public function smallGroups(Request $request, Response $response): Response
    {
        $data['data'] = [
            'title' => 'Small Groups',
        ];
        return $this->render($response, 'pages/small-groups.php', $data);
    }

    public function showLoginForm(Request $request, Response $response): Response
    {
        $data['data'] = [
            'title' => 'Sign Up',
        ];
        return $this->render($response, 'pages/signup.php', $data);
    }

    public function processSignup(Request $request, Response $response): Response
    {
        $userRegistrationInfo = $request -> getParsedBody();
        $language_id = $userRegistrationInfo['language_id'] ?? 'ENGLISH';
        $fname = trim($userRegistrationInfo['first_name'] ?? '');
        $lname = trim($userRegistrationInfo['last_name'] ?? '');
        $email = trim($userRegistrationInfo['email'] ?? '');
        $phone = trim($userRegistrationInfo['phone'] ?? '');
        $password = trim($userRegistrationInfo['password'] ?? '');
        $confirm_password = trim($userRegistrationInfo['confirm_password'] ?? '');
        $errors = [];

        foreach ($userRegistrationInfo as $key => $userData) {
            if (empty($userData)) {
                $errors[] = "All data must be filled";
                break;
            }
        }

        $fname = ucfirst($fname);
        $lname = ucfirst($lname);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please input a valid email example@gmail.com";
        } else if ($this -> userM -> emailExists($email)) {
            $errors[] = "Email already assigned to a registered user";
        }

        if (!ctype_digit($phone)) {
            $errors[] = "Phone number must only contain numbers";
        }

        if (str_contains($password, ";")) {
            $errors[] = "Please enter a valid password";
        }

        if (strlen($password) < 8) {
            $errors[] = "Password must be at least 8 characters long";
        }

        if ($password != $confirm_password) {
            $errors[] = "Passwords do not match";
        }

        if (!empty($errors)) {
            foreach ($errors as $key => $error) {
                FlashMessage ::error($error);
            }
            return $this -> showLoginForm($request, $response);
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $userData = [
            'language_id' => $language_id,
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'phone' => $phone,
            'password' => $hashedPassword
        ];
        $modelResponse = $this -> userM -> createUser($userData);

        if ($modelResponse == 201) {
            FlashMessage ::success('Registration successful. Please log in.');
            return $response->withHeader('Location', './login')->withStatus(302);
        } elseif ($modelResponse == 500) {
            FlashMessage ::error("Registration Failed. Please try again.");
            return $this -> redirect($request, $response, '/register');
        } else {
            FlashMessage ::error("Try to login. If it doesn't work, try registration again.");
            return $this -> redirect($request, $response, "/register");
        }
    }

    public function showSigninForm(Request $request, Response $response): Response
    {
        $data['data'] = [
            'title' => 'Login',
        ];
        return $this->render($response, 'pages/login.php', $data);
    }

    public function processSignin(Request $request, Response $response): Response
    {
        $inputData = $request -> getParsedBody();

        $email = $inputData['email'] ?? '';
        $password = $inputData['Password'] ?? '';

        $errors = [];
        $user = [];

        if (empty($email) || empty($password)) {
            $errors[] = "All fields must be filled";
        }

        if (!empty($errors)) {
            foreach ($errors as $key => $error) {
                FlashMessage ::error($error);
            }
            return $this -> redirect($request, $response, 'pages.signin.form');
        }

        $email = trim($email ?? '');
        if (is_numeric($email)) {
            $user = $this -> staffM -> verifyCredentials($email, $password);

            if ($user != 500) {
                SessionManager ::set('user_id', $user['user_id']);
                SessionManager ::set('name', $user['name']);
                SessionManager ::set('level', $user['level']);
                SessionManager ::set('is_authenticated', true);

                FlashMessage ::success("Welcome back, {$user['name']}!");

                $id = (int)$email;
                $dashboard = $this -> getDashboardById($id);

                return $this -> render($response, "login-protected/{$dashboard}", $user);
            } else {
                FlashMessage ::error("User not found or password does not match, please try again");
                return $this -> redirect($request, $response, 'pages.signin.form');
            }

        } else if (str_contains($email, '@') && !is_numeric($email)) {
            $user = $this -> userM -> verifyCredentials($email, $password);
            if ($user != 500) {
                SessionManager ::set('language_id', $user['language_id']);
                SessionManager ::set('user_id', $user['user_id']);
                SessionManager ::set('fname', $user['fname']);
                SessionManager ::set('lname', $user['lname']);
                SessionManager ::set('email', $user['email']);
                SessionManager ::set('phone', $user['phone']);
                SessionManager ::set('membership_id', $user['membership_id']);
                SessionManager ::set('is_authenticated', true);

                FlashMessage ::success("Welcome back, {$user['fname']} {$user['lname']}!");
                return $response->withHeader('Location', './dashboard/user')->withStatus(302);
            } else {
                FlashMessage ::error("User not found or password does not match, please try again");
                return $this -> redirect($request, $response, 'pages.signin.form');
            }

        } else {
            FlashMessage ::error("Invalid email or id");
            return $this -> redirect($request, $response, 'pages.signin.form');
        }
    }

    public function getDashboardById (int $id): string {
        if ($id <= 1999) {
            return 'employee-dashboard';
        } elseif ($id >= 2000 && $id <= 2999) {
            return 'manager-dashboard';
        } elseif ($id >= 3000 && $id <= 3999) {
            return 'admin-dashboard';
        } else { //would technically allow staff to be with ids 4000+
            return 'employee-dashboard';
        }
    }

    public function logout(Request $request, Response $response): Response
    {
        SessionManager ::destroy();
        SessionManager ::start();
        FlashMessage ::success("You have been successfully logged out");
        return $response->withHeader('Location', './')->withStatus(302);
    }
}
