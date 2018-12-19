<html>
<head>
    <title>delete</title>
</head>
<body>
<?php
include('connect.php');
$ID = null;
if(isset($_GET["UserID"])){
    $ID = $_GET["UserID"];
}
$sql = "DELETE FROM MemberManage WHERE UserID = $ID";
$query = mysqli_query($conn, $sql);
if(mysqli_affected_rows($conn)){
    echo ("yes");
}else{
    echo ("not");
}
?>
<form action="../ManageMembers.php" method="post">
    <input type="submit" value="ok" />
</form>
</body>
</html>