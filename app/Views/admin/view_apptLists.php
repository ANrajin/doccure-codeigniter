<?= $this->extend("admin/layouts/master") ?>
<?= $this->section("content") ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Appointment List</h4>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="datatable table table-stripped">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>SL</th>
                                <th>UN_ID</th>
                                <th>Appt_id</th>
                                <th>Doctor Name</th>
                                <th>Patient Name</th>
                                <th>Appointment Date</th>
                                <th>Schedule</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            if (isset($apptLists)) {
                                foreach ($apptLists->getResult() as $appt) {
                            ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo base_url("admin/remove-appt") . '/' . $appt->id ?>" class="btn btn-sm bg-danger-light">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                        <td><?php echo $i++; ?></td>
                                        <td>#<?php echo $appt->id ?></td>
                                        <td><?php echo $appt->appt_id ?></td>
                                        <td><?php echo $appt->first_name ?></td>
                                        <td><?php echo $appt->patient_name ?></td>
                                        <td><?php echo $appt->appointment_date ?></td>
                                        <td><?php echo $appt->day ?>&nbsp;(<?php echo $appt->s_time . "-" . $appt->e_time; ?>)</td>
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