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
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $subTitle;?></h3>

                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <a href="<?php  echo base_url('manage/kotaCimahi')?>"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button></a>
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
                                    <th>ID</th>
                                    <th>Place Name</th>
                                    <th>Address</th>
                                    <th>Regency</th>
                                    <th>Distirct</th>
                                    <th>Village</th>
                                    <th>HTM</th>
                                    <th>Lat</th>
                                    <th>Lng</th>
                                    <th>Owner</th>
                                    <th>Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($dataCimahi as $a){
                                    ?>
                                    <script>var url = "<?php  echo base_url('C_backAdmin/setDeleteWisataCimahi/');echo $a->id_wisata;?>";</script>

                                    <tr>
                                        <td class="btn-group">

                                            <button onclick="del(url)" type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                                                <i class="fa fa-trash-o"></i>
                                            </button>

                                            <a href="<?php  echo base_url('C_backAdmin/setEditWisataCimahi/');echo $a->id_wisata;?>">
                                                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Edit"><i class="fa fa-edit"></i></button>
                                            </a>
                                        </td>
                                        <td class="mailbox-name"><?php echo $a->id_wisata;?></td>
                                        <td class="mailbox-name"><?php echo $a->nama_tempat;?></td>
                                        <td class="mailbox-name"><?php echo $a->alamat;?></td>
                                        <td class=""><?php echo $a->regencies;?></td>
                                        <td class=""><?php echo $a->districts;?></td>
                                        <td class=""><?php echo $a->villages;?></td>
                                        <td class=""><?php echo $a->htm;?></td>
                                        <td class=""><?php echo $a->lat;?></td>
                                        <td class=""><?php echo $a->lng;?></td>
                                        <td class=""><?php echo $a->owner;?></td>
                                        <td class=""><?php echo  mb_strimwidth($a->deskripsi, 0, 50, "...");?></td>
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