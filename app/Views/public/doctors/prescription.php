<?= $this->extend("public/layouts/master") ?>

<?= $this->section("doctor") ?>
<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/base/css/bootstrap-datetimepicker.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/base/plugins/jquery-ui-1.12.1/jquery-ui.min.css') ?>">
<form action="<?php echo base_url("prescriptions") ?>" method="post">
    <div class="row">
        <div class="col-md-5">
            <div class="card border">
                <div class="card-header bg-info-light">Prescription</div>
                <div class="card-body p-2">
                    <div class="row form-group mb-0">
                        <div class="col-md-4">
                            <?php

                            use App\Helpers\Random;

                            ?>
                            <input type="text" class="form-control" name="presc_id" placeholder="Prescription id" value="Presc#<?php echo Random::numeric("4") ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Appt. id" id="appt_id" name="appt_id">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="search">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control datetimepicker" placeholder="Date" name="date">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Patient Name" id="patient">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" placeholder="Age">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <select class="select">
                                <option label="">Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="select">
                                <option>Blood Group</option>
                                <option value="1">A+</option>
                                <option value="2">O+</option>
                                <option value="3">B+</option>
                                <option value="4">AB+</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" placeholder="Mobile Number" id="number">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Patient Address" id="address">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border">
                <div class="card-header bg-info-light">
                    Additional Advise
                </div>
                <div class="card-body p-0">
                    <div class="form-group m-0">
                        <textarea name="advise" class="form-control" rows="10" placeholder=" Additional advise for patient"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card border">
                <div class="card-header bg-info-light">Medicine</div>
                <div class="card-body p-0">
                    <table class="table-bordered mx-auto my-3" id="table">
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" class="w-100 border text-center" id="med" name="med[]" placeholder="Medicine">
                                </td>
                                <td>
                                    <input type="text" class="w-100 border text-center" name="dose[]" placeholder="0+0+0">
                                </td>
                                <td>
                                    <input type="text" class="w-100 border text-center" name="time[]" placeholder="before/after meal">
                                </td>
                                <td>
                                    <input type="text" class="w-100 border text-center" name="day[]" placeholder="days">
                                </td>
                                <td>
                                    <input type="text" class="w-100 border text-center" name="note[]" placeholder="notes">
                                </td>
                                <td>
                                    <button type="button" id="add" class="btn btn-sm btn-success">+</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card border">
                <div class="card-header bg-info-light">
                    Problems
                </div>
                <div class="card-body p-0">
                    <div class="form-group m-0">
                        <textarea name="complains" class="form-control" rows="5" placeholder="Patient main problems"></textarea>
                    </div>
                </div>
            </div>
            <div class="card border">
                <div class="card-header bg-info-light">
                    Test Notes
                </div>
                <div class="card-body p-0">
                    <div class="form-group m-0">
                        <textarea name="tests" class="form-control" rows="5" placeholder="Remarks for patient"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center py-5">
        <button type="submit" class="btn btn-sm btn-info mx-1">
            <i class="fa fa-edit"></i> Submit
        </button>
        <a href="<?php echo base_url("presc-list") ?>" class="btn btn-sm btn-warning mx-1">
            <i class="fa fa-list"></i> Prescriptions
        </a>
    </div>
</form>
<!-- Datetimepicker JS -->
<script src="<?php echo base_url('assets/base/js/moment.min.js') ?>"></script>
<script src="<?php echo base_url('assets/base/js/bootstrap-datetimepicker.min.js') ?>"></script>
<script src="<?php echo base_url('assets/base/plugins/jquery-ui-1.12.1/jquery-ui.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        //load medicines
        $.ajax({
            url: "<?php echo base_url("get-medicines") ?>",
            methos: "GET",
            dataType: "json",
            success: function(data) {
                var arr = new Array();

                for (var index in data) {
                    arr.push(data[index]['medicine']);
                }

                $("#med").autocomplete({
                    source: arr
                });
            }
        })


        var count = 1;
        $("#add").on("click", function() {
            count = count + 1;

            var row = "<tr class = 'row" + count + "'>";
            row += "<td><input type='text' class='w-100 border text-center' name='med[]' placeholder='Medicine'></td>";
            row += "<td><input type='text' class='w-100 border text-center' name='dose[]' placeholder='0+0+0'></td>";
            row += "<td><input type='text' class='w-100 border text-center' name='time[]' placeholder='before/after meal'></td>";
            row += "<td><input type='text' class='w-100 border text-center' name='day[]' placeholder='days'></td>";
            row += "<td><input type='text' class='w-100 border text-center' name='note[]' placeholder='notes'></td>";
            row += "<td><button type = 'button' data-row='row" + count + "' class='btn btn-sm btn-danger remove'>-</button></td>";
            row += "</tr>";

            $('#table').append(row);
        })

        $(document).on('click', '.remove', function() {
            var del = $(this).data('row');
            $('.' + del).remove();
        })

        /*
         *fetch data from appointment table
         */
        $("#search").on("click", function() {
            var appt_id = $("#appt_id").val();

            if (appt_id != "") {
                $.ajax({
                    url: "<?php echo base_url() . '/appt-info/' ?>" + appt_id,
                    method: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#patient").val(data['patient_name']);
                        $("#number").val(data['mobile']);
                        $("#address").val(data['address']);
                    }
                })
            } else {
                alert("Please insert appointment number");
            }
        })
    })
</script>
<?= $this->endsection() ?>