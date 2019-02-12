<?php
	include("../../Database/connect.php");
    $old_Username = $_POST["old_Username"];
	$UserID = $_POST["UserID"];
	$pEmail = $_POST["pEmail"];
	$pPassword = $_POST["pPassword"];
	$pUsername = $_POST["pUsername"];
    $pStatus = $_POST["pStatus"];
    $pLanguage = $_POST["pLanguage"];
    $pPersonalSelect = $_POST["pPersonalSelect"];
    $pPersonalCode = $_POST["pPersonalCode"];
    $pSex = $_POST["pSex"];
    $pAge = $_POST["pAge"];
    $pWeight = $_POST["pWeight"];
    $pHeight = $_POST["pHeight"];

    $old_img = $_POST["ImgProfile"];
    $pImgProfile;
    if ($_FILES["pImgProfile"]["name"] !== ""){
        $image = $_FILES["pImgProfile"]["name"];
        $imageData = base64_encode(file_get_contents($image));
        $pImgProfile = 'data: '.mime_content_type($image).';base64,'.$imageData;
    }else{
        $pImgProfile = $old_img;
    }

if(empty($UserName) ||
empty($Password) ||
empty($Email) ||
empty($FirstName) ||
empty($LastName) ||
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
}elseif(strlen($UserName) < 3){
    $message = "ชื่อผู้ใช้ต้องมีอย่างน้อย 4 ตัวขึ้นไป";
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
    if($result["UserName"] === $old_Username){
        $sql = "UPDATE MemberManage SET 
                Email = '$pEmail',
                Password = '$pPassword',
                UserName = '$pUsername',
                imgProfile = '$pImgProfile',
                Status = '$pStatus',
                Language = '$pLanguage',
                PersonalSelect = '$pPersonalSelect',
                PersonalCode = '$pPersonalCode',
                Sex = '$pSex',
                Age = '$pAge',
                Weight = '$pWeight',
                Height = '$pHeight'
                
                WHERE UserID = $UserID ";

        $query = mysqli_query($conn, $sql);

        if ($query) {
            $message = "แก่ไขข้อมูลสำเร็จ";
            echo(
            "<script LANGUAGE='JavaScript'>
                window.alert('$message');
                window.location.href='edit.php?UserName=$UserName';
            </script>"
            );
        } else {
            $message = "แก่ไขข้อมูลล้มเหลว";
            echo(
            "<script LANGUAGE='JavaScript'>
                window.alert('$message');
                window.location.href='edit.php?UserName=$UserName';
            </script>"
            );
        }
    }else{
        $message = "ชื่อผู้ใช้นี้ถูกใช้ไปแล้ว";
        echo (
        "<script LANGUAGE='JavaScript'>
                    window.alert('$message');
                </script>"
        );
    }
}else {
        $sql = "UPDATE MemberManage SET 
                Email = '$pEmail',
                Password = '$pPassword',
                Username = '$pUsername',
                imgProfile = '$pImgProfile',
                Status = '$pStatus',
                Language = '$pLanguage',
                PersonalSelect = '$pPersonalSelect',
                PersonalCode = '$pPersonalCode',
                Sex = '$pSex',
                Age = '$pAge',
                Weight = '$pWeight',
                Height = '$pHeight',
                BMRUser = '$pBMRUser'
                
                WHERE UserID = $UserID ";

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
}
	mysqli_close($conn);
?>
