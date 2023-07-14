<div class="row mt-3">
    <div class="col-xl-12 col-xxl-12 col-lg-12 col-sm-12">

        <?php
        $i = 1;
        $date = date('Y-m-d');
        if ($company != '') {
            echo '<div class="cards-box">';

            foreach ($company as $com) {

                $weight =  $this->CommonModal->runQuery("SELECT SUM(quantity) as qty , SUM(fqc_accepted) as accept  FROM `tbl_work_update` WHERE company = '" .  $com['did'] . "'  AND `date` = '" . $date . "' ");[0];
                 $progress =  calculatepercent((($weight['accept'] > '0') ? $weight['accept'] : '0'), (($weight['qty'] != '') ? $weight['qty'] : '0'));
        ?>

                <div class="card">
                    <div class="content-placeholder">
                        <div class="row">
                            <div class="col-sm-11">
                                <div class="noti-content">
                                    <div class="text-content">
                                        <h4 class="">FQC Rate</h4>
                                        <p><?= $com['name']  ?></p>

                                    </div>
                                    <p class="lh-0"><b>FQC Accepted</b> - <?= (($weight['accept'] != '') ? $weight['accept'] : '0') ?>KG</p>
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

<div class="row mt-5">
    <div class="col-xl-12 col-xxl-12 col-lg-12 col-sm-12">

        <?php
        $i = 1;
        if ($alllabour != '') {
            echo '<div class="cards-box">';

            foreach ($alllabour as $lab) {
                $weight  =  $this->CommonModal->getRowByMoreId('tbl_work_update', array('labour' => $lab['eid'], 'date' => date('Y-m-d')))[0];
                $raw  =  $this->CommonModal->getRowByMoreId('tbl_raw_material', array('company' => $lab['company'], 'date' => date('Y-m-d')))[0];
                $progress =  calculatepercent((($weight['quantity'] != '') ? $weight['quantity'] : '0'), (($raw['raw'] != '') ? $raw['raw'] : '0'));
        ?>

                <div class="card">
                    <div class="content-placeholder">
                        <div class="row">
                            <div class="col-sm-11">
                                <div class="noti-content">
                                    <div class="text-content">
                                        <h4 class="">Work Today</h4>
                                        <p><?= $lab['name']  ?></p>

                                    </div>
                                    <p class="lh-0"><b>Delivery Weight</b> - <?= (($weight['quantity'] != '') ? $weight['quantity'] : '0') ?>KG</p>
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

<?php include'pro-chart.php'; ?>

 <?php
    if (!empty($company)) {
        foreach ($company as $com) {
            $counting = $this->CommonModal->runQuery("SELECT
            CONCAT(ROUND((SUM(CASE WHEN tbl_work_update.create_date >= CURDATE() THEN tbl_work_update.fqc_accepted END) / SUM(CASE WHEN tbl_work_update.create_date >= CURDATE() THEN tbl_work_update.quantity END)) * 100, 2), '%') AS FQCAcceptance,
            CONCAT(ROUND((SUM(CASE WHEN tbl_qc_update.create_date >= CURDATE() THEN tbl_qc_update.qc_rejected END) / SUM(CASE WHEN tbl_qc_update.create_date >= CURDATE() THEN tbl_qc_update.quantity END)) * 100, 2), '%') AS QCRejectRate,
            SUM(CASE WHEN tbl_work_update.create_date >= CURDATE() THEN tbl_qc_update.qc_accepted END) AS workdone,
            SUM(CASE WHEN tbl_work_update.create_date >= CURDATE() THEN tbl_work_update.quantity END) AS FQCWeightInKgs,
            SUM(CASE WHEN tbl_work_update.create_date >= CURDATE() THEN tbl_qc_update.packed END) AS BagsCreated,
            SUM(CASE WHEN tbl_dispatched.create_date >= CURDATE() THEN tbl_dispatched.bags_dispatched END) AS BagsDispatch
        FROM
            tbl_labour
        LEFT JOIN
            tbl_work_update ON tbl_labour.eid = tbl_work_update.labour
        LEFT JOIN
            tbl_qc_update ON tbl_work_update.wid = tbl_qc_update.qc_id
        LEFT JOIN
            tbl_dispatched ON tbl_dispatched.company = tbl_labour.company
        WHERE
            tbl_labour.company = '" . $com['did'] . "'
    ")[0];
    
    
     $work = $this->CommonModal->runQuery("SELECT
        SUM(rm.raw) AS `Total_RAW`,
        qc.target AS `QC_Target`,
        rm.company,
        CASE WHEN SUM(qu.qc_accepted) >= qc.target * SUM(rm.raw) THEN 'Yes' ELSE 'No' END AS `Achieved_Target` , ((SUM(qu.quantity) * 0.01) / 100) as ttarget
        
    FROM
        tbl_raw_material rm
    LEFT JOIN
        tbl_qc_update qu ON rm.company = qu.company_id AND rm.date = qu.date
    CROSS JOIN
        (SELECT 0.01 AS target) qc
    WHERE
        rm.company = '" . $com['did'] . "'
    GROUP BY
        rm.company, qc.target
")[0];




    ?>
         <div class="mt-3">
             <h4 class="fs-20 font-w700 my-4"><?= $com['name'] ?></h4>
             <div class="testimonial-one px-4 owl-left-nav owl-carousel owl-loaded owl-drag">

                 <div class="items col-sm-12">
                     <div class="card product-grid-card">
                         <div class="card-body">
                             <div class="new-arrival-product">
                                 <div class="new-arrival-content text-center mt-3">
                                     <h4>FQC Success Rate</h4>

                                     <span class="price"><?= (($counting['FQCAcceptance'] != '') ? $counting['FQCAcceptance'] : '0') ?>%</span>
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
                                     <h4>QC Reject Rate</h4>

                                     <span class="price"><?= (($counting['QCRejectRate'] != '') ? $counting['QCRejectRate'] : '0') ?>%</span>
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
                                     <h4>Total Work Done</h4>

                                     <span class="price"><?= (($counting['workdone'] != '') ? $counting['workdone'] : '0') ?></span>
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
                                     <h4>Bags Created</h4>

                                     <span class="price"><?= (($counting['BagsCreated'] != '') ? $counting['BagsCreated'] : '0') ?></span>
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
                                     <h4>Bags Dispatched </h4>

                                     <span class="price"><?= (($counting['BagsDispatch'] != '') ? $counting['BagsDispatch'] : '0') ?></span>
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
                                     <h4>Target Achieve</h4>

                                     <span class="price"><?= (($work['Achieved_Target'] != '') ? $work['Achieved_Target'] : 'No') ?></span>
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
                                     <h4>QC Target</h4>

                                     <span class="price"><?= (($counting['ttarget'] != '') ? $counting['ttarget'] : '0') ?></span>
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
                                     <h4>FQC Weight In Kgs </h4>

                                     <span class="price"><?= (($counting['FQCWeightInKgs'] != '') ? $counting['FQCWeightInKgs'] : '0') ?></span>
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