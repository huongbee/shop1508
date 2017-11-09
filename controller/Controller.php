<?php

class Controller{

	public function __construct(){
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		//echo date_default_timezone_get();
	}

	public function loadView($view, $data=[]){
		include_once('view/layout.php');
	}

}


?>