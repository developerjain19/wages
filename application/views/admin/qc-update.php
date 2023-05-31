<?php $this->load->view('template/header_link'); ?>

<body>
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
      
        <?php $this->load->view('template/header'); ?>



        <div class="content-body" style="padding-bottom: 100px;">

            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">QC Update</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label text-white">QC Status*</label>
                                            <input type="text" name="status" class="form-control" placeholder="Status" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label text-white">Name *</label>
                                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label text-white">Division*</label>
                                            <input type="text" class="form-control" placeholder="Division" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label text-white">Weight*</label>
                                            <input type="text" class="form-control" placeholder="Weight" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label text-white">Qc Quantity*</label>
                                            <input type="text" class="form-control" placeholder="Qc Quantity" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label text-white">Qc Rejected*</label>
                                            <input type="text" class="form-control" placeholder="Qc Rejected" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label text-white">Need to pack*</label>
                                            <input type="text" class="form-control" placeholder="Need to pack" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label text-white">Packed*</label>
                                            <input type="text" class="form-control" placeholder="Packed" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label text-white">WIP (based on current platform)*</label>
                                            <input type="text" class="form-control" placeholder="WIP" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label text-white">No of Labours available today*</label>
                                            <input type="text" class="form-control" placeholder="No of Labours available today" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label text-white">AVG Division( based on current platform)*</label>
                                            <input type="text" class="form-control" placeholder="AVG Division" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label text-white">Rejection % *</label>
                                            <input type="text" class="form-control" placeholder="Rejection % " required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label text-white">Success % *</label>
                                            <input type="text" class="form-control" placeholder="Success % " required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb-2 text-center">
                                        <button type="button" class="btn btn-primary">Submit</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>





            </div>
        </div>

        <?php $this->load->view('template/footer'); ?>
    </div>

    <!-- Required vendors -->
    <?php $this->load->view('template/footer_link'); ?>

</body>

</html>