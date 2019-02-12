<?php
include("../../Database/connect.php");
	$TrickName = $_POST["pTrickName"];
    $TrickDetail = $_POST["pTrickDetail"];
	$TrickLike = $_POST["pTrickLike"];
    $PeopleAdd = $_POST["pPeopleAdd"];
    $DateAdded = $_POST["pDateAdded"];
    $sourceURL = $_POST["psourceURL"];

    $image = $_FILES["pTrickIMG"]["name"];
    $imageData = base64_encode(file_get_contents($image));
    $pTrickIMG = 'data: '.mime_content_type($image).';base64,'.$imageData;

if(empty($TrickName) ||
    empty($TrickDetail) ||
    empty($TrickLike) ||
    empty($DateAdded) ||
    empty($sourceURL) ||
    empty($PeopleAdd)) {
    $message = "กรุณากรอกข้อมูลให้ครบ";
    echo (
    "<script LANGUAGE='JavaScript'>
        window.alert('$message');
    </script>"
    );
}elseif($_FILES["pTrickIMG"]["name"] == ''){
    $message = "กรุณาเลือกรูปภาพ";
    echo (
    "<script LANGUAGE='JavaScript'>
        window.alert('$message');
    </script>"
    );
}else{
    $Sql_Query = "select * from adminmanage where UserName = '$PeopleAdd'";

    $query = mysqli_query($conn, $Sql_Query);

    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if($result){
        $sql = "INSERT INTO trickmanage (TrickName, TrickIMG, TrickDetail, TrickLike, PeopleAdd, DateAdded, sourceURL) 
			VALUES ('$TrickName', '$pTrickIMG', '$TrickDetail', '$TrickLike', '$PeopleAdd', '$DateAdded', '$sourceURL')";

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
        $message = "ไม่มีชื่อผู้ดูแลระบบในระบบ";
        echo (
        "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
        );
        }
    }
	
	mysqli_close($conn);
?>