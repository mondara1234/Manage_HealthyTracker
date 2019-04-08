<meta charset="utf-8">
<?php
	include("../../Database/connect.php");
	$BMIID = $_POST["BMIID"];
	$pNameBMI = $_POST["pNameBMI"];
	$pDetailBMI = $_POST["pDetailBMI"];
	$pSumBMI = $_POST["pSumBMI"];
    $pBMIUser = $_POST["pBMIUser"];
    $pUnitBMI = $_POST["pUnitBMI"];

if(empty($pNameBMI) ||
    empty($pDetailBMI)) {
    $message = "กรุณากรอกข้อมูลให้ครบ";
    echo (
    "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
    );
}else{
$Sql_Query = "select * from bmiuser where NameBMI = '$pNameBMI'";

$query = mysqli_query($conn, $Sql_Query);

$result = mysqli_fetch_array($query, MYSQLI_ASSOC);

if($result){
    $message = "มีหัวข้อนี้แล้วครับ";
    echo (
    "<script LANGUAGE='JavaScript'>
                    window.alert('$message');
                </script>"
    );
}else {
    $sql = "UPDATE bmiuser SET 
			NameBMI = '$pNameBMI',
			DetailBMI = '$pDetailBMI',
			SumBMI = '$pSumBMI',
			BMIUser = '$pBMIUser',
			UnitBMI	 = '$pUnitBMI'
			
			WHERE BMIID = $BMIID ";

    $query = mysqli_query($conn, $sql);

    if($query){
        $message = "แก้ไขข้อมูลสำเร็จ";
        echo (
        "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
        );
    }else{
        $message = "แก้ไขข้อมูลล้มเหลว";
        echo (
        "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
        );
    }
}
}

	mysqli_close($conn);
?>
