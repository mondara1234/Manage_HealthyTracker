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

    <link rel="stylesheet" media="all" type="text/css" href="../assets/libs/jquerydatepicker/jquery-ui.css" />
    <link rel="stylesheet" media="all" type="text/css" href="../assets/libs/jquerydatepicker/jquery-ui-timepicker-addon.css" />

    <script type="text/javascript">
        $(function(){

            let startDateTextBox = $('#dateStart');
            let endDateTextBox = $('#dateEnd');
            startDateTextBox.datepicker({
                dateFormat: 'dd-M-yy',
                onClose: function(dateText, inst) {
                    if (endDateTextBox.val() != '') {
                        let testStartDate = startDateTextBox.datetimepicker('getDate');
                        let testEndDate = endDateTextBox.datetimepicker('getDate');
                        if (testStartDate > testEndDate)
                            endDateTextBox.datetimepicker('setDate', testStartDate);
                    }
                    else {
                        endDateTextBox.val(dateText);
                    }
                },
                onSelect: function (selectedDateTime){
                    endDateTextBox.datetimepicker('option', 'minDate', startDateTextBox.datetimepicker('getDate') );
                }
            });
            endDateTextBox.datepicker({
                dateFormat: 'dd-M-yy',
                onClose: function(dateText, inst) {
                    if (startDateTextBox.val() != '') {
                        let testStartDate = startDateTextBox.datetimepicker('getDate');
                        let testEndDate = endDateTextBox.datetimepicker('getDate');
                        if (testStartDate > testEndDate)
                            startDateTextBox.datetimepicker('setDate', testEndDate);
                    }
                    else {
                        startDateTextBox.val(dateText);
                    }
                },
                onSelect: function (selectedDateTime){
                    startDateTextBox.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
                }
            });

        });

    </script>
</head>
<body class="bg-container">
    <?php
    $UserName = null;
    if(isset($_GET["UserName"])){
        $UserName = $_GET["UserName"];
    }

    include('../Database/connect.php');

    $sql = "SELECT * FROM fooddiary WHERE UserName = '$UserName' ";
    $query = mysqli_query($conn, $sql);
    ?>
    <!-- ============================================================== -->
    <!-- ส่วนหัว - ใช้ style จาก pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- Sidebar scroll-->
        <aside class="left-sidebar " data-sidebarbg="skin5">
            <nav class="sidebar-nav ">
                <ul id="sidebarnav" class="p-t-30">
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../Homepage.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">หน้าหลัก</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect" href="../ProfileUser/UserInformation.php" aria-expanded="false"><i class="fa fa-user-secret"></i><span class="hide-menu"> ข้อมูล User </span> </a></li>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-pencil"></i><span class="hide-menu"> การจัดการฐานข้อมูล </span></a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item"><a href="../Manage_User/ManageMembers.php" class="sidebar-link"><i class="fa fa-user-plus"></i><span class="hide-menu"> ฐานข้อมูล สมาชิก </span></a></li>
                            <li class="sidebar-item"><a href="../Manage_DiaryUser/ManageDiary.php" class="sidebar-link"><i class="mdi mdi-book-open-page-variant"></i><span class="hide-menu"> ฐานข้อมูล ไดอารี่อาหาร </span></a></li>
                            <li class="sidebar-item"><a href="../Manage_Food/ManageFood.php" class="sidebar-link"><i class="mdi mdi-food"></i><span class="hide-menu"> ฐานข้อมูล รายการอาหาร </span></a></li>
                            <li class="sidebar-item"><a href="../Manage_BMI/ManageBMI.php" class="sidebar-link"><i class="mdi mdi-multiplication-box"></i><span class="hide-menu"> ฐานข้อมูล BMI </span></a></li>
                            <li class="sidebar-item"><a href="../Manage_Trick/ManageTips.php" class="sidebar-link"><i class="mdi mdi-calendar-check"></i><span class="hide-menu"> ฐานข้อมูล เคล็ดลับ </span></a></li>
                            <li class="sidebar-item"><a href="../Manage_Admin/ManageAdmin.php" class="sidebar-link"><i class="mdi mdi-run-fast"></i><span class="hide-menu"> ฐานข้อมูล ผู้ดูแลระบบ </span></a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../Statistics_App/UserStatisticsApp.php" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu p-r-10"> สถิติการใช้งาน App </span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../Permission/Permission.php" aria-expanded="false"><i class="mdi mdi-key"></i><span class="hide-menu p-r-10"> การขออนุญาติ </span> <span class="label label-danger  ">3</span> </a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../Problems/Problems.php" aria-expanded="false"><i class="mdi mdi-alert"></i><span class="hide-menu p-r-10"> ปัญหาที่พบ </span> <span class="label label-danger  ">3</span> </a></li>
                </ul>
            </nav>
        </aside>
        <header class="topbar " data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- เป็นการสลับแถบด้านข้างจะแสดงเพียงบนโทรศัพท์ -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- ส่วนหัวข้อแถบเมนู -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="../Homepage.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <img src="../assets/images/LogoHT.png" alt="homepage" height="50" width="50" class="light-logo" />
                        </b>
                        <!-- Logo text -->
                        <span class="logo-text">
                                <div class="light-logo" style="font-size: 20px;" > Healthy Tracker </div>
                            </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- สลับที่มองเห็นได้เฉพาะบนอุปกรณ์เคลื่อนที่เท่านั้น -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- กรอบทางช้าย -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- กรอบทางขวา -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- ส่วนของรูป user  -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../assets/images/users/user-default.png" alt="user" class="rounded-circle" width="40">
                                <span class="font-16 m-r-5 m-l-5">Admin</span>
                                <span class=" fa fa-angle-down font-16"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> ข้อมูลส่วนตัว </a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> ข้อความ </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i> การตั้งค่าบัญชี </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../login/login.html"><i class="fa fa-power-off m-r-5 m-l-5"></i> ออกจากระบบ </a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- ส่วน Title-->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title"><div>ข้อมูลอาหารของ : <?php echo ($UserName) ?></div></h4>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- ส่วนของเนื้อหา  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="font-16">
                    <center>
                        Start Date : <input type="text" name="dateStart" id="dateStart" value="" />
                        End Date : <input type="text" name="dateEnd" id="dateEnd" value="" />
                    </center><br>

                    <form method="post" name="form1" OnSubmit="return chkConfirm();">
                        <table width="100%" border="1" style="border: black double 5px;">
                            <tr bgcolor="#068e81" style="color: white; height: 40px; opacity:0.9;">
                                <th>
                                    <div align="center"> DiaryID </div>
                                </th>
                                <th>
                                    <div align="center"> FoodName </div>
                                </th>
                                <th>
                                    <div align="center"> FoodNumber </div>
                                </th>
                                <th>
                                    <div align="center"> FoodUnit </div>
                                </th>
                                <th>
                                    <div align="center"> FoodCalorie </div>
                                </th>
                                <th>
                                    <div align="center"> DiaryDate </div>
                                </th>

                            </tr>

                        <?php
                        while($result = mysqli_fetch_array($query, MYSQLI_ASSOC))
                        {
                            ?>

                            <tr>
                                <td align="center"><?php echo ($result["DiaryID"]) ?></td>
                                <td align="center"><?php echo ($result["FoodName"]) ?></td>
                                <td align="center"><?php echo ($result["FoodNumber"]) ?></td>
                                <td align="center"><?php echo ($result["FoodUnit"]) ?></td>
                                <td align="center"><?php echo ($result["FoodCalorie"]) ?></td>
                                <td align="center"><?php echo ($result["DiaryDate"]) ?></td>
                            </tr>

                            <?php
                        }
                        ?>
                        </table>
                        <table width="100%" border="1" style="border: black double 5px; border-top: 0px">
                            <tr>
                                <td align="center" width="20%"><div align="center"> ค่าเฉลี่ยการกินต่อวัน </div> </td>
                                <td align="center"> <div align="center"> ผลลัพธ์ </div></td>
                            </tr>
                            <tr>
                                <td align="center" width="20%"><div align="center"> ค่าเฉลี่ยการกินต่อสัปดาห์ </div> </td>
                                <td align="center"> <div align="center"> ผลลัพธ์ </div></td>
                            </tr>
                            <tr>
                                <td align="center" width="20%"><div align="center"> ค่าเฉลี่ยการกินต่อเดือน </div> </td>
                                <td align="center"> <div align="center"> ผลลัพธ์ </div></td>
                            </tr>
                        </table>
                        <br>
                        <p class="font-20 m-t-5">แจ้งการแนะนำ</p>
                        <div style="width: 100%; display:inline-block; position:relative;">
                            <textarea name="" id="txt" cols="20" rows="5" style="width: 100%; display:block;"></textarea>
                            <button class="font-16" style="position:absolute; bottom:10px; right:10px; color: white; background: #068e81; ">แจ้งการแนะนำ</button>
                        </div>
                    </form>
                    <?php
                    mysqli_close($conn);
                    ?>
                </div>

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