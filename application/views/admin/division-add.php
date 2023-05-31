<?php $this->load->view('template/header_link'); ?>

<body>
    <div id="main-wrapper">
        <?php $this->load->view('template/header'); ?>
        <div class="content-body">
            <div class="container-fluid">
                <div class="row justify-content-center mb-5">
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?php if ($tag == 'edit') { ?>
                                        <a href="#" onclick="history.back()"><i class="fa fa-times"></i></a>
                                        <?php } ?><?= ucfirst($tag) ?> Division
                                </h4>

                                <?php if ($tag == 'edit') {
                                ?>
                                    <a href="<?php echo base_url() . 'division-list?BdID=' . encryptId($division[0]['did']) ?>" class="btn btn-danger shadow btn-xs sharp is_permission" onclick="return confirm('Are you sure to delete this data?')"><i class="fa fa-trash"></i></a>
                                <?php } else { ?>
                                    <a href="<?= base_url('division-list') ?>" class="btn btn-success btn-sm">Division List <i class="fa fa-list"></i></a>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post">
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Division Name :</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="name" name="name" value="<?= (($tag == 'edit') ? $division[0]['name'] : '')  ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Location :</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="location" value="<?= (($tag == 'edit') ? $division[0]['location'] : '')  ?>" name="location">
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
        <!-- Required vendors -->
        <?php $this->load->view('template/footer_link'); ?>
</body>

</html>