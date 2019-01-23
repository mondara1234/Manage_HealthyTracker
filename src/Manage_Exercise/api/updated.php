<html>
<head>
	<title> Updated </title>
</head>
<body>

<?php
	include("../../Database/connect.php");

	$ExerciseID = $_POST["ExerciseID"];
	$pUserName = $_POST["pUserName"];
	$pExerciseName = $_POST["pExerciseName"];
	$pExerciseDetail = $_POST["pExerciseDetail"];
    $pPeopleAdd = $_POST["pPeopleAdd"];
    $pDateAdded = $_POST["pDateAdded"];
    $psourceURL = $_POST["psourceURL"];
    $pExerciseIMG = $_FILES["pExerciseIMG"]["name"];
    $path = basename($pExerciseIMG);
    $upload = move_uploaded_file($_FILES["pExerciseIMG"]["tmp_name"], $path);

	$sql = "UPDATE exercisemanage SET 
			UserName = '$pUserName',
			ExerciseName = '$pExerciseName',
			ExerciseDetail = '$pExerciseDetail',
			PeopleAdd = '$pPeopleAdd',
			DateAdded	 = '$pDateAdded',
			sourceURL = '$psourceURL',
			ExerciseIMG = '$pExerciseIMG'
			
			WHERE ExerciseID = $ExerciseID ";

	$query = mysqli_query($conn, $sql);

	if($query){
		echo("อัปเดทสำเร็จ");
	}else{
		echo("ลองใหม่อีกครั้ง");
	}

	mysqli_close($conn);
?>

<form name="Add" action="../../Manage_BMI/ManageBMI.php" method="post">
	<input type="submit" value="Ok" />
</form>
</body>
</html>
