<?php
$lvl        = $this->session->userdata('lvlAdm');
$akses      = $this->session->userdata('aksesWilayahAdm');
$aksesL     = strtolower($this->session->userdata('aksesWilayahAdm'));
$foto       = $this->session->userdata('fotoAdm');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo ucfirst($title);?> | <?php echo $subTitle;?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/bower_components/Ionicons/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="icon" href="<?php echo base_url()?>assets/front/img/location.png">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


</head>
<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url()?>dashboard/admin" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b><?php echo substr(strtoupper($lvl),0,1);echo"</b>";echo substr(strtoupper($lvl),5,1);?></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b><?php echo ucfirst($lvl);?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success"><?php echo count($notifN)?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have <?php echo count($notifN)?> messages</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <?php
                                $x = 0;
                                foreach ($notifN as $nn){
                                ?>
                                <li><!-- start message -->
                                    <a href="<?php  echo base_url('C_backAdmin/readInbox/');echo $nn->id_pesan;?>">
                                        <div class="pull-left">
                                            <span class="fa fa-user-o img-circle" ></span>
                                        </div>
                                        <h4>
                                            <?php echo $nn->nama?>
                                            <small><i class="fa fa-clock-o"></i><?php echo $nn->waktu?></small>
                                        </h4>
                                        <p><?php echo $nn->subjek?></p>
                                    </a>
                                </li>
                                <?php
                                    if (++$x == 4) break;
                                    }
                                ?>
                                <!-- end message -->
                            </ul>
                        </li>
                        <li class="footer"><a href="<?php echo base_url('inbox/')?>">See All Messages</a></li>
                    </ul>
                </li>
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-danger"><?php echo count($notifNotAktivated)?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have <?php echo count($notifNotAktivated)?> notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <?php
                                    $x = 0;
                                    foreach ($notifNotAktivated as $aa){
                                ?>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user text-red"></i> <?php echo $aa->nama?> - <?php echo $aa->email?>
                                    </a>
                                </li>
                                <?php
                                if (++$x == 4) break;
                                }
                                ?>
                            </ul>
                        </li>
                        <li class="footer"><a href="<?php echo base_url('manageOwner/nonAktif')?>">View all</a></li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php if ($foto!=""){echo base_url('uploads/adm/');echo$foto;}else{echo base_url('assets/back/dist/img/user2-160x160.jpg');}?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $this->session->userdata('namaAdm');?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php if ($foto!=""){echo base_url('uploads/adm/');echo$foto;}else{echo base_url('assets/back/dist/img/user2-160x160.jpg');}?>" class="img-circle" alt="User Image">

                            <p>
                                <?php echo $this->session->userdata('namaAdm'); echo " - "; echo $aksesL;?>
                                <small><?php echo $this->session->userdata('userAdm');?></small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo base_url('profile/adm');?>" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo base_url('logout/admin')?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>