<!-- bootbox -->
<script src="<?php echo base_url('assets/admin/js/bootbox.min.js'); ?>"></script>

<!-- Bootstrap Core JS -->
<script src="<?php echo base_url('assets/admin/js/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/js/bootstrap.min.js'); ?>"></script>

<!-- Datatables JS -->
<script src="<?php echo base_url('assets/admin/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/datatables/datatables.min.js') ?>"></script>

<!-- Slimscroll JS -->
<script src="<?php echo base_url('assets/admin/plugins/slimscroll/jquery.slimscroll.min.js'); ?>"></script>

<script src="<?php echo base_url('assets/admin/plugins/raphael/raphael.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/morris/morris.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/js/chart.morris.js'); ?>"></script>

<!-- toastr -->
<script src="<?php echo base_url('assets/admin/js/toastr.min.js'); ?>"></script>

<!-- Custom JS -->
<script src="<?php echo base_url('assets/admin/js/script.js'); ?>"></script>

<script>
    $(document).ready(function() {
        $(".delete").on('click', function(e) {
            e.preventDefault();

            var del = $(this).attr("href");
            bootbox.confirm("Are your sure to delete?", function(confirmed) {
                if (confirmed) {
                    window.location.href = del;
                }
            });
        });
    });

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-center",
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