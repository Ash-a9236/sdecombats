<?php

namespace App\Controllers;

use App\Domain\Models\UserModel;
use App\Helpers\FlashMessage;
use App\Helpers\SessionManager;
use DI\Container;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class AuthController extends BaseController
{
    public function __construct(Container $container, private UserModel $userModel)
    {
        return parent::__construct($container);
    }

    /**
     * Display the user registration form
     */
    public function register(Request $request, Response $response, array $args): Response
    {
        return $this->render($response, 'auth/register.php');
    }

    /**
     * Process the registration form to add a new user
     */
    public function store(Request $request, Response $response, array $args): Response
    {
        $userRegistrationInfo = $request->getParsedBody();
        $language_id = $userRegistrationInfo['language_id'];
        $fname = trim($userRegistrationInfo['fname']);
        $lname = trim($userRegistrationInfo['lname']);
        $email = trim($userRegistrationInfo['email']);
        $phone = trim($userRegistrationInfo['phone']);
        $password = trim($userRegistrationInfo['password']);
        $confirm_password = trim($userRegistrationInfo['confirm_password']);

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
        } else if ($this->userModel->emailExists($email)) {
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
                FlashMessage::error($error);
                return $this->redirect($request, $response, 'auth.register');
            }
        }

        try {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $userData = [
                'language_id' => $language_id,
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'phone' => $phone,
                'password' => $hashedPassword
            ];
            $modelResponse = $this->userModel->createUser($userData);

            if ($modelResponse == 201) {
                //TODO implement confirmation email
                FlashMessage::success('Registration successful. Please log in.');
                return $this->redirect($request, $response, 'auth.login');
            } elseif ($modelResponse == 500) {
                FlashMessage::error("Registration Failed. Please try again.");
                return $this->redirect($request, $response, 'auth.login');
            } else {
                FlashMessage::error("Try to login. If it doesn't work, try registration again.");
                return $this->redirect($request, $response, "auth.register");
            }
        } catch (\Throwable $th) {
            FlashMessage::success('Registration failed. Please try again');
            return $this->redirect($request, $response, 'auth.register');
        }
    }

    /**
     * Display the user login form
     */
    public function login(Request $request, Response $response, array $args): Response
    {
        return $this->render($response, 'auth/login.php');
    }

    public function authenticate(Request $request, Response $response, array $args): Response
    {
        $inputData = $request->getParsedBody();

        $email = $inputData['email'];
        $password = $inputData['password'];

        $errors = [];
        $user = [];

        if (empty($email) || empty($password)) {
            $errors[] = "All fields must be filled";
        }

        if (!empty($error)) {
            foreach ($errors as $key => $error) {
                FlashMessage::error($error);
                return $this->redirect($request, $response, 'auth.login');
            }
        }

        $user = $this->userModel->verifyCredentials($email, $password);
        if ($user != null) {
            SessionManager::set('user_id', $user['user_id']);
            SessionManager::set('fname', $user['fname']);
            SessionManager::set('lname', $user['lname']);
            SessionManager::set('email', $user['email']);
            SessionManager::set('phone', $user['phone']);
            SessionManager::set('is_authenticated', true);

            FlashMessage::success("Welcome back, {$user['fname']} {$user['lname']}!");
            return $this->redirect($request, $response, 'user.dashboard');
        } else {
            FlashMessage::error("User not found or password does not match, please try again");
            return $this->redirect($request, $response, 'auth.login');
        }
    }

    public function logout(Request $request, Response $response, array $args): Response
    {
        SessionManager::destroy();
        SessionManager::start();
        FlashMessage::success("You have been successfully logged out");
        return $this->redirect($request, $response, 'auth.login');
    }


    /**
     * Display the user dashboard
     */
    public function dashboard(Request $request, Response $response, array $args): Response
    {
        return $this->render($response, 'user/dashboard.php');
    }
}
