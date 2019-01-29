<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 01/06/2018
 * Time: 23.01
 */

class M_front extends CI_Model
{
    function insertMessage($n,$e,$s,$m,$t){
        $data = array(
            'id_pesan'  =>'',
            'nama'      =>$n,
            'email'     =>$e,
            'subjek'    =>$s,
            'pesan'     =>$m,
            'status'    =>0,
            'hapus'     =>0,
            'waktu'     =>$t);
        $this->db->insert('t_pesan',$data);
    }
    function getDataWisata(){
        $this->db->select('*');
        $this->db->from('t_wisata');
        $query = $this->db->get();
        return $query->result();
    }
    function getDataWisataSatu($id){
        $this->db->select('*');
        $this->db->from('t_wisata w');
        $this->db->join('t_foto f', 'f.id_wisata = w.id_wisata');
        $this->db->join('t_fasilitas fa', 'fa.id_wisata = w.id_wisata');
        $this->db->where('w.id_wisata',$id);
        $query = $this->db->get();
        return $query->result();
    }
    function getDataFotoSatu($id){
        $this->db->select('*');
        $this->db->from('t_foto');
        $this->db->where('id_wisata',$id);
        $query = $this->db->get();
        return $query->result();
    }
    function getDataFasilitasSatu($id){
        $this->db->select('*');
        $this->db->from('t_fasilitas');
        $this->db->where('id_wisata',$id);
        $query = $this->db->get();
        return $query->result();
    }
    function getCari($cari){
        $query = $this->db->query("SELECT * FROM t_wisata WHERE nama_tempat LIKE '%".$cari."%' AND status = true");
        return $query->result();
    }
    public function get_current_page_records($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->where('status',true);
        $query = $this->db->get("t_wisata");

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }

    public function get_total()
    {
        $this->db->where('status',true);
        return $this->db->count_all("t_wisata");
    }
}