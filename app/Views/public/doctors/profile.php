<?= $this->extend("public/layouts/master") ?>

<?= $this->section("doctor") ?>
<form action="" method="post" enctype="multipart/form-data">
    <!-- Basic Information -->
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Basic Information</h4>
            <div class="row form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="change-avatar">
                            <div class="profile-img">
                                <img src="<?php echo base_url('assets/base/img/doctors/doctor-thumb-02.jpg') ?>" alt="User Image">
                            </div>
                            <div class="upload-img">
                                <div class="change-photo-btn">
                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                    <input type="file" class="upload" name="image">
                                </div>
                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="<?php echo (isset($profile)) ? $profile->user_name : '' ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" value="<?php echo (isset($profile)) ? $profile->email : '' ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>First Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="fname" value="<?php echo (isset($profile)) ? $profile->first_name : '' ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Last Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="lname" value="<?php echo (isset($profile)) ? $profile->last_name : '' ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo (isset($profile)) ? $profile->phone : '' ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control select" name="gender">
                            <option label="select">Select</option>
                            <option value="male" <?php if (isset($profile) && ($profile->gender === 'male')) {
                                                        echo 'selected';
                                                    } ?>>Male</option>
                            <option value="female" <?php if (isset($profile) && ($profile->gender === 'female')) {
                                                        echo 'selected';
                                                    } ?>>Female</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Basic Information -->

    <!-- Contact Details -->
    <div class="card contact-card">
        <div class="card-body">
            <h4 class="card-title">Contact Details</h4>
            <div class="row form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" value="<?php echo (isset($profile) ? $profile->address : '') ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Postal Code</label>
                        <input type="text" class="form-control" name="pcode" value="<?php echo (isset($profile) ? $profile->postal_code : '') ?>">
                    </div>
                </div>
                <div class=" col-md-6">
                    <div class="form-group">
                        <select class="form-control" name="division" id="division">
                            <option>-- Select Division --</option>
                            <?php foreach ($division->getResult() as $item) {
                            ?>
                                <option value="<?php echo $item->division_id ?>" <?php if (isset($profile) && ($profile->division_id == $item->division_id)) {
                                                                                        echo 'selected';
                                                                                    } ?>><?php echo $item->division ?></option>
                            <?php
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-control" name="district" id="district" disabled>
                            <option>-- Select District --</option>
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
                </div>
            </div>
        </div>
    </div>
    <!-- /Contact Details -->

    <!-- Services and Specialization -->
    <div class="card services-card">
        <div class="card-body">
            <h4 class="card-title">Services and Specialization</h4>
            <div class="form-group mb-0">
                <label>Specialization </label>
                <select name="speciality[]" id="speciality" class="form-control" data-placeholder="Select your speciality" multiple>
                    <?php foreach ($specializations->getResult() as $specialization) {
                    ?>
                        <option value="<?php echo $specialization->speciality_id ?>"><?php echo $specialization->speciality ?></option>
                    <?php
                    } ?>
                </select>
            </div>
        </div>
    </div>
    <!-- /Services and Specialization -->

    <div class="submit-section submit-btn-bottom">
        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
    </div>
</form>
<?= $this->endsection() ?>