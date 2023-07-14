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
                                <h4 class="card-title">QC Update</h4>
                                <?php if ($this->session->userdata('msg') != '') { ?>
                                    <?= $this->session->userdata('msg'); ?>
                                <?php  }
                                $this->session->unset_userdata('msg'); ?>

                                <?php if ($tag == 'edit') {
                                    if ($this->delete == '1') {
                                ?>
                                        <a href="<?php echo base_url() . 'qc-update-list?BdID=' . encryptId($qc['id']) ?>" class="btn btn-danger shadow btn-xs sharp is_permission" onclick="return confirm('Are you sure to delete this data?')"><i class="fa fa-trash"></i></a>
                                    <?php }
                                } else { ?>
                                    <a href="<?= base_url('qc-update-list') ?>" class="btn btn-success btn-sm">QC Update List <i class="fa fa-list"></i></a>
                                <?php

                                }
                                ?>
                            </div>
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white" for="date">Date :</label>
                                                <input type="date" class="form-control" id="date" name="date" value="<?= (($tag == 'edit') ? $qc['date'] : date("Y-m-d"))  ?>" placeholder="Enter date" required>
                                            </div>
                                        </div>

                                        <!-- <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">Name *</label>
                                                <select name="labour_id" class="form-control" required>
                                                    <option value="">Select Labour </option>
                                                    <?php
                                                    if ($labour != '') {
                                                        foreach ($labour as $divi) {
                                                    ?>
                                                            <option value="<?= $divi['eid'] ?>" <?php if ($tag == 'edit') { ?> <?= (($divi['eid'] == $qc['labour_id']) ? 'selected' : '') ?> <?php  } ?>><?= $divi['name'] ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">company*</label>
                                                <input type="text" class="form-control" name="company" placeholder="company" value="<?= $company['name'] ?>" readonly>
                                                <input type="hidden" class="form-control" name="company_id" value="<?= $company['did'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">Quantity*</label>
                                                <input type="number" class="form-control" placeholder="Quantity" name="quantity" <?= (($tag == 'edit') ? "value=".$qc['quantity'] : 'id="quantity"')  ?>  required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">Qc Accepted*</label>
                                                <input type="number" class="form-control" id="qc_accepted" name="qc_accepted" placeholder="Qc Accepted" value="<?= (($tag == 'edit') ? $qc['qc_accepted'] : '')  ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">Qc Rejected*</label>
                                                <input type="number" class="form-control" id="qc_rejected" name="qc_rejected" placeholder="Qc Rejected" value="<?= (($tag == 'edit') ? $qc['qc_rejected'] : '')  ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">Need to pack*</label>
                                                <input type="text" class="form-control" id="need_to_pack" name="need_to_pack" placeholder="Need to pack" value="<?= (($tag == 'edit') ? $qc['need_to_pack'] : '')  ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">Packed*</label>
                                                <input type="text" class="form-control" name="packed" value="<?= (($tag == 'edit') ? $qc['packed'] : '')  ?>" id="packed" placeholder="Packed" readonly>
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">WIP (based on current platform)*</label>
                                                <input type="text" class="form-control" name="wip" value="<?= (($tag == 'edit') ? $qc['wip'] : '')  ?>" placeholder="WIP" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">AVG company( based on current platform)*</label>
                                                <input type="text" class="form-control" value="<?= (($tag == 'edit') ? $qc['avg_company'] : '')  ?>" name="avg_company" placeholder="AVG company" required>
                                            </div>
                                        </div> -->
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">Rejection % *</label>
                                                <input type="text" class="form-control" id="rejection" value="<?= (($tag == 'edit') ? $qc['rejection'] : '')  ?>" placeholder="Rejection %" name="rejection" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">Success % *</label>
                                                <input type="text" class="form-control" id="success" value="<?= (($tag == 'edit') ? $qc['success'] : '')  ?>" placeholder="Success %" name="success" readonly>
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
        // jQuery Function
        getquantity();

        function getquantity() {
            var date = $('#date').val();
            var companyId = $('input[name="company_id"]').val();

            // console.log(date);
            // console.log(companyId);
            $.ajax({
                url: '<?= base_url('Admin_Dashboard/get_quantity') ?>',
                method: 'POST',
                data: {
                    date: date,
                    company_id: companyId
                },
                success: function(response) {
                    $('#quantity').val(response);
                    // console.log('sadsa' + response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        $('#date').on('change', function() {
            getquantity();
        });
    </script>
    <script>
        // Function to calculate and update the values
        function updateValues() {
            // Get the form values
            var quantity = parseInt(document.getElementsByName("quantity")[0].value);
            var qcAccepted = parseInt(document.getElementById("qc_accepted").value);
            var qc_rejected = quantity - qcAccepted;
            document.getElementById("qc_rejected").value = qc_rejected;
            var bundleSize = 25;
            // Calculate the remaining quantity and number of bundles
            var bundlesAvailable = Math.floor(qcAccepted / bundleSize);
            var remainingQuantity = qcAccepted - (bundlesAvailable * bundleSize);
            // Update the "need_to_pack" field with the packed bundlesz
            document.getElementById("need_to_pack").value = remainingQuantity;
            // Update the "packed" field with the remaining quantity
            document.getElementById("packed").value = bundlesAvailable;
            // Calculate the percentage of accept and reject quantity
            var acceptPercentage = (qcAccepted / quantity) * 100;
            var qcRejected = parseInt(document.getElementById("qc_rejected").value);
            var rejectPercentage = (qcRejected / quantity) * 100;
            // Update the accept and reject percentage fields
            document.getElementById("rejection").value = rejectPercentage.toFixed(2);
            document.getElementById("success").value = acceptPercentage.toFixed(2);
        }
        // Add event listener for keyup event on the qc_accepted field
        document.getElementById("qc_accepted").addEventListener("keyup", updateValues);
        // Add event listener for keyup event on the qc_rejected field
        document.getElementById("qc_rejected").addEventListener("keyup", updateValues);
    </script>
</body>

</html>