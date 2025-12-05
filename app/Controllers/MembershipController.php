<?php

namespace App\Controllers;

use DI\Container;
use App\Domain\Models\MembershipM;
use App\Helpers\FlashMessage;
use App\Helpers\SessionManager;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class MembershipController extends BaseController
{
    public function __construct(Container $container, private MembershipM $membershipM)
    {
        return parent::__construct($container);
    }

    public function show(Response $response, Request $request, array $args): Response
    {
        //! Temporary route name
        return $this->render($response, 'membership.php');
    }

    public function addMembership(Response $response, Request $request, array $args): Response
    {
        $membership_info = $request->getParsedBody();
        $data = [];

        $data['duration'] = $membership_info['duration'];
        $data['bow_rental'] = $membership_info['bow_rental'];
        $locker = $membership_info['locker'];
        if ($locker) {
            $data['type'] = $membership_info['type'];
        }
        $user_id = SessionManager::get('user_id');
        $name = SessionManager::get('fname') . " " . SessionManager::get('lname');

        $result = $this->membershipM->createMembership($data, $user_id, $name, $locker);
        if ($result == 500) {
            FlashMessage::error("There was an error when processing your request. Please try again.");
            //TODO: route name
            return $this->redirect($request, $response, '');
        } else {
            FlashMessage::success("You have successfully subscribed to a membership.");
            //TODO: route name
            return $this->redirect($request, $response, '');
        }
    }
}
