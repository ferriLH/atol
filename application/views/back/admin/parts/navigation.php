
<!-- Left side column. contains the logo and sidebar -->
<?php
date_default_timezone_set('Asia/Jakarta');
$lvl        = $this->session->userdata('lvlAdm');
$akses      = $this->session->userdata('aksesWilayahAdm');
$aksesL     = strtolower($this->session->userdata('aksesWilayahAdm'));
$foto       = $this->session->userdata('fotoAdm');

?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php if ($foto!=""){echo base_url('uploads/adm/');echo$foto;}else{echo base_url('assets/back/dist/img/user2-160x160.jpg');}?>" class="img-responsive" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $this->session->userdata('namaAdm')?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if($this->uri->segment(1)=="dashboard"){echo "active";}?> treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span><?php if($title!='Dashboard'){echo "Dashboard";}else{echo $title;} ?></span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>"><a href="<?php echo base_url()?>admin/"><i class="fa fa-circle-o"></i>Back End</a></li>
                    <li class="<?php if($this->uri->segment(1)==""){echo "active";}?>"><a target="_blank" href="<?php echo base_url()?>"><i class="fa fa-circle-o"></i>Front End</a></li>
                </ul>
            </li>
            <li class="<?php if($this->uri->segment(1)=="inbox" || $this->uri->segment(2)=="readInbox"){echo "active";}?>">
                <a href="<?php echo base_url('inbox/')?>">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-red"><?php echo count($notifD)?></small>
              <small class="label pull-right bg-yellow"><?php echo count($notifR)?></small>
              <small class="label pull-right bg-blue"><?php echo count($notifN)?></small>
            </span>
                </a>
            </li>
            <?php if($lvl=='superadmin'){?>
                <li class="<?php if($this->uri->segment(1)=="insert"){echo "active";}?> treeview">
                <a href="#">
                    <i class="fa fa-plus"></i> <span>Add New</span>
                </a>
                <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('addAdmin')?>"><i class="fa fa-user-o"></i> Add New Admin</a></li>
                </ul>
            </li>
            <?php }?>
            <li class="<?php if($this->uri->segment(1)=="manageAdmin"||$this->uri->segment(1)=="manageOwner"){echo "active";}?> treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Manage Account</span>
                </a>
                <ul class="treeview-menu">
                    <?php if($lvl=='superadmin'){?>
                    <li class="<?php if($this->uri->segment(1)=="manageAdmin"){echo "active";}?>">
                        <a href="<?php echo base_url()?>manageAdmin/"><i class="fa fa-user-secret"></i> Admin
                        <span class="pull-right-container">
                            <small class="label label-primary pull-right"><?php echo $this->session->userdata('countAdm');?></small>
                        </span>
                        </a>
                    </li>
                    <li class="<?php if($this->uri->segment(1)=="manageOwner"){echo "active";}?>">
                        <a href="<?php echo base_url()?>manageOwner/"><i class="fa fa-user-o"></i> Owner
                            <span class="pull-right-container">
                                <small class="label label-primary pull-right"><?php echo $this->session->userdata('countOwnA');?></small>
                                <small class="label label-warning pull-right"><?php echo $this->session->userdata('countOwnN');?></small>
                            </span>
                        </a>
                    </li>
                    <?php }else{?>
                    <li class="<?php if($this->uri->segment(1)=="manageOwner"){echo "active";}?>">
                        <a href="<?php echo base_url()?>manageOwner/"><i class="fa fa-user-o"></i> Owner
                            <span class="pull-right-container">
                                <small class="label label-primary pull-right"><?php echo $this->session->userdata('countOwnA');?></small>
                                <small class="label label-warning pull-right"><?php echo $this->session->userdata('countOwnN');?></small>
                            </span>
                        </a>
                    </li>
                    <?php }?>
                </ul>
            </li>
           <?php if($lvl=='superadmin'){?>
               <li class="header"><a href="<?php echo base_url('C_backAdmin/database/')?>"><i class="fa fa-database"></i>Backup Database</a></li>
               <li class="header"><a href="<?php echo base_url('C_excel/')?>"><i class="fa fa-file-excel-o"></i>Export Data Wisata To Excel</a></li>
           <?php }?>
            <?php if($this->session->userdata('aksesAdm')=='3273'){?>
                <li class="header"> <?php echo strtoupper("Manage"); echo " - "; echo $akses?></li>
                <li class="<?php if($this->uri->segment(1)=="addLocation"){echo "active";}?> treeview">
                    <a href="#"><i class="fa fa-gear text-white"></i> <span>Manage Tourism</span></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('addLocation/kotaBDG')?>"><i class="fa fa-plus"></i> Add</a></li>
                        <li><a href="<?php echo base_url('manage/kotaBDG')?>"><i class="fa fa-map-marker"></i> Manage</a></li>

                    </ul>
                </li>
                <li class="header"><a href="<?php echo base_url('C_excel/kotaBdg')?>"><i class="fa fa-file-excel-o"></i>Export Data Wisata Kota Bandung</a></li>
            <?php }?>

            <?php if($this->session->userdata('aksesAdm')=='3204'){?>
                <li class="header"> <?php echo strtoupper("Manage"); echo " - "; echo $akses?></li>
                <li class="<?php if($this->uri->segment(1)=="addLocation"){echo "active";}?> treeview">
                    <a href="#"><i class="fa fa-gear text-white"></i> <span>Manage Tourism</span></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('addLocation/kabBDG')?>"><i class="fa fa-plus"></i> Add</a></li>
                        <li><a href="<?php echo base_url('manage/kabBDG')?>"><i class="fa fa-map-marker"></i> Manage</a></li>

                    </ul>
                </li>
                <li class="header"><a href="<?php echo base_url('C_excel/kabBdg')?>"><i class="fa fa-file-excel-o"></i>Export Data Wisata Kab Bandung</a></li>
            <?php }?>

            <?php if($this->session->userdata('aksesAdm')=='3217'){?>
                <li class="header"> <?php echo strtoupper("Manage"); echo " - "; echo $akses?></li>
                <li class="<?php if($this->uri->segment(1)=="addLocation"){echo "active";}?> treeview">
                    <a href="#"><i class="fa fa-gear text-white"></i> <span>Manage Tourism</span></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('addLocation/BDGBarat')?>"><i class="fa fa-plus"></i> Add</a></li>
                        <li><a href="<?php echo base_url('manage/BDGBarat')?>"><i class="fa fa-map-marker"></i> Manage</a></li>

                    </ul>
                </li>
                <li class="header"><a href="<?php echo base_url('C_excel/bdgBarat')?>"><i class="fa fa-file-excel-o"></i>Export Data Wisata Bandung Barat</a></li>
            <?php }?>

            <?php if($this->session->userdata('aksesAdm')=='3277'){?>
                <li class="header"> <?php echo strtoupper("Manage"); echo " - "; echo $akses?></li>
                <li class="<?php if($this->uri->segment(1)=="addLocation"){echo "active";}?> treeview">
                    <a href="#"><i class="fa fa-gear text-white"></i> <span>Manage Tourism</span></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('addLocation/cimahi')?>"><i class="fa fa-plus"></i> Add</a></li>
                        <li><a href="<?php echo base_url('manage/cimahi')?>"><i class="fa fa-map-marker"></i> Manage</a></li>

                    </ul>
                </li>
                <li class="header"><a href="<?php echo base_url('C_excel/cimahi')?>"><i class="fa fa-file-excel-o"></i>Export Data Wisata Kota Cimahi</a></li>
            <?php }?>

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
        window.location = "<?php echo base_url('logout/admin')?>"
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
                <li><a href="<?php  echo base_url(str_replace(' ','',lcfirst($subTitle)))?>/"><i class="fa fa-dashboard"></i> <?php echo $subTitle;?></a></li>
                <li class="active"><?php echo date('Y/m/d h:i:s a');?></li>
            </ol>
        </section>
