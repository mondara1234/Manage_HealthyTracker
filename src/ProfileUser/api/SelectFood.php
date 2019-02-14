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
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/LogoHT.png">
    <title>Admin - Healthy Tracker</title>

    <!-- Custom CSS -->
    <link href="../../assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link href="../../assets/dist/css/style.min.css" rel="stylesheet">
    <link href="../../assets/dist/css/styleCommon.css" rel="stylesheet">

    <link rel="stylesheet" media="all" type="text/css" href="../../assets/libs/jquerydatepicker/jquery-ui.css" />
    <link rel="stylesheet" media="all" type="text/css" href="../../assets/libs/jquerydatepicker/jquery-ui-timepicker-addon.css" />
</head>
<script language="JavaScript" type="text/JavaScript">
    function validateF(){

        let theForm = document.formDate;
        let StartDate  = theForm['dateStart'].value;
        let StopDate  = theForm['dateEnd'].value;
        if (StopDate < StartDate){
            alert('วันที่เริ่มต้องน้อยกว่าวันที่สิ้นสุด');
        }else{
        }
    }
</script>
<body class="bg-container">
<?php
$UserName = null;
if(isset($_GET["NameUser"])){
    $UserName = $_GET["NameUser"];
}
include('../../Database/connect.php');

$dateS = $_POST["dateStart"];
$dateE = $_POST["dateEnd"];
$sql = "SELECT * FROM fooddiary WHERE UserName = '$UserName' AND DiaryDate>='$dateS' 
        AND DiaryDate<='$dateE' ";
$query = mysqli_query($conn, $sql);

$UserNames = $_GET["UserName"];
$sqlmanage = "SELECT * FROM adminmanage WHERE UserName = '$UserNames' ";
$querymanage = mysqli_query($conn, $sqlmanage);
$resultUser = mysqli_fetch_array($querymanage, MYSQLI_ASSOC);

$sqlProblemapp = "SELECT COUNT(*) as totalProblemapp FROM problemapp";
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
                    <h4 class="page-title"><div>ข้อมูลอาหารของ : <?php echo ($UserName) ?></div></h4>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- ส่วนของเนื้อหา  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <div class="font-16">
                <form method="post" name="formDate" action="SelectFood.php?UserName=<?php echo($_GET["UserName"]); ?>&NameUser=<?php echo ($_GET["NameUser"]);?>" >
                    <center>
                        <div style="width: 60%">
                            Start Date :<input id="dateStart" name="dateStart" type="date" value="<?php echo ($dateS);?>"/>
                            End Date :<input id="dateEnd" name="dateEnd" type="date" value="<?php echo ($dateE);?>" />
                            <button type="submit" name="submit" id="submit" onclick="validateF();" style="color: white; background: #068e81">ค้นหา</button>
                        </div>
                    </center>

                    <table width="100%" border="1" style="border: black double 5px; margin-top: 2%">
                        <tr bgcolor="#068e81" style="color: white; height: 40px; opacity:0.9;">
                            <th>
                                <div align="center"> ลำดับ </div>
                            </th>
                            <th>
                                <div align="center"> ชื่ออาหาร </div>
                            </th>
                            <th>
                                <div align="center"> จำนวน </div>
                            </th>
                            <th>
                                <div align="center"> หน่วย </div>
                            </th>
                            <th>
                                <div align="center"> แคลอรี่ </div>
                            </th>
                            <th>
                                <div align="center"> วันที่เพื่ม </div>
                            </th>

                        </tr>

                        <?php
                        $x = 0;
                        $sum = 0;
                        $records = mysqli_num_rows($query);
                        while($result = mysqli_fetch_array($query, MYSQLI_ASSOC))
                        {
                            $x = $x + 1;
                            $sum = $sum + $result["FoodCalorie"];
                            ?>

                            <tr>
                                <td align="center"><?php echo ($x) ?></td>
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
                            <td align="center" width="20%"><div align="center"> ค่าเฉลี่ยทั้งหมด </div> </td>
                            <td align="center"> <div align="center"> <?php echo ($sum) ?> </div></td>
                        </tr>
                        <tr>
                            <td align="center" width="20%"><div align="center"> ค่าเฉลี่ยทั้งหมด(%) </div> </td>
                            <td align="center"> <div align="center">  <?php echo (($sum * $records) /100) ?> </div></td>
                        </tr>
                    </table>
                </form>
                <div style="margin-top: 5%">
                    <center>
                        <div style="width: 60%">
                            วันจันทร์ที่ :<input id="dateM" name="dateM" type="date"/>
                            - วันอาทิตย์ที่ :<input id="dateS" name="dateS" type="date" />
                            <button type="submit" name="submit" id="submit" onclick="validateF();" style="color: white; background: #068e81">ค้นหา</button>
                        </div>
                    </center>
                    <iframe src="../../Component/HighchartsCalorie.php" height="400px" width="100%" frameborder="0" scrolling="auto" align="right">
                    </iframe>
                </div>
                <div class="col-md-12 card card-body m-t-10">
                    <p class="font-20">การแจ้งคำแนะนำ</p>
                    <form name="MyForm" method="post" action="InsertMessage.php" target="iframe_target">
                        <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
                        <div style="margin-bottom: 1%;">
                            <font class="font-16">หัวข้อ :</font>
                            <input type="text" name="AU_Title" class="font-16" style="width: 80%">
                            <input type="hidden" name="AU_Date" id="AU_Date" value="<?php echo date('Y-m-d');?>"/>
                            <input type="hidden" name="AU_UserName" id="AU_UserName" value="<?php echo ($_GET["NameUser"]);?>"/>
                        </div>
                        <div style="width: 100%; display:inline-block; position:relative;">
                            <font class="font-16">รายละเอียด :</font>
                            <textarea class="font-16" name="AU_Datile" id="txt" cols="20" rows="7" style="width: 100%; display:block;"></textarea>
                            <button class="font-16" style="position:absolute; bottom:10px; right:20px; color: white; background: #068e81; ">แจ้งการแนะนำ</button>
                        </div>
                    </form>
                </div>
                <?php
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
    <?php require_once '../../Component/footer.php';?>
</div>

<!-- ========
====================================================== -->
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