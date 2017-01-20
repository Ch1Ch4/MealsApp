<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 1/20/2017
 * Time: 12:51 PM
 */

namespace App\Middleware;

class Middleware {

    protected $container;

    public function __construct($container) {

        $this->container = $container;

    }
}