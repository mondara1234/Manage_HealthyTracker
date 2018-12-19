<html>
<head>
	<title> Updated </title>
</head>
<body>

<?php
	include("connect.php");

	$UserID = $_POST["UserID"];
	$pUsername = $_POST["pUsername"];
	$pPassword = $_POST["pPassword"];
	$pName = $_POST["pName"];
    $pStatus = $_POST["pStatus"];
	$pImgProfile = $_FILES["pImgProfile"]["name"];

	if(empty($pUsername)|| empty($pPassword)){
		echo("<a href='edit.php?UserID=$UserID'> กรอกข้อมูลไม่ครบ </a>");
	}

	$path = basename($pImgProfile);
	$upload = move_uploaded_file($_FILES["pImgProfile"]["tmp_name"], $path);

	$sql = "UPDATE MemberManage SET 
			Username = '$pUsername',
			Password = '$pPassword',
			Name = '$pName',
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
