<?php

//-------------------------FUNCTIONS-------------------------

function current_user(){
	if(isset($_SESSION['user'])) return $_SESSION['user'];
	else return null;
}

?>