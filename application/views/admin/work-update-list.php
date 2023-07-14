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
                                <h4 class="card-title"><?= $title ?></h4>
                                <?php if (sessionId('position') != '5') { ?>
                                    <a href="<?= base_url('work-update-add') ?>" class="btn btn-success btn-sm">Add Work Update <i class="fa fa-plus"></i></a>
                                <?php }
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display">
                                        <thead>
                                            <tr>
                                                <th>SNo</th>
                                                <th>Date</th>
                                                <th>Labour</th>
                                                <th>company</th>
                                                <th>Quantity</th>
                                                <!-- <th>Resource Type</th> -->
                                                <th>Wages</th>
                                                <th>FQc Accepted</th>
                                                <th>FQc Rejected</th>
                                                <th>Attendance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($work)) {
                                                foreach ($work as $row) {
                                                    $divIn = getRowById('tbl_company', 'did', $row['company']);

                                                    $labour = getRowById('tbl_labour', 'eid', $row['labour']);
                                            ?>
                                                    <tr class="<?= ((sessionId('position') == '5') ? '' : 'work_update'); ?>" data-id="<?= $row['wid'] ?>">
                                                        <td><?= $i ?></td>
                                                        <td><?= convertDatedmy($row['create_date'])  ?></td>
                                                        <td><?= $labour[0]['name'] ?>
                                                        </td>
                                                        <td><?= $divIn[0]['name'] ?>
                                                        </td>

                                                        <td><?= $row['quantity'] ?>
                                                        </td>
                                                        <!-- <td><?= $row['resource_type_name'] ?>
                                                        </td> -->
                                                        <td><?= $row['wages'] ?>
                                                        </td>
                                                        <td><?= $row['fqc_accepted'] ?>
                                                        </td>
                                                        <td><?= $row['fqc_rejected'] ?>
                                                        </td>
                                                        <td> <?= (($row['attendance'] == '1') ? 'Present' : (($row['attendance'] == '2') ? 'Half Day'  : 'Absent')) ?>
                                                        </td>
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
        <?php $this->load->view('template/footer_link'); ?>
        <script>
            $(document).ready(function() {
                $('.work_update').on('click', function() {
                    var work_updateId = $(this).data('id');
                    window.location.href = "<?= base_url('work-update-edit/') ?>" + work_updateId;
                });
            });
        </script>
</body>

</html>