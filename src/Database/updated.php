<html>
<head>
	<title> Updated </title>
</head>
<body>

<?php
	include("connect.php");

	$UserID = $_POST["UserID"];
	$pEmail = $_POST["pEmail"];
	$pPassword = $_POST["pPassword"];
	$pUsername = $_POST["pUsername"];
    $pStatus = $_POST["pStatus"];
	$pImgProfile = $_FILES["pImgProfile"]["name"];

	if(empty($Email)|| empty($pPassword)){
		echo("<a href='edit.php?UserID=$UserID'> กรอกข้อมูลไม่ครบ </a>");
	}

	$path = basename($pImgProfile);
	$upload = move_uploaded_file($_FILES["pImgProfile"]["tmp_name"], $path);

	$sql = "UPDATE MemberManage SET 
			Email = '$pEmail',
			Password = '$pPassword',
			Username = '$pUsername',
			imgProfile = '$pImgProfile',
			Status = '$pStatus'
			
			WHERE UserID = $UserID ";

	$query = mysqli_query($conn, $sql);

	if($query){
		echo("Update Success");
	}else{
		echo("Failed");
	}

	mysqli_close($conn);
?>

<form name="Add" action="../ManageMembers.php" method="post">
	<input type="submit" value="Ok" />
</form>
</body>
</html>
