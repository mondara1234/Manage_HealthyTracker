<?php
include("../../Database/connect.php");
	$AU_UserName = $_POST["AU_UserName"];
    $AU_Title = $_POST["AU_Title"];
	$AU_Datile = $_POST["AU_Datile"];
    $AU_Date = $_POST["AU_Date"];
    $Status = 'false';

if(empty($AU_UserName) ||
    empty($AU_Title) ||
    empty($AU_Datile) ||
    empty($AU_Date)) {
    $message = "กรุณากรอกข้อมูลให้ครบ";
    echo (
    "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
    );
}else{
    $Sql_Query = "select * from membermanage where UserName = '$AU_UserName'";

    $query = mysqli_query($conn, $Sql_Query);

    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if($result){
        $sql = "INSERT INTO alertuser (AU_UserName, AU_Datile, AU_Date, AU_Title, AU_Status) 
			VALUES ('$AU_UserName', '$AU_Datile', '$AU_Date', '$AU_Title', '$Status')";

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