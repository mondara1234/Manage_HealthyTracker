<?php
	include("../../Database/connect.php");
    $UserName = $_GET["UserName"];
	$ProblemID = $_POST["ProblemID"];
	$pProblemName = $_POST["pProblemName"];
	$pProblemType = $_POST["pProblemType"];
	$pTrickDetail = $_POST["pTrickDetail"];
    $pPeopleAdd = $_POST["pPeopleAdd"];
    $pDateAdded = $_POST["pDateAdded"];
    $pProblemIMG = $_FILES["pProblemIMG"]["name"];
    $path = basename($pProblemIMG);
    $upload = move_uploaded_file($_FILES["pProblemIMG"]["tmp_name"], $path);

	$sql = "UPDATE trickmanage SET 
			TrickName = '$pTrickName',
			ProblemName = '$pProblemName',
			ProblemType = '$pProblemType',
			TrickDetail = '$pTrickDetail',
			ProblemIMG	 = '$pProblemIMG',
			PeopleAdd = '$pPeopleAdd',
			DateAdded = '$pDateAdded'
			
			WHERE ProblemID = $ProblemID ";

	$query = mysqli_query($conn, $sql);

	if($query){
        $message = "อัพเดทสำเร็จ";
        echo (
        "<script LANGUAGE='JavaScript'>
            window.alert('$message');
            window.location.href='edit.php?UserName=$UserName';
        </script>"
        );
    }else{
        $message = "อัพเดทล้มเหลว";
        echo (
        "<script LANGUAGE='JavaScript'>
            window.alert('$message');
            window.location.href='edit.php?UserName=$UserName';
        </script>"
        );
    }

	mysqli_close($conn);
?>
