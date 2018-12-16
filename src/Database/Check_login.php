<?php
    include('../php/connect.php');

    $txtUsername = $_POST["txtUsername"];
    $txtPassword = $_POST["txtPassword"];

    if(empty($txtUsername) || empty($txtPassword)){
        echo ("<a href='./../login.html'> กรอกข้อมูลไม่ครบ </a>");
        exit;
    }

    $Sql_Query = "select * from MemberManage where Username = '$txtUsername' and Password = '$txtPassword' ";
	
	$query = mysqli_query($conn, $Sql_Query);
	
	$result = mysqli_fetch_array($query, MYSQLI_ASSOC);

        if($result["Status"] === 'Admin'){
            header("location:./../Homepage.php?txtUsername=$txtUsername");
        }else{
            header("location:./../Homepage.php?txtUsername=$txtUsername");
        }
		
    mysqli_close($conn);

?>