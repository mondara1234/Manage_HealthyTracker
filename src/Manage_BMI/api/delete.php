<html>
<head>
    <title>delete</title>
</head>
<body>
<?php
include('../../Database/connect.php');
$ID = null;
if(isset($_GET["BMIID"])){
    $ID = $_GET["BMIID"];
}
$sql = "DELETE FROM bmiuser WHERE BMIID = $ID";
$query = mysqli_query($conn, $sql);
if(mysqli_affected_rows($conn)){
    echo ("yes");
}else{
    echo ("not");
}
?>
<form action="../ManageBMI.php" method="post">
    <input type="submit" value="ok" />
</form>
</body>
</html>