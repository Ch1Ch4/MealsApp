<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 1/19/2017
 * Time: 11:56 AM
 */

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;

use Slim\Views\Twig as View;

class AuthController extends Controller {

    public function getSignUp($request, $response) {
        return $this->view->render($response, 'auth/signup.twig');
    }

    public function postSignUp($request, $response) {

        $user = User::create([
            'email' => $request->getParam('email'),
            'name' => $request->getParam('name'),
            'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),
        ]);

        return $response->withRedirect($this->router->pathFor('home'));

    }

}