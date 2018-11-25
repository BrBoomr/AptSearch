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
$app->get('/createUser', function ($request, $response, $args) {
	$user = new User();
	$user->setFirstName("Zhixiang");
	$user->setLastName("Chen");
	$user->setPassword("zchen");
	//$user->save();
	echo ($user->getFirstName(). " created!");
	return $response;
});
// home page route
$app->get('/', function ($request, $response, $args) {
	$this->view->render($response, "index.html");
	return $response;
});

// The route for testing out the new login page
$app->get('/login', function ($request, $response, $args) {
	$this->view->render($response, "login.html");
	return $response;
});

//login verification route
$app->post('/login_verification', function ($request, $response, $args) {
	// get the data from the post body
	$email = $this->request->getParam('email');
	$password = $this->request->getParam('password');
	//find user object in database
	$email = EmailQuery::create()->findOneByEmail($email);
	// If null is not caught, the following query will return a 500 error

	if (is_null($email)){
		$arr["verified"]="false";
		return json_encode($arr);
	}

	$user = UserQuery::create()->findPk($email->getUserid());
	if($user && $user->login($password)){
		$arr["verified"]="true";
		$arr["userID"] = $user->getPrimaryKey();
		$arr["userFName"] = $user->getFirstName();
	}
	else{
		$arr["verified"]="false";
	}
	return json_encode($arr);
});

$app->post("/success",function($request,$response,$args){
	$userID = $this->request->getParam('userID');
	$this->view->render($response, "index.html", ['user'=>UserQuery::create()->findPk($userID)]);
	return $response;
});

$app->run();
?>