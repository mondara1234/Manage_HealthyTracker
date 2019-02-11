
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

    $old_img = $_POST["TrickIMG"];
    $pTrickIMG;
    if ($_FILES["pTrickIMG"]["name"] !== ""){
        $image = $_FILES["pTrickIMG"]["name"];
        $imageData = base64_encode(file_get_contents($image));
        $pTrickIMG = 'data: '.mime_content_type($image).';base64,'.$imageData;
    }else{
        $pTrickIMG = $old_img;
    }

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
