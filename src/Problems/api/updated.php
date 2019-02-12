<?php
	include("../../Database/connect.php");
	$UserName =$_GET["UserName"];
	$ProblemID = $_POST["ProblemID"];
	$pProblemName = $_POST["pProblemName"];
	$pProblemType = $_POST["pProblemType"];
	$pProblemDatail = $_POST["pProblemDatail"];
    $pDateAdded = $_POST["pDateAdded"];
    $pStatus = $_POST["pStatus"];

    $old_img = $_POST["ProblemIMG"];
    $pProblemIMG;
    if ($_FILES["pProblemIMG"]["name"] !== ""){
        $image = $_FILES["pProblemIMG"]["name"];
        $imageData = base64_encode(file_get_contents($image));
        $pProblemIMG = 'data: '.mime_content_type($image).';base64,'.$imageData;
    }else{
        $pProblemIMG = $old_img;
    }

    if(empty($pProblemName) ||
    empty($pProblemDatail) ||
    empty($pDateAdded) ||
    empty($pStatus)) {
        $message = "กรุณากรอกข้อมูลให้ครบ";
        echo (
        "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
        );
    }else {
        $sql = "UPDATE problemapp SET 
                ProblemName = '$pProblemName',
                ProblemType = '$pProblemType',
                ProblemDatail = '$pProblemDatail',
                ProblemIMG = '$pProblemIMG',
                DateAdded = '$pDateAdded',
                PeopleAdd = '$UserName',
                Status = '$pStatus'
                
                WHERE ProblemID = $ProblemID ";

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
	mysqli_close($conn);
?>
