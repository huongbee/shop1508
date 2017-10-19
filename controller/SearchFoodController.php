<?php
include_once('Controller.php');

class SearchFoodController extends Controller{

	public function getSearch(){

		return $this->loadView('timkiem');
	}

}


?>