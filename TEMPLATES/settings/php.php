<?php

//(1) Page is bookmarkable
//(2) We are able to go back to this page
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

//NOTE: this route is used for to edit name, email, and password individually
//so whatever variable is set is implied to be the one we are trying to edit
$app->post('/settings/verify', function($request, $response, $args) {
    $user = current_user();

    //make sure our user exits
    if($user != null){
        $actionName = isset($_POST['actionName']) ? $_POST['actionName'] : null;
        $actionData = isset($_POST['actionData']) ? $_POST['actionData'] : null;

        //make the variables we will be passing back to our javascript
        $newValue = ""; //store the new value the input field will have after the setting
        $message = ""; //store the error message here

        //check which one of the three values we are changing
        if($actionName == "name"){
            //check for errors
            if(empty($actionData) == false) $user->setName($actionData); //update success on server
            else $message = "Your name must not be blank"; //update error on client
            //update on client
            $newValue = $user->getName();
        }
        else if($actionName == "email"){
            //check for errors
            if(empty($actionData) == false){
                if(filter_var($actionData, FILTER_VALIDATE_EMAIL)) $user->setEmail($actionData); //update on server
                else $message = "Your must plug in a valid email"; //update error on client
            }
            else $message = "Your email must not be blank"; //update error on client
            //update on client
            $newValue = $user->getEmail(); 
        }
        else if($actionName == "password"){
            //check for errors
            if(empty($actionData) == false) $user->setPassword($actionData); //update on server
            else $message = "Your password must not be blank"; //update error on client
            //update on client
            $newValue = ""; //we don't show passwords on the client 
        }

        //update on server
        $user->save();

        //send results to client
        return json_encode(array('newValue' => $newValue, 'message' => $message));
    }
});

/*alsdkjf;alsdjfa;lsdjf;lasdkfj;laksdjf;lasdkjf;lkj*/

$app->post('/settings/editPhone', function ($request, $response, $args) {
	$fields = $_POST;
	foreach ($fields as $key => $value) {
		//echo $key."=>".$value."<br>";
		if($key=='extension'){
			continue;
		}
		if(empty($value)){
			return json_encode(['valid'=>'false']);
		}
	}
	
	
	$editPhone = PhoneQuery::create()->findPk($_POST['phoneID']);
	if(current_user()->getId() != $editPhone->getUserid()){
		return json_encode(['valid'=>'false']);
		exit();
	}
	if($_POST['description']!='DEFAULT'){
		$editPhone->setDescription($_POST['description']);
	}
	$editPhone->setAreacode($_POST['areaCode']);
	$editPhone->setNumber($_POST['number']);
	$editPhone->setExtension($_POST['extension']);
	$editPhone->save();
	return json_encode(['valid'=>'true']);

});

?>