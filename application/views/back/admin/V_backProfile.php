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
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <a target="_blank " href="<?php if ($foto!=""){echo base_url('uploads/adm/');echo$foto;}else{echo base_url('assets/back/dist/img/user2-160x160.jpg');}?>">
                        <img class="profile-user-img img-responsive " src="<?php if ($foto!=""){echo base_url('uploads/adm/');echo$foto;}else{echo base_url('assets/back/dist/img/user2-160x160.jpg');}?>" alt="User profile picture">
                        </a>
                        <h3 class="profile-username text-center"><?php echo $nama;?></h3>

                        <p class="text-muted text-center"><?php echo $akses;?></p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>NIP</b> <a class="pull-right"><?php echo $NIP;?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="pull-right"><?php echo $email;?></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->

                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#password" data-toggle="tab">Change Password</a></li>
                        <li><a href="#profile" data-toggle="tab">Update Profile</a></li>
                        <li><a href="#photo" data-toggle="tab">Change Photo</a></li>
                    </ul>
                    <div class="tab-content">
                        <?php
                        if (validation_errors() || $this->session->flashdata('result_login')) {
                            ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Warning!</strong>
                                <?php echo validation_errors(); ?>
                                <?php echo $this->session->flashdata('result_login'); ?>
                            </div>
                        <?php } ?>
                        <div class="active tab-pane" id="password">
                            <form class="form-horizontal" method="post" action="<?php echo base_url('C_backAdmin/updatePassword/');echo $NIP?>" >
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" required="" class="form-control" name="inputOPassword" id="inputOPassword" placeholder="Old Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" required="" class="form-control" name="pass" id="txtNewPassword" onchange="isPasswordMatch()" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" required="" class="form-control" name="cpass" id="txtConfirmPassword" onchange="isPasswordMatch()" placeholder="Confirm Password">
                                    </div>
                                    <div id="divCheckPassword"></div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" id="next" class="btn btn-danger">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php
                        if ($popUpProfile==TRUE){
                            echo "<script>updateProfile()</script>";
                        }
                        if ($popUpPass==TRUE){
                            echo "<script>updatePass()</script>";
                        }
                        if ($popUpPhoto==TRUE){
                            echo "<script>updatePhoto()</script>";
                        }
                        ?>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="profile">
                            <form class="form-horizontal" method="post" action="<?php echo base_url('C_backAdmin/updateProfile/');echo $NIP?>" >
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-10">
                                        <input type="text" required="" class="form-control" name="inputName" id="inputName" placeholder="<?php echo $nama;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-10">
                                        <input type="email" required="" class="form-control" name="inputEmail" id="inputEmail" placeholder="<?php echo $email;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-danger">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="photo">
                            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url('C_backAdmin/updatePhoto/');echo $NIP?>" >
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Upload Photo</label>

                                    <div class="col-sm-10">
                                        <input type="file" required="" name="foto" class="form-control" id="photo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-danger">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
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