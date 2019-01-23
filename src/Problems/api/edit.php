<html>
<head>
	<title> Edit Data </title>
</head>
<body>
<?php
	include("../../Database/connect.php");
	
	$ID = null;
	if(isset($_GET["ProblemID"])){
		$ID = $_GET["ProblemID"];
	}
	
	$sql = "SELECT * FROM problemapp WHERE ProblemID = '".$ID."'";
	$query = mysqli_query($conn, $sql);
	
	$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>

<form name="edit" action="updated.php" method="post" enctype="multipart/form-data">
	<table width="600" border="1">
        <tr>
        	<th width="100"> ProblemName </th>
            <td width="100"><input type="text" name="pProblemName" value="<?php echo $result["ProblemName"]; ?>" style="width: 100%" /></td>
            <input type="hidden" name="ProblemID" value="<?php echo $result["ProblemID"]; ?>" />
        </tr>
        <tr>
        	<th width="100"> ProblemDatail </th>
            <td width="100">
                <textarea rows="4" cols="50" name="pProblemDatail"  style="width: 100%"><?php echo $result["ProblemDatail"]; ?></textarea>
            </td>
        </tr>
        <tr>
            <th width="100"> ProblemType </th>
            <td width="100"><input type="text" name="pProblemType" value="<?php echo $result["ProblemType"]; ?>" /></td>
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
            <th width="100"> ProblemIMG </th>
            <td width="100">
                <input type="file" name="pProblemIMG" id="pProblemIMG" value="<?php echo $result["ProblemIMG"]; ?>" />
            </td>
        </tr>
    </table><br>
    <input type="submit" name="submit" value="อัพเดท"  />
</form>
<form action="">
    <p>แจ้งความคืบหน้าของปัญหาให้กับผู้ใช้</p>
    <div style="width: 100%; display:inline-block; position:relative;">
        <textarea name="" id="txt" cols="20" rows="5" style="width: 100%; display:block;"></textarea>
        <button style="position:absolute; bottom:10px; right:10px;">ส่งความคีบหน้า</button>
    </div>
</form>
<?php
	mysqli_close($conn);
?>

<form name="Add" action="../Problems.php" method="post">
		<input type="submit" value="กลับ" />
	</form>

</body>
</html>