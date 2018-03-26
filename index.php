<?php 
require_once('database.php');

// var_dump($_POST);
if ($_POST) {
	$name = $_POST['productName'];
	$price = $_POST['price'];

	insertAItem($name, $price);
}


$all_items = getAllItems();



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
			echo "<li>Name:" . $item['name'];
			echo "<br>";
			echo "Price:" . $item['price'];
			echo "<br>";
			echo '<button onclick="deleteItem(\'' . $item['name'] . '\')">Delete</button>';
			echo "</li>";

		}
		?>
	</ul>

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
		function deleteItem(name) {
			//console.log(name);
			//Ajax to connect back-end
			$.post(
				"http://192.168.33.10/mvc1/delete.php",
				{
					"delete_name": name
				},
				function(data) {

				},
				"json"
				)

		}
	</script>
</body>
</html>