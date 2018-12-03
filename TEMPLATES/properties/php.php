<?php

//--------------------------------------------------Search Page--------------------------------------------------

//(1) Page is bookmarkable
//(2) We are able to go back to this page
//(3) All parameters are optional
$app->get('/', function ($request, $response, $args) {
	
    //-------------------------read in optional parameters
	//Variables from property
	$rentMin = (isset($_GET['rentMin'])) ? $_GET['rentMin'] : null;
	$rentMax = (isset($_GET['rentMax'])) ? $_GET['rentMax'] : null;
	$squareFootageMin = (isset($_GET['squareFootageMin'])) ? $_GET['squareFootageMin'] : null;
	$squareFootageMax = (isset($_GET['squareFootageMax'])) ? $_GET['squareFootageMax'] : null;
	$bedMin = (isset($_GET['bedMin'])) ? $_GET['bedMin'] : null;
	$bedMax = (isset($_GET['bedMax'])) ? $_GET['bedMax'] : null;
	$bathMin = (isset($_GET['bathMin'])) ? $_GET['bathMin'] : null;
	$bathMax = (isset($_GET['bathMax'])) ? $_GET['bathMax'] : null;
	//Variables from address
	$continentTypeID = (isset($_GET['continentTypeID'])) ? $_GET['continentTypeID'] : null;
	$countryTypeID = (isset($_GET['countryTypeID'])) ? $_GET['countryTypeID'] : null;
	$state = (isset($_GET['state'])) ? $_GET['state'] : null;
	$locality = (isset($_GET['locality'])) ? $_GET['locality'] : null;
	$zipCode = (isset($_GET['zipCode'])) ? $_GET['zipCode'] : null;
	//Grab all list type variables (TODO figure out how to extract this data since it should be in json format)
	$applianceTypeIDs = (isset($_GET['applianceTypeIDs'])) ? json_decode($_GET['applianceTypeIDs']) : null;
	$utilityTypeIDs = (isset($_GET['utilityTypeIDs'])) ? json_decode($_GET['utilityTypeIDs']) : null;
	$perkTypeIDs = (isset($_GET['perkTypeIDs'])) ? json_decode($_GET['perkTypeIDs']) : null;
    $amenityTypeIDs = (isset($_GET['amenityTypeIDs'])) ? json_decode($_GET['amenityTypeIDs']) : null;
    
    //-------------------------filter properties

	//Filter out properties that are not available
	$properties = PropertyQuery::create()->filterByAvailable(true)->find(); //only show properties that are currently available
	//=========================Min/Max Calculations
	//Min and Max Slide values for Rent Slider
	$minRentSlide = 0;
	$maxRentSlide = 0;
	foreach ($properties as $property) {
		$rent = $property->getExpectedrentpermonth();
		if($minRentSlide == 0 && $maxRentSlide == 0){
			$minRentSlide=$rent;
			$maxRentSlide=$rent;
			continue;
		}
		if($rent > $maxRentSlide){
			$maxRentSlide = $rent;
		}
		if($rent < $minRentSlide){
			$minRentSlide = $rent;
		}
	}
	//Min and Max Slide values for SqrFootage Slider
	$minFootSlide = 0;
	$maxFootSlide = 0;
	foreach ($properties as $property) {
		$rent = $property->getSquarefootage();
		if($minFootSlide == 0 && $maxFootSlide == 0){
			$minFootSlide=$rent;
			$maxFootSlide=$rent;
			continue;
		}
		if($rent > $maxFootSlide){
			$maxFootSlide = $rent;
		}
		if($rent < $minFootSlide){
			$minFootSlide = $rent;
		}
	}
	//===================================================
	//Gather properties that meet our search requirements
	$desiredPropertyIDs = [];
	foreach($properties as &$property){
		//-----Variables from property
		$rent = $property->getExpectedrentpermonth();
		if($rentMin && $rentMin > $rent) continue;
		if($rentMax && $rent > $rentMax) continue;

		$sqrft = $property->getSquarefootage();
		if($squareFootageMin && $squareFootageMin > $sqrft) continue;
		if($squareFootageMax && $sqrft > $squareFootageMax) continue;

		$bed = $property->getBedroomcount();
		if($bedMin && $bedMin > $bed) continue;
		if($bedMax && $bed > $bedMax) continue;

		$bath = $property->getBathroomcount();
		if($bathMin && $bathMin > $bath) continue;
		if($bathMax && $bath > $bathMax) continue;

		//-----Variables from address
		$propertyAddress = AddressQuery::create()->findPk($property->getAddressid());

		if($continentTypeID && $continentTypeID != $propertyAddress->getContinenttypeid()) continue;
		if($countryTypeID && $countryTypeID != $propertyAddress->getCountrytypeid()) continue;
		if($state && $state != $propertyAddress->getState()) continue;
		if($locality && $locality != $propertyAddress->getLocality()) continue;
		if($zipCode && $zipCode != $propertyAddress->getZipcode()) continue;
		
		//-----Grab all list type variables
        //appliances
        if($applianceTypeIDs){
            $propertyHasAllAppliances = true;
            foreach($applianceTypeIDs as &$applianceTypeID){
                $propertyAppliancesWithTypeID = ApplianceQuery::create()->filterByPropertyid($property->getId())->filterByAppliancetypeid($applianceTypeID)->find();
                if(count($propertyAppliancesWithTypeID) == 0){
                    $propertyHasAllAppliances = false;
                }
            }
            if($propertyHasAllAppliances == false) continue;
        }
        //utilities
        if($utilityTypeIDs){
            $propertyHasAllUtilities = true;
            foreach($utilityTypeIDs as &$utilityTypeID){
                $propertyUtilitiesWithTypeID = UtilityQuery::create()->filterByPropertyid($property->getId())->filterByUtilitytypeid($utilityTypeID)->find();
                if(count($propertyUtilitiesWithTypeID) == 0){
                    $propertyHasAllUtilities = false;
                }
            }
            if($propertyHasAllUtilities == false) continue;
        }
        //perks
        if($perkTypeIDs){
            $propertyHasAllPerks = true;
            foreach($perkTypeIDs as &$perkTypeID){
                $propertyPerksWithTypeID = PerkQuery::create()->filterByPropertyid($property->getId())->filterByPerktypeid($perkTypeID)->find();
                if(count($propertyPerksWithTypeID) == 0){
                    $propertyHasAllPerks = false;
                }
            }
            if($propertyHasAllPerks == false) continue;
        }
        //amenities
        if($amenityTypeIDs){
            $propertyHasAllAmenities = true;
            foreach($amenityTypeIDs as &$amenityTypeID){
                $propertyAmenitiesWithTypeID = AmenityQuery::create()->filterByPropertyid($property->getId())->filterByAmenitytypeid($amenityTypeID)->find();
                if(count($propertyAmenitiesWithTypeID) == 0){
                    $propertyHasAllAmenities = false;
                }
            }
            if($propertyHasAllAmenities == false) continue;
        }

		//since we have meet all the condition because php has not continued to the next iteration
		array_push($desiredPropertyIDs, $property->getId());
    }
    
    //-------------------------pass data to twig template

	//pass the entirety of the database because 
	//(1) we have yet to find a way to do queries inside of the html file with twig
	//(2) filter here is possible but would take quite a while
	$pictures = PictureQuery::create()->find();
	$addresses = AddressQuery::create()->find();
	$continentTypes = ContinenttypeQuery::create()->find(); 
	$countryTypes = CountrytypeQuery::create()->find(); 

	//pass all the parameters and generate the page
	$this->view->render($response, "/properties/html.html", 
		['user'=>current_user(), 
		'search'=>true, 

		//passing all the ids of the objects that meet the query conditions (this is better than passing the IDs of those that didn't)
		'desiredPropertyIDs'=>$desiredPropertyIDs,
		
		//pass all the properties so that we dont need to relaod the page to have a working search
		'properties'=>$properties,
		
		//pass the min and max of slides
		'rentMin'=>$rentMin,
		'rentMax'=>$rentMax,
		'minRentSlide'=>$minRentSlide,
		'maxRentSlide'=>$maxRentSlide,
		'squareFootageMin'=>$squareFootageMin,
		'squareFootageMax'=>$squareFootageMax,
		'minFootSlide'=>$minFootSlide,
		'maxFootSlide'=>$maxFootSlide,

		//passing entire tables that will be filtered later
		'pictures'=>$pictures,
		'addresses'=>$addresses,
		'continentTypes'=>$continentTypes,
		'countryTypes'=>$countryTypes]);
	return $response;
});

//--------------------------------------------------Manage Page--------------------------------------------------

//(1) Page is bookmarkable
//(2) We are able to go back to this page
$app->get('/manage', function ($request, $response, $args) {
	$user = current_user();
	if($user != null){
		$properties = PropertyQuery::create()->filterByUserid($user->getId())->find(); //only show properties that belond to this user
		$pictures = PictureQuery::create()->find(); //pass all the pictures and simply filter through this for every property in the html
		$addresses = AddressQuery::create()->find(); //ditto as above
		$continentTypes = ContinenttypeQuery::create()->find(); //ditto as above
		$countryTypes = CountrytypeQuery::create()->find(); //ditto as above
		$this->view->render($response, "/properties/html.html", 
			['user'=>current_user(), 
			'search'=>false, 
			'properties'=>$properties, 

			'pictures'=>$pictures,
			'addresses'=>$addresses,
			'continentTypes'=>$continentTypes,
			'countryTypes'=>$countryTypes,]);
		return $response;
	}
	else{
		Header("Location: ./authentication");
		exit();
	}
});

?>