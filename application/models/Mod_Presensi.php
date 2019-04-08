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
    $this->db->join('ref_kelas', 't_presensi.kelasid=ref_kelas.id');
    $this->db->join('ref_siswa', 't_presensi.nis=ref_siswa.nis');
    return $this->db->get_where('t_presensi', $where);
  }
  
  public function saveData($edit) {
    ($this->input->post('kelasid')==='') ? $kelas=NULL:$kelas=$this->input->post('kelasid');
    $arr = ['nip'=>$this->input->post('nip'),'nmguru'=>$this->input->post('nmguru'),'kelasid'=>$kelas, 'status'=>$this->input->post('status')];
    if ($edit === 'true') {
      $this->db->update('t_presensi',$arr);
    } else {
      $this->db->insert('t_presensi',$arr);
    }
    return $this->db->affected_rows();
  }
}