

	<?php
	
	$db_host = 'localhost';
	$db_username = 'root';
	$db_password = '';
	$db_name = 'lab_db';	
	$db = mysqli_connect( $db_host, $db_username, $db_password,$db_name) or die(mysql_error());
	
	
	$name = $_GET["name"];
	$class = $_GET["class"];
	$att = $_GET["att"];
	$comm = $_GET["comm"];
	
	
	
	$query = "SELECT * FROM user WHERE fullname = '$name'";
	
	$result= mysqli_query($db,$query);
	
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$sid = $row["id"];
		}

	$query1 = "INSERT INTO attendance VALUES ('$class','$sid','$att','$comm')";
	
	mysqli_query($db,$query1);
	
	
	echo "Success";
	
	?>
	
	