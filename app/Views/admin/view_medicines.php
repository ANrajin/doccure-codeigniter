<?= $this->extend("admin/layouts/master") ?>

<?= $this->section("content") ?>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                Add New Medicine
            </div>
            <div class="card-body">
                <?php $validation =  \Config\Services::validation(); ?>
                <?php
                if (isset($medicine) && !empty($medicine)) {
                ?>
                    <form action="<?php echo base_url('admin/update-medicine') ?>" method="post">
                        <input type="hidden" name="medicine_id" value="<?php echo $medicine->med_id ?>">
                    <?php
                } else {
                    ?>
                        <form action="<?php echo base_url('admin/add-medicine') ?>" method="post">
                        <?php
                    }
                        ?>
                        <div class="form-group">
                            <label>Medicine Name</label>
                            <input type="text" class="form-control <?php echo ($validation->hasError('name')) ? 'is-invalid' : '' ?>" name="name" value="<?php if (isset($medicine)) {
                                                                                                                                                                echo $medicine->medicine;
                                                                                                                                                            } else {
                                                                                                                                                                echo set_value('name');
                                                                                                                                                            } ?>">
                            <?php if ($validation->hasError('name')) {
                                echo "<span class='invalid-feedback'>" . $validation->getError('name') . "</span>";
                            } ?>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control floating" name="category" required>
                                <option class="focus-label">Select One</option>
                                <?php
                                foreach ($categories->getResult() as $category) {
                                ?>
                                    <option value="<?php echo $category->category_id ?>" <?php if (isset($medicine) && ($medicine->category_id == $category->category_id)) {
                                                                                                echo "selected";
                                                                                            } ?>>
                                        <?php echo $category->name ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Manufaturer</label>
                            <select class="form-control floating" name="manufacturer" required>
                                <option class="focus-label">Select One</option>
                                <?php
                                foreach ($manufacturers->getResult() as $manufacturer) {
                                ?>
                                    <option value="<?php echo $manufacturer->manufacturer_id ?>" <?php if (isset($medicine) && ($medicine->company_id == $manufacturer->manufacturer_id)) {
                                                                                                        echo "selected";
                                                                                                    } ?>>
                                        <?php echo $manufacturer->manufacturer ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <?php
                        if (isset($medicine)) {
                        ?>
                            <div class="text-right">
                                <button class="btn btn-sm btn-primary" type="submit">
                                    Update
                                </button>
                                <a href="<?php echo base_url('admin/medicines'); ?>" class="btn btn-sm btn-warning">
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
                                <th>Medicine</th>
                                <th>Category</th>
                                <th>Manufacturer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($medicines->getResult() as $medicine) {
                            ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo base_url("admin/edit-medicine") ?>/<?php echo $medicine->med_id ?>" class="btn btn-sm text-info" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="<?php echo base_url("admin/remove-medicine") ?>/<?php echo $medicine->med_id ?>" class="btn btn-sm text-danger delete" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                    <td><?php echo $i++; ?></td>
                                    <td>med#<?php echo $medicine->med_id ?></td>
                                    <td><?php echo $medicine->medicine ?></td>
                                    <td><?php echo $medicine->name ?></td>
                                    <td><?php echo $medicine->manufacturer ?></td>
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
<?= $this->endsection() ?>