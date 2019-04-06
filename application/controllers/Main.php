<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
    if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}
  }

  public function index()
	{
    $data['page'] = 'vDashboard';
    $data['content'] = '';
		$this->load->view('vmain', $data);
	}
}
