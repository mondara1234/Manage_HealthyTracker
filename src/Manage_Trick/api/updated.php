<html>
<head>
	<title> Updated </title>
</head>
<body>

<?php
	include("../../Database/connect.php");

	$TrickID = $_POST["TrickID"];
	$pTrickName = $_POST["pTrickName"];
	$pTrickLike = $_POST["pTrickLike"];
	$pTrickDetail = $_POST["pTrickDetail"];
    $pPeopleAdd = $_POST["pPeopleAdd"];
    $pDateAdded = $_POST["pDateAdded"];
    $psourceURL = $_POST["psourceURL"];
    $pTrickIMG = $_FILES["pTrickIMG"]["name"];
    $path = basename($pTrickIMG);
    $upload = move_uploaded_file($_FILES["pTrickIMG"]["tmp_name"], $path);

	$sql = "UPDATE trickmanage SET 
			TrickName = '$pTrickName',
			TrickIMG = '$pTrickIMG',
			TrickDetail = '$pTrickDetail',
			TrickLike = '$pTrickLike',
			UnitBMI	 = '$pUnitBMI',
			PeopleAdd = '$pPeopleAdd',
			DateAdded = '$pDateAdded',
			sourceURL	 = '$psourceURL'
			
			WHERE TrickID = TrickID ";

	$query = mysqli_query($conn, $sql);

	if($query){
		echo("อัปเดทสำเร็จ");
	}else{
		echo("ลองใหม่อีกครั้ง");
	}

	mysqli_close($conn);
?>

<form name="Add" action="../ManageTips.php" method="post">
	<input type="submit" value="Ok" />
</form>
</body>
</html>
