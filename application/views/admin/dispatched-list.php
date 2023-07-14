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
                                                <th>From Date</th>
                                                <th>To Date</th>
                                                <th>Company</th>
                                                <th>Previous Pending Bags</th>
                                                <th>New Begs</th>
                                                <th>Total Bags</th>
                                                <th>Bags Dispatched</th>
                                                <th>Remaining Bags</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($bags)) {
                                                foreach ($bags as $row) {
                                                    $divIn = getRowById('tbl_company', 'did', $row['company']);
                                            ?>
                                                    <tr class="<?= ((sessionId('position') == '1' || sessionId('position') == '2') ? 'dispatched' : ''); ?>" data-id="<?= $row['id'] ?>">
                                                        <td><?= $i ?></td>
                                                        <td><?= convertDatedmy($row['create_date'])  ?></td>
                                                        <td><?= $row['from_date']  ?></td>
                                                        <td><?= $row['to_date']  ?></td>
                                                        <td><?= $divIn[0]['name'] ?>
                                                        </td>
                                                        <td><?= $row['pending_bags'] ?>
                                                        </td>
                                                        <td><?= $row['new_bags'] ?>
                                                        </td>

                                                        <td><?= $row['total_bags'] ?>
                                                        </td>
                                                        <td><?= $row['bags_dispatched'] ?>
                                                        </td>
                                                        <td><?= $row['remaining_bags'] ?>
                                                        </td>

                                                    </tr>
                                            <?php
                                                    $i++;
                                                }
                                            } else {
                                                
                                            }
                                            ?>
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
                $('.dispatched').on('click', function() {
                    var dispatchedId = $(this).data('id');
                    window.location.href = "<?= base_url('dispatch-edit/') ?>" + dispatchedId;
                });
            });
        </script>
</body>

</html>