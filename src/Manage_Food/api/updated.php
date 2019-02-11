<?php
	include("../../Database/connect.php");
    $UserName = $_GET["UserName"];
    $FoodID = $_POST["FoodID"];
	$pFoodName = $_POST["pFoodName"];
	$pFoodCalorie = $_POST["pFoodCalorie"];
	$pFoodType = $_POST["pFoodType"];
    $pFoodUnit = $_POST["pFoodUnit"];

    $old_img = $_POST["FoodIMG"];
$pFoodIMG;
    if ($_FILES["pFoodIMG"]["name"] !== ""){
        $image = $_FILES["pFoodIMG"]["name"];
        $imageData = base64_encode(file_get_contents($image));
        $pFoodIMG = 'data: '.mime_content_type($image).';base64,'.$imageData;
    }else{
        $pFoodIMG = $old_img;
    }

	$sql = "UPDATE foodmanage SET 
			FoodName = '$pFoodName',
			FoodCalorie = '$pFoodCalorie',
			FoodType = '$pFoodType',
			FoodUnit = '$pFoodUnit',
			FoodIMG = '$pFoodIMG'
			
			WHERE FoodID = $FoodID ";

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