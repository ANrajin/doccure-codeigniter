<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="">
                    <a href="<?php echo base_url('admin/dashboard') ?>"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/doctors') ?>"><i class="fa fa-user-md"></i> <span>Doctors</span></a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/patients') ?>"><i class="fe fe-user"></i> <span>Patients</span></a>
                </li>
                <li>
                    <a href="<?php echo base_url("admin/prescriptions") ?>"><i class="fe fe-file"></i> <span>Prescriptions</span></a>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0)">
                        <i class="fe fe-layout"></i> <span>Appointments</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a href="<?php echo base_url("admin/appointment") ?>">Create New</a></li>
                        <li><a href="<?php echo base_url("admin/appt-list") ?>">Appointment Lists</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0)">
                        <i class="fa fa-medkit"></i> <span>Medicines</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a href="<?php echo base_url('admin/medicines') ?>">Medicines</a></li>
                        <li><a href="<?php echo base_url('admin/medicine-category') ?>">Medicine Category</a></li>
                        <li><a href="<?php echo base_url('admin/medicine-manufacturer') ?>">Manufacturer</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0)">
                        <i class="fe fe-activity"></i> <span>Invoice</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a href="<?php echo base_url('admin/invoice') ?>">Generate Invoice</a></li>
                        <li><a href="">Transactions</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0)">
                        <i class="fe fe-vector"></i> <span>HR Management</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a href="<?php echo base_url('admin/manage-users') ?>">User Management</a></li>
                        <li><a href="<?php echo base_url('admin/user-roles') ?>">User Roles</a></li>
                        <li><a href="<?php echo base_url('admin/doctors-payment') ?>">Doctor's Payment</a></li>
                    </ul>
                </li>

                <!-- <li>
                    <a href="specialities.html"><i class="fe fe-users"></i> <span>Specialities</span></a>
                </li> -->
                <!-- 
                <li>
                    <a href="reviews.html"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
                </li>
                <li>
                    <a href="transactions-list.html"><i class="fe fe-activity"></i> <span>Transactions</span></a>
                </li>
                <li>
                    <a href="settings.html"><i class="fe fe-vector"></i> <span>Settings</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Reports</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoice-report.html">Invoice Reports</a></li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>Pages</span>
                </li>
                <li>
                    <a href="profile.html"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="login.html"> Login </a></li>
                        <li><a href="register.html"> Register </a></li>
                        <li><a href="forgot-password.html"> Forgot Password </a></li>
                        <li><a href="lock-screen.html"> Lock Screen </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-warning"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="error-404.html">404 Error </a></li>
                        <li><a href="error-500.html">500 Error </a></li>
                    </ul>
                </li>
                <li>
                    <a href="blank-page.html"><i class="fe fe-file"></i> <span>Blank Page</span></a>
                </li>
                <li class="menu-title">
                    <span>UI Interface</span>
                </li>
                <li>
                    <a href="components.html"><i class="fe fe-vector"></i> <span>Components</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-layout"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="form-basic-inputs.html">Basic Inputs </a></li>
                        <li><a href="form-input-groups.html">Input Groups </a></li>
                        <li><a href="form-horizontal.html">Horizontal Form </a></li>
                        <li><a href="form-vertical.html"> Vertical Form </a></li>
                        <li><a href="form-mask.html"> Form Mask </a></li>
                        <li><a href="form-validation.html"> Form Validation </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="tables-basic.html">Basic Tables </a></li>
                        <li><a href="data-tables.html">Data Table </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fe fe-code"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="submenu">
                            <a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"> <span>Level 1</span></a>
                        </li>
                    </ul>
                </li> -->
            </ul>
        </div>
    </div>
</div>