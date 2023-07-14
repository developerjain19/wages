<?php $this->load->view('admin/cards'); ?>
<div class=" form-head d-flex flex-wrap mb-4 align-items-center mt-3">
    <div class="card-action coin-tabs mt-3 mt-sm-0">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link fs-22 active" data-bs-toggle="tab" href="#Bitcoin" role="tab" aria-selected="true">
                    <svg class="svg-icon" width="24" height="24" viewBox="0 0 20 20" fill="#FFAB2D">
                        <path d="M10,6.978c-1.666,0-3.022,1.356-3.022,3.022S8.334,13.022,10,13.022s3.022-1.356,3.022-3.022S11.666,6.978,10,6.978M10,12.267c-1.25,0-2.267-1.017-2.267-2.267c0-1.25,1.016-2.267,2.267-2.267c1.251,0,2.267,1.016,2.267,2.267C12.267,11.25,11.251,12.267,10,12.267 M18.391,9.733l-1.624-1.639C14.966,6.279,12.563,5.278,10,5.278S5.034,6.279,3.234,8.094L1.609,9.733c-0.146,0.147-0.146,0.386,0,0.533l1.625,1.639c1.8,1.815,4.203,2.816,6.766,2.816s4.966-1.001,6.767-2.816l1.624-1.639C18.536,10.119,18.536,9.881,18.391,9.733 M16.229,11.373c-1.656,1.672-3.868,2.594-6.229,2.594s-4.573-0.922-6.23-2.594L2.41,10l1.36-1.374C5.427,6.955,7.639,6.033,10,6.033s4.573,0.922,6.229,2.593L17.59,10L16.229,11.373z" fill="#FFAB2D"></path>
                    </svg>
                    Overview
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link fs-22 " data-bs-toggle="tab" href="#Ethereum" role="tab" aria-selected="false">
                    <svg width="24" height="24" class="svg-icon" viewBox="0 0 20 20" fill="#00ADA3">
                        <path d="M15.94,10.179l-2.437-0.325l1.62-7.379c0.047-0.235-0.132-0.458-0.372-0.458H5.25c-0.241,0-0.42,0.223-0.373,0.458l1.634,7.376L4.06,10.179c-0.312,0.041-0.446,0.425-0.214,0.649l2.864,2.759l-0.724,3.947c-0.058,0.315,0.277,0.554,0.559,0.401l3.457-1.916l3.456,1.916c-0.419-0.238,0.56,0.439,0.56-0.401l-0.725-3.947l2.863-2.759C16.388,10.604,16.254,10.22,15.94,10.179M10.381,2.778h3.902l-1.536,6.977L12.036,9.66l-1.655-3.546V2.778z M5.717,2.778h3.903v3.335L7.965,9.66L7.268,9.753L5.717,2.778zM12.618,13.182c-0.092,0.088-0.134,0.217-0.11,0.343l0.615,3.356l-2.938-1.629c-0.057-0.03-0.122-0.048-0.184-0.048c-0.063,0-0.128,0.018-0.185,0.048l-2.938,1.629l0.616-3.356c0.022-0.126-0.019-0.255-0.11-0.343l-2.441-2.354l3.329-0.441c0.128-0.017,0.24-0.099,0.295-0.215l1.435-3.073l1.435,3.073c0.055,0.116,0.167,0.198,0.294,0.215l3.329,0.441L12.618,13.182z"></path fill="#00ADA3">
                    </svg> Productivity
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="tab-content">
    <div class="tab-pane fade show active" id="Bitcoin">

       <div class="row">
            <div class="col-xl-12 col-xxl-12 col-lg-12 col-sm-12">

                <?php
                $i = 1;
                if ($alllabour != '') {
                    echo '<div class="cards-box">';

                    foreach ($alllabour as $lab) {
                        $attendance  =  $this->CommonModal->getRowByMoreId('tbl_work_update', array('labour' => $lab['eid'], 'date' => date('Y-m-d')))[0];
                        $percent  =  $this->CommonModal->attendancerunquery($lab['eid'])[0];
                        $daysInMonth = date('t');
                        $per =   ($percent['present'] / $daysInMonth) * 100;
                ?>

                        <div class="card">
                            <div class="content-placeholder">
                                <div class="row">
                                    <div class="col-sm-11">
                                        <div class="noti-content">
                                            <div class="text-content">
                                                <h4 class="">Attendance</h4>
                                                <p><?= $lab['name']  ?></p>
                                            </div>
                                            <p class="lh-0"><b>Status</b> - <?= (($attendance['attendance'] == '1') ? 'Present' : (($attendance['attendance'] == '2') ? 'Half Day'  : 'Absent')) ?></p>
                                            </h6>

                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="<?= number_format($per); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?= number_format($per); ?>%">
                                                    <span class="sr-only"><?= number_format($per); ?>% </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="img"> <i class="flaticon-381-user-7 text-white"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>



                <?php
                    }
                    echo '</div>';
                }
                ?>

            </div>

        </div>
        <div class="row mt-3">
            <div class="col-xl-12 col-xxl-12 col-lg-12 col-sm-12">

                <?php
                $i = 1;
                $date = date('Y-m-d');
                if ($company != '') {
                    echo '<div class="cards-box">';

                    foreach ($company as $com) {

                        $weight =  $this->CommonModal->runQuery("SELECT SUM(`fqc_accepted`) as qty FROM `tbl_work_update` WHERE DATE_FORMAT(`date`, '%Y-%m-%d') = '" . $date . "' AND company = '" . $com['did'] . "' ")[0];

                       
                        $raw  =  $this->CommonModal->getRowByMoreId('tbl_raw_material', array('company' => $com['company'], 'date' => date('Y-m-d')))[0];

                        $dt = (($raw['raw'] != '') ? $raw['raw'] : '0') - (($weight['quantity'] != '') ? $weight['quantity'] : '0');
   
                        $progress =  calculatepercent((($dt > '0') ? $dt : '0'), (($weight['quantity'] != '') ? $weight['quantity'] : '0'));
                ?>

                        <div class="card">
                            <div class="content-placeholder">
                                <div class="row">
                                    <div class="col-sm-11">
                                        <div class="noti-content">
                                            <div class="text-content">
                                                <h4 class="">FQC Pending</h4>
                                                <p><?= $com['name']  ?></p>

                                            </div>
                                            <p class="lh-0"><b>Pending Weight</b> - <?= (($dt != '') ? $dt : '0') ?>KG</p>
                                            </h6>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="<?= ((number_format($progress) <= '0')  ? number_format($progress) : '0'); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?= ((number_format($progress) <= '0')  ? number_format($progress) : '0'); ?>%">
                                                    <span class="sr-only"><?= ((number_format($progress) <= '0')  ? number_format($progress) : '0'); ?>% </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="img"> <i class="flaticon-381-user-7 text-white"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                    echo '</div>';
                }
                ?>

            </div>
        </div>
     
    <?php
    include'chart.php'; ?>
     
        <?php

        if (!empty($company)) {
            foreach ($company as $com) {

                $counting = $this->CommonModal->runQuery("SELECT 
               COUNT(DISTINCT tbl_labour.eid) AS TotalWorker,
               COUNT(DISTINCT CASE WHEN tbl_work_update.create_date >= CURDATE() THEN tbl_work_update.labour END) AS PresentToday,
               SUM(CASE WHEN tbl_work_update.create_date >= CURDATE() THEN tbl_work_update.quantity END) AS TotalFQCWeight,
               CONCAT(ROUND((SUM(CASE WHEN tbl_work_update.create_date >= CURDATE() THEN tbl_work_update.fqc_accepted END) / SUM(CASE WHEN tbl_work_update.create_date >= CURDATE() THEN tbl_work_update.quantity END)) * 100, 2), '%') AS FQCAcceptance,
               SUM(CASE WHEN tbl_qc_update.create_date >= CURDATE() THEN tbl_qc_update.qc_accepted END) AS QCAcceptance,
               SUM(CASE WHEN tbl_qc_update.create_date >= CURDATE() THEN tbl_qc_update.need_to_pack END) AS NeedToPack,
               SUM(CASE WHEN tbl_raw_material.create_date >= CURDATE() THEN tbl_raw_material.raw END) AS RawMaterialToday,
               SUM(CASE WHEN tbl_dispatched.create_date >= CURDATE() THEN tbl_dispatched.bags_dispatched END) AS BagsToDispatch
             FROM 
               tbl_labour
             LEFT JOIN 
               tbl_work_update ON tbl_labour.eid = tbl_work_update.labour
             LEFT JOIN 
               tbl_qc_update ON tbl_work_update.wid = tbl_qc_update.qc_id
             LEFT JOIN 
               tbl_raw_material ON tbl_raw_material.company = '" . $com['did'] . "'
             LEFT JOIN 
               tbl_dispatched ON tbl_dispatched.company = '" . $com['did'] . "'
             WHERE 
               tbl_labour.company = '" . $com['did'] . "'")[0];


        ?>
                <div class="mt-3">
                    <h4 class="fs-20 font-w700 my-4"><?= $com['name'] ?></h4>
                    <div class="testimonial-one px-4 owl-left-nav owl-carousel owl-loaded owl-drag">

                        <div class="items col-sm-12">
                            <div class="card product-grid-card">
                                <div class="card-body">
                                    <div class="new-arrival-product">
                                        <div class="new-arrival-content text-center mt-3">
                                            <h4>Total Worker</h4>

                                            <span class="price"><?= (($counting['TotalWorker'] != '') ? $counting['TotalWorker'] : '0') ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="items col-sm-12">
                            <div class="card product-grid-card">
                                <div class="card-body">
                                    <div class="new-arrival-product">
                                        <div class="new-arrival-content text-center mt-3">
                                            <h4>Present Today</h4>

                                            <span class="price"><?= (($counting['PresentToday'] != '') ? $counting['PresentToday'] : '0') ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="items col-sm-12">
                            <div class="card product-grid-card">
                                <div class="card-body">
                                    <div class="new-arrival-product">
                                        <div class="new-arrival-content text-center mt-3">
                                            <h4>Total FQC Weight</h4>

                                            <span class="price"><?= (($counting['TotalFQCWeight'] != '') ? $counting['TotalFQCWeight'] : '0') ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="items col-sm-12">
                            <div class="card product-grid-card">
                                <div class="card-body">
                                    <div class="new-arrival-product">
                                        <div class="new-arrival-content text-center mt-3">
                                            <h4>FQC Acceptance</h4>

                                            <span class="price"><?= (($counting['FQCAcceptance'] != '') ? $counting['FQCAcceptance'] : '0') ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="items col-sm-12">
                            <div class="card product-grid-card">
                                <div class="card-body">
                                    <div class="new-arrival-product">
                                        <div class="new-arrival-content text-center mt-3">
                                            <h4>QC Acceptance</h4>

                                            <span class="price"><?= (($counting['QCAcceptance'] != '') ? $counting['QCAcceptance'] : '0') ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="items col-sm-12">
                            <div class="card product-grid-card">
                                <div class="card-body">
                                    <div class="new-arrival-product">
                                        <div class="new-arrival-content text-center mt-3">
                                            <h4>Need To Pack</h4>

                                            <span class="price"><?= (($counting['NeedToPack'] != '') ? $counting['NeedToPack'] : '0') ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="items col-sm-12">
                            <div class="card product-grid-card">
                                <div class="card-body">
                                    <div class="new-arrival-product">
                                        <div class="new-arrival-content text-center mt-3">
                                            <h4>Raw Today</h4>

                                            <span class="price"><?= (($counting['RawMaterialToday'] != '') ? $counting['RawMaterialToday'] : '0') ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="items col-sm-12">
                            <div class="card product-grid-card">
                                <div class="card-body">
                                    <div class="new-arrival-product">
                                        <div class="new-arrival-content text-center mt-3">
                                            <h4>Begs To dispatch</h4>

                                            <span class="price"><?= (($counting['BagsToDispatch'] != '') ? $counting['BagsToDispatch']: '0') ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

        <?php
            }
        }
        ?>


    </div>
    <div class="tab-pane fade" id="Ethereum">
        
       <?php 
        $this->load->view('admin/admin_productivity');
         ?>
    </div>
</div>

