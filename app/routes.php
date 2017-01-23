<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 1/17/2017
 * Time: 12:54 PM
 */

use App\Middleware\AuthMiddleware;

$app->get('/', 'HomeController:index')->setName('home');

$app->group('', function() {

    $this->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');
    $this->post('/auth/signup', 'AuthController:postSignUp');

    $this->get('/auth/signin', 'AuthController:getSignIn')->setName('auth.signin');
    $this->post('/auth/signin', 'AuthController:postSignIn');

})->add(new GuestMiddleware($container));


$app->group('', function() {

    $this->get('/auth/signout', 'AuthController:getSignOut')->setName('auth.signout');
    $this->get('/auth/password/change', 'PasswordController:getChangePassword')->setName('auth.password.change');
    $this->post('/auth/password/change', 'PasswordController:postChangePassword');

})->add(new AuthMiddleware($container));