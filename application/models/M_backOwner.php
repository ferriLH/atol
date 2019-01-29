<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 02/06/2018
 * Time: 05.15
 */

class M_backOwner extends CI_Model
{
    function updatePassword($nik,$pass){
        $data = array(
            'password'=>sha1($pass),
        );
        $this->db->where('nik',$nik);
        $this->db->update('t_owner',$data);
    }
    function updatePhotoOwner($nik,$picture){
        $data = array(
            'file_ktp'=>$picture
        );
        $this->db->where('nik',$nik);
        $this->db->update('t_owner',$data);
    }
    function getProfile($nik){
        $tbl = "t_owner";
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->where("nik",$nik);
        return $this->db->get();
    }
    function getDataWisata($id){
        $tbl = "t_wisata";
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->where("owner",$id);
        $this->db->where("status",1);
        $get = $this->db->get();
        return $get->result();
    }
    function getAllData1($id,$owner)
    {
        $this->db->select("*,d.name as nd,v.name as nv,r.name as nr");
        $this->db->from("t_wisata w");
        $this->db->join('t_fasilitas f', 'f.id_wisata = w.id_wisata', 'inner');
        $this->db->join('t_foto fo', 'fo.id_wisata = w.id_wisata', 'inner');
        $this->db->join('districts d', 'd.id = w.districts','inner');
        $this->db->join('villages v', 'v.id = w.villages','inner');
        $this->db->join('regencies r', 'r.id = w.regencies','inner');
        $this->db->where("w.owner", $owner);
        $this->db->where("w.status", 1);
        $this->db->where("w.id_wisata", $id);
        $get = $this->db->get();
        return $get->result();
    }
}