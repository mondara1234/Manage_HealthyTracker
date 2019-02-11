<?php
	include("../../Database/connect.php");
    $UserName = $_GET["UserName"];
	$AU_ID = $_POST["AU_ID"];
	$AU_UserName = $_POST["AU_UserName"];
	$AU_Title = $_POST["AU_Title"];
	$AU_Datile = $_POST["AU_Datile"];
    $AU_Date = $_POST["AU_Date"];

	$sql = "UPDATE alertuser SET 
			AU_UserName = '$AU_UserName',
			AU_Title = '$AU_Title',
			AU_Datile = '$AU_Datile',
			AU_Date = '$AU_Date'
			
			WHERE AU_ID = $AU_ID ";

	$query = mysqli_query($conn, $sql);

	if($query){
        $message = "อัพเดทสำเร็จ";
        echo (
        "<script LANGUAGE='JavaScript'>
            window.alert('$message');
            window.location.href='edit.php?UserName=$UserName';
        </script>"
        );
    }else{
        $message = "อัพเดทล้มเหลว";
        echo (
        "<script LANGUAGE='JavaScript'>
            window.alert('$message');
            window.location.href='edit.php?UserName=$UserName';
        </script>"
        );
    }
	mysqli_close($conn);
?>
