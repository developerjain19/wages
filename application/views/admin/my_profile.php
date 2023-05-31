<?php $this->load->view('template/header_link'); ?>

<body>
    <div id="main-wrapper">

        <?php $this->load->view('template/header'); ?>
        <div class="content-body">
            <div class="container-fluid">
                <div class="row justify-content-center mb-5">
                    <?php if ($this->session->userdata('msg') != '') { ?>
                        <?= $this->session->userdata('msg'); ?>
                    <?php  }
                    $this->session->unset_userdata('msg'); ?>
                    <div class="col-xl-3 col-lg-12">
                        <div class="row">
                            <div class="col-xl-12 col-lg-6 col-sm-6">
                                <div class="card">
                                    <div class="card-header border-0">
                                        <h4 class="mb-0 text-black fs-20">My Profile</h4>

                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="my-profile">
                                                <img src="<?= base_url('uploads/default.jpg') ?>" alt="<?= $staff[0]['name'] ?>" class="rounded">
                                            </div>
                                            <h4 class="mt-3 font-w600 text-black mb-0 name-text"><?= $staff[0]['name'] ?></h4>
                                            <!-- <span>@thomasdox</span> -->
                                            <p class="mb-0 mt-2">Join on <?= convertDatedmy($staff[0]['create_date']) ?></p>
                                        </div>
                                        <ul class="portofolio-social">
                                            <li><a href="tel:<?= $staff[0]['number'] ?>"><i class="fa fa-phone"></i></a></li>
                                            <li><a href="mailto:<?= $staff[0]['email'] ?>"><i class="far fa-envelope"></i></a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post">
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Name:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="name" name="name" value="<?= (($tag == 'edit') ? $staff[0]['name'] : '')  ?>" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Contact No:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="number" name="number" maxlength="12" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required value="<?= (($tag == 'edit') ? $staff[0]['number'] : '')  ?>">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Email:</label>
                                            <div class="col-sm-10">
                                                <input type="email" id="email" name="email" class="form-control" value="<?= (($tag == 'edit') ? $staff[0]['email'] : '')  ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5"></div>
                                            <div class="col-sm-5">
                                                <input type="submit" value="Submit" class="btn btn-info">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card-header">
                                <h4 class="card-title">Change Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="<?= base_url('Admin_Dashboard/change_password') ?>">
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Old Password:</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="oldpassword" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">New Password :</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="newpassword" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Confirm Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="confirmnewpassword" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5"></div>
                                            <div class="col-sm-5">
                                                <input type="submit" value="Submit" class="btn btn-info">
                                            </div>
                                        </div>
                                    </form>
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