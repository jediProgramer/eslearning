<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Language extends CI_Controller {
 
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
		$data['data']=$this->model->ambildata($this->db->dbprefix('language'));
		$data['content'] = 'language/list';
		$data['css'] = 'language/css';
		$data['javascript'] = 'language/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambah()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['content'] = 'language/tambah';
		$data['css'] = 'language/css';
		$data['javascript'] = 'language/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function edit($idlanguage)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idlanguage'] = $idlanguage;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('language'),'idlanguage',$data['idlanguage']);
		$data['content'] = 'language/edit';
		$data['css'] = 'language/css';
		$data['javascript'] = 'language/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function saves()
    {
		$iduser = $this->session->userdata('iduser');
		$data=array(	
			'iduser'=>$iduser,
			'icon'=>$this->input->post('icon'),
			'language'=>$this->input->post('language')
		);
		$this->model->simpandata($this->db->dbprefix('language'),$data);
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('language'));
	}	
	
	public function updates()
    {
		$idlanguage =$this->input->post('idlanguage');
		$iduser = $this->session->userdata('iduser');
		$data=array(	
			'iduser'=>$iduser,
			'icon'=>$this->input->post('icon'),
			'language'=>$this->input->post('language')
		);
		$clause=array('idlanguage '=>$idlanguage );
		$this->model->update($this->db->dbprefix('language'),$data,$clause);
		$this->session->set_flashdata('msg_success',lang('edit_success'));			
		redirect(site_url('language'));
	}
	
	function deletes()
    {
        $idlanguage=$this->input->post('idlanguage');
		$this->db->where('idlanguage', $idlanguage);
        $this->db->delete($this->db->dbprefix('language'));
        $this->session->set_flashdata('msg_success',lang('delete_success'));			
		redirect(site_url('language'));
    }	
	
}
?>