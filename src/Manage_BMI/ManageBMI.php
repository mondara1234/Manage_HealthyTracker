<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--  ให้รองรับและ แสดงหน้าตา ใน IE=edge ได้โดยไม่ผิดเพี้ยน-->
    <!-- กำหนดขนาด initial-scale=1.0 = เพื่อไม่ให้  Safari Zoom -->
    <meta name="viewport" content="width=device-width, initial-scale=1">  <!--  device-width = “ขนาด” ของ device นั้นๆ-->
    <meta name="description" content="">  <!--  บอกรายละเอียดของเว็บเพจแบบคร่าวๆ-->
    <meta name="author" content=""> <!-- ผู้เขียนหน้านี้ -->
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/LogoHT.png">
    <title>Admin - Healthy Tracker</title>

    <!-- Custom CSS -->
    <link href="../assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link href="../assets/dist/css/icons/font-awesome/css/fontawesome-all.min.css" rel="stylesheet">
    <link href="../assets/dist/css/matrix-style.css" rel="stylesheet">
    <link href="../assets/dist/css/style.min.css" rel="stylesheet">
    <link href="../assets/dist/css/styleCommon.css" rel="stylesheet">

</head>

<body class="bg-container">
    <?php
        $Search = null;
        if(isset($_POST["txtSearch"]))
        {
            $Search = $_POST["txtSearch"];
        }

        include('../Database/connect.php');

        $sql = "SELECT * FROM bmiuser WHERE BMIUser LIKE '%".$Search."%' ";
        $query = mysqli_query($conn, $sql);

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
        <?php require_once '../Component/Header.php';?>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- ส่วน Title-->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">ฐานข้อมูล BMI</h4>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- ส่วนของเนื้อหา  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="text-danger font-20"> *** เกณฑ์  ผอม = 1,  ปกติ = 2, ท้อม = 3, อ้วน = 4, อ้วนมาก = 5 </div>
                <center>
                    <form name="search" method="post">
                        <table width="80%" border="0">
                            <tr>
                                <th> <div align="center" class="font-16"> เกณฑ์ :
                                        <input name="txtSearch" type="text" id="txtSearch" value="<?php echo($Search); ?>" />
                                        <input type="submit" value="Search" />
                                    </div>
                                </th>
                            </tr>
                        </table>
                    </form>
                </center>
                <table width="100%" border="1" style="margin-top: 20px; border: black;" class="font-14" >
                    <tr bgcolor="#068e81" style="color: white; height: 40px;">
                        <th>
                            <div align="center"> BMIID </div>
                        </th>
                        <th>
                            <div align="center"> NameBMI </div>
                        </th>
                        <th>
                            <div align="center"> DetailBMI </div>
                        </th>
                        <th>
                            <div align="center"> SumBMI </div>
                        </th>
                        <th>
                            <div align="center"> BMIUser </div>
                        </th>
                        <th>
                            <div align="center"> UnitBMI </div>
                        </th>
                        <th>
                            <div align="center" style="padding-left: 5px; padding-right: 5px"> Edit </div>
                        </th>
                        <th>
                            <div align="center" style="padding-left: 5px; padding-right: 5px"> Delete </div>
                        </th>
                    </tr>

                    <?php
                    while($result = mysqli_fetch_array($query, MYSQLI_ASSOC))
                    {
                        ?>
                        <tr>
                            <td align="center"><?php echo ($result["BMIID"]) ?>
                            <td align="center"><?php echo ($result["NameBMI"]) ?></td>
                            <td align="center"><textarea rows="4" cols="50" style="margin-top: 2%" ><?php echo ($result["DetailBMI"]) ?></textarea></td>
                            <td align="center"><?php echo ($result["SumBMI"]) ?></td>
                            <td align="center"><?php echo ($result["BMIUser"]) ?></td>
                            <td align="center"><?php echo ($result["UnitBMI"]) ?></td>
                            <td align="center">
                                <a href="api/edit.php?BMIID=<?php echo ($result["BMIID"]);?>&UserName=<?php echo($_GET["UserName"]); ?>"> Edit </a>
                            </td>
                            <td align="center">
                                <a href="JavaScript:if(confirm('Confirm Delete?')==true)
                {window.location='api/delete.php?BMIID=<?php echo ($result["BMIID"]);?>&UserName=<?php echo($_GET["UserName"]); ?>';}"> Delete </a>
                            </td>
                        </tr>

                        <?php
                    }
                    ?>
                </table>

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
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ไม่ได้ใช้ที  ส่วนกำหนดค่า JavaScript ของ Core Bootstrap -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <!-- เมนูแถบด้านข้าง -->
    <script src="../assets/dist/js/sidebarmenu.js"></script>
    <!-- เปิด-ปิด Menu sidebar -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <!-- กำหนดเอง Scripts -->
    <script src="../assets/dist/js/custom.min.js"></script>

</body>
</html>