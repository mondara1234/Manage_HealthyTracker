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
    <link href="../../assets/dist/css/matrix-style.css" rel="stylesheet">
    <link href="../../assets/dist/css/style.min.css" rel="stylesheet">
    <link href="../../assets/dist/css/styleCommon.css" rel="stylesheet">
    <title> Edit Problems </title>
</head>
<body class="bg-container">
    <?php
        include("../../Database/connect.php");

        $ID = null;
        if(isset($_GET["ProblemID"])){
            $ID = $_GET["ProblemID"];
        }

        $sql = "SELECT * FROM problemapp WHERE ProblemID = '".$ID."'";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

        $UserName = $_GET["UserName"];
        $sqlmanage = "SELECT * FROM adminmanage WHERE UserName = '$UserName' ";
        $querymanage = mysqli_query($conn, $sqlmanage);
        $resultUser = mysqli_fetch_array($querymanage, MYSQLI_ASSOC);

        $sqlProblemapp = "SELECT COUNT(*) as totalProblemapp FROM problemapp WHERE Status = '' ";
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
                        <h4 class="page-title">การแก้ไขข้อมูล ผู้ดูแลระบบ</h4>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- ส่วนของเนื้อหา  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <center>
                    <form name="edit" action="updated.php?UserName=<?php echo($_GET["UserName"]); ?>" method="post" enctype="multipart/form-data">
                        <table width="70%" border="1" style="border: #068e81 double 5px;">
                            <tr>
                                <td width="20%" align="right" valign="top"><b style="margin-right: 2%;"> ProblemName :</b></td>
                                <td width="80%"><input type="text" name="pProblemName" value="<?php echo $result["ProblemName"]; ?>" style="width: 100%" /></td>
                                <input type="hidden" name="ProblemID" value="<?php echo $result["ProblemID"]; ?>" />
                            </tr>
                            <tr>
                                <td width="20%" align="right" valign="top"><b style="margin-right: 2%;"> ProblemDatail :</b></td>
                                <td width="80%">
                                    <textarea rows="4" style="width: 100%" name="pProblemDatail"  style="width: 100%"><?php echo $result["ProblemDatail"]; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" align="right" valign="top"><b style="margin-right: 2%;"> ProblemType :</b></td>
                                <td width="80%"><input type="text" name="pProblemType" value="<?php echo $result["ProblemType"]; ?>" style="width: 100%" /></td>
                            </tr>
                            <tr>
                                <td width="20%" align="right" valign="top"><b style="margin-right: 2%;"> PeopleAdd :</b></td>
                                <td width="80%"><input type="text" name="pPeopleAdd" value="<?php echo $result["PeopleAdd"]; ?>" style="width: 100%" /></td>
                            </tr>
                            <tr>
                                <td width="20%" align="right" valign="top"><b style="margin-right: 2%;"> DateAdded :</b></td>
                                <td width="80%">
                                    <input type="date" name="pDateAdded" value="<?php echo $result["DateAdded"]; ?>" min="2018-01-01" max="<?php echo $result["DateAdded"]; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" align="right" valign="top"><b style="margin-right: 2%;"> ProblemIMG :</b></td>
                                <td width="80%">
                                    <input type="file" name="pProblemIMG" id="pProblemIMG" value="<?php echo $result["ProblemIMG"]; ?>" />
                                </td>
                            </tr>
                        </table>
                        <button type="submit" name="Submit" class="font-18"
                                style="width: 20%; height: 40px; color: white; background: #068e81; border-color: white; margin-top: 2%"
                        >
                            ยืนยันการแก้ไข
                        </button>
                    </form>
                </center>
                <form action="">
                    <p class="font-20 m-t-5">แจ้งความคืบหน้าของปัญหาให้กับผู้ใช้</p>
                    <div style="width: 100%; display:inline-block; position:relative;">
                        <textarea name="" id="txt" cols="20" rows="5" style="width: 100%; display:block;"></textarea>
                        <button class="font-12" style="position:absolute; bottom:10px; right:10px; color: white; background: #068e81; height: 30px ">ส่งความคีบหน้า</button>
                    </div>
                </form>
                <?php
                    mysqli_close($conn);
                ?>
            </div>
            <footer class="footer text-center">
                <div class="text-dark"> สงวนลิขสิทธิ์โดย  HealthyTracker-Admin.</div>
                <div class="text-dark">  เพื่อให้ควบคุมการทำงานภายในแอฟพลิเคชันของคุณได้อย่างสะดวกรวดเร็ว จากทีมงานคุณภาพ ดาวน์โหลด Application ได้ที่ <a href="#" class="text-active">HrackerTracker</a> </div>
            </footer>
        </div>
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