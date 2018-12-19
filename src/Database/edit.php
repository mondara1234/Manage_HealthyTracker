<html>
<head>
	<title> Edit Data </title>
</head>
<body>
<?php
	include("connect.php");
	
	$ID = null;
	if(isset($_GET["UserID"])){
		$ID = $_GET["UserID"];
	}
	
	$sql = "SELECT * FROM MemberManage WHERE UserID = '".$ID."'";
	$query = mysqli_query($conn, $sql);
	
	$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>

<form name="edit" action="updated.php" method="post" enctype="multipart/form-data">
	<table width="600" border="1">
        <tr>
        	<th width="100"> Username </th>
            <td width="100"><input type="text" name="pUsername" value="<?php echo $result["Username"]; ?>" /></td>
            <input type="hidden" name="UserID" value="<?php echo $result["UserID"]; ?>" />
        </tr>
        <tr>
        	<th width="100"> Password </th>
            <td width="100"><input type="text" name="pPassword" value="<?php echo $result["Password"]; ?>" /></td>
        </tr>
        <tr>
        	<th width="100"> Name </th>
            <td width="100"><input type="text" name="pName" value="<?php echo $result["Name"]; ?>" /></td>
        </tr>
        <tr>
        	<th width="100"> Status </th>
            <td width="100"><input type="text" name="pStatus" value="<?php echo $result["Status"]; ?>" /></td>
        </tr>
        <tr>
        	<th width="100"> ImgProfile </th>
            <td width="100">
                <input type="file" name="pImgProfile" id="pImgProfile" value="<?php echo $result["ImgProfile"]; ?>" />
            </td>
        </tr>
    </table>
    <input type="submit" name="submit" value="submit"  />
</form>

<?php
	mysqli_close($conn);
?>

<form name="Add" action="../ManageMembers.php" method="post">
		<input type="submit" value="Homepage" />
	</form>

</body>
</html>