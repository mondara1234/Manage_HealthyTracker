<html>
    <head>
        <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
    </head>
    <body>
        <div id="container" style="width: 100%; height: 100%; margin: 0 auto"></div>
        <script language="JavaScript">
            $(document).ready(function() {
                let chart = {
                    type: 'column'
                };
                let title = {
                    text: 'ข้อมูลการสมัครใช้งานระบบประจำเดือนนี้'
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
                    data: [5, 3, 4, 7, 2, 3, 4, 7, 2, 3, 4, 7]
                }, {
                    name: 'หญิง',
                    data: [2, 2, 3, 2, 1, 3, 4, 7, 2, 3, 4, 7]
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
