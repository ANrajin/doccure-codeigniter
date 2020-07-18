<?= $this->extend("admin/layouts/master") ?>

<?= $this->section("content") ?>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">Add New User Role</div>
            <div class="card-body">
                <?php $validation =  \Config\Services::validation(); ?>
                <?php
                if (isset($role) && !empty($role)) {
                ?>
                    <form action="<?php echo base_url('admin/update-role') ?>" method="post">
                        <input type="hidden" name="role_id" value="<?php echo $role->role_id ?>">
                    <?php
                } else {
                    ?>

                        <form action="<?php echo base_url('admin/add-roles') ?>" method="post">

                        <?php
                    }
                        ?>

                        <div class="form-group">
                            <label>Role Name</label>
                            <input type="text" class="form-control <?php echo ($validation->hasError('role')) ? 'is-invalid' : '' ?>" name="role" value="<?php if (isset($role)) {
                                                                                                                                                                echo $role->role;
                                                                                                                                                            } else {
                                                                                                                                                                echo set_value('role');
                                                                                                                                                            } ?>">
                            <?php if ($validation->hasError('role')) {
                                echo "<span class='invalid-feedback'>" . $validation->getError('role') . "</span>";
                            } ?>
                        </div>
                        <?php
                        if (isset($role)) {
                        ?>
                            <div class="text-right">
                                <button class="btn btn-sm btn-primary" type="submit">
                                    Update
                                </button>
                                <a href="<?php echo base_url('admin/user-roles'); ?>" class="btn btn-sm btn-warning">
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
            <div class="card-header">Roles Data</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatable table table-stripped">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>SL: </th>
                                <th>UN_ID: </th>
                                <th>Role Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;

                            foreach ($roles->getResult() as $role) {
                            ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo base_url('admin/edit-role') . "/" . $role->role_id; ?>" class="btn btn-sm text-info" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="<?php echo base_url('admin/remove-role') . "/" . $role->role_id; ?>" class="btn btn-sm text-danger delete" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                    <td><?php echo $i++; ?></td>
                                    <td>role#<?php echo $role->role_id ?></td>
                                    <td><?php echo $role->role ?></td>
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