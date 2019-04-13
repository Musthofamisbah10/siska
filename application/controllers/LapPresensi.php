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
    }
    
  }
  
  public function index() {
    $data['content']['presensi'] = $this->mod_Presensi->getData('1=1')->result();
    $data['page'] = 'vLapPresensi';
    $data['content']['action'] = 'LapPresensi/save';
    $this->load->view('vMain', $data);
  }
  
}