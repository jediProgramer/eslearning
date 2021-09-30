<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Coursesusers extends CI_Controller {
 
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
		$data['data']=$this->model->ambildataOrder($this->db->dbprefix('enroll'),'DESC','date');
		$data['content'] = 'coursesusers/list';
		$data['css'] = 'coursesusers/css';
		$data['javascript'] = 'coursesusers/js';
		$this->load->view('admin/admin',$data);
    }
	
}
?>