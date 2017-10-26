<?php
require_once('DBConnect.php');

class HomeModel extends DBConnect{

	public function getTodayFoods(){
		$sql = "SELECT f.*, p.url FROM foods f
                INNER JOIN page_url p
                ON f.id_url = p.id
                where today=1";
	
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	/*public function getAll(){
		$sql = "SELECT * FROM `foods`";
	
		$this->setQuery($sql);
		return $this->loadAllRows();
	}*/


	public function getFoodPagination($vitri =-1 ,$soluong=0){
		$sql = "SELECT f.*, p.url FROM foods f
                INNER JOIN page_url p
                ON f.id_url = p.id";

		if($vitri >= 0 && $soluong > 0){
			$sql .= " LIMIT $vitri,$soluong";
		}

		$this->setQuery($sql);
		return $this->loadAllRows();
	}

}



/*
function stripUnicode($str){
    if(!$str) return false;
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Á|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd' => 'đ',
        'D' => 'Đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
    );

    foreach($unicode as $khongdau=>$codau){
        $arr = explode("|", $codau);
        $str = str_replace($arr,$khongdau,$str);
    }
    return $str;
    //Chào "bạn"
    //Chao ban

}

function changeTitle($str){
    $str = trim($str);
    if($str=="") return "";
    $str = str_replace('"', '', $str);
    $str = str_replace("'", '', $str);
    $str = str_replace(".", '', $str);
    $str = str_replace("!", '', $str);
    $str = str_replace("/", '', $str);
    $str = str_replace(",", '', $str);

    $str = stripUnicode($str); //Chao ban
    $str = mb_convert_case($str, MB_CASE_LOWER,'utf-8'); //chao ban
    $str = str_replace(' ', '-', $str); //chao-ban
    return $str;
}

$sql = "SELECT name FROM foods";
$model = new DBConnect;
$model->setQuery($sql);
$foods = $model->loadAllRows();
//print_r($foods);
$alias = [];

for($i=1; $i<=count($foods); $i++){
	$alias = changeTitle($foods[$i-1]->name);

	$sql = "INSERT INTO page_url(id,url) VALUES ($i,'$alias')";
	$model->setQuery($sql);
	$model->executeQuery();

	$name = $foods[$i-1]->name;
	$sql2 = "UPDATE foods SET id_url = $i WHERE name='$name'";
	$m = new DBConnect;
	$m->setQuery($sql2);
	$m->executeQuery();
}
echo 'done!';
*/
// ALTER TABLE foods ADD FOREIGN KEY (id_url) REFERENCES page_url(id)

?>