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
                if (isset($category) && !empty($category)) {
                ?>
                    <form action="<?php echo base_url('admin/update-med-category') ?>" method="post">
                        <input type="hidden" name="category_id" value="<?php echo $category->category_id ?>">
                    <?php
                } else {
                }
                    ?>
                    <form action="<?php echo base_url('admin/add-med-category') ?>" method="post">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control <?php echo ($validation->hasError('category')) ? 'is-invalid' : '' ?>" name="category" value="<?php if (isset($category)) {
                                                                                                                                                                        echo $category->name;
                                                                                                                                                                    } else {
                                                                                                                                                                        echo set_value('category');
                                                                                                                                                                    } ?>">
                            <?php if ($validation->hasError('category')) {
                                echo "<span class='invalid-feedback'>" . $validation->getError('category') . "</span>";
                            } ?>
                        </div>
                        <?php
                        if (isset($category)) {
                        ?>
                            <div class="text-right">
                                <button class="btn btn-sm btn-primary" type="submit">
                                    Update
                                </button>
                                <a href="<?php echo base_url('admin/medicine-category'); ?>" class="btn btn-sm btn-warning">
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
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;

                            foreach ($categorys->getResult() as $category) {
                            ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo base_url('admin/edit-med-category') . "/" . $category->category_id; ?>" class="btn btn-sm text-info" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="<?php echo base_url('admin/remove-med-category') . "/" . $category->category_id; ?>" class="btn btn-sm text-danger delete" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                    <td><?php echo $i++; ?></td>
                                    <td>medcat#<?php echo $category->category_id ?></td>
                                    <td><?php echo $category->name ?></td>
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