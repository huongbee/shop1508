<?php
include_once('controller/CheckoutController.php');

$c = new CheckoutController;
$c->checkout();

//isset($_POST['btnCheckout']) ? $c->postCheckout() : $c->getCheckout();

?>