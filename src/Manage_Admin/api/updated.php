<html>
<head>
	<title> Updated </title>
</head>
<body>

<?php
	include("../../Database/connect.php");

	$AdminID = $_POST["AdminID"];
	$pUserName = $_POST["pUserName"];
	$pEmail = $_POST["pEmail"];
	$pPassword = $_POST["pPassword"];
    $pFirstName = $_POST["pFirstName"];
    $pLastName = $_POST["pLastName"];
    $pAddress = $_POST["pAddress"];
    $pTelephone = $_POST["pTelephone"];
    $pStatus = $_POST["pStatus"];
    $pDateRegis = $_POST["pDateRegis"];
    $pImgProfile = $_FILES["pImgProfile"]["name"];
    $path = basename($pImgProfile);
    $upload = move_uploaded_file($_FILES["pImgProfile"]["tmp_name"], $path);

	$sql = "UPDATE adminmanage SET 
			UserName = '$pUserName',
			Email = '$pEmail',
			Password = '$pPassword',
			FirstName = '$pFirstName',
			LastName	 = '$pLastName',
			Address = '$pAddress',
			Telephone = '$pTelephone',
			Status = '$pStatus',
			DateRegis	 = '$pDateRegis',
			ImgProfile = '$pImgProfile'
			
			WHERE ID = $AdminID ";

	$query = mysqli_query($conn, $sql);

	if($query){
		echo("อัปเดทสำเร็จ");
	}else{
		echo("ลองใหม่อีกครั้ง");
	}

	mysqli_close($conn);
?>

<form name="Add" action="../../Manage_Admin/ManageAdmin.php" method="post">
	<input type="submit" value="Ok" />
</form>
</body>
</html>
