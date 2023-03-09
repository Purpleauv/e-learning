<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark2">

        <a href="index.php" class="logo">
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
                    <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
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
                    <!-- $teacher must have value -->
                    <?php if(isset($teacher)) { ?>
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <img src=<?php echo $teacher["picture"] ?>
                                alt=<?php echo 'A picture of ' . $teacher["name"] ?>
                                class="avatar-img rounded-circle">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg"><img src=<?php echo $teacher["picture"] ?>
                                            alt=<?php echo 'A picture of ' . $teacher["name"] ?>
                                            class="avatar-img rounded"></div>
                                    <div class="u-text">
                                        <h4><?php echo $teacher["name"]; ?></h4>
                                        <p class="text-muted"><?php echo $teacher["email"]; ?></p><a href="profile.html"
                                            class="btn btn-xs btn-secondary btn-sm">View
                                            Profile</a>
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
                    <?php } ?>

                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>