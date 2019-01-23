<html>
<head>
	<title> Edit Data </title>
</head>
<body>
<?php
	include("../../Database/connect.php");
	
	$ID = null;
	if(isset($_GET["ExerciseID"])){
		$ID = $_GET["ExerciseID"];
	}
	
	$sql = "SELECT * FROM exercisemanage WHERE ExerciseID = '".$ID."'";
	$query = mysqli_query($conn, $sql);
	
	$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>

<form name="edit" action="updated.php" method="post" enctype="multipart/form-data">
	<table width="600" border="1">
        <tr>
        	<th width="100"> UserName </th>
            <td width="100"><input type="text" name="pUserName" value="<?php echo $result["UserName"]; ?>" /></td>
            <input type="hidden" name="ExerciseID" value="<?php echo $result["ExerciseID"]; ?>" />
        </tr>
        <tr>
            <th width="100"> ExerciseName </th>
            <td width="100"><input type="text" name="pExerciseName" value="<?php echo $result["ExerciseName"]; ?>" style="width: 100%" /></td>
        </tr>
        <tr>
            <th width="100"> ExerciseDetail </th>
            <td width="100">
                <textarea rows="4" cols="50" name="pExerciseDetail" ><?php echo $result["ExerciseDetail"]; ?></textarea>
            </td>
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
            <th width="100"> ExerciseIMG </th>
            <td width="100">
                <input type="file" name="pExerciseIMG" id="pExerciseIMG" value="<?php echo $result["ExerciseIMG"]; ?>" />
            </td>
        </tr>
    </table>
    <input type="submit" name="submit" value="submit"  />
</form>

<?php
	mysqli_close($conn);
?>

<form name="Add" action="../../Manage_BMI/ManageBMI.php" method="post">
		<input type="submit" value="กลับ" />
	</form>

</body>
</html>