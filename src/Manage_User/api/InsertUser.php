<?php
include("../../Database/connect.php");
	$pUsername = $_POST["pUsername"];
    $pEmail = $_POST["pEmail"];
	$pPassword = $_POST["pPassword"];
    $pLanguage = $_POST["pLanguage"];
    $date = $_POST["date"];
    $PersonalSelect = "off";

    $old_img = 'https://pngimage.net/wp-content/uploads/2018/06/user-avatar-png-6.png';
    $ImgProfile;
    if ($_FILES["pImgProfile"]["name"] !== ""){
        $image = $_FILES["pImgProfile"]["name"];
        $imageData = base64_encode(file_get_contents($image));
        $ImgProfile = 'data: '.mime_content_type($image).';base64,'.$imageData;
    }else{
        $ImgProfile = $old_img;
    }

if(empty($pUsername) ||
    empty($pEmail) ||
    empty($pPassword)) {
    $message = "กรุณากรอกข้อมูลให้ครบ";
    echo (
    "<script LANGUAGE='JavaScript'>
        window.alert('$message');
    </script>"
    );
}elseif($pLanguage === 'select' ){
    $message = "กรุณาเลือกภาษาเริ่มต้นด้วยครับ";
    echo (
    "<script LANGUAGE='JavaScript'>
        window.alert('$message');
    </script>"
    );
}else{
    $Sql_Query = "select * from membermanage where UserName = '$pUsername'";

    $query = mysqli_query($conn, $Sql_Query);

    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if($result){

        $message = "มีชื่อผู้ใช้นี้ในระบบแล้ว";
        echo (
        "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
        );
    }else {
            $sql = "INSERT INTO membermanage (UserName, Email, Password, Language, DateRegis, PersonalSelect) 
                    VALUES ('$pUsername', '$pEmail', '$pPassword', '$pLanguage', '$date',$PersonalSelect)";

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