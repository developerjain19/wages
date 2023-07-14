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

                                ?>
                                    <a href="<?php echo base_url() . 'raw-material?BdID=' . encryptId($work['id']) ?>" class="btn btn-danger shadow btn-xs sharp is_permission" onclick="return confirm('Are you sure to delete this data?')"><i class="fa fa-trash"></i></a>
                                <?php } else { ?>
                                    <a href="<?= base_url('raw-material') ?>" class="btn btn-success btn-sm">Raw Material<i class="fa fa-list"></i></a>
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
                                                <label class="text-label text-white" for="in">Company :</label>

                                                <select name="company" class="form-control" required>
                                                    <option value="">Select Company</option>
                                                    <?php
                                                    $company =  getAllRow('tbl_company');
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
                                                <label class="text-label text-white" for="raw">Raw Material :</label>
                                                <input type="number" class="form-control" id="raw" name="raw" value="<?= (($tag == 'edit') ? $work['raw'] : '')  ?>" placeholder="Enter Raw Material" required>
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


</body>

</html>