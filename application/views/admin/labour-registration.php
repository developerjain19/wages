<?php $this->load->view('template/header_link'); ?>

<body>
    <div id="main-wrapper">

        <?php $this->load->view('template/header'); ?>
        <div class="content-body">
            <div class="container-fleid">
                <div class="row justify-content-center mb-5">
                    <div class="col-xl-6 col-lg-12">
                        <div class="card pb-5 mt-5">
                            <div class="card-header">

                                <h4 class="card-title"><?php if ($tag == 'edit') { ?>
                                        <a href="#" onclick="history.back()"><i class="fa fa-times"></i></a>
                                        <?php } ?><?= $title ?>
                                </h4>

                                <?php if ($tag == 'edit') {
                                    if ($this->delete == '1') {
                                ?>
                                        <a href="<?php echo base_url() . 'labour-list?BdID=' . encryptId($labour[0]['eid']) ?>" class="btn btn-danger shadow btn-xs sharp is_permission" onclick="return confirm('Are you sure to delete this data?')"><i class="fa fa-trash"></i></a>
                                    <?php
                                    }
                                } else { ?>
                                    <a href="<?= base_url('labour-list') ?>" class="btn btn-success btn-sm">Labour List <i class="fa fa-list"></i></a>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Name:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" placeholder="Enter your name" value="<?= (($tag == 'edit') ? $labour[0]['name'] : '')  ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Aadhaar:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="adhaar" placeholder="Enter your Aadhaar number" value="<?= (($tag == 'edit') ? $labour[0]['adhaar'] : '')  ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Division:</label>
                                            <div class="col-sm-10">


                                                <select name="division" class="form-control" required>
                                                    <option value="">Select Division</option>
                                                    <?php
                                                    $division =  getAllRow('tbl_division');
                                                    if ($division != '') {
                                                        foreach ($division as $divi) {  ?>

                                                            <option value="<?= $divi['did'] ?>" <?= (($tag == 'edit') ? (($labour[0]['division'] == $divi['did']) ? 'selected' : '') : '')  ?>>
                                                                <?= $divi['name'] ?>
                                                            </option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Contact:</label>
                                            <div class=" col-sm-10">
                                                <input type=" text" class="form-control" name="number" placeholder="Enter your contact number" value="<?= (($tag == 'edit') ? $labour[0]['number'] : '')  ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Alternate Contact:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="alt_number" placeholder="Enter your alternate contact number" value="<?= (($tag == 'edit') ? $labour[0]['alt_number'] : '')  ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Address:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="address" placeholder="Enter your address" value="<?= (($tag == 'edit') ? $labour[0]['address'] : '')  ?>" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Resource Type:</label>
                                            <div class="col-sm-10">

                                                <select name="resourcetype" class="form-control" required>
                                                    <option value="">Select Type</option>

                                                    <?php
                                                    $resourcetype =  getAllRow('tbl_resource_type');
                                                    if ($resourcetype != '') {
                                                        foreach ($resourcetype as $resource) {
                                                    ?>

                                                            <option value="<?= $resource['rid'] ?>" <?= (($tag == 'edit') ? (($labour[0]['resourcetype'] == $resource['rid']) ? 'selected' : '') : '')  ?>>
                                                                <?= $resource['title'] ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>

                                                </select>

                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Image:</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="img">
                                                <?php if ($tag == 'edit') { ?>
                                                    <input type="hidden" class="form-control" name="image" value="<?= $labour[0]['image'] ?>">
                                                    <img src="<?= base_url('uploads/labour/') . $labour[0]['image'] ?>" class="circelimg" />
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Bank Name:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="bank" placeholder="Enter your bank name" value="<?= (($tag == 'edit') ? $labour[0]['bank'] : '')  ?>" required>
                                            </div>
                                        </div>

                                       

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Account No:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="ac_no" placeholder="Enter your account no" value="<?= (($tag == 'edit') ? $labour[0]['ac_no'] : '')  ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">IFSC Code:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="ifsc" placeholder="Enter your IFSC" value="<?= (($tag == 'edit') ? $labour[0]['ifsc'] : '')  ?>" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">UPI ID :</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="upi" placeholder="Enter your UPI ID" value="<?= (($tag == 'edit') ? $labour[0]['upi'] : '')  ?>" required>
                                            </div>
                                        </div>


                                       
                                        <div class="row">
                                            <div class="col-sm-5"></div>
                                            <?php if ($this->edit == '1') { ?>
                                                <div class="col-sm-5">
                                                    <input type="submit" value="Submit" class="btn btn-info">
                                                </div>
                                            <?php }  ?>
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