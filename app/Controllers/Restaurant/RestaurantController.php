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
use App\Models\User;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class RestaurantController extends Controller {

    public function getAllRestaurants($request, $response) {

        $restaurants = Restaurant::all();
        $this->container->view->getEnvironment()->addGlobal('restaurants', $restaurants);

        return $this->view->render($response, 'restaurants.twig');
    }

    public function getAllRestaurantsAPI(Request $request, Response $response) {

        $isValidApiKey = User::where('api_key', $request->getParam('api_key'))->first();

        if ($isValidApiKey) {
            $restaurants = Restaurant::all();
            json_encode($restaurants);
            echo $restaurants;
        } else {
            echo "Wrong API Key";
        }
    }

    public function getRestaurantAPI(Request $request, Response $response) {

        $isValidApiKey = User::where('api_key', $request->getParam('api_key'))->first();

        if ($isValidApiKey) {
            $id = $request->getAttribute('id');
            $restaurant = Restaurant::where('id', $id)->get();;
            json_encode($restaurant);
            echo $restaurant;
        } else {
            echo "Wrong API Key";
        }
    }

    // Add new Restaurant

    public function postRestaurant(Request $request, Response $response) {

        $isValidApiKey = User::where('api_key', $request->getParam('api_key'))->first();

        $name = $request->getParam('name');
        $location = $request->getParam('location');
        $menu = $request->getParam('menu');

        if ($isValidApiKey) {
            $restaurant = new Restaurant([
                'name' => $name,
                'location' => $location,
                'menu' => $menu,
            ]);
            $restaurant->save();
        } else {
            echo "Wrong API Key";
        }
    }

    // Update Restaurant

    public function putRestaurant(Request $request, Response $response) {

        $isValidApiKey = User::where('api_key', $request->getParam('api_key'))->first();

        $id = $request->getAttribute('id');

        $name = $request->getParam('name');
        $location = $request->getParam('location');
        $menu = $request->getParam('menu');

        if ($isValidApiKey) {
            $restaurant = Restaurant::where('id', $id)->update([
                'name' => $name,
                'location' => $location,
                'menu' => $menu,
            ]);
        } else {
            echo "Wrong API Key";
        }
    }

    // Delete Restaurant

    public function deleteRestaurant(Request $request, Response $response) {

        $isValidApiKey = User::where('api_key', $request->getParam('api_key'))->first();

        if ($isValidApiKey) {
            $id = $request->getAttribute('id');
            $restaurant = Restaurant::where('id', $id);
            $restaurant->delete();
        } else {
            echo "Wrong API Key";
        }

    }

}