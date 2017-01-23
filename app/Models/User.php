<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 1/17/2017
 * Time: 3:32 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class User extends Model {

    protected $table = 'users';

    protected $fillable = [
        'email',
        'name',
        'password',
    ];

    public function setPassword($password) {
        $this->update([
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }
}