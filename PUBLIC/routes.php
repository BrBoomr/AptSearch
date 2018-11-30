<?php

//-------------------------UI TEST ROUTES-------------------------

$app->get('/UI', function ($request, $response, $args) {
	$this->view->render($response, "searchUI/html.html");
	return $response;
});

$app->get('/authenticationUI', function ($request, $response, $args) {
	$this->view->render($response, "authenticationUI/html.html",
	['login'=>false]);
	return $response;
});

$app->post('/login', function($request, $response, $args) {
	$postVars = $request->getParsedBody();
	$username = $postVars['email'];
	$password = $postVars['password'];
	//retreive user by username
	$user = UserQuery::create()->findOneByUsername($username);
	
	if($user){ //if user exists make sure they have the right password
		if(password_verify($password, $user->getPasswordHash())){
			echo $user->getPasswordHash();
		}
		else{
			echo "none";
		}
	}
	else{ //else create an account for that user
		$newUser = new User();
		$newUser->setUsername($username);
		$newUser->setPasswordHash(password_hash($password, PASSWORD_DEFAULT));
		$newUser->save();
		echo $newUser->getPasswordHash();
	}
});


//-------------------------FUNCTIONS-------------------------
function current_user(){
	if(isset($_SESSION['user'])){
		return $_SESSION['user'];
	}
}

function createUser($name, $email, $password){
	$newUser = new User();
	$newUser->setName($name);
	$newUser->setEmail($email);
	$newUser->setPassword($password);
	$newUser->save();
	return $newUser->getId();
}

//-------------------------GET-------------------------

//homepage (search)
$app->get('/', function ($request, $response, $args) {
	$listings = PropertyQuery::create();
	$this->view->render($response, "/search/html.html",['user'=>current_user(),'listings'=>$listings]);
	return $response;
});


// home page route


$app->get('/TEMPLATE', function ($request, $response, $args) {
	$this->view->render($response, "TEMPLATE/html.html");
	return $response;
});

$app->get('/authentication', function ($request, $response, $args) {
    $this->view->render($response, "authentication/html.html"
    );
	return $response;
});

// Displays the login and registration forms

$app->get('/view_all_listing', function ($request, $response, $args) {
	$listings = PropertyQuery::create();
	$this->view->render($response, "listing/html.html",['user'=>current_user(),'listings'=>$listings]);
	return $response;
});

$app->get('/view_my_listing', function ($request, $response, $args) {
	if(current_user()){
		$current_user = $_SESSION['user'];
		$listings = PropertyQuery::create()->filterByUserid($current_user->getId());
		$this->view->render($response, "listing/html.html",['user'=>current_user(), 'listings'=>$listings,]);
	}
	else{
		$this->view->render($response, "authentication/html.html");
	}
	
	return $response;
});

$app->get('/add_listing', function ($request, $response, $args) {
	//createAddress(1,321,"Texas","Mission",78572,"East Street",1,1);
	//createPropery(37,5,"W.B1.A1",TRUE, 900, 750 ,1,1,"Single Bedroom");

	return $response;
});

//-------------------------POST-------------------------

// Frees up the $_SESSION variables, essentially logging an user out.
$app->get('/logout', function ($request, $response, $args) {
	session_destroy();
});

// Verifies that the credentials are valid
$app->post('/login_verification', function ($request, $response, $args) {
	$email = $this->request->getParam("email");
	$user = UserQuery::create()->findOneByEmail($email);

	if($user && $user->login($this->request->getParam("password"))){
		return json_encode(['verified' => 'true', 'userID' => $user->getId()]);
	}
	return json_encode(['verified' => 'false']);
});

$app->post("/success_login",function($request,$response,$args){
	$userID = $this->request->getParam('userID');
	$_SESSION['user']=UserQuery::create()->findPk($userID);
});

$app->post('/register_verification', function ($request, $response, $args) {
	$name = $this->request->getParam("name");
	$email = $this->request->getParam("email");
	$password = $this->request->getParam("password");
	$confirm = $this->request->getParam("confirm");

	$fields = array($name,$email,$password,$confirm);
	foreach($fields as $field){
		if(empty($field)){
			return json_encode(['invalid'=>'true']);
		}
	}

	if($password != $confirm){
		//$code["invalid"]='true';
		return json_encode( ["mismatch"=>'true'] );
	}

	$check_user = UserQuery::create()->findOneByEmail($email);
	if($check_user){
		return json_encode(['duplicate'=>'true']);
	}
	$userID=createUser($name,$email,$password);
	return json_encode(['verified'=>'true','userID'=>$userID]);
});

$app->post('/update_listing', function ($request, $response, $args) {
	
});

////////////////////////////////////////////////////////////////////////
///////////////////////addProperty//////////////////////////////////////
////////////////////////////////////////////////////////////////////////
$app->get('/add_property', function ($request, $response, $args) {
	if(current_user()){
		$this->view->render($response, "/addProperty/html.html", ['user'=>current_user()]);
		return $response;
	}
	$this->view->render($response, "/authentication/html.html", ['user'=>current_user()]);
	return $response;
});

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
////////////////////////////////////////////////////////////////////////


//-------------------------PATCH-------------------------

//-------------------------DELETE-------------------------


?>