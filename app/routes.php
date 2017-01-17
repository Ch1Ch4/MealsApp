<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 1/17/2017
 * Time: 12:54 PM
 */

$app->get('/home', function ($request, $response) {

    return $this->view->render($response, 'home.twig');

});