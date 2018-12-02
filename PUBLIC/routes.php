<?php
//-------------------------FUNCTIONS-------------------------

function current_user(){
	if(isset($_SESSION['user'])) return $_SESSION['user'];
	else return null;
}

//--------------------------------------------------AUTHENTICATION AS SETTING--------------------------------------------------

//-------------------------SEARCH PAGE-------------------------

//(1) Page is bookmarkable
//(2) We are able to go back to this page
//(3) All parameters are optional
$app->get('/', function ($request, $response, $args) {
	//Variables from property
	$rentMin = $_GET['rentMin'];
	$rentMax = $_GET['rentMax'];
	$squareFootageMin = $_GET['squareFootageMin'];
	$squareFootageMax = $_GET['squareFootageMax'];
	$bedMin = $_GET['bedMin'];
	$bedMax = $_GET['bedMax'];
	$bathMin = $_GET['bathMin'];
	$bathMax = $_GET['bathMax'];
	//Variables from address
	$continentTypeID = $_GET['continentTypeID']; //tested
	$countryTypeID = $_GET['countryTypeID']; //tested
	$state = $_GET['state'];
	$locality = $_GET['locality'];
	$zipCode = $_GET['zipCode'];
	//Grab all list type variables (TODO figure out how to extract this data since it should be in json format)
	$applianceTypeIDs = json_decode($_GET['applianceTypeIDs']);
	$utilityTypeIDs = $_GET['utilityTypeIDs'];
	$perkTypeIDs = $_GET['perkTypeIDs'];
	$amenityTypeIDs = $_GET['amenityTypeIDs'];

	//Filter out properties that are not available
	$properties = PropertyQuery::create()->filterByAvailable(true)->find(); //only show properties that are currently available

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
		$propertyAddress = AddressQuery::create()->findPk($property->getAddressid())->find();

		if($continentTypeID && $continentTypeID != $propertyAddress->getContinenttypeid()) continue;
		if($countryTypeID && $countryTypeID != $propertyAddress->getCountrytypeid()) continue;
		if($state && $state != $propertyAddress->getState()) continue;
		if($locality && $locality != $propertyAddress->getLocality()) continue;
		if($zipCode && $zipCode != $propertyAddress->getZipcode()) continue;
		
		//-----Grab all list type variables
		//appliances
		$propertyHasAllAppliances = true; //tested
		foreach($applianceTypeIDs as &$applianceTypeID){
			$propertyAppliancesWithTypeID = ApplianceQuery::create()->filterByPropertyid($property->getId())->filterByAppliancetypeid($applianceTypeID)->find();
			if(count($propertyAppliancesWithTypeID) == 0){
				$propertyHasAllAppliances = false;
			}
		}
		if($propertyHasAllAppliances == false) continue;
		//utilities
		$propertyHasAllUtilities = true;
		foreach($utilityTypeIDS as &$utilityTypeID){
			$propertyUtilitiesWithTypeID = UtilityQuery::create()->filterByPropertyid($property->getId())->filterByAppliancetypeid($utilityTypeID)->find();
			if(count($propertyUtilitiesWithTypeID) == 0){
				$propertyHasAllUtilities = false;
			}
		}
		if($propertyHasAllUtilities == false) continue;
		//perks
		$propertyHasAllPerks = true;
		foreach($perkTypeIDs as &$perkTypeID){
			$propertyPerksWithTypeID = PerkQuery::create()->filterByPropertyid($property->getId())->filterByAppliancetypeid($perkTypeID)->find();
			if(count($propertyPerksWithTypeID) == 0){
				$propertyHasAllPerks = false;
			}
		}
		if($propertyHasAllPerks == false) continue;
		//amenities
		$propertyHasAllAmenities = true;
		foreach($amenityTypeIDs as &$amenityTypeID){
			$propertyAmenitiesWithTypeID = AmenityQuery::create()->filterByPropertyid($property->getId())->filterByAppliancetypeid($amenityTypeID)->find();
			if(count($propertyAmenitiesWithTypeID) == 0){
				$propertyHasAllAmenities = false;
			}
		}
		if($propertyHasAllAmenities == false) continue;

		//since we have meet all the condition because php has not continued to the next iteration
		array_push($desiredPropertyIDs, $property->getId());
	}

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

		//passing entire tables that will be filtered later
		'pictures'=>$pictures,
		'addresses'=>$addresses,
		'continentTypes'=>$continentTypes,
		'countryTypes'=>$countryTypes]);
	return $response;
});

//(1) Page is bookmarkable
//(2) We are able to go back to this page
//(3) TODO plan what to do when no parameter is passed
$app->get('/viewProperty', function ($request, $response, $args) {
	//find the property
	$property = PropertyQuery::create()->findPk($_GET['propertyID']); 
	//find the pictures (for property)
	$pictures = PictureQuery::create()->filterByPropertyid($property->getId())->find();
	//find the address (for property)
	$address = AddressQuery::create()->findPk($property->getAddressid());
	//find the continent name (for address)
	$continent = ContinenttypeQuery::create()->findPk($address->getContinenttypeid());
	//find the country name (for address)
	$country = CountrytypeQuery::create()->findPk($address->getCountrytypeid());
	//find all the below (for property)
	$appliances = ApplianceQuery::create()->filterByPropertyid($property->getId())->find();
	$utilities = Utilities::create()->filterByPropertyid($property->getId())->find();
	$amenities = AmenityQuery::create()->filterByPropertyid($property->getId())->find();
	$perks = PerkQuery::create()->filterByPropertyid($property->getId())->find();
	$issues = IssueQuery::create()->filterByPropertyid($property->getId())->find();
	$owner = UserQuery::create()->filterByPropertyid($property->getId())->find();
	$phones = PhoneQuery::create()->filterByPropertyid($property->getId())->find();

	//pass all the parameters to the page
	$this->view->render($response, "/viewProperty/html.html", 
		['user'=>current_user(), 
		'property'=>$property,
		]);
	return $response;
});

//--------------------------------------------------MUST NOT BE AUTHENTICATED--------------------------------------------------

//-------------------------AUTHENTICATION PAGE-------------------------

//(1) TODO we should not be able to come back to this page after bein redirected (ONLY occurs after [a] logged in OR [b] signed up)
$app->get('/authentication', function ($request, $response, $args) {
	if(current_user() == null){
		//NOTE this should be an optional paramter and therefore we can automatically send someone to the login or sign up page
		$this->view->render($response, "authentication/html.html", 
			['user'=>current_user(), 'login'=>false]); 
		return $response;
	}
	else{
		Header("Location: ./manage");
		exit();
	}
});

//TODO switch to fully server side checks
$app->post('/login', function($request, $response, $args) {
	if(current_user() == null){
		$postVars = $request->getParsedBody();
		$email = $postVars['email'];
		$password = $postVars['password'];
	
		//retreive user by username
		$user = UserQuery::create()->findOneByEmail($email);
		$userID = -1;
		$message = "";
	
		//react to finding user
		if($user){ //if user exists make sure they have the right password
			if($user->login($password)) $userID = $user->getId();
			else $message = "Incorrect password";
		}
		else{ //else create an account for that user
			$message = "This email isn't registered <br> You can create an account by pressing the link below";
		}
	
		//return required data
		return json_encode(array('userID' => $userID, 'message' => $message));
	}
});

//TODO switch to fully server side checks
$app->post('/signup', function ($request, $response, $args) {
	if(current_user() == null){
		$postVars = $request->getParsedBody();
		$name = $postVars['name'];
		$email = $postVars['email'];
		$password = $postVars['password'];
		$confirmPassword = $postVars['confirmPassword'];

		//attempt to retreive user by email
		$user = UserQuery::create()->findOneByEmail($email);
		$userID = -1;
		$message = "";

		//react to finding user
		if($user) $message ="This email is already registered <br> You can login to the account by pressing the link below";
		else{
			$newUser = new User();
			$newUser->setName($name);
			$newUser->setEmail($email);
			$newUser->setPassword($password);
			$newUser->save();
			$userID = $newUser->getId();
		}

		//return required data
		return json_encode(array('userID' => $userID, 'message' => $message));
	}
});

//saver user into session
$app->post("/success", function($request,$response,$args){
	if(current_user() == null){
		$userID = $request->getParsedBody()['userID'];

		$user = UserQuery::create()->findPk($userID);
		if($user){
			$_SESSION['user'] = $user;
			echo "";
		}
		else echo "Internal Error <br> User Not Found";
	}
});

$app->post('/logout', function ($request, $response, $args) {
	if(current_user() != null) session_destroy();
});

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