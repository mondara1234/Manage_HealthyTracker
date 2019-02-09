<?php
	include("../../Database/connect.php");
    $UserName = $_GET["UserName"];
	$AdminID = $_POST["AdminID"];
	$pUserName = $_POST["pUserName"];
	$pEmail = $_POST["pEmail"];
	$pPassword = $_POST["pPassword"];
    $pFirstName = $_POST["pFirstName"];
    $pLastName = $_POST["pLastName"];
    $pAddress = $_POST["pAddress"];
    $pTelephone = $_POST["pTelephone"];
    $pStatus = $_POST["pStatus"];
    $Permission = $_POST["Permission"];
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
			Permission = '$Permission',
			DateRegis	 = '$pDateRegis',
			ImgProfile = '$pImgProfile'
			
			WHERE ID = $AdminID ";

	$query = mysqli_query($conn, $sql);

	if($query){
        $message = "อัพเดทสำเร็จ";
        echo (
        "<script LANGUAGE='JavaScript'>
            window.alert('$message');
            window.location.href='edit.php?UserName=$UserName';
        </script>"
        );
	}else{
        $message = "อัพเดทล้มเหลว";
        echo (
        "<script LANGUAGE='JavaScript'>
            window.alert('$message');
            window.location.href='edit.php?UserName=$UserName';
        </script>"
        );
	}

	mysqli_close($conn);
?>

