<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 02/06/2018
 * Time: 00.05
 */

class M_loginAdmin extends CI_Model
{
    function cek ($user,$pass){
        $tbl = "t_admin";
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->where("NIP",$user);
        $this->db->or_where("email",$user);
        $this->db->where("password",$pass);
        $this->db->where("status",TRUE);
        return $this->db->get();
    }
    function getAksesWilayah($idAkses){
        $tbl2 = "t_admin";
        $tbl1 = "regencies";
        return $this->db->query("SELECT $tbl1.name FROM $tbl1 INNER JOIN $tbl2 ON $tbl1.id = $tbl2.akses_wilayah WHERE $tbl1.id = '$idAkses'");
    }
    function getAdm(){
        return $this->db->query("SELECT COUNT(NIP) AS jmlAdm FROM t_admin WHERE status = true AND level = 'admin'");
    }
    function getOwnAktif(){
        return $this->db->query('SELECT COUNT(nik) AS jmlOwnA FROM t_owner WHERE status = true AND hapus = false');
    }
    function getOwnNotAktif(){
        return $this->db->query('SELECT COUNT(nik) AS jmlOwnN FROM t_owner WHERE status = FALSE AND hapus = false');
    }
    function cekMail ($email){
        $tbl = "t_admin";
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->where("email",$email);
        return $this->db->get();
    }
    function changePass($pass,$nip){
        $data = array(
            'password' =>$pass);
        $this->db->where('NIP',$nip);
        $this->db->update('t_admin',$data);
    }
}