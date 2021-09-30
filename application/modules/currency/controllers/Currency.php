<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Currency extends CI_Controller {
 
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
		$data['data']=$this->model->ambildata($this->db->dbprefix('currency'));
		$data['content'] = 'currency/list';
		$data['css'] = 'currency/css';
		$data['javascript'] = 'currency/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambah()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['content'] = 'currency/tambah';
		$data['css'] = 'currency/css';
		$data['javascript'] = 'currency/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function edit($idcurrency)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idcurrency'] = $idcurrency;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('currency'),'idcurrency',$data['idcurrency']);
		$data['content'] = 'currency/edit';
		$data['css'] = 'currency/css';
		$data['javascript'] = 'currency/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function saves()
    {
		$iduser = $this->session->userdata('iduser');
		$data=array(	
			'iduser'=>$iduser,
			'currency'=>$this->input->post('currency'),
			'symbol'=>$this->input->post('symbol')
		);
		$this->model->simpandata($this->db->dbprefix('currency'),$data);
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('currency'));
	}	
	
	public function updates()
    {
		$idcurrency =$this->input->post('idcurrency');
		$iduser = $this->session->userdata('iduser');
		$data=array(	
			'iduser'=>$iduser,
			'currency'=>$this->input->post('currency'),
			'symbol'=>$this->input->post('symbol')
		);
		$clause=array('idcurrency '=>$idcurrency );
		$this->model->update($this->db->dbprefix('currency'),$data,$clause);
		$this->session->set_flashdata('msg_success',lang('edit_success'));			
		redirect(site_url('currency'));
	}
	
	function deletes()
    {
        $idcurrency=$this->input->post('idcurrency');
		$this->db->where('idcurrency', $idcurrency);
        $this->db->delete($this->db->dbprefix('currency'));
        $this->session->set_flashdata('msg_success',lang('delete_success'));			
		redirect(site_url('currency'));
    }	
	
}
?>