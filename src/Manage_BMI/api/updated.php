<html>
<head>
	<title> Updated </title>
</head>
<body>

<?php
	include("../../Database/connect.php");

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
		echo("อัปเดทสำเร็จ");
	}else{
		echo("ลองใหม่อีกครั้ง");
	}

	mysqli_close($conn);
?>

<form name="Add" action="../ManageBMI.php" method="post">
	<input type="submit" value="Ok" />
</form>
</body>
</html>
