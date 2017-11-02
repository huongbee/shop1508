<?php

include_once('controller/CartController.php');

$c = new CartController;

$action = isset($_POST['action']) ? $_POST['action'] : "add";
if($action == "add"){
	$c->addToCart();
}
elseif($action=="update")
	$c->updateCart();

else{
	// delete
}



?>