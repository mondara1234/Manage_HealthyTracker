<html>
<head>
    <title>delete</title>
</head>
<body>
<?php
include('../../Database/connect.php');
$ID = null;
if(isset($_GET["ProblemID"])){
    $ID = $_GET["ProblemID"];
}
$sql = "DELETE FROM problemapp WHERE ProblemID = $ID";
$query = mysqli_query($conn, $sql);
if(mysqli_affected_rows($conn)){
    echo ("yes");
}else{
    echo ("not");
}
?>
<form action="../Problems.php" method="post">
    <input type="submit" value="ok" />
</form>
</body>
</html>