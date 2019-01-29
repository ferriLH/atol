
<!-- Left side column. contains the logo and sidebar -->
<?php
date_default_timezone_set('Asia/Jakarta');
$ktp = $this->session->userdata('file_ktpOwn');
$owner = $this->session->userdata('userOwn');

?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php if ($ktp!=""){echo base_url('uploads/owner/');echo$ktp;}else{echo base_url('assets/back/dist/img/user2-160x160.jpg');}?>" class="img-responsive" alt="User Image"><br>
            </div>
            <div class="pull-left info">
                <p><?php echo $this->session->userdata('namaOwn')?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if($this->uri->segment(1)=="owner"){echo "active";}?> treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span><?php echo $title;?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if($this->uri->segment(1)=="owner"){echo "active";}?>"><a href="<?php echo base_url('owner')?>"><i class="fa fa-circle-o"></i>Back End</a></li>
                    <li class="<?php if($this->uri->segment(1)==""){echo "active";}?>"><a target="_blank" href="<?php echo base_url()?>"><i class="fa fa-circle-o"></i>Front End</a></li>
                </ul>
            </li>

            <li class="<?php if($this->uri->segment(1)=="insert" || $this->uri->segment(1)=="manage"){echo "active";}?> treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Manage Wisata</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if($this->uri->segment(1)=="insert"){echo "active";}?>"><a href="<?php echo base_url('insert/loc')?>"><i class="fa fa-plus"></i> Insert New Location</a></li>
                    <li class="<?php if($this->uri->segment(1)=="manage"){echo "active";}?>"><a href="<?php echo base_url('C_backOwner/manageLoc/'.$owner)?>"><i class="fa fa-map-marker"></i> Show Location</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<script>
    var timer = 0;
    function set_interval() {
        // the interval 'timer' is set as soon as the page loads
        timer = setInterval("auto_logout()", 3600000);
        // Eg: to set it to 5 mins, calculate 5min = 5x60 = 300 sec = 300,000 millisec.
        // So set it to 300000
    }

    function reset_interval() {
        //resets the timer. The timer is reset on each of the below events:
        // 1. mousemove   2. mouseclick   3. key press 4. scroliing
        //first step: clear the existing timer

        if (timer != 0) {
            clearInterval(timer);
            timer = 0;
            // second step: implement the timer again
            timer = setInterval("auto_logout()", 3600000);
            // completed the reset of the timer
        }
    }

    function auto_logout() {
        // this function will redirect the user to the logout script
        window.location = "<?php echo base_url('logout/owner')?>"
    }
</script>
<body class="hold-transition skin-blue sidebar-mini" onload="set_interval()" onmousemove="reset_interval()" onclick="reset_interval()" onkeypress="reset_interval()" onscroll="reset_interval()">
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo $title;?>
                <small><?php echo $subTitle;?></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php  echo base_url(lcfirst($subTitle))?>/"><i class="fa fa-dashboard"></i> <?php echo $subTitle;?></a></li>
                <li class="active"><?php echo date('Y/m/d h:i:s a');?></li>
            </ol>
        </section>
