<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/bootstrap.min.css'); ?>">
    <style>
        @media print {
            body * {
                visibility: hidden;
                background: none !important;
            }

            .printcontent * {
                visibility: visible;
            }

            .printcontent {
                position: absolute;
                top: -90px;
                left: 0px;
            }
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <!-- Invoice Container -->
            <div class="invoice-container printcontent">

                <div class="row">
                    <div class="col-sm-6 m-b-20">
                        <img alt="Logo" class="inv-logo img-fluid" src="<?php echo base_url("assets/base/img/logo.png") ?>">
                    </div>
                    <div class=" col-sm-6 m-b-20 mr-auto">
                        <div class="invoice-details">
                            <h3 class="text-uppercase"><?php echo $data->unique_id ?></h3>
                            <ul class="list-unstyled mb-0">
                                <li>Date: <span><?php echo $data->created_at ?></span></li>
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
                <div class="row pt-4">
                    <div class="col-sm-6 col-lg-7 col-xl-8 m-b-20">
                        <h6>Invoice to</h6>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <h5 class="mb-0"><strong><?php echo $data->patient_name ?></strong></h5>
                            </li>
                            <li>4417 Goosetown Drive</li>
                            <li>Taylorsville, NC, 28681</li>
                            <li>United States</li>
                            <li><?php echo $data->mobile ?></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-5 col-xl-4 m-b-20">
                        <h6>Consultant</h6>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <h5 class="mb-0"><strong><?php echo $data->first_name ?>&nbsp;<?php echo $data->last_name ?></strong></h5>
                            </li>
                            <li>4417 Goosetown Drive</li>
                            <li>Taylorsville, NC, 28681</li>
                            <li>United States</li>
                            <li><?php echo $data->phone ?></li>
                        </ul>
                    </div>
                </div>

                <div class="table-responsive py-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Medicine</th>
                                <th class="d-none d-sm-table-cell">Dosage</th>
                                <th class="text-nowrap">Instructions</th>
                                <th>Days</th>
                                <th>Suggestions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($medicines->getResult() as $medicine) {
                            ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $medicine->drug ?></td>
                                    <td><?php echo $medicine->dosage ?></td>
                                    <td><?php echo $medicine->instructions ?></td>
                                    <td><?php echo $medicine->days ?></td>
                                    <td><?php echo $medicine->suggestions ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="row pb-5">
                    <div class="col-md-6">
                        <h4>Test Notes</h4>
                        <div class="border" style="height: 100px;"></div>
                    </div>
                    <div class="col-md-6">
                        <h4>Additional Notes</h4>
                        <div class="border" style="height: 100px;"></div>
                    </div>
                </div>
                <div class="invoice-info">
                    <h5>Other information</h5>
                    <p class="text-muted mb-0">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum,
                        eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.
                    </p>
                </div>
            </div>

        </div>
        <!-- /Invoice Container -->
    </div>
    </div>
</body>

</html>