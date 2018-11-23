<?php

use Base\User as BaseUser;

/**
 * Skeleton subclass for representing a row from the 'user' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class User extends BaseUser
{
    /**
     * @param String $password
     */
    public function setPassword($password){
        $this->setHashedpassword(password_hash($password, PASSWORD_DEFAULT));
    }

    /**
     * @param String $password
     */
    public function login($password){
        $hash = $this->getHashedpassword();
        return password_verify($password,$hash);
    }
}
