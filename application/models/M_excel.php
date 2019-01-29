<?php

class M_excel extends CI_Model{

    /**
     * @desc load both db
     */
    function __construct(){
        parent::__Construct();


        $this->db = $this->load->database('default', TRUE,TRUE);
    }
    function getdata(){
        $this->db->select('*');
        $query = $this->db->get('t_wisata');
        return $query->result_array();
    }
    function getdataKotaBdg(){
        $this->db->select('*');
        $this->db->where('regencies','3273');
        $query = $this->db->get('t_wisata');
        return $query->result_array();
    }
    function getdataKabBdg(){
        $this->db->select('*');
        $this->db->where('regencies','3204');
        $query = $this->db->get('t_wisata');
        return $query->result_array();
    }
    function getdataBdgBarat(){
        $this->db->select('*');
        $this->db->where('regencies','3217');
        $query = $this->db->get('t_wisata');
        return $query->result_array();
    }
    function getdataCimahi(){
        $this->db->select('*');
        $this->db->where('regencies','3277');
        $query = $this->db->get('t_wisata');
        return $query->result_array();
    }

}