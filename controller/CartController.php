<?php
include_once('model/DetailFoodModel.php');
include_once('Cart.php');


class CartController{

	public function addToCart(){
		$id = (int)$_POST['id'];

		$model = new DetailFoodModel();
		$sanpham = $model->getDetail($id);

		$cart = new Cart();
		

	}

}