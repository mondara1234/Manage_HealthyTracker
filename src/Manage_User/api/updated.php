<?php
	include("../../Database/connect.php");
    $UserName = $_GET["UserName"];
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
