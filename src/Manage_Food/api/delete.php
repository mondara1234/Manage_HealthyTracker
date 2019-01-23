<html>
<head>
    <title>delete</title>
</head>
<body>
<?php
include('../../Database/connect.php');
$ID = null;
if(isset($_GET["FoodID"])){
    $ID = $_GET["FoodID"];
}
$sql = "DELETE FROM foodmanage WHERE FoodID = $ID";
$query = mysqli_query($conn, $sql);
if(mysqli_affected_rows($conn)){
    echo ("yes");
}else{
    echo ("not");
}
?>
<form action="../ManageFood.php" method="post">
    <input type="submit" value="ok" />
</form>
</body>
</html>