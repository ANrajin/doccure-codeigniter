<?= $this->extend("admin/layouts/master") ?>

<?= $this->section("content") ?>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                Add New Category
            </div>
            <div class="card-body">
                <?php $validation =  \Config\Services::validation(); ?>
                <?php
                if (isset($manufacturer) && !empty($manufacturer)) {
                ?>
                    <form action="<?php echo base_url('admin/update-med-manufacturer') ?>" method="post">
                        <input type="hidden" name="manufacturer_id" value="<?php echo $manufacturer->manufacturer_id ?>">
                    <?php
                } else {
                    ?>
                        <form action="<?php echo base_url('admin/add-med-manufacturer') ?>" method="post">
                        <?php
                    }
                        ?>
                        <div class="form-group">
                            <label>Manufacturer Name</label>
                            <input type="text" class="form-control <?php echo ($validation->hasError('manufacturer')) ? 'is-invalid' : '' ?>" name="manufacturer" value="<?php if (isset($manufacturer)) {
                                                                                                                                                                                echo $manufacturer->manufacturer;
                                                                                                                                                                            } else {
                                                                                                                                                                                echo set_value('manufacturer');
                                                                                                                                                                            } ?>">
                            <?php if ($validation->hasError('manufacturer')) {
                                echo "<span class='invalid-feedback'>" . $validation->getError('manufacturer') . "</span>";
                            } ?>
                        </div>
                        <?php
                        if (isset($manufacturer)) {
                        ?>
                            <div class="text-right">
                                <button class="btn btn-sm btn-primary" type="submit">
                                    Update
                                </button>
                                <a href="<?php echo base_url('admin/medicine-manufacturer'); ?>" class="btn btn-sm btn-warning">
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
                Manufacturer Data
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatable table table-stripped">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>SL: </th>
                                <th>UN_ID: </th>
                                <th>Manufacturer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;

                            foreach ($items->getResult() as $item) {
                            ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo base_url('admin/edit-med-manufacturer') . "/" . $item->manufacturer_id; ?>" class="btn btn-sm text-info" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="<?php echo base_url('admin/remove-med-manufacturer') . "/" . $item->manufacturer_id; ?>" class="btn btn-sm text-danger delete" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                    <td><?php echo $i++; ?></td>
                                    <td>manufac#<?php echo $item->manufacturer_id ?></td>
                                    <td><?php echo $item->manufacturer ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection() ?>