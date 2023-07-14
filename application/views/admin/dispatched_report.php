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
                                            <label>Select company</label>
                                            <select name="company" class="form-control">
                                                <option value="">Select company </option>
                                                <?php
                                                $company =  getAllRow('tbl_company');
                                                if ($company != '') {
                                                    foreach ($company as $divi) {  ?>
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
                                                    <tr>
                                                        <td><?= $i ?></td>
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

</body>

</html>