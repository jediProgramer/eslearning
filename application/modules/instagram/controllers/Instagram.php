<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Instagram extends CI_Controller {
 
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
		$data['data']=$this->model->ambildata($this->db->dbprefix('instagram'));
		$data['content'] = 'instagram/list';
		$data['css'] = 'instagram/css';
		$data['javascript'] = 'instagram/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambah()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['content'] = 'instagram/tambah';
		$data['css'] = 'instagram/css';
		$data['javascript'] = 'instagram/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function edit($idinstagram)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idinstagram'] = $idinstagram;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('instagram'),'idinstagram',$data['idinstagram']);
		$data['content'] = 'instagram/edit';
		$data['css'] = 'instagram/css';
		$data['javascript'] = 'instagram/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function saves()
    {
		$iduser = $this->session->userdata('iduser');
		$data=array(	
			'iduser'=>$iduser,
			'instagram'=>$this->input->post('instagram')
		);
		$this->model->simpandata($this->db->dbprefix('instagram'),$data);
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('instagram'));
	}	
	
	public function updates()
    {
		$idinstagram =$this->input->post('idinstagram');
		$iduser = $this->session->userdata('iduser');
		$data=array(	
			'iduser'=>$iduser,
			'instagram'=>$this->input->post('instagram')
		);
		$clause=array('idinstagram '=>$idinstagram );
		$this->model->update($this->db->dbprefix('instagram'),$data,$clause);
		$this->session->set_flashdata('msg_success',lang('edit_success'));			
		redirect(site_url('instagram'));
	}
	
	function deletes()
    {
        $idinstagram=$this->input->post('idinstagram');
		$this->db->where('idinstagram', $idinstagram);
        $this->db->delete($this->db->dbprefix('instagram'));
        $this->session->set_flashdata('msg_success',lang('delete_success'));			
		redirect(site_url('instagram'));
    }	
	
}
?>