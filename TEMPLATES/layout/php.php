<?php

$app->post('/logout', function ($request, $response, $args) {
	if(current_user() != null) session_destroy();
});

?>