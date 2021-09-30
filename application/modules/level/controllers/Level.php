<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Level extends CI_Controller {
 
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
		$data['datalevel']=$this->model->ambildata($this->db->dbprefix('level'));
		$data['content'] = 'level/list';
		$data['css'] = 'level/css';
		$data['javascript'] = 'level/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambah()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datalanguage']=$this->model->ambildata($this->db->dbprefix('language'));
		$data['content'] = 'level/tambah';
		$data['css'] = 'level/css';
		$data['javascript'] = 'level/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function edit($idlevel)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idlevel'] = $idlevel ;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datalevel']=$this->model->ambildataById($this->db->dbprefix('level'),'idlevel',$data['idlevel']);
		$data['datalanguage']=$this->model->ambildata($this->db->dbprefix('language'));
		$data['content'] = 'level/edit';
		$data['css'] = 'level/css';
		$data['javascript'] = 'level/js';
		$this->load->view('admin/admin',$data);
    }
	
	
	public function save()
    {
		$iduser = $this->session->userdata('iduser');
		$data=array(	
			'iduser'=>$iduser,
			'idlanguage'=>$this->input->post('idlanguage'),
			'level'=>$this->input->post('level')
		);
		$this->model->simpandata($this->db->dbprefix('level'),$data);
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('level'));
	}	
	
	public function update()
    {
		$idlevel=$this->input->post('idlevel');
		$iduser = $this->session->userdata('iduser');
		$data=array(	
			'iduser'=>$iduser,
			'idlanguage'=>$this->input->post('idlanguage'),
			'level'=>$this->input->post('level')
		);
		$clause=array('idlevel'=>$idlevel);
		$this->model->update($this->db->dbprefix('level'),$data,$clause);
		$this->session->set_flashdata('msg_success',lang('edit_success'));			
		redirect(site_url('level'));
	}
	
	function delete()
    {
        $idlevel=$this->input->post('idlevel');
		$this->db->where('idlevel', $idlevel);
        $this->db->delete($this->db->dbprefix('level'));
        $this->session->set_flashdata('msg_success',lang('delete_success'));			
		redirect(site_url('level'));
    }
	
}
?>