<html>
<head>
	<title> Edit Data </title>
</head>
<body>
<?php
	include("../../Database/connect.php");
	
	$ID = null;
	if(isset($_GET["BMIID"])){
		$ID = $_GET["BMIID"];
	}
	
	$sql = "SELECT * FROM bmiuser WHERE BMIID = '".$ID."'";
	$query = mysqli_query($conn, $sql);
	
	$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>

<form name="edit" action="updated.php" method="post" enctype="multipart/form-data">
	<table width="600" border="1">
        <tr>
        	<th width="100"> NameBMI </th>
            <td width="100"><input type="text" name="pNameBMI" value="<?php echo $result["NameBMI"]; ?>" /></td>
            <input type="hidden" name="BMIID" value="<?php echo $result["BMIID"]; ?>" />
        </tr>
        <tr>
        	<th width="100"> DetailBMI </th>
            <td width="100">
                <textarea rows="4" cols="50" name="pDetailBMI" ><?php echo $result["DetailBMI"]; ?></textarea>
            </td>
        </tr>
        <tr>
            <th width="100"> SumBMI </th>
            <td width="100"><input type="text" name="pSumBMI" value="<?php echo $result["SumBMI"]; ?>" /></td>
        </tr>
        <tr>
            <th width="100"> BMIUser </th>
            <td width="100"><input type="text" name="pBMIUser" value="<?php echo $result["BMIUser"]; ?>" /></td>
        </tr>
        <tr>
            <th width="100"> UnitBMI </th>
            <td width="100"><input type="text" name="pUnitBMI" value="<?php echo $result["UnitBMI"]; ?>" /></td>
        </tr>
    </table>
    <input type="submit" name="submit" value="submit"  />
</form>

<?php
	mysqli_close($conn);
?>

<form name="Add" action="../ManageBMI.php" method="post">
		<input type="submit" value="กลับ" />
	</form>

</body>
</html>