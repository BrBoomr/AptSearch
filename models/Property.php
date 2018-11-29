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
    public function getOwnerName(){
        $owner = UserQuery::create()->findPk($this->getUserid());
        return $owner->getName();
    }

    public function getAddressName(){
        $address = AddressQuery::create()->findPk($this->getAddressid());
        return $address->getStreetname();
    }
}
