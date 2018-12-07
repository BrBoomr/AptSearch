<?php

//-------------------------ADD PROPERTY PAGE-------------------------

//TODO... 
//(DONE)(1) needs to use post (params passed not in url) => so that the page is not bookmarkable
//(DONE)(2) plan for going to the page without parameters
//(3) this page should also be replaced after changes SAVED or DISCARDED
//		[a] replace it with new page (IF previous page != next page)
//		[b] replace it with the previous page (IF previous page == next page)
//		[*] replacement occurs so you cant go back to the same page
//TODO switch to fully client side checks
$app->post('/addProperty', function ($request, $response, $args) {
	$user = current_user();
	if($user != null){
		$this->view->render($response, "property/html.html",
			['user'=>$user, 
			'add'=>true,
			'applianceQuery'=>AppliancetypeQuery::create()->find(),
			'utilityQuery'=>UtilitytypeQuery::create()->find(),
			'perkQuery'=>PerktypeQuery::create()->find(),
			'amenityQuery'=>AmenitytypeQuery::create()->find()]);
		return $response;
	}
	else{
		Header("Location: ./authentication");
		exit();
	}
});
$app->post('/verifyProperty', function ($request, $response, $args) {
	$fields = $this->request->getParam("field");
	$appliance = $this->request->getParam("appliance");
	$utility = $this->request->getParam("utility");
	$perk = $this->request->getParam("perk");
	$amenity = $this->request->getParam("amenity");
	foreach($fields as $key=>$value){
		if(empty($value)){
			return json_encode(['valid'=>'false']);
			exit();
		}
	}
	createProperty($fields,$appliance,$utility,$perk,$amenity);
	return json_encode(['valid'=>'true']);
});


$app->post('/verifyProperty/edit', function ($request, $response, $args) {
    $fields = $_POST;
	foreach($fields as $field){
		if(empty($field)){
			return json_encode(['valid'=>'false']);
		}
	}
	updateProperty($fields, $fields['propertyID']);
	return json_encode(['valid'=>'true']);
});

function createProperty($fields,$appliance,$utility,$perk,$amenity){
	//Address Values
	$newAddr = new Address();
	$newAddr->setContinenttypeid(1); //DEFAULT US
	$newAddr->setCountrytypeid(321); //DEFAULT US
	$newAddr->setState($fields['state']);
	$newAddr->setLocality($fields['locality']);
	$newAddr->setZipcode($fields['zip']);
	$newAddr->setStreetname($fields['street']);
	$newAddr->setBuildingindentifier($fields['buildNum']);
	$newAddr->setApartmentidentifier($fields['aptNum']);
	$newAddr->save();
	//Property Values
	$newProperty = new Property();
	$newProperty->setAddressid($newAddr->getId());
	$newProperty->setUserid(current_user()->getId());
	$newProperty->setPostname($fields['postName']);
	$newProperty->setAvailable(true);
	$newProperty->setExpectedrentpermonth($fields['rent']);
	$newProperty->setSquarefootage($fields['sqrFootage']);
	$newProperty->setBedroomcount($fields['bedrooms']);
	$newProperty->setBathroomcount($fields['bathrooms']);
	$newProperty->save();
	//Optional Feature Values
	foreach ($appliance as $key => $value) {
		if($value=="true"){
			$newAppliance = new Appliance();
			$newAppliance->setPropertyid($newProperty->getId());
			$newAppliance->setTypeIDByName($key);
			$newAppliance->save();
		}
	}
	foreach ($utility as $key => $value) {
		if($value=="true"){
			$newUtility = new Utility();
			$newUtility->setPropertyid($newProperty->getId());
			$newUtility->setTypeIDByName($key);
			$newUtility->save();
		}
	}
	foreach ($perk as $key => $value) {
		if($value=="true"){
			$newPerk = new Perk();
			$newPerk->setPropertyid($newProperty->getId());
			$newPerk->setTypeIDByName($key);
			$newPerk->save();
		}
	}
	foreach ($amenity as $key => $value) {
		if($value=="true"){
			$newAmenity = new Amenity();
			$newAmenity->setPropertyid($newProperty->getId());
			$newAmenity->setTypeIDByName($key);
			$newAmenity->save();
		}
	}	
}
//FOR DEBUGGIN PURPOSES
$app->get('/printArrays', function ($request, $response, $args) {
	$field = $this->request->getParam("field");
	$appliance = $this->request->getParam("appliance");
	$utility = $this->request->getParam("utility");
	$perk = $this->request->getParam("perk");
	$amenity = $this->request->getParam("amenity");
	foreach ($field as $key => $value) {
		echo $key."=>".$value."<br>";
	}
	echo "<br>";
	foreach ($appliance as $key => $value) {
		echo $key."=>".$value."<br>";
	}
	echo "<br>";
	foreach ($utility as $key => $value) {
		echo $key."=>".$value."<br>";
	}
	echo "<br>";
	foreach ($perk as $key => $value) {
		echo $key."=>".$value."<br>";
	}
	echo "<br>";
	foreach ($amenity as $key => $value) {
		echo $key."=>".$value."<br>";
	}
	echo "<br>";
	echo "=============================<br>";
	foreach ($appliance as $key => $value) {
		echo gettype($value);
	}
	
});
//-------------------------EDIT PROPERTY PAGE-------------------------

//TODO... 
//(1) needs to use post (params passed not in url) => so that the page is not bookmarkable
//(2) plan for going to the page without parameters
//(3) this page should also be replaced after changes SAVED or DISCARDED
//		[a] replace it with new page (IF previous page != next page)
//		[b] replace it with the previous page (IF previous page == next page)
//		[*] replacement occurs so you cant go back to the same page
//TODO switch to fully client side checks
$app->get('/editProperty', function ($request, $response, $args) {
	$user = current_user();
	//TODO implement isset() check
	$property = PropertyQuery::create()->findPk($_GET['propertyID']);
		
	if($user != null){
		$this->view->render($response, "property/html.html",
			['user'=>$user, 
			'property'=>$property,
			'applianceQuery'=>AppliancetypeQuery::create()->find(),
			'utilityQuery'=>UtilitytypeQuery::create()->find(),
			'perkQuery'=>PerktypeQuery::create()->find(),
			'amenityQuery'=>AmenitytypeQuery::create()->find(), 
			'add'=>false]);
		return $response;
	}
	else{
		Header("Location: ./authentication");
		exit();
	}
});



function updateProperty($fields, $propertyID){
	
	$editProperty = PropertyQuery::create()->findPk($propertyID);
	$editProperty->setPostname($fields['postName']);
	$editProperty->setAvailable(true);
	$editProperty->setExpectedrentpermonth($fields['rent']);
	$editProperty->setSquarefootage($fields['sqrFootage']);
	$editProperty->setBedroomcount($fields['bedrooms']);
	$editProperty->setBathroomcount($fields['bathrooms']);
	$editProperty->save();

	$editAddr = AddressQuery::create()->findPk($editProperty->getAddressid());
	$editAddr->setState($fields['state']);
	$editAddr->setLocality($fields['locality']);
	$editAddr->setZipcode($fields['zip']);
	$editAddr->setStreetname($fields['street']);
	$editAddr->setBuildingindentifier($fields['buildNum']);
	$editAddr->setApartmentidentifier($fields['aptNum']);
	$editAddr->save();
}


//FOR DEBUGGIN PURPOSES
$app->get('/editArrays', function ($request, $response, $args) {
	/*
	$appliance = AppliancetypeQuery::create()->findPk(1)->getApplianceRow(69);
	echo $appliance->getId();'
	*/
	$user = current_user();
	//TODO implement isset() check
	$property = PropertyQuery::create()->findPk($_GET['propertyID']);
});


?>