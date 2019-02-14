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
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajax({
                type: "POST",
                url: "api/regisAll.php",
                data: "data="+$("#dateUser").val(),
                success: function(result) {
                    google.charts.load("current", {packages:["corechart"]});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        let data = google.visualization.arrayToDataTable([
                            ['Task', 'Hours per Day'],
                            ['ชาย',   parseInt(result[1])],
                            ['หญิง',   parseInt(result[2])]
                        ]);

                        let options = {
                            title: '',
                            is3D: true
                        };

                        let chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                        chart.draw(data, options);
                    }
                    console.log('result'+result); //e.g. 2015-11-13
                    $('#dateSa').html('จำนวนผู้ใช้งาน ทั้งหมด');
                    $('#totalAll').html('ทั้งหมด '+parseInt(result[0])+' คน');
                    $('#totalMale').html('ชาย '+parseInt(result[1])+' คน');
                    $('#totalFeMale').html('หญิง '+parseInt(result[2])+' คน');
                }
            });

            document.getElementById("dateUser").addEventListener("change", function() {
                console.log($("#dateUser").val()); //e.g. 2015-11-13
                $.ajax({
                    type: "POST",
                    url: "api/regisAll.php",
                    data: "data="+$("#dateUser").val(),
                    success: function(result) {
                        google.charts.load("current", {packages:["corechart"]});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            let data = google.visualization.arrayToDataTable([
                                ['Task', 'Hours per Day'],
                                ['ชาย',   parseInt(result[1])],
                                ['หญิง',   parseInt(result[2])]
                            ]);

                            let options = {
                                title: '',
                                is3D: true
                            };

                            let chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                            chart.draw(data, options);
                        }
                        console.log('result'+result); //e.g. 2015-11-13
                        $('#dateSa').html('จำนวนผู้ใช้งาน วันที่  '+$("#dateUser").val());
                        $('#totalAll').html('ทั้งหมด '+parseInt(result[0])+' คน');
                        $('#totalMale').html('ชาย '+parseInt(result[1])+' คน');
                        $('#totalFeMale').html('หญิง '+parseInt(result[2])+' คน');
                    }
                });
            });

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajax({
                type: "POST",
                url: "api/ProblemAll.php",
                data: "data="+$("#dateProbled").val(),
                success: function(result) {
                    google.charts.load("current", {packages:["corechart"]});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        let data = google.visualization.arrayToDataTable([
                            ['Task', 'Hours per Day'],
                            ['เซิร์ฟเวอร์มีปัญหา',   parseInt(result[1])],
                            ['พบข้อบกพร่อง',   parseInt(result[2])],
                            ['ระบบไม่เสถียร',   parseInt(result[3])],
                            ['แนะนำ',   parseInt(result[4])],
                            ['อื่นๆ',   parseInt(result[5])]
                        ]);

                        let options = {
                            title: '',
                            is3D: true,
                            colors: [
                                '#dd0032',
                                '#dd6c13',
                                '#ddb911',
                                '#dd0b9f',
                                '#a914dd',
                            ]
                        };

                        let chart = new google.visualization.PieChart(document.getElementById('piechart_3dProblem'));
                        chart.draw(data, options);
                    }
                    $('#datePb').html('จำนวนผู้แจ้งปัญหา ทั้งหมด');
                    $('#totalPbAll').html('ทั้งหมด '+parseInt(result[0])+' คน');
                    $('#totalServer').html('เซิร์ฟเวอร์มีปัญหา '+parseInt(result[1])+' คน');
                    $('#totalBug').html('พบข้อบกพร่อง '+parseInt(result[2])+' คน');
                    $('#totalSystem').html('ระบบไม่เสถียร '+parseInt(result[3])+' คน');
                    $('#totalRecommend').html('แนะนำ '+parseInt(result[4])+' คน');
                    $('#totalOther').html('อื่นๆ '+parseInt(result[5])+' คน');
                }
            });

            document.getElementById("dateProbled").addEventListener("change", function() {
                $.ajax({
                    type: "POST",
                    url: "api/ProblemAll.php",
                    data: "data="+$("#dateProbled").val(),
                    success: function(result) {
                        google.charts.load("current", {packages:["corechart"]});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            let data = google.visualization.arrayToDataTable([
                                ['Task', 'Hours per Day'],
                                ['เซิร์ฟเวอร์มีปัญหา',   parseInt(result[1])],
                                ['พบข้อบกพร่อง',   parseInt(result[2])],
                                ['ระบบไม่เสถียร',   parseInt(result[3])],
                                ['แนะนำ',   parseInt(result[4])],
                                ['อื่นๆ',   parseInt(result[5])]
                            ]);

                            let options = {
                                title: '',
                                is3D: true
                            };

                            let chart = new google.visualization.PieChart(document.getElementById('piechart_3dProblem'));
                            chart.draw(data, options);
                        }
                        $('#datePb').html('จำนวนผู้แจ้งปัญหา '+$("#dateProbled").val());
                        $('#totalPbAll').html('ทั้งหมด  '+parseInt(result[0])+'  คน');
                        $('#totalServer').html('เซิร์ฟเวอร์มีปัญหา  '+parseInt(result[1])+'  คน');
                        $('#totalBug').html('พบข้อบกพร่อง  '+parseInt(result[2])+'  คน');
                        $('#totalSystem').html('ระบบไม่เสถียร  '+parseInt(result[3])+'  คน');
                        $('#totalRecommend').html('แนะนำ  '+parseInt(result[4])+'  คน');
                        $('#totalOther').html('อื่นๆ  '+parseInt(result[5])+'  คน');
                    }
                });
            });

        });
    </script>
</head>
<?php
    include('../Database/connect.php');

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
<body class="bg-container">
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
                                    เลือกวันที่ : <input type="date" name="dateUser" id="dateUser" >
                                </div>
                            </center><br>
                            <div class="font-18" id="dateSa" style="margin-left: 32%"></div>
                            <div class="font-16" id="totalAll" style="margin-left: 48.2%"></div>
                            <div class="font-16" id="totalMale" style="margin-left: 53%"></div>
                            <div class="font-16" id="totalFeMale" style="margin-left: 52%"></div>
                        </div>
                    </div>
                <div class="row">
                    <div style="width: 55%">
                        <div class="x_panel tile fixed_height_320 overflow_hidden">
                            <div class="x_title row">
                                <h5 style="width: 70%;">ผู้ใช้งานแจ้งปัญหา</h5>
                            </div>
                            <table>
                                <div id="piechart_3dProblem" style="width: 100%; height:100%; padding-bottom: 50px" />
                            </table>
                        </div>
                    </div>
                    <div style="width: 45%; height: 100%">
                        <center>
                            <div class="font-14">
                                เลือกวันที่ : <input type="date" name="dateProbled" id="dateProbled">
                            </div>
                        </center><br>
                        <div class="font-18" id="datePb" style="margin-left: 32%"></div>
                        <div class="font-16" id="totalPbAll" style="margin-left: 48.9%"></div>
                        <div class="font-16" id="totalServer" style="margin-left: 35.4%"></div>
                        <div class="font-16" id="totalBug" style="margin-left: 39.6%"></div>
                        <div class="font-16" id="totalSystem" style="margin-left: 40.3%"></div>
                        <div class="font-16" id="totalRecommend" style="margin-left: 50.4%"></div>
                        <div class="font-16" id="totalOther" style="margin-left: 53.8%"></div>
                        <div class="font-16" id="totalOther" style="margin-left: 54.2%"></div>
                    </div>
                </div>

                <!-- กราฟแท่ง-->
                <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title row">
                        <h5 class="align-items-center" style="width: 69%;"> ความถี่การสมัครสมาชิก</h5>
                        <div class="clearfix"></div>
                    </div>
                    <iframe src="../Component/Highcharts.php" height="100%" width="100%" frameborder="0" scrolling="auto" align="right">
                    </iframe>
                </div>
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
<!-- เมนูแถบด้านข้าง -->
<script src="../assets/dist/js/sidebarmenu.js"></script>
<!-- เปิด-ปิด Menu sidebar -->
<script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<!-- กำหนดเอง Scripts -->
<script src="../assets/dist/js/custom.min.js"></script>
<script src="../assets/dist/js/scriptCustom.js"></script>

</body>
</html>