<html>
<head>
	<title> Updated </title>
</head>
<body>

<?php
	include("../../Database/connect.php");

	$UserID = $_POST["UserID"];
	$pEmail = $_POST["pEmail"];
	$pPassword = $_POST["pPassword"];
	$pUsername = $_POST["pUsername"];
    $pStatus = $_POST["pStatus"];
    $pLanguage = $_POST["pLanguage"];
    $pPersonalSelect = $_POST["pPersonalSelect"];
    $pPersonalCode = $_POST["pPersonalCode"];
    $pSex = $_POST["pSex"];
    $pAge = $_POST["pAge"];
    $pWeight = $_POST["pWeight"];
    $pHeight = $_POST["pHeight"];
    $pBMRUser = $_POST["pBMRUser"];
	$pImgProfile = $_FILES["pImgProfile"]["name"];
	$path = basename($pImgProfile);
	$upload = move_uploaded_file($_FILES["pImgProfile"]["tmp_name"], $path);

	$sql = "UPDATE MemberManage SET 
			Email = '$pEmail',
			Password = '$pPassword',
			Username = '$pUsername',
			imgProfile = '$pImgProfile',
			Status = '$pStatus',
			Language = '$pLanguage',
			PersonalSelect = '$pPersonalSelect',
			PersonalCode = '$pPersonalCode',
			Sex = '$pSex',
			Age = '$pAge',
			Weight = '$pWeight',
			Height = '$pHeight',
			BMRUser = '$pBMRUser'
			
			WHERE UserID = $UserID ";

	$query = mysqli_query($conn, $sql);

	if($query){
		echo("อัปเดทสำเร็จ");
	}else{
		echo("ลองใหม่อีกครั้ง");
	}

	mysqli_close($conn);
?>

<form name="Add" action="../UserInformation.php" method="post">
	<input type="submit" value="Ok" />
</form>
</body>
</html>
