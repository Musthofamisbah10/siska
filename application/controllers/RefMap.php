<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RefMap extends CI_Controller {

  function __construct() {
    parent:: __construct();
    if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}
		else if (!$this->ion_auth->is_admin()) 
		{
			redirect('main');
		} else {
      $this->load->language('data');
      $this->load->model('mod_RefMap');
    }
    
  }
  
  public function index() {    
    $this->load->model('mod_RefMapel');
    $this->load->model('mod_RefKelas');
    $this->load->model('mod_RefGuru');
    
    $data['content']['refmap'] = $this->mod_RefMap->getData('1=1')->result();
    $data['content']['refguru'] = $this->mod_RefGuru->getData('1=1')->result();
    $data['content']['refkelas'] = $this->mod_RefKelas->getData('1=1')->result();
    $data['content']['refmapel'] = $this->mod_RefMapel->getData('1=1')->result();
    $data['page'] = 'vRefMap';
    $data['content']['action'] = 'RefMap/save';
    $this->load->view('vMain', $data);
  }
  
  public function save() {
    $this->form_validation->set_rules('id', 'Id mata pelajaran', 'required');
    $this->form_validation->set_rules('nip', 'nip', 'required');
    $this->form_validation->set_rules('kelasid', 'Kelas', 'required');
    $this->form_validation->set_rules('mapelid', 'nama mata pelajaran', 'required');
    $this->form_validation->set_rules('status', 'status', 'required');
    $this->form_validation->set_rules('edit', 'edit', 'required');
    
    if ($this->form_validation->run() === TRUE) {
      $result = $this->mod_RefMap->saveData($this->input->post('edit'));
      if ($result > 0) {
        $this->session->set_flashdata('success', $this->lang->line('save_success'));
      } else {
        $this->session->set_flashdata('error', $this->lang->line('save_err'));
      }
    }
    redirect('RefMap');
  }
  
  public function delete($id) {
    $this->db->delete('ref_map', ['id'=>$id]);
    if ($this->db->affected_rows() > 0) {
      $this->db->query('ALTER TABLE ref_map AUTO_INCREMENT = 1');
      $this->session->set_flashdata('success', $this->lang->line('del_success'));
    } else {
      $this->session->set_flashdata('error', $this->lang->line('del_err'));
    }
    redirect('RefMapel');
  }
  
  public function xedit($id) {
    if (!$this->input->is_ajax_request()) {
      exit('No direct script access allowed');
    } else {
      echo json_encode($this->mod_RefMap->getData(['ref_map.id'=>$id])->row());
    }
  }

}
