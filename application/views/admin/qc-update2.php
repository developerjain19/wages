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
                            </div>
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">


                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">Name *</label>
                                                <input type="text" name="labour" class="form-control" placeholder="labour Name" value="<?= $labour['name'] ?>" readonly>
                                                <input type="hidden" name="labour_id" class="form-control" placeholder="labour" value="<?= $work['labour'] ?>">
                                            </div>
                                        </div>
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
                                                <input type="number" class="form-control" placeholder="Quantity" name="quantity" value="<?= $work['quantity'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">Qc Accepted*</label>
                                                <input type="number" class="form-control" id="qc_accepted" name="qc_accepted" placeholder="Qc Accepted" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">Qc Rejected*</label>
                                                <input type="number" class="form-control" id="qc_rejected" name="qc_rejected" placeholder="Qc Rejected" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">Need to pack*</label>
                                                <input type="text" class="form-control" id="need_to_pack" name="need_to_pack" placeholder="Need to pack" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">Packed*</label>
                                                <input type="text" class="form-control" name="packed" id="packed" placeholder="Packed" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">WIP (based on current platform)*</label>
                                                <input type="text" class="form-control" name="wip" placeholder="WIP" value="">
                                            </div>
                                        </div>

                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">AVG company( based on current platform)*</label>
                                                <input type="text" class="form-control" name="avg_company" placeholder="AVG company" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">Rejection % *</label>
                                                <input type="text" class="form-control" id="rejection" placeholder="Rejection %" name="rejection" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-white">Success % *</label>
                                                <input type="text" class="form-control" id="success" placeholder="Success %" name="success" readonly>
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

    <!-- value="" vendors -->
    <?php $this->load->view('template/footer_link'); ?>
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
            document.getElementById("rejection").value = rejectPercentage.toFixed(2) + "%";
            document.getElementById("success").value = acceptPercentage.toFixed(2) + "%";
        }

        // Add event listener for keyup event on the qc_accepted field
        document.getElementById("qc_accepted").addEventListener("keyup", updateValues);

        // Add event listener for keyup event on the qc_rejected field
        document.getElementById("qc_rejected").addEventListener("keyup", updateValues);
    </script>



</body>

</html>