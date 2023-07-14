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
                                            <label> From date</label>
                                            <input type="date" id="from" class="form-control" value="<?= $from ?>" name="from">
                                        </div>
                                        <div class="col-sm-3">
                                            <label> To date</label>
                                            <input type="date" id="to" class="form-control" value="<?= $to ?>" name="to">
                                        </div>
                                        <?php if (sessionId('position') == '1' || sessionId('position') == '2') { ?>

                                            <div class="col-sm-3">
                                                <label>Select company</label>

                                                <select name="company" class="form-control">
                                                    <option value="">Select company</option>
                                                    <?php
                                                    $company =  getAllRow('tbl_company');
                                                    if ($company != '') {
                                                        foreach ($company as $divi) {  ?>

                                                            <option value="<?= encryptId($divi['did']) ?>" <?= (($labour[0]['company'] == $div) ? 'selected' : '') ?>>
                                                                <?= $divi['name'] ?>
                                                            </option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                        <?php
                                        }
                                        ?>

                                        <div class="col-sm-3 mt-4">
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
                                                <th>company</th>
                                                <th>Present</th>
                                                <th>Absent</th>
                                                <th>Attendance% </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($labour)) {
                                                foreach ($labour as $row) {
                                                    $divIn = getRowById('tbl_company', 'did', $row['company'])[0];

                                                    $all_data = $this->CommonModal->runQuery("SELECT SUM(CASE WHEN attendance = '0' THEN 1 ELSE 0 END) AS total_absent, SUM(CASE WHEN attendance = '1' THEN 1 ELSE 0 END) AS total_present, (SUM(CASE WHEN attendance = '1' THEN 1 ELSE 0 END) / COUNT(attendance)) * 100 AS attendance_percentage FROM tbl_work_update WHERE DATE_FORMAT(create_date, '%Y-%m-%d') BETWEEN '" . $from . "' AND '" . $to . "' AND `labour` = '" . $row['eid'] . "'");
                                            ?>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td><?= $row['name'] ?></td>
                                                        <td><?= $divIn['name'] ?></td>
                                                        <td><?= $all_data[0]['total_present'] ?>
                                                        <td><?= $all_data[0]['total_absent'] ?>
                                                        </td>
                                                        <td><?= number_format($all_data[0]['attendance_percentage'], 2) ?> %
                                                        </td>

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