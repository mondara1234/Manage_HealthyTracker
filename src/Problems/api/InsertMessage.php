<meta charset="utf-8">
<?php
include("../../Database/connect.php");
    $UserName = $_POST["AU_UserName"];
    $Datile = $_POST["AU_Datile"];
    $Date = $_POST["AU_Date"];
    $Title = $_POST["AU_Title"];
    $Status = 'false';

    $sql = "INSERT INTO alertuser (AU_UserName, AU_Datile, AU_Date, AU_Title, AU_Status) 
    VALUES ('$UserName', '$Datile', '$Date', '$Title', '$Status')";
    $query = mysqli_query($conn, $sql);

    if($query){
        $message = "แจ้งความคืบหน้าของปัญหาเสร็จสิ้น";
        echo "<script language=\"JavaScript\">";
        echo "alert('$message');";
        echo "</script>";
    }else {
        $message = "แจ้งความคืบหน้าของปัญหาล้มเหลว";
        echo "<script language=\"JavaScript\">";
        echo "alert('$message');";
        echo "</script>";
    }
	mysqli_close($conn);
?>