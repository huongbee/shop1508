<?php
require_once('DBConnect.php');

class DetailFoodModel extends DBConnect{

	public function getDetail($id,$alias){
		$sql = "SELECT f.* FROM foods f
				INNER JOIN page_url p
					ON f.id_url = p.id
				WHERE f.id=$id
				AND p.url = '$alias'
				";


	}
}