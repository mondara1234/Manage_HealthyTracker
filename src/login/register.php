<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--  ให้รองรับและ แสดงหน้าตา ใน IE=edge ได้โดยไม่ผิดเพี้ยน-->
    <!-- กำหนดขนาด initial-scale=1.0 = เพื่อไม่ให้  Safari Zoom -->
    <meta name="viewport" content="width=device-width, initial-scale=1">  <!--  device-width = “ขนาด” ของ device นั้นๆ-->
    <meta name="description" content="">  <!--  บอกรายละเอียดของเว็บเพจแบบคร่าวๆ-->
    <meta name="author" content=""> <!-- ผู้เขียนหน้านี้ -->
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/LogoHT.png">

    <!-- Custom CSS -->
    <link href="../assets/dist/css/icons/font-awesome/css/fontawesome-all.min.css" rel="stylesheet">
    <link href="../assets/dist/css/style.min.css" rel="stylesheet">
    <link href="../assets/dist/css/styleCommon.css" rel="stylesheet">
	<title> สมัครผู้ดูแลระบบ </title>
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0;
        }
    </style>
</head>
<body style="background-image: url('../assets/images/background/bg_web.png'); background-size: 100% 100%;">
    <form name="add" method="post" action="../Database/InsertAdmin.php" enctype="multipart/form-data" target="iframe_target">
        <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
        <p style="margin-left: 30%; margin-top: 2%">
            <font  size="20" color="white">ลงทะเบียน</font>
        </p>
        <div
                class="row justify-content-between"
                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 100%"
        >
            <div style="margin-left: 18%">
                <div style="margin-top: 124%;">
                    <font Face="Monotype Corsiva" size="25" color="black">The</font>
                </div>
                <div style="margin-top: -25%; margin-left: 5%">
                    <font Face="Monotype Corsiva" size="25" color="black">Healthy</font>
                </div>
                <div style="margin-top: -25%; margin-left: 40%" class="hex">
                    <font Face="Monotype Corsiva" size="25" color="#068e81">Tracker</font>
                </div>
            </div>
            <div>
                <table cellpadding="5">
                    <tr>
                        <td align="right" class="font-18" style="color: black">ชื่อผู้ใช้ :</td>
                        <td> <input name="txtUsername" type="text" id="txtUsername"> </td>
                    </tr>
                    <tr>
                        <td align="right" class="font-18" style="color: black">อีเมล :</td>
                        <td> <input name="txtEmail" type="email" id="txtEmail"> </td>
                    </tr>
                    <tr>
                        <td align="right" class="font-18" style="color: black">รหัสผ่าน :</td>
                        <td> <input name="txtPassword" type="password" id="txtPassword"> </td>
                    </tr>
                    <tr>
                        <td align="right" class="font-18" style="color: black">ยืนยันรหัสผ่าน :</td>
                        <td> <input name="txtConfirmPassword" type="password" id="txtConfirmPassword"> </td>
                    </tr>
                    <tr>
                        <td align="right" class="font-18" style="color: black">ชื่อจริง :</td>
                        <td> <input name="txtFirst_name" type="text" id="txtFirst_name"> </td>
                    </tr>
                    <tr>
                        <td align="right" class="font-18" style="color: black">นามสกุล :</td>
                        <td> <input name="txtLast_Name" type="text" id="txtLast_Name"> </td>
                    </tr>
                    <tr>
                        <td align="right" valign="top" class="font-18" style="color: black">ที่อยู่ :</td>
                        <td> <textarea rows="4" cols="30" name="txtAddress" id="txtAddress"></textarea></td>
                    </tr>
                    <tr>
                        <td align="right" class="font-18" style="color: black">เบอร์โทรศัพท์ :</td>
                        <td> <input name="txtTelephone" type="number" id="txtTelephone" maxlength="10"> </td>
                    </tr>
                    <tr>
                        <td align="right" class="font-18" style="color: black">รูปโปรไฟล์ :</td>
                        <td> <input name="txtImgProfile" type="file" id="txtImgProfile" style="color: black"> </td>
                    </tr>
                    <input type="hidden" name="date" id="date" value="<?php echo date('Y-m-d');?>"/>
                </table>
                <div  style="margin-left: 40%; margin-top: 5%">
                    <button type="submit" name="Submit" class="font-18"
                            style="width: 60%; height: 40px; color: white; background: #068e81; border-color: white"
                    >
                        ลงทะเบียน
                    </button>
                </div>
                <div style="margin-left: 30%; margin-top: 5%">
                    <label class="font-16" style="color: black">คุณมีบัญชีหรือยัง ?</label>
                    <a href="login.html" class="font-18" style="margin-left: 5%; color: white">Login</a>
                </div>
            </div>
        </div>
    </form>
</body>
</html>