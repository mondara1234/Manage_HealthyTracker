<html>
    <head>
        <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
    </head>
    <body>
    <div id="container" style="width: 100%; height: 100%; margin: 0 auto"></div>
    <?php
    include("../Database/connect.php");
    //$DateM = $_POST['DateM'] ? $_POST['DateM'] : '04-02-2019';
    //$DateS = $_POST['DateS'] ? $_POST['DateS'] : '10-02-2019';
    $dt = date("Y-m-d");
    $DateM = date( "Y-m-d", strtotime( "$dt -7 day" ) );
    $DateS = $dt;

    $sql = "SELECT * FROM energy_users_per_day WHERE UserName = '$UserName' AND DateDiary>='$DateM' 
        AND DateDiary<='$DateS' order by DateDiary asc";
    $query = mysqli_query($conn, $sql);

    $sqlEenergy = "SELECT * FROM energy_users_per_day WHERE UserName = '$UserName' AND DateDiary>='$DateM' 
        AND DateDiary<='$DateS' order by DateDiary asc";
    $queryEenergy = mysqli_query($conn, $sqlEenergy);

    $sqlEenergyING = "SELECT * FROM energy_users_per_day WHERE UserName = '$UserName' AND DateDiary>='$DateM' 
        AND DateDiary<='$DateS' order by DateDiary asc";
    $queryEenergyING = mysqli_query($conn, $sqlEenergyING);

    ?>
    <script language="JavaScript">
        $(document).ready(function() {
            let chart = {
                type: 'column'
            };
            let title = {
                text: 'ข้อมูลส่วนต่างแคลอรี่ ของวันที่ <?php echo date('d/m/Y',strtotime($DateM))?> - <?php echo date('d/m/Y',strtotime($DateS))?>'
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
                    20,20,30,50,0,30,0
                ],
                color: '#068e81'
            },
                {
                    name: 'เกิน',
                    data: [
                        20,20,30,50,0,30,0
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
            $('#container').highcharts(json);

        });
    </script>
    </body>
</html>
