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
    if(isset($_GET["NameUser"])){
        $UserName = $_GET["NameUser"];
    }

    include('../Database/connect.php');

    $sql = "SELECT * FROM fooddiary WHERE UserName = '$UserName' ";
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