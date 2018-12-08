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

// Server Side verification code here
$app->post('/verifyProperty/edit', function ($request, $response, $args) {
    $fields = $this->request->getParam("field");
	$selectAppliance = $this->request->getParam("appliance");
	$selectUtility = $this->request->getParam("utility");
	$selectPerk = $this->request->getParam("perk");
	$selectAmenity = $this->request->getParam("amenity");

	foreach($fields as $field){
		if(empty($field)){
			return json_encode(['valid'=>'false']);
		}
	}
	updateProperty($fields, $selectAppliance,$selectUtility,$selectPerk,$selectAmenity);
	return json_encode(['valid'=>'true']);
});

$app->post('/verifyProperty/pic', function($request, $response, $args){
	// It's getParsedBody() when passing the params as TEXT
	$pictureURL = $request->getParsedBody()['pictureURL'];
	$pictureDescription = $request->getParsedBody()['pictureDescription'];
	$propertyID = $request->getParsedBody()['propertyID'];

	$newPicture = new Picture();
	$newPicture->setPropertyid($propertyID);
	$newPicture->setLink($pictureURL);
	$newPicture->setDetails($pictureDescription);
	$newPicture->save();

	$data = array('success'=>true);
    $response = $response->withJson($data);
    return $response;
});



function updateProperty($fields, $selectAppliance,$selectUtility,$selectPerk,$selectAmenity){
	
	$editProperty = PropertyQuery::create()->findPk($fields['propertyID']);
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

	foreach ($selectAppliance as $key => $value) {
		//echo $key."=>".$value."<br>";
		$appliance = AppliancetypeQuery::create()->findOneByName($key)->getApplianceRow($editProperty->getId());
		if ($value=="true"){
			//Find it in Appliance. If already True, don't add.
			if($appliance){
				//echo $key." Found!<br>";
			}
			else{
				//echo $key." Not Found!<br>";
				$newAppliance = new Appliance();
				$newAppliance->setPropertyid($editProperty->getId());
				$newAppliance->setTypeIDByName($key);
				$newAppliance->save();
				//echo $key." added !<br>";
			}
		}
		else{
			//Find it in Appliance. If true in the table, delete the row.
			//$appliance = AppliancetypeQuery::create()->findOneByName($key)->getApplianceRow($property->getId());
			if($appliance){
				//echo $key." Deleted!<br>";
				$appliance->delete();
			}
		}
	}
	//echo "<hr>";
	foreach ($selectUtility as $key => $value) {
		//echo $key."=>".$value."<br>";
		$utility = UtilitytypeQuery::create()->findOneByName($key)->getUtilityRow($editProperty->getId());
		if ($value=="true"){
			//Find it in Table. If already True, don't add.
			
			if($utility){
				//echo $key." Found!<br>";
			}
			else{
				//echo $key." Not Found!<br>";
				$newUtility = new Utility();
				$newUtility->setPropertyid($editProperty->getId());
				$newUtility->setTypeIDByName($key);
				$newUtility->save();
				//echo $key." added !<br>";
			}
		}
		else{
			//Find it in Table. If true in the table, delete the row.
			//$utility = UtilitytypeQuery::create()->findOneByName($key)->getUtilityRow($property->getId());
			if($utility){
				//echo $key." Deleted!<br>";
				$utility->delete();
			}
		}
	}
	//echo "<hr>";
	foreach ($selectPerk as $key => $value) {
		//echo $key."=>".$value."<br>";
		$perk = PerktypeQuery::create()->findOneByName($key)->getPerkRow($editProperty->getId());
		if ($value=="true"){
			//Find it in Table. If already True, don't add.
			
			if($perk){
				//echo $key." Found!<br>";
			}
			else{
				//echo $key." Not Found!<br>";
				$newPerk = new Perk();
				$newPerk->setPropertyid($editProperty->getId());
				$newPerk->setTypeIDByName($key);
				$newPerk->save();
				//echo $key." added !<br>";
			}
		}
		else{
			//Find it in Table. If true in the table, delete the row.
			//$perk = PerktypeQuery::create()->findOneByName($key)->getPerkRow($property->getId());
			if($perk){
				//echo $key." Deleted!<br>";
				$perk->delete();
			}
		}
	}
	//echo "<hr>";
	foreach ($selectAmenity as $key => $value) {
		//echo $key."=>".$value."<br>";
		$amenity = AmenitytypeQuery::create()->findOneByName($key)->getAmenityRow($editProperty->getId());
		if ($value=="true"){
			//Find it in Table. If already True, don't add.
			if($amenity){
				//echo $key." Found!<br>";
			}
			else{
				//echo $key." Not Found!<br>";
				$newAmenity = new Amenity();
				$newAmenity->setPropertyid($editProperty->getId());
				$newAmenity->setTypeIDByName($key);
				$newAmenity->save();
				//echo $key." added !<br>";
			}
		}
		else{
			//Find it in Table. If true in the table, delete the row.
			//$amenity = AmenitytypeQuery::create()->findOneByName($key)->getAmenityRow($property->getId());
			if($amenity){
				//echo $key." Deleted!<br>";
				$amenity->delete();
			}
		}
	}
}
//FOR DEBUGGIN PURPOSES
$app->get('/editArrays', function ($request, $response, $args) {
	/*
	$appliance = AppliancetypeQuery::create()->findPk(1)->getApplianceRow(69);
	echo $appliance->getId();'
	*/
	$user = current_user();
	//TODO implement isset() check
	$field = $this->request->getParam("field");

	$property = PropertyQuery::create()->findPk($field['propertyID']);

	$selectAppliance = $this->request->getParam("appliance");
	$selectUtility = $this->request->getParam("utility");
	$selectPerk = $this->request->getParam("perk");
	$selectAmenity = $this->request->getParam("amenity");
	//If the checkbox is turned off BUT the row is found for said item, delete it from the table.
	foreach ($selectAppliance as $key => $value) {
		//echo $key."=>".$value."<br>";
		$appliance = AppliancetypeQuery::create()->findOneByName($key)->getApplianceRow($property->getId());
		if ($value=="true"){
			//Find it in Appliance. If already True, don't add.
			if($appliance){
				echo $key." Found!<br>";
			}
			else{
				//echo $key." Not Found!<br>";
				$newAppliance = new Appliance();
				$newAppliance->setPropertyid($property->getId());
				$newAppliance->setTypeIDByName($key);
				echo $key." added !<br>";
			}
		}
		else{
			//Find it in Appliance. If true in the table, delete the row.
			//$appliance = AppliancetypeQuery::create()->findOneByName($key)->getApplianceRow($property->getId());
			if($appliance){
				echo $key." Deleted!<br>";
			}
		}
	}
	echo "<hr>";
	foreach ($selectUtility as $key => $value) {
		//echo $key."=>".$value."<br>";
		$utility = UtilitytypeQuery::create()->findOneByName($key)->getUtilityRow($property->getId());
		if ($value=="true"){
			//Find it in Table. If already True, don't add.
			
			if($utility){
				echo $key." Found!<br>";
			}
			else{
				//echo $key." Not Found!<br>";
				$newUtility = new Utility();
				$newUtility->setPropertyid($property->getId());
				$newUtility->setTypeIDByName($key);
				echo $key." added !<br>";
			}
		}
		else{
			//Find it in Table. If true in the table, delete the row.
			//$utility = UtilitytypeQuery::create()->findOneByName($key)->getUtilityRow($property->getId());
			if($utility){
				echo $key." Deleted!<br>";
			}
		}
	}
	echo "<hr>";
	foreach ($selectPerk as $key => $value) {
		//echo $key."=>".$value."<br>";
		$perk = PerktypeQuery::create()->findOneByName($key)->getPerkRow($property->getId());
		if ($value=="true"){
			//Find it in Table. If already True, don't add.
			
			if($perk){
				echo $key." Found!<br>";
			}
			else{
				//echo $key." Not Found!<br>";
				$newPerk = new Perk();
				$newPerk->setPropertyid($property->getId());
				$newPerk->setTypeIDByName($key);
				echo $key." added !<br>";
			}
		}
		else{
			//Find it in Table. If true in the table, delete the row.
			//$perk = PerktypeQuery::create()->findOneByName($key)->getPerkRow($property->getId());
			if($perk){
				echo $key." Deleted!<br>";
			}
		}
	}
	echo "<hr>";
	foreach ($selectAmenity as $key => $value) {
		//echo $key."=>".$value."<br>";
		$amenity = AmenitytypeQuery::create()->findOneByName($key)->getAmenityRow($property->getId());
		if ($value=="true"){
			//Find it in Table. If already True, don't add.
			if($amenity){
				echo $key." Found!<br>";
			}
			else{
				//echo $key." Not Found!<br>";
				$newAmenity = new Amenity();
				$newAmenity->setPropertyid($property->getId());
				$newAmenity->setTypeIDByName($key);
				echo $key." added !<br>";
			}
		}
		else{
			//Find it in Table. If true in the table, delete the row.
			//$amenity = AmenitytypeQuery::create()->findOneByName($key)->getAmenityRow($property->getId());
			if($amenity){
				echo $key." Deleted!<br>";
			}
		}
	}
	
});


?>