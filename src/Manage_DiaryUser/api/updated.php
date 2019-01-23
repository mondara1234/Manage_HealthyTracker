<html>
<head>
	<title> Updated </title>
</head>
<body>

<?php
	include("../../Database/connect.php");

	$DiaryID = $_POST["DiaryID"];
	$pUserName = $_POST["pUserName"];
	$pFoodName = $_POST["pFoodName"];
	$pFoodNumber = $_POST["pFoodNumber"];
    $pFoodCalorie = $_POST["pFoodCalorie"];
    $pDiaryDate = $_POST["pDiaryDate"];
    $pFoodUnit = $_POST["pFoodUnit"];
	$pFoodIMG = $_FILES["pFoodIMG"]["name"];
	$path = basename($pFoodIMG);
	$upload = move_uploaded_file($_FILES["pFoodIMG"]["tmp_name"], $path);

	$sql = "UPDATE fooddiary SET 
			UserName = '$pUserName',
			FoodName = '$pFoodName',
			FoodCalorie = '$pFoodCalorie',
			FoodNumber = '$pFoodNumber',
			DiaryDate = '$pDiaryDate',
			FoodUnit = '$pFoodUnit',
			FoodIMG = '$pFoodIMG'
			
			WHERE DiaryID = $DiaryID ";

	$query = mysqli_query($conn, $sql);

	if($query){
		echo("อัปเดทสำเร็จ");
	}else{
		echo("ลองใหม่อีกครั้ง");
	}

	mysqli_close($conn);
?>

<form name="Add" action="../ManageDiary.php" method="post">
	<input type="submit" value="Ok" />
</form>
</body>
</html>
