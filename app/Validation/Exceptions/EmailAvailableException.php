<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 1/20/2017
 * Time: 3:27 PM
 */

namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class EmailAvailableException extends ValidationException {

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Email is already taken',
        ],
    ];
}