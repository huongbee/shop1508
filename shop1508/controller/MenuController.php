<?php
include_once('Controller.php');

class MenuController extends Controller{

	public function getListMenu(){

		return $this->loadView('ds-thucdon');
	}

}


?>