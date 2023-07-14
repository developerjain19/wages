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
                                <?php if (sessionId('position') == '1' || sessionId('position') == '2') { ?>
                                    <a href="<?= base_url('labour-registration') ?>" class="btn btn-success btn-sm">Add Labour <i class="fa fa-plus"></i></a>
                                <?php
                                }
                                ?>

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
                                                <th>company</th>
                                                <th>Contact</th>
                                                <th>Alternate Contact</th>
                                                <th>Address</th>
                                                <th>Resource Type</th>
                                                <th>Bank</th>
                                                <th>Account NO.</th>
                                                <th>IFSC</th>
                                                <th>UPI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($labour)) {
                                                foreach ($labour as $row) {
                                                    $resource = getRowById('tbl_resource_type', 'rid', $row['resourcetype']);
                                                    $company = getRowById('tbl_company', 'did', $row['company'])
                                            ?>
                                                    <tr class="labour" data-id="<?= $row['eid'] ?>">
                                                        <td><?= $i ?></td>
                                                        <td><?= convertDatedmy($row['create_date'])  ?></td>
                                                        <td><img src="<?= setImage($row['image'], 'uploads/labour/') ?>" class="circelimg"> <?= $row['name'] ?></td>
                                                        <td><?= $row['adhaar'] ?></td>
                                                        <td><?= $company[0]['name'] ?>
                                                        </td>
                                                        <td><?= $row['number'] ?>
                                                        </td>
                                                        <td><?= $row['alt_number'] ?>
                                                        </td>
                                                        <td><?= $row['address'] ?>
                                                        </td>
                                                        <td><?= (($resource != '') ? $resource[0]['title'] : '')  ?>
                                                        </td>
                                                        <td><?= $row['bank'] ?>
                                                        </td>
                                                        <td><?= $row['ac_no'] ?>
                                                        </td>
                                                        <td><?= $row['ifsc'] ?>
                                                        </td>
                                                        <td><?= $row['upi'] ?>
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
                $('.labour').on('click', function() {
                    var labourId = $(this).data('id');

                    window.location.href = "<?= base_url('labour-edit/') ?>" + labourId;
                });
            });
        </script>
</body>

</html>