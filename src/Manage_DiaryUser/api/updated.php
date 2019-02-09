<?php
	include("../../Database/connect.php");
    $UserName = $_GET["UserName"];
	$DiaryID = $_POST["DiaryID"];
	$pUserName = $_POST["pUserName"];
	$pFoodName = $_POST["pFoodName"];
	$pFoodNumber = $_POST["pFoodNumber"];
    $pFoodCalorie = $_POST["pFoodCalorie"];
    $pDiaryDate = $_POST["pDiaryDate"];
    $pFoodUnit = $_POST["pFoodUnit"];
	$pFoodIMG = $_FILES["pFoodIMG"]["name"];
	$path = basename($pFoodIMG);
	$upload = move_uploaded_file($_FILES["pFoodIMG"]["tmp_name"], $path);

	$sql = "UPDATE fooddiary SET 
			UserName = '$pUserName',
			FoodName = '$pFoodName',
			FoodCalorie = '$pFoodCalorie',
			FoodNumber = '$pFoodNumber',
			DiaryDate = '$pDiaryDate',
			FoodUnit = '$pFoodUnit',
			FoodIMG = '$pFoodIMG'
			
			WHERE DiaryID = $DiaryID ";

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
