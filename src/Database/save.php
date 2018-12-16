<html>
<head>
	<title> After Edited </title>
</head>
<body>
<?php
	$txtName = $_POST["txtName"];
    $txtUsername = $_POST["txtUsername"];
	$txtPassword = $_POST["txtPassword"];
    $txtPic = $_FILES["txtPic"]["name"];
    $txtStatus = $_POST["txtStatus"];
	
	if(empty($txtUsername) || empty($txtPassword) || empty($txtName)) {
		echo ("<a href='register.html'> กรอกข้อมูลไม่ครบ </a>");
		exit;
	}

	$path = basename($txtPic);
	$upload = move_uploaded_file($_FILES['txtPic']['tmp_name'], $path);

	include("connect.php");
	
	$sql = "INSERT INTO MemberManage (Username, Password, Name, Status, imgProfile) 
			VALUES ('$txtUsername', '$txtPassword', '$txtName', '$txtStatus', '$txtPic')";
	
	$query = mysqli_query($conn, $sql);
	
	if($query){
		echo("Update Success ");
	}else{
		echo("Failed");
	}
	
	mysqli_close($conn);
?>
<form name="BackHome" action="index.html" method="post">
	<input type="submit" value="Homepage" />
</form>
	
</body>
</html>