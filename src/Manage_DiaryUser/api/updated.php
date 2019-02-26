<meta charset="utf-8">
<?php
	include("../../Database/connect.php");
	$DiaryID = $_POST["DiaryID"];
	$pUserName = $_POST["pUserName"];
	$pFoodName = $_POST["pFoodName"];
	$pFoodNumber = $_POST["pFoodNumber"];
    $pFoodCalorie = $_POST["pFoodCalorie"];
    $pDiaryDate = $_POST["pDiaryDate"];
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
    empty($pFoodNumber) ||
    empty($pFoodCalorie) ||
    empty($pFoodUnit) ||
    empty($pDiaryDate)) {
    $message = "กรุณากรอกข้อมูลให้ครบ";
    echo (
    "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
    );
}else {
    $Sql_Query = "select * from fooddiary where FoodName = '$pFoodName'";

    $query = mysqli_query($conn, $Sql_Query);

    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if($result) {
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
    }else{
        $message = "ไม่มีชื่อรายการอาหารนี้ในระบบ";
        echo (
        "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
        );
    }
}
	mysqli_close($conn);
?>
