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
    empty($pDetailBMI) ||
    empty($pSumBMI) ||
    empty($pUnitBMI)) {
    $message = "กรุณากรอกข้อมูลให้ครบ";
    echo (
    "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
    );
}else{

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

	mysqli_close($conn);
?>
