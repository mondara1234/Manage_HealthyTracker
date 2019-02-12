<?php
include("../../Database/connect.php");
	$Username = $_POST["pUserName"];
    $FoodName = $_POST["pFoodName"];
	$FoodNumber = $_POST["pFoodNumber"];
    $FoodUnit = $_POST["pFoodUnit"];
    $FoodCalorie = $_POST["pFoodCalorie"];
    $DiaryDate = $_POST["pDiaryDate"];

    $image = $_FILES["pFoodIMG"]["name"];
    $imageData = base64_encode(file_get_contents($image));
    $FoodIMG = 'data: '.mime_content_type($image).';base64,'.$imageData;


if(empty($Username) ||
    empty($FoodName) ||
    empty($FoodNumber) ||
    empty($FoodUnit) ||
    empty($FoodCalorie) ||
    empty($DiaryDate)) {
    $message = "กรุณากรอกข้อมูลให้ครบ";
    echo (
    "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
    );
}elseif($_FILES["pFoodIMG"]["name"] == ''){
    $message = "กรุณาใส่รูปภาพอาหารด้วยครับ";
    echo (
    "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
    );
}else{
    $Sql_Query = "select * from membermanage where UserName = '$Username'";

    $query = mysqli_query($conn, $Sql_Query);

    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if($result){
        $sql = "INSERT INTO fooddiary (UserName, FoodName, FoodIMG, FoodCalorie, DiaryDate, FoodUnit, FoodNumber) 
			VALUES ('$Username', '$FoodName', '$FoodIMG', '$FoodCalorie', '$DiaryDate','$FoodUnit', '$FoodNumber')";

        $query = mysqli_query($conn, $sql);

        if($query){
            $message = "เพิ่มข้อมูลเสร็จสิ้น";
            echo (
            "<script LANGUAGE='JavaScript'>
                window.alert('$message');
            </script>"
            );
        }else{
            $message = "เพิ่มข้อมูลล้มเหลว";
            echo (
            "<script LANGUAGE='JavaScript'>
                window.alert('$message');
            </script>"
            );
        }
    }else {

        $message = "ไม่มีชื่อผู้ใช้นี้อยู่ในระบบ";
        echo (
        "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
        );
        }
    }
	
	mysqli_close($conn);
?>