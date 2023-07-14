<?php $this->load->view('template/header_link'); ?>

<body>
    <div id="main-wrapper">
        <?php $this->load->view('template/header'); ?>
        <div class="content-body" style="padding-bottom: 100px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Dispatch Bags</h4>
                                <?php if ($this->session->userdata('msg') != '') { ?>
                                    <?= $this->session->userdata('msg'); ?>
                                <?php  }
                                $this->session->unset_userdata('msg'); ?>

                                <?php if ($tag == 'edit') {

                                ?>
                                    <a href="<?php echo base_url() . 'dispatched-list?BdID=' . encryptId($dis['id']) ?>" class="btn btn-danger shadow btn-xs sharp is_permission" onclick="return confirm('Are you sure to delete this data?')"><i class="fa fa-trash"></i></a>
                                <?php
                                } else { ?>
                                    <a href="<?= base_url('dispatched-list') ?>" class="btn btn-success btn-sm">Dispatched List <i class="fa fa-list"></i></a>
                                <?php

                                }
                                ?>
                            </div>
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">

                                        <div class="col-sm-4  mb-2">
                                            <label> From date </label>
                                            <input type="date" class="form-control" id="fromDate" name="from_date" value="<?= (($tag == 'edit') ? $dis['from_date'] : '')  ?>">
                                        </div>
                                        <div class="col-sm-4  mb-2">
                                            <label> To date</label>
                                            <input type="date" class="form-control" id="toDate" name="to_Date" value="<?= (($tag == 'edit') ? $dis['to_date'] : '')  ?>">
                                        </div>

                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">company*</label>
                                                <select name="company" class="form-control" id="company">
                                                    <option value="">Select company </option>
                                                    <?php
                                                    $company =  getAllRow('tbl_company');
                                                    if ($company != '') {
                                                        foreach ($company as $divi) {  ?>

                                                            <option value="<?= $divi['did'] ?>" <?= (($divi['did'] == $dis['company']) ? 'selected' : '') ?>>
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
                                                <label class="text-label text-white">Bags Pending*</label>
                                                <input type="number" id="pending_bags" class="form-control" placeholder="Bags Pending" name="pending_bags" <?= (($tag == 'edit') ? "value=" . $dis['pending_bags'] : 'value= "0"')  ?> readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">New Bags*</label>
                                                <input type="number" class="form-control" id="new_bags" name="new_bags" placeholder="New Bags" value="<?= (($tag == 'edit') ? $dis['new_bags'] : '')  ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">Total Bags*</label>
                                                <input type="number" class="form-control" id="total_bags" name="total_bags" placeholder="Total Bags" value="<?= (($tag == 'edit') ? $dis['total_bags'] : '')  ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">Dispatched Bags*</label>
                                                <input type="number" class="form-control" id="bags_dispatched" name="bags_dispatched" placeholder="Dispatched Bags" value="<?= (($tag == 'edit') ? $dis['bags_dispatched'] : '0')  ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">Bags Remaining</label>
                                                <input type="number" class="form-control" name="remaining_bags" value="<?= (($tag == 'edit') ? $dis['remaining_bags'] : '')  ?>" id="remaining_bags" placeholder="Remaining Bags" readonly>
                                            </div>
                                        </div>


                                        <div class="col-lg-12 mb-2 text-center">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
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
    <!-- required vendors -->
    <?php $this->load->view('template/footer_link'); ?>
    <script>
        // Trigger the initial function calls
        getBags();
        totalBags();
        getpendingbags()

        // Calculate total bags and update remaining bags whenever there is a change
        $('#pending_bags, #new_bags').on('change keyup', function() {
            totalBags();
        });

        // Retrieve bags and update total bags whenever there is a change in fromDate, toDate, or company
        $('#fromDate, #toDate, #company').on('change', function() {
            getBags();
            updateRemainingBags();
            getpendingbags()

           
        });

        // Function to calculate total bags
        function totalBags() {
            var pending_bags = parseInt($('#pending_bags').val());
            console.log(pending_bags);
            var new_bags = parseInt($('#new_bags').val());
            var sum = pending_bags + new_bags;
            $('#total_bags').val(sum);
            console.log(sum);
            updateRemainingBags();
            getpendingbags()
        }

        // Function to retrieve bags using AJAX
        function getBags() {
            var fromDate = $('#fromDate').val();
            var toDate = $('#toDate').val();
            var companyId = $('#company').val();

            $.ajax({
                url: '<?= base_url("Admin_Dashboard/get_bags") ?>',
                method: 'POST',
                data: {
                    fromDate: fromDate,
                    toDate: toDate,
                    company_id: companyId
                },
                success: function(response) {
                    $('#new_bags').val(response);
                    totalBags();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        function getpendingbags()
        {
            var companyId = $('#company').val();
            $.ajax({
                url: '<?= base_url('Admin_Dashboard/get_remaining_bags') ?>',
                method: 'POST',
                data: {
                    company_id: companyId
                },
                success: function(response) {
                    $('#pending_bags').val(response);
                    console.log(response);

                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }


        // Function to update remaining bags
        function updateRemainingBags() {
            var total_bags = parseInt($('#total_bags').val());
            var bags_dispatched = parseInt($('#bags_dispatched').val());
            var remaining = total_bags - bags_dispatched;
            $('#remaining_bags').val(remaining);
        }
        $('#bags_dispatched').on('change keyup', function() {
            updateRemainingBags()
        });
    </script>
</body>

</html>