<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php 

	$jacob = '{"name":"jacob", "hobby":["first","second"]}';
	$jacob_array = json_decode($jacob,true);
	echo $jacob_array['name'];

	echo "<br>";

	$wenbo_array = array(
		"name"=>"wenbo",
		"hobby"=>array(
			"soccer"=>array("BS","AC"),
			"basketball"=>array("laker","toronto"=>array(
				"1","2"))
		)
	);

	echo json_encode($wenbo_array);
	?>

</body>
</html>