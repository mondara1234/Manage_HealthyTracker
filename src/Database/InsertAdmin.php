<?php
include("connect.php");
	$Username = $_POST["txtUsername"];
    $Email = $_POST["txtEmail"];
	$Password = $_POST["txtPassword"];
    $First_name = $_POST["txtFirst_name"];
    $Last_Name = $_POST["txtLast_Name"];
    $Address = $_POST["txtAddress"];
    $Telephone = $_POST["txtTelephone"];
    $DateRegis = $_POST["date"];
    $Status = 'admin';
    $Permission = 'pending';

    $old_img = 'https://pngimage.net/wp-content/uploads/2018/06/user-avatar-png-6.png';
    $ImgProfile;
    if ($_FILES["txtImgProfile"]["name"] !== ""){
        $image = $_FILES["txtImgProfile"]["name"];
        $imageData = base64_encode(file_get_contents($image));
        $ImgProfile = 'data: '.mime_content_type($image).';base64,'.$imageData;
    }else{
        $ImgProfile = $old_img;
    }

if(empty($Username) ||
    empty($Password) ||
    empty($Email) ||
    empty($First_name) ||
    empty($Last_Name) ||
    empty($Address) ||
    empty($Telephone)) {
    $message = "กรุณากรอกข้อมูลให้ครบ";
    echo (
    "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
    );
}elseif(strlen($Password) < 5){
    $message = "รหัสผ่านต้องมีอย่างน้อย 6 ตัว";
    echo (
    "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
    );
}else{
    $Sql_Query = "select * from adminmanage where UserName = '$Username'";

    $query = mysqli_query($conn, $Sql_Query);

    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if($result){
            $message = "ชื่อผู้ใช้นี้ถูกใช้ไปแล้ว";
            echo (
            "<script LANGUAGE='JavaScript'>
                    window.alert('$message');
                </script>"
            );
    }else {
            $sql = "INSERT INTO adminmanage (UserName, Email, Password, FirstName, LastName, Address, Telephone, Status, DateRegis, ImgProfile, Permission) 
			VALUES ('$Username', '$Email', '$Password', '$First_name', '$Last_Name','$Address', '$Telephone', '$Status', '$DateRegis', '$ImgProfile', '$Permission')";

            $query = mysqli_query($conn, $sql);

            if($query){
                $message = "ลงทะเบียนเสร็จสิ้นรอการอนุมัติจากเจ้าของระบบนะครับ";
                echo (
                "<script LANGUAGE='JavaScript'>
                    window.alert('$message');
                    window.location.href='../login/register.php';
                </script>"
                );
            }else{
                $message = "ลงทะเบียนล้มเหลว";
                echo (
                "<script LANGUAGE='JavaScript'>
                    window.alert('$message');
                    window.location.href='../login/register.php';
                </script>"
                );
            }
        }
    }
	
	mysqli_close($conn);
?>