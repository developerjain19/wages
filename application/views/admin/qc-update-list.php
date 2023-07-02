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
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display">
                                        <thead>
                                            <tr>
                                                <th>SNo</th>
                                                <th>Date</th>
                                                <th>Labour</th>
                                                <th>division</th>
                                                <th>Quantity</th>
                                                <th>Qc Accepted</th>
                                                <th>Qc Rejected</th>
                                                <th>Need to pack</th>
                                                <th>Packed</th>
                                                <th>WIP</th>
                                                <th>AVG Division</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($qc)) {
                                                foreach ($qc as $row) {
                                                    $lab = getRowById('tbl_labour', 'eid', $row['labour_id'])[0];
                                            ?>
                                                    <tr class="<?= ((sessionId('position') == '3') ? '' : 'qc_update'); ?>" data-id="<?= $row['id'] ?>">
                                                        <td><?= $i ?></td>
                                                        <td><?= convertDatedmy($row['create_date'])  ?></td>
                                                        <td><?= $lab['name'] ?>
                                                        </td>
                                                        <td><?= $row['division'] ?>
                                                        </td>
                                                        <td><?= $row['quantity'] ?>
                                                        </td>
                                                        <td><?= $row['qc_accepted'] ?>
                                                        </td>
                                                        <td><?= $row['qc_rejected'] ?>
                                                        </td>
                                                        <td><?= $row['need_to_pack'] ?>
                                                        </td>
                                                        <td><?= $row['packed'] ?>
                                                        </td>
                                                        <td><?= $row['wip'] ?>
                                                        </td>
                                                        <td><?= $row['avg_division'] ?>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    $i++;
                                                }
                                            } else {
                                                echo  'No data';
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
                $('.qc_update').on('click', function() {
                    var qc_updateId = $(this).data('id');
                    window.location.href = "<?= base_url('qc-update-edit/') ?>" + qc_updateId;
                });
            });
        </script>
</body>

</html>