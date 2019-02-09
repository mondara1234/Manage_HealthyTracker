<html>
<head>
	<title> Updated </title>
</head>
<body>

<?php
	include("../../Database/connect.php");
    $UserID = $_POST["UserID"];
	$Permission = $_POST["Permission"];
	$UserName = $_POST["UserName"];

	$sql = "UPDATE adminmanage SET 
			Permission = '$Permission'
			
			WHERE ID = $UserID ";

	$query = mysqli_query($conn, $sql);

	if($query){
        $message = "เปลี่ยนสถานะเป็น $Permission สำเร็จ";
        echo (
        "<script LANGUAGE='JavaScript'>
            window.alert('$message');
            window.location.href='../Permission.php?UserName=$UserName';
        </script>"
        );
	}else{
        $message = "ลองใหม่อีกครั้ง";
        echo (
        "<script LANGUAGE='JavaScript'>
            window.alert('$message');
            window.location.href='../Permission.php?UserName=$UserName';
        </script>"
        );
	}
	mysqli_close($conn);
?>

</body>
</html>
