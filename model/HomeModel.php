<?php
require_once('DBConnect.php');

class HomeModel extends DBConnect{

	public function getTodayFoods(){
		$sql = "SELECT * FROM `foods` where today=1";
	
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	public function getAll(){
		$sql = "SELECT * FROM `foods`";
	
		$this->setQuery($sql);
		return $this->loadAllRows();
	}


}


?>