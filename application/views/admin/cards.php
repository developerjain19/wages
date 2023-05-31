<div class="row">
    <div class="col-xl-6 col-xxl-12">
        <div class="row">
            <div class="col-sm-3">
                <div class="card-bx stacked card">
                    <img src="<?= base_url('assets/admin/') ?>images/card/card1.jpg" alt="" />
                    <div class="card-info">
                        <p class="mb-1 text-white fs-14">Absent rate</p>
                        <div class="d-flex justify-content-between">
                            <h2 class="num-text text-white mb-5 font-w600">
                                10000
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
                    <img src="<?= base_url('assets/admin/') ?>images/card/card2.jpg" alt="" />
                    <div class="card-info">
                        <p class="fs-14 mb-1 text-white">QC rate</p>
                        <div class="d-flex justify-content-between">
                            <h2 class="num-text text-white mb-5 font-w600">500</h2>
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
                    <img src="<?= base_url('assets/admin/') ?>images/card/card3.jpg" alt="" />
                    <div class="card-info">
                        <p class="mb-1 text-white fs-14">Weight</p>
                        <div class="d-flex justify-content-between">
                            <h2 class="num-text text-white mb-5 font-w600">420</h2>
                            <svg width="55" height="34" viewBox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67" />
                                <circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (sessionId('position') == '1') { ?>
                <div class="col-sm-3">
                    <div class="card-bx stacked card">
                        <img src="<?= base_url('assets/admin/') ?>images/card/card4.jpg" alt="" />
                        <div class="card-info">
                            <p class="mb-1 text-white fs-14">Quantity Today</p>
                            <div class="d-flex justify-content-between">
                                <h2 class="num-text text-white mb-5 font-w600">8000</h2>
                                <svg width="55" height="34" viewBox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67" />
                                    <circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            if (sessionId('position') == '2' || sessionId('position') == '3') {
            ?>

                <div class="col-sm-3">
                    <div class="card-bx stacked card">
                        <img src="<?= base_url('assets/admin/') ?>images/card/card4.jpg" alt="" />
                        <div class="card-info">
                            <p class="mb-1 text-white fs-14">Labour today</p>
                            <div class="d-flex justify-content-between">
                                <h2 class="num-text text-white mb-5 font-w600">500</h2>
                                <svg width="55" height="34" viewBox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67" />
                                    <circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

            <?php  } ?>





        </div>
    </div>
</div>