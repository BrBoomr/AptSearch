<?php
require '../vendor/autoload.php';
require '../generated-conf/config.php';

//////////////////////
// Slim Setup
//////////////////////
session_start();
$settings = ['displayErrorDetails' => true];

$app = new \Slim\App(['settings' => $settings]);

$container = $app->getContainer();
$container['view'] = function($container) {
	$view = new \Slim\Views\Twig('../templates');
	
	$basePath = rtrim(str_ireplace('index.php', '', 
	$container->get('request')->getUri()->getBasePath()), '/');

	$view->addExtension(
	new Slim\Views\TwigExtension($container->get('router'), $basePath));
	
	return $view;
};
// home page route
$app->get('/', function ($request, $response, $args) {
	if(isset($_SESSION['user'])){
		$this->view->render($response, "/search/search.html", ['user'=>$_SESSION['user']]);
	}
	else{
		$this->view->render($response, "/search/search.html");
	}
	return $response;
});

//////////////////////////////
/////////LOGIN ROUTES/////////
//////////////////////////////
// Displays the login and registration forms
$app->get('/authentication', function ($request, $response, $args) {
	$this->view->render($response, "authentication/authentication.html");
	return $response;
});
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

//////////////////////////////
///////REGISTER ROUTES////////
//////////////////////////////
function createUser($name, $email, $password){
	$newUser = new User();
	$newUser->setName($name);
	$newUser->setEmail($email);
	$newUser->setPassword($password);
	$newUser->save();
	return $newUser->getId();
}
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

//////////////////////////////
///////PROPERTY ROUTES////////
//////////////////////////////
$app->get('/view_all_listing', function ($request, $response, $args) {
	$listings = PropertyQuery::create();
	$this->view->render($response, "listing/listing.html",['listings'=>$listings]);
	return $response;
});

$app->get('/view_my_listing', function ($request, $response, $args) {
	if(isset($_SESSION['user'])){
		$current_user = $_SESSION['user'];
		$listings = PropertyQuery::create()->filterByUserid($current_user->getId());
		$this->view->render($response, "listing/listing.html",['listings'=>$listings]);
	}
	else{
		$this->view->render($response, "authentication/authentication.html");
	}
	
	return $response;
});
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
$app->get('/add_listing', function ($request, $response, $args) {
	//createAddress(1,321,"Texas","Mission",78572,"East Street",1,1);
	//createPropery(37,5,"W.B1.A1",TRUE, 900, 750 ,1,1,"Single Bedroom");
	return $response;
});
$app->post('/update_listing', function ($request, $response, $args) {
	
});


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$app->run();
?>