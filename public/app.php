<?php
//-------------------------DEPENDANCIES-------------------------
// autoload slim, twig, and Propel
require '../vendor/autoload.php';
// require the config file that propel init created with your db connection information
require_once '../generated-conf/config.php';

//-------------------------SETUP-------------------------
// adding an external config file to show errors
$settings = ['displayErrorDetails' => true];
$app = new \Slim\App(['settings' => $settings]);
// Twig setup
$container = $app->getContainer();
// note that this file lives in a subdirectory, so templates is up a level
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig("../templates/", [
        'cache' => false
    ]);
    $router = $container->get('router');
    $basePath = rtrim(str_ireplace('index.php', '', $container->get('request')->getUri()->getBasePath()), '/');
	$view->addExtension(new Slim\Views\TwigExtension($router, $basePath));
    return $view;
};

//-------------------------IMPORT ALL PHP FILES FROM OTHER PAGES-------------------------
require './prototypes.php'; //stores routes that don't yet have a page assigned to them

//-------------------------START THE APP-------------------------
$app->run();
?>