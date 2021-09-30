<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Monitoringreport extends CI_Controller {
 
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
		$data['data']=$this->model->ambildataOrder($this->db->dbprefix('reportmaterialcourses'),'DESC','date');
		$data['content'] = 'monitoringreport/list';
		$data['css'] = 'monitoringreport/css';
		$data['javascript'] = 'monitoringreport/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function finish()
    {
		$idreportmaterialcourses = $this->session->userdata('idreportmaterialcourses');
		
		$data_update=array(	
			'readreport'=>'1'
			);
		$clause=array('idreportmaterialcourses'=>$idreportmaterialcourses);
		$this->model->update($this->db->dbprefix('reportmaterialcourses'),$data_update,$clause);
		
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('monitoringreport'));
	}	
	
}
?>