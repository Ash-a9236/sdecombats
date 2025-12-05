<?php

namespace App\Controllers;

use App\Domain\Models\UserM;
use App\Domain\Models\StaffM;
use App\Helpers\FlashMessage;
use App\Helpers\SessionManager;
use DI\Container;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class AuthController extends BaseController {
    public function __construct (Container $container, private UserM $userM, private StaffM $staffM) {
        return parent ::__construct($container);
    }

    public function showLoginForm (Request $request, Response $response, array $args): Response {

        $data['data'] = [
            'title' => 'Welcome Back !',
            'message' => 'Welcome back to sports de combats',
            'isNavBarShown' => false,
            'contentView' => APP_VIEWS_PATH . '/pages/login.php',
            'data' => []
        ];

        return $this -> render($response, '/pages/login.php', $data);
    }


// -------------------------------
// SIGN UP
// -------------------------------

    public function showRegistrationForm (Request $request, Response $response, array $args): Response {
        $data = [
            'page_title' => 'Welcome in !',
            'contentView' => APP_VIEWS_PATH . '/pages/signup.php',
            'isNavBarShown' => false,
            'data' => []
        ];

        return $this -> render($response, '/pages/signup.php', $data);
    }

    /**
     * Process the registration form to add a new user
     */
    public function store (Request $request, Response $response, array $args): Response {
        $userRegistrationInfo = $request -> getParsedBody();
        $language_id = $userRegistrationInfo['language_id'];
        $fname = trim($userRegistrationInfo['fname'] ?? '');
        $lname = trim($userRegistrationInfo['lname'] ?? '');
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
            return $this -> showRegistrationForm($request, $response, $errors);
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
            $modelResponse = $this -> userM -> createUser($userData);

            if ($modelResponse == 201) {
                //TODO implement confirmation email
                FlashMessage ::success('Registration successful. Please log in.');
                return $this -> redirect($request, $response, '/login');
            } elseif ($modelResponse == 500) {
                FlashMessage ::error("Registration Failed. Please try again.");
                return $this -> redirect($request, $response, '/login');
            } else {
                FlashMessage ::error("Try to login. If it doesn't work, try registration again.");
                return $this -> redirect($request, $response, "/register");
            }
        } catch (\Throwable $th) {
            FlashMessage ::error('Registration failed. Please try again');
            return $this -> redirect($request, $response, 'register');
        }
    }

    public function authenticate (Request $request, Response $response, array $args): Response {
        $inputData = $request -> getParsedBody();

        $email = $inputData['email'] ?? '';
        $password = $inputData['password'] ?? '';

        $errors = [];
        $user = [];

        if (empty($email) || empty($password)) {
            $errors[] = "All fields must be filled";
        }

        if (!empty($errors)) {
            foreach ($errors as $key => $error) {
                FlashMessage ::error($error);
            }
            return $this -> redirect($request, $response, '/login');
        }

        $email = trim($email ?? '');
        if (is_numeric($email)) {
            $user = $this -> staffM -> verifyCredentials($email, $password);

            if ($user != null) {
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
                return $this -> redirect($request, $response, '/login');
            }

        } else if (str_contains($email, '@') && !is_numeric($email)) {
            $user = $this -> userM -> verifyCredentials($email, $password);
            if ($user != null) {
                SessionManager ::set('user_id', $user['user_id']);
                SessionManager ::set('fname', $user['fname']);
                SessionManager ::set('lname', $user['lname']);
                SessionManager ::set('email', $user['email']);
                SessionManager ::set('phone', $user['phone']);
                SessionManager ::set('is_authenticated', true);

                FlashMessage ::success("Welcome back, {$user['fname']} {$user['lname']}!");
                return $this -> render($response, 'login-protected/customer-dashboard.php', $user);
            } else {
                FlashMessage ::error("User not found or password does not match, please try again");
                return $this -> redirect($request, $response, '/login');
            }

        } else {
            FlashMessage ::error("Invalid email or id");
            return $this -> redirect($request, $response, '/login');
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

    public function logout (Request $request, Response $response, array $args): Response {
        SessionManager ::destroy();
        SessionManager ::start();
        FlashMessage ::success("You have been successfully logged out");
        return $this -> redirect($request, $response, '/'); //return to home
    }


    /**
     * Display the user dashboard
     */
    public function dashboard (Request $request, Response $response, array $args): Response {
        return $this -> render($response, 'user/dashboard.php');
    }

    /**
     * Display the user information edit form
     */
    public function editUserInfo(Request $request, Response $response, array $args): Response
    {
        $user_id = SessionManager::get('user_id');

        $user = $this->userModel->findById($user_id);

        $data['user'] = $user;

        //! Temporary view name
        return $this->render($response, 'userEditInfoView.php', $data);
    }

    public function updateUserInfo(Request $request, Response $response, array $args): Response
    {
        $user_info = $request->getParsedBody();
        $fname = trim($user_info['fname']);
        $lname = trim($user_info['lname']);
        $email = trim($user_info['email']);
        $phone = trim($user_info['phone']);
        $password = trim($user_info['password']);
        $confirm_password = trim($user_info['confirm_password']);

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
                //! temporary route name
                return $this->redirect($request, $response, 'user.edit');
            }
        }

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $user_id = SessionManager::get('user_id');

        $this->userModel->updateUserPassword($user_id, $hashed_password);
        $this->userModel->updateUserEmail($user_id, $email);
        $this->userModel->updateUserPhone($user_id, $phone);
        $this->userModel->updateUserFirstName($user_id, $fname);
        $this->userModel->updateUserLastName($user_id, $lname);

        FlashMessage::success("Successfully updated your information!");
        //! temporary route name
        return $this->redirect($request, $response, 'user.edit');
    }
}
