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
                <a href="compose.html" class="btn btn-primary btn-block margin-bottom">Compose</a>

                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Folders</h3>

                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="<?php if($this->uri->segment(2)==""){echo "active";}?>"><a href="<?php  echo base_url('inbox/')?>"><i class="fa fa-envelope"></i>Unreaded Inbox
                                    <span class="label label-primary pull-right"><?php echo count($notifN)?></span></a></li>
                            <li class="<?php if($this->uri->segment(2)=="readed"){echo "active";}?>"><a href="<?php  echo base_url('inbox/readed')?>"><i class="fa fa-envelope-o"></i> Readed Inbox
                                    <span class="label label-warning pull-right"><?php echo count($notifR)?></span></a></li>
                            <li class="<?php if($this->uri->segment(2)=="trash"){echo "active";}?>"><a href="<?php  echo base_url('inbox/trash')?>"><i class="fa fa-trash-o"></i> Trash
                                    <span class="label label-danger pull-right"><?php echo count($notifD)?></span></a></li>
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
                        <center><?php echo $note;?></center>
                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <a href="<?php  echo base_url('inbox/')?>"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button></a>
                            </div>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-controls">

                        </div>
                        <div class="table-responsive mailbox-messages">
                           <table id="inbox" class="table table-hover table-striped">
                               <thead>
                               <tr>
                                   <th>action</th>
                                   <th>Name</th>
                                   <th>Email</th>
                                   <th>Message</th>
                                   <th>Date Time</th>
                               </tr>
                               </thead>
                               <tbody>
                                <?php
                                    foreach ($inbox as $i){?>

                                <tr>
                                    <td>

                                        <script>var url = "<?php  echo base_url('C_backAdmin/setDeleteInbox/');echo $i->id_pesan;?>";</script>
                                        <button
                                            <?php
                                            if($this->uri->segment(2)=="trash"){
                                                echo "disabled";
                                            }else{
                                                ?>onclick="del(url)" <?php
                                            } ?> type="button" class="btn btn-default btn-sm">
                                            <i class="fa fa-trash-o"></i>
                                        </button>

                                    </td>
                                    <td class="mailbox-name"><a href="<?php  echo base_url('C_backAdmin/readInbox/');echo $i->id_pesan;?>"><?php echo $i->nama;?></a></td>
                                    <td class="mailbox-email"><a href="<?php  echo base_url('C_backAdmin/readInbox/');echo $i->id_pesan;?>"><?php echo $i->email;?></a></td>
                                    <td class="mailbox-subject"><b><?php echo $i->subjek;?></b> - <?php echo mb_strimwidth($i->pesan, 0, 75, "...");?></td>
                                    <td class="mailbox-date"><?php if($this->uri->segment(2)=="trash"){echo $i->waktu_delete;}else{echo $i->waktu;}?></td>
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