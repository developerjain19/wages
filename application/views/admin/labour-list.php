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
                                <h4 class="card-title">Labour List</h4>
                                <a href="<?= base_url('labour-registration') ?>" class="btn btn-success btn-sm">Add Labour <i class="fa fa-plus"></i></a>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display">
                                        <thead>
                                            <tr>
                                                <th>SNo</th>
                                                <th>Reg.Date</th>
                                                <th>Name</th>
                                                <th>Aadhaar</th>
                                                <th>Division</th>
                                                <th>Contact</th>
                                                <th>Alternate Contact</th>
                                                <th>Address</th>
                                                <th>Resource Type</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($labour)) {
                                                foreach ($labour as $row) {
                                                    $resource = getRowById('tbl_resource_type', 'rid', $row['resourcetype']);
                                                    $division = getRowById('tbl_division', 'did', $row['division'])
                                            ?>
                                                    <tr class="labour" data-id="<?= $row['eid'] ?>">
                                                        <td><?= $i ?></td>
                                                        <td><?= convertDatedmy($row['create_date'])  ?></td>
                                                        <td><img src="<?= setImage($row['image'], 'uploads/labour/') ?>" class="circelimg"> <?= $row['name'] ?></td>
                                                        <td><?= $row['adhaar'] ?></td>
                                                        <td><?=  $division[0]['name'] ?>
                                                        </td>
                                                        <td><?= $row['number'] ?>
                                                        </td>
                                                        <td><?= $row['alt_number'] ?>
                                                        </td>
                                                        <td><?= $row['address'] ?>
                                                        </td>
                                                        <td><?= (($resource != '') ? $resource[0]['title'] : '')  ?>
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
        <!-- Required vendors -->
        <?php $this->load->view('template/footer_link'); ?>

        <script>
            $(document).ready(function() {
                $('.labour').on('click', function() {
                    var labourId = $(this).data('id');

                    window.location.href = "<?= base_url('labour-edit/') ?>" + labourId;
                });
            });
        </script>
</body>

</html>