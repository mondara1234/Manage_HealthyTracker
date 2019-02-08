<html>
<head>
    <title>delete</title>
</head>
<body>
<?php
include('../../Database/connect.php');
$ID = null;
if(isset($_GET["AdminID"])){
    $ID = $_GET["AdminID"];
}
$sql = "DELETE FROM adminmanage WHERE ID = $ID";
$query = mysqli_query($conn, $sql);
if(mysqli_affected_rows($conn)){
    echo ("yes");
}else{
    echo ("not");
}
?>
<form action="../../Manage_Admin/ManageAdmin.php" method="post">
    <input type="submit" value="ok" />
</form>
</body>
</html>