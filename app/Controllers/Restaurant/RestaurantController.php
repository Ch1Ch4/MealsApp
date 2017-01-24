<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 1/23/2017
 * Time: 6:17 PM
 */

namespace App\Controllers\Restaurant;

use App\Controllers\Controller;
use App\Models\Restaurant;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class RestaurantController extends Controller {

    public function getAllRestaurants($request, $response) {

        $restaurants = Restaurant::all();
        $this->container->view->getEnvironment()->addGlobal('restaurants', $restaurants);

        return $this->view->render($response, 'restaurants.twig');
    }

    public function getAllRestaurantsAPI(Request $request, Response $response) {
        $restaurants = Restaurant::all();
        json_encode($restaurants);
        echo $restaurants;
    }

    public function getRestaurantAPI(Request $request, Response $response) {
        $id = $request->getAttribute('id');
        $restaurant = Restaurant::where('id', $id)->get();;
        json_encode($restaurant);
        echo $restaurant;
    }

}