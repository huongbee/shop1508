<?php
include_once('Controller.php');
include_once('model/DetailFoodModel.php');

class DetailFoodController extends Controller{

	public function getDetail(){
		$id = $_GET['id'];
		$alias = $_GET['alias'];

		$model = new DetailFoodModel;
		$food = $model->getDetail($id,$alias);
		$relatedFoods = $model->getFoodByType($id);

		if($food==null){
			header("location:404.php");
		}

		$arrData = ['food'=>$food, 'relatedFoods'=>$relatedFoods];
		return $this->loadView('chitietmonan',$arrData);
	}

}


?>