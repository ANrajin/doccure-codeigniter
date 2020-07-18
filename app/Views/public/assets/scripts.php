<!-- Bootstrap Core JS -->
<script src="<?php echo base_url('assets/base/js/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/base/js/bootstrap.min.js'); ?>"></script>

<!--time picker-->
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<!-- Sticky Sidebar JS -->
<script src="<?php echo base_url('assets/base/plugins/theia-sticky-sidebar/ResizeSensor.js'); ?>"></script>
<script src="<?php echo base_url('assets/base/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js'); ?>"></script>

<!-- Slick JS -->
<script src="<?php echo base_url('assets/base/js/slick.js'); ?>"></script>

<!-- Select2 JS -->
<script src="<?php echo base_url('assets/base/plugins/select2/js/select2.min.js'); ?>"></script>

<!-- Dropzone JS -->
<script src="<?php echo base_url('assets/base/plugins/dropzone/dropzone.min.js'); ?>"></script>

<!-- Bootstrap Tagsinput JS -->
<script src="<?php echo base_url('assets/base/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js'); ?>"></script>

<!-- Profile Settings JS -->
<script src="<?php echo base_url('assets/base/js/profile-settings.js'); ?>"></script>

<!-- toastr -->
<script src="<?php echo base_url('assets/admin/js/toastr.min.js'); ?>"></script>

<!-- Custom JS -->
<script src="<?php echo base_url('assets/base/js/script.js'); ?>"></script>

<script>
    $(document).ready(function() {
        $("#days").select2();
        $("#speciality").select2();

        $(document).ready(function() {
            $('#start').timepicker({
                timeFormat: 'h:mm p',
                interval: 15,
                minTime: '10:00am',
                maxTime: '9:00pm',
                defaultTime: '10',
                startTime: '10:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });
        });

        $(document).ready(function() {
            $('#end').timepicker({
                timeFormat: 'h:mm p',
                interval: 15,
                minTime: '10:00am',
                maxTime: '9:00pm',
                defaultTime: '10',
                startTime: '10:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });
        });
    })
</script>
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    <?php if (session()->getFlashdata('message')) { ?>
        var type = "<?php echo session()->getFlashdata('alert-type'); ?>"
        switch (type) {
            case 'info':
                toastr.info("<?php echo session()->getFlashdata('message'); ?>");
                break;
            case 'success':
                toastr.success("<?php echo session()->getFlashdata('message'); ?>");
                break;
            case 'warning':
                toastr.warning("<?php echo session()->getFlashdata('message'); ?>");
                break;
            case 'error':
                toastr.error("<?php echo session()->getFlashdata('message'); ?>");
                break;
        }
    <?php }; ?>
</script>