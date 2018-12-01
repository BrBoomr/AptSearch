<?php
//-------------------------FUNCTIONS-------------------------

function current_user(){
	if(isset($_SESSION['user'])) return $_SESSION['user'];
	else return null;
}

//--------------------------------------------------AUTHENTICATION AS SETTING--------------------------------------------------

//-------------------------SEARCH PAGE-------------------------

$app->get('/', function ($request, $response, $args) {
	$properties = PropertyQuery::create()->filterByAvailable(true); //only show properties that are currently available
	$pictures = PictureQuery::create(); //pass all the pictures and simply filter through this for every property in the html
	$addresses = AddressQuery::create(); //ditto as above
	$phones = PhoneQuery::create(); //ditto as above
	$continentTypes = ContinenttypeQuery::create(); //ditto as above
	$countryTypes = CountrytypeQuery::create(); //ditto as above
	$owners = UserQuery::create(); //ditto as above
	$this->view->render($response, "/properties/html.html", 
		['user'=>current_user(), 
		'search'=>true, 
		'properties'=>$properties, 
		'pictures'=>$pictures,
		'addresses'=>$addresses,
		'phones'=>$phones,
		'continentTypes'=>$continentTypes,
		'countryTypes'=>$countryTypes,
		'owners'=>$owners]);
	return $response;
});

$app->get('/viewProperty/{id}', function ($request, $response, $args) {
	//TODO... what happens when we don't pass it a paramters?!
	$property = PropertyQuery::create()->findPk($args['id']);
	$this->view->render($response, "/viewProperty/html.html", 
		['user'=>current_user(), 'property'=>$property]);
	return $response;
});

//--------------------------------------------------MUST NOT BE AUTHENTICATED--------------------------------------------------

//-------------------------AUTHENTICATION PAGE-------------------------

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

//post request used to store user into Session
$app->post("/success",function($request,$response,$args){
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

//-------------------------AUTHENTICATION PAGE-------------------------

$app->get('/manage', function ($request, $response, $args) {
	$user = current_user();
	if($user != null){
		$properties = PropertyQuery::create()->filterByUserid($user->getId()); //only show properties that belond to this user
		$pictures = PictureQuery::create(); //pass all the pictures and simply filter through this for every property in the html
		$addresses = AddressQuery::create(); //ditto as above
		//NOTE: we dont have to pass phones because we are viewing our own properties and don't need our own contact information
		$continentTypes = ContinenttypeQuery::create(); //ditto as above
		$countryTypes = CountrytypeQuery::create(); //ditto as above
		//NOTE: we dont have to pass owners because we are the only owner
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

//-------------------------AUTHENTICATION PAGE-------------------------

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

$app->get('/editProperty', function ($request, $response, $args) {
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

$app->get('/UI', function ($request, $response, $args) {
	$this->view->render($response, "searchUI/html.html",
		['user'=>$user]);
	return $response;
});

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