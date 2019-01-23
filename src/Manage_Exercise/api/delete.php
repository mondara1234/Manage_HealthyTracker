<html>
<head>
    <title>delete</title>
</head>
<body>
<?php
include('../../Database/connect.php');
$ID = null;
if(isset($_GET["ExerciseID"])){
    $ID = $_GET["ExerciseID"];
}
$sql = "DELETE FROM exercisemanage WHERE ExerciseID = $ID";
$query = mysqli_query($conn, $sql);
if(mysqli_affected_rows($conn)){
    echo ("yes");
}else{
    echo ("not");
}
?>
<form action="../../Manage_BMI/ManageBMI.php" method="post">
    <input type="submit" value="ok" />
</form>
</body>
</html>