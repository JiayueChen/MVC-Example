<?php 
require_once('database.php');

// var_dump($_POST);
if ($_POST) {
	$name = $_POST['productName'];
	$price = $_POST['price'];
	$db = new Database();

	$db->insertAItem($name, $price);
}

$db = new Database();
$all_items = $db->getAllItems();



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Our MVC Project 1</title>
</head>
<body>
	<h1>This is a Shopping Cart Using DB</h1>
	<ul>
		<?php 
		foreach ($all_items as $item) {
			echo '<li id="'. $item['id'] . '">Name:' . $item['name'];
			echo "<br>";
			echo "Price:" . $item['price'];
			echo "<br>";
			echo '<button onclick="deleteItem(\'' . $item['id'] . '\')">Delete</button>';
			echo "</li>";

		}
		?>
	</ul>
	<div class="info"></div>

	<!-- action 为空则提交到自己 -->
	<form action="" method="post">
		<label for="">Name:</label>
		<input type="text" name="productName">
		<label for="">Price:</label>
		<input type="text" name="price">
		<input type="submit">

	</form>



	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

	<script>
		function deleteItem(id) {
			//console.log(name);
			//Ajax to connect back-end
			$.post(
				//可以写成"delete.php"
				"http://192.168.33.10/mvc1/delete.php",

				{
					"delete_id": id
				},
				function(data) {
					//console.log(data.message);
					$('.info').html(data.message);
					$('#' + id).hide();
				},
				"json"
				);

		}
	</script>
</body>
</html>