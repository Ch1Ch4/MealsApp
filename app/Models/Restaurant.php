<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 1/17/2017
 * Time: 3:32 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Restaurant extends Model {

    protected $table = 'restaurants';

    protected $fillable = [
        'name',
        'location',
        'menu',
    ];
}