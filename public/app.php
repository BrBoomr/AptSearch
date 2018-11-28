<?php
require '../vendor/autoload.php';
require '../generated-conf/config.php';

//////////////////////
// Slim Setup
//////////////////////

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
	$this->view->render($response, "index.html");
	return $response;
});


//////////////////////////////
/////////LOGIN ROUTES/////////
//////////////////////////////
// The route for testing out the new login page
$app->get('/login', function ($request, $response, $args) {
	$this->view->render($response, "login.html");
	return $response;
});

//login verification route
$app->post('/login_verification', function ($request, $response, $args) {
	$email = $this->request->getParams("email");
	$user = UserQuery::create()->findOneByEmail($email);
	if($user && $user->login($this->request->getParams("password"))){
		return ['verified' => 'true', 'userID' => $user->getId()];
	}
	return ['verified' => 'false'];
});

$app->post("/success_login",function($request,$response,$args){
	return $response;
});

//////////////////////////////
///////REGISTER ROUTES////////
//////////////////////////////
function createUser($firstName, $lastName, $email, $type, $password){
	
}
$app->get('/register_verification', function ($request, $response, $args) {

});

$app->run();
?>