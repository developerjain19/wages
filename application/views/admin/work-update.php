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
                                <h4 class="card-title"><?= $title ?> - <?= $division_name ?></h4>
                                <?php if ($tag == 'edit') {
                                    if ($this->delete == '1') {
                                ?>
                                        <a href="<?php echo base_url() . 'work-update?BdID=' . encryptId($qc['wid']) ?>" class="btn btn-danger shadow btn-xs sharp is_permission" onclick="return confirm('Are you sure to delete this data?')"><i class="fa fa-trash"></i></a>
                                    <?php }
                                } else { ?>
                                    <a href="<?= base_url('work-update') ?>" class="btn btn-success btn-sm">Work Update List <i class="fa fa-list"></i></a>
                                <?php

                                }
                                ?>
                                <div class="msg"></div>
                            </div>
                            <div class="card-body">
                                <form method="POST">
                                    <div class="row">
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white" for="name">Labour :</label>
                                                <select name="labour" id="labour" class="form-control" required>
                                                    <option value="">Select labour </option>
                                                    <?php
                                                    $labour = getAllRow('tbl_labour');
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
                                                <label class="text-label text-white" for="in">Division In :</label>

                                                <select name="division_in" class="form-control" required>
                                                    <option value="">Select Division</option>
                                                    <?php
                                                    $division =  getAllRow('tbl_division');
                                                    if ($division != '') {
                                                        foreach ($division as $divi) {
                                                    ?>
                                                            <option value="<?= $divi['did'] ?>" <?php if ($tag == 'edit') { ?> <?= (($divi['did'] == $work['division_in']) ? 'selected' : '') ?> <?php  } ?>>

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
                                                <label class="text-label text-white" for="out">Division Out :</label>
                                                <select name="division_out" class="form-control" required>
                                                    <option value="">Select Division</option>
                                                    <?php
                                                    $division =  getAllRow('tbl_division');
                                                    if ($division != '') {
                                                        foreach ($division as $divi) {
                                                    ?>
                                                            <option value="<?= $divi['did'] ?>" <?php if ($tag == 'edit') { ?> <?= (($divi['did'] == $work['division_out']) ? 'selected' : '') ?> <?php  } ?>><?= $divi['name'] ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white" for="quantity">Quantity :</label>
                                                <input type="number" class="form-control" id="quantity" name="quantity" value="<?= (($tag == 'edit') ? $work['quantity'] : '')  ?>" placeholder="Enter quantity" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white" for="resource-type">Resource Type :</label>
                                                <input type="text" class="form-control" name="resource_type_name" id="resource_type_name" placeholder="Enter resource type" value="<?= (($tag == 'edit') ? $work['resource_type'] : '')  ?> ">

                                                <input type="hidden" class="form-control" name="resource_type" id="resource_type" placeholder="Enter resource type" value="<?= (($tag == 'edit') ? $work['resource_type_name'] : '')  ?> ">
                                            </div>
                                        </div>
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

            $('#quantity').keyup(function() {
                var qty = $('#quantity').val();
                // console.log(qty);
                var resource_type = $('#resource_type').val();
                if (resource_type != '') {
                    $('.msg').html('');
                    $.ajax({
                        method: "POST",
                        dataType: 'JSON',
                        url: "<?= base_url('Admin_Dashboard/calculate_insentive') ?>",
                        data: {
                            qty: qty,
                            resource_type: resource_type
                        },
                        success: function(response) {

                            console.log(response);
                            // $('#resource_type_name').val(response.title);
                            // $('#resource_type').val(response.rid);
                            // $('#wages').val(response.wedge_per_day);
                            $('#incentive').val(response.amount);
                        }
                    });
                } else {
                    $('.msg').html('<div class="alert alert-danger">please select Labour</div>');
                }

            });



        });
    </script>




</body>

</html>