<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mod_Nilai extends CI_Model {

  function __construct() {
    parent::__construct();
    
  }
  
  public function getData($where) {
    $this->db->select('t_nilai.*, ref_kelas.kelas, ref_mapel.mapel');
    $this->db->join('ref_kelas', 't_nilai.kelasid=ref_kelas.id');
    $this->db->join('ref_mapel', 't_nilai.mapelid=ref_mapel.id');
    return $this->db->get_where('t_nilai', $where);
  }
  
  public function saveData($edit) {
    $arr = ['jenisid'=>$this->input->post('jenis'),'kelasid'=>$this->input->post('kelas'),'mapelid'=>$this->input->post('mapel'),'tgl'=>$this->input->post('tgl'),'materi'=>$this->input->post('materi')];
    if ($edit === 'true') {
      $this->db->update('t_nilai',$arr);
    } else {
      $this->db->insert('t_nilai',$arr);
    }
    return $this->db->affected_rows();
  }
}