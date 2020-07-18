<?= $this->extend("admin/layouts/master") ?>
<?= $this->section("content") ?>
<div id="printContent">
    <div class="invoice-container">
        <div class="row">
            <div class="col-sm-6 m-b-20">
                <img alt="Logo" class="inv-logo img-fluid" src="<?php echo base_url("assets/base/img/logo.png") ?>">
            </div>
            <div class=" col-sm-6 m-b-20">
                <div class="invoice-details">
                    <h3 class="text-uppercase">Invoice #INV-<?php echo $invoice->invoice_id ?></h3>
                    <ul class="list-unstyled mb-0">
                        <li>Date: <span><?php echo $invoice->created_at ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 m-b-20">
                <ul class="list-unstyled mb-0">
                    <li>Doccure Hospital</li>
                    <li>3864 Quiet Valley Lane,</li>
                    <li>Sherman Oaks, CA, 91403</li>
                    <li>GST No:</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-lg-7 col-xl-8 m-b-20">
                <h6>Invoice to</h6>
                <ul class="list-unstyled mb-0">
                    <li>
                        <h5 class="mb-0"><strong><?php echo $invoice->patient_name ?></strong></h5>
                    </li>
                    <li>4417 Goosetown Drive</li>
                    <li>Taylorsville, NC, 28681</li>
                    <li>United States</li>
                    <li>8286329170</li>
                </ul>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="d-none d-sm-table-cell">DESCRIPTION</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $invoice->first_name ?>&nbsp;<?php echo $invoice->last_name ?></td>
                        <td><?php echo $invoice->payed_amount; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <div class="invoice-info">
                <h5>Other information</h5>
                <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.</p>
            </div>
        </div>

    </div>
</div>
<div class="d-flex justify-content-center">
    <button type="button" class="btn btn-primary mx-2" id="print">Print Invoice</button>
    <a href="<?php echo base_url("admin/invoice") ?>" class="btn btn-warning">Go Back</a>
</div>

<script src="<?php echo base_url('assets/admin/js/printThis.js') ?>"></script>
<script>
    $(document).ready(function() {
        $("#print").on("click", function() {
            $('#printContent').printThis();
        })
    })
</script>
<?= $this->endsection() ?>