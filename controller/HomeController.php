<?php
include_once('Controller.php');
include_once('model/HomeModel.php');
include_once('model/pager.php');

class HomeController extends Controller{

	public function getIndex(){

		$model = new HomeModel;
		$today = $model->getTodayFoods();
		$foods = $model->getFoodPagination();

		$totalItem = count($foods);
		$currentPage = (isset($_GET['page']) && $_GET['page']!=0) ? abs($_GET['page']) : 1;
		//$currentPage = abs($currentPage);
		$soluong = 6;
		$nPageShow = 4;

		$pager = new Pager($totalItem,$currentPage,$soluong,$nPageShow);

		$vitri = ($currentPage - 1)*$soluong;
		
		$foods = $model->getFoodPagination($vitri,$soluong);

		$showPagination = $pager->showPagination();

		$arrayData = [
			'today'			 => $today,
			'foods'			 => $foods,
			'showPagination' => $showPagination
		];

		return $this->loadView('trangchu',$arrayData);
	}

}


?>