<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Twitter extends CI_Controller {
 
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
		$data['data']=$this->model->ambildata($this->db->dbprefix('twitter'));
		$data['content'] = 'twitter/list';
		$data['css'] = 'twitter/css';
		$data['javascript'] = 'twitter/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambah()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['content'] = 'twitter/tambah';
		$data['css'] = 'twitter/css';
		$data['javascript'] = 'twitter/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function edit($idtwitter)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idtwitter'] = $idtwitter;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('twitter'),'idtwitter',$data['idtwitter']);
		$data['content'] = 'twitter/edit';
		$data['css'] = 'twitter/css';
		$data['javascript'] = 'twitter/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function saves()
    {
		$iduser = $this->session->userdata('iduser');
		$data=array(	
			'iduser'=>$iduser,
			'twitter'=>$this->input->post('twitter')
		);
		$this->model->simpandata($this->db->dbprefix('twitter'),$data);
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('twitter'));
	}	
	
	public function updates()
    {
		$idtwitter =$this->input->post('idtwitter');
		$iduser = $this->session->userdata('iduser');
		$data=array(	
			'iduser'=>$iduser,
			'twitter'=>$this->input->post('twitter')
		);
		$clause=array('idtwitter '=>$idtwitter );
		$this->model->update($this->db->dbprefix('twitter'),$data,$clause);
		$this->session->set_flashdata('msg_success',lang('edit_success'));			
		redirect(site_url('twitter'));
	}
	
	function deletes()
    {
        $idtwitter=$this->input->post('idtwitter');
		$this->db->where('idtwitter', $idtwitter);
        $this->db->delete($this->db->dbprefix('twitter'));
        $this->session->set_flashdata('msg_success',lang('delete_success'));			
		redirect(site_url('twitter'));
    }	
	
}
?>