<?= $this->extend("public/layouts/master") ?>

<?= $this->section('patient') ?>
<h4>Available Doctors</h4>
<div class="row row-grid">
    <?php foreach ($doctors->getResult() as $doctor) { ?>
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="profile-widget">
                <div class="doc-img">
                    <a href="">
                        <img class="img-fluid" alt="User Image" src="<?php echo base_url("images") . "/" . $doctor->image ?>">
                    </a>
                    <a href="javascript:void(0)" class="fav-btn">
                        <i class="far fa-bookmark"></i>
                    </a>
                </div>
                <div class="pro-content">
                    <h3 class="title">
                        <a href=""><?php echo $doctor->first_name ?>&nbsp;<?php echo $doctor->last_name ?></a>
                        <i class="fas fa-check-circle verified"></i>
                    </h3>
                    <?php if (isset($specialities)) { ?>
                        <?php foreach ($specialities->getResult() as $speciality) { ?>
                            <?php if ($speciality->doctor_id == $doctor->id) { ?>
                                <span class="badge badge-info"><?php echo $speciality->speciality ?></span>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                    <div class="rating">
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <span class="d-inline-block average-rating">(17)</span>
                    </div>
                    <div class="row row-sm">
                        <div class="col-6">
                            <a href="" class="btn book-btn">Request Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?= $this->endsection() ?>