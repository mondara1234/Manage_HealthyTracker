<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
    <title>ajax ของง่ายถ้าใช้ jQuery</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#btn1").click(function(){
                $.get("get.php", {
                  data1: $("#txt1").val(),
                  data2: $("#txt2").val()
                },
                function(data){
                    $("#div1").html(data);
                }
            );

            });
        });
    </script>
</head>
<body>
<input type="text" id="txt1">
<input type="text" id="txt2">
<div id="div1"></div>
<input type="button" id="btn1" value="Load">
</body>
</html>