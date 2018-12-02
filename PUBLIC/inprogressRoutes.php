<?php

//FOR UNREFINED ROUTES

//--------------------------------------------------MUST BE AUTHENTICATED--------------------------------------------------

//-------------------------MANAGE PAGE-------------------------

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

//-------------------------SETTINGS PAGE-------------------------

//(1) Page is bookmarkable
//(2) We are able to go back to this page
//TODO switch to fully client side checks
$app->get('/settings', function ($request, $response, $args) {
	$user = current_user();
	if($user != null){
		$this->view->render($response, "settings/html.html",
			['user'=>$user, 'phoneQuery'=>$user->getAllPhones()]);
		return $response;
	}
	else{
		Header("Location: ./authentication");
		exit();
	}
});

$app->get('/settings/verify', function ($request, $response, $args) {
	if(empty($_GET['name']) || empty($_GET['email'])){
		if($_GET['name']==current_user()->getName()){
			//echo "Same Name!<br>";
		}
		else{
			current_user()->setName($_GET['name']);
		}
		if($_GET['email']==current_user()->getEmail()){
			//echo "Same Email!<br>";
		}
		else{
			current_user()->setEmail($_GET['email']);
		}
	}
	else if(empty($_GET['newPassword']) && empty($_GET['confirmPassword'])){
		if($_GET['newPassword'] == $_GET['confirmPassword']){

		}
		else{

		}
	}
	else{
		
	}
});

//-------------------------ADD PROPERTY PAGE-------------------------

//TODO... 
//(1) needs to use post (params passed not in url) => so that the page is not bookmarkable
//(2) plan for going to the page without parameters
//(3) this page should also be replaced after changes SAVED or DISCARDED
//		[a] replace it with new page (IF previous page != next page)
//		[b] replace it with the previous page (IF previous page == next page)
//		[*] replacement occurs so you cant go back to the same page
//TODO switch to fully client side checks
$app->get('/addProperty', function ($request, $response, $args) {
	$user = current_user();
	if($user != null){
		$this->view->render($response, "addProperty/html.html",
			['user'=>$user]);
		return $response;
	}
	else{
		Header("Location: ./authentication");
		exit();
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
$app->post('/editProperty', function ($request, $response, $args) {
	$id = $request->getParsedBody()['id'];
	//TODO... what happens when we don't pass it a paramters?!
	$property = PropertyQuery::create()->findPk($id);
	$user = current_user();
	if($user != null){
		$this->view->render($response, "editProperty/html.html",
			['user'=>$user, 'property'=>$property]);
		return $response;
	}
	else{
		Header("Location: ./authentication");
		exit();
	}
});

//-------------------------UI TEST ROUTES-------------------------

$app->get('/properties', function ($request, $response, $args) {
	$this->view->render($response, "properties/html.html",
		['user'=>$user, 'search'=>true]);
	return $response;
});

//-------------------------TEMPLATE ROUTE-------------------------

$app->get('/TEMPLATE', function ($request, $response, $args) {
	$this->view->render($response, "TEMPLATE/html.html",
		['user'=>$user]);
	return $response;
});

//--------------------------------------------------IDK LOOKS IMPORTANT--------------------------------------------------

$app->post('/verify_property', function ($request, $response, $args) {
	//$fields = $this->request->getQueryParams();
	$fields = $_POST;
	foreach($fields as $field){
		if(empty($field)){
			return json_encode(['valid'=>'false']);
		}
	}
	createProperty($fields);
	return json_encode(['valid'=>'true']);
});

function createProperty($fields){
	$newAddr = new Address();
	$newAddr->setContinenttypeid(1);
	$newAddr->setCountrytypeid(321);
	$newAddr->setState($fields['state']);
	$newAddr->setLocality($fields['locality']);
	$newAddr->setZipcode($fields['zip']);
	$newAddr->setStreetname($fields['street']);
	$newAddr->setBuildingindentifier($fields['buildNum']);
	$newAddr->setApartmentidentifier($fields['aptNum']);
	$newAddr->save();

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
}
?>