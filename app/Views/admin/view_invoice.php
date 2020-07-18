<?= $this->extend("admin/layouts/master") ?>
<?= $this->section("content") ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4>Create Invoice</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url("admin/invoice") ?>" method="post">
                    <div class="row form-group">
                        <div class="col-md-6">
                            <?php

                            use App\Helpers\Random;

                            $number = Random::Numeric(6);
                            ?>
                            <label>Invoice ID</label>
                            <input type="text" class="form-control" name="inv_id" value="<?php echo $number ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label>Date</label>
                            <input type="text" class="form-control" name="inv_date" id="date" placeholder="Select Date" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label>Appointment ID</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" aria-describedby="basic-addon2" name="appt_id" id="appt_id" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="search" data-toggle="tooltip" data-placement="top" title="search patient">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
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
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label>Patient Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="col-md-6">
                            <label>Mobile Number</label>
                            <input type="text" class="form-control" name="mobile" id="mobile" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" id="address" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label>Payable Amount</label>
                            <input type="text" class="form-control" name="payable" id="payable" readonly required>
                        </div>
                        <div class="col-md-6">
                            <label>Payed Amount</label>
                            <input type="text" class="form-control" name="payed" required>
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

        $("#search").on("click", function() {
            var id = $("#appt_id").val();

            if (!id == "") {
                $.ajax({
                    url: "<?php echo base_url("admin/invoice-info") ?>" + "/" + id,
                    method: "GET",
                    dataType: "json",
                    success: function(data) {
                        if (data.status == 403) {
                            alert(data.message);
                        } else {
                            $("#name").val(data.patient_name);
                            $("#mobile").val(data.mobile);
                            $("#address").val(data.address);
                            $("#doctor").val(data.doctor_id).trigger('change');
                            $("#payable").val("BDT. " + data.payment + "/=");
                        }
                    }
                })
            } else {
                alert("Please insert appointment id");
            }
        })
    })
</script>
<?= $this->endsection() ?>