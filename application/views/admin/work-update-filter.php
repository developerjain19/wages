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
                                            <input type="date" id="from" class="form-control" value="<?= $from ?>" name="from" required>
                                        </div>
                                        <div class="col-sm-3">
                                            <label> To date</label>
                                            <input type="date" id="to" class="form-control" value="<?= $to ?>" name="to" required>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Select Division</label>

                                            <select name="division" class="form-control">
                                                <option value="">Select Division </option>
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
                                                <th>Division</th>
                                                <th>Weight </th>
                                                <th>Accepted </th>
                                                <th>Rejected</th>
                                                <th>Accepted% </th>
                                                <th>Rejection% </th>
                                                <th>Need to Pack</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($work)) {
                                                foreach ($work as $row) {
                                                    $divIn = getRowById('tbl_labour', 'eid', $row['labour'])[0];
                                                    $acceptPercentage = ($row['accepted'] / $row['qty']) * 100;
                                                    $rejectPercentage = ($row['rejected'] / $row['qty']) * 100;
                                                    $bundleWeight = 25;
                                                    $need_to_pack = $row['accepted'] %  $bundleWeight;
                                            ?>
                                                    <tr>
                                                        <td><?= $i ?></td>

                                                        <td><?= $divIn['name'] ?></td>
                                                        <td><?= $row['division'] ?></td>
                                                        <td><?= $row['qty'] ?></td>
                                                        <td><?= $row['accepted'] ?></td>
                                                        <td><?= $row['rejected'] ?></td>
                                                        <td><?= $acceptPercentage ?>%</td>
                                                        <td><?= $rejectPercentage ?>%</td>
                                                        <td><?= $need_to_pack ?></td>
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