<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 02/06/2018
 * Time: 00.04
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class C_loginAdmin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_loginAdmin');
    }
    function index(){
        $data = array(
            "title" => "Login Admin"
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            redirect('dashboard/admin');
        }else{
            $this->load->view('sign/V_loginAdmin',$data);
        }

    }
    public function auth(){
        $this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('sign/V_loginAdmin');
        }else{
            $usr    = $this->input->post('username');
            $psw    = sha1($this->input->post('password'));
            $cek    = $this->M_loginAdmin->cek($usr,$psw);
            if($cek->num_rows() != 0){
                foreach ($cek->result() as $dat){
                    $sess_data['isLoginAdmin']      = TRUE;
                    $sess_data['userAdm']           = $dat->NIP;
                    $sess_data['namaAdm']           = $dat->nama;
                    $sess_data['aksesAdm']          = $dat->akses_wilayah;
                    $sess_data['fotoAdm']           = $dat->foto;
                    $sess_data['lvlAdm']            = $dat->level;
                    $sess_data['emailAdm']          = $dat->email;
                    $this->session->set_userdata($sess_data);
                }
                //ambil nama wilayah dari tbl regencies
                $idAkses = $this->session->userdata('aksesAdm');;
                $getAksesWilayah = $this->M_loginAdmin->getAksesWilayah($idAkses);
                foreach ($getAksesWilayah->result() as $dis) {
                    $sess_data['aksesWilayahAdm'] = $dis->name;
                    $this->session->set_userdata($sess_data);
                }
                //karna superadmin tidak mempunya wilayah akses maka diisi 'indonesia'
                if($this->session->userdata('aksesWilayahAdm')==NULL){
                    $sess_data['aksesWilayahAdm'] = "Indonesia";
                    $this->session->set_userdata($sess_data);
                }
                //ambil dan count jumlah admin aktif
                $getAdm    = $this->M_loginAdmin->getAdm();
                foreach ($getAdm->result() as $gAdm) {
                    $sess_data['countAdm'] = $gAdm->jmlAdm;
                    $this->session->set_userdata($sess_data);
                }
                //ambil dan count jumlah owner aktif
                $getOwnAktif = $this->M_loginAdmin->getOwnAktif();
                foreach ($getOwnAktif->result() as $gOwnA) {
                    $sess_data['countOwnA'] = $gOwnA->jmlOwnA;
                    $this->session->set_userdata($sess_data);
                }
                //ambil dan count jumlah owner belum/tidak aktif
                $getOwnNotAktif = $this->M_loginAdmin->getOwnNotAktif();
                foreach ($getOwnNotAktif->result() as $gOwnN) {
                    $sess_data['countOwnN'] = $gOwnN->jmlOwnN;
                    $this->session->set_userdata($sess_data);
                }
                $this->session->set_userdata($sess_data);
                redirect('dashboard/admin');
            }else {
                $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
                redirect('admin/');
            }
        }
    }
    function logout(){
        $this->session->sess_destroy();
        redirect('admin/');
    }
    public function forgot(){
        $data = array(
            "title" => "Forgot Password"
        );
        $this->load->view('sign/V_forgotAdmin',$data);
    }
    public function forgotAuth(){
        $data = array(
            "title" => "Forgot Password"
        );
        $this->form_validation->set_rules('email', 'email', 'required|trim|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('sign/V_forgotAdmin',$data);
        }else{
            $email  = $this->input->post('email');
            $cek    = $this->M_loginAdmin->cekMail($email);
            if($cek->num_rows() != 0){
                foreach ($cek->result() as $dat){
                    $sess_data['nip'] = $dat->NIP;
                    $this->session->set_userdata($sess_data);
                }
                $nip = $this->session->userdata('nip');
                $this->mailForgot($email,$nip);
                $this->session->set_flashdata('result_suc', '<br>Check Your Email');
                redirect('C_loginAdmin/forgot',$data);
            }else {
                $this->session->set_flashdata('result_ggl', '<br>Email you entered is not registered');
                redirect('C_loginAdmin/forgot',$data);
            }
        }
    }
    public function mailForgot($toEmail,$nip) {

        $to_email = $toEmail;

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => '465',
            'smtp_user' => 'ferrilasmihalim@email.unikom.ac.id',
            'smtp_pass' => 'Ferz1001Halim', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE,
            'message' => "<a href='http://localhost/tubesAtol/C_loginAdmin/forgetPassForm/$nip' target='_blank'>Click here to Change Your Password</a>"
        );

        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from($config['smtp_user']); // change it to yours
        $this->email->to($to_email);// change it to yours
        $this->email->subject('Forget Password');
        $this->email->message($config['message']);
        ini_set("SMTP",$config['smtp_host']);
        ini_set("smtp_port",$config['smtp_port']);

        //Send mail
        if($this->email->send())
            $this->session->set_flashdata("email_sent","Email sent successfully.");
        else
            $this->session->set_flashdata("email_sent","Error in sending Email.");

    }
    public function forgetPassForm($nip){
        $data = array(
            "title" => "Forgot Password",
            "nip" => $nip
        );
        $this->load->view('sign/V_forgetPassFormAdmin',$data);
    }
    public function forgetPassFormAuth($nip){
        $data = array(
            "title" => "Login Admin"
        );
        $this->form_validation->set_rules('password', 'Password',         'required|trim|xss_clean');
        $this->form_validation->set_rules('cpass','Confirm Password', 'required|trim|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('sign/V_forgetPassFormAdmin',$data);
        }else {
            $pwd = $this->input->post("password");
            $pass= $this->input->post("cpass");
            if($pwd!=$pass){
                $this->session->set_flashdata('result_ggl', '<br>Password and Confirm Password Does not Match');
                redirect('C_loginAdmin/forgetPassForm/'.$nip);
            }else{
                $passs = sha1($pass);
                $this->M_loginAdmin->changePass($passs,$nip);
                $this->session->set_flashdata('result_berhasil', '<br>Password Change Done. You can login with your new password below');
                redirect('admin',$data);
            }
        }
    }
}