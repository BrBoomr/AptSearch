<?php

//------------------------------Functions------------------------------

function checkIfEmpty($elem, $elemName){
    if(empty($elem)) return "You forgot your " . $elemName . "<br>";
    else return "";
}

function checkEmail($email){
    if(empty($email)) return "You forgot your email<br>";
    else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) return "You didn't plug in a valid email<br>";
    else return "";
}

function checkPasswordMatch($password, $confirmPassword){
    if($password == $confirmPassword) return "";
    else return "Your passwords don't match<br>";
}

//------------------------------Routes------------------------------

//(1) TODO we should not be able to come back to this page after bein redirected (ONLY occurs after [a] logged in OR [b] signed up)
$app->get('/authentication', function ($request, $response, $args) {
	if(current_user() == null){
        //the login parameter would let you automatically send someone to the login or sign up page
        //for now we default to sign up since new users might need more help than old ones
		$this->view->render($response, "authentication/html.html", 
			['user'=>current_user(), 'login'=>false]); 
		return $response;
	}
	else{
		Header("Location: ./manage");
		exit();
	}
});

$app->post('/login', function($request, $response, $args) {
	if(current_user() == null){
		$email = (isset($_POST['email'])) ? $_POST['email'] : null;
        $password = (isset($_POST['password'])) ? $_POST['password'] : null;
        
        //initial error checking
        $userID = -1;
        $message = checkEmail($email) . checkIfEmpty($password, "password");
        if($message == ""){
            //retreive user by username
            $user = UserQuery::create()->findOneByEmail($email);
        
            //react to finding user
            if($user){ //if user exists make sure they have the right password
                if($user->login($password)) $userID = $user->getId();
                else $message = "Incorrect password";
            }
            else{ //else create an account for that user
                $message = "This email isn't registered <br> You can create an account by pressing the link below";
            }
        }
	
		//return required data
		return json_encode(array('userID' => $userID, 'message' => $message));
	}
});

$app->post('/signup', function ($request, $response, $args) {
	if(current_user() == null){
        $name = (isset($_POST['name'])) ? $_POST['name'] : null;
        $email = (isset($_POST['email'])) ? $_POST['email'] : null;
        $password = (isset($_POST['password'])) ? $_POST['password'] : null;
		$confirmPassword = (isset($_POST['confirmPassword'])) ? $_POST['confirmPassword'] : null;

        //initial error checking
        $userID = -1;
        $message = checkIfEmpty($name, "name") 
        . checkEmail($email) 
        . checkIfEmpty($password, "password") 
        . checkIfEmpty($confirmPassword, "password confirmation") 
        . checkPasswordMatch($password, $confirmPassword);
        if($message == ""){
            //attempt to retreive user by email
            $user = UserQuery::create()->findOneByEmail($email);

            //react to finding user
            if($user) $message ="This email is already registered <br> You can login to the account by pressing the link below";
            else{
                $newUser = new User();
                $newUser->setName($name);
                $newUser->setEmail($email);
                $newUser->setPassword($password);
                $newUser->save();
                $userID = $newUser->getId();
            }
        }

		//return required data
		return json_encode(array('userID' => $userID, 'message' => $message));
	}
});

//save user into session
//plan to trigger an error if we dont have userID set
$app->post("/success", function($request,$response,$args){
	if(current_user() == null){
		$userID = (isset($_POST['userID'])) ? $_POST['userID'] : null;
        if($userID){
            $user = UserQuery::create()->findPk($userID);
            if($user){
                $_SESSION['user'] = $user;
                echo "";
            }
            else echo "Internal Error <br> User Not Found";
        }
        else echo "Internal Error <br> User ID Not Passed";
	}
});

?>