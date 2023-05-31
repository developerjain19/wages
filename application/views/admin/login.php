<?php $this->load->view('template/header_link'); ?>

<body class="vh-100 my-dark-bg">
  <div class="authincation h-100">
    <div class="container h-100">
      <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-6">
          <div class="text-center">
            <img src="<?= base_url('assets/admin/') ?>images/home-screen-image.png" alt="image" class="login-img" style="width:100%" />
            <div>
              <h2 class="text-white">The Only Labour Management Tool</h2>

              <p>By Continuing you agree to the Terms and Conditions</p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="authincation-content">
            <div class="row no-gutters">
              <div class="col-xl-12">
                <div class="auth-form">
                  <div class="text-center mb-3">
                    <a href="<?= base_url() ?>" class="brand-logo text-white">
                      Wages Management
                    </a>
                    <?php if ($this->session->userdata('login_error') != '') {
                    ?>
                      <div class="alert alert-danger">
                        <span><?= $this->session->userdata('login_error'); ?></span>
                      </div>
                    <?php

                    }
                    $this->session->unset_userdata('login_error');
                    ?>
                  </div>
                  <h4 class="text-center mb-4 text-white">LogIn</h4>
                  <form action="<?= base_url('Login/adminlogin') ?>" method="post">
                    <div class="form-group">
                      <label class="mb-1 text-white"><strong>Email</strong></label>
                      <input type="email" name="email" class="form-control" placeholder="hello@example.com" required >
                    </div>
                    <div class="form-group">
                      <label class="mb-1 text-white"><strong>Password</strong></label>
                      <input type="password" name="password" class="form-control" placeholder="Password" required >
                    </div>
                    <div class="form-row d-flex justify-content-between mt-4 mb-2">

                      <!-- <div class="form-group">
                        <a href="">Forgot Password?</a>
                      </div> -->
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- #/ container -->
  <!-- Common JS -->
  <script src="vendor/global/global.min.js"></script>
  <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
  <!-- Custom script -->
  <script src="vendor/deznav/deznav.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/deznav-init.js"></script>
  <script src="js/demo.js"></script>
  <script src="js/styleSwitcher.js"></script>

  <script>
    jQuery(document).ready(function() {
      setTimeout(function() {
        dezSettingsOptions.version = "dark";
        new dezSettings(dezSettingsOptions);
      }, 100);
    });
  </script>
</body>

</html>