<?= $this->extend("public/layouts/master") ?>
<?= $this->section("content") ?>
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-8 offset-md-2">

                <!-- Register Content -->
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 col-lg-6 login-left">
                            <img src="<?php echo base_url('assets/base/img/login-banner.png') ?>" class="img-fluid" alt="Doccure Register">
                        </div>
                        <div class="col-md-12 col-lg-6 login-right">
                            <div class="login-header">
                                <h3>Patient Register</h3>
                            </div>

                            <!-- Register Form -->
                            <?php $validation =  \Config\Services::validation(); ?>
                            <form action="<?php echo base_url("register") ?>" method="post">
                                <div class="form-group form-focus">
                                    <input type="text" class="form-control floating <?php echo ($validation->hasError('name')) ? 'is-invalid' : '' ?>" name="name" value="<?php echo set_value('name') ?>">
                                    <label class="focus-label">Name</label>
                                    <?php if ($validation->hasError('name')) {
                                        echo "<span class='invalid-feedback'>" . $validation->getError('name') . "</span>";
                                    } ?>
                                </div>
                                <div class="form-group form-focus">
                                    <input type="email" class="form-control floating <?php echo ($validation->hasError('email')) ? 'is-invalid' : '' ?>" name="email">
                                    <label class="focus-label">Email</label>
                                    <?php if ($validation->hasError('email')) {
                                        echo "<span class='invalid-feedback'>" . $validation->getError('email') . "</span>";
                                    } ?>
                                </div>
                                <div class="form-group form-focus">
                                    <input type="text" class="form-control floating <?php echo ($validation->hasError('mobile')) ? 'is-invalid' : '' ?>" name="mobile" value="<?php echo set_value('mobile') ?>">
                                    <label class="focus-label">Mobile Number</label>
                                    <?php if ($validation->hasError('mobile')) {
                                        echo "<span class='invalid-feedback'>" . $validation->getError('mobile') . "</span>";
                                    } ?>
                                </div>
                                <div class="form-group form-focus">
                                    <input type="password" class="form-control floating <?php echo ($validation->hasError('password')) ? 'is-invalid' : '' ?>" name="password">
                                    <label class="focus-label">Create Password</label>
                                    <?php if ($validation->hasError('password')) {
                                        echo "<span class='invalid-feedback'>" . $validation->getError('password') . "</span>";
                                    } ?>
                                </div>
                                <div class="form-group form-focus">
                                    <input type="password" class="form-control floating <?php echo ($validation->hasError('confirm')) ? 'is-invalid' : '' ?>" name="confirm">
                                    <label class="focus-label">Confirm Password</label>
                                    <?php if ($validation->hasError('confirm')) {
                                        echo "<span class='invalid-feedback'>" . $validation->getError('confirm') . "</span>";
                                    } ?>
                                </div>
                                <!-- <div class="form-group">
                                    <select class="form-control" name="division" id="division">
                                        <option>-- Select Division --</option>
                                        <?php foreach ($division->getResult() as $item) {
                                        ?>
                                            <option value="<?php echo $item->division_id ?>"><?php echo $item->division ?></option>
                                        <?php
                                        } ?>
                                    </select>
                                    <script>
                                        $(document).ready(function() {
                                            $("#division").on("change", function() {
                                                var id = $(this).val();

                                                $.ajax({
                                                    url: "<?php echo base_url() . '/division/' ?>" + id,
                                                    method: "POST",
                                                    dataType: "json",
                                                    data: {
                                                        $id: id
                                                    },
                                                    success: function(data) {
                                                        var html = "";
                                                        for (var index in data) {
                                                            html += "<option value='" + data[index]['district_id'] + "'>" + data[index]['district'] + "</option>";
                                                        }
                                                        $("#district").html(html);
                                                        $("#district").prop("disabled", false);
                                                    }
                                                })
                                            });
                                        });
                                    </script>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="district" id="district" disabled>
                                        <option>-- Select District --</option>
                                    </select>
                                </div> -->
                                <div class="text-right">
                                    <a class="forgot-link" href="<?php echo route_to("login") ?>">Already have an account?</a>
                                </div>
                                <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
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
                            </form>
                            <!-- /Register Form -->

                        </div>
                    </div>
                </div>
                <!-- /Register Content -->

            </div>
        </div>

    </div>

</div>
<?= $this->endsection() ?>