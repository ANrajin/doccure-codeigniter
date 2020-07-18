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
                                <th>Image</th>
                                <th>Doctor Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            if (isset($doctors)) {
                                foreach ($doctors->getResult() as $doctor) {
                            ?>
                                    <tr>
                                        <td>
                                            <button type="button" class="btn btn-sm text-info">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <a href="" class="btn btn-sm text-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                        <td><?php echo $i++; ?></td>
                                        <td>#<?php echo $doctor->id ?></td>
                                        <td>
                                            <img src="<?php echo base_url("images") . "/" . $doctor->image ?>" alt="<?php echo $doctor->first_name ?>" class="img-fluid" style="width:50px;">
                                        </td>
                                        <td><?php echo $doctor->first_name ?>&nbsp;<?php echo $doctor->last_name ?></td>
                                        <td><?php echo $doctor->phone ?></td>
                                        <td><?php echo $doctor->address ?></td>
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