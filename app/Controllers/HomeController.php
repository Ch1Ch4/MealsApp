<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 1/17/2017
 * Time: 1:24 PM
 */

namespace App\Controllers;

use App\Models\User;
use Slim\Views\Twig as View;

class HomeController extends Controller {

    public function index($request, $response) {
        return $this->view->render($response, 'home.twig');
    }

}