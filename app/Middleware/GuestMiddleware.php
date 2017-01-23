<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 1/23/2017
 * Time: 2:56 PM
 */

namespace App\Middleware;

class GuestMiddleware extends Middleware {

    public function __invoke($request, $response, $next)
    {

        if($this->container->check()) {
            return $response->withRedirect($this->container->router->pathFor('home'));
        }

        $response = $next($request, $response);
        return $response;
    }

}
