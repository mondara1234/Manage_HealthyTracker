<?php
header('Content-Type: application/json');
include('../../Database/connect.php');

$date = null;
if(isset($_POST["data"]))
{
    $date = $_POST["data"];
}
$sqlAllSex = "SELECT COUNT(*) as totalAllSex FROM membermanage WHERE DateRegis LIKE '%".$date."%' ";
$queryAllSex= mysqli_query($conn, $sqlAllSex);
$resultAllSex = mysqli_fetch_array($queryAllSex, MYSQLI_ASSOC);

$sqlMaleSex = "SELECT COUNT(*) as totalMaleSex FROM membermanage WHERE Sex = 'male' AND DateRegis LIKE '%".$date."%' ";
$queryMaleSex = mysqli_query($conn, $sqlMaleSex);
$resultMaleSex = mysqli_fetch_array($queryMaleSex, MYSQLI_ASSOC);

$sqlFeMaleSex = "SELECT COUNT(*) as totalFeMaleSex FROM membermanage WHERE Sex = 'female' AND DateRegis LIKE '%".$date."%' ";
$queryFeMaleSex = mysqli_query($conn, $sqlFeMaleSex);
$resultFeMaleSex = mysqli_fetch_array($queryFeMaleSex, MYSQLI_ASSOC);

$resultArray = array();
array_push($resultArray,$resultAllSex['totalAllSex']);
array_push($resultArray,$resultMaleSex['totalMaleSex']);
array_push($resultArray,$resultFeMaleSex['totalFeMaleSex']);

echo json_encode($resultArray);
mysqli_close($conn);
?>
