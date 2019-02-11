<?php
include('../../Database/connect.php');
$UserName = $_GET["UserName"];
$ID = null;
if(isset($_GET["AU_ID"])){
    $ID = $_GET["AU_ID"];
}
$sql = "DELETE FROM alertuser WHERE AU_ID = $ID";
$query = mysqli_query($conn, $sql);
if(mysqli_affected_rows($conn)){
    $message = "ลบสำเร็จ";
    echo (
    "<script LANGUAGE='JavaScript'>
        window.alert('$message');
        window.location.href='../ManageRecommend.php?UserName=$UserName';
    </script>"
    );
}else{
    $message = "ลองใหม่อีกครั้ง";
    echo (
    "<script LANGUAGE='JavaScript'>
        window.alert('$message');
        window.location.href='../ManageRecommend.php?UserName=$UserName';
    </script>"
    );
}
?>