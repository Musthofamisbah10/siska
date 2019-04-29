<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LapPresensi extends CI_Controller {

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
      $this->load->model('mod_RefKelas');
    }
    
  }
  
  public function index() {
    if ($this->input->post('start') || $this->input->post('end')){
      $start = $this->input->post('start');
      $end = $this->input->post('end');
    } else {
      $start = $end = date('Y-m-d');
    }
    $data['content']['presensi'] = $this->mod_Presensi->getData('1=1')->result();
    $data['page'] = 'vLapPresensi';
    $data['content']['action'] = 'LapPresensi/index';
    $data['content']['start'] = $start;
    $data['content']['end'] = $end;
    $data['content']['refkelas'] = $this->mod_RefKelas->getdata('status=1')->result();
    $this->load->view('vMain', $data);
  }
  
}