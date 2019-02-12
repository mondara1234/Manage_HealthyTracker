<?php
include("../../Database/connect.php");
    $pFoodName = $_POST["pFoodName"];
    $pFoodCalorie = $_POST["pFoodCalorie"];
    $pFoodType = $_POST["pFoodType"];
    $pFoodUnit = $_POST["pFoodUnit"];

    $image = $_FILES["pFoodIMG"]["name"];
    $imageData = base64_encode(file_get_contents($image));
    $pFoodIMG = 'data: '.mime_content_type($image).';base64,'.$imageData;

if(empty($pFoodName) ||
    empty($pFoodCalorie) ||
    empty($pFoodUnit)) {
    $message = "กรุณากรอกข้อมูลให้ครบ";
    echo (
    "<script LANGUAGE='JavaScript'>
        window.alert('$message');
    </script>"
    );
}elseif($pFoodType === 'select' ){
    $message = "กรุณาเลือกรูปภาพ";
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
    $Sql_Query = "select * from foodmanage where FoodName = '$pFoodName'";

    $query = mysqli_query($conn, $Sql_Query);

    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if($result){
            $message = "มีรายการนี้ในระบบแล้วครับ";
            echo (
            "<script LANGUAGE='JavaScript'>
                window.alert('$message');
            </script>"
            );
    }else {
            $sql = "INSERT INTO foodmanage (FoodName, FoodIMG, FoodCalorie, FoodType, FoodUnit) 
			VALUES ('$pFoodName', '$pFoodIMG', '$pFoodCalorie', '$pFoodType', '$pFoodUnit')";

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
        }
    }
	
	mysqli_close($conn);
?>