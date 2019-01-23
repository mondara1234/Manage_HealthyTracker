<html>
<head>
	<title> Edit Data </title>
</head>
<body>
<?php
	include("../../Database/connect.php");
	
	$ID = null;
	if(isset($_GET["FoodID"])){
		$ID = $_GET["FoodID"];
	}
	
	$sql = "SELECT * FROM foodmanage WHERE FoodID = '".$ID."'";
	$query = mysqli_query($conn, $sql);
	
	$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>

<form name="edit" action="updated.php" method="post" enctype="multipart/form-data">
	<table width="600" border="1">
        <tr>
        	<th width="100"> FoodName </th>
            <td width="100"><input type="text" name="pFoodName" value="<?php echo $result["FoodName"]; ?>" /></td>
            <input type="hidden" name="FoodID" value="<?php echo $result["FoodID"]; ?>" />
        </tr>
        <tr>
            <th width="100"> FoodCalorie </th>
            <td width="100"><input type="text" name="pFoodCalorie" value="<?php echo $result["FoodCalorie"]; ?>" /></td>
        </tr>
        <tr>
            <th width="100"> FoodType </th>
            <td width="100"><input type="text" name="pFoodType" value="<?php echo $result["FoodType"]; ?>" /></td>
        </tr>
        <tr>
            <th width="100"> FoodUnit </th>
            <td width="100"><input type="text" name="pFoodUnit" value="<?php echo $result["FoodUnit"]; ?>" /></td>
        </tr>
        <tr>
            <th width="100"> FoodIMG </th>
            <td width="100">
                <input type="file" name="pFoodIMG" id="pFoodIMG" value="<?php echo $result["FoodIMG"]; ?>" />
            </td>
        </tr>
    </table>
    <input type="submit" name="submit" value="submit"  />
</form>

<?php
	mysqli_close($conn);
?>

<form name="Add" action="../ManageFood.php" method="post">
		<input type="submit" value="กลับ" />
	</form>

</body>
</html>