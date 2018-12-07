<?php

use Base\Amenitytype as BaseAmenitytype;

/**
 * Skeleton subclass for representing a row from the 'amenitytype' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Amenitytype extends BaseAmenitytype
{
    public function getAmenityRow($propertyID){
        $amenityType = $this->getId();
        $amenity = AmenityQuery::create()->filterByPropertyid($propertyID)->findOneByAmenitytypeid($amenityType);
        return $amenity;
    }
}
