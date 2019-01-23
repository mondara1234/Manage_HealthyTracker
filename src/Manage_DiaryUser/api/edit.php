<html>
<head>
	<title> Edit Data </title>
</head>
<body>
<?php
	include("../../Database/connect.php");
	
	$ID = null;
	if(isset($_GET["DiaryID"])){
		$ID = $_GET["DiaryID"];
	}
	
	$sql = "SELECT * FROM fooddiary WHERE DiaryID = '".$ID."'";
	$query = mysqli_query($conn, $sql);
	
	$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>

<form name="edit" action="updated.php" method="post" enctype="multipart/form-data">
	<table width="600" border="1">
        <tr>
        	<th width="100"> UserName </th>
            <td width="100"><input type="text" name="pUserName" value="<?php echo $result["UserName"]; ?>" /></td>
            <input type="hidden" name="DiaryID" value="<?php echo $result["DiaryID"]; ?>" />
        </tr>
        <tr>
        	<th width="100"> FoodName </th>
            <td width="100"><input type="text" name="pFoodName" value="<?php echo $result["FoodName"]; ?>" /></td>
        </tr>
        <tr>
            <th width="100"> FoodNumber </th>
            <td width="100"><input type="text" name="pFoodNumber" value="<?php echo $result["FoodNumber"]; ?>" /></td>
        </tr>
        <tr>
            <th width="100"> FoodUnit </th>
            <td width="100"><input type="text" name="pFoodUnit" value="<?php echo $result["FoodUnit"]; ?>" /></td>
        </tr>
        <tr>
            <th width="100"> FoodCalorie </th>
            <td width="100"><input type="text" name="pFoodCalorie" value="<?php echo $result["FoodCalorie"]; ?>" /></td>
        </tr>
        <tr>
            <th width="100"> DiaryDate </th>
            <td width="100">
                <input type="date" name="pDiaryDate" value="<?php echo $result["DiaryDate"]; ?>" min="2018-01-01" max="<?php echo $result["DiaryDate"]; ?>" />
            </td>
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

<form name="Add" action="../ManageDiary.php" method="post">
		<input type="submit" value="กลับ" />
	</form>

</body>
</html>