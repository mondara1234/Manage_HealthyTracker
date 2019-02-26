<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php
include('../Database/connect.php');
$UserName = $_GET["UserName"];

$sql = "SELECT * FROM fooddiary WHERE UserName = '$UserName'";
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
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--  ให้รองรับและ แสดงหน้าตา ใน IE=edge ได้โดยไม่ผิดเพี้ยน-->
    <!-- กำหนดขนาด initial-scale=1.0 = เพื่อไม่ให้  Safari Zoom -->
    <meta name="viewport" content="width=device-width, initial-scale=1">  <!--  device-width = “ขนาด” ของ device นั้นๆ-->
    <meta name="description" content="">  <!--  บอกรายละเอียดของเว็บเพจแบบคร่าวๆ-->
    <meta name="author" content=""> <!-- ผู้เขียนหน้านี้ -->
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/LogoHT.png">
    <title>ข้อมูลอาหารของ : <?php echo ($UserName) ?></title>

    <!-- Custom CSS -->
    <link href="../assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link href="../assets/dist/css/icons/font-awesome/css/fontawesome-all.min.css" rel="stylesheet">
    <link href="../assets/dist/css/style.min.css" rel="stylesheet">
    <link href="../assets/dist/css/styleCommon.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../assets/libs/datetimepicker/jquery.datetimepicker.css">
    <style type="text/css">
        #startDate,
        #endDate,{
            text-align:center;
            width: 30%;
        }
        .bootstrap-datetimepicker-widget tr:hover {
            background-color: #808080;
        }
    </style>
</head>
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
                        <h4 class="page-title"><div>ข้อมูลอาหารของ : <?php echo ($UserName) ?></div></h4>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- ส่วนของเนื้อหา  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="font-16">
                    <form method="post" name="formDate" action="api/SelectFood.php?UserName=<?php echo($_GET["UserName"]); ?>&NameUser=<?php echo ($_GET["NameUser"]);?>"  enctype="multipart/form-data" >
                        <center>
                            <div style="width: 60%">
                                วันที่เริ่ม : <input id="startDate" name="startDate" type="text" autocomplete="off"/>
                                วันที่สิ้นสุด : <input id="endDate" name="endDate" type="text" autocomplete="off"/>
                                <input type="submit" name="submit" id="submit" value="ค้นหา" style="color: white; background: #068e81" />
                            </div>
                        </center>
                        <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
                        <table width="100%" border="1" style="border: black double 5px; margin-top: 2%">
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
                                <td align="center"> <div align="center"> <b style="color: red; font-size: 18px"><?php echo ($sum) ?></b> </div></td>
                            </tr>
                            <tr>
                                <td align="center" width="20%"><div align="center"> ค่าเฉลี่ยทั้งหมด(%) </div> </td>
                                <td align="center"> <div align="center"> <b style="color: red; font-size: 18px"> <?php echo (($sum * $records) /100) ?></b> </div></td>
                            </tr>
                        </table>
                    </form>
                    <div style="margin-top: 5%">
                        <center>
                            <div style="width: 100%; margin-bottom: 2%">
                                <input class="week-picker" id="weekpicker" placeholder="กรุณาเลือกวันที่" style="width: 20%" autocomplete="off">
                                <input type="hidden" name="DateM" id="DateM" />
                                <input type="hidden" name="DateS" id="DateS" />
                                <button type="submit" name="btnEnergy" id="btnEnergy" style="color: white; background: #068e81">ค้นหา</button>
                            </div>
                        </center>
                        <div style="background: #068e81; padding: 0.002% 1% 0.002% 0.7%; height: 320px ">
                            <div id="highcharts" style="width: 100%; height: 300px; margin: 0 auto; margin-top: 1%"></div>
                        </div>
                    </div>
                    <div style="background: #068e81; padding: 0.002% 0.7% 0.002% 0.7%; margin-top: 1%; ">
                        <div class="card card-body" style="margin-top: 1%; margin-bottom: 1%">
                            <p class="font-20">การแจ้งคำแนะนำ</p>
                            <form name="MyForm" method="post" action="api/InsertMessage.php" target="iframe_target">
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
                    </div>
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
    <!-- ไม่ได้ใช้ที  ส่วนกำหนดค่า JavaScript ของ Core Bootstrap -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>

    <!-- เมนูแถบด้านข้าง -->
    <script src="../assets/dist/js/sidebarmenu.js"></script>
    <!-- เปิด-ปิด Menu sidebar -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <!-- กำหนดเอง Scripts -->
    <script src="../assets/dist/js/custom.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        $(function(){

            let today  = new Date();
            let date = today.toLocaleDateString("en-US");

            let optsDate = {
                format:'Y-m-d', // รูปแบบวันที่
                formatDate:'Y-m-d',
                timepicker:false,
                closeOnDateSelect:true,
            };

            let setDateFunc = function(ct,obj){
                let minDateSet = $("#startDate").val();
                let maxDateSet = $("#endDate").val();

                if($(obj).attr("id")=="startDate"){
                    this.setOptions({
                        minDate:false,
                        maxDate:maxDateSet?maxDateSet:false
                    })
                }
                if($(obj).attr("id")=="endDate"){
                    this.setOptions({
                        maxDate:date?date:false,
                        minDate:minDateSet?minDateSet:false
                    })
                }
            };

            $("#startDate,#endDate").datetimepicker($.extend(optsDate,{
                onShow:setDateFunc,
                onSelectDate:setDateFunc,
            }));

        });
    </script>

    <script type="text/javascript">
        $(function() {
            let DateM;
            let DateS;

            let selectCurrentWeek = function () {
                window.setTimeout(function () {
                    $('.ui-weekpicker').find('.ui-datepicker-current-day a').addClass('ui-state-active').removeClass('ui-state-default');
                }, 1);
            };

            let setDates = function (input) {
                let $input = $(input);
                let date = $input.datepicker('getDate');
                if (date !== null) {
                    let firstDay = $input.datepicker( "option", "firstDay" );
                    let dayAdjustment = date.getDay() - firstDay;
                    if (dayAdjustment < 0) {
                        dayAdjustment += 7;
                    }
                    DateM = new Date(date.getFullYear(), date.getMonth(), date.getDate() - dayAdjustment);
                    DateS = new Date(date.getFullYear(), date.getMonth(), date.getDate() - dayAdjustment + 6);

                    let inst = $input.data('datepicker');
                    let dateFormat = inst.settings.dateFormat || $.datepicker._defaults.dateFormat;
                    $('#weekpicker').val($.datepicker.formatDate(dateFormat, DateM, inst.settings)+ ' - ' + $.datepicker.formatDate(dateFormat, DateS, inst.settings));
                    $('#DateM').val($.datepicker.formatDate(dateFormat, DateM, inst.settings));
                    $('#DateS').val($.datepicker.formatDate(dateFormat, DateS, inst.settings));
                }
            };

            $('.week-picker').datepicker({
                beforeShow: function () {
                    $('#ui-datepicker-div').addClass('ui-weekpicker');
                    selectCurrentWeek();
                },
                onClose: function () {
                    $('#ui-datepicker-div').removeClass('ui-weekpicker');
                },
                showOtherMonths: true,
                selectOtherMonths: true,
                dateFormat: 'yy-mm-dd',
                onSelect: function (dateText, inst) {
                    setDates(this);
                    selectCurrentWeek();
                    $(this).change();
                },
                beforeShowDay: function (date) {
                    let cssClass = '';
                    if (date >= DateM && date <= DateS)
                        cssClass = 'ui-datepicker-current-day';
                    return [true, cssClass];
                },
                onChangeMonthYear: function (year, month, inst) {
                    selectCurrentWeek();
                }
            });
            setDates('.week-picker');

            let $calendarTR = $('.ui-weekpicker .ui-datepicker-calendar tr');
            $calendarTR.live('mousemove', function () {
                $(this).find('td a').addClass('ui-state-hover');
            });
            $calendarTR.live('mouseleave', function () {
                $(this).find('td a').removeClass('ui-state-hover');
            });
        });
    </script>
    <script language="JavaScript">
        $(document).ready(function() {
            <?php
            $dt = date("Y-m-d");
            $DateM = date( "Y-m-d", strtotime( "$dt -7 day" ) );
            $DateS = $dt;

            $sql = "SELECT * FROM energy_users_per_day WHERE UserName = '$UserName' AND Unit = 'ขาด' AND DateDiary>='$DateM' 
        AND DateDiary<='$DateS' order by DateDiary asc";
            $query = mysqli_query($conn, $sql);

            $sqlING = "SELECT * FROM energy_users_per_day WHERE UserName = '$UserName' AND Unit = 'เกิน' AND DateDiary>='$DateM' 
        AND DateDiary<='$DateS' order by DateDiary asc";
            $queryING = mysqli_query($conn, $sqlING);
            ?>
            let chart = {
                type: 'column'
            };
            let title = {
                text: 'ข้อมูลส่วนต่างแคลอรี่ ของวันที่  <?php echo date('Y-m-d',strtotime($DateM))?> - <?php echo date('Y-m-d',strtotime($DateS))?>'
            };
            let xAxis = {
                categories: [
                    'จ','อ','พ','พฤ','ศ','ส','อา'
                ]
            };
            let yAxis ={
                min: 0,
                title: {
                    text: 'จำนวนแคลอรี่'
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                }
            };

            let tooltip = {
                formatter: function () {
                    return '<b>' + this.x + '</b><br/>' +
                        this.series.name + ': ' + this.y + '<br/>' +
                        'Total: ' + this.point.stackTotal;
                }
            };
            let plotOptions = {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: false
                    }
                }
            };
            let credits = {
                enabled: false
            };
            let series= [{
                name: 'ขาด',
                data: [
                    <?php
                    $dataStartDevoid = '';
                    $resultArrayDevoid = array();
                    while($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                        array_push($resultArrayDevoid, $result);
                    }

                    for ($i = 0; $i <= 6; $i++) {
                    $dataStartDevoid = date( "Y-m-d", strtotime( "$DateM +$i day" ));
                    $array_search_DateDiaryDevoid = array_keys(array_combine(array_keys($resultArrayDevoid), array_column($resultArrayDevoid, 'DateDiary')),$dataStartDevoid);
                    if($array_search_DateDiaryDevoid!=FALSE ){
                    $strDevoid=implode(',',$array_search_DateDiaryDevoid);
                    $result_EnergyDevoid = json_encode($resultArrayDevoid["$strDevoid"]["Energy"]);
                    ?>
                    parseInt(<?php echo($result_EnergyDevoid)?>),
                    <?php
                    } else {
                    ?>
                    0,
                    <?php
                    }
                    }
                    ?>
                ],
                color: '#068e81'
            },
                {
                    name: 'เกิน',
                    data: [
                        <?php
                        $dataStart = '';
                        $resultArray = array();
                        while($resultING = mysqli_fetch_array($queryING, MYSQLI_ASSOC)) {
                            array_push($resultArray, $resultING);
                        }

                        for ($i = 0; $i <= 6; $i++) {
                        $dataStart = date( "Y-m-d", strtotime( "$DateM +$i day" ));
                        $array_search_DateDiary = array_keys(array_combine(array_keys($resultArray), array_column($resultArray, 'DateDiary')),$dataStart);
                        if($array_search_DateDiary!=FALSE  ){
                        $str=implode(',',$array_search_DateDiary);
                        $result_Energy = json_encode($resultArray["$str"]["Energy"]);
                        ?>
                        parseInt(<?php echo($result_Energy)?>),
                        <?php
                        } else {
                        ?>
                        0,
                        <?php
                        }
                        }
                        ?>
                    ],
                    color: '#991715'
                }
            ];

            let json = {};
            json.chart = chart;
            json.title = title;
            json.xAxis = xAxis;
            json.yAxis = yAxis;
            json.tooltip = tooltip;
            json.plotOptions = plotOptions;
            json.credits = credits;
            json.series = series;
            $('#highcharts').highcharts(json);

            document.getElementById('btnEnergy').onclick = function()
            {
                let DateM = document.getElementById("DateM").value;
                let DateS = document.getElementById("DateS").value;
                let name = '<?php echo($UserName)?>';
                const arrayIng = $.parseJSON(
                    $.ajax({
                        url: 'api/EnergyING.php', //หน้า php ที่ต้องการรับค่า
                        data: {DateM:DateM, DateS:DateS, UserName: name}, // ชื่อตัวแปร : value
                        type: "post",
                        dataType: 'json',
                        async: false
                    }).responseText);
                const arrayDevoid = $.parseJSON(
                    $.ajax({
                        url: 'api/EnergyDevoid.php', //หน้า php ที่ต้องการรับค่า
                        data: {DateM:DateM, DateS:DateS, UserName: name}, // ชื่อตัวแปร : value
                        type: "post",
                        dataType: 'json',
                        async: false
                    }).responseText);

                let chart = {
                    type: 'column'
                };
                let title = {
                    text: 'ข้อมูลส่วนต่างแคลอรี่ ของวันที'+DateM+'  -  '+DateS
                };
                let xAxis = {
                    categories: [
                        'จ','อ','พ','พฤ','ศ','ส','อา'
                    ]
                };
                let yAxis ={
                    min: 0,
                    title: {
                        text: 'จำนวนแคลอรี่'
                    },
                    stackLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                        }
                    }
                };

                let tooltip = {
                    formatter: function () {
                        return '<b>' + this.x + '</b><br/>' +
                            this.series.name + ': ' + this.y + '<br/>' +
                            'Total: ' + this.point.stackTotal;
                    }
                };
                let plotOptions = {
                    column: {
                        stacking: 'normal',
                        dataLabels: {
                            enabled: false
                        }
                    }
                };
                let credits = {
                    enabled: false
                };
                let series = [{
                    name: 'ขาด',
                    data: [
                        arrayDevoid[0],
                        arrayDevoid[1],
                        arrayDevoid[2],
                        arrayDevoid[3],
                        arrayDevoid[4],
                        arrayDevoid[5],
                        arrayDevoid[6],
                    ],
                    color: '#068e81'
                },
                    {
                        name: 'เกิน',
                        data: [
                            arrayIng[0],
                            arrayIng[1],
                            arrayIng[2],
                            arrayIng[3],
                            arrayIng[4],
                            arrayIng[5],
                            arrayIng[6],
                        ],
                        color: '#991715'
                    }
                ];

                let json = {};
                json.chart = chart;
                json.title = title;
                json.xAxis = xAxis;
                json.yAxis = yAxis;
                json.tooltip = tooltip;
                json.plotOptions = plotOptions;
                json.credits = credits;
                json.series = series;
                $('#highcharts').highcharts(json);

            }
        });
    </script>
    <?php
    mysqli_close($conn);
    ?>
</body>
</html>