<?php
    include('connect.php');

    $txtUsername = $_POST["txtUsername"];
    $txtPassword = $_POST["txtPassword"];

    if(empty($txtUsername) || empty($txtPassword)){
        echo ("<a href='./../login/login.html'> กรอกข้อมูลไม่ครบ </a>");
        exit;
    }

    $Sql_Query = "select * from membermanage where Username = '$txtUsername' and Password = '$txtPassword' ";
	
	$query = mysqli_query($conn, $Sql_Query);
	
	$result = mysqli_fetch_array($query, MYSQLI_ASSOC);

        if($result["Status"] === 'Admin'){
            header("location:../Homepage.php?txtUsername=$txtUsername");
        }else{
            echo "ขออภัย รหัสไม่ถูกต้อง หรือ คุณยังไม่ได้เป็นAdmin";
            echo ("<a href='./../login/login.html'> กลับหน้า login </a>");
        }
		
    mysqli_close($conn);

?>