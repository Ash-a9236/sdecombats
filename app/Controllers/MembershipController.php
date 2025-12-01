<?php

namespace App\Controllers;

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class MembershipController extends BaseController
{
    public function __construct(Container $container)
    {
        return parent::__construct($container);
    }

    public function show(Response $response, Request $request, array $args): Response
    {
        //! Temporary route name
        return $this->render($response, 'membership.php');
    }
}
