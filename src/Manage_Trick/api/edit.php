<html>
<head>
	<title> Edit Data </title>
</head>
<body>
<?php
	include("../../Database/connect.php");
	
	$ID = null;
	if(isset($_GET["TrickID"])){
		$ID = $_GET["TrickID"];
	}
	
	$sql = "SELECT * FROM trickmanage WHERE TrickID = '".$ID."'";
	$query = mysqli_query($conn, $sql);
	
	$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>

<form name="edit" action="updated.php" method="post" enctype="multipart/form-data">
	<table width="600" border="1">
        <tr>
        	<th width="100"> TrickName </th>
            <td width="100"><input type="text" name="pTrickName" value="<?php echo $result["TrickName"]; ?>" style="width: 100%" /></td>
            <input type="hidden" name="TrickID" value="<?php echo $result["TrickID"]; ?>" />
        </tr>
        <tr>
        	<th width="100"> TrickDetail </th>
            <td width="100">
                <textarea rows="4" cols="50" name="pTrickDetail" ><?php echo $result["TrickDetail"]; ?></textarea>
            </td>
        </tr>
        <tr>
            <th width="100"> TrickLike </th>
            <td width="100"><input type="text" name="pTrickLike" value="<?php echo $result["TrickLike"]; ?>" /></td>
        </tr>
        <tr>
            <th width="100"> PeopleAdd </th>
            <td width="100"><input type="text" name="pPeopleAdd" value="<?php echo $result["PeopleAdd"]; ?>" /></td>
        </tr>
        <tr>
            <th width="100"> DateAdded </th>
            <td width="100">
                <input type="date" name="pDateAdded" value="<?php echo $result["DateAdded"]; ?>" min="2018-01-01" max="<?php echo $result["DateAdded"]; ?>" />
            </td>
        </tr>
        <tr>
            <th width="100"> sourceURL </th>
            <td width="100"><input type="text" name="psourceURL" value="<?php echo $result["sourceURL"]; ?>" /></td>
        </tr>
        <tr>
            <th width="100"> TrickIMG </th>
            <td width="100">
                <input type="file" name="pTrickIMG" id="pTrickIMG" value="<?php echo $result["TrickIMG"]; ?>" />
            </td>
        </tr>
    </table>
    <input type="submit" name="submit" value="submit"  />
</form>

<?php
	mysqli_close($conn);
?>

<form name="Add" action="../ManageTips.php" method="post">
		<input type="submit" value="กลับ" />
	</form>

</body>
</html>