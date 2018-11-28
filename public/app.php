<?php
//-------------------------DEPENDANCIES-------------------------
// autoload slim, twig, and Propel
require '../vendor/autoload.php';
// require the config file that propel init created with your db connection information
require_once '../generated-conf/config.php';

//-------------------------SETUP-------------------------
// begin a session
session_start();
// adding an external config file to show errors
$settings = ['displayErrorDetails' => true];
$app = new \Slim\App(['settings' => $settings]);
// Twig setup
$container = $app->getContainer();
// note that this file lives in a subdirectory, so templates is up a level
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig("../templates/");
    $router = $container->get('router');
    $basePath = rtrim(str_ireplace('index.php', '', $container->get('request')->getUri()->getBasePath()), '/');
	$view->addExtension(new Slim\Views\TwigExtension($router, $basePath));
    return $view;
};

//-------------------------FUNCTIONS-------------------------

//-------------------------ROUTES-------------------------
$app->get('/', function ($request, $response, $args) {
	if(isset($_SESSION['user'])){
		$this->view->render($response, "search/search.html", ['user'=>$_SESSION['user']]);
	}
	else{
		$this->view->render($response, "search/search.html");
	}
	return $response;
});

$app->get('/authentication', function ($request, $response, $args) {
	$this->view->render($response, 'authentication/authentication.html');
	return $response;
});

//-------------------------AJAX HANDLERS-------------------------
$app->get('/login', function ($request, $response, $args) {
	
	$this->view->render($response, "search/search.html"); //TODO this should take you to the landlord management page
	return $response;
});

$app->post('/logout', function ($request, $response, $args) {
	session_destroy();
	$this->view->render($response, "search/search.html");
});

//-------------------------START THE APP-------------------------
$app->run();
?>