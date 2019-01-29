<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 02/06/2018
 * Time: 01.38
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class C_backAdmin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_backAdmin');
        $this->load->model('M_loginAdmin');

    }

    public function index(){
        $data = array(
            "title"=>"Dashboard",
            "subTitle"=>"Control Panel",
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->load->view('back/admin/V_backIndex',$data);
        }else{
            redirect('admin');
        }
    }
    function setDeleteInbox($id){
        $this->M_backAdmin->setDeleteInbox($id);
        $data = array("title"=>"Dashboard",
            "subTitle"=>"Inbox",
            "inbox"=>$this->M_backAdmin->getNewInbox(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN()
        );
        redirect('inbox/',$data);
    }
    function showInbox(){
        $data = array("title"=>"Dashboard",
            "subTitle"=>"Inbox",
            "note"=>null,
            "inbox"=>$this->M_backAdmin->getNewInbox(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN()
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->load->view('back/admin/V_backInbox',$data);
        }else{
            redirect('admin/');
        }
    }
    function showDeletedInbox(){
        $data = array("title"=>"Dashboard",
            "subTitle"=>"Inbox",
            "note"=>"After 30 Days, Deleted Messages Won't Be Displayed",
            "inbox"=>$this->M_backAdmin->getDeletedInbox(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN()
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->load->view('back/admin/V_backInbox',$data);
        }else{
            redirect('admin/');
        }
    }
    function showReadedInbox(){
        $data = array("title"=>"Dashboard",
            "subTitle"=>"Inbox",
            "note"=>null,
            "inbox"=>$this->M_backAdmin->getReadedInbox(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN()
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->load->view('back/admin/V_backInbox',$data);
        }else{
            redirect('admin');
        }
    }
    function readInbox($id){
        $this->M_backAdmin->setReadInbox($id);
        $data = array("title"=>"Dashboard",
            "subTitle"=>"Read Inbox",
            "inbox"=>$this->M_backAdmin->readInbox($id),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN()
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->load->view('back/admin/V_backReadInbox',$data);
        }else{
            redirect('admin/');
        }
    }
    function showAdmin(){
        $data = array("title"=>"Dashboard",
            "subTitle"=>"Manage Admin",
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "admin"=>$this->M_backAdmin->getAdminKotBDG(),
            "adminKotBDG"=>$this->M_backAdmin->getAdminKotBDG(),
            "adminKabBDG"=>$this->M_backAdmin->getAdminKabBDG(),
            "adminKabBDGB"=>$this->M_backAdmin->getAdminKabBDGB(),
            "adminKotCMH"=>$this->M_backAdmin->getAdminKotCMH(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN()
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->countAdm();
            $this->load->view('back/admin/V_backManageAdmin',$data);
        }else{
            redirect('admin/');
        }
    }
    function kabBDG(){
        $data = array("title"=>"Dashboard",
            "subTitle"=>"Manage Admin",
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "admin"=>$this->M_backAdmin->getAdminKabBDG(),
            "adminKotBDG"=>$this->M_backAdmin->getAdminKotBDG(),
            "adminKabBDG"=>$this->M_backAdmin->getAdminKabBDG(),
            "adminKabBDGB"=>$this->M_backAdmin->getAdminKabBDGB(),
            "adminKotCMH"=>$this->M_backAdmin->getAdminKotCMH(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN()
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->countAdm();
            $this->load->view('back/admin/V_backManageAdmin',$data);
        }else{
            redirect('admin/');
        }
    }
    function KabBDGB(){
        $data = array("title"=>"Dashboard",
            "subTitle"=>"Manage Admin",
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "admin"=>$this->M_backAdmin->getAdminKabBDGB(),
            "adminKotBDG"=>$this->M_backAdmin->getAdminKotBDG(),
            "adminKabBDG"=>$this->M_backAdmin->getAdminKabBDG(),
            "adminKabBDGB"=>$this->M_backAdmin->getAdminKabBDGB(),
            "adminKotCMH"=>$this->M_backAdmin->getAdminKotCMH(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN()
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->countAdm();
            $this->load->view('back/admin/V_backManageAdmin',$data);
        }else{
            redirect('admin/');
        }
    }
    function kotCMH(){
        $data = array("title"=>"Dashboard",
            "subTitle"=>"Manage Admin",
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "admin"=>$this->M_backAdmin->getAdminKotCMH(),
            "adminKotBDG"=>$this->M_backAdmin->getAdminKotBDG(),
            "adminKabBDG"=>$this->M_backAdmin->getAdminKabBDG(),
            "adminKabBDGB"=>$this->M_backAdmin->getAdminKabBDGB(),
            "adminKotCMH"=>$this->M_backAdmin->getAdminKotCMH(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN()
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->countAdm();
            $this->load->view('back/admin/V_backManageAdmin',$data);
        }else{
            redirect('admin/');
        }
    }
    function showOwner(){
        $data = array("title"=>"Dashboard",
            "subTitle"=>"Manage Owner",
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "owner"=>$this->M_backAdmin->getOwnerA(),
            "ownerA"=>$this->M_backAdmin->getOwnerA(),
            "ownerN"=>$this->M_backAdmin->getOwnerN(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN()
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->countOwnAktif();
            $this->countOwnNotAktif();
            $this->load->view('back/admin/V_backManageOwner',$data);
        }else{

            redirect('admin/');
        }
    }
    function showOwnerN(){
        $data = array("title"=>"Dashboard",
            "subTitle"=>"Manage Owner",
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "owner"=>$this->M_backAdmin->getOwnerN(),
            "ownerA"=>$this->M_backAdmin->getOwnerA(),
            "ownerN"=>$this->M_backAdmin->getOwnerN(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN()
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->countOwnAktif();
            $this->countOwnNotAktif();
            $this->load->view('back/admin/V_backManageOwner',$data);
        }else{

            redirect('admin/');
        }
    }
    function setDeleteAdmin($id){
        $this->M_backAdmin->setDeleteAdmin($id);
        $data = array("title"=>"Dashboard",
            "subTitle"=>"Manage Admin",
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "admin"=>$this->M_backAdmin->getAdminKotBDG(),
            "adminKotBDG"=>$this->M_backAdmin->getAdminKotBDG(),
            "adminKabBDG"=>$this->M_backAdmin->getAdminKabBDG(),
            "adminKabBDGB"=>$this->M_backAdmin->getAdminKabBDGB(),
            "adminKotCMH"=>$this->M_backAdmin->getAdminKotCMH(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN()
        );
        $this->countAdm();
        redirect('manageAdmin/',$data);
    }
    function setDeleteOwner($id){
        $this->M_backAdmin->setDeleteOwner($id);
        $data = array("title"=>"Dashboard",
            "subTitle"=>"Manage Owner",
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "owner"=>$this->M_backAdmin->getOwnerA(),
            "ownerA"=>$this->M_backAdmin->getOwnerA(),
            "ownerN"=>$this->M_backAdmin->getOwnerN(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN()
        );
        $this->countOwnAktif();
        $this->countOwnNotAktif();
        redirect('manageOwner/',$data);
    }
    public function profile(){
        $data = array(
            "title"=>"Profile",
            "subTitle"=>"Admin",
            "popUpProfile"=>FALSE,
            "popUpPass"=>FALSE,
            "popUpPhoto"=>FALSE,
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->load->view('back/admin/V_backProfile',$data);
        }else{
            redirect('admin');
        }
    }
    function updateProfile($nip){
        $data = array(
            "title"=>"Profile",
            "subTitle"=>"Admin",
            "popUpProfile"=>TRUE,
            "popUpPass"=>FALSE,
            "popUpPhoto"=>FALSE,
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
        $nama  = $this->input->post('inputName');
        $email = $this->input->post('inputEmail');
        $this->M_backAdmin->updateProfile($nip,$nama,$email);
        $setProfile = $this->M_backAdmin->getProfile($nip);
        foreach ($setProfile->result() as $dat){
            $sess_data['userAdm']           = $dat->NIP;
            $sess_data['namaAdm']           = $dat->nama;
            $sess_data['aksesAdm']          = $dat->akses_wilayah;
            $sess_data['fotoAdm']           = $dat->foto;
            $sess_data['lvlAdm']            = $dat->level;
            $sess_data['emailAdm']           = $dat->email;
            $this->session->set_userdata($sess_data);
        }
            $this->load->view('back/admin/V_backProfile',$data);
        }else{
            redirect('admin');
        }
    }
    function updatePassword($nip){
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->form_validation->set_rules('inputOPassword', 'Old Password', 'required|trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                redirect('profile/adm');
            }else {
                $opass = sha1($this->input->post('inputOPassword'));
                $cekPas = $this->M_backAdmin->getProfile($nip);
                foreach ($cekPas->result() as $db) {$dbpass = $db->password;}
                if ($opass != $dbpass) {
                    $this->session->set_flashdata('result_login', '<br>old password = '.$opass.' - '.$dbpass.' does not match!.');
                    redirect('profile/adm');
                }else{
                    $data = array(
                        "title"=>"Profile",
                        "subTitle"=>"Admin",
                        "popUpPass"=>TRUE,
                        "popUpProfile"=>FALSE,
                        "popUpPhoto"=>FALSE,
                        "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
                        "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
                        "notifN"=>$this->M_backAdmin->getNewInbox(),
                        "notifD"=>$this->M_backAdmin->getDeletedInbox(),
                        "notifR"=>$this->M_backAdmin->getReadedInbox(),
                    );
                    $npass = $this->input->post('pass');
                    $cpass = $this->input->post('cpass');
                    if ($npass==$cpass){
                        $this->M_backAdmin->updatePassword($nip, $cpass);
                        $setProfile = $this->M_backAdmin->getProfile($nip);
                        foreach ($setProfile->result() as $dat) {
                            $sess_data['userAdm'] = $dat->NIP;
                            $sess_data['namaAdm'] = $dat->nama;
                            $sess_data['aksesAdm'] = $dat->akses_wilayah;
                            $sess_data['fotoAdm'] = $dat->foto;
                            $sess_data['lvlAdm'] = $dat->level;
                            $sess_data['emailAdm'] = $dat->email;
                            $this->session->set_userdata($sess_data);

                            $this->load->view('back/admin/V_backProfile',$data);

                        }
                    }else{
                        $this->session->set_flashdata('result_login', '<br>New password = '.$npass.' - Confirm password = '.$cpass.' does not match!.');
                        redirect('profile/adm');
                    }
                }
            }
        }else{
            redirect('admin');
        }
    }
    public function updatePhoto($nip){
        $data = array(
            "title"=>"Profile",
            "subTitle"=>"Admin",
            "popUpProfile"=>TRUE,
            "popUpPass"=>FALSE,
            "popUpPhoto"=>TRUE,
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
                //Check whether user upload picture
                if(!empty($_FILES['foto']['name'])){
                    $config['upload_path'] = 'uploads/adm/';
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

                $this->M_backAdmin->updatePhotoAdm($nip,$picture);
                $setProfile = $this->M_backAdmin->getProfile($nip);
                foreach ($setProfile->result() as $dat){
                    $sess_data['userAdm']           = $dat->NIP;
                    $sess_data['namaAdm']           = $dat->nama;
                    $sess_data['aksesAdm']          = $dat->akses_wilayah;
                    $sess_data['fotoAdm']           = $dat->foto;
                    $sess_data['lvlAdm']            = $dat->level;
                    $sess_data['emailAdm']          = $dat->email;
                    $this->session->set_userdata($sess_data);
                }
                $this->load->view('back/admin/V_backProfile',$data);
        }else{
            redirect('admin');
        }
    }
    public function setEditAdmin($nip){
        $data = array(
            "title"=>"Profile",
            "subTitle"=>"Update Admin",
            "popUpProfile"=>FALSE,
            "popUpPhoto"=>FALSE,
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $getProfile = $this->M_backAdmin->getProfile($nip);
            foreach ($getProfile->result() as $dat){
                $sess_data['userAdmEdit']           = $dat->NIP;
                $sess_data['namaAdmEdit']           = $dat->nama;
                $sess_data['aksesAdmEdit']          = $dat->akses_wilayah;
                $sess_data['fotoAdmEdit']           = $dat->foto;
                $sess_data['emailAdmEdit']           = $dat->email;
                $this->session->set_userdata($sess_data);
            }
            $this->load->view('back/admin/V_backUpdateAdmin',$data);
        }else{
            redirect('admin');
        }
    }
    function updateProfileAdmin($nip){
        $data = array(
            "title"=>"Profile",
            "subTitle"=>"Update Admin",
            "popUpProfile"=>TRUE,
            "popUpPhoto"=>FALSE,
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $nama  = $this->input->post('inputName');
            $email = $this->input->post('inputEmail');
            $this->M_backAdmin->updateProfile($nip,$nama,$email);
            $setProfile = $this->M_backAdmin->getProfile($nip);
            foreach ($setProfile->result() as $dat){
                $sess_data['userAdmEdit']           = $dat->NIP;
                $sess_data['namaAdmEdit']           = $dat->nama;
                $sess_data['aksesAdmEdit']          = $dat->akses_wilayah;
                $sess_data['fotoAdmEdit']           = $dat->foto;
                $sess_data['emailAdmEdit']           = $dat->email;
                $this->session->set_userdata($sess_data);
            }
            $this->load->view('back/admin/V_backUpdateAdmin',$data);
        }else{
            redirect('admin');
        }
    }
    public function updatePhotoAdmin($nip){
        $data = array(
            "title"=>"Profile",
            "subTitle"=>"Update Admin",
            "popUpProfile"=>FALSE,
            "popUpPhoto"=>TRUE,
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            //Check whether user upload picture
            if(!empty($_FILES['foto']['name'])){
                $config['upload_path'] = 'uploads/adm/';
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

            $this->M_backAdmin->updatePhotoAdm($nip,$picture);
            $setProfile = $this->M_backAdmin->getProfile($nip);
            foreach ($setProfile->result() as $dat){
                $sess_data['userAdmEdit']           = $dat->NIP;
                $sess_data['namaAdmEdit']           = $dat->nama;
                $sess_data['aksesAdmEdit']          = $dat->akses_wilayah;
                $sess_data['fotoAdmEdit']           = $dat->foto;
                $sess_data['emailAdmEdit']           = $dat->email;
                $this->session->set_userdata($sess_data);
            }
            $this->load->view('back/admin/V_backUpdateAdmin',$data);
        }else{
            redirect('admin');
        }
    }
    public function setEditOwner($nip){
        $data = array(
            "title"=>"Profile",
            "subTitle"=>"Update Owner",
            "popUpProfile"=>FALSE,
            "popUpPhoto"=>FALSE,
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $getProfile = $this->M_backAdmin->getProfileOwner($nip);
            foreach ($getProfile->result() as $dat){
                $sess_data['userOwnEdit']               = $dat->nik;
                $sess_data['namaOwnEdit']               = $dat->nama;
                $sess_data['emailOwnEdit']              = $dat->email;
                $sess_data['alamatOwnEdit']             = $dat->alamat;
                $sess_data['tempat_lahirOwnEdit']       = $dat->tempat_lahir;
                $sess_data['tgl_lahirOwnEdit']          = $dat->tgl_lahir;
                $sess_data['file_ktpOwnEdit']           = $dat->file_ktp;
                $sess_data['statusOwnEdit']             = $dat->status;

                $this->session->set_userdata($sess_data);
            }
            $this->load->view('back/admin/V_backUpdateOwner',$data);
        }else{
            redirect('admin');
        }
    }
    function updateProfileOwner($nik){

        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $nama  = $this->input->post('inputName');
            $email = $this->input->post('inputEmail');
            $alamat = $this->input->post('inputAlamat');
            $tempat    = $this->input->post('inputTempat');
            $tgl = $this->input->post('inputTgl');
            $data = array(
                "title"=>"Profile",
                "subTitle"=>"Update Admin",
                "popUpProfile"=>TRUE,
                "popUpPhoto"=>FALSE,
                "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
                "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
                "notifN"=>$this->M_backAdmin->getNewInbox(),
                "notifD"=>$this->M_backAdmin->getDeletedInbox(),
                "notifR"=>$this->M_backAdmin->getReadedInbox(),
            );
            $this->M_backAdmin->updateProfileOwner($nik,$nama,$email,$alamat,$tempat,$tgl);
            $setProfile = $this->M_backAdmin->getProfileOwner($nik);
            foreach ($setProfile->result() as $dat){
                $sess_data['userOwnEdit']               = $dat->nik;
                $sess_data['namaOwnEdit']               = $dat->nama;
                $sess_data['emailOwnEdit']              = $dat->email;
                $sess_data['alamatOwnEdit']             = $dat->alamat;
                $sess_data['tempat_lahirOwnEdit']       = $dat->tempat_lahir;
                $sess_data['tgl_lahirOwnEdit']          = $dat->tgl_lahir;
                $sess_data['file_ktpOwnEdit']           = $dat->file_ktp;
                $sess_data['statusOwnEdit']             = $dat->status;

                $this->session->set_userdata($sess_data);
            }
            $this->load->view('back/admin/V_backUpdateOwner',$data);
        }else{
            redirect('admin');
        }
    }
    public function updatePhotoOwner($nik){
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
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
                "subTitle"=>"Update Admin",
                "popUpProfile"=>TRUE,
                "popUpPhoto"=>FALSE,
                "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
                "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
                "notifN"=>$this->M_backAdmin->getNewInbox(),
                "notifD"=>$this->M_backAdmin->getDeletedInbox(),
                "notifR"=>$this->M_backAdmin->getReadedInbox(),
            );
            $this->load->model('M_backOwner');
            $this->M_backOwner->updatePhotoOwner($nik,$picture);
            $setProfile = $this->M_backOwner->getProfile($nik);
            foreach ($setProfile->result() as $dat){
                $sess_data['userOwnEdit']               = $dat->nik;
                $sess_data['namaOwnEdit']               = $dat->nama;
                $sess_data['emailOwnEdit']              = $dat->email;
                $sess_data['alamatOwnEdit']             = $dat->alamat;
                $sess_data['tempat_lahirOwnEdit']       = $dat->tempat_lahir;
                $sess_data['tgl_lahirOwnEdit']          = $dat->tgl_lahir;
                $sess_data['file_ktpOwnEdit']           = $dat->file_ktp;
                $sess_data['statusOwnEdit']             = $dat->status;
                $this->session->set_userdata($sess_data);
            }
            $this->load->view('back/admin/V_backUpdateOwner',$data);
        }else{
            redirect('admin');
        }
    }
    public function countAdm(){
        $getAdm    = $this->M_loginAdmin->getAdm();
        foreach ($getAdm->result() as $gAdm) {
            $sess_data['countAdm'] = $gAdm->jmlAdm;
            $this->session->set_userdata($sess_data);
        }
    }
    public function countOwnAktif(){
        $getOwnAktif = $this->M_loginAdmin->getOwnAktif();
        foreach ($getOwnAktif->result() as $gOwnA) {
            $sess_data['countOwnA'] = $gOwnA->jmlOwnA;
            $this->session->set_userdata($sess_data);
        }
    }
    public function countOwnNotAktif(){
        $getOwnNotAktif = $this->M_loginAdmin->getOwnNotAktif();
        foreach ($getOwnNotAktif->result() as $gOwnN) {
            $sess_data['countOwnN'] = $gOwnN->jmlOwnN;
            $this->session->set_userdata($sess_data);
        }
    }
    public function addAdmin(){
        $data = array(
            "title"=>"Form",
            "subTitle"=>"Add Admin",
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->countAdm();
            $this->load->view('back/admin/V_backAddAdmin',$data);
        }else{
            redirect('admin');
        }
    }
    public function addAdminAuth(){
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
                $nip  = $this->input->post('nip');
                $nama = $this->input->post('nama');
                $email = $this->input->post('email');
                $pass    = $this->input->post('password');
                $cpass = $this->input->post('cpassword');
                $akses    = $this->input->post('akses');
                if ($pass!=$cpass){
                    $this->session->set_flashdata('result_pesanG', "<br>Password Doens't Match!");
                    $this->session->set_flashdata('result_pesanS', NULL);

                    redirect('addAdmin');
                }else {
                    $pwd = sha1($cpass);
                    $this->M_backAdmin->addAdmin($nip, $nama, $email, $pwd, $akses);
                    $this->session->set_flashdata('result_pesanS', "<br>Create New Admin Success.");
                    $this->session->set_flashdata('result_pesanG', NULL);

                    redirect('addAdmin');
                }
        }else{
            redirect('admin');
        }
    }
    public function activate($nik){
        $this->load->model('M_loginOwner');
        $this->M_loginOwner->activate($nik);
        $this->session->set_flashdata('result_confirm', '<br>This Account is active now');
        redirect("C_backAdmin/setEditOwner/".$nik);
    }
    public function deactivate($nik){
        $this->load->model('M_loginOwner');
        $this->M_loginOwner->deactivate($nik);
        $this->session->set_flashdata('result_confirm', '<br>This Account is not active now');
        redirect("C_backAdmin/setEditOwner/".$nik);
    }
    public function addKotaBDG(){
        $data = array(
            "title"=>"Add Location",
            "subTitle"=>"Kota Bandung",
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "kecBdg"=>$this->M_backAdmin->getKecBdg(),
            "idWisNew"=>$this->M_backAdmin->getIdWisNew(),

        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->load->view('back/admin/V_addKotaBDG',$data);
        }else{
            redirect('admin');
        }
    }
    public function addKabBDG(){
        $data = array(
            "title"=>"Add Location",
            "subTitle"=>"Kabupaten Bandung",
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "kecKabBdg"=>$this->M_backAdmin->getKecKabBdg(),
            "idWisNew"=>$this->M_backAdmin->getIdWisNew(),

        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->load->view('back/admin/V_addKabBDG',$data);
        }else{
            redirect('admin');
        }
    }
    public function addBDGBarat(){
        $data = array(
            "title"=>"Add Location",
            "subTitle"=>"Kabupaten Bandung Barat",
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "kecBdgBarat"=>$this->M_backAdmin->getKecBdgBarat(),
            "idWisNew"=>$this->M_backAdmin->getIdWisNew(),

        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->load->view('back/admin/V_addBDGBarat',$data);
        }else{
            redirect('admin');
        }
    }
    public function addCimahi(){
        $data = array(
            "title"=>"Add Location",
            "subTitle"=>"Kota Cimahi",
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "kecCimahi"=>$this->M_backAdmin->getKecCimahi(),
            "idWisNew"=>$this->M_backAdmin->getIdWisNew(),

        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->load->view('back/admin/V_addKotaCimahi',$data);
        }else{
            redirect('admin');
        }
    }
    public function manageKotaBDG(){
        $data = array(
            "title"=>"Manage Tourism",
            "subTitle"=>"Kota Bandung",
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "dataBdg"=>$this->M_backAdmin->getDataBdg(),

        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->load->view('back/admin/V_manageKotaBDG',$data);
        }else{
            redirect('admin');
        }
    }
    public function manageKabBDG(){
        $data = array(
            "title"=>"Manage Tourism",
            "subTitle"=>"Kabupaten Bandung",
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "dataKabBdg"=>$this->M_backAdmin->getDataKabBdg(),
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->load->view('back/admin/V_manageKabBDG',$data);
        }else{
            redirect('admin');
        }
    }
    public function manageBDGBarat(){
        $data = array(
            "title"=>"Manage Tourism",
            "subTitle"=>"Kabupaten Bandung Barat",
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "dataBdgBarat"=>$this->M_backAdmin->getDataBdgBarat(),

        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->load->view('back/admin/V_manageBDGBarat',$data);
        }else{
            redirect('admin');
        }
    }
    public function manageCimahi(){
        $data = array(
            "title"=>"Manage Tourism",
            "subTitle"=>"Kota Cimahi",
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "dataCimahi"=>$this->M_backAdmin->getDataCimahi(),
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->load->view('back/admin/V_manageKotaCimahi',$data);
        }else{
            redirect('admin');
        }
    }
    function setDeleteWisataBdgBarat($id){
        $this->M_backAdmin->setDeleteWisata($id);
        $data = array(
            "title"=>"Manage Tourism",
            "subTitle"=>"Kabupaten Bandung Barat",
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "dataBdgBarat"=>$this->M_backAdmin->getDataBdgBarat(),

        );
        redirect('manage/BDGBarat/',$data);
    }
    function setDeleteWisataBdg($id){
        $this->M_backAdmin->setDeleteWisata($id);
        $data = array(
            "title"=>"Manage Tourism",
            "subTitle"=>"Kota Bandung ",
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "dataBdg"=>$this->M_backAdmin->getDataBdg(),

        );
        redirect('manage/kotaBDG/',$data);
    }
    function setDeleteWisatakabBdg($id){
        $this->M_backAdmin->setDeleteWisata($id);
        $data = array(
            "title"=>"Manage Tourism",
            "subTitle"=>"Kabupaten Bandung",
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "dataKabBdg"=>$this->M_backAdmin->getDataKabBdg(),

        );
        redirect('manage/kabBDG/',$data);
    }
    function setDeleteWisataCimahi($id){
        $this->M_backAdmin->setDeleteWisata($id);
        $data = array(
            "title"=>"Manage Tourism",
            "subTitle"=>"Kota Cimahi",
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "dataCimahi"=>$this->M_backAdmin->getDataCimahi(),

        );
        redirect('manage/cimahi/',$data);
    }
    public function setEditWisataBdgBarat($id){
        $data = array(
            "title"=>"Manage Tourism",
            "subTitle"=>"Kabupaten Bandung Barat",
            "popUpProfile"=>FALSE,
            "popUpPhoto"=>FALSE,
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "kecBdgBarat"=>$this->M_backAdmin->getKecBdgBarat(),
            //"bdgBaratsatu"=>$this->M_backAdmin->getKecBdgBaratsatu($id),
            "getAllDataBdgBarat1"=>$this->M_backAdmin->getAllDataBdgBarat1($id),

        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $getAllDataBdgBarat = $this->M_backAdmin->getAllDataBdgBarat($id);
//            foreach ($getAllDataBdgBarat as $dat){
//                $sess_data['id_wisata']     = $dat->id_wisata;
//
//                $this->session->set_userdata($sess_data);
//            }
            $this->load->view('back/admin/V_editBDGBarat',$data);
        }else{
            redirect('admin');
        }
    }
    public function setEditWisataKotaBdg($id){
        $data = array(
            "title"=>"Manage Tourism",
            "subTitle"=>"Kota Bandung",
            "popUpProfile"=>FALSE,
            "popUpPhoto"=>FALSE,
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "kecBdg"=>$this->M_backAdmin->getKecBdg(),
            "getAllDataBdg1"=>$this->M_backAdmin->getAllDataBdg1($id),

        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {

            $this->load->view('back/admin/V_editBdg',$data);
        }else{
            redirect('admin');
        }
    }
    public function setEditWisataKabBdg($id){
        $data = array(
            "title"=>"Manage Tourism",
            "subTitle"=>"Kabupaten Bandung",
            "popUpProfile"=>FALSE,
            "popUpPhoto"=>FALSE,
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "kecKabBdg"=>$this->M_backAdmin->getKecKabBdg(),
            "getAllDataKabBdg1"=>$this->M_backAdmin->getAllDataKabBdg1($id),

        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            $this->load->view('back/admin/V_editKabBdg',$data);
        }else{
            redirect('admin');
        }
    }
    public function setEditWisataCimahi($id){
        $data = array(
            "title"=>"Manage Tourism",
            "subTitle"=>"Kota Cimahi",
            "popUpProfile"=>FALSE,
            "popUpPhoto"=>FALSE,
            "notifAktivated"=>$this->M_backAdmin->getOwnerA(),
            "notifNotAktivated"=>$this->M_backAdmin->getOwnerN(),
            "notifN"=>$this->M_backAdmin->getNewInbox(),
            "notifD"=>$this->M_backAdmin->getDeletedInbox(),
            "notifR"=>$this->M_backAdmin->getReadedInbox(),
            "kecCimahi"=>$this->M_backAdmin->getKecCimahi(),
            "getAllDataCimahi1"=>$this->M_backAdmin->getAllDataCimahi1($id),

        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {

            $this->load->view('back/admin/V_editCimahi',$data);
        }else{
            redirect('admin');
        }
    }
    public function database()
    {
        $this->load->dbutil();

        $prefs = array(
            'format' => 'sql',
            'filename' => 'my_db_backup.sql'
        );

        $backup = $this->dbutil->backup($prefs);

        $db_name = 'backup-on-' . date("Y-m-d-H-i-s") . '.sql'; // file name
        $save  = 'backup/db/' . $db_name; // dir name backup output destination

        $this->load->helper('file');
        write_file($save, $backup);

        $this->load->helper('download');
        force_download($db_name, $backup);
    }
    function ambil_data(){

        $modul=$this->input->get('modul');
        $id=$this->input->get('id');

        if($modul=="kabupaten"){
            echo $this->M_backAdmin->kabupaten($id);
        }
        else if($modul=="kecamatan"){
            echo $this->M_backAdmin->kecamatan($id);
        }
        else if($modul=="kelurahan"){
            echo $this->M_backAdmin->kelurahan($id);
        }
    }
    function addWisata($id){
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
                if($kabKot=='3273'){
                    redirect('addLocation/kotaBDG');
                }
                if($kabKot=='3204'){
                    redirect('addLocation/kabBDG');
                }
                if($kabKot=='3217'){
                    redirect('addLocation/BDGBarat');
                }
                if($kabKot=='3277'){
                    redirect('addLocation/cimahi');
                }
            }else{
                $this->session->set_flashdata('result_pesanG', '<br>Gagal.');
                if($kabKot=='3273'){
                    redirect('addLocation/kotaBDG');
                }
                if($kabKot=='3204'){
                    redirect('addLocation/kabBDG');
                }
                if($kabKot=='3217'){
                    redirect('addLocation/BDGBarat');
                }
                if($kabKot=='3277'){
                    redirect('addLocation/cimahi');
                }
            }
        }
    }
    function updateWisata($id){
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
//        $fas1Name   = $this->input->post("fas1Name");
//        $fas2Name   = $this->input->post("fas2Name");
//        $fas1Cost   = $this->input->post("fas1Cost");
//        $fas2Cost   = $this->input->post("fas2Cost");

//        if (!empty($_FILES['photo']['name'])) {
//            $filesCount = count($_FILES['photo']['name']);
//            for($i = 0; $i < $filesCount; $i++) {
//                $_FILES['file']['name']     = $_FILES['photo']['name'][$i];
//                $_FILES['file']['type']     = $_FILES['photo']['type'][$i];
//                $_FILES['file']['tmp_name'] = $_FILES['photo']['tmp_name'][$i];
//                $_FILES['file']['error']    = $_FILES['photo']['error'][$i];
//                $_FILES['file']['size']     = $_FILES['photo']['size'][$i];
//                if($kabKot=='3273'){
//                    $uploadPath = 'uploads/wisata/kota_bandung';
//                }
//                if($kabKot=='3204'){
//                    $uploadPath = 'uploads/wisata/kab_bandung';
//                }
//                if($kabKot=='3217'){
//                    $uploadPath = 'uploads/wisata/kab_bandung_barat';
//                }
//                if($kabKot=='3277'){
//                    $uploadPath = 'uploads/wisata/cimahi';
//                }
//                // File upload configuration
//                $config['upload_path'] = $uploadPath;
//                $config['allowed_types'] = 'jpg|jpeg|png|gif';
//
//                // Load and initialize upload library
//                $this->load->library('upload', $config);
//                $this->upload->initialize($config);
//
//                // Upload file to server
//                if ($this->upload->do_upload('file')) {
//                    // Uploaded file data
//                    $fileData = $this->upload->data();
//                    $uploadData[$i]['id_foto'] = '';
//                    $uploadData[$i]['nama_foto'] = $fileData['file_name'];
//                    $uploadData[$i]['id_wisata']  = $id;
//                }
//            }
            if($this->session->userdata('isLoginAdmin') == TRUE){
                $this->M_backAdmin->updateWisata($id,$nama,$alamat,$kecamatan,$desa,$htm,$lat,$lng,$owner,$des);
                //$this->M_backAdmin->addFasility($fas1Name,$fas1Cost,$fas2Name,$fas2Cost,$id);
                //$this->M_backAdmin->addPhoto($uploadData);
                $this->session->set_flashdata('result_pesanS', '<br>Berhasil.');
                if($kabKot=='3273'){
                    redirect('C_backAdmin/setEditWisataKotaBdg/'.$id);
                }
                if($kabKot=='3204'){
                    redirect('C_backAdmin/setEditWisataKabBdg/'.$id);
                }
                if($kabKot=='3217'){
                    redirect('C_backAdmin/setEditWisataBdgBarat/'.$id);
                }
                if($kabKot=='3277') {
                    redirect('C_backAdmin/setEditWisataCimahi/' . $id);
                }
            }else{
                $this->session->set_flashdata('result_pesanG', '<br>Gagal.');
                if($kabKot=='3273'){
                    redirect('C_backAdmin/setEditWisataKotaBdg/'.$id);
                }
                if($kabKot=='3204'){
                    redirect('C_backAdmin/setEditWisataKabBdg/'.$id);
                }
                if($kabKot=='3217'){
                    redirect('C_backAdmin/setEditWisataBdgBarat/'.$id);
                }
                if($kabKot=='3277'){
                    redirect('C_backAdmin/setEditWisataCimahi/'.$id);
                }
            }
        //}
    }


}