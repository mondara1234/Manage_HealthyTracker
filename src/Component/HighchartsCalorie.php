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
                    text: 'ข้อมูลส่วนต่างแคลอรี่ ของวันที่ 04/02/2019 - 10/02/2019'
                };
                let xAxis = {
                    categories: ['วันจันทร์', 'วันอังคาร', 'วันพุธ', 'วันพฤหัสบดี', 'วันศุกร์', 'วันเสาร์', 'วันอาทิตย์']
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
                    name: 'ขาด',
                    data: [
                        100,
                        0,
                        80,
                        250,
                        0,
                        0,
                        150
                    ],
                    color: '#068e81'
                }, {
                    name: 'เกิน',
                    data: [
                        0,
                        120,
                        0,
                        0,
                        150,
                        235,
                        0
                    ],
                    color: '#991715'
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
