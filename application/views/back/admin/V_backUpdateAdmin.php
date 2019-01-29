<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 24/05/2018
 * Time: 11.34
 */

$lvl = $this->session->userdata('lvlAdm');
$foto = $this->session->userdata('fotoAdmEdit');
$nama = $this->session->userdata('namaAdmEdit');
$akses = $this->session->userdata('aksesAdmEdit');
if($akses==3273){
    $aksesL="Kota Bandung";
}
if($akses==3204){
    $aksesL="Kabupaten Bandung";
}
if($akses==3217){
    $aksesL="Kabupaten Bandung Barat";
}
if($akses==3277){
    $aksesL="Kota Cimahi";
}
$email = $this->session->userdata('emailAdmEdit');
$NIP = $this->session->userdata('userAdmEdit');

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
                        <img class="profile-user-img img-responsive img-circle" src="<?php if ($foto!=""){echo base_url('uploads/adm/');echo$foto;}else{echo base_url('assets/back/dist/img/user2-160x160.jpg');}?>" alt="User profile picture">

                        <h3 class="profile-username text-center"><?php echo $nama;?></h3>

                        <p class="text-muted text-center"><?php echo $aksesL;?></p>

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
                        <li class="active"><a href="#profile" data-toggle="tab">Update Profile</a></li>
                        <li><a href="#photo" data-toggle="tab">Change Photo</a></li>
                    </ul>
                    <div class="tab-content">
                        <?php
                        if ($popUpProfile==TRUE){
                            echo "<script>updateProfile()</script>";
                        }
                        if ($popUpPhoto==TRUE){
                            echo "<script>updatePhoto()</script>";
                        }
                        ?>
                        <!-- /.tab-pane -->
                        <div class="active tab-pane" id="profile">
                            <form class="form-horizontal" method="post" action="<?php echo base_url('C_backAdmin/updateProfileAdmin/');echo $NIP?>" >
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
                            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url('C_backAdmin/updatePhotoAdmin/');echo $NIP?>" >
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
$this->load->view('back/admin/parts/footer');
?>