<html>
<head>
	<title>Lab#11</title>
	
	<style>
	
		
		body {
			font-family: Georgia, Times, serif;
  
		}
		
		#less{
			
			font-size: 40px;
			font-weight:bold;
			color : red;
			
		}
		
		#great{
			font-size: 40px;
			font-weight:bold;
			color : green;
			
		}
		
		#mid{
			font-size: 40px;
			font-weight:bold;
			color : orange;
			
		}
		
		
		
		
	
	</style>
</head>

<body>




	
	
	<?php
	
	$email = $_GET["search"];
	$role = $_GET["search1"];

	
	$db_host = 'localhost';
	$db_username = 'root';
	$db_password = '';
	$db_name = 'lab_db';	
	$db = mysqli_connect( $db_host, $db_username, $db_password,$db_name) or die(mysql_error());
	
	
	$query5 = "SELECT * FROM user WHERE email = '$email'";
	
	$result5= mysqli_query($db,$query5);
	
	
	$check = 0;
	
	while($row5 = mysqli_fetch_array($result5,MYSQLI_ASSOC)){
			$check = $row5["id"];
	}
	
	if($check == 0){
		echo "User not enlisted";
	}
	
	
	else{
	
	
	
	if($role == "teacher"){
		
	?>
	
	<form action="lab11_mark.php" method="get" >
		Student Name: <input type="text" name="name" ><br><br>
		Class id:  <input type="text" name="class"><br><br>
		Attendance: <input type="text" name="att"><br><br>
		Comments: <input type="text" name="comm"><br><br>
		
		<button name="subject" type="submit" value="HTML">Submit</button>
	</form>
	
	
	
	<?php
		
		
	
	$query = "SELECT * FROM user WHERE email = '$email'";
	
	$result= mysqli_query($db,$query);
	
	
	
	
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$teacher = $row["id"];
	}
	
	$query1 = "SELECT * FROM class WHERE teacherid = '$teacher'";
	$result1 = mysqli_query($db,$query1);
	
	while($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
			$classid = $row1["id"];
			
			
			$query2 = "SELECT * FROM user WHERE role = 'student'";
			$result2 = mysqli_query($db,$query2);
			
			while($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)){
			$fullname =   $row2["fullname"];
			$classname =  $row2["class"];
			}
			
			
			
			
			
	}

	}
	
	elseif($role == "student"){
			
		$query = "SELECT * FROM user WHERE email = '$email'";
	
		$result= mysqli_query($db,$query);
		
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$sid = $row["id"];
		}
		
		$query1 = "SELECT * FROM attendance WHERE studentid = '$sid'";
	
		$result1= mysqli_query($db,$query1);
		
		
			$total = 0;
			$present = 0;

		while($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
			$total++;
			if($row1["isPresent"] == 1){
				$present++;
			}
			
		}
		
		$per = ($present/$total)*100;
		
		?>
		
		<p style="font-size:40px; font-weight:bold">Your attendance is: </p><br>
		
		<?php
		
		
		if($per < 75){
			?>
			
			<p id="less">
		<?php
			echo $per."%";
		?>
		
			</p>
		
		<?php
			}
			
		if($per >= 85){
			
		?>
		
			<p id="great">
			
		<?php
			echo $per."%";
		?>

			</p>
		
		<?php
			}
			
		if($per >= 75 && $per < 85){
				
		?>
		
		<p id="mid">
			
		<?php
			echo $per."%";
		?>

			</p>
		
		<?php
			}
				
		}
		
	}

	?>

</body>

</html>

