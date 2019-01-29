<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 01/06/2018
 * Time: 23.36
 */
?>
    <!DOCTYPE html>
    <html lang="en">
<head>
    <title><?php echo $title;?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" href="<?php echo base_url()?>assets/front/img/location.png">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/owner/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/owner/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/owner/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/owner/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/owner/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/owner/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/owner/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/owner/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/owner/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/login/owner/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('<?php echo base_url()?>assets/login/owner/images/bg-01.jpg');">
        <div class="wrap-login100">
            <?php
            if (validation_errors() || $this->session->flashdata('result_ggl')) {
                ?>
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Warning!</strong>
                    <?php echo validation_errors(); ?>
                    <?php echo $this->session->flashdata('result_ggl'); ?>
                </div>
            <?php } ?>
            <?php
            if (validation_errors() || $this->session->flashdata('result_suc')) {
                ?>
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong>
                    <?php echo validation_errors(); ?>
                    <?php echo $this->session->flashdata('result_suc'); ?>
                </div>
            <?php } ?>

            <form class="login100-form validate-form" action="<?php echo base_url('C_loginAdmin/forgotAuth')?>" method="post">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

                <span class="login100-form-title p-b-34 p-t-27"><?php echo $title;?></span>
                <span class="login100-form-title-1 p-b-34 p-t-27">
                    <p align="center" style="color: white">Please type your email. we will send change password link to your email</p><br>
                </span>

                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <input class="input100" type="email" name="email" placeholder="Email">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="<?php echo base_url()?>assets/login/owner/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url()?>assets/login/owner/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url()?>assets/login/owner/vendor/bootstrap/js/popper.js"></script>
<script src="<?php echo base_url()?>assets/login/owner/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url()?>assets/login/owner/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url()?>assets/login/owner/vendor/daterangepicker/moment.min.js"></script>
<script src="<?php echo base_url()?>assets/login/owner/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url()?>assets/login/owner/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url()?>assets/login/owner/js/main.js"></script>

</body>
    </html><?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 06/07/2018
 * Time: 16.23
 */