<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 02/06/2018
 * Time: 05.13
 */

class C_backOwner extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_backOwner');
        $this->load->model('M_backAdmin');

    }

    public function index(){
        $data = array(
            "title"=>"Dashboard",
            "subTitle"=>"Owner"
        );
        if ($this->session->userdata('isLoginOwner') == TRUE) {
            $this->load->view('back/owner/V_backIndex',$data);
        }else{
            redirect('login');
        }
    }
    public function profile(){
        $data = array(
            "title"=>"Profile",
            "subTitle"=>"Owner",
            "popUpProfile"=>FALSE,
            "popUpPass"=>FALSE,
            "popUpPhoto"=>FALSE,

        );
        if ($this->session->userdata('isLoginOwner') == TRUE) {
            $this->load->view('back/owner/V_backProfile',$data);
        }else{
            redirect('owner');
        }
    }
    function updateProfile($nik){
        $data = array(
            "title"=>"Profile",
            "subTitle"=>"Admin",
            "popUpProfile"=>TRUE,
            "popUpPass"=>FALSE,
            "popUpPhoto"=>FALSE,
        );
        if ($this->session->userdata('isLoginOwner') == TRUE) {
            $nama  = $this->input->post('inputName');
            $email = $this->input->post('inputEmail');
            $alamat = $this->input->post('inputAlamat');
            $tempat = $this->input->post('inputTempat');
            $tgl = $this->input->post('inputTgl');

            $this->M_backAdmin->updateProfileOwner($nik,$nama,$email,$alamat,$tempat,$tgl);
            $setProfile = $this->M_backAdmin->getProfileOwner($nik);
            foreach ($setProfile->result() as $dat){
                $sess_data['userOwn']               = $dat->nik;
                $sess_data['namaOwn']               = $dat->nama;
                $sess_data['emailOwn']              = $dat->email;
                $sess_data['alamatOwn']             = $dat->alamat;
                $sess_data['tempat_lahirOwn']       = $dat->tempat_lahir;
                $sess_data['tgl_lahirOwn']          = $dat->tgl_lahir;
                $sess_data['file_ktpOwn']           = $dat->file_ktp;


                $this->session->set_userdata($sess_data);
            }
            $this->load->view('back/owner/V_backProfile',$data);
        }else{
            redirect('owner');
        }
    }
    function updatePassword($nik){
        if ($this->session->userdata('isLoginOwner') == TRUE) {
            $this->form_validation->set_rules('inputOPassword', 'Old Password', 'required|trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                redirect('profile/owner');
            }else {
                $opass = sha1($this->input->post('inputOPassword'));
                $cekPas = $this->M_backAdmin->getProfileOwner($nik);
                foreach ($cekPas->result() as $db) {$dbpass = $db->password;}
                if ($opass != $dbpass) {
                    $this->session->set_flashdata('result_login', '<br>old password = '.$opass.' - '.$dbpass.' does not match!.');
                    redirect('profile/owner');
                }else{
                    $data = array(
                        "title"=>"Profile",
                        "subTitle"=>"Admin",
                        "popUpPass"=>TRUE,
                        "popUpProfile"=>FALSE,
                        "popUpPhoto"=>FALSE,
                    );
                    $npass = $this->input->post('pass');
                    $cpass = $this->input->post('cpass');
                    if ($npass==$cpass){
                        $this->M_backOwner->updatePassword($nik, $cpass);
                        $setProfile = $this->M_backAdmin->getProfileOwner($nik);
                        foreach ($setProfile->result() as $dat) {
                            $sess_data['userOwn']               = $dat->nik;
                            $sess_data['namaOwn']               = $dat->nama;
                            $sess_data['emailOwn']              = $dat->email;
                            $sess_data['alamatOwn']             = $dat->alamat;
                            $sess_data['tempat_lahirOwn']       = $dat->tempat_lahir;
                            $sess_data['tgl_lahirOwn']          = $dat->tgl_lahir;
                            $sess_data['file_ktpOwn']           = $dat->file_ktp;
                            $this->session->set_userdata($sess_data);

                            $this->load->view('back/owner/V_backProfile',$data);

                        }
                    }else{
                        $this->session->set_flashdata('result_login', '<br>New password = '.$npass.' - Confirm Password '.$cpass.' does not match!.');
                        redirect('profile/owner');
                    }
                }
            }
        }else{
            redirect('owner');
        }
    }
    public function updatePhotoOwner($nik){
        if ($this->session->userdata('isLoginOwner') == TRUE) {
            //Check whether user upload picture
            if(!empty($_FILES['foto']['name'])){
                $config['upload_path'] = 'uploads/owner/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['foto']['name'];

                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('foto')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
                $picture = '';
            }
            //Prepare array of user data
            $data = array(
                "title"=>"Profile",
                "subTitle"=>"Owner",
                "popUpPass"=>FALSE,
                "popUpProfile"=>FALSE,
                "popUpPhoto"=>TRUE,
            );
            $this->M_backOwner->updatePhotoOwner($nik,$picture);
            $setProfile = $this->M_backOwner->getProfile($nik);
            foreach ($setProfile->result() as $dat){
                $sess_data['userOwn']           = $dat->nik;
                $sess_data['namaOwn']           = $dat->nama;
                $sess_data['emailOwn']          = $dat->email;
                $sess_data['alamatOwn']         = $dat->alamat;
                $sess_data['tempat_lahirOwn']   = $dat->tempat_lahir;
                $sess_data['tgl_lahirOwn']      = $dat->tgl_lahir;
                $sess_data['file_ktpOwn']       = $dat->file_ktp;
                $this->session->set_userdata($sess_data);
            }
            $this->load->view('back/owner/V_backProfile',$data);
        }else{
            redirect('owner');
        }
    }
    public function insertLoc(){
        $this->load->model('M_backAdmin');
        $data = array(
            "title"=>"Add Location",
            "subTitle"=>"Bandung Raya",
            "kecKabBdg"=>$this->M_backAdmin->getKecKabBdg(),
            "idWisNew"=>$this->M_backAdmin->getIdWisNew(),

        );
        if ($this->session->userdata('isLoginOwner') == TRUE) {
            $this->load->view('back/owner/V_backInsert',$data);
        }else{
            redirect('login');
        }
    }
    function insertLocAuth($id){
        $nama       = $this->input->post("nama");
        $alamat     = $this->input->post("alamat");
        $kabKot     = $this->input->post("kabKot");
        $kecamatan  = $this->input->post("kecamatan");
        $desa       = $this->input->post("desa");
        $htm        = $this->input->post("HTM");
        $lat        = $this->input->post("lat");
        $lng        = $this->input->post("lng");
        $owner      = $this->input->post("owner");
        if($owner==''){
            $owner=null;
        }
        $des        = $this->input->post("desc");
        $fas1Name   = $this->input->post("fas1Name");
        $fas2Name   = $this->input->post("fas2Name");
        $fas1Cost   = $this->input->post("fas1Cost");
        $fas2Cost   = $this->input->post("fas2Cost");

        if (!empty($_FILES['photo']['name'])) {
            $filesCount = count($_FILES['photo']['name']);
            for($i = 0; $i < $filesCount; $i++) {
                $_FILES['file']['name']     = $_FILES['photo']['name'][$i];
                $_FILES['file']['type']     = $_FILES['photo']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['photo']['tmp_name'][$i];
                $_FILES['file']['error']    = $_FILES['photo']['error'][$i];
                $_FILES['file']['size']     = $_FILES['photo']['size'][$i];
                if($kabKot=='3273'){
                    $uploadPath = 'uploads/wisata/kota_bandung';
                }
                if($kabKot=='3204'){
                    $uploadPath = 'uploads/wisata/kab_bandung';
                }
                if($kabKot=='3217'){
                    $uploadPath = 'uploads/wisata/kab_bandung_barat';
                }
                if($kabKot=='3277'){
                    $uploadPath = 'uploads/wisata/cimahi';
                }
                // File upload configuration
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';

                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                // Upload file to server
                if ($this->upload->do_upload('file')) {
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData[$i]['id_foto'] = '';
                    $uploadData[$i]['nama_foto'] = $fileData['file_name'];
                    $uploadData[$i]['id_wisata']  = $id;
                }
            }
            if(!empty($uploadData)){
                $this->M_backAdmin->addWisata($id,$nama,$alamat,$kabKot,$kecamatan,$desa,$htm,$lat,$lng,$owner,$des);
                $this->M_backAdmin->addFasility($fas1Name,$fas1Cost,$fas2Name,$fas2Cost,$id);
                $this->M_backAdmin->addPhoto($uploadData);
                $this->session->set_flashdata('result_pesanS', '<br>Berhasil.');
                redirect('insert/loc');
            }else{
                $this->session->set_flashdata('result_pesanG', '<br>Gagal.');
                redirect('insert/loc');
            }
        }
    }
    public function manageLoc($id){
        $data = array(
            "title"=>"Manage Tourism",
            "subTitle"=>"Bandung Raya",
            "dataWisata"=>$this->M_backOwner->getDataWisata($id),
        );
        if ($this->session->userdata('isLoginOwner') == TRUE) {
            $this->load->view('back/owner/V_backManage',$data);
        }else{
            redirect('login');
        }
    }
    function setDeleteWisata($id,$owner){
        $this->M_backAdmin->setDeleteWisata($id);
        $data = array(
            "title"=>"Manage Tourism",
            "subTitle"=>"Bandung Raya",
            "dataWisata"=>$this->M_backOwner->getDataWisata($id),
        );
        redirect('C_backOwner/manageLoc/'.$owner,$data);
    }
    public function setEditWisata($id,$owner){
        $data = array(
            "title"=>"Manage Tourism",
            "subTitle"=>"Kabupaten Bandung",
            "getAllData1"=>$this->M_backOwner->getAllData1($id,$owner),

        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->load->view('back/owner/V_backEdit',$data);
        }else{
            redirect('admin');
        }
    }
    function updateWisata($id,$owner){
        $nama       = $this->input->post("nama");
        $alamat     = $this->input->post("alamat");
        $kabKot     = $this->input->post("kabKot");
        $kecamatan  = $this->input->post("kecamatan");
        $desa       = $this->input->post("desa");
        $htm        = $this->input->post("HTM");
        $lat        = $this->input->post("lat");
        $lng        = $this->input->post("lng");
        $owner      = $this->input->post("owner");
        if($owner==''){
            $owner=null;
        }
        $des        = $this->input->post("desc");

        if($this->session->userdata('isLoginAdmin') == TRUE){
            $this->M_backAdmin->updateWisata($id,$nama,$alamat,$kecamatan,$desa,$htm,$lat,$lng,$owner,$des);
            $this->session->set_flashdata('result_pesanS', '<br>Berhasil.');
            redirect('C_backOwner/setEditWisata/' . $id ."/".$owner);
        }else{
            $this->session->set_flashdata('result_pesanG', '<br>Gagal.');
            redirect('C_backOwner/setEditWisata/' . $id ."/".$owner);
        }
    }
}