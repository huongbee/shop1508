<?php
include_once('model/DetailFoodModel.php');
include_once('controller/Cart.php');
session_start();

class CartController{

	public function addToCart(){
		$id = (int)$_POST['id'];

		$model = new DetailFoodModel();
		$sanpham = $model->getDetail($id);

		$oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;

		$cart = new Cart($oldCart);

		$cart->add($sanpham);

		$_SESSION['cart'] = $cart;

		echo "<pre>";
		print_r($_SESSION['cart']);
		echo "</pre>";


	}

}