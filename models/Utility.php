<?php

use Base\Utility as BaseUtility;

/**
 * Skeleton subclass for representing a row from the 'utility' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Utility extends BaseUtility
{
    public function getUtility(){
        $utility = UtilitytypeQuery::create()->findPK($this->getUtilitytypeid());
        $name = $utility->getName();
        $details = $this->getDetails();
        // sets the outputed format to {utility} | {details}
        if ($details){
            return $name . ' | ' . $details;
        }
        // if there is no details, then the outputed format is just {utility}
        return $name;
    }
}
