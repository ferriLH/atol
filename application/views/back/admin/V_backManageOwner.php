<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 24/05/2018
 * Time: 11.34
 */

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
                        <h3 class="box-title">Owner Tourism Place</h3>

                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="<?php if($this->uri->segment(2)==""||$this->uri->segment(2)=="aktif"){echo "active";}?>"><a href="<?php  echo base_url('manageOwner/aktif')?>"><i class="fa fa-user"></i>Owner Aktif
                                    <span class="label label-primary pull-right"><?php   echo count($ownerA)?></span></a></li>
                            <li class="<?php if($this->uri->segment(2)=="nonAktif"){echo "active";}?>"><a href="<?php  echo base_url('manageOwner/nonAktif')?>"><i class="fa fa-user"></i> Owner Non-Aktif
                                    <span class="label label-primary pull-right"><?php echo count($ownerN)?></span></a></li>
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
                                <a href="<?php  echo base_url('manageOwner/')?>"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button></a>
                            </div>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="table-responsive mailbox-messages">
                            <table id="owner" class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>action</th>
                                    <th>NIK</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date of birth</th>
                                    <th>Address</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($owner as $a){
                                    ?>
                                    <script>var url = "<?php  echo base_url('C_backAdmin/setDeleteOwner/');echo $a->nik;?>";</script>

                                    <tr>
                                        <td class="btn-group">

                                                <button onclick="del(url)" type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>

                                            <a href="<?php  echo base_url('C_backAdmin/setEditOwner/');echo $a->nik;?>">
                                                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Edit"><i class="fa fa-edit"></i></button>
                                            </a>
                                        </td>
                                        <td class="mailbox-name"><?php echo $a->nik;?></td>
                                        <td class="mailbox-name"><?php echo $a->nama;?></td>
                                        <td class="mailbox-email"><?php echo $a->email;?></td>
                                        <td class="mailbox-subject"><b><?php echo $a->tempat_lahir;?></b> / <?php echo mb_strimwidth($a->tgl_lahir, 0, 75, "...");?></td>
                                        <td class="mailbox-date"><?php echo $a->alamat;?></td>
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