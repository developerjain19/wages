<?php $this->load->view('template/header_link'); ?>

<body>
    <div id="main-wrapper">
        <?php $this->load->view('template/header'); ?>
        <div class="content-body">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-sm-8">
                        <div class="card">
                            <?php if ($this->session->userdata('msg') != '') { ?>
                                <?= $this->session->userdata('msg'); ?>
                            <?php  }
                            $this->session->unset_userdata('msg'); ?>
                            <div class="card-header">

                                <h4 class="card-title">Incentive List</h4>
                                <a href="<?= base_url('incentive-range-add') ?>" class="btn btn-success btn-sm">Add Incentive <i class="fa fa-plus"></i></a>

                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display">
                                        <thead>
                                            <tr>
                                                <th>SNo</th>
                                                <th>Date</th>
                                                <th>Min weight</th>
                                                <th>Max weight</th>
                                                <th>Incentive</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($incentive_range)) {
                                                foreach ($incentive_range as $row) {
                                            ?>

                                                    <tr class="incentive_range" data-id="<?= $row['id'] ?>">
                                                        <td><?= $i ?></td>
                                                        <td><?= convertDatedmy($row['create_date']) ?></td>
                                                        <td><?= $row['min_qty'] ?></td>
                                                        <td><?= $row['max_qty'] ?></td>
                                                        <td><?= $row['amount'] ?></td>
                                                    </tr>

                                            <?php
                                                    $i++;
                                                }
                                            } else {
                                            }
                                            ?>

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
                $('.incentive_range').on('click', function() {
                    var incentive_rangeId = $(this).data('id');

                    window.location.href = "<?= base_url('incentive-range-edit/') ?>" + incentive_rangeId;
                });
            });
        </script>
</body>

</html>x