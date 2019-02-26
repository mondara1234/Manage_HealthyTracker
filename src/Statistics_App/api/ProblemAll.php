
<?php
header('Content-Type: application/json');
include('../../Database/connect.php');

$date = null;
if(isset($_POST["data"]))
{
    $date = $_POST["data"];
}
$sqlAll = "SELECT COUNT(*) as totalAll FROM problemapp WHERE DateAdded LIKE '%".$date."%' ";
$queryAll= mysqli_query($conn, $sqlAll);
$resultAllS = mysqli_fetch_array($queryAll, MYSQLI_ASSOC);

$sqlServer = "SELECT COUNT(*) as totalServer FROM problemapp WHERE ProblemType = 'เซิร์ฟเวอร์มีปัญหา' AND DateAdded LIKE '%".$date."%' ";
$queryServer = mysqli_query($conn, $sqlServer);
$resultServer = mysqli_fetch_array($queryServer, MYSQLI_ASSOC);

$sqlBug = "SELECT COUNT(*) as totalBug FROM problemapp WHERE ProblemType = 'พบข้อบกพร่อง' AND DateAdded LIKE '%".$date."%' ";
$queryBug = mysqli_query($conn, $sqlBug);
$resultBug = mysqli_fetch_array($queryBug, MYSQLI_ASSOC);

$sqlSystem = "SELECT COUNT(*) as totalSystem FROM problemapp WHERE ProblemType = 'ระบบไม่เสถียร' AND DateAdded LIKE '%".$date."%' ";
$querySystem = mysqli_query($conn, $sqlSystem);
$resultSystem = mysqli_fetch_array($querySystem, MYSQLI_ASSOC);

$sqlrRecommend = "SELECT COUNT(*) as totalRecommend FROM problemapp WHERE ProblemType = 'แนะนำ' AND DateAdded LIKE '%".$date."%' ";
$queryRecommend = mysqli_query($conn, $sqlrRecommend);
$resultRecommend = mysqli_fetch_array($queryRecommend, MYSQLI_ASSOC);

$sqlOther = "SELECT COUNT(*) as totalOther FROM problemapp WHERE ProblemType = 'อื่นๆ' AND DateAdded LIKE '%".$date."%' ";
$queryOther = mysqli_query($conn, $sqlOther);
$resultOther = mysqli_fetch_array($queryOther, MYSQLI_ASSOC);


$resultArray = array();
array_push($resultArray,$resultAllS['totalAll']);
array_push($resultArray,$resultServer['totalServer']);
array_push($resultArray,$resultBug['totalBug']);
array_push($resultArray,$resultSystem['totalSystem']);
array_push($resultArray,$resultRecommend['totalRecommend']);
array_push($resultArray,$resultOther['totalOther']);

echo json_encode($resultArray);
mysqli_close($conn);
?>
