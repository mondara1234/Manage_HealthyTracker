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

    <!-- กราฟวงกลม -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            let data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['ทั้งหมด',     500],
                ['ชาย',      150],
                ['หญิง',    350]
            ]);

            let options = {
                title: '',
                is3D: true
            };

            let chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            let data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['ทั้งหมด',     15],
                ['ชาย',      5],
                ['หญิง',    10]
            ]);

            let options = {
                title: '',
                is3D: true
            };

            let chart = new google.visualization.PieChart(document.getElementById('piechart_3ds'));
            chart.draw(data, options);
        }
    </script>
</head>

<body class="bg-container">
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
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu"> สถิติ </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="UserStatisticsApp.php" class="sidebar-link"><i class="mdi mdi-chart-histogram"></i><span class="hide-menu"> สถิติการใช้งาน App </span></a></li>
                        <li class="sidebar-item"><a href="../Statistics_Web/UserStatisticsWebAdmin.php" class="sidebar-link"><i class="mdi mdi-chart-pie"></i><span class="hide-menu"> สถิติการใข้งาน Web-Admin </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect " href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-alert"></i><span class="hide-menu p-r-10"> ปัญหาที่พบ </span> <span class="label label-danger  ">3</span> </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="../Problems/Problems.php" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 403 </span></a></li>
                    </ul>
                </li>
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
                    <h4 class="page-title">สถิติการใช้งาน App </h4>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- ส่วนของเนื้อหา  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- กราฟวงกลม-->
                <div class="row">
                    <div style="width: 55%">
                        <div class="x_panel tile fixed_height_320 overflow_hidden">
                            <div class="x_title row">
                                <h5 style="width: 70%;">ผู้ใช้งาน App</h5>
                            </div>
                            <table>
                                <div id="piechart_3d" style="width: 100%; height:100%; padding-bottom: 50px" />
                            </table>
                        </div>
                    </div>
                    <div style="width: 45%; height: 100%">
                        <center>
                            <div class="font-14">
                                เลือกวันที่ : <input type="date" name="bday" id="dateStart" value="2019-02-04">
                            </div>
                        </center><br>
                        <div class="font-16" align="center">จำนวนผู้ใช้งาน วันที่  2019-02-04</div>
                        <div class="font-14" align="center">ชาย 80 คน  </div>
                        <div class="font-14" align="center">หญิง 80 คน  </div>
                        <div class="font-14" align="center">รวม 160 คน  </div>
                    </div>
                </div>
            <div class="row">
                <div style="width: 55%">
                    <div class="x_panel tile fixed_height_320 overflow_hidden">
                        <div class="x_title row">
                            <h5 style="width: 70%;">ผู้ใช้งานแจ้งปัญหา</h5>
                        </div>
                        <table>
                            <div id="piechart_3ds" style="width: 100%; height:100%; padding-bottom: 50px" />
                        </table>
                    </div>
                </div>
                <div style="width: 45%; height: 100%">
                    <center>
                        <div class="font-14">
                            เลือกวันที่ : <input type="date" name="bday" id="dateProbled" value="2019-02-04">
                        </div>
                    </center><br>
                    <div class="font-16" align="center">จำนวนผู้แจ้งปัญหา วันที่  2019-02-04</div>
                    <div class="font-14" align="center">ชาย 5 คน  </div>
                    <div class="font-14" align="center">หญิง 10 คน  </div>
                    <div class="font-14" align="center">รวม 15 คน  </div>
                </div>
            </div>
            <!-- กราฟแท่ง-->

            <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title row">
                    <h5 class="align-items-center" style="width: 69%; margin-top: 3%;"> ความถี่การใช้งานเมนูต่าง ๆ</h5>
                    <ul class="nav navbar-right justify-content-end panel_toolbox">
                        <li class="dropdown p-icon-r5">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-times p-icon-r5"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <iframe src="../Component/Highcharts.php" height="100%" width="100%" frameborder="0" scrolling="auto" align="right">
                </iframe>
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
<!-- เมนูแถบด้านข้าง -->
<script src="../assets/dist/js/sidebarmenu.js"></script>
<!-- เปิด-ปิด Menu sidebar -->
<script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<!-- กำหนดเอง Scripts -->
<script src="../assets/dist/js/custom.min.js"></script>
<script src="../assets/dist/js/scriptCustom.js"></script>

</body>
</html>