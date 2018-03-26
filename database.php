<?php 

function getAllItems() {
// Create a PDO connection object
	$pdo = new PDO('mysql:host=localhost;dbname=shopping_cart;charset=utf8mb4', 'root', 'root');

// var_dump($pdo);


// Creat PDO statement object from connection object
// $pdo object run query function and this function return a statement objedct
	$sql = "SELECT * FROM items";
	$stmt = $pdo->query($sql);

// Execute the ststemengt and get all the results
// PDO::FETCH_ASSOC get the const from function fetchAll
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $result;
}

function insertAItem($name, $price) {
// Create a PDO connection object
	$pdo = new PDO('mysql:host=localhost;dbname=shopping_cart;charset=utf8mb4', 'root', 'root');


// Creat PDO statement object from connection object
// $pdo object run query function and this function return a statement objedct
	
	//(:name, :price)防止sql注入，永远不要相信用户输入,保护安全性
	$stmt = $pdo->prepare("INSERT INTO items(name,price) VALUES (:name, :price)");
	
	//用户输入，在传入中进行检查，如果合格把占位符去掉，替换为用户输入的内容
	$stmt->execute(
		array(
			':name'=>$name,
			':price'=>$price
		)
	);


	$affected_rows = $stmt->rowCount();

	return $affected_rows;
}


function deleteItem($id) {
// Create a PDO connection object
	$pdo = new PDO('mysql:host=localhost;dbname=shopping_cart;charset=utf8mb4', 'root', 'root');

	$stmt = $pdo->prepare("DELETE FROM items WHERE id = :id");

	$stmt->execute(
		array(':id'=>$id)
	);

	$affected_rows = $stmt->rowCount();

	return $affected_rows;
}






/*class PDO2 {
	const FETCH_OBJ = 2;
	const FETCH_ASSOC = 1;

	public statci function fetchAll($mode) {
		if ($mode == 1) {
			return "return in ASSOC array format";
			# code...
		}
		if ($mode == 2) {
			return "return in object format";
			# code...
		}
		return "unknow";
	}
}
echo PDO2::fetchAll(PDO2::FETCH_OBJ);
echo PDO::FETCH_LAZY;*/

?>