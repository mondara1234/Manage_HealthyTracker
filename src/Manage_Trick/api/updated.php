
<?php
	include("../../Database/connect.php");
    $UserName = $_GET["UserName"];
	$TrickID = $_POST["TrickID"];
	$pTrickName = $_POST["pTrickName"];
	$pTrickLike = $_POST["pTrickLike"];
	$pTrickDetail = $_POST["pTrickDetail"];
    $pPeopleAdd = $_POST["pPeopleAdd"];
    $pDateAdded = $_POST["pDateAdded"];
    $psourceURL = $_POST["psourceURL"];
    $pTrickIMG = $_FILES["pTrickIMG"]["name"];
    $path = basename($pTrickIMG);
    $upload = move_uploaded_file($_FILES["pTrickIMG"]["tmp_name"], $path);

	$sql = "UPDATE trickmanage SET 
			TrickName = '$pTrickName',
			TrickIMG = '$pTrickIMG',
			TrickDetail = '$pTrickDetail',
			TrickLike = '$pTrickLike',
			UnitBMI	 = '$pUnitBMI',
			PeopleAdd = '$pPeopleAdd',
			DateAdded = '$pDateAdded',
			sourceURL	 = '$psourceURL'
			
			WHERE TrickID = $TrickID ";

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
