<?php
include("../../Database/connect.php");
    $UserName = $_POST["UserName"];
    $Energy = $_POST["Energy"];
    $UnitType = $_POST["UnitType"];
    $DateDiary = $_POST["DateDiary"];

if(empty($UserName) ||
    empty($Energy) ||
    empty($DateDiary)) {
    $message = "กรุณากรอกข้อมูลให้ครบ";
    echo (
    "<script LANGUAGE='JavaScript'>
        window.alert('$message');
    </script>"
    );
}elseif($UnitType === 'select' ){
    $message = "กรุณาเลือกหน่วยพลังงาน";
    echo (
    "<script LANGUAGE='JavaScript'>
        window.alert('$message');
    </script>"
    );
}else{
    $Sql_Query = "select * from membermanage where UserName = '$UserName'";

    $query = mysqli_query($conn, $Sql_Query);

    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if($result){

        $sql = "INSERT INTO energy_users_per_day (UserName, Energy, Unit, DateDiary) 
			VALUES ('$UserName', '$Energy', '$UnitType', '$DateDiary')";

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
        $message = "ไม่พบชื่อผู้ใช้งานนี้ในระบบ";
        echo (
        "<script LANGUAGE='JavaScript'>
                window.alert('$message');
            </script>"
        );
        }
    }
	
	mysqli_close($conn);
?>