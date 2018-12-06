<?php

//--------------------------------------------------Functions--------------------------------------------------

function getValue($name){
	return (isset($_GET[$name])) ? $_GET[$name] : null;
}

function postValue($name){
	return (isset($_POST[$name])) ? $_POST[$name] : null;
}

function getMinMax($properties, $field){
	$min = 32766; //16 bit signed int max (-1 for good measure)
	$max = -32767; //16 bit signed int min (+1 for good measure)
	foreach($properties as $property){
		$value = null;
		
		//grab the correct value
		if($field == "rent") $value = $property->getExpectedrentpermonth();
		else if($field == "bed") $value = $property->getBedroomcount();
		else if($field == "bath") $value = $property->getBathroomcount();
		else $value = $property->getSquarefootage();

		//check if we have a new min or max
		$min = ($min < $value) ? $min : $value;
		$max = ($value < $max) ? $max : $value;
	}
	return [$min, $max];
}

//--------------------------------------------------Search Page--------------------------------------------------

//(1) Page is bookmarkable
//(2) We are able to go back to this page
//(3) All parameters are optional
$app->get('/', function ($request, $response, $args) {
	
    //-------------------------read in optional parameters
	//Variables from property
	$rentMin = getValue('rentMin');
	$rentMax = getValue('rentMax');
	$squareFootageMin = getValue('squareFootageMin');
	$squareFootageMax = getValue('squareFootageMax');
	$bedMin = getValue('bedMin');
	$bedMax = getValue('bedMax');
	$bathMin = getValue('bathMin');
	$bathMax = getValue('bathMax');
	//Variables from address
	$continentTypeID = getValue('continentTypeID');
	$countryTypeID = getValue('countryTypeID');
	$state = getValue('state');
	$locality = getValue('locality');
	$zipCode = getValue('locality');
	//Grab all list type variables (TODO figure out how to extract this data since it should be in json format)
	$applianceTypeIDs = getValue('applianceTypeIDs');
	$utilityTypeIDs = getValue('utilityTypeIDs');
	$perkTypeIDs = getValue('perkTypeIDs');
    $amenityTypeIDs = getValue('amenityTypeIDs');
    
    //-------------------------filter properties

	//Filter out properties that are not available
	$properties = PropertyQuery::create()->filterByAvailable(true)->find(); //only show properties that are currently available

	$rentMinMax = getMinMax($properties, "rent");
	$sqrftMinMax = getMinMax($properties, "sqrft");
	$bedMinMax = getMinMax($properties, "bed");
	$bathMinMax = getMinMax($properties, "bath");

	//-------------------------Gather properties that meet our search requirements(for initial display)

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

		/*
		function hasAll($param, $property){

		}
		*/
		
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
	//(2) if we don't do the above we will be force to reload the page or make significant additions to it to display new properties
	$pictures = PictureQuery::create()->find();
	$addresses = AddressQuery::create()->find();

	//pass all the things we search on
	$continentTypes = ContinenttypeQuery::create()->find(); 
	$countryTypes = CountrytypeQuery::create()->find(); 
	$applianceTypes = 

	//pass all the parameters and generate the page
	$this->view->render($response, "/properties/html.html", 
		['user'=>current_user(), 
		'search'=>true, 

		//passing all the ids of the objects that meet the query conditions (this is better than passing the IDs of those that didn't)
		'desiredPropertyIDs'=>$desiredPropertyIDs,
		
		//pass all the properties so that we dont need to relaod the page to have a working search
		'properties'=>$properties,
		
		//pass the min and max of slides
		//--Rent
		'rentMin'=>$rentMin,
		'rentMax'=>$rentMax,
		'minRentSlide'=>$rentMinMax[0],
		'maxRentSlide'=>$rentMinMax[1],
		//--Square Footage
		'squareFootageMin'=>$squareFootageMin,
		'squareFootageMax'=>$squareFootageMax,
		'minFootSlide'=>$sqrftMinMax[0],
		'maxFootSlide'=>$sqrftMinMax[1],
		//--Bedroom
		'bedMin'=>$bedMin,
		'bedMax'=>$bedMax,
		'minBedroomSlide'=>$bedMinMax[0],
		'maxBedroomSlide'=>$bedMinMax[1],
		//--Bathroom
		'bathMin'=>$bathMin,
		'bathMax'=>$bathMax,
		'minBathroomSlide'=>$bathMinMax[0],
		'maxBathroomSlide'=>$bathMinMax[1],
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