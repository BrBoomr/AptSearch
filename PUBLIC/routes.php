<?php

define("BASE_URL","/");

//-------------------------FUNCTIONS-------------------------

function current_user(){
	if(isset($_SESSION['user'])) return $_SESSION['user'];
	else return null;
}

//--------------------------------------------------AUTHENTICATION AS SETTING--------------------------------------------------

//-------------------------SEARCH PAGE-------------------------

$app->get('/', function ($request, $response, $args) {
	$listings = PropertyQuery::create();
	$this->view->render($response, "/search/html.html", 
		['user'=>current_user(), 'listings'=>$listings]);
	return $response;
});

$app->get('/viewProperty', function ($request, $response, $args) {
	$this->view->render($response, "/viewProperty/html.html");
	return $response;
});

//--------------------------------------------------MUST NOT BE AUTHENTICATED--------------------------------------------------

//-------------------------AUTHENTICATION PAGE-------------------------

$app->get('/authentication', function ($request, $response, $args) {
	if(current_user() == null){
		//NOTE this should be an optional paramter and therefore we can automatically send someone to the login or sign up page
		$this->view->render($response, "authentication/html.html", ['login'=>false]); 
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
			if(password_verify($password, $user->getEncryptedpassword())) $userID = $user->getId();
			else $message = "Incorrect password";
		}
		else{ //else create an account for that user
			$message = "This email isn't registered <br> You can create an account by pressing the link below";
		}
	
		//return required data
		echo json_encode(array('userID' => $userID, 'message' => $message));
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
		echo json_encode(array('userID' => $userID, 'message' => $message));
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
		$this->view->render($response, "manage/html.html");
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
		$this->view->render($response, "settings/html.html");
		return $response;
	}
	else{
		Header("Location: ./authentication");
		exit();
	}
});

//-------------------------ADD PROPERTY PAGE-------------------------

$app->get('/addProperty', function ($request, $response, $args) {
	$user = current_user();
	if($user != null){
		$this->view->render($response, "addProperty/html.html");
		return $response;
	}
	else{
		Header("Location: ./authentication");
		exit();
	}
});

//-------------------------EDIT PROPERTY PAGE-------------------------

$app->get('/editProperty', function ($request, $response, $args) {
	$user = current_user();
	if($user != null){
		$this->view->render($response, "editProperty/html.html");
		return $response;
	}
	else{
		Header("Location: ./authentication");
		exit();
	}
});

//-------------------------UI TEST ROUTES-------------------------

$app->get('/UI', function ($request, $response, $args) {
	$this->view->render($response, "searchUI/html.html");
	return $response;
});

//-------------------------TEMPLATE ROUTE-------------------------

$app->get('/TEMPLATE', function ($request, $response, $args) {
	$this->view->render($response, "TEMPLATE/html.html");
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