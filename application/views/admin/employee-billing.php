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


                                <form method="get">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Select Month</label>
                                            <input type="month" id="bdaymonth" class="form-control" value="<?= $month ?>" name="month">
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Select Division</label>

                                            <select name="division" class="form-control">
                                                <option value="">Select Division</option>
                                                <?php
                                                $division =  getAllRow('tbl_division');
                                                if ($division != '') {
                                                    foreach ($division as $divi) {  ?>

                                                        <option value="<?= encryptId($divi['did']) ?>" <?= (($divi['did'] == $div) ? 'selected' : '') ?>>
                                                            <?= $divi['name'] ?>
                                                        </option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>

                                        </div>
                                        <div class="col-sm-5 mt-4">
                                            <input type="submit" value="Submit" class="btn btn-info">
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example23" class="display">
                                        <thead>
                                            <tr>
                                                <th>SNo</th>
                                                <th>Name</th>
                                                <th>Division</th>
                                                <th>TotalWeight </th>
                                                <th>Salary </th>
                                                <th>Incentive</th>
                                                <th>Total Salary</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            $date = date('Y-m-d');
                                            if (!empty($labour)) {
                                                foreach ($labour as $row) {
                                                    $divIn = getRowById('tbl_division', 'did', $row['division'])[0];

                                                    $all_data = $this->CommonModal->runQuery("SELECT MONTH(create_date) AS month, SUM(CASE WHEN attendance = '1' THEN wages WHEN attendance = '2' THEN wages / 2 ELSE 0 END) AS total_salary , SUM(CASE WHEN attendance = '1' THEN quantity WHEN attendance = '2' THEN quantity  ELSE 0 END) AS total_weight FROM tbl_work_update WHERE DATE_FORMAT(create_date, '%Y-%m') =  '" . $month . "' AND `labour` = '" . $row['eid'] . "'  GROUP BY MONTH(create_date)");

                                                    $incentive = $this->CommonModal->runQuery("SELECT * FROM `tbl_resource_type` `res` JOIN `tbl_insentive` `ins` ON `res`.`rid` = `ins`.`rid` WHERE `ins`.`min_qty` <= '" . $all_data[0]['total_weight'] . "' AND `ins`.`max_qty` >= '" . $all_data[0]['total_weight'] . "' ");

                                            ?>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td><?= $row['name'] ?></td>
                                                        <td><?= $divIn['name'] ?></td>
                                                        <td><?= $all_data[0]['total_weight'] ?>
                                                        <td><?= $all_data[0]['total_salary'] ?>
                                                        </td>
                                                        <td><?= $incentive[0]['amount'] ?>
                                                        </td>
                                                        <td><?php $totalSum = $all_data[0]['total_salary'] + $incentive[0]['amount'];
                                                            echo $totalSum; ?> </td>
                                                    </tr>

                                            <?php
                                                    $i++;
                                                }
                                            } else {
                                                echo  '
                                                <tr>
                                                <td class="text-center" colspan="7">Sorry ! No data found</td>
                                                </tr>';
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

</body>

</html>