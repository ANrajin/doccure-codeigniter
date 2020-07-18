<?= $this->extend("public/layouts/master") ?>

<?= $this->section("doctor") ?>
<div class="card">
    <div class="card-header">
        Prescription Lists
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="datatable table table-stripped">
                <thead>
                    <tr>
                        <th>Actions</th>
                        <th>SL: </th>
                        <th>UN_ID: </th>
                        <th>Presc No: </th>
                        <th>Appt. No: </th>
                        <th>Doctor Name</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;

                    if (isset($prescriptions)) {
                        foreach ($prescriptions->getResult() as $prescription) {
                    ?>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-sm btn-info">
                                        <i class="fa fa-print"></i> Print
                                    </button>
                                </td>
                                <td><?php echo $i++; ?></td>
                                <td>#<?php echo $prescription->id; ?></td>
                                <td><?php echo $prescription->unique_id; ?></td>
                                <td><?php echo $prescription->appt_id; ?></td>
                                <td><?php echo $prescription->first_name; ?></td>
                                <td><?php echo $prescription->created_at; ?></td>
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
<?= $this->endsection() ?>