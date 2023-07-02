<?php $this->load->view('template/header_link'); ?>

<body>
    <div id="main-wrapper">

        <?php $this->load->view('template/header'); ?>
        <div class="content-body">
            <div class="container-fluid">
                <div class="row justify-content-center mb-5">
                    <?php if ($this->session->userdata('msg') != '') { ?>
                        <?= $this->session->userdata('msg'); ?>
                    <?php  }
                    $this->session->unset_userdata('msg'); ?>

                    <div class="col-xl-6 col-lg-12">
                        <div class="card">


                            <div class="card-header">
                                <h4 class="card-title">Login Password change for <?= $staff['name'] ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post">


                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">New Password :</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="newpassword" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Confirm Password :</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="confirmnewpassword" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5"></div>
                                            <div class="col-sm-5">
                                                <input type="submit" value="Submit" class="btn btn-info">
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
        <?php $this->load->view('template/footer_link'); ?>
</body>

</html>