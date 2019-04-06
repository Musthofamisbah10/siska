<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mod_RefMapel extends CI_Model {

  function __construct() {
    parent::__construct();
    
  }
  
  public function getData($where) {
    return $this->db->get_where('ref_mapel', $where);
  }
  
  public function saveData($edit) {
    $arr = ['id'=>$this->input->post('id'),'mapel'=>$this->input->post('mapel'),'status'=>$this->input->post('status')];
    if ($edit === 'true') {
      $this->db->update('ref_mapel',$arr);
    } else {
      $this->db->insert('ref_mapel',$arr);
    }
    return $this->db->affected_rows();
  }
}