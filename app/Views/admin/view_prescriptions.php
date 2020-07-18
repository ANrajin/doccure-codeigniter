<?= $this->extend("admin/layouts/master") ?>
<?= $this->section("content") ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Prescriptions List</h4>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="datatable table table-stripped">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>SL</th>
                                <th>UN_ID</th>
                                <th>Appt. ID</th>
                                <th>Prescription ID</th>
                                <th>Doctor Name</th>
                                <th>Patient Name</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            if (isset($prescriptions)) {
                                foreach ($prescriptions as $prescription) {
                            ?>
                                    <tr>
                                        <td>
                                            <button type="button" class="btn text-info print" data-id="<?php echo $prescription->id ?>">
                                                <i class="fa fa-print"></i>
                                            </button>
                                            <script>
                                                $(document).ready(function() {
                                                    $(".print").click(function(e) {
                                                        e.preventDefault();

                                                        var id = $(this).data('id');

                                                        $.ajax({
                                                            url: "<?php echo base_url("admin/print-prescription") ?>" + "/" + id,
                                                            method: "GET",
                                                            dataType: "html",
                                                            success: function(data) {
                                                                w = window.open(window.location.href, "_blank");
                                                                w.document.open();
                                                                w.document.write(data);
                                                                w.document.close();
                                                                w.window.print();
                                                            }
                                                        })
                                                    })
                                                })
                                            </script>
                                        </td>
                                        <td><?php echo $i++; ?></td>
                                        <td>#<?php echo $prescription->id ?></td>
                                        <td><?php echo $prescription->appt_id ?></td>
                                        <td><?php echo $prescription->unique_id ?></td>
                                        <td><?php echo $prescription->first_name ?></td>
                                        <td><?php echo $prescription->patient_name ?></td>
                                        <td><?php echo $prescription->created_at ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection() ?>