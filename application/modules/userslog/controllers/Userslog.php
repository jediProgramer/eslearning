<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Userslog extends CI_Controller {
 
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
		$data['datauserslog']=$this->model->ambildata($this->db->dbprefix('userlogs'));
		$data['content'] = 'userslog/listuserslog';
		$data['css'] = 'userslog/css';
		$data['javascript'] = 'userslog/js';
		$this->load->view('admin/admin',$data);
    }
	
}
?>