<?php
	include("../../Database/connect.php");
    $UserNames = $_GET["UserName"];
    $UserName = $_POST["UserNameAD"];
	$UserID = $_POST["UserID"];
	$Password = $_POST["Password"];
    $Email = $_POST["Email"];
    $FirstName = $_POST["FirstName"];
    $LastName = $_POST["LastName"];
    $Address = $_POST["Address"];
    $Telephone = $_POST["Telephone"];

    $old_img = $_POST["ImgProfile"];
    $ImgProfile;
    if ($_FILES["pImgProfile"]["name"] !== ""){
        $image = $_FILES["pImgProfile"]["name"];
        $imageData = base64_encode(file_get_contents($image));
        $ImgProfile = 'data: '.mime_content_type($image).';base64,'.$imageData;
    }else{
        $ImgProfile = $old_img;
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
    }else{
        $Sql_Query = "select * from adminmanage where UserName = '$UserName'";

        $query = mysqli_query($conn, $Sql_Query);

        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

        if($result){
            if($result["UserName"] === $UserNames){
                $sql = "UPDATE adminmanage SET 
                        UserName = '$UserName',
                        Password = '$Password',
                        Email = '$Email',
                        FirstName = '$FirstName',
                        LastName = '$LastName',
                        Address = '$Address',
                        Telephone = '$Telephone',
                        ImgProfile = '$ImgProfile'
                        WHERE ID = $UserID ";

                $query = mysqli_query($conn, $sql);

                if($query){
                    $message = "แก่ไขข้อมูลสำเร็จ";
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
                    Password = '$Password',
                    Email = '$Email',
                    FirstName = '$FirstName',
                    LastName = '$LastName',
                    Address = '$Address',
                    Telephone = '$Telephone',
                    ImgProfile = '$ImgProfile'
                    WHERE ID = $UserID ";

            $query = mysqli_query($conn, $sql);

            if($query){
                $message = "แก่ไขข้อมูลสำเร็จ";
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
