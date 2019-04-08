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
        <title>ข้อมูลการดูแลสำหรับผู้ดูแลระบบ</title>

        <!-- Custom CSS -->
        <link href="../assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/libs/flot/css/float-chart.css" rel="stylesheet">
        <link href="../assets/dist/css/icons/font-awesome/css/fontawesome-all.min.css" rel="stylesheet">
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

        $sql = "SELECT * FROM adminmanage WHERE UserName LIKE '%".$Search."%' ";
        $query = mysqli_query($conn, $sql);

        $UserName = $_GET["UserName"];
        $sqlmanage = "SELECT * FROM adminmanage WHERE UserName = '$UserName' ";
        $querymanage = mysqli_query($conn, $sqlmanage);
        $resultUser = mysqli_fetch_array($querymanage, MYSQLI_ASSOC);

        $sqlProblemapp = "SELECT COUNT(*) as totalProblemapp FROM problemapp where Status != 'แก้ไขสร็จสิ้น' ";
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
                                <h4 class="page-title">ข้อมูลการดูแลสำหรับผู้ดูแลระบบ</h4>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- ส่วนของเนื้อหา  -->
                    <!-- ============================================================== -->
                    <div class="container-fluid">
                        <center>
                            <form name="search" method="post">
                                <table width="80%" border="0">
                                    <tr>
                                        <th> <div align="center" class="font-16"> ชื่อผู้ดูแลระบบ :
                                                <input name="txtSearch" type="text" id="txtSearch" value="<?php echo($Search); ?>" />
                                                <input type="submit" value="ค้นหา" />
                                            </div>
                                        </th>
                                    </tr>
                                </table>
                        </center>
                        <button type="button" name="SubmitAdmin" class="font-16"
                                style="width: 10%; height: 30px;color: #068e81;background: white;border-color: white; margin-top: 2%"
                                onclick="window.location.href='Show_Responsible_Admin.php?UserName=<?php echo($_GET["UserName"]); ?>'"
                        >
                            Admin
                        </button>
                        <button type="button" name="SubmitUser" class="font-16"
                                style="width: 10%; height: 30px; color: white; background: #068e81; border-color: white; margin-top: 2%"
                                onclick="window.location.href='Show_Responsible_User.php?UserName=<?php echo($_GET["UserName"]); ?>'"
                        >
                            สมาชิก
                        </button>
                        <table width="100%" border="1" style="margin-top: 20px; border: black;" class="font-16">
                            <tr bgcolor="#068e81" style="color: white; height: 40px">
                                <th style="padding-left: 5px; padding-right: 5px">
                                    <div align="center"> ลำดับ </div>
                                </th>
                                <th style="padding-left: 5px; padding-right: 5px">
                                    <div align="center"> ชื่อผู้ดูแลระบบ </div>
                                </th>
                                <th style="padding-left: 5px; padding-right: 5px">
                                    <div align="center"> รายละเอียดการดูแล </div>
                                </th>
                                <th style="padding-left: 5px; padding-right: 5px">
                                    <div align="center"> ดูข้อมูลการดูแล </div>
                                </th>
                            </tr>

                            <?php
                            $x = 0;
                            $admin = '';
                            $num = 0;
                            while($result = mysqli_fetch_array($query, MYSQLI_ASSOC))
                            {
                                $admin = $result["UserName"];
                                $sqlResponsible = "SELECT * FROM membermanage WHERE Responsible = '$admin' ";
                                $queryResponsible = mysqli_query($conn, $sqlResponsible);
                                $x = $x + 1;
                                ?>
                                    <tr>
                                        <td align="center" style="width: 5%"><?php echo ($x) ?></td>
                                        <td align="center" style="width: 7%"><?php echo ($result["UserName"]) ?></td>
                                        <td align="center" style="width: 5%">
                                            <select name="select" id="select"  style="width: 100%">
                                                <?php
                                                $num = mysqli_num_rows($queryResponsible);
                                                if($num == 0)
                                                {
                                                    ?>
                                                    <option value="ไม่มีการดูแล">ไม่มีการดูแล</option>
                                                    <?php
                                                }else{
                                                while($resultResponsible = mysqli_fetch_array($queryResponsible, MYSQLI_ASSOC))
                                                {
                                                ?>
                                                <option value="<?php echo ($resultResponsible["UserName"]) ?>" >
                                                    <?php echo ($resultResponsible["UserName"]) ?>
                                                </option>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td align="center" style="width: 5%">
                                            <a href="Members_Responsible.php?UserAdmin=<?php echo ($result["UserName"]);?>&UserName=<?php echo($_GET["UserName"]); ?>"> ดูข้อมูล </a>
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
            </div>
            <?php require_once '../Component/footer.php';?>
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