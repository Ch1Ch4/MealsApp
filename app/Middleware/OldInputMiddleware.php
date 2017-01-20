<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 1/20/2017
 * Time: 1:43 PM
 */

namespace App\Middleware;

class OldInputMiddleware extends Middleware
{

    public function __invoke($request, $response, $next)
    {
        if (isset($_SESSION['old'])) {
            $this->container->view->getEnvironment()->addGlobal('old', $_SESSION['old']);
            $_SESSION['old'] = $request->getParams();
        }

        $response = $next($request, $response);
        return $response;
    }
}