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
    $username ='M';
    $DateM ='2019-02-10';
    $DateS ='2019-02-23';

    $sql = "SELECT * FROM energy_users_per_day WHERE UserName = '$username' AND DateDiary>='$DateM' 
        AND DateDiary<='$DateS' order by DateDiary asc";
    $query = mysqli_query($conn, $sql);

    $sqlEenergy = "SELECT * FROM energy_users_per_day WHERE UserName = '$username' AND DateDiary>='$DateM' 
        AND DateDiary<='$DateS' order by DateDiary asc";
    $queryEenergy = mysqli_query($conn, $sqlEenergy);

    $sqlEenergyING = "SELECT * FROM energy_users_per_day WHERE UserName = '$username' AND DateDiary>='$DateM' 
        AND DateDiary<='$DateS' order by DateDiary asc";
    $queryEenergyING = mysqli_query($conn, $sqlEenergyING);

    ?>
        <div id="container" style="width: 100%; height: 100%; margin: 0 auto"></div>
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
                        <?php
                        $mon = 0;
                         while($resultEenergyING = mysqli_fetch_array($queryEenergyING, MYSQLI_ASSOC)){
                            for($i = 1; $i <= 7; $i++ )
                            {
                                if(json_encode(date('d/m/Y',strtotime($DateM,'interval '+$i+' day'))) == json_encode(date('d/m/Y',strtotime($resultEenergyING["DateDiary"])))){
                                    if($resultEenergyING["Unit"] === 'ขาด'){
                                    ?>
                                        parseInt(<?php echo($resultEenergyING["Eenergy"])?>),
                                    <?php
                                    }else{
                                    ?>
                                        parseInt(<?php echo $mon ?>),
                                    <?php
                                    }
                                }else{
                                ?>
                                    parseInt(<?php echo $mon ?>),
                            <?php
                                }
                            }
                        }
                        ?>
                    ],
                    color: '#068e81'
                },
                //    {
                //    name: 'เกิน',
                //    data: [
                //        <?php
                //        for($i = 1; $i <= 4; $i++ )
                //        {
                //        while($resultEenergy = mysqli_fetch_array($queryEenergy, MYSQLI_ASSOC)){
                //        if($resultEenergy["Unit"] === 'เกิน'){
                //        ?>
                //        parseInt(<?php //echo($resultEenergy["Eenergy"])?>//),
                //        <?php
                //        }else{
                //        ?>
                //        parseInt(<?php //echo $mon ?>//),
                //        <?php
                //        }
                //        ?>
                <!--        --><?php
                //        }
                //        ?>
                //        parseInt(<?php //echo $mon ?>//),
                //        <?php
                //        }
                //        ?>
                //    ],
                //    color: '#991715'
                //}
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
