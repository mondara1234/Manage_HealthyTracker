<meta charset="utf-8">
<?php
include("../../Database/connect.php");
$UserID = $_GET["UserID"];
$UserName = $_GET["UserName"];
$Responsible = '';

$sql = "UPDATE membermanage SET 
			Responsible = '$Responsible'
			
			WHERE UserID = '$UserID' ";
$query = mysqli_query($conn, $sql);

if($query){
    $message = "ยกเลิกการดูแลเสร็จสิ้น";
    echo (
    "<script LANGUAGE='JavaScript'>
            window.alert('$message');
            window.location.href='../Members_Responsible.php?UserName=$UserName';
        </script>"
    );
}else{
    $message = "ลองใหม่อีกครั้ง";
    echo (
    "<script LANGUAGE='JavaScript'>
            window.alert('$message');
            window.location.href='../Members_Responsible.php?UserName=$UserName';
        </script>"
    );
}
mysqli_close($conn);
?>
