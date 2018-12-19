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
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu p-r-10"> ร้องขอสิทธ์ </span> <span class="label text-white label-megna  ">20</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="RequestPermission.php" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> การร้องขอสิทธ์เป็น Admin </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu"> อนุมัติการร้องขอสิทธ์ </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="AllowPermission.php" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> การร้องขอสิทธ์เป็น Admin </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu"> ปฏิเสธการร้องขอสิทธ์ </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="DeclinedPermission.php" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> การร้องขอสิทธ์เป็น Admin </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-pencil"></i><span class="hide-menu"> การจัดการฐานข้อมูล </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="ManageMembers.php" class="sidebar-link"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"> ฐานข้อมูล สมาชิก </span></a></li>
                                <li class="sidebar-item"><a href="ManageDiary.php" class="sidebar-link"><i class="mdi mdi-message-outline"></i><span class="hide-menu"> ฐานข้อมูล ไดอารี่อาหาร </span></a></li>
                                <li class="sidebar-item"><a href="ManageFood.php" class="sidebar-link"><i class="mdi mdi-multiplication-box"></i><span class="hide-menu"> ฐานข้อมูล รายการอาหาร </span></a></li>
                                <li class="sidebar-item"><a href="ManageBMI.php" class="sidebar-link"><i class="mdi mdi-multiplication-box"></i><span class="hide-menu"> ฐานข้อมูล BMI </span></a></li>
                                <li class="sidebar-item"><a href="ManageTips.php" class="sidebar-link"><i class="mdi mdi-calendar-check"></i><span class="hide-menu"> ฐานข้อมูล เคล็ดลับ </span></a></li>
                                <li class="sidebar-item"><a href="ManageExercise.php" class="sidebar-link"><i class="mdi mdi-bulletin-board"></i><span class="hide-menu"> ฐานข้อมูล ท่าออกกำลังกาย </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu"> สถิติ </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="UserStatisticsApp.php" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> สถิติการใช้งาน App </span></a></li>
                                <li class="sidebar-item"><a href="UserStatisticsWebAdmin.php" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> สถิติการใข้งาน Web-Admin </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect " href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-alert"></i><span class="hide-menu p-r-10"> ปัญหาที่พบ </span> <span class="label label-danger  ">3</span> </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="Problems.php" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 403 </span></a></li>
                                <li class="sidebar-item"><a href="error-404.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 404 </span></a></li>
                                <li class="sidebar-item"><a href="error-405.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 405 </span></a></li>
                                <li class="sidebar-item"><a href="error-500.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 500 </span></a></li>
                            </ul>
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
                            <h4 class="page-title">อนุมัติการร้องขอสิทธ์</h4>
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
                <!-- ส่วนของเนื้อหา  -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="cardID m-r-20 m-t-10">
                                <img src="assets/images/users/img.jpg" alt="Avatar" style="width:100%">
                                <div class="containerID">
                                    <h4><b>John Doe</b></h4>
                                    <div class="row justify-content-between align-items-center">
                                        <button>
                                            <div class="font-12"> ปฎิเสธ </div>
                                        </button>
                                        <button>
                                            <div class="font-12"> ลบ </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="cardID m-r-20 m-t-10">
                                <img src="assets/images/users/img.jpg" alt="Avatar" style="width:100%">
                                <div class="containerID">
                                    <h4><b>John Doe</b></h4>
                                    <div class="row justify-content-between align-items-center">
                                        <button>
                                            <div class="font-12"> ปฎิเสธ </div>
                                        </button>
                                        <button>
                                            <div class="font-12"> ลบ </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="cardID m-r-20 m-t-10">
                                <img src="assets/images/users/img.jpg" alt="Avatar" style="width:100%">
                                <div class="containerID">
                                    <h4><b>John Doe</b></h4>
                                    <div class="row justify-content-between align-items-center">
                                        <button>
                                            <div class="font-12"> ปฎิเสธ </div>
                                        </button>
                                        <button>
                                            <div class="font-12"> ลบ </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="cardID m-r-20 m-t-10">
                                <img src="assets/images/users/img.jpg" alt="Avatar" style="width:100%">
                                <div class="containerID">
                                    <h4><b>John Doe</b></h4>
                                    <div class="row justify-content-between align-items-center">
                                        <button>
                                            <div class="font-12"> ปฎิเสธ </div>
                                        </button>
                                        <button>
                                            <div class="font-12"> ลบ </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="cardID m-r-20 m-t-10">
                                <img src="assets/images/users/img.jpg" alt="Avatar" style="width:100%">
                                <div class="containerID">
                                    <h4><b>John Doe</b></h4>
                                    <div class="row justify-content-between align-items-center">
                                        <button>
                                            <div class="font-12"> ปฎิเสธ </div>
                                        </button>
                                        <button>
                                            <div class="font-12"> ลบ </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="cardID m-r-20 m-t-10">
                                <img src="assets/images/users/img.jpg" alt="Avatar" style="width:100%">
                                <div class="containerID">
                                    <h4><b>John Doe</b></h4>
                                    <div class="row justify-content-between align-items-center">
                                        <button>
                                            <div class="font-12"> ปฎิเสธ </div>
                                        </button>
                                        <button>
                                            <div class="font-12"> ลบ </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="cardID m-r-20 m-t-10">
                                <img src="assets/images/users/img.jpg" alt="Avatar" style="width:100%">
                                <div class="containerID">
                                    <h4><b>John Doe</b></h4>
                                    <div class="row justify-content-between align-items-center">
                                        <button>
                                            <div class="font-12"> ปฎิเสธ </div>
                                        </button>
                                        <button>
                                            <div class="font-12"> ลบ </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="cardID m-r-20 m-t-10">
                                <img src="assets/images/users/img.jpg" alt="Avatar" style="width:100%">
                                <div class="containerID">
                                    <h4><b>John Doe</b></h4>
                                    <div class="row justify-content-between align-items-center">
                                        <button>
                                            <div class="font-12"> ปฎิเสธ </div>
                                        </button>
                                        <button>
                                            <div class="font-12"> ลบ </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="cardID m-r-20 m-t-10">
                                <img src="assets/images/users/img.jpg" alt="Avatar" style="width:100%">
                                <div class="containerID">
                                    <h4><b>John Doe</b></h4>
                                    <div class="row justify-content-between align-items-center">
                                        <button>
                                            <div class="font-12"> ปฎิเสธ </div>
                                        </button>
                                        <button>
                                            <div class="font-12"> ลบ </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="cardID m-r-20 m-t-10">
                                <img src="assets/images/users/img.jpg" alt="Avatar" style="width:100%">
                                <div class="containerID">
                                    <h4><b>John Doe</b></h4>
                                    <div class="row justify-content-between align-items-center">
                                        <button>
                                            <div class="font-12"> ปฎิเสธ </div>
                                        </button>
                                        <button>
                                            <div class="font-12"> ลบ </div>
                                        </button>
                                    </div>
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
        <script src="assets/libs/DateJS/build/date.js"></script>
        <!-- รูปกราฟ %-->
        <script src="assets/libs/chart/matrix.interface.js"></script>
        <script src="assets/libs/chart/jquery.peity.min.js"></script>
        <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
        <script src="assets/libs/chart/turning-series.js"></script>
        <!-- กำหนดเอง Scripts -->
        <script src="assets/dist/js/custom.min.js"></script>

    </body>
</html>