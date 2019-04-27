<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mod_Nilai extends CI_Model {

  function __construct() {
    parent::__construct();
    
  }
  
  public function getmData($where) {
    $this->db->select('t_mnilai.*, ref_kelas.kelas, ref_mapel.mapel');
    $this->db->join('ref_kelas', 't_mnilai.kelasid=ref_kelas.id');
    $this->db->join('ref_mapel', 't_mnilai.mapelid=ref_mapel.id');
    return $this->db->get_where('t_mnilai', $where);
  }
  
  public function saveData($edit) {
    $arr = ['jenisid'=>$this->input->post('jenis'),'kelasid'=>$this->input->post('kelas'),'mapelid'=>$this->input->post('mapel'),'tgl'=>$this->input->post('tgl'),'materi'=>$this->input->post('materi')];
    if ($edit === 'true') {
      $this->db->update('t_mnilai',$arr,['id'=> $this->input->post('id')]);
    } else {
      $this->db->insert('t_mnilai',$arr);
    }
    return $this->db->affected_rows();
  }
  
  public function gennilai($nilaiid,$kelasid) {
    $siswa = $this->db->get_where('ref_siswa', ['kelasid'=>$kelasid])->result();
    foreach ($siswa as $value) {
      $this->db->insert('t_nilai',['nilaiid'=>$nilaiid, 'nis'=>$value->nis]);
    }
    return $this->db->affected_rows();
  }
  
  public function getndata($where) {
    $this->db->select('t_nilai.*, ref_siswa.nmsiswa');
    $this->db->join('ref_siswa', 'ref_siswa.nis=t_nilai.nis');
    return $this->db->get_where('t_nilai',$where);
  }
  
  public function savenilai() {
    $this->db->update('t_nilai',['nilai'=>$this->input->post('value')],['id'=>$this->input->post('pk')]);
    return $this->db->affected_rows();
  }
}