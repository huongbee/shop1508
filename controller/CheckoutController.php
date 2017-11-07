<?php
include_once('Controller.php');
include_once('controller/Cart.php');
include_once('model/CheckoutModel.php');
session_start();

class CheckoutController extends Controller{

	// public function getCheckout(){

	// 	$oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
	// 	$cart = new Cart($oldCart);

	// 	return $this->loadView('giohang',$cart);
	// }
	// public function postCheckout(){
	// 	echo $name = $_POST['fullname'];
	// }

	public function checkout(){

		$oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
		$cart = new Cart($oldCart);

		if(!isset($_POST['btnCheckout'])){
			return $this->loadView('giohang',$cart);
		}
		else{
			$name = $_POST['fullname'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$note = $_POST['message'];

			$model = new CheckoutModel;
			$result = $model->insertCustomer($name,$email,$address,$phone);

			if($result){
				//sẽ lưu bill
			}
			else{
				setcookie('error',"Có lỗi xảy ra, vui lòng kiểm tra lại",time()+5);
				//return $this->loadView('giohang',$cart);
				header("Location:checkout.php");
			}

		}

	}



	

}


?>