<?php 
require_once('database.php');
$name = $_POST['delete_id'];

$affect_row = deleteItem($name);

if ($affect_row == 0) {
	$str = 'Delete Failed';
}else{
	$str = 'Delete Successfully';
}

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");

$result= array('message'=> $str);

echo json_encode($result);
?>