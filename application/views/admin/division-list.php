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
                                
                                <h4 class="card-title">Division List</h4>
                                <a href="<?= base_url('division-add') ?>" class="btn btn-success btn-sm">Add division <i class="fa fa-plus"></i></a>
                               
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display">
                                        <thead>
                                            <tr>
                                                <th>SNo</th>
                                                <th>Name</th>
                                                <th>Location</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($division)) {
                                                foreach ($division as $row) {
                                            ?>

                                                    <tr class="division" data-id="<?= $row['did'] ?>">
                                                        <td><?= $i ?></td>
                                                        <td><?= $row['name'] ?></td>
                                                        <td><?= $row['location'] ?></td>
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
                $('.division').on('click', function() {
                    var divisionId = $(this).data('id');

                    window.location.href = "<?= base_url('division-edit/') ?>" + divisionId;
                });
            });
        </script>
</body>

</html>