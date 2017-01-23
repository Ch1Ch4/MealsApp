<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 1/23/2017
 * Time: 2:22 PM
 */

namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class MatchesPasswordException extends ValidationException {

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Password does not match.',
        ],
    ];
}