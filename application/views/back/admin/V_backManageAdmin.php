<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 24/05/2018
 * Time: 11.34
 */

$lvl = $this->session->userdata('lvl');
$this->load->view('back/admin/parts/header');
$this->load->view('back/admin/parts/navigation');

?>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/dist/css/popUp.css">
    <script src="<?php echo base_url()?>assets/back/dist/js/popUp.js"></script>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Zone</h3>

                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="<?php if($this->uri->segment(2)==""||$this->uri->segment(2)=="KotBDG"){echo "active";}?>"><a href="<?php  echo base_url('manageAdmin/KotBDG')?>"><i class="fa fa-user"></i>Admin Kota Bandung
                                    <span class="label label-primary pull-right"><?php   echo count($adminKotBDG)?></span></a></li>
                            <li class="<?php if($this->uri->segment(2)=="KabBDG"){echo "active";}?>"><a href="<?php  echo base_url('manageAdmin/KabBDG')?>"><i class="fa fa-user"></i> Admin Kabupaten Bandung
                                    <span class="label label-primary pull-right"><?php echo count($adminKabBDG)?></span></a></li>
                            <li class="<?php if($this->uri->segment(2)=="KabBDGB"){echo "active";}?>"><a href="<?php  echo base_url('manageAdmin/KabBDGB')?>"><i class="fa fa-user"></i> Admin Kabupaten Bandung Barat
                                    <span class="label label-primary pull-right"><?php echo count($adminKabBDGB)?></span></a></li>
                            <li class="<?php if($this->uri->segment(2)=="KotCMH"){echo "active";}?>"><a href="<?php  echo base_url('manageAdmin/KotCMH')?>"><i class="fa fa-user"></i> Admin Kota Cimahi
                                    <span class="label label-primary pull-right"><?php echo count($adminKotCMH)?></span></a></li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->

                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $subTitle;?></h3>

                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <a href="<?php  echo base_url('manageAdmin/')?>">
                                    <button type="button" class="btn btn-default btn-sm">
                                        <i class="fa fa-refresh"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="table-responsive mailbox-messages">
                            <table id="admin" class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>action</th>
                                    <th>NIP</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($admin as $a){
                                    ?>
                                    <script>var url = "<?php echo base_url('C_backAdmin/setDeleteAdmin/');echo $a->NIP;?>";</script>
                                    <tr>
                                        <td class="btn-group">
                                                <button onclick="del(url)" type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            <a href="<?php  echo base_url('C_backAdmin/setEditAdmin/');echo $a->NIP;?>">
                                                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Edit"><i class="fa fa-edit"></i></button>
                                            </a>
                                        </td>
                                        <td class="mailbox-name"><?php echo $a->NIP;?></td>
                                        <td class="mailbox-name"><?php echo $a->nama;?></td>
                                        <td class="mailbox-name"><b><?php echo $a->email;?></b></td>
                                        <td class="mailbox-date"><?php echo $a->status;?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>

<?php
$this->load->view('back/admin/parts/footer');
?>