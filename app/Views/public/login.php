<?= $this->extend("public/layouts/master") ?>

<?= $this->section("content") ?>
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-8 offset-md-2">

                <!-- Login Tab Content -->
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 col-lg-6 login-left">
                            <img src="<?php echo base_url('assets/base/img/login-banner.png') ?>" class="img-fluid" alt="Doccure Login">
                        </div>
                        <div class="col-md-12 col-lg-6 login-right">
                            <div class="login-header">
                                <h3>Login <span>Doccure</span></h3>
                            </div>
                            <?php $validation =  \Config\Services::validation(); ?>
                            <form action="<?php echo base_url("login") ?>" method="post">
                                <div class="form-group form-focus">
                                    <input type="email" class="form-control floating <?php echo ($validation->hasError('email')) ? 'is-invalid' : '' ?>" name="email">
                                    <label class="focus-label">Email</label>
                                    <?php if ($validation->hasError('email')) {
                                        echo "<span class='invalid-feedback'>" . $validation->getError('email') . "</span>";
                                    } ?>
                                </div>
                                <div class="form-group form-focus">
                                    <input type="password" class="form-control floating <?php echo ($validation->hasError('password')) ? 'is-invalid' : '' ?>" name="password">
                                    <label class="focus-label">Password</label>
                                    <?php if ($validation->hasError('password')) {
                                        echo "<span class='invalid-feedback'>" . $validation->getError('password') . "</span>";
                                    } ?>
                                </div>
                                <div class="text-right">
                                    <a class="forgot-link" href="">Forgot Password ?</a>
                                </div>
                                <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
                                <div class="login-or">
                                    <span class="or-line"></span>
                                    <span class="span-or">or</span>
                                </div>
                                <div class="row form-row social-login">
                                    <div class="col-6">
                                        <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
                                    </div>
                                </div>
                                <div class="text-center dont-have">Don’t have an account? <a href="<?php echo route_to("signup") ?>">Register</a></div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Login Tab Content -->

            </div>
        </div>

    </div>

</div>
<?= $this->endsection() ?>