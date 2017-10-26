<?php
include_once('Controller.php');
include_once('model/DetailFoodModel.php');

class DetailFoodController extends Controller{

	public function getDetail(){
		$id = $_GET['id'];
		$alias = $_GET['alias'];

		$model = new DetailFoodModel;
		$food = $model->getDetail($id,$alias);
			
		if($food==null){
			header("location:404.php");
		}

		$arrData = ['food'=>$food];
		return $this->loadView('chitietmonan',$arrData);
	}

}


?>