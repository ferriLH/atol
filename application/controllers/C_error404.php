<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 27/05/2018
 * Time: 15.58
 */

class C_error404 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->load->view('V_error404');
    }
}