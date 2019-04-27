<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Nilai extends CI_Controller {

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
  
  public function index($jenis=false) {
    switch ($jenis) {
      case 1:
        $txtjenis = 'Harian';
        break;
      case 2:
        $txtjenis = 'TTS';
        break;
      case 3:
        $txtjenis = 'TAS';
    }
    $this->load->model('mod_RefKelas');
    $this->load->model('mod_RefMapel');
    $data['content']['nilai'] = $this->mod_Nilai->getmData(['jenisid'=>$jenis])->result();
    $data['content']['refkelas'] = $this->mod_RefKelas->getData('1=1')->result();
    $data['content']['refmapel'] = $this->mod_RefMapel->getData('1=1')->result();
    $data['page'] = 'vNilai';
    $data['content']['action'] = 'Nilai/save';
    $data['content']['jenis'] = $jenis;
    $data['content']['txtjenis']= $txtjenis;
    $this->load->view('vMain', $data);
  }
  
  public function save() {
    $this->form_validation->set_rules('id', 'Id Nilai', 'required');
    $this->form_validation->set_rules('mapel', 'nama mata pelajaran', 'required');
    $this->form_validation->set_rules('kelas', 'status', 'required');
    $this->form_validation->set_rules('jenis', 'Jenis', 'required');
    $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
    $this->form_validation->set_rules('materi', 'Materi', 'required');
    $this->form_validation->set_rules('edit', 'edit', 'required');
    
    if ($this->form_validation->run() === TRUE) {
      $result = $this->mod_Nilai->saveData($this->input->post('edit'));
      if ($result > 0) {
        if (!$this->input->post('edit')){
          $idnilai = $this->db->insert_id();
          $this->mod_Nilai->gennilai($idnilai, $this->input->post('kelas'));
        }
        $this->session->set_flashdata('success', $this->lang->line('save_success'));
      } else {
        $this->session->set_flashdata('error', $this->lang->line('save_err'));
      }
    }
    redirect('Nilai/index/'.$this->input->post('jenis'));
  }
  
  public function delete($id, $jenis) {
    $this->db->delete('t_mnilai', ['id'=>$id]);
    if ($this->db->affected_rows() > 0) {
      $this->db->query('ALTER TABLE t_mnilai AUTO_INCREMENT = 1');
      $this->db->query('ALTER TABLE t_nilai AUTO_INCREMENT = 1');
      $this->session->set_flashdata('success', $this->lang->line('del_success'));
    } else {
      $this->session->set_flashdata('error', $this->lang->line('del_err'));
    }
    redirect('Nilai/index/'.$jenis);
  }
  
  public function xedit($id) {
    if (!$this->input->is_ajax_request()) {
      exit('No direct script access allowed');
    } else {
      echo json_encode($this->mod_Nilai->getmData(['t_mnilai.id'=>$id])->row());
    }
  }
  
  public function xmodalnilai($id) {
//    if (!$this->input->is_ajax_request()) {
//      exit('No direct script access allowed');
//    }
    $data['mnilai'] = $this->mod_Nilai->getmData(['t_mnilai.id'=>$id])->row();
    $data['nnilai'] = $this->mod_Nilai->getndata(['t_nilai.nilaiid'=>$id])->result();;
    $mdlnilai = $this->load->view('vMdlNilai', $data);
    return $mdlnilai;
  }
  
  public function xinputnilai() {
    $result = $this->mod_Nilai->savenilai();
    echo "<script>console.log('".$result."')";
  }
}