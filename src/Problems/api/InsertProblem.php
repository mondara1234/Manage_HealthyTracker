<meta charset="utf-8">
<?php
include("../../Database/connect.php");
    $pProblemName = $_POST["pProblemName"];
    $pProblemType = $_POST["pProblemType"];
    $pProblemDatail = $_POST["pProblemDatail"];
    $pDateAdded = $_POST["pDateAdded"];
    $pStatus = $_POST["pStatus"];
    $pPeopleAdd = $_POST["pPeopleAdd"];

    $old_img = 'null';
    $pProblemIMG;
    if ($_FILES["pProblemIMG"]["name"] !== ""){
        $filename = $conn->real_escape_string($_FILES['pProblemIMG']['name']);
        $filedata= $conn->real_escape_string(base64_encode(file_get_contents($_FILES['pProblemIMG']['tmp_name'])));
        $filetype = $conn->real_escape_string($_FILES['pProblemIMG']['type']);
        $pProblemIMG = 'data:'.$filetype.';base64,'.$filedata;
    }else{
        $pProblemIMG = $old_img;
    }

    if(empty($pProblemName) ||
        empty($pProblemDatail)) {
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
    }elseif($pStatus === 'select' ) {
        $message = "กรุณาเลือกสถานะของปัญหา";
        echo(
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