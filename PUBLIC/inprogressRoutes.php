<?php

//--------------------------------------------------NEEDS REFINING--------------------------------------------------






//-------------------------SETTINGS PAGE-------------------------

//(1) Page is bookmarkable
//(2) We are able to go back to this page
//TODO switch to fully client side checks
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
	if(empty($_GET['currentPassword']) || !(current_user()->login($_GET['currentPassword']))){
		return json_encode(['INV_PASS'=>'true']);
	}
	else if(empty($_GET['name']) || empty($_GET['email'])){
		return json_encode(['invalid'=>'true']);
	}
	else if($_GET['newPassword'] != $_GET['confirmPassword']){
		return json_encode(['mismatch'=>'true']);
	}
	current_user()->setName($_GET['name']);
	current_user()->setEmail($_GET['email']);
	if(!(empty($_GET['newPassword']) && empty($_GET['confirmPassword']))){
		current_user()->setPassword($_GET['newPassword']);
	}
	current_user()->save();
	return json_encode(['valid'=>'true']);
	exit();
	
});



//--------------------------------------------------For UI Development--------------------------------------------------

$app->get('/viewPropertyUI', function ($request, $response, $args) {
	$this->view->render($response, "UI/viewPropertyUI/html.html",
		['user'=>current_user()]);
	return $response;
});

$app->get('/settingsUI', function ($request, $response, $args) {
	$this->view->render($response, "UI/settingsUI/html.html",
		['user'=>current_user()]);
	return $response;
});

$app->get('/addPropertyUI', function ($request, $response, $args) {
	$this->view->render($response, "UI/propertyUI/html.html",
		['user'=>current_user(), 'add'=>true]);
	return $response;
});

$app->get('/editPropertyUI', function ($request, $response, $args) {
	$this->view->render($response, "UI/propertyUI/html.html",
		['user'=>current_user(), 'add'=>false]);
	return $response;
});

//--------------------------------------------------For Testing--------------------------------------------------

//-------------------------TEMPLATE ROUTE-------------------------

$app->get('/TEMPLATE', function ($request, $response, $args) {
	$this->view->render($response, "TEMPLATE/html.html",
		['user'=>current_user()]);
	return $response;
});

//-------------------------DEBUG ROUTE-------------------------

$app->get('/DEBUG', function ($request, $response, $args) {
	$this->view->render($response, "DEBUG/html.html",
		['user'=>current_user()]);
	return $response;
});

?>