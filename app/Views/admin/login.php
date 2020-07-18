<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/bootstrap.min.css'); ?>">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/font-awesome.min.css'); ?>">

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/style.css'); ?>">

    <!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>
    <?php $validation =  \Config\Services::validation(); ?>
    <!-- Main Wrapper -->
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="<?php echo base_url('assets/admin/img/logo-white.png'); ?>" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to your dashboard</p>
                            <!-- Form -->
                            <form action="<?php echo base_url('admin'); ?>" method="post">
                                <?= csrf_field() ?>
                                <div class="form-group">
                                    <input class="form-control <?php echo ($validation->hasError('email')) ? 'is-invalid' : '' ?>" type="email" name="email" placeholder="Email">
                                    <?php if ($validation->hasError('email')) {
                                        echo "<span class='invalid-feedback'>" . $validation->getError('email') . "</span>";
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control <?php echo ($validation->hasError('password')) ? 'is-invalid' : '' ?>" type="password" name="password" placeholder="Password">
                                    <?php if ($validation->hasError('password')) {
                                        echo "<span class='invalid-feedback'>" . $validation->getError('password') . "</span>";
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                                </div>
                            </form>
                            <!-- /Form -->

                            <div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/admin/js/jquery-3.2.1.min.js'); ?>"></script>

    <!-- Bootstrap Core JS -->
    <script src="<?php echo base_url('assets/admin/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/js/bootstrap.min.js'); ?>"></script>

    <!-- Custom JS -->
    <script src="<?php echo base_url('assets/admin/js/script.js'); ?>"></script>

</body>

</html>