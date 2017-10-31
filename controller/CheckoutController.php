<?php
include_once('Controller.php');
include_once('controller/Cart.php');
session_start();

class CheckoutController extends Controller{

	public function getCheckout(){

		$oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;

		$cart = new Cart($oldCart);
		//session_destroy();
		print_r($cart);
		return $this->loadView('giohang',$cart);
	}

}


?>