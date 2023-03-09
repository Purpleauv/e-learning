<?php
    include ('includes/admin_content.php');
    include ('../../includes/session.php');
    $total_student=total_student();
    $total_employee=total_employee();
    $total_users=$total_employee+$total_student;

    $total_vacant=total_vacant();
    $total_filled=total_filled();
    $total_sessions=$total_vacant+$total_filled;

    $total_stud_report=stud_report();
    $total_reported=$total_stud_report;
    // $total_emp_report=emp_report();
    // $total_reported=$total_stud_report+$total_emp_report;

    $feedbacks=feedback();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>E-Learning (BETA) Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="/E-Learning/assets/imgs/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="/E-Learning/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
    WebFont.load({
        google: {
            "families": ["Lato:300,400,700,900"]
        },
        custom: {
            "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                "simple-line-icons"
            ],
            urls: ['/E-Learning/assets/css/fonts.min.css']
        },
        active: function() {
            sessionStorage.fonts = true;
        }
    });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="/E-Learning/assets/css/admin_style.css">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="/E-Learning/assets/css/bootstrap.min.css">

</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark2">

                <a href="index.html" class="logo">
                    <img src="/E-Learning/assets/imgs/logo.png" alt="navbar brand" class="navbar-brand"
                        style="height:50px; width:150px">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark2">

                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <!-- <span class="notification">notification count(int)</span> -->
                            </a>
                            <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                <li>
                                    <div class="dropdown-title">You have # new notifcation</div>
                                </li>
                                <li>
                                    <div class="notif-scroll scrollbar-outer">
                                        <div class="notif-center">
                                            <a href="#">
                                                <div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        Notification Title<br>
                                                        Notification Message
                                                    </span>
                                                    <span class="time">Time</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a class="see-all" href="javascript:void(0);">See all notifications<i
                                            class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="/E-Learning/assets/imgs/dp.jpg" alt="..."
                                        class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg"><img src="/E-Learning/assets/imgs/dp.jpg"
                                                    alt="image profile" class="avatar-img rounded"></div>
                                            <div class="u-text">
                                                <h4>Jade Irvine Magpayo</h4>
                                                <p class="text-muted">magpayojade@gmail.com</p><a href="profile.html"
                                                    class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">My Profile</a>
                                        <a class="dropdown-item" href="#">Account Setting</a>
                                        <a class="dropdown-item" href="/E-Learning/system_php/logout.php">Logout</a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <img src="/E-Learning/assets/imgs/dp.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    Jade Irvine Magpayo
                                    <span class="user-level">Administrator</span>
                                </span>
                            </a>
                            <div class="clearfix"></div>
                            <div class="collapse in" id="collapseExample">
                                <ul class="nav">
                                    <li>
                                        <a href="#profile">
                                            <span class="link-collapse">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#edit">
                                            <span class="link-collapse">Edit Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#settings">
                                            <span class="link-collapse">Settings</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-primary">
                        <li class="nav-item active">
                            <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Components</h4>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#">
                                <i class="fas fa-layer-group"></i>
                                <p>Subjects</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#">
                                <i class="fas fa-pen-square"></i>
                                <p>Departments</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#accounts">
                                <i class="fas fa-table"></i>
                                <p>Manage Accounts</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="accounts">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="#">
                                            <span class="sub-item">Employee</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="manageStudAcc.php">
                                            <span class="sub-item">Student</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#maps">
                                <i class="fas fa-map-marker-alt"></i>
                                <p>Reports</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#maps">
                                <i class="fas fa-map-marker-alt"></i>
                                <p>Feedbacks</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h2 class="text-white pb-2 fw-bold">E-Learning </h2>
                                <h5 class="text-white op-7 mb-2">Dashboard</h5>
                            </div>
                            <div class="ml-md-auto py-2 py-md-0">
                                <div class="card">
                                    <h2 id="time" class="time"></h2>
                                    <h2 id="date" class="date"></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner mt--5">
                    <div class="row mt--2">
                        <div class="col-md-3">
                            <div class="card full-height">
                                <div class="card-body">
                                    <label for="total_users">
                                        <div class="card-title">Total Users: <?php echo $total_users?> </div>
                                    </label>
                                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                        <div class="px-2 pb-2 pb-md-0 text-center">
                                            <div class="count"><?php echo $total_student ?></div>
                                            <label for="total_stud">
                                                <h6 class="fw-bold mt-3 mb-0">Students</h6>
                                            </label><br>
                                        </div>
                                        <div class="px-2 pb-2 pb-md-0 text-center">
                                            <div class="count"><?php echo $total_employee ?></div>
                                            <label for="total_emp">
                                                <h6 class="fw-bold mt-3 mb-0">Employee</h6>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card full-height">
                                <div class="card-body">
                                <div class="card-title">Total Enrollees:<?php echo $total_sessions?> </div>
                                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                            <div class="count"><?php echo $total_vacant?></div>
                                            <label for="total_stud">
                                                <h6 class="fw-bold mt-3 mb-0">Vacant</h6>
                                            </label><br>
                                        </div>
                                        <div class="px-2 pb-2 pb-md-0 text-center">
                                            <div class="count"><?php echo $total_filled?></div>
                                            <label for="total_stud">
                                                <h6 class="fw-bold mt-3 mb-0">Filled</h6>
                                            </label><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card full-height">
                                <div class="card-body">
                                <div class="card-title">Total Reports:<?php echo $total_sessions?> </div>
                                <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                            <div class="count"><?php echo $total_vacant?></div>
                                            <label for="total_stud">
                                                <h6 class="fw-bold mt-3 mb-0">Student:</h6>
                                            </label><br>
                                        </div>
                                        <div class="px-2 pb-2 pb-md-0 text-center">
                                            <div class="count"><?php echo $total_filled?></div>
                                            <label for="total_stud">
                                                <h6 class="fw-bold mt-3 mb-0">Employee:</h6>
                                            </label><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card full-height">
                                <div class="card-body">
                                    <div class="card-title">Total Users</div>
                                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                        <div class="px-2 pb-2 pb-md-0 text-center">
                                            <div class="count">#</div>
                                            <h6 class="fw-bold mt-3 mb-0">Employee</h6>
                                        </div>
                                        <div class="px-2 pb-2 pb-md-0 text-center">
                                            <div class="count">#</div>
                                            <h6 class="fw-bold mt-3 mb-0">Students</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row row-card-no-pd">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row card-tools-still-right">
                                        <h4 class="card-title">Users Geolocation</h4>
                                        <div class="card-tools">
                                            <button class="btn btn-icon btn-link btn-primary btn-xs"><span
                                                    class="fa fa-angle-down"></span></button>
                                            <button
                                                class="btn btn-icon btn-link btn-primary btn-xs btn-refresh-card"><span
                                                    class="fa fa-sync-alt"></span></button>
                                            <button class="btn btn-icon btn-link btn-primary btn-xs"><span
                                                    class="fa fa-times"></span></button>
                                        </div>
                                    </div>
                                    <p class="card-category">
                                        Map of the distribution of users around the world</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="table-responsive table-hover table-sales">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="flag">
                                                                    <img src="/E-Learning/assets/img/flags/id.png"
                                                                        alt="indonesia">
                                                                </div>
                                                            </td>
                                                            <td>Indonesia</td>
                                                            <td class="text-right">
                                                                2.320
                                                            </td>
                                                            <td class="text-right">
                                                                42.18%
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flag">
                                                                    <img src="/E-Learning/assets/img/flags/us.png"
                                                                        alt="united states">
                                                                </div>
                                                            </td>
                                                            <td>USA</td>
                                                            <td class="text-right">
                                                                240
                                                            </td>
                                                            <td class="text-right">
                                                                4.36%
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flag">
                                                                    <img src="/E-Learning/assets/img/flags/au.png"
                                                                        alt="australia">
                                                                </div>
                                                            </td>
                                                            <td>Australia</td>
                                                            <td class="text-right">
                                                                119
                                                            </td>
                                                            <td class="text-right">
                                                                2.16%
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flag">
                                                                    <img src="/E-Learning/assets/img/flags/ru.png"
                                                                        alt="russia">
                                                                </div>
                                                            </td>
                                                            <td>Russia</td>
                                                            <td class="text-right">
                                                                1.081
                                                            </td>
                                                            <td class="text-right">
                                                                19.65%
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flag">
                                                                    <img src="/E-Learning/assets/img/flags/cn.png"
                                                                        alt="china">
                                                                </div>
                                                            </td>
                                                            <td>China</td>
                                                            <td class="text-right">
                                                                1.100
                                                            </td>
                                                            <td class="text-right">
                                                                20%
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flag">
                                                                    <img src="/E-Learning/assets/img/flags/br.png"
                                                                        alt="brazil">
                                                                </div>
                                                            </td>
                                                            <td>Brasil</td>
                                                            <td class="text-right">
                                                                640
                                                            </td>
                                                            <td class="text-right">
                                                                11.63%
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <footer class="footer">

            </footer>
        </div>


    </div>
    <!--   Core JS Files   -->
    <script src="/E-Learning/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="/E-Learning/assets/js/core/popper.min.js"></script>
    <script src="/E-Learning/assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="/E-Learning/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="/E-Learning/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="/E-Learning/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Atlantis JS -->
    <script src="/E-Learning/assets/js/atlantis.min.js"></script>

    <script>
    var today = new Date();
    var day = today.getDate();
    var month = today.getMonth() + 1;

    function appendZero(value) {
        return "0" + value;
    }

    function theTime() {
        var d = new Date();
        document.getElementById("time").innerHTML = d.toLocaleTimeString("en-US");
    }

    if (day < 10) {
        day = appendZero(day);
    }

    if (month < 10) {
        month = appendZero(month);
    }

    today = day + "/" + month + "/" + today.getFullYear();

    document.getElementById("date").innerHTML = today;

    var myVar = setInterval(function() {
        theTime();
    }, 1000);
    </script>
</body>

</html>