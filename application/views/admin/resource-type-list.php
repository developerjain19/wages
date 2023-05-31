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

                                <h4 class="card-title">Resource Type List</h4>
                                <a href="<?= base_url('resource-type-add') ?>" class="btn btn-success btn-sm">Add Resource Type <i class="fa fa-plus"></i></a>

                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display">
                                        <thead>
                                            <tr>
                                                <th>SNo</th>
                                                <th>Date</th>
                                                <th>Title</th>
                                                <th>Wages Per Day</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($resource_type)) {
                                                foreach ($resource_type as $row) {
                                            ?>

                                                    <tr class="resource_type" data-id="<?= $row['rid'] ?>">
                                                        <td><?= $i ?></td>
                                                        <td><?= convertDatedmy($row['create_date']) ?></td>
                                                        <td><?= $row['title'] ?></td>
                                                        <td><?= $row['wedge_per_day'] ?></td>
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
        <!-- Required vendors -->
        <?php $this->load->view('template/footer_link'); ?>

        <script>
            $(document).ready(function() {
                $('.resource_type').on('click', function() {
                    var resource_typeId = $(this).data('id');

                    window.location.href = "<?= base_url('resource-type-edit/') ?>" + resource_typeId;
                });
            });
        </script>
</body>

</html>x