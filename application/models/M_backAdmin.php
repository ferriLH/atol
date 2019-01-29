<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 02/06/2018
 * Time: 01.44
 */

class M_backAdmin extends CI_Model
{
    function getNewInbox(){
        $this->db->where('status',0);
        $this->db->where('hapus',0);
        $this->db->order_by('waktu','desc');
        $query = $this->db->get('t_pesan');
        return $query->result();
    }
    function getDeletedInbox(){
        $query = $this->db->query('SELECT * FROM `t_pesan` WHERE waktu_delete > DATE_SUB(NOW(), INTERVAL 30 DAY) AND hapus = 1 GROUP BY waktu_delete DESC');
        return $query->result();
    }
    function getReadedInbox(){
        $this->db->where('status',1);
        $this->db->where('hapus',0);
        $this->db->order_by('waktu','desc');
        $query = $this->db->get('t_pesan');
        return $query->result();
    }
    function setReadInbox($id){
        $data = array(
            'status'=>1
        );
        $this->db->where('id_pesan',$id);
        $this->db->update('t_pesan',$data);
    }
    function setDeleteInbox($id){
        date_default_timezone_set('Asia/Jakarta');
        $t = date('Y/m/d H:i:s');
        $data = array(
            'hapus'=>1,
            'waktu_delete'=>$t
        );
        $this->db->where('id_pesan',$id);
        $this->db->update('t_pesan',$data);
    }
    function readInbox($id){
        $this->db->where('id_pesan',$id);
        $query = $this->db->get('t_pesan');
        return $query->result();
    }
    function getAdminKotBDG(){
        $this->db->where('status',1);
        $this->db->where('akses_wilayah',3273);
        $this->db->order_by('nama','desc');
        $query = $this->db->get('t_admin');
        return $query->result();
    }
    function getAdminKabBDG(){
        $this->db->where('status',1);
        $this->db->where('akses_wilayah',3204);
        $this->db->order_by('nama','desc');
        $query = $this->db->get('t_admin');
        return $query->result();
    }
    function getAdminKabBDGB(){
        $this->db->where('status',1);
        $this->db->where('akses_wilayah',3217);
        $this->db->order_by('nama','desc');
        $query = $this->db->get('t_admin');
        return $query->result();
    }
    function getAdminKotCMH(){
        $this->db->where('status',1);
        $this->db->where('akses_wilayah',3277);
        $this->db->order_by('nama','desc');
        $query = $this->db->get('t_admin');
        return $query->result();
    }
    function getOwnerA(){
        $this->db->where('status',1);
        $this->db->where('hapus',0);
        $this->db->order_by('nama','desc');
        $query = $this->db->get('t_owner');
        return $query->result();
    }
    function getOwnerN(){
        $this->db->where('status',0);
        $this->db->where('hapus',0);
        $this->db->order_by('nama','desc');
        $query = $this->db->get('t_owner');
        return $query->result();
    }
    function setDeleteAdmin($id){
        $data = array(
            'status'=>0
        );
        $this->db->where('NIP',$id);
        $this->db->update('t_admin',$data);
    }
    function setDeleteOwner($id){
        $data = array(
            'status'=>0,
            'hapus'=>1,
        );
        $this->db->where('nik',$id);
        $this->db->update('t_owner',$data);
    }
    function updateProfile($nip,$nama,$email){
        $data = array(
            'nama'=>$nama,
            'email'=>$email,
        );
            $this->db->where('NIP',$nip);
        $this->db->update('t_admin',$data);
    }
    function updatePassword($nip,$pass){
        $data = array(
            'password'=>sha1($pass),
        );
        $this->db->where('NIP',$nip);
        $this->db->update('t_admin',$data);
    }
    function updatePhotoAdm($nip,$foto){
        $data = array(
            'foto'=>$foto
        );
        $this->db->where('NIP',$nip);
        $this->db->update('t_admin',$data);
    }
    function getProfile($nip){
        $tbl = "t_admin";
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->where("NIP",$nip);
        return $this->db->get();
    }
    function updateProfileOwner($nik,$nama,$email,$alamat,$tempat,$tgl){
        $data = array(
            'nama'=>$nama,
            'email'=>$email,
            'alamat'=>$alamat,
            'tempat_lahir'=>$tempat,
            'tgl_lahir'=>$tgl
        );
        $this->db->where('nik',$nik);
        $this->db->update('t_Owner',$data);
    }
    function getProfileOwner($nik){
        $tbl = "t_owner";
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->where("nik",$nik);
        return $this->db->get();
    }
    function addAdmin($nip, $nama, $email, $pwd, $akses){
        $data = array(
            'NIP'       =>$nip,
            'nama'      =>$nama,
            'password'  =>$pwd,
            'akses_wilayah'=>$akses,
            'email'     =>$email,
            'foto'      =>null,
            'level'     =>'admin',
            'status'    =>true);
        $this->db->insert('t_admin',$data);
    }
    function getKecCimahi(){
        $tbl = "districts";
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->order_by('name','ASC');
        $this->db->where("regency_id","3277");
        $get = $this->db->get();
        return $get->result();
    }
    function getKecBdg(){
        $tbl = "districts";
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->order_by('name','ASC');
        $this->db->where("regency_id","3273");
        $get = $this->db->get();
        return $get->result();
    }
    function getKecKabBdg(){
        $tbl = "districts";
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->order_by('name','ASC');
        $this->db->where("regency_id","3204");
        $get = $this->db->get();
        return $get->result();
    }
    function getKecBdgBarat(){
        $tbl = "districts";
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->order_by('name','ASC');
        $this->db->where("regency_id","3217");
        $get = $this->db->get();
        return $get->result();
    }
    function kelurahan($kecId){
        $kelurahan="<option value='0'> - Choose - </option>";

        $this->db->order_by('name','ASC');
        $kel= $this->db->get_where('villages',array('district_id'=>$kecId));

        foreach ($kel->result_array() as $data ){
            $kelurahan.= "<option value='$data[id]' label='$data[name]'></option>";
        }

        return $kelurahan;
    }
    function kecamatan($kecId){
        $kecamatan="<option value='0'> - Choose - </option>";

        $this->db->order_by('name','ASC');
        $kel= $this->db->get_where('districts',array('regency_id'=>$kecId));

        foreach ($kel->result_array() as $data ){
            $kecamatan.= "<option value='$data[id]' label='$data[name]'></option>";
        }

        return $kecamatan;
    }
    function getDataCimahi(){
        $tbl = "t_wisata";
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->where("regencies","3277");
        $this->db->where("status",1);
        $get = $this->db->get();
        return $get->result();
    }
    function getDataBdg(){
        $tbl = "t_wisata";
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->where("regencies","3273");
        $this->db->where("status",1);
        $get = $this->db->get();
        return $get->result();
    }
    function getDataKabBdg(){
        $tbl = "t_wisata";
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->where("regencies","3204");
        $this->db->where("status",1);
        $get = $this->db->get();
        return $get->result();
    }
    function getDataBdgBarat(){
        $tbl = "t_wisata";
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->where("regencies","3217");
        $this->db->where("status",1);
        $get = $this->db->get();
        return $get->result();
    }
    function setDeleteWisata($id){
        $data = array(
            'status'=>0
        );
        $this->db->where('id_wisata',$id);
        $this->db->update('t_wisata',$data);
    }
    function getAllDataBdgBarat(){
        $this->db->select("*");
        $this->db->from("t_wisata w");
        $this->db->join('t_fasilitas f', 'f.id_wisata = w.id_wisata','inner');
        $this->db->join('t_foto fo', 'fo.id_wisata = w.id_wisata','inner');
        $this->db->where("w.regencies","3217");
        $this->db->where("w.status",1);
        $get = $this->db->get();
        return $get->result();
    }
    function getAllDataBdgBarat1($id)
    {
        $this->db->select("*,d.name as nd,v.name as nv");
        $this->db->from("t_wisata w");
        $this->db->join('t_fasilitas f', 'f.id_wisata = w.id_wisata', 'inner');
        $this->db->join('t_foto fo', 'fo.id_wisata = w.id_wisata', 'inner');
        $this->db->join('districts d', 'd.id = w.districts','inner');
        $this->db->join('villages v', 'v.id = w.villages','inner');
        $this->db->where("w.regencies", "3217");
        $this->db->where("w.status", 1);
        $this->db->where("w.id_wisata", $id);
        $get = $this->db->get();
        return $get->result();
    }
    function getAllDataBdg1($id)
    {
        $this->db->select("*,d.name as nd,v.name as nv");
        $this->db->from("t_wisata w");
        $this->db->join('t_fasilitas f', 'f.id_wisata = w.id_wisata', 'inner');
        $this->db->join('t_foto fo', 'fo.id_wisata = w.id_wisata', 'inner');
        $this->db->join('districts d', 'd.id = w.districts','inner');
        $this->db->join('villages v', 'v.id = w.villages','inner');
        $this->db->where("w.regencies", "3273");
        $this->db->where("w.status", 1);
        $this->db->where("w.id_wisata", $id);
        $get = $this->db->get();
        return $get->result();
    }
    function getAllDataKabBdg1($id)
    {
        $this->db->select("*,d.name as nd,v.name as nv");
        $this->db->from("t_wisata w");
        $this->db->join('t_fasilitas f', 'f.id_wisata = w.id_wisata', 'inner');
        $this->db->join('t_foto fo', 'fo.id_wisata = w.id_wisata', 'inner');
        $this->db->join('districts d', 'd.id = w.districts','inner');
        $this->db->join('villages v', 'v.id = w.villages','inner');
        $this->db->where("w.regencies", "3204");
        $this->db->where("w.status", 1);
        $this->db->where("w.id_wisata", $id);
        $get = $this->db->get();
        return $get->result();
    }
    function getAllDataCimahi1($id)
    {
        $this->db->select("*,d.name as nd,v.name as nv");
        $this->db->from("t_wisata w");
        $this->db->join('t_fasilitas f', 'f.id_wisata = w.id_wisata', 'inner');
        $this->db->join('t_foto fo', 'fo.id_wisata = w.id_wisata', 'inner');
        $this->db->join('districts d', 'd.id = w.districts','inner');
        $this->db->join('villages v', 'v.id = w.villages','inner');
        $this->db->where("w.regencies", "3277");
        $this->db->where("w.status", 1);
        $this->db->where("w.id_wisata", $id);
        $get = $this->db->get();
        return $get->result();
    }
    function getKecCimahisatu($id){
        $tbl = "t_wisata";
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->where("regencies","3277");
        $get = $this->db->get();
        $this->db->where("id_wisata",$id);
        return $get->result();
    }
    function getKecBdgsatu($id){
        $tbl = "t_wisata";
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->where("regencies","3273");
        $this->db->where("id_wisata",$id);
        $get = $this->db->get();
        return $get->result();
    }
    function getKecKabBdgsatu($id){
        $tbl = "t_wisata";
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->where("regencies","3204");
        $this->db->where("id_wisata",$id);
        $get = $this->db->get();
        return $get->result();
    }
    function getIdWisNew(){
        $query = $this->db->query('SELECT MAX(id_wisata) as id_wisata_latest FROM t_wisata');
        return $query->result();
    }
    function addWisata($id,$nama,$alamat,$kabKot,$kecamatan,$desa,$htm,$lat,$lng,$owner,$des){
        $data = array(
            'id_wisata'     =>$id,
            'nama_tempat'   =>$nama,
            'alamat'        =>$alamat,
            'regencies'     =>$kabKot,
            'districts'     =>$kecamatan,
            'villages'      =>$desa,
            'htm'           =>$htm,
            'lat'           =>$lat,
            'lng'           =>$lng,
            'owner'         =>$owner,
            'deskripsi'     =>$des,
            'status'        =>TRUE
        );
        $this->db->insert('t_wisata',$data);
    }
    function updateWisata($id,$nama,$alamat,$kecamatan,$desa,$htm,$lat,$lng,$owner,$des){
        $data = array(
            'nama_tempat'   =>$nama,
            'alamat'        =>$alamat,
            'districts'     =>$kecamatan,
            'villages'      =>$desa,
            'htm'           =>$htm,
            'lat'           =>$lat,
            'lng'           =>$lng,
            'owner'         =>$owner,
            'deskripsi'     =>$des,
        );
        $this->db->where('id_wisata',$id);
        $this->db->update('t_wisata',$data);
    }
    function addFasility($nama1,$harga1,$nama2,$harga2,$id){
        $data = array(
            array(
                'id_fasilitas'    =>'',
                'nama_fasilitas'  =>$nama1,
                'harga_fasilitas' =>$harga1,
                'id_wisata'       =>$id
            ),
            array(
                'id_fasilitas'    =>'',
                'nama_fasilitas'  =>$nama2,
                'harga_fasilitas' =>$harga2,
                'id_wisata'       =>$id
            )
        );
        $this->db->insert_batch('t_fasilitas',$data);
    }
    function addPhoto($data = array()){
        $this->db->insert_batch('t_foto',$data);
    }

    function upload_file($filename){
        $this->load->library('upload'); // Load librari upload
        $config['upload_path'] = './excel/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size'] = '2048';
        $config['overwrite'] = true;
        $config['file_name'] = $filename;
        $this->upload->initialize($config); // Load konfigurasi uploadnya
        if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        }else{
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

}