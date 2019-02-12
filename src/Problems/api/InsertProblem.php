<?php
include("../../Database/connect.php");
    $pProblemName = $_POST["pProblemName"];
    $pProblemType = $_POST["pProblemType"];
    $pProblemDatail = $_POST["pProblemDatail"];
    $pDateAdded = $_POST["pDateAdded"];
    $pStatus = $_POST["pStatus"];

    $old_img = 'null';
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
        empty($pStatus) ||
        empty($pPeopleAdd)) {
        $message = "กรุณากรอกข้อมูลให้ครบ";
        echo (
        "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
        );
    }elseif($pProblemType === 'select' ){
        $message = "กรุณาเลือกประเภทของปัญหา";
        echo (
        "<script LANGUAGE='JavaScript'>
            window.alert('$message');
        </script>"
        );
    }else{
        $Sql_Query = "select * from adminmanage where UserName = '$pPeopleAdd'";

        $query = mysqli_query($conn, $Sql_Query);

        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

        if($result){
            $sql = "INSERT INTO problemapp (ProblemName, ProblemType, ProblemDatail, ProblemIMG, PeopleAdd, DateAdded, Status) 
                VALUES ('$pProblemName', '$pProblemType', '$pProblemDatail', '$pProblemIMG', '$pPeopleAdd', '$pDateAdded', '$pStatus')";

            $query = mysqli_query($conn, $sql);

            if($query){
                $message = "เพิ่มข้อมูลเสร็จสิ้น";
                echo (
                "<script LANGUAGE='JavaScript'>
                window.alert('$message');
            </script>"
                );
            }else{
                $message = "เพิ่มข้อมูลล้มเหลว";
                echo (
                "<script LANGUAGE='JavaScript'>
                window.alert('$message');
            </script>"
                );
            }
        }else{
            $message = "ไม่มีชื่อผู้ดูแลระบบในระบบ";
            echo (
            "<script LANGUAGE='JavaScript'>
                window.alert('$message');
            </script>"
            );
        }
    }
	
	mysqli_close($conn);
?>