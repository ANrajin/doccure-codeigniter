<?= $this->extend('admin/layouts/master') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                Add New Medicine
            </div>
            <div class="card-body">
                <?php $validation =  \Config\Services::validation(); ?>
                <?php
                if (isset($payment) && !empty($payment)) {
                ?>
                    <form action="<?php echo base_url('admin/update-doctor-payment') ?>" method="post">
                        <input type="hidden" name="payment_id" value="<?php echo $payment->id ?>">
                    <?php
                } else {
                    ?>
                        <form action="<?php echo base_url('admin/add-doctor-payment') ?>" method="post">
                        <?php
                    }
                        ?>
                        <div class="form-group">
                            <label>Select Doctor</label>
                            <select class="form-control floating" name="doctor" id="doctor" required>
                                <option class="focus-label">Select One</option>
                                <?php
                                foreach ($doctors->getResult() as $doctor) {
                                ?>
                                    <option value="<?php echo $doctor->user_id ?>" <?php if (isset($payment) && ($payment->doctor_id == $doctor->user_id)) {
                                                                                        echo "selected";
                                                                                    } ?>>
                                        <?php echo $doctor->first_name ?>&nbsp;<?php echo $doctor->last_name ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Payment Amount</label>
                            <input type="text" class="form-control <?php echo ($validation->hasError('payment')) ? 'is-invalid' : '' ?>" name="payment" value="<?php if (isset($payment)) {
                                                                                                                                                                    echo $payment->payment;
                                                                                                                                                                } else {
                                                                                                                                                                    echo set_value('payment');
                                                                                                                                                                } ?>">
                            <?php if ($validation->hasError('payment')) {
                                echo "<span class='invalid-feedback'>" . $validation->getError('payment') . "</span>";
                            } ?>
                        </div>
                        <?php
                        if (isset($payment)) {
                        ?>
                            <div class="text-right">
                                <button class="btn btn-sm btn-primary" type="submit">
                                    Update
                                </button>
                                <a href="<?php echo base_url('admin/doctors-payment'); ?>" class="btn btn-sm btn-warning">
                                    Cancel
                                </a>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        <?php
                        }
                        ?>
                        </form>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                Medicine Data
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatable table table-stripped">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>SL: </th>
                                <th>UN_ID: </th>
                                <th>Doctor Name</th>
                                <th>Payment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;

                            foreach ($payments->getResult() as $payment) {
                            ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo base_url('admin/doctors-payment') . "/" . $payment->id ?>" class="btn text-info"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo base_url('admin/delete-doctors-payment') . "/" . $payment->id ?>" class="btn text-danger delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                    <td><?php echo $i++; ?></td>
                                    <td>#<?php echo $payment->id ?></td>
                                    <td><?php echo $payment->first_name ?>&nbsp;<?php echo $payment->last_name ?></td>
                                    <td>BDT.<?php echo $payment->payment ?>/=</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Select2 JS -->
<script src="<?php echo base_url('assets/base/plugins/select2/js/select2.min.js'); ?>"></script>

<script>
    $(document).ready(function() {
        $("#doctor").select2();
    })
</script>
<?= $this->endsection() ?>