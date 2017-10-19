<?php
include_once('Controller.php');

class DetailFoodController extends Controller{

	public function getDetail(){

		return $this->loadView('chitietmonan');
	}

}


?>