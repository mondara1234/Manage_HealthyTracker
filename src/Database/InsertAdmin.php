<html>
<head>
	<title> InsertAdmin </title>
</head>
<body>
<?php
	$Username = $_POST["txtUsername"];
    $Email = $_POST["txtEmail"];
	$Password = $_POST["txtPassword"];
    $First_name = $_POST["txtFirst_name"];
    $Last_Name = $_POST["txtLast_Name"];
    $Address = $_POST["txtAddress"];
    $Telephone = $_POST["txtTelephone"];
    $ImgProfile = $_FILES["txtImgProfile"]["name"];
    $DateRegis = $_POST["date"];
    $Status = 'admin';
    $Permission = 'pending';
	
	if(empty($Username) || empty($Email) || empty($Password)) {
		echo ("<a href='register.php'> กรอกข้อมูลไม่ครบ </a>");
		exit;
	}

	$path = basename($ImgProfile);
	$upload = move_uploaded_file($_FILES['txtImgProfile']['tmp_name'], $path);

	include("connect.php");
	
	$sql = "INSERT INTO adminmanage (UserName, Email, Password, FirstName, LastName, Address, Telephone, Status, DateRegis, ImgProfile, Permission) 
			VALUES ('$Username', '$Email', '$Password', '$First_name', '$Last_Name','$Address', '$Telephone', '$Status', '$DateRegis', '$ImgProfile', '$Permission')";
	
	$query = mysqli_query($conn, $sql);
	
	if($query){
		echo("ลงทะเบียนเสร็จสิ้นรอการอนุมัติจากเจ้าของระบบนะครับ");
	}else{
		echo("ลงทะเบียนล้มเหลว");
	}
	
	mysqli_close($conn);
?>
<form name="BackHome" action="../../index.html" method="post">
	<input type="submit" value="Homepage" />
</form>
	
</body>
</html>