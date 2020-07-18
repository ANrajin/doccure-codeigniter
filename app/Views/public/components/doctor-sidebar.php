                <div class="profile-sidebar">
                    <div class="widget-profile pro-widget-content">
                        <div class="profile-info-widget">
                            <a href="#" class="booking-doc-img">
                                <img src="<?php echo base_url('assets/base/img/doctors/doctor-thumb-02.jpg') ?>" alt="User Image">
                            </a>
                            <div class="profile-det-info">
                                <h3>Dr. Darren Elder</h3>

                                <div class="patient-details">
                                    <h5 class="mb-0">BDS, MDS - Oral & Maxillofacial Surgery</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-widget">
                        <nav class="dashboard-menu">
                            <ul>
                                <li class="">
                                    <a href="<?php echo base_url("doctor"); ?>">
                                        <i class="fas fa-columns"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <?php if (session('status') !== 'unverified') { ?>
                                    <li>
                                        <a href="<?php echo base_url("doctor-profile") ?>">
                                            <i class="fas fa-user-cog"></i>
                                            <span>Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("prescriptions"); ?>">
                                            <i class="fas fa-file-invoice"></i>
                                            <span>Prescriptions</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="fas fa-user-injured"></i>
                                            <span>My Patients</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?php echo base_url("schedule-timings"); ?>">
                                            <i class="fas fa-hourglass-start"></i>
                                            <span>Schedule Timings</span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                </div>