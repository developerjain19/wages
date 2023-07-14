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
                                        <?php } ?><?= $title ?>
                                </h4>

                                <div>
                                    <?php if ($tag == 'edit') {
                                    ?>
                                        <a href="<?php echo base_url() . 'staff-change-password/' . $staff[0]['uid'] ?>" class="mr-5"><img src="<?= base_url() ?>assets/passicon.png" alt="password icon" height="30px"> </a>

                                        <a href="<?php echo base_url() . 'staff-list?BdID=' . encryptId($staff[0]['uid']) ?>" class="btn btn-danger shadow btn-xs sharp is_permission" onclick="return confirm('Are you sure to delete this data?')"><i class="fa fa-trash"></i> </a>


                                    <?php } else { ?>
                                        <a href="<?= base_url('staff-list') ?>" class="btn btn-success btn-sm">Staff List <i class="fa fa-list"></i></a>
                                    <?php
                                    }
                                    ?>
                                </div>


                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post">
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Name:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="name" name="name" value="<?= (($tag == 'edit') ? $staff[0]['name'] : '')  ?>" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Contact No:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="number" name="number" maxlength="12" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required value="<?= (($tag == 'edit') ? $staff[0]['number'] : '')  ?>">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Email:</label>
                                            <div class="col-sm-10">
                                                <input type="email" id="email" name="email" class="form-control" value="<?= (($tag == 'edit') ? $staff[0]['email'] : '')  ?>">
                                            </div>
                                        </div>

                                        <?php if ($tag == 'add') { ?>
                                            <div class="mb-3 row">
                                                <label class="col-sm-2 col-form-label text-white">Password:</label>
                                                <div class="col-sm-10">
                                                    <input type="password" id="password" class="form-control" name="password" minlength="6" title="password length must be  6 or more characters" required>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Category:</label>
                                            <div class="col-sm-10">
                                                <select id="category" name="position" class="form-control">
                                                    <option value="">Select Category </option>
                                                    <option value="1" <?= (($tag == 'edit') ? (($staff[0]['position'] == '1') ? 'selected' : '') : '')  ?>>Admin</option>
                                                    <option value="2" <?= (($tag == 'edit') ? (($staff[0]['position'] == '2') ? 'selected' : '') : '')  ?>>Manager</option>
                                                    <option value="3" <?= (($tag == 'edit') ? (($staff[0]['position'] == '3') ? 'selected' : '') : '')  ?>>Team Leader</option>
                                                    <!-- <option value="4" <?= (($tag == 'edit') ? (($staff[0]['position'] == '4') ? 'selected' : '') : '')  ?>>Accounts</option> -->
                                                    <option value="5" <?= (($tag == 'edit') ? (($staff[0]['position'] == '5') ? 'selected' : '') : '')  ?>>QC</option>
                                                </select>
                                            </div>
                                        </div>


                                        <?php if ($tag == 'add') { ?>

                                            <div class="mb-3 row" id="companyContainer" style="display: none;">
                                                <label class="col-sm-2 col-form-label text-white">company :</label>
                                                <div class="col-sm-10">
                                                    <select name="company[]" multiple class="default-select form-control wide mt-3">
                                                        <option disabled>Select company</option>
                                                        <?php
                                                        $company =  getAllRow('tbl_company');
                                                        if ($company != '') {
                                                            foreach ($company as $divi) {
                                                        ?>

                                                                <option value="<?= $divi['did'] ?>">
                                                                    <?= $divi['name'] ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>



                                        <?php
                                        } else if ($tag == 'edit') {
                                        ?>

                                            <div class="mb-3 row" id="companyContainer" style="display: none;">
                                                <label class="col-sm-2 col-form-label text-white">company :</label>
                                                <div class="col-sm-10">
                                                    <select name="company[]" multiple class="default-select form-control wide mt-3">
                                                        <option disabled>Select company</option>
                                                        <?php
                                                        $company =  getAllRow('tbl_company');
                                                        if ($company != '') {
                                                            foreach ($company as $divi) {

                                                                $optionss = json_decode($staff[0]['company'], true);
                                                        ?>

                                                                <option value="<?= $divi['did'] ?>" <?php if ($optionss != null) { ?> <?= ((in_array($divi['did'], $optionss)) ? 'selected' : '') ?> <?php } ?>>
                                                                    <?= $divi['name'] ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php } else {
                                        }

                                        ?>
                                        <div class="row">
                                            <div class="col-sm-5"></div>
                                            <?php if ($this->edit == '1') { ?>
                                                <div class="col-sm-5">
                                                    <input type="submit" value="Submit" class="btn btn-info">
                                                </div>
                                            <?php
                                            }
                                            ?>
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


<script>
    $(document).ready(function() {
        function toggleCompanyField() {
            var category = $('#category').val();
            var companyContainer = $('#companyContainer');

            if (category === '3' || category === '5') {
                companyContainer.show();
            } else {
                companyContainer.hide();
            }
        }

        $('#category').change(toggleCompanyField);

        toggleCompanyField();
    });
</script>