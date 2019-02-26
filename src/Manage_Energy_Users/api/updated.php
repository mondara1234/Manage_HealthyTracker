<meta charset="utf-8">
<?php
	include("../../Database/connect.php");
    $ID = $_POST["ID"];
	$pUserName = $_POST["UserName"];
	$pEnergy = $_POST["Energy"];
	$pUnit = $_POST["Unit"];
    $pDateDiary = $_POST["DateDiary"];

if(empty($pUserName) ||
    empty($pEnergy) ||
    empty($pDateDiary)) {
    $message = "กรุณากรอกข้อมูลให้ครบ";
    echo (
    "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
    );
}else {
    $sql = "UPDATE energy_users_per_day SET 
			UserName = '$pUserName',
			Energy = '$pEnergy',
			Unit = '$pUnit',
			DateDiary = '$pDateDiary'
			
			WHERE ID = $ID ";

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