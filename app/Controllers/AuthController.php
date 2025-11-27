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

    public function register(Request $request, Response $response, array $args): Response
    {
        //! View Name not final
        return $this->render($response, 'auth/register.php');
    }

    public function store(Request $request, Response $response, array $args): Response
    {
        $userRegistrationInfo = $request->getParsedBody();
        $f_name = $userRegistrationInfo['f_name'];
        $l_name = $userRegistrationInfo['l_name'];
        $email = $userRegistrationInfo['email'];
        $phone = $userRegistrationInfo['phone'];
        $password = $userRegistrationInfo['password'];
        $confirm_password = $userRegistrationInfo['confirm_password'];

        $errors = [];

        foreach ($userRegistrationInfo as $key => $userData) {
            if (empty($userData)) {
                $errors[] = "All data must be filled";
                break;
            }
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please input a valid email example@gmail.com";
        } else if ($this->userModel->emailExists($email)) {
            $errors[] = "Email already assigned to a registered user";
        }

        if (strlen($password) < 8) {
            $errors[] = "Password must be at least 8 characters long";
        }

        if ($password != $confirm_password) {
            $errors[] = "Passwords do not match";
        }

        if (condition) {
            # code...
        }
    }
}
