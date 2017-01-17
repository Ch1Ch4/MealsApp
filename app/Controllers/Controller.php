<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 1/17/2017
 * Time: 1:25 PM
 */

namespace App\Controllers;

class Controller {

    public function __construct($container) {
        $this->container = $container;
    }

    public function __get($property) {
        if ($this->container->{$property}) {
            return $this->container->{$property};
        }
    }

}