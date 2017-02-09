<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 1/17/2017
 * Time: 1:24 PM
 */

namespace App\Controllers;

use App\Models\User;
use App\Controllers\Controller;
use Slim\Views\Twig as View;

class HomeController extends Controller {

    public function index($request, $response) {

        if (isset($_SESSION['user'])) {
            
            $id = ($_SESSION['user']);
            $user = User::where('id', $id)->first();

            $this->container->view->getEnvironment()->addGlobal('api_key', $user->api_key);
        }

        return $this->view->render($response, 'home.twig');
    }

}