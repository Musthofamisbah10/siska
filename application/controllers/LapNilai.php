<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LapNilai extends CI_Controller {

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
      $this->load->model('mod_Nilai');
    }
    
  }
  
  public function index() {
    $data['content']['nilai'] = $this->mod_Nilai->getDataHarian('1=1')->result();
    $data['page'] = 'vLapHarian';
    $data['content']['action'] = 'LapHarian/save';
    $this->load->view('vMain', $data);
  }
  
}