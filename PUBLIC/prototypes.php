<?php
//--------------------------------------------------
//THIS FILE SHOULD BE AS EMPTY AS POSSIBLE
//--------------------------------------------------

//-------------------------FUNCTIONS-------------------------

function createAddress($continent,$country,$state,$city,$zipcode,$street,$bldNum,$aptNum){
	$newAddr = new Address();
	$newAddr->setContinenttypeid($continent);
	$newAddr->setCountrytypeid($country);
	$newAddr->setState($state);
	$newAddr->setLocality($city);
	$newAddr->setZipcode($zipcode);
	$newAddr->setStreetname($street);
	$newAddr->setBuildingindentifier($bldNum);
	$newAddr->setApartmentidentifier($aptNum);

	//$newAddr->save();
	echo "Address Added on ".$street." !</br>";
}

function createPropery($addrId,$userID,$postName,$available,$rent,$sqrFoot,$bedrooms,$bathrooms,$details){
	$newProp = new Property();
	$newProp->setAddressid($addrId);
	$newProp->setUserid($userID);
	$newProp->setPostname($postName);
	$newProp->setAvailable($available);
	$newProp->setExpectedrentpermonth($rent);
	$newProp->setSquarefootage($sqrFoot);
	$newProp->setBedroomcount($bedrooms);
	$newProp->setBathroomcount($bathrooms);
	$newProp->setDetails($details);

	//$newProp->save();
	echo "New Property Added!</br>";
}

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

// home page route
$app->get('/', function ($request, $response, $args) {
	$this->view->render($response, "/search/index.html", ['user'=>current_user()]);
	return $response;
});

$app->get('/TEMPLATE', function ($request, $response, $args) {
	$this->view->render($response, "TEMPLATE/index.html");
	return $response;
});

// Displays the login and registration forms
$app->get('/authentication', function ($request, $response, $args) {
	$this->view->render($response, "authentication/index.html");
	return $response;
});

$app->get('/view_all_listing', function ($request, $response, $args) {
	$listings = PropertyQuery::create();
	$this->view->render($response, "listing/index.html",['user'=>current_user(),'listings'=>$listings]);
	return $response;
});

$app->get('/view_my_listing', function ($request, $response, $args) {
	if(current_user()){
		$current_user = $_SESSION['user'];
		$listings = PropertyQuery::create()->filterByUserid($current_user->getId());
		$this->view->render($response, "listing/index.html",['user'=>current_user(), 'listings'=>$listings,]);
	}
	else{
		$this->view->render($response, "authentication/index.html");
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
$app->post('/logout', function ($request, $response, $args) {
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

//-------------------------PATCH-------------------------

//-------------------------DELETE-------------------------

?>