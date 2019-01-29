<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title;?></title>
    <link rel="icon" href="<?php echo base_url()?>assets/front/img/location.png">
    <style type="text/css">
        /*custom font*/
        @import url(https://fonts.googleapis.com/css?family=Montserrat);

        /*basic reset*/
        * {margin: 0; padding: 0;}

        html {
            height: 100%;
            /*Image only BG fallback*/

            /*background = gradient + image pattern combo*/
            background:
                    linear-gradient(rgba(196, 102, 0, 0.6), rgba(155, 89, 182, 0.6));
        }

        body {
            font-family: montserrat, arial, verdana;
        }
        /*form styles*/
        #msform {
            width: 400px;
            margin: 50px auto;
            text-align: center;
            position: relative;
        }
        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 3px;
            box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
            padding: 20px 30px;
            box-sizing: border-box;
            width: 80%;
            margin: 0 10%;

            /*stacking fieldsets above each other*/
            position: relative;
        }
        /*Hide all except first fieldset*/
        #msform fieldset:not(:first-of-type) {
            display: none;
        }
        /*inputs*/
        #msform input, #msform textarea {
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            font-size: 13px;
        }
        /*buttons*/
        #msform .action-button {
            width: 100px;
            background: #27AE60;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 1px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }
        #msform .action-button:hover, #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
        }
        /*headings*/
        .fs-title {
            font-size: 15px;
            text-transform: uppercase;
            color: #2C3E50;
            margin-bottom: 10px;
        }
        .fs-subtitle {
            font-weight: normal;
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }
        /*progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            /*CSS counters to number the steps*/
            counter-reset: step;
        }
        #progressbar li {
            list-style-type: none;
            color: white;
            text-transform: uppercase;
            font-size: 9px;
            width: 33.33%;
            float: left;
            position: relative;
        }
        #progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 20px;
            line-height: 20px;
            display: block;
            font-size: 10px;
            color: #333;
            background: white;
            border-radius: 3px;
            margin: 0 auto 5px auto;
        }
        /*progressbar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: white;
            position: absolute;
            left: -50%;
            top: 9px;
            z-index: -1; /*put it behind the numbers*/
        }
        #progressbar li:first-child:after {
            /*connector not needed before the first step*/
            content: none;
        }
        /*marking active/completed steps green*/
        /*The number of the step and the connector before it = green*/
        #progressbar li.active:before,  #progressbar li.active:after{
            background: #27AE60;
            color: white;
        }

        .alert {
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }

        .alert-heading {
            color: inherit;
        }

        .alert-link {
            font-weight: bold;
        }

        .alert-dismissible .close {
            position: relative;
            top: -0.75rem;
            right: -1.25rem;
            padding: 0.75rem 1.25rem;
            color: inherit;
        }

        .alert-primary {
            color: #004085;
            background-color: #cce5ff;
            border-color: #b8daff;
        }

        .alert-primary hr {
            border-top-color: #9fcdff;
        }

        .alert-primary .alert-link {
            color: #002752;
        }

        .alert-secondary {
            color: #464a4e;
            background-color: #e7e8ea;
            border-color: #dddfe2;
        }

        .alert-secondary hr {
            border-top-color: #cfd2d6;
        }

        .alert-secondary .alert-link {
            color: #2e3133;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-success hr {
            border-top-color: #b1dfbb;
        }

        .alert-success .alert-link {
            color: #0b2e13;
        }

        .alert-info {
            color: #0c5460;
            background-color: #d1ecf1;
            border-color: #bee5eb;
        }

        .alert-info hr {
            border-top-color: #abdde5;
        }

        .alert-info .alert-link {
            color: #062c33;
        }

        .alert-warning {
            color: #856404;
            background-color: #fff3cd;
            border-color: #ffeeba;
        }

        .alert-warning hr {
            border-top-color: #ffe8a1;
        }

        .alert-warning .alert-link {
            color: #533f03;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .alert-danger hr {
            border-top-color: #f1b0b7;
        }

        .alert-danger .alert-link {
            color: #491217;
        }

        .alert-light {
            color: #818182;
            background-color: #fefefe;
            border-color: #fdfdfe;
        }

        .alert-light hr {
            border-top-color: #ececf6;
        }

        .alert-light .alert-link {
            color: #686868;
        }

        .alert-dark {
            color: #1b1e21;
            background-color: #d6d8d9;
            border-color: #c6c8ca;
        }

        .alert-dark hr {
            border-top-color: #b9bbbe;
        }

        .alert-dark .alert-link {
            color: #040505;
        }

    </style>

</head>
<body>
<!-- multistep form -->
<?php
    $attributes = array('id' => 'msform');
    echo form_open_multipart('signUp/auth', $attributes);?>
<form id="msform" method="post" action="<?php base_url('signUp/auth')?>" enctype="multipart/form-data">
    <!-- progressbar -->
    <ul id="progressbar">
        <li class="active">Account Setup</li>
        <li>Persnonal Details</li>
        <li>Personal Details</li>
    </ul>
    <!-- fieldsets -->
    <?php
    if (validation_errors()) {
        ?>
        <div class="alert alert-warning">
<!--            <button type="button" class="alert-dismissible close" data-dismiss="alert">&times;</button>-->
            <strong>Warning!</strong>
            <?php echo validation_errors(); ?>
        </div>
    <?php } ?>
    <?php
    if ($this->session->flashdata('result_signUpGgl')) {
        ?>
        <div class="alert alert-danger">
            <!--            <button type="button" class="alert-dismissible close" data-dismiss="alert">&times;</button>-->
            <strong>Warning!</strong>
            <?php echo $this->session->flashdata('result_signUpGgl'); ?>

        </div>
    <?php } ?>

    <?php
    if ($this->session->flashdata('result_signUp')) {
        ?>
        <div class="alert alert-primary">
            <!--            <button type="button" class="alert-dismissible close" data-dismiss="alert">&times;</button>-->
            <strong>Succes!</strong>
            <?php echo $this->session->flashdata('result_signUp'); ?>
        </div>
    <?php } ?>

    <fieldset>
        <h2 class="fs-title">Create your account</h2>
        <h3 class="fs-subtitle">This is step 1</h3>
        <input type="email" name="email" placeholder="Email" />
        <input type="password" name="pass" id="txtNewPassword" onchange="isPasswordMatch()" placeholder="Password" />
        <input type="password" name="cpass" id="txtConfirmPassword" onchange="isPasswordMatch()" placeholder="Confirm Password" />
        <div id="divCheckPassword"></div>
        <input type="button" name="next" id="next" class="next action-button" value="Next" />
        <a href="<?php echo base_url()?>"><h2 class="fs-subtitle">Back</h2></a>
    </fieldset>
    <fieldset>
        <h2 class="fs-title">Personal Details</h2>
        <h3 class="fs-subtitle">We will never sell it</h3>
        <input type="text" name="name" placeholder="Name" />
        <input type="text" name="tempatLahir" placeholder="Place Born" />
        <input type="date" name="tanggalLahir" placeholder="Date Born" />
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>
    <fieldset>
        <h2 class="fs-title">Personal Details</h2>
        <h3 class="fs-subtitle">We will never sell it</h3>
        <input type="text" name="nik" placeholder="NIK" />
        <textarea name="alamat" placeholder="Address"></textarea>
        Upload KTP<input type="file" name="filename" placeholder="KTP"/>
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="submit" name="submit" class="submit action-button" value="Submit" />
    </fieldset>

</form>

<script src="<?php echo base_url()?>assets/back/bower_components/jquery/dist/jquery.min.js"></script>
<script src='<?php echo base_url()?>assets/login/js/jquery.easing.min.js'></script>


<script type="text/javascript">

    $('#next').prop('disabled' , true);
    $('#submit').prop('disabled' , true);
    $('#txtConfirmPassword').on('keyup', function isPasswordMatch() {
        var password = $("#txtNewPassword").val();
        var confirmPassword = $("#txtConfirmPassword").val();
        if (password != ""){
            if (password != confirmPassword) {
                $("#divCheckPassword").html("Passwords do not match!");
                $('#next').prop('disabled' , true);
                $('#submit').prop('disabled' , true);

            } else if(password == confirmPassword){
                $("#divCheckPassword").html("Passwords match.");
                $('#next').prop('disabled' , false);
                $('#submit').prop('disabled' , false);
            }
        }else{
            $("#divCheckPassword").html("Passwords do not empty!");
            $('#next').prop('disabled' , true);
            $('#submit').prop('disabled' , true);

        }
    });
    $('#txtNewPassword').on('keyup', function isPasswordMatch() {
        var password = $("#txtNewPassword").val();
        var confirmPassword = $("#txtConfirmPassword").val();

        if (confirmPassword != ""){
            if (password != confirmPassword) {
                $("#divCheckPassword").html("Passwords do not match!");
                $('#next').prop('disabled' , true);
                $('#submit').prop('disabled' , true);

            } else if(password == confirmPassword){
                $("#divCheckPassword").html("Passwords match.");
                $('#next').prop('disabled' , false);
                $('#submit').prop('disabled' , false);

            }
        }else{
            $("#divCheckPassword").html("Confirm Passwords do not empty!");
            $('#next').prop('disabled' , true);
            $('#submit').prop('disabled' , true);

        }
    });

    //jQuery time
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches

    $(".next").click(function(){
        if(animating) return false;
        animating = true;

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //activate next step on progressbar using the index of next_fs
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
                scale = 1 - (1 - now) * 0.2;
                //2. bring next_fs from the right(50%)
                left = (now * 50)+"%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
                    'transform': 'scale('+scale+')',
                    'position': 'absolute'
                });
                next_fs.css({'left': left, 'opacity': opacity});
            },
            duration: 800,
            complete: function(){
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });

    $(".previous").click(function(){
        if(animating) return false;
        animating = true;

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //de-activate current step on progressbar
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale previous_fs from 80% to 100%
                scale = 0.8 + (1 - now) * 0.2;
                //2. take current_fs to the right(50%) - from 0%
                left = ((1-now) * 50)+"%";
                //3. increase opacity of previous_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({'left': left});
                previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
            },
            duration: 800,
            complete: function(){
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });

    $(".submit").click(function(){
        $loc = window.location.href = "<?php echo base_url('signUp/auth')?>";
        return $loc;
    })
</script>
</body>
</html>