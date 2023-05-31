<?php $this->load->view('template/header_link'); ?>

<body>
    <div id="main-wrapper">

        <?php $this->load->view('template/header'); ?>
        <div class="content-body">
            <div class="container-fluid">
                <div class="row justify-content-center">


                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= $title ?></h4>
                                <a href="<?= base_url('work-update-add') ?>" class="btn btn-success btn-sm">Add Work Update <i class="fa fa-plus"></i></a>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display">
                                        <thead>
                                            <tr>
                                                <th>SNo</th>
                                                <th>Date</th>
                                                <th>Labour</th>
                                                <th>division In</th>
                                                <th>Division Out</th>
                                                <th>Quantity</th>
                                                <th>Resource Type</th>
                                                <th>Wages</th>
                                                <th>Incentive</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($work)) {
                                                foreach ($work as $row) {
                                                    $divIn = getRowById('tbl_division', 'did', $row['division_in']);
                                                    $divOut = getRowById('tbl_division', 'did', $row['division_out']);
                                                    $labour = getRowById('tbl_labour', 'eid', $row['labour']);
                                            ?>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td><?= convertDatedmy($row['create_date'])  ?></td>
                                                        
                                                        <td><?= $labour[0]['name'] ?>
                                                        </td>
                                                        <td><?= $divIn[0]['name'] ?>
                                                        </td>
                                                        <td><?= $divOut[0]['name'] ?>
                                                        </td>
                                                        <td><?= $row['quantity'] ?>
                                                        </td>
                                                        <td><?= $row['resource_type_name'] ?>
                                                        </td>
                                                        <td><?= $row['wages'] ?>
                                                        </td>
                                                        <td><?= $row['incentive'] ?>
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
</body>

</html>