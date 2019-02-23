<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="assets/libs/datetimepicker/jquery.datetimepicker.css">
    <style type="text/css">
        #startDate,
        #endDate{
            text-align:center;
            width:100px;
        }
        #startTime,
        #endTime{
            text-align:center;
            width:70px;
        }
    </style>
</head>
<body>

<br><br>
<div style="margin:auto;width:500px;">
    From
    <input type="text" name="startDate" id="startDate" value="">
    Time: <input type="text" name="startTime" id="startTime" value="">
    <br><br>
    To &nbsp;&nbsp;
    <input type="text" name="endDate" id="endDate" value="">
    Time: <input type="text" name="endTime" id="endTime" value="">
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<!--<script src="js/jquery-1.8.3.min.js"></script>    -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js"></script>
<script type="text/javascript">
    $(function(){


        var optsDate = {
            format:'Y-m-d', // รูปแบบวันที่
            formatDate:'Y-m-d',
            timepicker:false,
            closeOnDateSelect:true,
        }
        var optsTime = {
            format:'H:i', // รูปแบบเวลา
            step:30,  // step เวลาของนาที แสดงค่าทุก 30 นาที
            formatTime:'H:i',
            datepicker:false,
        }
        var setDateFunc = function(ct,obj){
            var minDateSet = $("#startDate").val();
            var maxDateSet = $("#endDate").val();

            if($(obj).attr("id")=="startDate"){
                this.setOptions({
                    minDate:false,
                    maxDate:maxDateSet?maxDateSet:false
                })
            }
            if($(obj).attr("id")=="endDate"){
                this.setOptions({
                    maxDate:false,
                    minDate:minDateSet?minDateSet:false
                })
            }
        }

        var setTimeFunc = function(ct,obj){
            var minDateSet = $("#startDate").val();
            var maxDateSet = $("#endDate").val();
            var minTimeSet = $("#startTime").val();
            var maxTimeSet = $("#endTime").val();

            if(minDateSet!=maxDateSet){
                minTimeSet = false;
                maxTime = false;
            }

            if($(obj).attr("id")=="startTime"){
                this.setOptions({
                    maxDate:maxDateSet?maxDateSet:false,
                    minTime:false,
                    maxTime:maxTimeSet?maxTimeSet:false
                })
            }
            if($(obj).attr("id")=="endTime"){
                this.setOptions({
                    minDate:minDateSet?minDateSet:false,
                    maxTime:false,
                    minTime:minTimeSet?minTimeSet:false
                })
            }
        }

        $("#startDate,#endDate").datetimepicker($.extend(optsDate,{
            onShow:setDateFunc,
            onSelectDate:setDateFunc,
        }));

        $("#startTime,#endTime").datetimepicker($.extend(optsTime,{
            onShow:setTimeFunc,
            onSelectTime:setTimeFunc,
        }));



    });
</script>


</body>
</html>