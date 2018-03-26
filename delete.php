<?php 
require_once('database.php');
$delete = $_POST['delete_name'];
deleteItem($delete);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");

echo "";
 ?>