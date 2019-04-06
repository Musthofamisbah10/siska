<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RefGuru extends CI_Controller {

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
      $this->load->model('mod_RefGuru');
      $this->load->model('mod_RefKelas');
    }
    
  }
  
  public function index() {
    $data['content']['refkelas'] = $this->mod_RefKelas->getAllData('1=1')->result();
    $data['content']['refguru'] = $this->mod_RefGuru->getData('1=1')->result();
    $data['page'] = 'vRefGuru';
    $data['content']['action'] = 'RefGuru/save';
    $this->load->view('vMain', $data);
  }
  
  public function save() {
    $this->form_validation->set_rules('nip', 'nip guru', 'required');
    $this->form_validation->set_rules('nmguru', 'nama guru', 'required');
    $this->form_validation->set_rules('status', 'status', 'required');
    $this->form_validation->set_rules('edit', 'edit', 'required');
    
    if ($this->form_validation->run() === TRUE) {
      $result = $this->mod_RefGuru->saveData($this->input->post('edit'));
      if ($result > 0) {
        $this->session->set_flashdata('success', $this->lang->line('save_success'));
      } else {
        $this->session->set_flashdata('error', $this->lang->line('save_err'));
      }
    }
    redirect('RefGuru');
  }
  
  public function delete($nip) {
    if ($this->db->delete('ref_guru', ['nip'=>$nip])) {
      $this->session->set_flashdata('success', $this->lang->line('del_success'));
    } else {
      $this->session->set_flashdata('error', $this->lang->line('del_err'));
    }
    redirect('RefGuru');
  }
  
  public function xedit($nip) {
    if (!$this->input->is_ajax_request()) {
      exit('No direct script access allowed');
    } else {
      echo json_encode($this->mod_RefGuru->getData(['nip'=>$nip])->row());
    }
  }

}
