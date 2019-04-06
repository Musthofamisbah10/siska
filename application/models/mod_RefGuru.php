<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mod_RefGuru extends CI_Model {

  function __construct() {
    parent::__construct();
    
  }
  
  public function getData($where) {
    $this->db->select('ref_guru.*, ref_kelas.kelas');
    $this->db->join('ref_kelas', 'ref_guru.kelasid=ref_kelas.id','left');
    return $this->db->get_where('ref_guru', $where);
  }
  
  public function saveData($edit) {
    ($this->input->post('kelasid')==='') ? $kelas=NULL:$kelas=$this->input->post('kelasid');
    $arr = ['nip'=>$this->input->post('nip'),'nmguru'=>$this->input->post('nmguru'),'kelasid'=>$kelas, 'status'=>$this->input->post('status')];
    if ($edit === 'true') {
      $this->db->update('ref_guru',$arr);
    } else {
      $this->db->insert('ref_guru',$arr);
    }
    return $this->db->affected_rows();
  }
}