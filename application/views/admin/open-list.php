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

                                        <?php if (sessionId('position') == '1' || sessionId('position') == '2') { ?>

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
                                                <th>Pending</th>
                                                <th>company</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($qc)) {
                                                foreach ($qc as $row) {

                                            ?>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td><?= $row['pending'] ?>KG</td>
                                                        <td><?= $row['company'] ?></td>
                                                    </tr>
                                            <?php
                                                    $i++;
                                                }
                                            }  else {
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