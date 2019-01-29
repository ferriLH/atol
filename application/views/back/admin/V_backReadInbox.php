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
                            <li><a href="<?php  echo base_url('inbox/')?>"><i class="fa fa-envelope"></i>Unreaded Inbox
                                    <span class="label label-primary pull-right"><?php echo count($notifN)?></span></a></li>
                            <li><a href="<?php  echo base_url('inbox/readed')?>"><i class="fa fa-envelope-o"></i> Readed Inbox
                                    <span class="label label-warning pull-right"><?php echo count($notifR)?></span></a></li>
                            <li><a href="<?php  echo base_url('inbox/trash')?>"><i class="fa fa-trash-o"></i> Trash
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

                        <div class="box-tools pull-right">
                            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-read-info">
                            <?php foreach ($inbox as $i){?>
                            <h3><?php echo $i->subjek;?></h3>
                            <h5>From: <?php echo $i->email;?>
                                <span class="mailbox-read-time pull-right"><?php echo $i->waktu;?></span></h5>
                        </div>
                        <!-- /.mailbox-read-info -->
                        <div class="mailbox-controls with-border text-center">
                            <div class="btn-group">
                                <a href="<?php  echo base_url('C_backAdmin/setDeleteInbox/');echo $i->id_pesan;?>"><button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                                        <i class="fa fa-trash-o"></i></button></a>
                                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                                    <i class="fa fa-reply"></i></button>
                                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                                    <i class="fa fa-share"></i></button>
                            </div>
                            <!-- /.btn-group -->
                            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                                <i class="fa fa-print"></i></button>
                        </div>
                        <!-- /.mailbox-controls -->
                        <div class="mailbox-read-message">
                            <p><pre><?php echo $i->pesan;?></pre></p>
                        </div>
                        <?php }?>
                        <!-- /.mailbox-read-message -->
                    </div>
                    <!-- /.box-body -->

                    <!-- /.box-footer -->
                    <div class="box-footer">
                        <div class="pull-right">
                            <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
                            <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
                        </div>
                        <a href="<?php  echo base_url('C_backAdmin/setDeleteInbox/');echo $i->id_pesan;?>"><button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button></a>
                        <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
                    </div>
                    <!-- /.box-footer -->
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