<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <!-- $teacher must have value -->
            <?php if(isset($teacher)){ ?>
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src=<?php echo $teacher["picture"] ?>
                        alt=<?php echo 'A picture of ' . $teacher["name"] ?> class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <span><?php echo $teacher["name"]; ?></span>
                            <span><?php echo $teacher["email"]; ?></span>

                            <span class="user-level"> <?php echo $user_level ?> </span>
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
            <?php } ?>
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
                                <a href="#">
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