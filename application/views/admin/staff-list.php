<?php $this->load->view('template/header_link'); ?>

<body>
    <div id="main-wrapper">
        <?php $this->load->view('template/header'); ?>
        <div class="content-body">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <?php if ($this->session->userdata('msg') != '') { ?>
                                <?= $this->session->userdata('msg'); ?>
                            <?php  }
                            $this->session->unset_userdata('msg'); ?>
                            <div class="card-header">
                                <h4 class="card-title">Staff List</h4>
                                <a href="<?= base_url('staff-registration') ?>" class="btn btn-success btn-sm">Add Staff <i class="fa fa-plus"></i></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display">
                                        <thead>
                                            <tr>
                                                <th>SNo</th>
                                                <th>Reg.Date</th>
                                                <th>Name</th>
                                                <th>Mobile No.</th>
                                                <th>Email</th>
                                                <th>Category</th>
                                                <th>company</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;

                                            if (!empty($staff)) {
                                                foreach ($staff as $row) {
                                                    $diva = [];

                                                    $company =  getAllRow('tbl_company');
                                                    if ($company != '') {
                                                        foreach ($company as $divi) {
                                                            $optionss = json_decode($row['company'], true);
                                                            if (!empty($optionss)) {
                                                                if (in_array($divi['did'], $optionss)) {
                                                                    $diva[] = $divi['name'];
                                                                }
                                                            }
                                                        }
                                                    }
                                                    $di2 =  implode(',', $diva);

                                            ?>
                                                    <tr class="staff" data-id="<?= $row['uid'] ?>">
                                                        <td><?= $i ?></td>
                                                        <td><?= convertDatedmy($row['create_date'])  ?></td>
                                                        <td><?= $row['name'] ?></td>
                                                        <td><?= $row['number'] ?></td>
                                                        <td><?= $row['email'] ?> </td>
                                                        <td><?= (($row['position'] == '1')  ? 'Admin' : (($row['position'] == '2')  ? 'Manager' : (($row['position'] == '3')  ? 'Team Leader' : (($row['position'] == '4')  ? 'Accounts' : (($row['position'] == '5')  ? 'QC' : ''))))) ?></td>
                                                        <td>
                                                             <?= (($row['position'] == '1' || $row['position'] == '2')  ? 'All' : $di2)   ?> </td>
                                                    </tr>
                                            <?php
                                                    $i++;
                                                }
                                            } else {
                                            }
                                            ?>
                                    </table>
                                    </tbody>
                                    </table>
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
        <script>
            $(document).ready(function() {
                $('.staff').on('click', function() {
                    var staffId = $(this).data('id');
                    window.location.href = "<?= base_url('staff-edit/') ?>" + staffId;
                });
            });
        </script>
</body>

</html>