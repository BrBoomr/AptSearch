<?php

use Base\Perk as BasePerk;

/**
 * Skeleton subclass for representing a row from the 'perk' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Perk extends BasePerk
{
    public function getPerk(){
        $perk = PerktypeQuery::create()->findPK($this->getPerktypeid());
        $name = $perk->getName();
        $details = $this->getDetails();
        // sets the outputed format to {applianceName} | {details}
        if ($details){
            return $name . ' | ' . $details;
        }
        // if there is no details, then the outputed format is just {applianceName}
        return $name;
    }
}
