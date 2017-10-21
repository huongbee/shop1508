<?php
include_once('Controller.php');
include_once('model/HomeModel.php');


class HomeController extends Controller{

	public function getIndex(){

		$model = new HomeModel;
		$today = $model->getTodayFoods();
		$foods = $model->getAll();

		$arrayData = ['today'=>$today,'foods'=>$foods];

		return $this->loadView('trangchu',$arrayData);
	}

}


?>