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

    $old_img = $_POST["ImgProfile"];
    $pImgProfile;
    if ($_FILES["pImgProfile"]["name"] !== ""){
        $image = $_FILES["pImgProfile"]["name"];
        $imageData = base64_encode(file_get_contents($image));
        $pImgProfile = 'data: '.mime_content_type($image).';base64,'.$imageData;
    }else{
        $pImgProfile = $old_img;
    }

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

