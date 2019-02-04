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
        <link rel="icon" type="image/png" sizes="16x16" href="assets/images/LogoHT.png">
        <title>Admin - Healthy Tracker</title>

        <!-- Custom CSS -->
        <link href="assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet">
        <link href="assets/dist/css/icons/font-awesome/css/fontawesome-all.min.css" rel="stylesheet">
        <link href="assets/dist/css/matrix-style.css" rel="stylesheet">
        <link href="assets/dist/css/style.min.css" rel="stylesheet">
        <link href="assets/dist/css/styleCommon.css" rel="stylesheet">

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
                    is3D: true,
                };

                let chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
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
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Homepage.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">หน้าหลัก</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect" href="ProfileUser/UserInformation.php" aria-expanded="false"><i class="fa fa-user-secret"></i><span class="hide-menu"> ข้อมูล User </span> </a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-pencil"></i><span class="hide-menu"> การจัดการฐานข้อมูล </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="Manage_User/ManageMembers.php" class="sidebar-link"><i class="fa fa-user-plus"></i><span class="hide-menu"> ฐานข้อมูล สมาชิก </span></a></li>
                                <li class="sidebar-item"><a href="Manage_DiaryUser/ManageDiary.php" class="sidebar-link"><i class="mdi mdi-book-open-page-variant"></i><span class="hide-menu"> ฐานข้อมูล ไดอารี่อาหาร </span></a></li>
                                <li class="sidebar-item"><a href="Manage_Food/ManageFood.php" class="sidebar-link"><i class="mdi mdi-food"></i><span class="hide-menu"> ฐานข้อมูล รายการอาหาร </span></a></li>
                                <li class="sidebar-item"><a href="Manage_BMI/ManageBMI.php" class="sidebar-link"><i class="mdi mdi-multiplication-box"></i><span class="hide-menu"> ฐานข้อมูล BMI </span></a></li>
                                <li class="sidebar-item"><a href="Manage_Trick/ManageTips.php" class="sidebar-link"><i class="mdi mdi-calendar-check"></i><span class="hide-menu"> ฐานข้อมูล เคล็ดลับ </span></a></li>
                                <li class="sidebar-item"><a href="Manage_Exercise/ManageExercise.php" class="sidebar-link"><i class="mdi mdi-run-fast"></i><span class="hide-menu"> ฐานข้อมูล ท่าออกกำลังกาย </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu"> สถิติ </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="Statistics_App/UserStatisticsApp.php" class="sidebar-link"><i class="mdi mdi-chart-histogram"></i><span class="hide-menu"> สถิติการใช้งาน App </span></a></li>
                                <li class="sidebar-item"><a href="Statistics_Web/UserStatisticsWebAdmin.php" class="sidebar-link"><i class="mdi mdi-chart-pie"></i><span class="hide-menu"> สถิติการใข้งาน Web-Admin </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect " href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-alert"></i><span class="hide-menu p-r-10"> ปัญหาที่พบ </span> <span class="label label-danger  ">3</span> </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="Problems/Problems.php" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 403 </span></a></li>
                                </li>
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
                        <a class="navbar-brand" href="Homepage.php">
                            <!-- Logo icon -->
                            <b class="logo-icon p-l-10">
                                <img src="assets/images/LogoHT.png" alt="homepage" height="50" width="50" class="light-logo" />
                            </b>
                            <!-- Logo text -->
                            <span class="logo-text">
                                <div class="light-logo" style="font-size: 20px" > Healthy Tracker </div>
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
                            <!-- ============================================================== -->
                            <!-- ค้นหา -->
                            <!-- ============================================================== -->
                            <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                                <form class="app-search position-absolute">
                                    <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                                </form>
                            </li>
                        </ul>
                        <!-- ============================================================== -->
                        <!-- กรอบทางขวา -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav float-right">
                            <!-- ============================================================== -->
                            <!-- ส่วนของการแจ้งเตือน -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell font-24"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>

                            <!-- ============================================================== -->
                            <!-- ส่วนของ Messages -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="font-24 mdi mdi-comment-processing"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                                    <ul class="list-style-none">
                                        <li>
                                            <div class="">
                                                <!-- Message -->
                                                <a href="javascript:void(0)" class="link border-top">
                                                    <div class="d-flex no-block align-items-center p-10">
                                                        <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                                        <div class="m-l-10">
                                                            <h5 class="m-b-0">Event today</h5>
                                                            <span class="mail-desc">Just a reminder that event</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="javascript:void(0)" class="link border-top">
                                                    <div class="d-flex no-block align-items-center p-10">
                                                        <span class="btn btn-info btn-circle"><i class="ti-settings"></i></span>
                                                        <div class="m-l-10">
                                                            <h5 class="m-b-0">Settings</h5>
                                                            <span class="mail-desc">You can customize this template</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="javascript:void(0)" class="link border-top">
                                                    <div class="d-flex no-block align-items-center p-10">
                                                        <span class="btn btn-primary btn-circle"><i class="ti-user"></i></span>
                                                        <div class="m-l-10">
                                                            <h5 class="m-b-0">Pavan kumar</h5>
                                                            <span class="mail-desc">Just see the my admin!</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="javascript:void(0)" class="link border-top">
                                                    <div class="d-flex no-block align-items-center p-10">
                                                        <span class="btn btn-danger btn-circle"><i class="fa fa-link"></i></span>
                                                        <div class="m-l-10">
                                                            <h5 class="m-b-0">Luanch Admin</h5>
                                                            <span class="mail-desc">Just see the my new admin!</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <!-- ============================================================== -->
                            <!-- ส่วนของรูป user  -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"> Admin
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> ข้อมูลส่วนตัว </a>
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> ข้อความ </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i> การตั้งค่าบัญชี </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off m-r-5 m-l-5"></i> ออกจากระบบ </a>
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
                            <h4 class="page-title">หน้าหลัก</h4>
                            <div class="ml-auto text-right">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="Homepage.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Library</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- ส่วนของปุ่มเมนู  -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="quick-actions_homepage  m-b-10">
                            <ul class="quick-actions">
                                <li class="bg_lb" style="width: 18%">
                                    <a href="Homepage.php">
                                        <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                        <div>My Dashboard</div>
                                    </a>
                                </li>
                                <li class="bg_ls" style="width: 18%">
                                    <a href="ProfileUser/UserInformation.php">
                                        <h1 class="font-light text-white"><i class="fa fa-user-secret"></i></h1>
                                        <span class="label label-important">20</span>
                                        <div>ข้อมูล User</div>
                                    </a>
                                </li>
                                <li class="bg_lo" style="width: 18%">
                                    <a href="ProfileUser/ManageUser.php">
                                        <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></h1>
                                        <div>การจัดการฐานข้อมูล</div>
                                    </a>
                                </li>
                                <li class="bg_lg" style="width: 18%">
                                    <a href="Statistics_App/UserStatisticsApp.php">
                                        <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                                        <div>สถิติ</div>
                                    </a>
                                </li>
                                <li class="bg_lr" style="width: 18%">
                                    <a href="Problems/Problems.php">
                                        <h1 class="font-light text-white"><i class="mdi mdi-alert"></i></h1>
                                        <span class="label label-success">3</span>
                                        <div>ปัญหาที่พบ</div>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="align-items-center">
                                        <div >
                                            <h4 class="card-title">การวิเคราะห์ผู้ใช้งาน App</h4>
                                            <h5 class="card-subtitle">ภาพรวมของเดือนล่าสุด</h5>
                                        </div>
                                        <div class="row">
                                            <!-- กราฟวงกลม-->
                                            <div style="width: 31%">
                                                <div class="x_panel tile fixed_height_320 overflow_hidden">
                                                    <div class="x_title row">
                                                        <h5 class="title-charts align-items-center">ผู้ใช้งาน App</h5>
                                                        <ul class="nav navbar-right justify-content-end panel_toolbox">
                                                            <li><a class="collapse-link"><i class="fa fa-chevron-up p-icon-r5"></i></a>
                                                            </li>
                                                            <li class="dropdown p-icon-r5">
                                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                                <ul class="dropdown-menu " role="menu">
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
                                                    <div class="x_content">
                                                        <table>
                                                            <div id="piechart_3d" style="width: 100%; height:100%;" />
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- กราฟแท่ง-->
                                            <div style="width: 50%; margin-left: 2%">
                                                <div class="x_panel tile fixed_height_320 overflow_hidden">
                                                    <div class="x_title row">
                                                        <h5 class="title-charts align-items-center"> ความถี่การใช้งานเมนูต่าง ๆ</h5>
                                                        <ul class="nav navbar-right justify-content-end panel_toolbox">
                                                            <li><a class="collapse-link"><i class="fa fa-chevron-up p-icon-r5"></i></a>
                                                            </li>
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
                                                    <iframe src="Component/Highcharts.php" height="80%" width="100%" frameborder="0" scrolling="auto" align="right">
                                                    </iframe>
                                                </div>
                                            </div>
                                            <!-- ปุ่มข้างๆ-->
                                            <div class="col-lg-2">
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <div class="bg-dark p-10 text-white text-center" style="width:100%; height: 80px;">
                                                            <i class="fa fa-user m-b-5 font-16"></i>
                                                            <h5 class="m-b-0 m-t-5">2540</h5>
                                                            <small class="font-light">จำนวนผู้ใช้ทั้งหมด</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 m-t-15">
                                                        <div class="bg-dark p-10 text-white text-center" style="width:100%; height: 80px;">
                                                            <i class="fa fa-plus m-b-5 font-16"></i>
                                                            <h5 class="m-b-0 m-t-5">120</h5>
                                                            <small class="font-light">ผู้ใช้ใหม่</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 m-t-15">
                                                        <div class="bg-dark p-10 text-white text-center" style="width:100%; height: 80px;">
                                                            <i class="fa fa-cart-plus m-b-5 font-16"></i>
                                                            <h5 class="m-b-0 m-t-5">656</h5>
                                                            <small class="font-light">Total Shop</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- column -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card m-t-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="peity_line_good left text-center m-t-10">
                  <span>
                    <span style="display: none;">12,6,9,23,14,10,17</span>
                    <canvas width="50" height="24"></canvas>
                  </span>
                                            <h6>+60%</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border-left text-center p-t-10">
                                        <h3 class="mb-0 ">5672</h3>
                                        <span class="text-muted">กำลังใช้งาน</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card m-t-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="peity_bar_good left text-center m-t-10"><span>12,6,9,23,14,10,13</span>
                                            <h6>+30%</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border-left text-center p-t-10">
                                        <h3 class="mb-0 font-weight-bold">2560</h3>
                                        <span class="text-muted">ผู้สมัคร</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card m-t-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="peity_bar_bad left text-center m-t-10"><span><span style="display: none;">3,5,6,16,8,10,6</span>
                                                <canvas width="50" height="24"></canvas>
                                                </span>
                                            <h6>-40%</h6></div>
                                    </div>
                                    <div class="col-md-6 border-left text-center p-t-10">
                                        <h3 class="mb-0 font-weight-bold">4560</h3>
                                        <span class="text-muted">แจ้งปัญหา</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card m-t-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="peity_line_neutral left text-center m-t-10"><span><span style="display: none;">10,15,8,14,13,10,10</span>
                                                <canvas width="50" height="24"></canvas>
                                                </span>
                                            <h6>10%</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border-left text-center p-t-10">
                                        <h3 class="mb-0 font-weight-bold">150</h3>
                                        <span class="text-muted">อื่นๆ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title m-b-0">ความคีบหน้าของปัญหาที่พบ</h4>
                            <div class="m-t-20">
                                <div class="d-flex no-block align-items-center">
                                    <span>81% App</span>
                                    <div class="ml-auto">
                                        <span>125</span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 81%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex no-block align-items-center m-t-25">
                                    <span>72% การใช้งาน</span>
                                    <div class="ml-auto">
                                        <span>120</span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 72%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex no-block align-items-center m-t-25">
                                    <span>53% Server</span>
                                    <div class="ml-auto">
                                        <span>785</span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 53%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex no-block align-items-center m-t-25">
                                    <span>3% อื่นๆ</span>
                                    <div class="ml-auto">
                                        <span>8</span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 3%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
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
        <script src="assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- ไม่ได้ใช้ที  ส่วนกำหนดค่า JavaScript ของ Core Bootstrap -->
        <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>

        <!-- เมนูแถบด้านข้าง -->
        <script src="assets/dist/js/sidebarmenu.js"></script>
        <!-- เปิด-ปิด Menu sidebar -->
        <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
        <!-- รูปกราฟ วงกลม ใช้ร่วมกับ จาวาสคลิป-->
        <script src="assets/libs/Chart.js/dist/Chart.min.js"></script>
        <!-- รูปกราฟ แท่ง ใช้ร่วมกับ จาวาสคลิป-->
        <script src="assets/libs/raphael/raphael.min.js"></script>
        <script src="assets/libs/morris.js/morris.min.js"></script>
        <script src="assets/libs/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- รูปกราฟ %-->
        <script src="assets/libs/chart/matrix.interface.js"></script>
        <script src="assets/libs/chart/jquery.peity.min.js"></script>
        <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
        <script src="assets/libs/chart/turning-series.js"></script>
        <!-- กำหนดเอง Scripts -->
        <script src="assets/dist/js/custom.min.js"></script>
        <script src="assets/dist/js/scriptCustom.js"></script>

    </body>
</html>