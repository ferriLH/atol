<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 01/06/2018
 * Time: 22.56
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class C_front extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_front');
        $this->load->library('pagination');
    }

    public function index(){
        $data = array(
            "title" => "Bandung Tourism",
            "datWisata" => $this->M_front->getDataWisata()
        );
        // init params
        $params = array();
        $limit_per_page = 5;
        $start_index = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $total_records = $this->M_front->get_total();

        if ($total_records > 0)
        {
            // get current page records
            $params["results"] = $this->M_front->get_current_page_records($limit_per_page, $start_index);
            $params["title"] = "Bandung Tourism";

            $config['base_url'] = base_url().'paging';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 2;

            $this->pagination->initialize($config);

            // build paging links
            // custom paging configuration
            $config['num_links'] = 5;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;

            $config['full_tag_open'] = '<div class="pagination">';
            $config['full_tag_close'] = '</div>';

            $config['first_link'] = ' First Page ';
            $config['first_tag_open'] = '<span class="firstlink">';
            $config['first_tag_close'] = '</span>';

            $config['last_link'] = ' Last Page ';
            $config['last_tag_open'] = '<span class="lastlink">';
            $config['last_tag_close'] = '</span>';

            $config['next_link'] = ' Next Page ';
            $config['next_tag_open'] = '<span class="nextlink">';
            $config['next_tag_close'] = '</span>';

            $config['prev_link'] = ' Prev Page ';
            $config['prev_tag_open'] = '<span class="prevlink">';
            $config['prev_tag_close'] = '</span>';

            $config['cur_tag_open'] = '<span class="curlink">&nbsp;';
            $config['cur_tag_close'] = '</span>';

            $config['num_tag_open'] = '<span class="numlink">&nbsp;';
            $config['num_tag_close'] = '</span>';

            $this->pagination->initialize($config);

            // build paging links
            $params["links"] = $this->pagination->create_links();
        }
        $this->load->view('front/V_frontIndex',$params);
    }

    public  function viewWisata($id){
        $data = array(
            "title" => "Data Wisata",
            "getDataWisataSatu" => $this->M_front->getDataWisataSatu($id),
            "getDataFotoSatu" => $this->M_front->getDataFotoSatu($id),
            "getDataFasilitasSatu" => $this->M_front->getDataFasilitasSatu($id)
        );
        $this->load->view('front/V_dataWisata',$data);
    }
    function message(){
        date_default_timezone_set('Asia/Jakarta');
        $t      = date('Y/m/d H:i:s');
        $n      = $this->input->post('name');
        $e      = $this->input->post('email');
        $s      = $this->input->post('subject');
        $m      = $this->input->post('message');
        $this->M_front->insertMessage($n,$e,$s,$m,$t);
        $this->session->set_flashdata('result_pesan', '<br>Berhasil Mengirim Pesan.');
        redirect('front/#contact');

    }
    function cari(){
        $cari = $this->input->get('search');
        $params = array(
            "title" => "Bandung Tourism",
            "results" =>$this->M_front->getCari($cari)
        );
        $this->load->view('front/V_frontIndex',$params);
    }
}