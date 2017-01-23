<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 1/23/2017
 * Time: 2:44 PM
 */

namespace App\Middleware;

class AuthMiddleware extends Middleware {

    public function __invoke($request, $response, $next)
    {

        if (!$this->container->auth->check()) {
            $this->container->flash->addMessage('error', 'Please sign in before doing that.');
            return $response->withRedirect($this->container->router->pathFor('auth.signin'));
        }


        $response = $next($request, $response);
        return $response;
    }

}
