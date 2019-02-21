<?php
include("../../Database/connect.php");
	$Username = $_POST["txtUsername"];
    $Email = $_POST["txtEmail"];
	$Password = $_POST["txtPassword"];
    $First_name = $_POST["txtFirst_name"];
    $Last_Name = $_POST["txtLast_Name"];
    $Address = $_POST["txtAddress"];
    $Telephone = $_POST["txtTelephone"];
    $DateRegis = $_POST["date"];
    $Status = 'admin';
    $Permission = $_POST["Permission"];

    $old_img = 'https://pngimage.net/wp-content/uploads/2018/06/user-avatar-png-6.png';
    $ImgProfile;
    if ($_FILES["pImgProfile"]["name"] !== ""){
        $filename = $conn->real_escape_string($_FILES['pImgProfile']['name']);
        $filedata= $conn->real_escape_string(base64_encode(file_get_contents($_FILES['pImgProfile']['tmp_name'])));
        $filetype = $conn->real_escape_string($_FILES['pImgProfile']['type']);
        $ImgProfile = 'data:'.$filetype.';base64,'.$filedata;

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
    $message = "รหัสผ่านต้องมีอย่างน้อย 6 ตัวขึ้นไป";
    echo (
    "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
    );
}elseif(strlen($Username) < 3){
    $message = "ชื่อผู้ใช้ต้องมีอย่างน้อย 4 ตัวขึ้นไป";
    echo (
    "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
    );
}elseif(strlen($pTelephone) > 10){
    $message = "เบอร์โทรศัพท์ต้องมีไม่เกิน 10 ตัว";
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