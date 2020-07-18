<?= $this->extend("admin/layouts/master") ?>
<?= $this->section("content") ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4>Take Appointment</h4>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="patient" value="new" checked>
                                <label class="form-check-label" for="new">
                                    New Patient
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="patient" value="existing">
                                <label class="form-check-label" for="existing">
                                    Existing Patient
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <?php

                            use App\Helpers\Random;

                            $number = Random::Numeric(4);
                            ?>
                            <label>Appointment ID</label>
                            <input type="text" class="form-control" name="appt_id" value="<?php echo $number ?>" readonly>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label>Doctor Name</label>
                            <select id="doctor" class="form-control" name="doctor" data-placeholder="Select Doctor" required>
                                <option label="Select Doctor"></option>
                                <?php if (isset($doctors)) { ?>
                                    <?php foreach ($doctors->getResult() as $doctor) { ?>
                                        <option value="<?php echo $doctor->user_id ?>"><?php echo $doctor->first_name ?>&nbsp;<?php echo $doctor->last_name ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- <div class="col-md-6">
                            <label>Payment</label>
                            <input type="text" class="form-control" name="payment" readonly>
                        </div> -->
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label>Schedule</label>
                            <select id="schedule" class="form-control" name="schedule" required>
                                <option label="Select Doctor Schedule"></option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Appointment Date</label>
                            <input type="text" class="form-control" name="appt_date" id="date" placeholder="Select Date" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label>Patient Name</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" aria-describedby="basic-addon2" name="name" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="search" data-toggle="tooltip" data-placement="top" title="search existing patient" disabled>
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label>Mobile Number</label>
                            <input type="text" class="form-control" name="mobile" required>
                        </div>
                        <div class="col-md-6">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Select2 JS -->
<script src="<?php echo base_url('assets/base/plugins/select2/js/select2.min.js'); ?>"></script>

<!-- Datetimepicker JS -->
<script src="<?php echo base_url('assets/base/js/moment.min.js') ?>"></script>
<script src="<?php echo base_url('assets/base/js/bootstrap-datetimepicker.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        $('input:radio[name="patient"]').change(
            function() {
                if (this.checked && this.value == "existing") {
                    $("#search").attr("disabled", false);
                } else {
                    $("#search").attr("disabled", true);
                }
            });

        $("#doctor").select2();
        $('#date').datetimepicker({
            format: 'DD/MM/YYYY',
            icons: {
                up: "fas fa-chevron-up",
                down: "fas fa-chevron-down",
                next: 'fas fa-chevron-right',
                previous: 'fas fa-chevron-left'
            }
        });

        $("#doctor").change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo base_url("admin/get-schedule") . '/' ?>" + id,
                method: "GET",
                dataType: "json",
                success: function(data) {
                    var option = "";
                    for (index in data) {
                        option += "<option value = '" + data[index]['schedule_id'] + "'>" + data[index]['day'] + "(" + data[index]['s_time'] + "-" + data[index]['e_time'] + ")" + "</option>";
                    }

                    $("#schedule").html(option);
                }
            })
        })
    })
</script>
<?= $this->endsection() ?>