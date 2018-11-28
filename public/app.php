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
$app->get('/add_property', function ($request, $response, $args) {
	
});


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$app->run();
?>