
<!-- Sidebar scroll-->
<aside class="left-sidebar " data-sidebarbg="skin5">
    <nav class="sidebar-nav ">
        <ul id="sidebarnav" class="p-t-30">
            <?php if($resultUser["Status"] === "admin"): ?>
                <li class="sidebar-item font-14">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../../Homepage.php?UserName=<?php echo($_GET["UserName"]); ?>" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">หน้าหลัก</span>
                    </a>
                </li>
                <li class="sidebar-item font-14">
                    <a class="sidebar-link waves-effect" href="../../ProfileUser/UserInformation.php?UserName=<?php echo($_GET["UserName"]); ?>" aria-expanded="false">
                        <i class="fa fa-user-secret"></i>
                        <span class="hide-menu"> ข้อมูลสมาชิก </span>
                    </a>
                </li>
                <li class="sidebar-item font-14">
                    <a class="sidebar-link has-arrow waves-effect" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-pencil"></i>
                        <span class="hide-menu"> การจัดการฐานข้อมูล </span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item font-14">
                            <a href="../../Manage_User/ManageMembers.php?UserName=<?php echo($_GET["UserName"]); ?>" class="sidebar-link">
                                <i class="fa fa-user-plus"></i>
                                <span class="hide-menu"> ฐานข้อมูล สมาชิก </span>
                            </a>
                        </li>
                        <li class="sidebar-item font-14">
                            <a href="../../Manage_DiaryUser/ManageDiary.php?UserName=<?php echo($_GET["UserName"]); ?>" class="sidebar-link">
                                <i class="mdi mdi-book-open-page-variant"></i>
                                <span class="hide-menu"> ฐานข้อมูล ไดอารี่อาหาร </span>
                            </a>
                        </li>
                        <li class="sidebar-item font-14">
                            <a href="../../Manage_Energy_Users/Manage_Energy_users.php?UserName=<?php echo($_GET["UserName"]); ?>" class="sidebar-link">
                                <i class="mdi mdi-engine-outline"></i>
                                <span class="hide-menu"> ฐานข้อมูล ส่วนต่างพลังงานผู้ใช้ </span>
                            </a>
                        </li>
                        <li class="sidebar-item font-14">
                            <a href="../../Manage_Food/ManageFood.php?UserName=<?php echo($_GET["UserName"]); ?>" class="sidebar-link">
                                <i class="mdi mdi-food"></i>
                                <span class="hide-menu"> ฐานข้อมูล รายการอาหาร </span>
                            </a>
                        </li>
                        <li class="sidebar-item font-14">
                            <a href="../../Manage_BMI/ManageBMI.php?UserName=<?php echo($_GET["UserName"]); ?>" class="sidebar-link">
                                <i class="mdi mdi-multiplication-box"></i>
                                <span class="hide-menu"> ฐานข้อมูล ดัชนีมวลกาย </span>
                            </a>
                        </li>
                        <li class="sidebar-item font-14">
                            <a href="../../Manage_Trick/ManageTips.php?UserName=<?php echo($_GET["UserName"]); ?>" class="sidebar-link">
                                <i class="mdi mdi-calendar-check"></i>
                                <span class="hide-menu"> ฐานข้อมูล เคล็ดลับ </span>
                            </a>
                        </li>
                        <li class="sidebar-item font-14">
                            <a href="../../Manage_Recommend/ManageRecommend.php?UserName=<?php echo($_GET["UserName"]); ?>" class="sidebar-link">
                                <i class="mdi mdi-comment"></i>
                                <span class="hide-menu"> ฐานข้อมูล คำแนะนำ </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item font-14">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../../../src/Responsible/Members_Responsible.php?UserName=<?php echo($_GET["UserName"]); ?>" aria-expanded="false">
                        <i class="fa fa-user-md"></i>
                        <span class="hide-menu p-r-10"> การดูแลสมาชิก </span>
                    </a>
                </li>
                <li class="sidebar-item font-14">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../../../src/Statistics_App/UserStatisticsApp.php?UserName=<?php echo($_GET["UserName"]); ?>" aria-expanded="false">
                        <i class="mdi mdi-chart-bar"></i>
                        <span class="hide-menu p-r-10"> สถิติการใช้งานระบบ </span>
                    </a>
                </li>
                <li class="sidebar-item font-14">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../../../src/Problems/Problems.php?UserName=<?php echo($_GET["UserName"]); ?>" aria-expanded="false">
                        <i class="mdi mdi-alert"></i>
                        <span class="hide-menu p-r-10"> การแจ้งปัญหา </span>
                        <span class="label label-danger"><?php echo($resultProblemapp['totalProblemapp']); ?></span>
                    </a>
                </li>
            <?php elseif($resultUser["Status"] === "superadmin"): ?>
                <li class="sidebar-item font-14">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../../Homepage.php?UserName=<?php echo($_GET["UserName"]); ?>" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">หน้าหลัก</span>
                    </a>
                </li>
                <li class="sidebar-item font-14">
                    <a class="sidebar-link waves-effect" href="../../ProfileUser/UserInformation.php?UserName=<?php echo($_GET["UserName"]); ?>" aria-expanded="false">
                        <i class="fa fa-user-secret"></i>
                        <span class="hide-menu"> ข้อมูลสมาชิก </span>
                    </a>
                </li>
                <li class="sidebar-item font-14">
                    <a class="sidebar-link has-arrow waves-effect" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-pencil"></i>
                        <span class="hide-menu"> การจัดการฐานข้อมูล </span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item font-14">
                            <a href="../../Manage_User/ManageMembers.php?UserName=<?php echo($_GET["UserName"]); ?>" class="sidebar-link">
                                <i class="fa fa-user-plus"></i>
                                <span class="hide-menu"> ฐานข้อมูล สมาชิก </span>
                            </a>
                        </li>
                        <li class="sidebar-item font-14">
                            <a href="../../Manage_DiaryUser/ManageDiary.php?UserName=<?php echo($_GET["UserName"]); ?>" class="sidebar-link">
                                <i class="mdi mdi-book-open-page-variant"></i>
                                <span class="hide-menu"> ฐานข้อมูล ไดอารี่อาหาร </span>
                            </a>
                        </li>
                        <li class="sidebar-item font-14">
                            <a href="../../Manage_Energy_Users/Manage_Energy_users.php?UserName=<?php echo($_GET["UserName"]); ?>" class="sidebar-link">
                                <i class="mdi mdi-engine-outline"></i>
                                <span class="hide-menu"> ฐานข้อมูล ส่วนต่างพลังงานผู้ใช้ </span>
                            </a>
                        </li>
                        <li class="sidebar-item font-14">
                            <a href="../../Manage_Food/ManageFood.php?UserName=<?php echo($_GET["UserName"]); ?>" class="sidebar-link">
                                <i class="mdi mdi-food"></i>
                                <span class="hide-menu"> ฐานข้อมูล รายการอาหาร </span>
                            </a>
                        </li>
                        <li class="sidebar-item font-14">
                            <a href="../../Manage_BMI/ManageBMI.php?UserName=<?php echo($_GET["UserName"]); ?>" class="sidebar-link">
                                <i class="mdi mdi-multiplication-box"></i>
                                <span class="hide-menu"> ฐานข้อมูล ดัชนีมวลกาย </span>
                            </a>
                        </li>
                        <li class="sidebar-item font-14">
                            <a href="../../Manage_Trick/ManageTips.php?UserName=<?php echo($_GET["UserName"]); ?>" class="sidebar-link">
                                <i class="mdi mdi-calendar-check"></i>
                                <span class="hide-menu"> ฐานข้อมูล เคล็ดลับ </span>
                            </a>
                        </li>
                        <li class="sidebar-item font-14">
                            <a href="../../Manage_Recommend/ManageRecommend.php?UserName=<?php echo($_GET["UserName"]); ?>" class="sidebar-link">
                                <i class="mdi mdi-comment"></i>
                                <span class="hide-menu"> ฐานข้อมูล คำแนะนำ </span>
                            </a>
                        </li>
                        <li class="sidebar-item font-14">
                            <a href="../../Manage_Admin/ManageAdmin.php?UserName=<?php echo($_GET["UserName"]); ?>" class="sidebar-link">
                                <i class="mdi mdi-run-fast"></i>
                                <span class="hide-menu"> ฐานข้อมูล ผู้ดูแลระบบ </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item font-14">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../../../src/Responsible/Show_Responsible_User.php?UserName=<?php echo($_GET["UserName"]); ?>" aria-expanded="false">
                        <i class="fa fa-user-md"></i>
                        <span class="hide-menu p-r-10"> การดูแลสมาชิก </span>
                    </a>
                </li>
                <li class="sidebar-item font-14">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../../../src/Statistics_App/UserStatisticsApp.php?UserName=<?php echo($_GET["UserName"]); ?>" aria-expanded="false">
                        <i class="mdi mdi-chart-bar"></i>
                        <span class="hide-menu p-r-10"> สถิติการใช้งานระบบ </span>
                    </a>
                </li>
                <li class="sidebar-item font-14">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../../../src/Permission/Permission.php?UserName=<?php echo($_GET["UserName"]); ?>" aria-expanded="false">
                        <i class="mdi mdi-key"></i>
                        <span class="hide-menu p-r-10"> การขออนุญาต </span>
                        <span class="label label-danger"><?php echo($resultAdminmanage['totalAdminmanage']); ?></span>
                    </a>
                </li>
                <li class="sidebar-item font-14">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../../../src/Problems/Problems.php?UserName=<?php echo($_GET["UserName"]); ?>" aria-expanded="false">
                        <i class="mdi mdi-alert"></i>
                        <span class="hide-menu p-r-10"> การแจ้งปัญหา </span>
                        <span class="label label-danger"><?php echo($resultProblemapp['totalProblemapp']); ?></span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</aside>
<header class="topbar " data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <!-- เป็นการสลับแถบด้านข้างจะแสดงเพียงบนโทรศัพท์ -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>
            <!-- ============================================================== -->
            <!-- ส่วนหัวข้อแถบเมนู -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="../../Homepage.php?UserName=<?php echo($_GET["UserName"]); ?>">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <img src="../../assets/images/LogoHT.png" alt="homepage" height="50" width="50" class="light-logo" />
                </b>
                <!-- Logo text -->
                <span class="logo-text">
                            <div class="light-logo" style="font-size: 20px;" > Healthy Tracker </div>
                        </span>
            </a>
            <!-- ============================================================== -->
            <!-- สลับที่มองเห็นได้เฉพาะบนอุปกรณ์เคลื่อนที่เท่านั้น -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti-more"></i>
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- กรอบทางช้าย -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                        <i class="mdi mdi-menu font-24"></i>
                    </a>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- กรอบทางขวา -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-right">
                <!-- ============================================================== -->
                <!-- ส่วนของรูป user  -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle" src="<?php echo ($resultUser["ImgProfile"]) ?>" alt="user" width="40" >
                        <span class="font-16 m-r-5 m-l-5"><?php echo ($resultUser["UserName"]) ?></span>
                        <span class=" fa fa-angle-down font-16"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../EditProfile/edit_Profile.php?UserName=<?php echo($_GET["UserName"]); ?>"><i class="ti-user m-r-5 m-l-5"></i> ข้อมูลส่วนตัว </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../login/login.html"><i class="fa fa-power-off m-r-5 m-l-5"></i> ออกจากระบบ </a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
</header>