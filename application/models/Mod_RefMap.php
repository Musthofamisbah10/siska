<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mod_RefMap extends CI_Model {

  function __construct() {
    parent::__construct();
    
  }
  
  public function getData($where) {
    $this->db->select('ref_map.*, ref_kelas.kelas, ref_guru.nmguru, ref_mapel.mapel');
    $this->db->join('ref_kelas', 'ref_map.kelasid=ref_kelas.id');
    $this->db->join('ref_guru', 'ref_map.nip=ref_guru.nip');
    $this->db->join('ref_mapel', 'ref_map.mapelid=ref_mapel.id');
    return $this->db->get_where('ref_map', $where);
  }
  
  public function saveData($edit) {
    $arr = ['id'=>$this->input->post('id'),'nip'=>$this->input->post('nip'),'mapelid'=>$this->input->post('mapelid'),'kelasid'=>$this->input->post('kelasid'), 'status'=>$this->input->post('status')];
    if ($edit === 'true') {
      $this->db->update('ref_map',$arr);
    } else {
      $this->db->insert('ref_map',$arr);
    }
    return $this->db->affected_rows();
  }
}