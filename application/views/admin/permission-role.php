<?php $this->load->view('template/header_link'); ?>

<body>
    <div id="main-wrapper">

        <?php $this->load->view('template/header'); ?>
        <div class="content-body">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Permission Role</h4>
                                <?php if ($this->session->userdata('msg') != '') { ?>
                                    <?= $this->session->userdata('msg'); ?>
                                <?php  }
                                $this->session->unset_userdata('msg'); ?>
                            </div>
                            <form method="post">
                                <div class="card-body text-center">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-responsive-sm">
                                            <thead>
                                                <tr>
                                                    <th width="20%">User</th>
                                                    <th width="20%">Work Update</th>
                                                    <th width="20%">QC</th>
                                                    <th width="20%">Edit</th>
                                                    <th width="20%">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $i = 1;
                                                if (!empty($permission)) {
                                                    foreach ($permission as $row) {
                                                ?>

                                                        <tr>
                                                            <th><?= $row['role_name'] ?></th>
                                                            <td>
                                                                <div class="form-check custom-checkbox mb-3 checkbox-success">
                                                                    <input value="1" name="work_update[]" type="checkbox" class="form-check-input float-none" id="work_update<?= $row['role'] ?>" <?= (($row['work_update'] == '1') ? 'checked' : '') ?>>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check custom-checkbox mb-3 checkbox-success">
                                                                    <input value="1" name="qc[]" type="checkbox" class="form-check-input float-none" id="qc<?= $row['role'] ?>" <?= (($row['qc'] == '1') ? 'checked' : '') ?>>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check custom-checkbox mb-3 checkbox-success">
                                                                    <input value="1" name="edit[]" type="checkbox" class="form-check-input float-none" id="edit<?= $row['role'] ?>" <?= (($row['edit'] == '1') ? 'checked' : '') ?>>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check custom-checkbox mb-3 checkbox-success">
                                                                    <input value="1" name="delete[]" type="checkbox" class="form-check-input float-none" id="delete<?= $row['role'] ?>" <?= (($row['delete'] == '1') ? 'checked' : '') ?>>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                        <input type="hidden" value="<?= $row['role'] ?>" name="role[]">
                                                <?php
                                                        $i++;
                                                    }
                                                } else {
                                                    echo  'No data';
                                                }
                                                ?>



                                            </tbody>
                                        </table>
                                    </div>


                                    <input  type="submit" value="Submit" class="btn btn-info">
                                </div>

                            </form>
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