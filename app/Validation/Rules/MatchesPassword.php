<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 1/23/2017
 * Time: 2:19 PM
 */

namespace App\Validation\Rules;

use App\Models\User;
use Respect\Validation\Rules\AbstractRule;

class MatchesPassword extends AbstractRule {

    public function __construct($password) {

        $this->password = $password;

    }

    public function validate($input) {

        return password_verify($input, $this->password);

    }

}