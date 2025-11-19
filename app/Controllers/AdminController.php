<?php

namespace App\Controllers;

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AdminController extends BaseController
{
    public function __construct(Container $container)
    {
        parent::__construct($container);
    }

    public function index(Request $request, Response $response, array $args): Response
    {
        //$data['flash'] = $this->flash->getFlashMessage();
        //echo $data['message'] ;exit;

        $data['data'] = [
            'title' => 'Admin',
            'message' => 'Welcome to the Admin page',
        ];
        return $this->render($response, 'admin/adminView.php', $data);
    }

    // Your controller methods here...
}
