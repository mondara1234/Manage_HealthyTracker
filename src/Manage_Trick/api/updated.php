
<?php
	include("../../Database/connect.php");
    $UserName =$_GET["UserName"];
	$TrickID = $_POST["TrickID"];
	$old_sourceURL = $_POST["sourceURL"];
    $pTrickName = $_POST["pTrickName"];
	$pTrickLike = $_POST["pTrickLike"];
	$pTrickDetail = $_POST["pTrickDetail"];
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

if(empty($pTrickName) ||
    empty($pTrickLike) ||
    empty($pTrickDetail) ||
    empty($pDateAdded) ||
    empty($psourceURL)) {
    $message = "กรุณากรอกข้อมูลให้ครบ";
    echo (
    "<script LANGUAGE='JavaScript'>
        window.alert('$message');
    </script>"
    );
}else {
    $Sql_Query = "select * from trickmanage where sourceURL = '$psourceURL'";

    $query = mysqli_query($conn, $Sql_Query);

    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if($result){
        if($result["sourceURL"] === $old_sourceURL){
            $sql = "UPDATE trickmanage SET 
                TrickName = '$pTrickName',
                TrickIMG = '$pTrickIMG',
                TrickDetail = '$pTrickDetail',
                TrickLike = '$pTrickLike',
                PeopleAdd = '$UserName',
                DateAdded = '$pDateAdded',
                sourceURL	 = '$psourceURL'
                
                WHERE TrickID = $TrickID ";

            $query = mysqli_query($conn, $sql);

            if ($query) {
                $message = "แก้ไขข้อมูลสำเร็จ";
                echo(
                "<script LANGUAGE='JavaScript'>
                window.alert('$message');
            </script>"
                );
            } else {
                $message = "แก้ไขข้อมูลล้มเหลว";
                echo(
                "<script LANGUAGE='JavaScript'>
                window.alert('$message');
            </script>"
                );
            }
        }else{
            $message = "มีURLนี้อยู่ในระบบแล้ว";
            echo (
            "<script LANGUAGE='JavaScript'>
                        window.alert('$message');
                    </script>"
            );
        }
    }else {
        $sql = "UPDATE trickmanage SET 
                TrickName = '$pTrickName',
                TrickIMG = '$pTrickIMG',
                TrickDetail = '$pTrickDetail',
                TrickLike = '$pTrickLike',
                PeopleAdd = '$pPeopleAdd',
                DateAdded = '$pDateAdded',
                sourceURL	 = '$psourceURL'
                
                WHERE TrickID = $TrickID ";

        $query = mysqli_query($conn, $sql);

        if ($query) {
            $message = "แก้ไขข้อมูลสำเร็จ";
            echo(
            "<script LANGUAGE='JavaScript'>
                window.alert('$message');
            </script>"
            );
        } else {
            $message = "แก้ไขข้อมูลล้มเหลว";
            echo(
            "<script LANGUAGE='JavaScript'>
                window.alert('$message');
            </script>"
            );
        }
    }
}
	mysqli_close($conn);
?>
