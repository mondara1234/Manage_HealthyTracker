<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--  ให้รองรับและ แสดงหน้าตา ใน IE=edge ได้โดยไม่ผิดเพี้ยน-->
    <!-- กำหนดขนาด initial-scale=1.0 = เพื่อไม่ให้  Safari Zoom -->
    <meta name="viewport" content="width=device-width, initial-scale=1">  <!--  device-width = “ขนาด” ของ device นั้นๆ-->
    <meta name="description" content="">  <!--  บอกรายละเอียดของเว็บเพจแบบคร่าวๆ-->
    <meta name="author" content=""> <!-- ผู้เขียนหน้านี้ -->
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/LogoHT.png">

    <!-- Custom CSS -->
    <link href="../../assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link href="../../assets/dist/css/icons/font-awesome/css/fontawesome-all.min.css" rel="stylesheet">
    <link href="../../assets/dist/css/style.min.css" rel="stylesheet">
    <link href="../../assets/dist/css/styleCommon.css" rel="stylesheet">
    <title> Edit Admin </title>
</head>
<body class="bg-container">
<?php
include("../../Database/connect.php");

$UserName = $_GET["UserName"];
$sqlmanage = "SELECT * FROM adminmanage WHERE UserName = '$UserName' ";
$querymanage = mysqli_query($conn, $sqlmanage);
$resultUser = mysqli_fetch_array($querymanage, MYSQLI_ASSOC);

$sqlProblemapp = "SELECT COUNT(*) as totalProblemapp FROM problemapp ";
$queryProblemapp = mysqli_query($conn, $sqlProblemapp);
$resultProblemapp = mysqli_fetch_array($queryProblemapp, MYSQLI_ASSOC);

$sqlAdminmanage = "SELECT COUNT(*) as totalAdminmanage FROM adminmanage WHERE Permission = 'pending' ";
$queryAdminmanage = mysqli_query($conn, $sqlAdminmanage);
$resultAdminmanage = mysqli_fetch_array($queryAdminmanage, MYSQLI_ASSOC);
?>
<!-- ============================================================== -->
<!-- ส่วนหัว - ใช้ style จาก pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <?php require_once '../../Component/HeaderEdit.php';?>
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- ส่วน Title-->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">การเพิ่มข้อมูล รายการอาหาร</h4>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- ส่วนของเนื้อหา  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <center>
                <form name="edit" action="InsertFood.php" method="post" enctype="multipart/form-data" target="iframe_target">
                    <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
                    <table width="70%" border="1" style="border: #068e81 double 5px;">
                        <tr>
                            <td width="20%" align="right" valign="top"><b style="margin-right: 2%;"> ชื่ออาหาร :</b></td>
                            <td width="80%"><input type="text" name="pFoodName" style="width: 100%" /></td>
                        </tr>
                        <tr>
                            <td width="20%" align="right" valign="top"><b style="margin-right: 2%;"> แคลอรี่ :</b></td>
                            <td width="80%"><input type="number" name="pFoodCalorie" style="width: 100%" /></td>
                        </tr>
                        <tr>
                            <td width="20%" align="right" valign="top"><b style="margin-right: 2%;"> ประเภท :</b></td>
                            <td width="80%">
                                <select name="pFoodType" id="pFoodType">
                                    <option value="select" selected>กรุณาเลือกประเภทอาหาร</option>
                                    <option value="อาหาร" >อาหาร</option>
                                    <option value="เครื่องดื่ม" >เครื่องดื่ม</option>
                                    <option value="ผลไม้" >ผลไม้</option>
                                    <option value="ขนม" >ขนม</option>
                                    <option value="ของหวาน" >ของหวาน</option>
                                    <option value="ธัญพืช" >ธัญพืช</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%" align="right" valign="top"><b style="margin-right: 2%;"> หน่วย :</b></td>
                            <td width="80%"><input type="text" name="pFoodUnit" style="width: 100%" /></td>
                        </tr>
                        <tr>
                            <td width="20%" align="right" valign="top"><b style="margin-right: 2%;"> รูปภาพอาหาร :</b></td>
                            <td width="80%">
                                <input type="file" name="pFoodIMG" id="pFoodIMG"/>
                            </td>
                        </tr>
                    </table>
                    <button type="submit" name="Submit" class="font-18"
                            style="width: 20%; height: 40px; color: white; background: #068e81; border-color: white; margin-top: 2%"
                    >
                        เพิ่มข้อมูล
                    </button>
                </form>
            </center>
            <?php
            mysqli_close($conn);
            ?>
        </div>
    </div>
    <?php require_once '../../Component/footer.php';?>
</div>
<!-- ============================================================== -->
<!-- Jquery ทั้งหมด  -->
<!-- ============================================================== -->
<!-- ต้องมี -->
<script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- ไม่ได้ใช้ที  ส่วนกำหนดค่า JavaScript ของ Core Bootstrap -->
<script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>

<!-- เมนูแถบด้านข้าง -->
<script src="../../assets/dist/js/sidebarmenu.js"></script>
<!-- เปิด-ปิด Menu sidebar -->
<script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<!-- กำหนดเอง Scripts -->
<script src="../../assets/dist/js/custom.min.js"></script>
</body>
</html>