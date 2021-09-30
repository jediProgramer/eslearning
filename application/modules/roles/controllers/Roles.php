<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Roles extends CI_Controller {
 
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
		$data['dataroles']=$this->model->ambildata($this->db->dbprefix('roles'));
		$data['content'] = 'roles/listroles';
		$data['css'] = 'roles/css';
		$data['javascript'] = 'roles/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambahroles()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['content'] = 'roles/tambahroles';
		$data['css'] = 'roles/css';
		$data['javascript'] = 'roles/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function editroles($idroles)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idroles'] = $idroles;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['dataroles']=$this->model->ambildataById($this->db->dbprefix('roles'),'idroles',$data['idroles']);
		$data['content'] = 'roles/editroles';
		$data['css'] = 'roles/css';
		$data['javascript'] = 'roles/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function saveroles()
    {
		$iduser = $this->session->userdata('iduser');
		$data=array(	
			'iduser'=>$iduser,
			'roles'=>$this->input->post('roles')
		);
		$this->model->simpandata($this->db->dbprefix('roles'),$data);
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('roles'));
	}	
	
	public function updateroles()
    {
		$idroles=$this->input->post('idroles');
		$iduser = $this->session->userdata('iduser');
		$data=array(	
			'iduser'=>$iduser,
			'roles'=>$this->input->post('roles')
		);
		$clause=array('idroles'=>$idroles);
		$this->model->update($this->db->dbprefix('roles'),$data,$clause);
		$this->session->set_flashdata('msg_success',lang('edit_success'));			
		redirect(site_url('roles'));
	}
	
	function deleteroles()
    {
        $idroles=$this->input->post('idroles');
		$this->db->where('idroles', $idroles);
        $this->db->delete($this->db->dbprefix('roles'));
        $this->session->set_flashdata('msg_success',lang('delete_success'));			
		redirect(site_url('roles'));
    }	
	
}
?>