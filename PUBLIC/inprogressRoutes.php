<?php

//--------------------------------------------------NEEDS REFINING--------------------------------------------------

//-------------------------ADD PROPERTY PAGE-------------------------



//-------------------------EDIT PROPERTY PAGE-------------------------

//TODO... 
//(1) needs to use post (params passed not in url) => so that the page is not bookmarkable
//(2) plan for going to the page without parameters
//(3) this page should also be replaced after changes SAVED or DISCARDED
//		[a] replace it with new page (IF previous page != next page)
//		[b] replace it with the previous page (IF previous page == next page)
//		[*] replacement occurs so you cant go back to the same page
//TODO switch to fully client side checks
$app->get('/editProperty', function ($request, $response, $args) {
	$user = current_user();
	if($user != null){
		$this->view->render($response, "property/html.html",
			['user'=>$user, 'property'=>$property, 'add'=>false]);
		return $response;
	}
	else{
		Header("Location: ./authentication");
		exit();
	}
});

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
	if(empty($_GET['name']) || empty($_GET['email'])){
		if($_GET['name']==current_user()->getName()){
			//echo "Same Name!<br>";
		}
		else{
			current_user()->setName($_GET['name']);
		}
		if($_GET['email']==current_user()->getEmail()){
			//echo "Same Email!<br>";
		}
		else{
			current_user()->setEmail($_GET['email']);
		}
	}
	else if(empty($_GET['newPassword']) && empty($_GET['confirmPassword'])){
		if($_GET['newPassword'] == $_GET['confirmPassword']){

		}
		else{

		}
	}
	else{
		
	}
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