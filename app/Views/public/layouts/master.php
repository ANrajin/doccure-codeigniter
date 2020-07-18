<!DOCTYPE html>
<html lang="en">
<!-- doccure/  30 Nov 2019 04:11:34 GMT -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>Doccure</title>

    <!-- Favicons -->
    <link type="image/x-icon" href="assets/img/favicon.png" rel="icon" />

    <!-- styles -->
    <?= $this->include('public\assets\styles'); ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Header -->
        <?= $this->include('public\components\header'); ?>
        <!-- /Header -->
        <!-- main body -->
        <?php
        if (session()->get('isLoggedIn')) {
        ?>
            <!-- Page Content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3 col-lg-2 col-xl-2 theiaStickySidebar">
                            <?php
                            if (session()->get('userrole') === "Doctor") {
                            ?>
                                <?= $this->include('public\components\doctor-sidebar'); ?>
                            <?php
                            } elseif (session()->get('userrole') === "Patient") {
                            ?>
                                <?= $this->include('public\components\patient-sidebar'); ?>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-9 col-lg-10 col-xl-10">
                            <?php
                            if (session()->get('userrole') == "Doctor") {
                                $this->renderSection('doctor');
                            } elseif (session()->get('userrole') == "Patient") {
                                $this->renderSection('patient');
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Page Content -->
        <?php
        } else {
            $this->renderSection('content');
        }
        ?>
        <!-- /main body  -->
        <!-- Footer -->
        <?= $this->include('public\components\footer'); ?>
        <!-- /Footer -->
    </div>

    <!-- scripts -->
    <?= $this->include('public\assets\scripts'); ?>
</body>

<!-- doccure/  30 Nov 2019 04:11:53 GMT -->

</html>