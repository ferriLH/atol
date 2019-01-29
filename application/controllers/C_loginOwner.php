<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 01/06/2018
 * Time: 23.24
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class C_loginOwner extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_loginOwner');
        $this->load->library('email');
        $this->load->helper(array('form', 'url'));
    }
    function index(){
        $data = array(
            "title" => "Login Owner"
        );
        if ($this->session->userdata('isLoginOwner') == TRUE) {
            redirect('dashboard/owner');
        }else{
            $this->load->view('sign/V_loginOwner',$data);
        }
    }
    public function auth(){
        $data = array(
            "title" => "Login Owner"
        );
        $this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('sign/V_loginOwner',$data);
        }else{
            $usr    = $this->input->post('username');
            $psw    = sha1($this->input->post('password'));
            $cek    = $this->M_loginOwner->cek($usr,$psw);
            if($cek->num_rows() != 0){
                foreach ($cek->result() as $dat){
                    $sess_data['isLoginOwner']          = TRUE;
                    $sess_data['userOwn']               = $dat->nik;
                    $sess_data['namaOwn']               = $dat->nama;
                    $sess_data['emailOwn']              = $dat->email;
                    $sess_data['alamatOwn']             = $dat->alamat;
                    $sess_data['tempat_lahirOwn']       = $dat->tempat_lahir;
                    $sess_data['tgl_lahirOwn']          = $dat->tgl_lahir;
                    $sess_data['file_ktpOwn']           = $dat->file_ktp;
                    $this->session->set_userdata($sess_data);
                }
                redirect('dashboard/owner');
            }else {
                $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
                redirect('login/');
            }
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('login/');
    }
    function signUp(){
        $data = array(
            "title" => "Sign Up"
        );
        $this->load->view('sign/V_signUpOwner',$data);
    }
    public function signUpAuth(){
        $data = array(
            "title" => "Sign Up"
        );
        $nik=$this->input->post("nik");
        $nama=$this->input->post("name");
        $email=$this->input->post("email");
        $password=sha1($this->input->post("cpass"));
        $alamat=$this->input->post("alamat");
        $tempatLahir=$this->input->post("tempatLahir");
        $tglLahir=$this->input->post("tanggalLahir");

        $this->form_validation->set_rules('nik',            'NIK',              'required|trim|xss_clean');
        $this->form_validation->set_rules('name',           'Name',             'required|trim|xss_clean');
        $this->form_validation->set_rules('email',          'Email',            'required|trim|xss_clean');
        $this->form_validation->set_rules('pass',           'Password',         'required|trim|xss_clean');
        $this->form_validation->set_rules('cpass',          'Confirm Password', 'required|trim|xss_clean');
        $this->form_validation->set_rules('alamat',         'Alamat',           'required|trim|xss_clean');
        $this->form_validation->set_rules('tempatLahir',    'Tempat Lahir',     'required|trim|xss_clean');
        $this->form_validation->set_rules('tanggalLahir',   'Tanggal Lahir',    'required|trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('sign/V_signUpOwner',$data);
        }else {
            if ($this->input->post('submit')) {
                if (!empty($_FILES['filename']['name'])) {
                    $config['upload_path'] = 'uploads/owner/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $_FILES['filename']['name'];

                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('filename')) {
                        $uploadData = $this->upload->data();
                        $picture = $uploadData['file_name'];
                    } else {
                        $picture = '';
                    }
                    $this->M_loginOwner->addOwner($nik, $nama, $email, $password, $alamat, $tempatLahir, $tglLahir, $picture);
                    $setProfile = $this->M_loginOwner->getProfile($nik);
                    foreach ($setProfile->result() as $dat) {
                        $sess_data['userOwn'] = $dat->nik;
                        $sess_data['namaOwn'] = $dat->nama;
                        $sess_data['emailOwn'] = $dat->email;
                        $sess_data['alamatOwn'] = $dat->alamat;
                        $sess_data['tempat_lahirOwn'] = $dat->tempat_lahir;
                        $sess_data['tgl_lahirOwn'] = $dat->tgl_lahir;
                        $sess_data['file_ktpOwn'] = $dat->file_ktp;
                        $this->session->set_userdata($sess_data);
                    }
                    $this->send_mail($email,$nik);
                    $this->session->set_flashdata('result_signUp', '<br>Please check your email and confirm your account.');
                    $this->load->view('sign/V_signUpOwner',$data);
                } else {
                    $this->session->set_flashdata('result_signUpGgl', '<br>Upload KTP Image.');
                    $this->load->view('sign/V_signUpOwner',$data);
                }

            }
        }
    }
    public function send_mail($toEmail,$nik) {

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
            'message' => "<a href='http://localhost/tubesAtol/C_loginOwner/activate/$nik' target='_blank'>Click here to activate your account</a>"
        );

        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from($config['smtp_user']); // change it to yours
        $this->email->to($to_email);// change it to yours
        $this->email->subject('Activation Mail');
        $this->email->message($config['message']);
        ini_set("SMTP",$config['smtp_host']);
        ini_set("smtp_port",$config['smtp_port']);

        //Send mail
        if($this->email->send())
            $this->session->set_flashdata("email_sent","Email sent successfully.");
        else
            $this->session->set_flashdata("email_sent","Error in sending Email.");

    }
    public function activate($nik){
        $this->M_loginOwner->activate($nik);
        $this->session->set_flashdata('result_confirm', '<br>Your Account is active. You can login now');
        redirect('login');
    }
    public function forgot(){
        $data = array(
            "title" => "Forgot Password"
        );
        $this->load->view('sign/V_forgot',$data);
    }
    public function forgotAuth(){
        $data = array(
            "title" => "Forgot Password"
        );
        $this->form_validation->set_rules('email', 'email', 'required|trim|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('sign/V_forgot',$data);
        }else{
            $email  = $this->input->post('email');
            $cek    = $this->M_loginOwner->cekMail($email);
            if($cek->num_rows() != 0){
                foreach ($cek->result() as $dat){
                    $sess_data['nik'] = $dat->nik;
                    $this->session->set_userdata($sess_data);
                }
                $nik = $this->session->userdata('nik');
                $this->mailForgot($email,$nik);
                $this->session->set_flashdata('result_suc', '<br>Check Your Email');
                redirect('C_loginOwner/forgot',$data);
            }else {
                $this->session->set_flashdata('result_ggl', '<br>Email you entered is not registered');
                redirect('C_loginOwner/forgot',$data);
            }
        }
    }
    public function mailForgot($toEmail,$nik) {

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
            'message' => "<a href='http://localhost/tubesAtol/C_loginOwner/forgetPassForm/$nik' target='_blank'>Click here to Change Your Password</a>"
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
    public function forgetPassForm($nik){
        $data = array(
            "title" => "Forgot Password",
            "nik" => $nik
        );
        $this->load->view('sign/V_forgetPassForm',$data);
    }
    public function forgetPassFormAuth($nik){
        $data = array(
            "title" => "Login Owner"
        );
        $this->form_validation->set_rules('password', 'Password',         'required|trim|xss_clean');
        $this->form_validation->set_rules('cpass','Confirm Password', 'required|trim|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('sign/V_forgetPassForm',$data);
        }else {
            $pwd = $this->input->post("password");
            $pass= $this->input->post("cpass");
            if($pwd!=$pass){
                $this->session->set_flashdata('result_ggl', '<br>Password and Confirm Password Does not Match');
                redirect('C_loginOwner/forgetPassForm/'.$nik);
            }else{
                $passs = sha1($pass);
                $this->M_loginOwner->changePass($passs,$nik);
                $this->session->set_flashdata('result_berhasil', '<br>Password Change Done. You can login with your new password below');
                redirect('login',$data);
            }
        }
    }
}