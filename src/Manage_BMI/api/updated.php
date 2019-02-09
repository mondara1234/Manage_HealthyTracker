<?php
	include("../../Database/connect.php");
    $UserName = $_GET["UserName"];
	$BMIID = $_POST["BMIID"];
	$pNameBMI = $_POST["pNameBMI"];
	$pDetailBMI = $_POST["pDetailBMI"];
	$pSumBMI = $_POST["pSumBMI"];
    $pBMIUser = $_POST["pBMIUser"];
    $pUnitBMI = $_POST["pUnitBMI"];

	$sql = "UPDATE bmiuser SET 
			NameBMI = '$pNameBMI',
			DetailBMI = '$pDetailBMI',
			SumBMI = '$pSumBMI',
			BMIUser = '$pBMIUser',
			UnitBMI	 = '$pUnitBMI'
			
			WHERE BMIID = $BMIID ";

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
