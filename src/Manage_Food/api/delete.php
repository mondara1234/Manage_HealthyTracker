<meta charset="utf-8">
<?php
include('../../Database/connect.php');
$UserName = $_GET["UserName"];
$ID = null;
if(isset($_GET["FoodID"])){
    $ID = $_GET["FoodID"];
}
$sql = "DELETE FROM foodmanage WHERE FoodID = $ID";
$query = mysqli_query($conn, $sql);
if(mysqli_affected_rows($conn)){
    $message = "ลบสำเร็จ";
    echo (
    "<script LANGUAGE='JavaScript'>
        window.alert('$message');
        window.location.href='../ManageFood.php?UserName=$UserName';
    </script>"
    );
}else{
    $message = "ลองใหม่อีกครั้ง";
    echo (
    "<script LANGUAGE='JavaScript'>
        window.alert('$message');
        window.location.href='../ManageFood.php?UserName=$UserName';
    </script>"
    );
}
?>