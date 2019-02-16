<html>
    <head>
        <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
    </head>
    <body>
    <?php
    include("../Database/connect.php");
    //$DateM = $_POST['DateM'] ? $_POST['DateM'] : '04-02-2019';
    //$DateS = $_POST['DateS'] ? $_POST['DateS'] : '10-02-2019';
    $DateM ='2019-02-04';
    $DateS ='2019-02-13';

    $sqlEenergy = "SELECT * FROM energy_users_per_day WHERE Date>='$DateM' 
        AND Date<='$DateS'";
    $queryEenergy = mysqli_query($conn, $sqlEenergy);

    $sqlEenergyING = "SELECT * FROM energy_users_per_day WHERE Date>='$DateM' 
        AND Date<='$DateS'";
    $queryEenergyING = mysqli_query($conn, $sqlEenergyING);

    ?>
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
                        $mon = 0;
                        while($resultEenergy = mysqli_fetch_array($queryEenergy, MYSQLI_ASSOC))
                        {
                            if($resultEenergy["Unit"] === 'ขาด'){
                         ?>
                            parseInt(<?php echo ($resultEenergy["Eenergy"])?>),
                         <?php
                            }else{
                         ?>
                            parseInt(<?php echo $mon ?>),
                         <?php
                            }
                         ?>
                        <?php
                        }
                        ?>
                    ],
                    color: '#068e81'
                }, {
                    name: 'เกิน',
                    data: [
                        <?php
                            while($resultEenergyING = mysqli_fetch_array($queryEenergyING, MYSQLI_ASSOC))
                        {
                            if($resultEenergyING["Unit"] === 'เกิน'){
                        ?>
                            parseInt(<?php echo ($resultEenergyING["Eenergy"])?>),
                        <?php
                            }else{
                        ?>
                            parseInt(<?php echo $mon ?>),
                        <?php
                            }
                        ?>
                        <?php
                        }
                        ?>
                    ],
                    color: '#991715'
                }];

                let json = {};
                json.chart = chart;
                json.title = title;
                json.xAxis = xAxis;
                json.yAxis = yAxis;
                json.tooltip = tooltip;
                json.plotOptions = plotOptions;
                json.credits = credits;
                json.series = series;
                $('#container').highcharts(json);

            });
        </script>
    </body>
</html>
