<html>
<head>
	<title> Updated </title>
</head>
<body>

<?php
	include("../../Database/connect.php");

    $FoodID = $_POST["FoodID"];
	$pFoodName = $_POST["pFoodName"];
	$pFoodCalorie = $_POST["pFoodCalorie"];
	$pFoodType = $_POST["pFoodType"];
    $pFoodUnit = $_POST["pFoodUnit"];
    $pFoodIMG = $_FILES["pFoodIMG"]["name"];
    $path = basename($pFoodIMG);
    $upload = move_uploaded_file($_FILES["pFoodIMG"]["tmp_name"], $path);

	$sql = "UPDATE foodmanage SET 
			FoodName = '$pFoodName',
			FoodCalorie = '$pFoodCalorie',
			FoodType = '$pFoodType',
			FoodUnit = '$pFoodUnit',
			FoodIMG = '$pFoodIMG'
			
			WHERE FoodID = $FoodID ";

	$query = mysqli_query($conn, $sql);

	if($query){
		echo("อัปเดทสำเร็จ");
	}else{
		echo("ลองใหม่อีกครั้ง");
	}

	mysqli_close($conn);
?>

<form name="Add" action="../ManageFood.php" method="post">
	<input type="submit" value="Ok" />
</form>
</body>
</html>
