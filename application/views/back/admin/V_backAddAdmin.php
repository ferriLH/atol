<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 24/05/2018
 * Time: 11.34
 */

$lvl = $this->session->userdata('lvlAdm');
$foto = $this->session->userdata('fotoAdm');
$nama = $this->session->userdata('namaAdm');
$akses = $this->session->userdata('aksesWilayahAdm');
$email = $this->session->userdata('emailAdm');
$NIP = $this->session->userdata('userAdm');

$this->load->view('back/admin/parts/header');
$this->load->view('back/admin/parts/navigation');

?>

    <!-- Main content -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/dist/css/popUp.css">
    <script src="<?php echo base_url()?>assets/back/dist/js/popUp.js"></script>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Please Fill In All The Fields</h3>
                    </div>
                    <?php
                    if (validation_errors() || $this->session->flashdata('result_pesanG')) {
                        ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Warning!</strong>
                            <?php echo validation_errors(); ?>
                            <?php echo $this->session->flashdata('result_pesanG'); ?>
                        </div>
                    <?php } ?>
                    <?php
                    if ($this->session->flashdata('result_pesanS')) {
                        ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Message!</strong>
                            <?php echo validation_errors(); ?>
                            <?php echo $this->session->flashdata('result_pesanS'); ?>
                        </div>
                    <?php } ?>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php echo form_open('C_backAdmin/addAdminAuth')?>
                    <form role="form" method="post" enctype="multipart/form-data" >
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputNIP">NIP</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
                                    <input required type="text" class="form-control" name="nip" placeholder="NIP">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input required type="text" class="form-control" name="nama" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1">Email address</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input required type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input required type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputConfirmPassword">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input required type="password" class="form-control" name="cpassword" placeholder="Confirm Pasword">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAkses">Regional Access</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                    <select name="akses" class="form-control" required>
                                        <option value=""> - Choose - </option>
                                        <option value="3273">Kota Bandung</option>
                                        <option value="3204">Kabupaten Bandung</option>
                                        <option value="3217">Kabupaten Bandung Barat</option>
                                        <option value="3277">Kota Cimahi</option>
                                    </select>
                                </div>
                            </div>

<!--                            <div class="form-group">-->
<!--                                <label for="exampleInputFile">File input</label>-->
<!--                                <input type="file" id="exampleInputFile">-->
<!---->
<!--                                <p class="help-block">Example block-level help text here.</p>-->
<!--                            </div>-->

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>

<?php
$this->load->view('back/admin/parts/footer');
?>