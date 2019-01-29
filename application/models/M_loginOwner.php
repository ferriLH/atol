<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 01/06/2018
 * Time: 23.25
 */

class M_loginOwner extends CI_Model
{
    function cek ($user,$pass){
        $tbl = "t_owner";
        return $this->db->query("SELECT * FROM $tbl WHERE (nik = '$user' || email = '$user') && password = '$pass' && status = 1");
    }
    function getProfile($nik){
        $tbl = "t_owner";
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->where("nik",$nik);
        return $this->db->get();
    }
    function addOwner($nik,$nama,$email,$password,$alamat,$tempatLahir,$tglLahir,$picture){
        $data = array(
            'nik'       =>$nik,
            'nama'      =>$nama,
            'email'     =>$email,
            'password'  =>$password,
            'alamat'    =>$alamat,
            'tempat_lahir'=>$tempatLahir,
            'tgl_lahir' =>$tglLahir,
            'file_ktp' =>$picture,
            'status' =>false,
            'hapus'    =>false);
        $this->db->insert('t_owner',$data);
    }
    function activate($nik){
        $data = array(
            'status' =>true);
        $this->db->where('nik',$nik);
        $this->db->update('t_owner',$data);
    }
    function deactivate($nik){
        $data = array(
            'status' =>false);
        $this->db->where('nik',$nik);
        $this->db->update('t_owner',$data);
    }
    function cekMail ($email){
        $tbl = "t_owner";
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->where("email",$email);
        return $this->db->get();
    }
    function changePass($pass,$nik){
        $data = array(
            'password' =>$pass);
        $this->db->where('nik',$nik);
        $this->db->update('t_owner',$data);
    }
}