<?php
	include("../../Database/connect.php");
    $UserName = $_GET["UserName"];
	$ProblemID = $_POST["ProblemID"];
	$pProblemName = $_POST["pProblemName"];
	$pProblemType = $_POST["pProblemType"];
	$pTrickDetail = $_POST["pTrickDetail"];
    $pPeopleAdd = $_POST["pPeopleAdd"];
    $pDateAdded = $_POST["pDateAdded"];

    $old_img = $_POST["ProblemIMG"];
    $pProblemIMG;
    if ($_FILES["pProblemIMG"]["name"] !== ""){
        $image = $_FILES["pProblemIMG"]["name"];
        $imageData = base64_encode(file_get_contents($image));
        $pProblemIMG = 'data: '.mime_content_type($image).';base64,'.$imageData;
    }else{
        $pProblemIMG = $old_img;
    }

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
