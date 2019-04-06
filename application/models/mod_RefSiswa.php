<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mod_RefSiswa extends CI_Model {

  function __construct() {
    parent::__construct();
    
  }
  
  public function getData($where) {
    $this->db->select('ref_siswa.*, ref_kelas.kelas');
    $this->db->join('ref_kelas', 'ref_siswa.kelasid=ref_kelas.id','left');
    return $this->db->get_where('ref_siswa', $where);
  }
  
  public function saveData($edit) {
    $arr = ['nis'=>$this->input->post('nis'),'nmsiswa'=>$this->input->post('nmsiswa'),'kelasid'=>$this->input->post('kelasid'),'tgllahir'=>$this->input->post('tgllahir'),'status'=>$this->input->post('status')];
    if ($edit === 'true') {
      $this->db->update('ref_siswa',$arr);
    } else {
      $this->db->insert('ref_siswa',$arr);
    }
    return $this->db->affected_rows();
  }
}