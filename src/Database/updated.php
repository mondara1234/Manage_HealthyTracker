<html>
<head>
	<title> Updated </title>
</head>
<body>

<?php
	include("connect.php");

	$pid = $_POST["pid"];
	$pname = $_POST["pname"];
	$price = $_POST["price"];
	$brand = $_POST["brand"];
	$pic = $_FILES["pic"]["name"];
	$year = $_POST["year"];

	if(empty($pname)|| empty($price)){
		echo("<a href='update.php'> กรอกข้อมูลไม่ครบ </a>");
	}

	$path = basename($pic);
	$upload = move_uploaded_file($_FILES["pic"]["tmp_name"], $path);

	$sql = "UPDATE product SET 
			pname = '$pname',
			price = '$price',
			brand = '$brand',
			pic = '$pic',
			year = '$year'
			
			WHERE pid = $pid ";

	$query = mysqli_query($conn, $sql);

	if($query){
		echo("Update Success");
	}else{
		echo("Failed");
	}

	mysqli_close($conn);
?>

<form name="Add" action="index.html" method="post">
	<input type="submit" value="Ok" />
</form>
</body>
</html>
