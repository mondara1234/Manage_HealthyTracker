<html>
<head>
    <title>delete</title>
</head>
<body>
<?php
include('../../Database/connect.php');
$ID = null;
if(isset($_GET["DiaryID"])){
    $ID = $_GET["DiaryID"];
}
$sql = "DELETE FROM fooddiary WHERE DiaryID = $ID";
$query = mysqli_query($conn, $sql);
if(mysqli_affected_rows($conn)){
    echo ("yes");
}else{
    echo ("not");
}
?>
<form action="../ManageDiary.php" method="post">
    <input type="submit" value="ok" />
</form>
</body>
</html>