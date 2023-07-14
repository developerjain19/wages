<?php $this->load->view('template/header_link'); ?>

<body>
    <div id="main-wrapper">
        <?php $this->load->view('template/header'); ?>
        <div class="content-body" style="padding-bottom : 100px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= $title ?> - <?= $company_name ?></h4>
                                <?php if ($tag == 'edit') {
                                    if ($this->delete == '1') {
                                ?>
                                        <a href="<?php echo base_url() . 'work-update?BdID=' . encryptId($work['wid']) ?>" class="btn btn-danger shadow btn-xs sharp is_permission" onclick="return confirm('Are you sure to delete this data?')"><i class="fa fa-trash"></i></a>
                                    <?php }
                                } else { ?>
                                    <a href="<?= base_url('work-update') ?>" class="btn btn-success btn-sm">Work Update List <i class="fa fa-list"></i></a>
                                <?php

                                }
                                ?>

                            </div>
                            <div class="msg"></div>
                            <div class="card-body">
                                <form method="POST">
                                    <div class="row">
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white" for="name">Labour :</label>
                                                <select name="labour" id="labour" class="form-control" required>
                                                    <option value="">Select labour </option>
                                                    <?php
                                                    $labour = getRowById('tbl_labour' , 'company' ,  sessionId('setcompany'));
                                                    if ($labour != '') {
                                                        foreach ($labour as $lab) {
                                                    ?>
                                                            <option value="<?= $lab['eid'] ?>" <?php if ($tag == 'edit') { ?> <?= (($lab['eid'] == $work['labour']) ? 'selected' : '') ?> <?php  } ?>>
                                                                <?= $lab['name'] ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white" for="in">Company :</label>

                                                <select name="company" class="form-control" required>

                                                    <?php
                                                    $company =  getRowById('tbl_company', 'did', sessionId('setcompany'));
                                                    if ($company != '') {
                                                        foreach ($company as $divi) {
                                                    ?>
                                                            <option value="<?= $divi['did'] ?>" <?php if ($tag == 'edit') { ?> <?= (($divi['did'] == $work['company']) ? 'selected' : '') ?> <?php  } ?>>

                                                                <?= $divi['name'] ?>
                                                            </option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white" for="date">Date :</label>
                                                <input type="date" class="form-control" id="date" name="date" value="<?= (($tag == 'edit') ? $work['date'] : date("Y-m-d"))  ?>" placeholder="Enter date" required>
                                            </div>
                                        </div>


                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white" for="quantity">Quantity :</label>
                                                <input type="number" class="form-control" id="quantity" name="quantity" value="<?= (($tag == 'edit') ? $work['quantity'] : '')  ?>" placeholder="Enter quantity" required>
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white" for="resource-type">Resource Type :</label>
                                                <input type="text" class="form-control" name="resource_type_name" id="resource_type_name" placeholder="Enter resource type" value="<?= (($tag == 'edit') ? $work['resource_type'] : '')  ?> ">

                                                <input type="hidden" class="form-control" name="resource_type" id="resource_type" placeholder="Enter resource type" value="<?= (($tag == 'edit') ? $work['resource_type_name'] : '')  ?> ">
                                            </div>
                                        </div> -->
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white" for="wages">Wages :</label>
                                                <input type="text" class="form-control" name="wages" id="wages" placeholder="Enter wages" value="<?= (($tag == 'edit') ? $work['wages'] : '')  ?> " required>
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white" for="incentives">Incentives :</label>
                                                <input type="text" class="form-control" name="incentive" id="incentive" placeholder="Enter incentives" value="<?= (($tag == 'edit') ? $work['incentive'] : '')  ?>" readonly>
                                            </div>
                                        </div> -->
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white" for="attendance">Aattendance :</label>
                                                <select name="attendance" class="form-control" required>
                                                    <!-- <option value="">Select Aattendance</option> -->
                                                    <option value="1" class="text-info" <?= (($tag == 'edit') ?  (($work['attendance'] == '1') ? 'Selected' : '') : '')  ?>>Presence </option>
                                                    <option value="0" class="text-danger" <?= (($tag == 'edit') ?  (($work['attendance'] == '0') ? 'Selected' : '') : '')  ?>>Absent</option>
                                                    <option value="2" class="text-warning" <?= (($tag == 'edit') ?  (($work['attendance'] == '2') ? 'Selected' : '') : '')  ?>>Half Day</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">FQc Accepted*</label>
                                                <input type="number" class="form-control" id="fqc_accepted" name="fqc_accepted" placeholder="FQc Accepted" value="<?= (($tag == 'edit') ? $work['fqc_accepted'] : '')  ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">FQc Rejected*</label>
                                                <input type="number" class="form-control" id="fqc_rejected" name="fqc_rejected" placeholder="FQc Rejected" value="<?= (($tag == 'edit') ? $work['fqc_rejected'] : '')  ?>" readonly>
                                            </div>
                                        </div>


                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">Rejection % *</label>
                                                <input type="text" class="form-control" id="rejection_per" value="<?= (($tag == 'edit') ? $work['rejection_per'] : '')  ?>" placeholder="Rejection %" name="rejection_per" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">Success % *</label>
                                                <input type="text" class="form-control" id="success_per" value="<?= (($tag == 'edit') ? $work['success_per'] : '')  ?>" placeholder="Success %" name="success_per" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2 text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('template/footer'); ?>
    </div>
    <?php $this->load->view('template/footer_link'); ?>
    <script>
        $(document).ready(function() {

            $('#labour').change(function() {
                var labour = $('#labour').val();
                // alert(labour);
                $.ajax({
                    method: "POST",
                    dataType: 'JSON',
                    url: "Admin_Dashboard/getresoure",
                    data: {
                        labour: labour
                    },
                    success: function(response) {
                        $('#resource_type_name').val(response.title);
                        $('#resource_type').val(response.rid);
                        $('#wages').val(response.wedge_per_day);

                    }
                });

            });

            // $('#quantity').keyup(function() {
            //     var qty = $('#quantity').val();
            //     // console.log(qty);
            //     var resource_type = $('#resource_type').val();
            //     if (resource_type != '') {
            //         $('.msg').html('');
            //         $.ajax({
            //             method: "POST",
            //             dataType: 'JSON',
            //             url: "<?= base_url('Admin_Dashboard/calculate_incentive') ?>",
            //             data: {
            //                 qty: qty,
            //                 resource_type: resource_type
            //             },
            //             success: function(response) {

            //                 console.log(response);
            //                 // $('#resource_type_name').val(response.title);
            //                 // $('#resource_type').val(response.rid);
            //                 // $('#wages').val(response.wedge_per_day);
            //                 $('#incentive').val(response.amount);
            //             }
            //         });
            //     } else {
            //         $('.msg').html('<div class="alert alert-danger">please select Labour</div>');
            //     }

            // });
        });
    </script>

    <script>
        // Function to calculate and update the values
        function updateValues() {
            // Get the form values
            var quantity = parseInt(document.getElementsByName("quantity")[0].value);
            var qcAccepted = parseInt(document.getElementById("fqc_accepted").value);
            var qc_rejected = quantity - qcAccepted;
            document.getElementById("fqc_rejected").value = qc_rejected;


            // Calculate the percentage of accept and reject quantity
            var acceptPercentage = (qcAccepted / quantity) * 100;
            var qcRejected = parseInt(document.getElementById("fqc_rejected").value);
            var rejectPercentage = (qcRejected / quantity) * 100;
            // Update the accept and reject percentage fields
            document.getElementById("rejection_per").value = rejectPercentage.toFixed(2);
            document.getElementById("success_per").value = acceptPercentage.toFixed(2);
        }
        // Add event listener for keyup event on the fqc_accepted field
        document.getElementById("quantity").addEventListener("keyup", updateValues);
        // Add event listener for keyup event on the fqc_rejected field
        document.getElementById("fqc_accepted").addEventListener("keyup", updateValues);
    </script>


</body>

</html>