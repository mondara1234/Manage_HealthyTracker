<html>
<head>
    <title>delete</title>
</head>
<body>
<?php
include('../../Database/connect.php');
$ID = null;
if(isset($_GET["TrickID"])){
    $ID = $_GET["TrickID"];
}
$sql = "DELETE FROM trickmanage WHERE TrickID = $ID";
$query = mysqli_query($conn, $sql);
if(mysqli_affected_rows($conn)){
    echo ("yes");
}else{
    echo ("not");
}
?>
<form action="../ManageTips.php" method="post">
    <input type="submit" value="ok" />
</form>
</body>
</html>