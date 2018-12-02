<?php

use Base\Property as BaseProperty;

/**
 * Skeleton subclass for representing a row from the 'property' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Property extends BaseProperty
{
    //USER INFORMATION
    public function getOwnerName(){
        $owner = UserQuery::create()->findPk($this->getUserid());
        return $owner->getName();
    }

    //ADDRESS INFORMATION
    public function getState(){
        $address = AddressQuery::create()->findPk($this->getAddressid());
        return $address->getState();
    }
    public function getLocality(){
        $address = AddressQuery::create()->findPk($this->getAddressid());
        return $address->getLocality();
    }
    public function getZipcode(){
        $address = AddressQuery::create()->findPk($this->getAddressid());
        return $address->getZipcode();
    }
    public function getBuildingindentifier(){
        $address = AddressQuery::create()->findPk($this->getAddressid());
        return $address->getBuildingindentifier();
    }
    public function getApartmentidentifier(){
        $address = AddressQuery::create()->findPk($this->getAddressid());
        return $address->getApartmentidentifier();
    }
    public function getStreetname(){
        $address = AddressQuery::create()->findPk($this->getAddressid());
        return $address->getStreetname();
    }
}
