<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class C_excel extends CI_Controller {

    /**
     * @desc : load list modal and helpers
     */
    function __Construct(){
        parent::__Construct();
        $this->load->model('M_excel');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('download');
        $this->load->library('PHPReport');

    }

    /**
     *  @desc : This function is used to get data from database
     *  And export data into excel sheet
     *  @param : void
     *  @return : void
     */
    public function index(){
        // get data from databse
        $data = $this->M_excel->getdata();

        $template = 'Myexcel.xlsx';
        //set absolute path to directory with template files
        //$templateDir = base_url()."templateExcel/";
        $templateDir = __DIR__ . "/../../templateExcel/";
        //set config for report
        $config = array(
            'template' => $template,
            'templateDir' => $templateDir
        );


        //load template
        $R = new PHPReport($config);

        $R->load(array(
                'id' => 'wisata',
                'repeat' => TRUE,
                'data' => $data
            )
        );

        // define output directoy
        //$output_file_dir = base_url()."tmp/";
        $output_file_dir = __DIR__ . "/../../backup/excel/";


        $output_file_excel = $output_file_dir  . "backup-wisata-on- ". date('Y-m-d-H-i-s').".xlsx";
        //download excel sheet with data in /tmp folder
        $result = $R->render('excel', $output_file_excel);
        force_download($output_file_excel, $result);
        redirect('admin');
    }
    public function kotaBdg(){
        // get data from databse
        $data = $this->M_excel->getdataKotaBdg();

        $template = 'Myexcel1.xlsx';
        //set absolute path to directory with template files
        //$templateDir = base_url()."templateExcel/";
        $templateDir = __DIR__ . "/../../templateExcel/";
        //set config for report
        $config = array(
            'template' => $template,
            'templateDir' => $templateDir
        );


        //load template
        $R = new PHPReport($config);

        $R->load(array(
                'id' => 'wisata',
                'repeat' => TRUE,
                'data' => $data
            )
        );

        // define output directoy
        //$output_file_dir = base_url()."tmp/";
        $output_file_dir = __DIR__ . "/../../backup/excel/";


        $output_file_excel = $output_file_dir  . "backup-wisata-Kota-Bandung-on- ". date('Y-m-d-H-i-s').".xlsx";
        //download excel sheet with data in /tmp folder
        $result = $R->render('excel', $output_file_excel);
        force_download($output_file_excel, $result);
        redirect('admin');
    }
    public function kabBdg(){
        // get data from databse
        $data = $this->M_excel->getdataKabBdg();

        $template = 'Myexcel2.xlsx';
        //set absolute path to directory with template files
        //$templateDir = base_url()."templateExcel/";
        $templateDir = __DIR__ . "/../../templateExcel/";
        //set config for report
        $config = array(
            'template' => $template,
            'templateDir' => $templateDir
        );


        //load template
        $R = new PHPReport($config);

        $R->load(array(
                'id' => 'wisata',
                'repeat' => TRUE,
                'data' => $data
            )
        );

        // define output directoy
        //$output_file_dir = base_url()."tmp/";
        $output_file_dir = __DIR__ . "/../../backup/excel/";


        $output_file_excel = $output_file_dir  . "backup-wisata-Kab-Bandung-on- ". date('Y-m-d-H-i-s').".xlsx";
        //download excel sheet with data in /tmp folder
        $result = $R->render('excel', $output_file_excel);
        force_download($output_file_excel, $result);
        redirect('admin');
    }
    public function bdgBarat(){
        // get data from databse
        $data = $this->M_excel->getdataBdgBarat();

        $template = 'Myexcel3.xlsx';
        //set absolute path to directory with template files
        //$templateDir = base_url()."templateExcel/";
        $templateDir = __DIR__ . "/../../templateExcel/";
        //set config for report
        $config = array(
            'template' => $template,
            'templateDir' => $templateDir
        );


        //load template
        $R = new PHPReport($config);

        $R->load(array(
                'id' => 'wisata',
                'repeat' => TRUE,
                'data' => $data
            )
        );

        // define output directoy
        //$output_file_dir = base_url()."tmp/";
        $output_file_dir = __DIR__ . "/../../backup/excel/";


        $output_file_excel = $output_file_dir  . "backup-wisata-Kab-Bandung-barat-on- ". date('Y-m-d-H-i-s').".xlsx";
        //download excel sheet with data in /tmp folder
        $result = $R->render('excel', $output_file_excel);
        force_download($output_file_excel, $result);
        redirect('admin');
    }
    public function cimahi(){
        // get data from databse
        $data = $this->M_excel->getdataCimahi();

        $template = 'Myexcel4.xlsx';
        //set absolute path to directory with template files
        //$templateDir = base_url()."templateExcel/";
        $templateDir = __DIR__ . "/../../templateExcel/";
        //set config for report
        $config = array(
            'template' => $template,
            'templateDir' => $templateDir
        );


        //load template
        $R = new PHPReport($config);

        $R->load(array(
                'id' => 'wisata',
                'repeat' => TRUE,
                'data' => $data
            )
        );

        // define output directoy
        //$output_file_dir = base_url()."tmp/";
        $output_file_dir = __DIR__ . "/../../backup/excel/";


        $output_file_excel = $output_file_dir  . "backup-wisata-kota-cimahi-on- ". date('Y-m-d-H-i-s').".xlsx";
        //download excel sheet with data in /tmp folder
        $result = $R->render('excel', $output_file_excel);
        force_download($output_file_excel, $result);
        redirect('admin');
    }
}