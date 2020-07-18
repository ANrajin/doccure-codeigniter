<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Styles -->
    <?= $this->include('admin/assets/styles') ?>

    <!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Header -->
        <?= $this->include('admin/components/header') ?>
        <!-- /Header -->

        <!-- Sidebar -->
        <?= $this->include('admin/components/sidebar') ?>
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <?php $this->renderSection('content'); ?>
        </div>
        <!-- /Page Wrapper -->
    </div>
    <!-- /Main Wrapper -->


    <!-- scripts -->
    <?= $this->include('admin/assets/scripts') ?>
</body>

</html>