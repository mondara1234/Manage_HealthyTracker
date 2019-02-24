<html>
    <head>
        <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <?php
            include("../Database/connect.php");
            $dateYeay = date('Y');

            for ($i = 1; $i <= 12; $i++) {
                $sqlSexMale[$i] = "SELECT COUNT(*) as totalMemberMale FROM membermanage WHERE Sex = 'male' AND DateRegis>='$dateYeay-0$i-01' 
            AND DateRegis<='$dateYeay-0$i-31' ";
                $querySexMale[$i]= mysqli_query($conn, $sqlSexMale[$i]);
                $resultSexMale[$i] = mysqli_fetch_array($querySexMale[$i], MYSQLI_ASSOC);
            }

            for ($i = 1; $i <= 12; $i++) {
                $sqlSexFemale[$i] = "SELECT COUNT(*) as totalMemberFemale FROM membermanage WHERE Sex = 'female' AND DateRegis>='$dateYeay-0$i-01' 
            AND DateRegis<='$dateYeay-0$i-31' ";
                $querySexFemale[$i]= mysqli_query($conn, $sqlSexFemale[$i]);
                $resultSexFemale[$i] = mysqli_fetch_array($querySexFemale[$i], MYSQLI_ASSOC);
            }
        ?>
    </head>
    <body>
        <div id="container" style="width: 100%; height: 100%; margin: 0 auto"></div>
        <script language="JavaScript">
            $(document).ready(function() {
                let chart = {
                    type: 'column'
                };
                let title = {
                    text: 'ข้อมูลการสมัครใช้งานระบบประจำปี '+<?php echo date('Y');?>
                };
                let xAxis = {
                    categories: ['ม.ค', 'ก.พ', 'มี.ค', 'เม.ย', 'พ.ค', 'มื.ย', 'ก.ค', 'ส.ค', 'ก.ย', 'ต.ค', 'พ.ย', 'ธ.ค']
                };
                let yAxis ={
                    min: 0,
                    title: {
                        text: 'จำนวนผู้สมัคร'
                    },
                    stackLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                        }
                    }
                };
                let legend = {
                    align: 'right',
                    x: -30,
                    verticalAlign: 'top',
                    y: 25,
                    floating: true,
                    backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                    borderColor: '#CCC',
                    borderWidth: 1,
                    shadow: false
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
                    name: 'ชาย',
                    data: [
                        <?php echo($resultSexMale[1]['totalMemberMale']); ?>,
                        <?php echo($resultSexMale[2]['totalMemberMale']); ?>,
                        <?php echo($resultSexMale[3]['totalMemberMale']); ?>,
                        <?php echo($resultSexMale[4]['totalMemberMale']); ?>,
                        <?php echo($resultSexMale[5]['totalMemberMale']); ?>,
                        <?php echo($resultSexMale[6]['totalMemberMale']); ?>,
                        <?php echo($resultSexMale[7]['totalMemberMale']); ?>,
                        <?php echo($resultSexMale[8]['totalMemberMale']); ?>,
                        <?php echo($resultSexMale[9]['totalMemberMale']); ?>,
                        <?php echo($resultSexMale[10]['totalMemberMale']); ?>,
                        <?php echo($resultSexMale[11]['totalMemberMale']); ?>,
                        <?php echo($resultSexMale[12]['totalMemberMale']); ?>
                    ],
                    color: '#0b4fd6'
                }, {
                    name: 'หญิง',
                    data: [<?php echo($resultSexFemale[1]['totalMemberFemale']); ?>,
                        <?php echo($resultSexFemale[2]['totalMemberFemale']); ?>,
                        <?php echo($resultSexFemale[3]['totalMemberFemale']); ?>,
                        <?php echo($resultSexFemale[4]['totalMemberFemale']); ?>,
                        <?php echo($resultSexFemale[5]['totalMemberFemale']); ?>,
                        <?php echo($resultSexFemale[6]['totalMemberFemale']); ?>,
                        <?php echo($resultSexFemale[7]['totalMemberFemale']); ?>,
                        <?php echo($resultSexFemale[8]['totalMemberFemale']); ?>,
                        <?php echo($resultSexFemale[9]['totalMemberFemale']); ?>,
                        <?php echo($resultSexFemale[10]['totalMemberFemale']); ?>,
                        <?php echo($resultSexFemale[11]['totalMemberFemale']); ?>,
                        <?php echo($resultSexFemale[12]['totalMemberFemale']); ?>
                    ],
                    color: '#c43806'
                }];

                let json = {};
                json.chart = chart;
                json.title = title;
                json.xAxis = xAxis;
                json.yAxis = yAxis;
                json.legend = legend;
                json.tooltip = tooltip;
                json.plotOptions = plotOptions;
                json.credits = credits;
                json.series = series;
                $('#container').highcharts(json);

            });
        </script>
    </body>
</html>
