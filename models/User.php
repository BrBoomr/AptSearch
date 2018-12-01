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
    public function setPassword($password){
		$this->setEncryptedpassword(password_hash($password,PASSWORD_DEFAULT));
	}

	public function login($password){
		$hash=$this->getEncryptedpassword();
		return password_verify($password,$hash);
	}

	public function getAllPhones(){
		$phoneQuery = PhoneQuery::create()->filterByUserid($this->getId());
		return (isset($phoneQuery) ? $phoneQuery : null);
	}
}
