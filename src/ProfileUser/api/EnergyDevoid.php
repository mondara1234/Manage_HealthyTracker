<?php
header('Content-Type: application/json');
include('../../Database/connect.php');

$UserName = null;
if(isset($_POST["UserName"]))
{
    $UserName = $_POST["UserName"];
}
$DateM = null;
if(isset($_POST["DateM"]))
{
    $DateM = $_POST["DateM"];
}
$DateS = null;
if(isset($_POST["DateS"]))
{
    $DateS = $_POST["DateS"];
}

$sqlING = "SELECT * FROM energy_users_per_day WHERE UserName = '$UserName' AND DateDiary>='$DateM' 
        AND DateDiary<='$DateS' order by DateDiary asc";
$queryING = mysqli_query($conn, $sqlING);

$dataStart = '';
$resultArray = array();
$resultIng = array();
while($resultING = mysqli_fetch_array($queryING, MYSQLI_ASSOC)) {
    array_push($resultArray, $resultING);
}

for ($i = 0; $i <= 6; $i++) {
    $dataStart = date( "Y-m-d", strtotime( "$DateM +$i day" ));
    $array_search_DateDiary = array_keys(array_combine(array_keys($resultArray), array_column($resultArray, 'DateDiary')),$dataStart);
    $array_search_Unit = array_keys(array_combine(array_keys($resultArray), array_column($resultArray, 'Unit')),'ขาด');
    if($array_search_DateDiary!=FALSE && $array_search_Unit !=FALSE ){
        $str = implode(',',$array_search_DateDiary);
        $result_Energy = $resultArray["$str"]["Energy"];
        $number_Energy = intval($result_Energy);

        array_push($resultIng, $number_Energy);
    } else {
        array_push($resultIng, 0);
    }
}

echo json_encode($resultIng);
mysqli_close($conn);
?>
