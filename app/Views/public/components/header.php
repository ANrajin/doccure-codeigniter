<header class="header">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <a href="<?php echo base_url(); ?>" class="navbar-brand logo">
                <img src="<?php echo base_url('assets/base/img/logo.png'); ?>" class="img-fluid" alt="Logo" />
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="" class="menu-logo">
                    <img src="<?php echo base_url('assets/base/img/logo.png'); ?>" class="img-fluid" alt="Logo" />
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav">
                <li class="active">
                    <a href="<?php echo base_url(); ?>">Home</a>
                </li>
                <li>
                    <a href="<?= route_to('system_admin') ?>" target="_blank">Admin</a>
                </li>
                <li class="login-link">
                    <a href="<?= route_to('login') ?>">Login / Signup</a>
                </li>
            </ul>
        </div>
        <ul class="nav header-navbar-rht">
            <li class="nav-item contact-item">
                <div class="header-contact-img">
                    <i class="far fa-hospital"></i>
                </div>
                <div class="header-contact-detail">
                    <p class="contact-header">Contact</p>
                    <p class="contact-info-header">+1 315 369 5943</p>
                </div>
            </li>
            <?php
            if (session()->get('isLoggedIn')) {
            ?>
                <!-- User Menu -->
                <li class="nav-item dropdown has-arrow logged-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="<?php echo base_url('assets/base/img/doctors/doctor-thumb-02.jpg') ?>" width="31" alt="Darren Elder">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="<?php echo base_url('assets/base/img/doctors/doctor-thumb-02.jpg') ?>" alt="User Image" class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6><?php echo session()->get('username') ?></h6>
                                <p class="text-muted mb-0"><?php echo session()->get('userrole') ?></p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="">Profile Settings</a>
                        <button type="submit" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout').submit();">Logout</button>
                        <form action="<?php echo base_url('logout') ?>" method="post" id="logout"></form>
                    </div>
                </li>
                <!-- /User Menu -->
            <?php
            } else {
            ?>
                <li class="nav-item">
                    <a class="nav-link header-login" href="<?= route_to('login') ?>">login / Signup
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    </nav>
</header>