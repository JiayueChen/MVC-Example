<?php 

$a = $_POST['a'];
$b = $_POST['b'];
$c = $_GET['c'];


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");

echo json_encode(array(
	'a'=>$a,
	'b'=>$b,
	'c'=>$c
));


?>