<meta charset="utf-8">
<?php
	include("../../Database/connect.php");
    $FoodID = $_POST["FoodID"];
	$pFoodName = $_POST["pFoodName"];
	$pFoodCalorie = $_POST["pFoodCalorie"];
	$pFoodType = $_POST["pFoodType"];
    $pFoodUnit = $_POST["pFoodUnit"];

    $old_img = $_POST["FoodIMG"];
    $pFoodIMG;
    if ($_FILES["pFoodIMG"]["name"] !== ""){
        $filename = $conn->real_escape_string($_FILES['pFoodIMG']['name']);
        $filedata= $conn->real_escape_string(base64_encode(file_get_contents($_FILES['pFoodIMG']['tmp_name'])));
        $filetype = $conn->real_escape_string($_FILES['pFoodIMG']['type']);
        $pFoodIMG = 'data:'.$filetype.';base64,'.$filedata;
    }else{
        $pFoodIMG = $old_img;
    }

if(empty($pFoodName) ||
    empty($pFoodCalorie) ||
    empty($pFoodUnit)) {
    $message = "กรุณากรอกข้อมูลให้ครบ";
    echo (
    "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
    );
}else {
    $sql = "UPDATE foodmanage SET 
			FoodName = '$pFoodName',
			FoodCalorie = '$pFoodCalorie',
			FoodType = '$pFoodType',
			FoodUnit = '$pFoodUnit',
			FoodIMG = '$pFoodIMG'
			
			WHERE FoodID = $FoodID ";

    $query = mysqli_query($conn, $sql);

    if ($query) {
        $message = "แก้ไขข้อมูลสำเร็จ";
        echo(
        "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
        );
    } else {
        $message = "แก้ไขข้อมูลล้มเหลว";
        echo(
        "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
        );
    }
}
	mysqli_close($conn);
?>