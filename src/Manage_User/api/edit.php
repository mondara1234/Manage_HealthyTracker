<html>
<head>
	<title> Edit Data </title>
</head>
<body>
<?php
	include("../../Database/connect.php");
	
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
        	<th width="100"> E-mail </th>
            <td width="100"><input type="text" name="pEmail" value="<?php echo $result["Email"]; ?>" /></td>
            <input type="hidden" name="UserID" value="<?php echo $result["UserID"]; ?>" />
        </tr>
        <tr>
        	<th width="100"> Password </th>
            <td width="100"><input type="text" name="pPassword" value="<?php echo $result["Password"]; ?>" /></td>
        </tr>
        <tr>
        	<th width="100"> Username </th>
            <td width="100"><input type="text" name="pUsername" value="<?php echo $result["UserName"]; ?>" /></td>
        </tr>
        <tr>
        	<th width="100"> Status </th>
            <td width="100"><input type="text" name="pStatus" value="<?php echo $result["Status"]; ?>" /></td>
        </tr>
        <tr>
            <th width="100"> Language </th>
            <td width="100"><input type="text" name="pLanguage" value="<?php echo $result["Language"]; ?>" /></td>
        </tr>
        <tr>
            <th width="100"> PersonalSelect </th>
            <td width="100"><input type="text" name="pPersonalSelect" value="<?php echo $result["PersonalSelect"]; ?>" /></td>
        </tr>
        <tr>
            <th width="100"> PersonalCode </th>
            <td width="100"><input type="text" name="pPersonalCode" value="<?php echo $result["PersonalCode"]; ?>" /></td>
        </tr>
        <tr>
            <th width="100"> Sex </th>
            <td width="100"><input type="text" name="pSex" value="<?php echo $result["Sex"]; ?>" /></td>
        </tr>
        <tr>
            <th width="100"> Age </th>
            <td width="100"><input type="text" name="pAge" value="<?php echo $result["Age"]; ?>" /></td>
        </tr>
        <tr>
            <th width="100"> Weight </th>
            <td width="100"><input type="text" name="pWeight" value="<?php echo $result["Weight"]; ?>" /></td>
        </tr>
        <tr>
            <th width="100"> Height </th>
            <td width="100"><input type="text" name="pHeight" value="<?php echo $result["Height"]; ?>" /></td>
        </tr>
        <tr>
            <th width="100"> BMRUser </th>
            <td width="100"><input type="text" name="pBMRUser" value="<?php echo $result["BMRUser"]; ?>" /></td>
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
		<input type="submit" value="กลับ" />
	</form>

</body>
</html>