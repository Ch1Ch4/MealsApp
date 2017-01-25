<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 1/17/2017
 * Time: 12:54 PM
 */


use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;


$app->get('/', 'HomeController:index')->setName('home');

// Restaurants API
$app->get('/api/restaurants', 'RestaurantController:getAllRestaurantsAPI');
$app->get('/api/restaurant/id/{id}', 'RestaurantController:getRestaurantAPI');

$app->post('/api/restaurant/add', 'RestaurantController:postRestaurant');
$app->put('/api/restaurant/update/{id}', 'RestaurantController:putRestaurant');
$app->delete('/api/restaurant/delete/{id}', 'RestaurantController:deleteRestaurant');

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
    $this->get('/restaurants', 'RestaurantController:getAllRestaurants')->setName('restaurants');


})->add(new AuthMiddleware($container));