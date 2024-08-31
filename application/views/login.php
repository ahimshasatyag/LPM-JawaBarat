<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <title>Login | LPM Jabar</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
  <link rel="icon" type="image/jpg" href="<?php echo base_url(); ?>assets/images/logoLPM.jpg"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login_/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login_/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login_/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login_/vendor/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login_/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login_/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login_/vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login_/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login_/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login_/css/main.css">
<!--===============================================================================================-->
</head>
<body>

  <div class="limiter">
    <div class="container-login100" style="background: url(./assets/images/background.jpg); background-size:cover; -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-position:center; background-repeat:no-repeat;">
      <div>

        <form class="login100-form validate-form"  action="<?php echo base_url('login/auth'); ?>" method="post" class="" role="form" style="padding: 20px; border-radius: 8px; background: rgba(255, 255, 255, 0.4); box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); backdrop-filter: blur(4.1px); -webkit-backdrop-filter: blur(4.1px);">
          <span class="login100-form-title p-b-26" style="color: black;">
            LEMBAGA PEMBERDAYAAN MASYARAKAT <BR>JAWA BARAT
          </span>

          <span class="login100-form-title p-b-48">
<img src="<?php echo base_url(); ?>/assets/images/logoLPM.jpg"  width="150" height="150" style="border-radius: 8px;">
          </span>
           <?php
if ($this->session->flashdata('gagal')) {
	?>
        <div class="callout callout-danger">
          <p style="font-size:15px; color:black">
            <i class="fa fa-warning"></i> <?php echo $this->session->flashdata('gagal'); ?>
          </p>
        </div>
        <?php
}
?>
          <p style="text-align: right; color:black">Username: admin <br> Password: 1</p>
          <div class="wrap-input100 validate-input" data-validate = "USERNAME TIDAK TERDAFTAR!">
            <input class="input100" type="text" name="username" style="color: black;">
            <span class="focus-input100" style="color: black;" data-placeholder="Username"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <span class="btn-show-pass">
              <i class="zmdi zmdi-eye"></i>
            </span>
            <input class="input100" type="password" name="password" style="color: black;">
            <span class="focus-input100" data-placeholder="Password"></span>
          </div>

          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="btn btn-lg btn-block btn-success login100-form-btn" type="submit" name="Submit" alt="sign in">
                Login
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div id="dropDownSelect1"></div>

<!--===============================================================================================-->
  <script src="<?php echo base_url(); ?>assets/login_/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url(); ?>assets/login_/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url(); ?>assets/login_/vendor/bootstrap/js/popper.js"></script>
  <script src="<?php echo base_url(); ?>assets/login_/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url(); ?>assets/login_/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url(); ?>assets/login_/vendor/daterangepicker/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/login_/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url(); ?>assets/login_/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url(); ?>assets/login_/js/main.js"></script>

</body>
</html>