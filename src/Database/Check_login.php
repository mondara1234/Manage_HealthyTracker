<?php
    include('connect.php');

    $txtUsername = $_POST["txtUsername"];
    $txtPassword = $_POST["txtPassword"];

    if(empty($txtUsername) || empty($txtPassword)){
        echo ("<a href='./../login/login.html'> กรอกข้อมูลไม่ครบ </a>");
        exit;
    }

    $Sql_Query = "select * from adminmanage where Username = '$txtUsername' and Password = '$txtPassword' ";
	
	$query = mysqli_query($conn, $Sql_Query);
	
	$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if (!$result){
            $message = "ชื่อผู้ใช้งาน หรือ รหัสผ่าน ไม่ถูกต้อง!";
            echo (
            "<script LANGUAGE='JavaScript'>
                window.alert('$message');
                window.location.href='./../login/login.html';
            </script>"
            );
        }else{

            if($result["Permission"] === 'allow'){
                header("location:../Homepage.php?UserName=$txtUsername");
            }else{
                $message = "คุณยังไม่ได้รับการอนุมัติการเข้าใช้จากเจ้าของระบบ";
                echo (
                    "<script LANGUAGE='JavaScript'>
                        window.alert('$message');
                        window.location.href='./../login/login.html';
                    </script>"
                );
            }

        }

    mysqli_close($conn);

?>