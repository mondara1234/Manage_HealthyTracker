<?php
include("../../Database/connect.php");
	$NameBMI = $_POST["txtNameBMI"];
    $DetailBMI = $_POST["txtDetailBMI"];
	$SumBMI = $_POST["txtSumBMI"];
    $BMIUser = $_POST["BMIUser"];
    $UnitBMI = $_POST["txtUnitBMI"];

if(empty($NameBMI) ||
    empty($DetailBMI) ||
    empty($SumBMI) ||
    empty($UnitBMI)) {
    $message = "กรุณากรอกข้อมูลให้ครบ";
    echo (
    "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
    );
}elseif($BMIUser === 'select' ){
    $message = "กรุณาเลือกเกณฑ์ของBMI";
    echo (
    "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
    );
}else{
    $Sql_Query = "select * from bmiuser where NameBMI = '$NameBMI'";

    $query = mysqli_query($conn, $Sql_Query);

    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if($result){
            $message = "มีหัวข้อนี้แล้วครับ";
            echo (
            "<script LANGUAGE='JavaScript'>
                    window.alert('$message');
                </script>"
            );
    }else {
            $sql = "INSERT INTO bmiuser (NameBMI, DetailBMI, SumBMI, BMIUser, UnitBMI) 
			VALUES ('$NameBMI', '$DetailBMI', '$SumBMI', '$BMIUser', '$UnitBMI')";

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