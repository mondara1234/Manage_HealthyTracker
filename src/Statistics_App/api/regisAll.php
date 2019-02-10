<?php
$sqlAllSex = "SELECT COUNT(*) as totalAllSex FROM membermanage";
$queryAllSex= mysqli_query($conn, $sqlAllSex);
$resultAllSex = mysqli_fetch_array($queryAllSex, MYSQLI_ASSOC);

?>