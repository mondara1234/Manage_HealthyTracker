<html>
<head>
	<title> Updated </title>
</head>
<body>

<?php
	include("../../Database/connect.php");

	$ProblemID = $_POST["ProblemID"];
	$pProblemName = $_POST["pProblemName"];
	$pProblemType = $_POST["pProblemType"];
	$pTrickDetail = $_POST["pTrickDetail"];
    $pPeopleAdd = $_POST["pPeopleAdd"];
    $pDateAdded = $_POST["pDateAdded"];
    $pProblemIMG = $_FILES["pProblemIMG"]["name"];
    $path = basename($pProblemIMG);
    $upload = move_uploaded_file($_FILES["pProblemIMG"]["tmp_name"], $path);

	$sql = "UPDATE trickmanage SET 
			TrickName = '$pTrickName',
			ProblemName = '$pProblemName',
			ProblemType = '$pProblemType',
			TrickDetail = '$pTrickDetail',
			ProblemIMG	 = '$pProblemIMG',
			PeopleAdd = '$pPeopleAdd',
			DateAdded = '$pDateAdded'
			
			WHERE ProblemID = $ProblemID ";

	$query = mysqli_query($conn, $sql);

	if($query){
		echo("อัปเดทสำเร็จ");
	}else{
		echo("ลองใหม่อีกครั้ง");
	}

	mysqli_close($conn);
?>

<form name="Add" action="../Problems.php" method="post">
	<input type="submit" value="Ok" />
</form>
</body>
</html>
