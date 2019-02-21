<?php
include("../../Database/connect.php");
	$TrickName = $_POST["pTrickName"];
    $TrickDetail = $_POST["pTrickDetail"];
	$TrickLike = $_POST["pTrickLike"];
    $PeopleAdd = $_POST["pPeopleAdd"];
    $DateAdded = $_POST["pDateAdded"];
    $sourceURL = $_POST["psourceURL"];

    $filename = $conn->real_escape_string($_FILES['pTrickIMG']['name']);
    $filedata= $conn->real_escape_string(base64_encode(file_get_contents($_FILES['pTrickIMG']['tmp_name'])));
    $filetype = $conn->real_escape_string($_FILES['pTrickIMG']['type']);
    $pTrickIMG = 'data:'.$filetype.';base64,'.$filedata;

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