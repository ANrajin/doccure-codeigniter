<?= $this->extend("public/layouts/master"); ?>

<?= $this->section("doctor") ?>
<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">
                Add Time Slot
            </div>
            <div class="card-body">
                <?php $validation =  \Config\Services::validation(); ?>
                <form action="<?php echo base_url("schedule-timings") ?>" method="post">
                    <div class="form-group">
                        <label>Select Day</label>
                        <select name="days[]" id="days" class="form-control" multiple>
                            <?php foreach ($days->getResult() as $day) { ?>
                                <option value="<?php echo $day->day_id ?>"><?php echo $day->day ?></option>
                            <?php } ?>
                        </select>
                        <?php if ($validation->hasError('days')) {
                            echo "<span class='invalid-feedback'>" . $validation->getError('days') . "</span>";
                        } ?>
                    </div>
                    <div class="row form-row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Start Time</label>
                                <input type="text" name="start" id="start" class="form-control" />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>End Time</label>
                                <input type="text" name="end" id="end" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-info btn-sm">Add Slot</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Schedule Timings</h4>
                <div class="profile-box">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card schedule-widget mb-0">

                                <!-- Schedule Header -->
                                <div class="schedule-header">

                                    <!-- Schedule Nav -->
                                    <div class="schedule-nav">
                                        <ul class="nav nav-tabs nav-justified">
                                            <li class="nav-item">
                                                <a class="nav-link" id="active" data-toggle="tab" href="#slot_Friday">Friday</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#slot_Saturday">Saturday</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#slot_Sunday">Sunday</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#slot_Monday">Monday</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#slot_Tuesday">Tuesday</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#slot_Wednesday">Wednesday</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#slot_Thrusday">Thursday</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /Schedule Nav -->

                                </div>
                                <!-- /Schedule Header -->

                                <!-- Schedule Content -->
                                <div class="tab-content schedule-cont">
                                    <!-- Slot -->
                                    <?php foreach ($days->getResult() as $day) { ?>
                                        <div id="slot_<?php echo $day->day ?>" class="tab-pane fade">
                                            <h4 class="card-title d-flex justify-content-between">
                                                <span>Time Slots For <?php echo $day->day ?></span>
                                            </h4>
                                            <?php
                                            foreach ($schedules->getResult() as $schedule) {
                                                if ($day->day_id == $schedule->day_id) {
                                                    if ($schedule->s_time && $schedule->e_time) {
                                            ?>
                                                        <!-- Slot List -->
                                                        <div class="doc-times">
                                                            <div class="doc-slot-list">
                                                                <?php echo $schedule->s_time ?> - <?php echo $schedule->e_time ?>
                                                                <a href="javascript:void(0)" class="delete_schedule">
                                                                    <i class="fa fa-times"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!-- /Slot List -->
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                        <!-- / Slot -->
                                    <?php } ?>
                                </div>
                                <!-- /Schedule Content -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#slot_Friday").addClass("show");
        $("#active").addClass("active");
        $("#slot_Friday").addClass("active");
    })
</script>
<?= $this->endsection() ?>