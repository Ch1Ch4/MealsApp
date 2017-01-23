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

class RestaurantController extends Controller {

    public function getAllRestaurants($request, $response) {

        $restaurants = Restaurant::all();
        $this->container->view->getEnvironment()->addGlobal('restaurants', $restaurants);

        return $this->view->render($response, 'restaurants.twig');
    }

}