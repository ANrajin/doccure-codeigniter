<?= $this->extend('admin/layouts/master') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                Add New User
            </div>
            <div class="card-body">
                <?php $validation =  \Config\Services::validation(); ?>
                <?php
                if (isset($user) && !empty($user)) {
                ?>
                    <form action="<?php echo base_url('admin/update-user') ?>" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>">
                    <?php
                } else {
                    ?>

                        <form action="<?php echo base_url('admin/add-users') ?>" method="post">

                        <?php
                    }
                        ?>

                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating <?php echo ($validation->hasError('name')) ? 'is-invalid' : '' ?>" name="name" placeholder="Enter Full Name" value="<?php if (isset($user)) {
                                                                                                                                                                                                    echo $user['user_name'];
                                                                                                                                                                                                } else {
                                                                                                                                                                                                    echo set_value('name');
                                                                                                                                                                                                } ?>">
                            <?php if ($validation->hasError('name')) {
                                echo "<span class='invalid-feedback'>" . $validation->getError('name') . "</span>";
                            } ?>
                        </div>
                        <div class="form-group form-focus">
                            <input type="email" class="form-control floating <?php echo ($validation->hasError('email')) ? 'is-invalid' : '' ?>" name="email" placeholder="Enter Email Address" value="<?php if (isset($user)) {
                                                                                                                                                                                                            echo $user['email'];
                                                                                                                                                                                                        } else {
                                                                                                                                                                                                            echo set_value('email');
                                                                                                                                                                                                        } ?>">
                            <?php if ($validation->hasError('email')) {
                                echo "<span class='invalid-feedback'>" . $validation->getError('email') . "</span>";
                            } ?>
                        </div>
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating <?php echo ($validation->hasError('mobile')) ? 'is-invalid' : '' ?>" name="mobile" placeholder="Enter Mobile Number" value="<?php if (isset($user)) {
                                                                                                                                                                                                            echo $user['mobile'];
                                                                                                                                                                                                        } else {
                                                                                                                                                                                                            echo set_value('mobile');
                                                                                                                                                                                                        } ?>">
                            <?php if ($validation->hasError('mobile')) {
                                echo "<span class='invalid-feedback'>" . $validation->getError('mobile') . "</span>";
                            } ?>
                        </div>
                        <div class=" form-group form-focus">
                            <input type="password" class="form-control floatin <?php echo ($validation->hasError('password')) ? 'is-invalid' : '' ?>" name="password" placeholder="Create Password" autocomplete="off" value="">
                            <?php if ($validation->hasError('password')) {
                                echo "<span class='invalid-feedback'>" . $validation->getError('password') . "</span>";
                            } ?>
                        </div>
                        <div class="form-group form-focus">
                            <input type="password" class="form-control floating <?php echo ($validation->hasError('confirm_password')) ? 'is-invalid' : '' ?>" name="confirm_password" placeholder="Confirmed Password">
                            <?php if ($validation->hasError('confirm_password')) {
                                echo "<span class='invalid-feedback'>" . $validation->getError('confirm_password') . "</span>";
                            } ?>
                        </div>
                        <div class="form-group">
                            <select class="form-control floating" name="role" required>
                                <option class="focus-label">Select Role</option>
                                <?php foreach ($roles->getResult() as $role) { ?>
                                    <option value="<?php echo $role->role_id ?>" <?php if (isset($user) && ($role->role_id == $user['role_id'])) {
                                                                                        echo "selected";
                                                                                    } ?>>
                                        <?php echo $role->role ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php
                        if (isset($user)) {
                        ?>
                            <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">
                                Update
                            </button>
                            <a href="<?php echo base_url('admin/manage-users'); ?>" class="btn btn-warning btn-block btn-lg login-btn">
                                Cancel
                            </a>
                        <?php
                        } else {
                        ?>
                            <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">
                                <i class="fa fa-plus"></i>
                                Insert
                            </button>
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
                User Data
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatable table table-stripped">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>SL: </th>
                                <th>UN_ID: </th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>User Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;

                            foreach ($users->getResult() as $user) {
                            ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo base_url('admin/edit-user') . "/" . $user->user_id; ?>" class="btn btn-sm text-info" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="<?php echo base_url('admin/remove-user') . "/" . $user->user_id; ?>" class="btn btn-sm text-danger delete" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                    <td><?php echo $i++; ?></td>
                                    <td>user#<?php echo $user->user_id ?></td>
                                    <td><?php echo $user->user_name ?></td>
                                    <td><?php echo $user->email ?></td>
                                    <td><?php echo $user->mobile ?></td>
                                    <td><?php echo $user->role ?></td>
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