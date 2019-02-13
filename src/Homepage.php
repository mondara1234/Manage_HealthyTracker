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
    <?php
    include("Database/connect.php");
    $UserName = $_GET["UserName"];
    $sql = "SELECT * FROM adminmanage WHERE UserName = '$UserName' ";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    $sqlProblemapp = "SELECT COUNT(*) as totalProblemapp FROM problemapp WHERE Status = '' ";
    $queryProblemapp = mysqli_query($conn, $sqlProblemapp);
    $resultProblemapp = mysqli_fetch_array($queryProblemapp, MYSQLI_ASSOC);

    $sqlAllProblem = "SELECT COUNT(*) as totalAllProblem FROM problemapp";
    $queryAllProblem = mysqli_query($conn, $sqlAllProblem);
    $resultAllProblem = mysqli_fetch_array($queryAllProblem, MYSQLI_ASSOC);

    $sqlAdminmanage = "SELECT COUNT(*) as totalAdminmanage FROM adminmanage WHERE Permission = 'pending' ";
    $queryAdminmanage = mysqli_query($conn, $sqlAdminmanage);
    $resultAdminmanage = mysqli_fetch_array($queryAdminmanage, MYSQLI_ASSOC);

    $sqlUsermanage = "SELECT COUNT(*) as totalUsermanage FROM membermanage";
    $queryUsermanage = mysqli_query($conn, $sqlUsermanage);
    $resultUsermanage = mysqli_fetch_array($queryUsermanage, MYSQLI_ASSOC);

    $sqlUserNew = "SELECT COUNT(*) as totalUserNew FROM membermanage WHERE date(DateRegis)>=date_add(curdate(),interval -6 day) AND date(DateRegis)<=curdate()";
    $queryUserNew = mysqli_query($conn, $sqlUserNew);
    $resultUserNew = mysqli_fetch_array($queryUserNew, MYSQLI_ASSOC);
    ?>
    <body class="bg-container">
        <!-- ============================================================== -->
        <!-- ส่วนหัว - ใช้ style จาก pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
            <?php require_once 'Component/HeaderHome.php';?>
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- ส่วน Title-->
                <!-- ============================================================== -->
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-12 d-flex no-block align-items-center">
                            <h4 class="page-title">หน้าหลัก</h4>
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
                                    <a href="Homepage.php?UserName=<?php echo($_GET["UserName"]); ?>">
                                        <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                        <div>My Dashboard</div>
                                    </a>
                                </li>
                                <li class="bg_ls" style="width: 18%;">
                                    <a href="ProfileUser/UserInformation.php?UserName=<?php echo($_GET["UserName"]); ?>">
                                        <h1 class="font-light text-white"><i class="fa fa-user-circle"></i></h1>
                                        <div style="margin-top: 10%">ข้อมูลผู้ใช้งาน</div>
                                    </a>
                                </li>
                                <li class="bg_lo" style="width: 18%">
                                    <a href="Manage_User/ManageMembers.php?UserName=<?php echo($_GET["UserName"]); ?>">
                                        <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></h1>
                                        <div>การจัดการฐานข้อมูล</div>
                                    </a>
                                </li>
                                <li class="bg_lg" style="width: 18%">
                                    <a href="Statistics_App/UserStatisticsApp.php?UserName=<?php echo($_GET["UserName"]); ?>">
                                        <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                                        <div>สถิติ</div>
                                    </a>
                                </li>
                                <li class="bg_lr" style="width: 18%">
                                    <a href="Problems/Problems.php?UserName=<?php echo($_GET["UserName"]); ?>">
                                        <h1 class="font-light text-white"><i class="mdi mdi-alert"></i></h1>
                                        <span class="label label-success"><?php echo($resultProblemapp['totalProblemapp']); ?></span>
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
                                                        <h5 style="width: 40%; margin-top: 3%">ผู้ใช้งาน App</h5>
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
                                                        <h5 class="align-items-center" style="width: 69%; margin-top: 3%;"> ความถี่การสมัครสมาชิก</h5>
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
                                                            <h5 class="m-b-0 m-t-5"><?php echo($resultUsermanage['totalUsermanage']); ?></h5>
                                                            <small class="font-light">จำนวนผู้ใช้ทั้งหมด</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 m-t-15">
                                                        <div class="bg-dark p-10 text-white text-center" style="width:100%; height: 80px;">
                                                            <i class="fa fa-plus m-b-5 font-16"></i>
                                                            <h5 class="m-b-0 m-t-5"><?php echo($resultUserNew['totalUserNew']); ?></h5>
                                                            <small class="font-light">ผู้ใช้ใหม่</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 m-t-15">
                                                        <div class="bg-dark p-10 text-white text-center" style="width:100%; height: 80px;">
                                                            <i class="mdi mdi-alert-outline m-b-5 font-16"></i>
                                                            <h5 class="m-b-0 m-t-5"><?php echo($resultAllProblem['totalAllProblem']); ?></h5>
                                                            <small class="font-light">จำนวนปัญหาทั้งหมด</small>
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
                    <?php
                    $sqlFood = "SELECT COUNT(*) as totalFood FROM foodmanage ";
                    $queryFood = mysqli_query($conn, $sqlFood);
                    $resultFood = mysqli_fetch_array($queryFood, MYSQLI_ASSOC);

                    $sqlRecommend = "SELECT COUNT(*) as totalRecommend FROM alertuser ";
                    $queryRecommend= mysqli_query($conn, $sqlRecommend);
                    $resultRecommend = mysqli_fetch_array($queryRecommend, MYSQLI_ASSOC);

                    $sqlDiary = "SELECT COUNT(*) as totalDiary FROM fooddiary ";
                    $queryDiary = mysqli_query($conn, $sqlDiary);
                    $resultDiary = mysqli_fetch_array($queryDiary, MYSQLI_ASSOC);

                    $sqlTrick = "SELECT COUNT(*) as totalTrick FROM trickmanage ";
                    $queryTrick = mysqli_query($conn, $sqlTrick);
                    $resultTrick = mysqli_fetch_array($queryTrick, MYSQLI_ASSOC);

                    ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card m-t-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="peity_line_good left text-center m-t-15">
                                          <span>
                                            <span style="display: none;">12,6,9,23,14,10,17</span>
                                            <canvas width="50" height="24"></canvas>
                                          </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border-left text-center p-t-10">
                                        <h3 class="mb-0 "><?php echo($resultFood['totalFood']); ?></h3>
                                        <span class="text-dark font-12">จำนวนรายการอาหาร</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card m-t-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="peity_bar_good left text-center m-t-15">
                                            <span>12,6,9,23,14,10,13</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border-left text-center p-t-10">
                                        <h3 class="mb-0 font-weight-bold"><?php echo($resultRecommend['totalRecommend']); ?></h3>
                                        <span class="text-dark font-12">จำนวนคำแนะนำ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card m-t-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="peity_bar_bad left text-center m-t-15">
                                            <span>
                                                <span style="display: none;">3,5,6,16,8,10,6</span>
                                                <canvas width="50" height="50"></canvas>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border-left text-center p-t-10">
                                        <h3 class="mb-0 font-weight-bold"><?php echo($resultDiary['totalDiary']); ?></h3>
                                        <span class="text-dark font-12">จำนวนสมุดอาหาร</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card m-t-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="peity_line_neutral left text-center m-t-15">
                                            <span>
                                                <span style="display: none;">10,15,8,14,13,10,10</span>
                                                <canvas width="50" height="50"></canvas>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border-left text-center p-t-10">
                                        <h3 class="mb-0 font-weight-bold"><?php echo($resultTrick['totalTrick']); ?></h3>
                                        <span class="text-dark font-12">จำนวนเคล็ดลับ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $sqlProblemServer = "SELECT COUNT(*) as totalProblemServer FROM problemapp WHERE ProblemType = 'เซิร์ฟเวอร์มีปัญหา' ";
                    $queryProblemServer = mysqli_query($conn, $sqlProblemServer);
                    $resultProblemServer = mysqli_fetch_array($queryProblemServer, MYSQLI_ASSOC);

                    $sqlProblemBug = "SELECT COUNT(*) as totalProblemBug FROM problemapp WHERE ProblemType = 'พบข้อบกพร่อง' ";
                    $queryProblemBug = mysqli_query($conn, $sqlProblemBug);
                    $resultProblemBug = mysqli_fetch_array($queryProblemBug, MYSQLI_ASSOC);

                    $sqlProblemSystem = "SELECT COUNT(*) as totalProblemSystem FROM problemapp WHERE ProblemType = 'ระบบไม่เสถียร' ";
                    $queryProblemSystem = mysqli_query($conn, $sqlProblemSystem);
                    $resultProblemSystem = mysqli_fetch_array($queryProblemSystem, MYSQLI_ASSOC);

                    $sqlProblemAdvise = "SELECT COUNT(*) as totalProblemAdvise FROM problemapp WHERE ProblemType = 'แนะนำ' ";
                    $queryProblemAdvise = mysqli_query($conn, $sqlProblemAdvise);
                    $resultProblemAdvise = mysqli_fetch_array($queryProblemAdvise, MYSQLI_ASSOC);

                    $sqlProblemOther = "SELECT COUNT(*) as totalProblemOther FROM problemapp WHERE ProblemType = 'อื่นๆ' ";
                    $queryProblemOther = mysqli_query($conn, $sqlProblemOther);
                    $resultProblemOther = mysqli_fetch_array($queryProblemOther, MYSQLI_ASSOC);

                    $PercentServer = ($resultProblemServer['totalProblemServer'] / $resultAllProblem['totalAllProblem']) * 100;
                    $PercentBug = ($resultProblemBug['totalProblemBug'] / $resultAllProblem['totalAllProblem']) * 100;
                    $PercentSystem = ($resultProblemSystem['totalProblemSystem'] / $resultAllProblem['totalAllProblem']) * 100;
                    $PercentAdvise = ($resultProblemAdvise['totalProblemAdvise'] / $resultAllProblem['totalAllProblem']) * 100;
                    $PercentOther = ($resultProblemOther['totalProblemOther'] / $resultAllProblem['totalAllProblem']) * 100;

                    ?>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title m-b-0">จำนวนปัญหา</h4>
                            <div class="m-t-20">
                                <div class="d-flex no-block align-items-center">
                                    <span><?php echo(number_format($PercentServer,2,',',''));?>% เซิร์ฟเวอร์มีปัญหา</span>
                                    <div class="ml-auto">
                                        <span><?php echo($resultProblemServer['totalProblemServer']); ?></span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo($PercentServer); ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex no-block align-items-center m-t-25">
                                    <span><?php echo(number_format($PercentBug,2,',',''));?>% พบข้อบกพร่อง</span>
                                    <div class="ml-auto">
                                        <span><?php echo($resultProblemBug['totalProblemBug']); ?></span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo($PercentBug);?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex no-block align-items-center m-t-25">
                                    <span><?php echo(number_format($PercentSystem,2,',',''));?>% ระบบไม่เสถียร</span>
                                    <div class="ml-auto">
                                        <span><?php echo($resultProblemSystem['totalProblemSystem']); ?></span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?php echo($PercentSystem);?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex no-block align-items-center m-t-25">
                                    <span><?php echo( number_format($PercentAdvise,2,',',''));?>% แนะนำ</span>
                                    <div class="ml-auto">
                                        <span><?php echo($resultProblemAdvise['totalProblemAdvise']); ?></span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo($PercentAdvise);?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex no-block align-items-center m-t-25">
                                    <span><?php echo(number_format($PercentOther,2,',',''));?>% อื่นๆ</span>
                                    <div class="ml-auto">
                                        <span><?php echo($resultProblemOther['totalProblemOther']); ?></span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo($PercentOther);?>%; background-color: red" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once 'Component/footer.php';?>
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
        <!-- กราฟวงกลม -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            <?php
            $sqlAllSex = "SELECT COUNT(*) as totalAllSex FROM membermanage";
            $queryAllSex= mysqli_query($conn, $sqlAllSex);
            $resultAllSex = mysqli_fetch_array($queryAllSex, MYSQLI_ASSOC);

            $sqlMaleSex = "SELECT COUNT(*) as totalMaleSex FROM membermanage WHERE Sex = 'male'";
            $queryMaleSex = mysqli_query($conn, $sqlMaleSex);
            $resultMaleSex = mysqli_fetch_array($queryMaleSex, MYSQLI_ASSOC);

            $sqlFeMaleSex = "SELECT COUNT(*) as totalFeMaleSex FROM membermanage WHERE Sex = 'female'";
            $queryFeMaleSex = mysqli_query($conn, $sqlFeMaleSex);
            $resultFeMaleSex = mysqli_fetch_array($queryFeMaleSex, MYSQLI_ASSOC);
            ?>

            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                let data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['ทั้งหมด',     <?php echo($resultAllSex['totalAllSex']); ?>],
                    ['ชาย',      <?php echo($resultMaleSex['totalMaleSex']); ?>],
                    ['หญิง',    <?php echo($resultFeMaleSex['totalFeMaleSex']); ?>]
                ]);

                let options = {
                    title: '',
                    is3D: true,
                };

                let chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
            }
        </script>

        <!-- รูปกราฟ %-->
        <script src="assets/libs/chart/matrix.interface.js"></script>
        <script src="assets/libs/chart/jquery.peity.min.js"></script>
        <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
        <script src="assets/libs/chart/turning-series.js"></script>
        <!-- กำหนดเอง Scripts -->
        <script src="assets/dist/js/custom.min.js"></script>
        <script src="assets/dist/js/scriptCustom.js"></script>

    </body>
    <?php
    mysqli_close($conn);
    ?>
</html>