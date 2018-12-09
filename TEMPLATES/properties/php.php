<?php
header("Access-Control-Allow-Origin: *");

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

function isNotInMinMax($value, $min, $max){
	if($min && $min > $value) return true;
	else if($max && $max < $value) return true;
	else return false;
}

function failsFilter($filter, $value){
	if($filter && $filter != $value) return true;
	else return false;
}

function failsListFilter($filters, $property, $field){
	if($filters){
		foreach($filters as &$filter){
			$propertyValues = null; //instantiate var

			//grab the proper information
			if($field == "appliance") $propertyValues = ApplianceQuery::create()->filterByPropertyid($property->getId())->filterByAppliancetypeid($filter)->find();
			else if($field == "utility") $propertyValues = UtilityQuery::create()->filterByPropertyid($property->getId())->filterByUtilitytypeid($filter)->find();
			else if($field == "perk") $propertyValues = PerkQuery::create()->filterByPropertyid($property->getId())->filterByPerktypeid($filter)->find();
			else $propertyValues = AmenityQuery::create()->filterByPropertyid($property->getId())->filterByAmenitytypeid($filter)->find();

			if(count($propertyValues) == 0) return true;
		}
		return false; //the loop didn't break so you passed all the filters
	}
	else return false;
}

function returnBool($object){
	if($object) return true;
	else return false;
}

function filter($properties, $returnParams = false){

	//-------------------------read in search parameters

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
	$zipCode = getValue('zipCode');
	//variables form type lists
	$applianceTypeIDs = json_decode(getValue('applianceTypeIDs'));
	$utilityTypeIDs = json_decode(getValue('utilityTypeIDs'));
	$perkTypeIDs = json_decode(getValue('perkTypeIDs'));
	$amenityTypeIDs = json_decode(getValue('amenityTypeIDs'));
	
	//-------------------------fitler with search parameters

	$filteredPropertyIDs = [];
	foreach($properties as &$property){
		//-----Variables from property
		if(isNotInMinMax($property->getExpectedrentpermonth(), $rentMin, $rentMax)) continue;
		if(isNotInMinMax($property->getSquarefootage(), $squareFootageMin, $squareFootageMax)) continue;
		if(isNotInMinMax($property->getBedroomcount(), $bedMin, $bedMax)) continue;
		if(isNotInMinMax($property->getBathroomcount(), $bathMin, $bathMax)) continue;

		//-----Variables from address
		$propertyAddress = AddressQuery::create()->findPk($property->getAddressid());

		if(failsFilter($continentTypeID, $propertyAddress->getContinenttypeid())) continue;
		if(failsFilter($countryTypeID, $propertyAddress->getCountrytypeid())) continue;
		if(failsFilter($state, $propertyAddress->getState())) continue;
		if(failsFilter($locality, $propertyAddress->getLocality())) continue;
		if(failsFilter($zipCode, $propertyAddress->getZipcode())) continue;
		
		//-----Variables from Lists (appliances, utilities, perks, amenities)
		if(failsListFilter($applianceTypeIDs, $property, "appliance")) continue;
		if(failsListFilter($utilityTypeIDs, $property, "utility")) continue;
		if(failsListFilter($perkTypeIDs, $property, "perk")) continue;
		if(failsListFilter($amenityTypeIDs, $property, "amenity")) continue;

		//since we have meet all the condition because php has not continued to the next iteration
		array_push($filteredPropertyIDs, $property->getId());
	}

	//-------------------------return IDs of properties that meet search parameters

	if($returnParams){
		return array(
			//variables from property
			//--Rent
			'rentMin'=>$rentMin,
			'rentMax'=>$rentMax,
			//--Square Footage
			'squareFootageMin'=>$squareFootageMin,
			'squareFootageMax'=>$squareFootageMax,
			//--Bedroom
			'bedMin'=>$bedMin,
			'bedMax'=>$bedMax,
			//--Bathroom
			'bathMin'=>$bathMin,
			'bathMax'=>$bathMax,

			//Variables from address
			'continentTypeID' => $continentTypeID,
			'countryTypeID' => $countryTypeID,
			'state' => $state,
			'locality' => $locality,
			'zipCode' => $zipCode,

			//variables from list
			'applianceTypeIDs' => $applianceTypeIDs,
			'utilityTypeIDs' => $utilityTypeIDs,
			'perkTypeIDs' => $perkTypeIDs,
			'amenityTypeIDs' => $amenityTypeIDs,

			//return the property IDs that meet our filters
			'filteredPropertyIDs' => $filteredPropertyIDs
		);
	}
	else return $filteredPropertyIDs;
}

function useCountUpdate($array, $source){
	for($i = 0; $i < count($array); $i++){
		$item = null;

		//find what table I am trying to update the count for
		if($source == "appliance") $item = AppliancetypeQuery::create()->findOneById($array[$i]);
		else if($source == "utility") $item = AppliancetypeQuery::create()->findOneById($array[$i]);
		else if($source == "perk") $item = AppliancetypeQuery::create()->findOneById($array[$i]);
		else $item = AppliancetypeQuery::create()->findOneById($array[$i]);

		//update the count for the table
		$item->setUsecount($item->getUsecount() + 1);
		$item->save();
	}
}

//--------------------------------------------------Search Page--------------------------------------------------

//-----INITIAL SEARCH
//(1) Page is bookmarkable
//(2) We are able to go back to this page
//(3) All parameters are optional
$app->get('/', function ($request, $response, $args) {
    //-------------------------filter properties

	$properties = PropertyQuery::create()->filterByAvailable(true)->find(); //only show properties that are currently available
	$result = filter($properties, true);

	//-------------------------Increase the use count of each tag

	useCountUpdate($result["applianceTypeIDs"], "appliance");
	useCountUpdate($result["utilityTypeIDs"], "utility");
	useCountUpdate($result["perkTypeIDs"], "perk");
	useCountUpdate($result["amenityTypeIDs"], "amenity");

	//-------------------------calculate min max of sliders

	$actualRentMinMax = getMinMax($properties, "rent");
	$actualSquareFootageMinMax = getMinMax($properties, "sqrft");
	$actualBedMinMax = getMinMax($properties, "bed");
	$actualBathMinMax = getMinMax($properties, "bath");
    
    //-------------------------pass data to twig template

	$this->view->render($response, "/properties/html.html", 
		['user'=>current_user(), 
		'search'=>true, 

		//-------------------------Pass initial filtered properties

		'filteredPropertyIDs'=>$result["filteredPropertyIDs"],

		//-------------------------Pass in all the filters (so we can modify the search bar on initial start up)

		//variables from property
		//--Rent
		'rentMin'=> $result["rentMin"],
		'rentMax'=>$result["rentMax"],
		//--Square Footage
		'squareFootageMin'=>$result["squareFootageMin"],
		'squareFootageMax'=>$result["squareFootageMax"],
		//--Bedroom
		'bedMin'=>$result["bedMin"],
		'bedMax'=>$result["bedMax"],
		//--Bathroom
		'bathMin'=>$result["bathMin"],
		'bathMax'=>$result["bathMax"],

		//Variables from address
		'continentTypeID' => $result["continentTypeID"],
		'countryTypeID' => $result["countryTypeID"],
		'state' => $result["state"],
		'locality' => $result["locality"],
		'zipCode' => $result["zipCode"],

		//variables from list
		'applianceTypeIDs' => $result["applianceTypeIDs"],
		'utilityTypeIDs' => $result["utilityTypeIDs"],
		'perkTypeIDs' => $result["perkTypeIDs"],
		'amenityTypeIDs' => $result["amenityTypeIDs"],

		//-------------------------Pass extra slider params

		//pass the ACTUAL min and max
		//--Rent
		'actualRentMin' => $actualRentMinMax[0],
		'actualRentMax' => $actualRentMinMax[1],
		//--Square Footage
		'actualSquareFootageMin' => $actualSquareFootageMinMax[0],
		'actualSquareFootageMax' => $actualSquareFootageMinMax[1],
		//--Bedroom
		'actualBedMin' => $actualBedMinMax[0],
		'actualBedMax' => $actualBedMinMax[1],
		//--Bathroom
		'actualBathMin' => $actualBathMinMax[0],
		'actualBathMax' => $actualBathMinMax[1],

		//-------------------------Pass database objects used to fill html
		
		//used to fill each property card
		'properties' => $properties,
		'pictures' => PictureQuery::create()->find(), //we will have to filter to find the which tuple(s) belong to which property in the twig template
		'addresses' => AddressQuery::create()->find(), //ditto as above

		//used to populate both drop downs (then the filter selects the correct option)
		'continentTypes' => ContinenttypeQuery::create()->find(),
		'countryTypes' => CountrytypeQuery::create()->find(),

		//used to populate all the chips (after the filter gives each of the chips an id)
		'applianceTypes' => AppliancetypeQuery::create()->find(),
		'utilityTypes' => UtilitytypeQuery::create()->find(),
		'perkTypes' => PerktypeQuery::create()->find(),
		'amenityTypes' => AmenitytypeQuery::create()->find()]);
	return $response;
});

$app->post('/getID', function ($request, $response, $args) {
	$paramName = (isset($_POST['paramName'])) ? $_POST['paramName'] : null;
	$tagName = (isset($_POST['tagName'])) ? $_POST['tagName'] : null;
	$addTag = (isset($_POST['addTag'])) ? $_POST['addTag'] : null;

	//make the tag lower case to increase the chances of a match and to keep things standard
	$tagName = strtolower($tagName);

	if($paramName && $tagName && $addTag) {
		//grab the appropiate id
		$tagID = null;
		if($paramName == "applianceTypeIDs"){
			$applianceType = AppliancetypeQuery::create()->findOneByName($tagName);
			if($applianceType) $tagID = $applianceType->getId();
		}
		else if($paramName == "utilityTypeIDs"){
			$utilityType = UtilitytypeQuery::create()->findOneByName($tagName);
			if($utilityType) $tagID = $utilityType->getId();
		}
		else if($paramName == "perkTypeIDs"){
			$perkType = PerktypeQuery::create()->findOneByName($tagName);
			if($perkType) $tagID = $perkType->getId();
		}
		else{
			$amenityType = AmenitytypeQuery::create()->findOneByName($tagName);
			if($amenityType) $tagID = $amenityType->getId();
		}

		//if the id doesnt exists create the tag
		if(is_null($tagID)){
			if($addTag){
				$newTag = null;
				if($paramName == "applianceTypeIDs") $newTag = new ApplianceType();
				else if($paramName == "utilityTypeIDs") $newTag = new UtilityType();
				else if($paramName == "perkTypeIDs") $newTag = new PerkType();
				else $newTag = new AmenityType();
				$newTag->setName($tagName);
				$newTag->save();
				$tagID = $newTag->getId();
			}
			else $tagID = -1;
		}

		//return required data
		return json_encode(array(
			'paramName' => $paramName,
			'tagName' => $tagName,
			'tagID' => $tagID
		));
	}
});

$app->post('/getList', function ($request, $response, $args) {
	$sectionName = (isset($_POST['sectionName'])) ? $_POST['sectionName'] : null;

	if($sectionName){
		$items = null;
		if($sectionName == "appliancesSection") $items = AppliancetypeQuery::create()->select('name')->orderByUsecount('desc')->find();
		else if($sectionName == "utilitiesSection") $items = UtilitytypeQuery::create()->select('name')->orderByUsecount('desc')->find();
		else if($sectionName == "perksSection") $items = PerktypeQuery::create()->select('name')->orderByUsecount('desc')->find();
		else $items = AmenitytypeQuery::create()->select('name')->orderByUsecount('desc')->find();

		//for some reason this works over returning the $items array 
		//because aparently that isnt an array? 
		//perhaps a similar to issue to require ->find() in only some querries
		$allWords = array_fill(0, count($items), 0);
		for($i = 0; $i < count($items); $i++){
			$allWords[$i] = $items[$i];
		}

		//TODO... sort words on use count

		return json_encode(array(
			'allWords' => $allWords,
			'sectionName' => $sectionName
		));
	}
	else return "REQUIRE VARIABLE";
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