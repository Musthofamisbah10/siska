<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Presensi extends CI_Controller {

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
      $this->load->model('mod_Presensi');
    }
    
  }
  
  public function index() {
    $this->load->model('mod_RefSiswa');
    $data['content']['tpresensi'] = $this->mod_Presensi->getData('1=1')->result();
    $data['content']['refsiswa'] = $this->mod_RefSiswa->getData('1=1')->result();
    $data['page'] = 'vPresensi';
    $data['content']['action'] = 'Presensi/save';
    $this->load->view('vMain', $data);
  }
  
  public function save() {
    $this->form_validation->set_rules('nis', 'nis', 'required');
    $this->form_validation->set_rules('tgl', 'tgl', 'required');
    $this->form_validation->set_rules('status', 'status', 'required');
    $this->form_validation->set_rules('edit', 'edit', 'required');
    $this->form_validation->set_rules('id', 'id', 'required');
    
    if ($this->form_validation->run() === TRUE) {
      $result = $this->mod_Presensi->saveData($this->input->post('edit'));
      if ($result > 0) {
        $this->session->set_flashdata('success', $this->lang->line('save_success'));
      } else {
        $this->session->set_flashdata('error', $this->lang->line('save_err'));
      }
    }
    redirect('Presensi');
  }
  
  public function delete($id) {
    $this->db->delete('t_presensi', ['id'=>$id]);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', $this->lang->line('del_success'));
    } else {
      $this->session->set_flashdata('error', $this->lang->line('del_err'));
    }
    redirect('Presensi');
  }
  
  public function xedit($id) {
    if (!$this->input->is_ajax_request()) {
      exit('No direct script access allowed');
    } 
      echo json_encode($this->mod_Presensi->getData(['t_presensi.id'=>$id])->row());
    
  }

}
