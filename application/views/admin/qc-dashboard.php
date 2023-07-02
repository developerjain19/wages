<div class="row">
    <div class="col-xl-6 col-xxl-12">
        <div class="row">
            <div class="col-sm-3">
                <div class="card-bx stacked card">
                    <img src="<?= base_url('assets/admin/') ?>images/card/card3.jpg" alt="" />
                    <div class="card-info">
                        <p class="mb-1 text-white fs-14">Weight</p>
                        <div class="d-flex justify-content-between">
                            <h2 class="num-text text-white mb-5 font-w600"><?= $qcqty['qty'] ?></h2>
                            <svg width="55" height="34" viewBox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67" />
                                <circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-3">
                <div class="card-bx stacked card">
                    <img src="<?= base_url('assets/admin/') ?>images/card/card1.jpg" alt="" />
                    <div class="card-info">
                        <p class="mb-1 text-white fs-14">QC Target</p>
                        <div class="d-flex justify-content-between">
                            <h2 class="num-text text-white mb-5 font-w600">
                                <?= $target['target'] ?> %
                            </h2>
                            <svg width="55" height="34" viewBox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67" />
                                <circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card-bx stacked card">
                    <img src="<?= base_url('assets/admin/') ?>images/card/card4.jpg" alt="" />
                    <div class="card-info">
                        <p class="mb-1 text-white fs-14">Success Rate Today</p>
                        <div class="d-flex justify-content-between">
                            <h2 class="num-text text-white mb-5 font-w600"><?= $qc[0]['accepted'] ?></h2>
                            <svg width="55" height="34" viewBox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67" />
                                <circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card-bx stacked card">
                    <img src="<?= base_url('assets/admin/') ?>images/card/card2.jpg" alt="" />
                    <div class="card-info">
                        <p class="fs-14 mb-1 text-white">Reject rate</p>
                        <div class="d-flex justify-content-between">
                            <h2 class="num-text text-white mb-5 font-w600"><?= $qc[0]['rejected'] ?></h2>
                            <svg width="55" height="34" viewBox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67" />
                                <circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<h2 class="text-black me-auto font-w600 mb-3">Daily QC Progress</h2>
<div class="row">
    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">

                <h2 class="text-black mb-2 font-w600">Division 1</h2>
                <h6 class="my-progress-bar">Success Rate
                    <span class="pull-right">75%</span>
                </h6>
                <div class="progress mb-2">
                    <div class="progress-bar progress-animated bg-warning" style="width: 50%"></div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">

                <h2 class="text-black mb-2 font-w600">Division 2</h2>
                <h6 class="my-progress-bar">Success Rate
                    <span class="pull-right">75%</span>
                </h6>
                <div class="progress mb-2">
                    <div class="progress-bar progress-animated bg-warning" style="width: 50%"></div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">

                <h2 class="text-black mb-2 font-w600">Division 3</h2>
                <h6 class="my-progress-bar">Success Rate
                    <span class="pull-right">75%</span>
                </h6>
                <div class="progress mb-2">
                    <div class="progress-bar progress-animated bg-warning" style="width: 50%"></div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">

                <h2 class="text-black mb-2 font-w600">Division 4</h2>
                <h6 class="my-progress-bar">Success Rate
                    <span class="pull-right">75%</span>
                </h6>
                <div class="progress mb-2">
                    <div class="progress-bar progress-animated bg-warning" style="width: 50%"></div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class=" form-head d-flex flex-wrap mb-4 align-items-center">
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
            <div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
                <h2 class="font-w600 title mb-2 me-auto ">Labour Today Division Name</h2>
            </div>
            <div class="col-xl-6 col-xxl-6 col-lg-6 col-sm-12">
                <div class="widget-stat card bg-secondary">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="me-3">
                                <i class="flaticon-381-user-7"></i>
                            </span>
                            <div class="media-body text-white">
                                <p class="mb-1">Present</p>
                                <h3 class="text-white"><?= $attendance[0]['total_present'] ?></h3>
                                <div class="progress mb-2 bg-primary">
                                    <div class="progress-bar progress-animated bg-light" style="width: 76%"></div>
                                </div>
                                <!-- <small>76% Increase in 20 Days</small> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-6 col-lg-6 col-sm-12">
                <div class="widget-stat card bg-secondary">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="me-3">
                                <i class="flaticon-381-user-7"></i>
                            </span>
                            <div class="media-body text-white">
                                <p class="mb-1">Absent</p>
                                <h3 class="text-white"><?= $attendance[0]['total_absent'] ?></h3>
                                <div class="progress mb-2 bg-primary">
                                    <div class="progress-bar progress-animated bg-light" style="width: 76%"></div>
                                </div>
                                <!-- <small>76% Increase in 20 Days</small> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="display: none;">
            <div class="col-xl-4 col-lg-6 col-sm-6">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <h4 class="card-title">Poly1</h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-sm-6">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <h4 class="card-title">Poly2</h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-sm-6">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <h4 class="card-title">Poly3</h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-sm-6">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <h4 class="card-title">Poly4</h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-sm-6">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <h4 class="card-title">Poly5</h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-sm-6">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <h4 class="card-title">Poly6</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="Ethereum">
        <div class="row">
            <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
                <div class="widget-stat card bg-primary">
                    <div class="card-body  p-4">
                        <div class="media">
                            <span class="me-3">
                                <i class="la la-users"></i>
                            </span>
                            <div class="media-body text-white">
                                <p class="mb-1">Total QC Acceptance</p>
                                <h3 class="text-white"><?= $monthlyqc[0]['accepted'] ?></h3>
                                <div class="progress mb-2 bg-secondary">
                                    <div class="progress-bar progress-animated bg-light" style="width: 80%"></div>
                                </div>
                                <small> 30 Days</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
                <div class="widget-stat card bg-primary">
                    <div class="card-body  p-4">
                        <div class="media">
                            <span class="me-3">
                                <i class="la la-users"></i>
                            </span>
                            <div class="media-body text-white">
                                <p class="mb-1">Total QC Rejection</p>
                                <h3 class="text-white"><?= $monthlyqc[0]['rejected'] ?></h3>
                                <div class="progress mb-2 bg-secondary">
                                    <div class="progress-bar progress-animated bg-light" style="width: 30%"></div>
                                </div>
                                <small>30 Days</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
            <h2 class="font-w600 title mb-2 me-auto ">Success Rate Divisions</h2>
        </div> -->
        <!-- <div class="row">
            <div class="col-xl-3 col-sm-6 m-t35">
                <div class="card card-coin">
                    <div class="card-body text-center">

                        <h2 class="text-black mb-2 font-w600">Division 1</h2>
                        <h6 class="my-progress-bar">Success Rate
                            <span class="pull-right">75%</span>
                        </h6>
                        <div class="progress ">
                            <div class="progress-bar bg-info progress-animated" style="width: 75%; height:6px;" role="progressbar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 m-t35">
                <div class="card card-coin">
                    <div class="card-body text-center">

                        <h2 class="text-black mb-2 font-w600">Division 2</h2>
                        <h6 class="my-progress-bar">Success Rate
                            <span class="pull-right">75%</span>
                        </h6>
                        <div class="progress ">
                            <div class="progress-bar bg-info progress-animated" style="width: 75%; height:6px;" role="progressbar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 m-t35">
                <div class="card card-coin">
                    <div class="card-body text-center">

                        <h2 class="text-black mb-2 font-w600">Division 3</h2>
                        <h6 class="my-progress-bar">Success Rate
                            <span class="pull-right">75%</span>
                        </h6>
                        <div class="progress ">
                            <div class="progress-bar bg-info progress-animated" style="width: 75%; height:6px;" role="progressbar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 m-t35">
                <div class="card card-coin">
                    <div class="card-body text-center">

                        <h2 class="text-black mb-2 font-w600">Division 4</h2>
                        <h6 class="my-progress-bar">Success Rate
                            <span class="pull-right">75%</span>
                        </h6>
                        <div class="progress ">
                            <div class="progress-bar bg-info progress-animated" style="width: 75%; height:6px;" role="progressbar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-xl-6 col-xxl-12">
                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <h4 class="mb-0 fs-20 text-black">Labour QC</h4>
                    </div>
                    <div class="card-body p-3 pb-0">
                        <hr>
                        <div class="table-responsive">
                            <table class="table text-center bg-info-hover tr-rounded order-tbl">
                                <thead>
                                    <tr>
                                        <th class="text-left">Name</th>
                                        <th class="text-center">Division</th>
                                        <th class="text-center">Acceptance</th>
                                        <th class="text-end">Rejection</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    if (!empty($labour)) {
                                        foreach ($labour as $row) {
                                            $division = getRowById('tbl_division', 'did', $row['division']);
                                            $all_data = $this->CommonModal->runQuery("SELECT SUM(qc_accepted) as accepted , SUM(qc_rejected) as reject FROM `tbl_qc_update` WHERE labour_id = '" . $row['eid'] . "' AND DATE_FORMAT(create_date, '%Y-%m-%d') =  '" . $date . "' ");

                                    ?>
                                            <tr>
                                                <td class="text-left"><?= $row['name'] ?></td>
                                                <td><?= $division[0]['name'] ?></td>
                                                <td><?= $all_data[0]['accepted'] ?></td>
                                                <td><?= $all_data[0]['reject'] ?></td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer border-0 p-0 caret">
                        <a href="#" class="btn-link"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-12 col-lg-12 col-sm-12">
    <div class="widget-stat card">
        <a href="<?= base_url('open-list') ?>">
            <div class="card-body p-4">
                <h4 class="card-title">Open List</h4>
                <p>QC pending for labour</p>

                <div class="progress mb-2">
                    <div class="progress-bar progress-animated bg-red" style="width: 76%"></div>
                </div>
            </div>
        </a>
    </div>
</div>
<!-- <div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center"> 
    <h2 class="font-w600 title mb-2 me-auto ">Divisions</h2>
</div>
<div class="row">
    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">

                <h2 class="text-black mb-2 font-w600">Division 1</h2>
                <h6 class="my-progress-bar">Success Rate
                    <span class="pull-right">75%</span>
                </h6>
                <div class="progress mb-2">
                    <div class="progress-bar progress-animated bg-warning" style="width: 50%"></div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">

                <h2 class="text-black mb-2 font-w600">Division 2</h2>
                <h6 class="my-progress-bar">Success Rate
                    <span class="pull-right">75%</span>
                </h6>
                <div class="progress mb-2">
                    <div class="progress-bar progress-animated bg-warning" style="width: 50%"></div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">

                <h2 class="text-black mb-2 font-w600">Division 3</h2>
                <h6 class="my-progress-bar">Success Rate
                    <span class="pull-right">75%</span>
                </h6>
                <div class="progress mb-2">
                    <div class="progress-bar progress-animated bg-warning" style="width: 50%"></div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">

                <h2 class="text-black mb-2 font-w600">Division 4</h2>
                <h6 class="my-progress-bar">Success Rate
                    <span class="pull-right">75%</span>
                </h6>
                <div class="progress mb-2">
                    <div class="progress-bar progress-animated bg-warning" style="width: 50%"></div>
                </div>

            </div>
        </div>
    </div>
</div> -->