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
use Respect\Validation\Validator as v;

use Slim\Views\Twig as View;

class AuthController extends Controller {

    public function getSignUp($request, $response) {

        return $this->view->render($response, 'auth/signup.twig');

    }

    public function postSignUp($request, $response) {

        $validation = $this->validator->validate($request, [
            'email' => v::noWhitespace()->notEmpty()->email()->emailAvailable(),
            'name' => v::notEmpty()->alpha(),
            'password' => v::noWhitespace()->notEmpty(),
        ]);

        if ($validation->failed()) {
            return $response->withRedirect($this->router->pathFor('auth.signup'));
        }

        $user = User::create([
            'email' => $request->getParam('email'),
            'name' => $request->getParam('name'),
            'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),
        ]);

        return $response->withRedirect($this->router->pathFor('home'));

    }

}