<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 1/17/2017
 * Time: 12:54 PM
 */

$app->get('/', 'HomeController:index')->setName('home');

$app->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');
$app->post('/auth/signup', 'AuthController:postSignUp');