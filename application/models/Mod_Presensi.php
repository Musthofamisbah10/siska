<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mod_Presensi extends CI_Model {

  function __construct() {
    parent::__construct();
    
  }
  
  public function getData($where) {
    $this->db->select('t_presensi.*, ref_kelas.kelas, ref_siswa.nmsiswa');
    $this->db->join('ref_kelas', 'ref_siswa.kelasid=ref_kelas.id');
    $this->db->join('t_presensi', 't_presensi.nis=ref_siswa.nis');
    return $this->db->get_where('ref_siswa', $where);
  }
  
  public function saveData($edit) {
    $arr = ['nis'=>$this->input->post('nis'),'tgl'=>$this->input->post('tgl'),'ket'=>$this->input->post('ket'), 'status'=>$this->input->post('status')];
    if ($edit === 'true') {
      $this->db->update('t_presensi',$arr);
    } else {
      $this->db->insert('t_presensi',$arr);
    }
    return $this->db->affected_rows();
  }
}