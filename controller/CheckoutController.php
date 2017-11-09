<?php
include_once('Controller.php');
include_once('controller/Cart.php');
include_once('model/CheckoutModel.php');
include_once('include/function.php');
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

		//print_r($cart);

		if(!isset($_POST['btnCheckout'])){
			return $this->loadView('giohang',$cart);
		}
		else{
			$name = $_POST['fullname'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			

			$model = new CheckoutModel;
			$idCustomer = $model->insertCustomer($name,$email,$address,$phone);

			if($idCustomer){
				//sẽ lưu bill
				$dateOrder = date('Y-m-d',time());
				$total = $cart->totalPrice;
				$note = $_POST['message'];
				$token = createToken();
				$tokenDate = date('Y-m-d h:i:s',time());

				$idBill = $model->insertBill($idCustomer,$dateOrder,$total, $note, $token, $tokenDate);

				if($idBill>0){
					//insert bill detail
					//echo $idBill;
					$temp = 1;
					foreach($cart->items as $idFood=>$food){
						$result = $model->insertBillDetail($idBill,$idFood,$food['qty'],$food['price']);
						if($result){
							$temp += 1;
						}

					}
					// echo $temp; 
					// 	die;
					if($temp==1){ //có lỗi
						$model->deleteRecentInsertBillDetail($idBill);
						$model->deleteRecentInsertBill($idBill);
						$model->deleteRecentInsertCus($idCustomer);
					}
					else{
						//gửi mail

						//xóa session cart
						unset($_SESSION['cart']);
						unset($cart);

						setcookie('success',"Đặt hàng thành công, vui lòng kiểm tra hộp thư để xác nhận đơn hàng",time()+5);
						header("Location:checkout.php");
						return;
					}

					

				}
				else{
					//xóa customer
					$model->deleteRecentInsertCus($idCustomer);
				}

			}
			setcookie('error',"Có lỗi xảy ra, vui lòng kiểm tra lại",time()+5);
			header("Location:checkout.php");
			//return $this->loadView('giohang',$cart);
			

		}

	}



	

}


?>