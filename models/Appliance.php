<?php

use Base\Appliance as BaseAppliance;

/**
 * Skeleton subclass for representing a row from the 'appliance' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Appliance extends BaseAppliance
{
    public function getId(){
        return $this->getAppliancenumberid();
    }
    
    public function getAppliance(){
        $appliances = AppliancetypeQuery::create()->findPK($this->getAppliancetypeid());
        $name = $appliances->getName();
        $details = $this->getDetails();
        // sets the outputed format to {applianceName} | {details}
        if ($details){
            return $name . ' | ' . $details;
        }
        // if there is no details, then the outputed format is just {applianceName}
        return $name;
    }

    public function setTypeIDByName($name){
        $applianceType = AppliancetypeQuery::create()->findOneByName($name);
        $this->setAppliancetypeid($applianceType->getId());
    }

    public function getId(){
        return $this->getAppliancenumberid();
    }
}
