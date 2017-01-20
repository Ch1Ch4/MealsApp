<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 1/20/2017
 * Time: 12:53 PM
 */

namespace App\Middleware;

class ValidationErrorsMiddleware extends Middleware {

    public function __invoke($request, $response, $next) {

        if (isset($_SESSION['errors'])) {
            $this->container->view->getEnvironment()->addGlobal('errors', $_SESSION['errors']);
            unset($_SESSION['errors']);
        }

        $response = $next($request, $response);
        return $response;
    }
}