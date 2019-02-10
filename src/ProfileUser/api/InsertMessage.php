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
        $message = "แจ้งการแนะนำเส็ดสิ้น";
        echo "<script language=\"JavaScript\">";
        echo "alert('$message');";
        echo "</script>";
    }else {
        $message = "การแจ้งสถานะล้มเหลว";
        echo "<script language=\"JavaScript\">";
        echo "alert('$message');";
        echo "</script>";
    }
	mysqli_close($conn);
?>