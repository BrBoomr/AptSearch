<?php

use Base\Phone as BasePhone;

/**
 * Skeleton subclass for representing a row from the 'phone' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Phone extends BasePhone
{
    // function that displays the full phone number in the following format:
    // {description} | {(areaCode)} {number} ext {extension}
    public function getFullPhone(){
        $description = $this->getDescription();
        $areaCode = $this->getAreacode();
        $number = $this->getNumber();
        $extension = $this->getExtension();

        $fullNumber = $description . " | " . "(" . $areaCode . ") " . $number;
        // If exension exists then add it to the string
        if ($extension){
            $fullNumber = $fullNumber . "ext " . $extension;
        }

        return $fullNumber;
    }
    public function getId(){
        return $this->getPhonenumberid();
    }
}
