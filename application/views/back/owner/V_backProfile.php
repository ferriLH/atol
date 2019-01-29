<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 24/05/2018
 * Time: 11.34
 */

$ktp = $this->session->userdata('file_ktpOwn');
$nama = $this->session->userdata('namaOwn');
$user = $this->session->userdata('userOwn');
$email = $this->session->userdata('emailOwn');
$alamat = $this->session->userdata('alamatOwn');
$tempat = $this->session->userdata('tempat_lahirOwn');
$tgl = $this->session->userdata('tgl_lahirOwn');

$this->load->view('back/owner/parts/header');
$this->load->view('back/owner/parts/navigation');

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
                        <img class="profile-user-img img-responsive img-circle" src="<?php if ($ktp!=""){echo base_url('uploads/owner/');echo$ktp;}else{echo base_url('assets/back/dist/img/user2-160x160.jpg');}?>" alt="User profile picture">


                        <h3 class="profile-username text-center"><?php echo $nama;?></h3>

                        <p class="text-muted text-center"><?php echo $user;?></p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>NIK</b> <a class="pull-right"><?php echo $user;?></a>
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
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-address-book margin-r-5"></i>Born</strong>

                        <p class="text-muted"><?php echo $tempat.' /  '.$tgl?></p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>

                        <p class="text-muted"><?php echo $alamat?></p>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> KTP</strong>

                        <p><a target="_blank" href="<?php if ($ktp!=""){echo base_url('uploads/owner/');echo$ktp;}else{echo base_url('assets/back/dist/img/user2-160x160.jpg');}?>">
                                <img class=" img-responsive" src="<?php if ($ktp!=""){echo base_url('uploads/owner/');echo$ktp;}else{echo base_url('assets/back/dist/img/user2-160x160.jpg');}?>" alt="User profile picture">
                            </a></p>
                    </div>
                    <!-- /.box-body -->
                </div>
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
                        <!-- /.tab-pane -->
                        <div class="active tab-pane" id="password">
                            <form class="form-horizontal" method="post" action="<?php echo base_url('C_backOwner/updatePassword/');echo $user?>" >
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
                        }if ($popUpPass==TRUE){
                            echo "<script>updatePass()</script>";
                        }
                        if ($popUpPhoto==TRUE){
                            echo "<script>updatePhoto()</script>";
                        }
                        ?>
                        <div class="tab-pane" id="profile">
                            <form class="form-horizontal" method="post" action="<?php echo base_url('C_backOwner/updateProfile/');echo $user?>" >
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
                                    <label for="inputName" class="col-sm-2 control-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" required="" class="form-control" name="inputAlamat" id="inputAlamat" placeholder="<?php echo $alamat;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Born In</label>
                                    <div class="col-sm-10">
                                        <input type="text" required="" class="form-control" name="inputTempat" id="inputTempat" placeholder="<?php echo $tempat;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Born Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" required="" class="form-control" name="inputTgl" id="inputTgl" placeholder="<?php echo $tgl;?>">
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
                            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url('C_backOwner/updatePhotoOwner/');echo $user?>" >
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Upload Photo</label>

                                    <div class="col-sm-10">
                                        <input type="file" required="" name="foto" class="form-control" id="photo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Update</button>
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
$this->load->view('back/owner/parts/footer');
?>