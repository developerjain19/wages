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
                                <h4 class="card-title">Work Update - Division 1</h4>
                                <div class="msg"></div>
                            </div>
                            <div class="card-body">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white" for="name">Labour :</label>
                                                <select name="labour" id="labour" class="form-control">
                                                    <option value="">Select labour </option>
                                                    <?php
                                                    $labour = getAllRow('tbl_labour');
                                                    if ($labour != '') {
                                                        foreach ($labour as $lab) {
                                                    ?>
                                                            <option value="<?= $lab['eid'] ?>"><?= $lab['name'] ?></option>
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

                                                <select name="division_in" class="form-control">
                                                    <option value="">Select Division</option>
                                                    <?php
                                                    $division =  getAllRow('tbl_division');
                                                    if ($division != '') {
                                                        foreach ($division as $divi) {
                                                    ?>
                                                            <option value="<?= $divi['did'] ?>"><?= $divi['name'] ?></option>
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
                                                <select name="division_out" class="form-control">
                                                    <option value="">Select Division</option>
                                                    <?php
                                                    $division =  getAllRow('tbl_division');
                                                    if ($division != '') {
                                                        foreach ($division as $divi) {
                                                    ?>
                                                            <option value="<?= $divi['did'] ?>"><?= $divi['name'] ?></option>
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
                                                <input type="number" class="form-control" id="quantity" name="quantity" value="0" placeholder="Enter quantity" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white" for="resource-type">Resource Type :</label>
                                                <input type="text" class="form-control" name="resource_type_name" id="resource_type_name" placeholder="Enter resource type" readonly>
                                                <input type="hidden" class="form-control" name="resource_type" id="resource_type" placeholder="Enter resource type">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white" for="wages">Wages :</label>
                                                <input type="text" class="form-control" name="wages" id="wages" placeholder="Enter wages" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white" for="incentives">Incentives :</label>
                                                <input type="text" class="form-control" name="incentive" id="incentive" placeholder="Enter incentives" readonly>
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
                alert(labour);
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
                var resource_type = $('#resource_type').val();
                if (resource_type != '') {
                    $('.msg').html('');
                    $.ajax({
                        method: "POST",
                        dataType: 'JSON',
                        url: "Admin_Dashboard/calculate_insentive",
                        data: {
                            qty: qty,
                            resource_type: resource_type
                        },
                        success: function(response) {
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