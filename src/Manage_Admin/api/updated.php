<?php
	include("../../Database/connect.php");
    $old_UserName = $_POST["old_UserName"];
    $UserName = $_POST["pUserName"];
	$AdminID = $_POST["AdminID"];
	$pEmail = $_POST["pEmail"];
	$pPassword = $_POST["pPassword"];
    $pFirstName = $_POST["pFirstName"];
    $pLastName = $_POST["pLastName"];
    $pAddress = $_POST["pAddress"];
    $pTelephone = $_POST["pTelephone"];
    $pStatus = $_POST["pStatus"];
    $Permission = $_POST["Permission"];
    $pDateRegis = $_POST["pDateRegis"];

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
    empty($pPassword) ||
    empty($pEmail) ||
    empty($pFirstName) ||
    empty($pLastName) ||
    empty($pAddress) ||
    empty($pTelephone)) {
    $message = "กรุณากรอกข้อมูลให้ครบ";
    echo (
    "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
    );
}elseif(strlen($pPassword) < 5){
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
}elseif(strlen($pTelephone) > 10){
    $message = "เบอร์โทรศัพท์ต้องมีไม่เกิน 10 ตัว";
    echo (
    "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
    );
}else{
    $Sql_Query = "select * from adminmanage where UserName = '$UserName'";

    $query = mysqli_query($conn, $Sql_Query);

    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if($result){
        if($result["UserName"] === $old_UserName){
            $sql = "UPDATE adminmanage SET 
                        UserName = '$UserName',
                        Password = '$pPassword',
                        Email = '$pEmail',
                        FirstName = '$pFirstName',
                        LastName = '$pLastName',
                        Address = '$pAddress',
                        Telephone = '$pTelephone',
                        ImgProfile = '$pImgProfile'
                        WHERE ID = $AdminID ";

            $query = mysqli_query($conn, $sql);

            if($query){
                $message = "แก้ไขข้อมูลสำเร็จ";
                echo (
                "<script LANGUAGE='JavaScript'>
                        window.alert('$message');
                    </script>"
                );
            }else{
                $message = "แก้ไขข้อมูลล้มเหลว";
                echo (
                "<script LANGUAGE='JavaScript'>
                        window.alert('$message');
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
        $sql = "UPDATE adminmanage SET 
                    UserName = '$UserName',
                    Password = '$pPassword',
                    Email = '$pEmail',
                    FirstName = '$pFirstName',
                    LastName = '$pLastName',
                    Address = '$pAddress',
                    Telephone = '$pTelephone',
                    ImgProfile = '$pImgProfile'
                    WHERE ID = $AdminID ";

        $query = mysqli_query($conn, $sql);

        if($query){
            $message = "แก้ไขข้อมูลสำเร็จ";
            echo (
            "<script LANGUAGE='JavaScript'>
                    window.alert('$message');
                </script>"
            );
        }else{
            $message = "แก้ไขข้อมูลล้มเหลว";
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

