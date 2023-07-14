<?php $this->load->view('template/header_link'); ?>

<body>
    <div id="main-wrapper">

        <div class="content-body">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card d-flex align-items-center">
                            <div class="card-header d-block w-100 text-center">
                                <!-- <h4 class="card-title">Select company</h4> -->
                            </div>
                            <div class="card-body w-100">
                                <div class="row">
                                    <?php if (sessionId('position') == '1' || sessionId('position') == '2') { ?>

                                        <div class="col-sm-12">
                                            <a href="employee-billing?month=<?= date("Y-m") ?>" class="btn btn-square btn-outline-info btnthird">Employee Billing</a>
                                        </div>
                                        <div class="col-sm-12">
                                            <a href="employee-attendance?from=<?= date("Y-m-01") ?>&to=<?= date("Y-m-30") ?>" class="btn btn-square btn-outline-info btnthird">Employee Attendance</a>
                                        </div>
                                        <div class="col-sm-12">
                                            <a href="QC-report" class="btn btn-square btn-outline-info btnthird">QC Report</a>
                                        </div>


                                        <div class="col-sm-12">
                                            <a href="work-update-filter" class="btn btn-square btn-outline-info btnthird">Work Update Report</a>
                                        </div>

                                        <div class="col-sm-12">
                                            <a href="raw-material-report" class="btn btn-square btn-outline-info btnthird">Raw Material</a>
                                        </div>

                                        <div class="col-sm-12">
                                            <a href="dispatched-report" class="btn btn-square btn-outline-info btnthird">Dispatch Report</a>
                                        </div>
                                    <?php } ?>

                                    <!-- hr section -->
                                    <?php if (sessionId('position') == '3') { ?>
                                        <div class="col-sm-12">
                                            <a href="hr-employee-attendance?from=<?= date("Y-m-01") ?>&to=<?= date("Y-m-30") ?>" class="btn btn-square btn-outline-info btnthird">Attendance </a>
                                        </div>
                                        <div class="col-sm-12">
                                            <a href="labour-wise-productivity" class="btn btn-square btn-outline-info btnthird">Labour Wise Productivity</a>
                                        </div>
                                    <?php } ?>

                                    <!-- QC section -->

                                    <?php if (sessionId('position') == '5') { ?>

                                        <div class="col-sm-12">
                                            <a href="open-list" class="btn btn-square btn-outline-info btnthird">Open List</a>
                                        </div>
                                        <div class="col-sm-12">
                                            <a href="quality-check" class="btn btn-square btn-outline-info btnthird">Quality Check</a>
                                        </div>

                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php $this->load->view('template/footer_link'); ?>
        </div>

</body>

</html>