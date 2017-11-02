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

		//print_r($sanpham);
		echo $sanpham->name;
	}

	public function updateCart(){
		$id = (int)$_POST['id'];
		$qty = (int)$_POST['qty'];

		$model = new DetailFoodModel();
		$sanpham = $model->getDetail($id);

		$oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;

		$cart = new Cart($oldCart);

		$cart->update($sanpham, $qty);

		$_SESSION['cart'] = $cart;

		$arr = [
			'totalPrice'	=> number_format($cart->totalPrice)." vnđ",
			'dongiaSanpham'	=> number_format($cart->items[$id]['price'])." vnđ"
		];
		echo json_encode($arr);
		//print_r($_SESSION['cart']);

	}

}