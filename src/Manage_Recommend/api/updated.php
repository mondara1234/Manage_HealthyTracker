<meta charset="utf-8">
<?php
	include("../../Database/connect.php");
	$AU_ID = $_POST["AU_ID"];
	$AU_Title = $_POST["AU_Title"];
	$AU_Datile = $_POST["AU_Datile"];
    $AU_Date = $_POST["AU_Date"];

if(empty($AU_Title) ||
empty($AU_Datile) ||
empty($AU_Date)) {
    $message = "กรุณากรอกข้อมูลให้ครบ";
    echo (
    "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
    );
}else {
    $sql = "UPDATE alertuser SET 
			AU_Title = '$AU_Title',
			AU_Datile = '$AU_Datile',
			AU_Date = '$AU_Date'
			
			WHERE AU_ID = $AU_ID ";

    $query = mysqli_query($conn, $sql);

    if ($query) {
        $message = "แก้ไขข้อมูลสำเร็จ";
        echo(
        "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
        );
    } else {
        $message = "แก้ไขข้อมูลล้มเหลว";
        echo(
        "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
        );
    }
}
	mysqli_close($conn);
?>
