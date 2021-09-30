<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Reviewreport extends CI_Controller {
 
    function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper(array('form','url'));
		$this->load->helper('text');
		$this->load->model('model');
		$this->lang->load('text_lang', 'english');
	}
	
	public function index()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('reviewreport'),'report','1');
		$data['content'] = 'reviewreport/list';
		$data['css'] = 'reviewreport/css';
		$data['javascript'] = 'reviewreport/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function deletes()
    {
		$idreviewreport=$this->input->post('idreviewreport');
		$idreview=$this->input->post('idreview');
		
		$this->db->where('idreviewreport', $idreviewreport);
        $this->db->delete($this->db->dbprefix('reviewreport'));
		
		$this->db->where('idreview', $idreview);
        $this->db->delete($this->db->dbprefix('review'));
		
        $this->session->set_flashdata('msg_success',lang('delete_success'));			
		redirect(site_url('reviewreport'));
	}	
	
}
?>