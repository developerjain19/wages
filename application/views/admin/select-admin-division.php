<?php $this->load->view('template/header_link'); ?>

<body>
    <div id="main-wrapper">

        <div class="content-body">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card d-flex align-items-center">
                            <div class="card-header d-block w-100 text-center">
                                <h4 class="card-title">Select Division</h4>
                            </div>
                            <div class="card-body w-100">
                                <div class="row">
                                    <?php
                                    $division =  getAllRow('tbl_division');
                                    if ($division != '') {
                                        foreach ($division as $divi) {
                                            echo '<div class="col-sm-4"><a href="' . base_url('select-divisions?division=' . encryptId($divi['did'])) . '&position=' . $accinfo . '" class="btn btn-square btn-outline-info secbutton">' . $divi['name'] . '</a></div>';
                                        }
                                    }


                                    ?>
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