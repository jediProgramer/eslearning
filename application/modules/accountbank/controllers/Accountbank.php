<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Accountbank extends CI_Controller {
 
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
		$data['data']=$this->model->ambildata($this->db->dbprefix('accountbank'));
		$data['content'] = 'accountbank/list';
		$data['css'] = 'accountbank/css';
		$data['javascript'] = 'accountbank/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambah()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['databank']=$this->model->ambildata($this->db->dbprefix('bank'));
		$data['content'] = 'accountbank/tambah';
		$data['css'] = 'accountbank/css';
		$data['javascript'] = 'accountbank/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function edit($idaccountbank)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idaccountbank'] = $idaccountbank;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('accountbank'),'idaccountbank',$data['idaccountbank']);
		$data['databank']=$this->model->ambildata($this->db->dbprefix('bank'));
		$data['content'] = 'accountbank/edit';
		$data['css'] = 'accountbank/css';
		$data['javascript'] = 'accountbank/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function saves()
    {
		$iduser = $this->session->userdata('iduser');
		$data=array(
		'iduser'=>$iduser,
		'bank'=>$this->input->post('bank'),
		'accountname '=>$this->input->post('accountname'),
		'accountnumber'=>$this->input->post('accountnumber')
		);
		
		$this->model->simpandata($this->db->dbprefix('accountbank'),$data);
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('accountbank'));
	}	
	
	public function updates()
    {
		$idaccountbank=$this->input->post('idaccountbank');
		$iduser = $this->session->userdata('iduser');
		$data=array(
		'iduser'=>$iduser,
		'bank'=>$this->input->post('bank'),
		'accountname '=>$this->input->post('accountname'),
		'accountnumber'=>$this->input->post('accountnumber')
		);
		$clause=array('idaccountbank'=>$idaccountbank);
		$this->model->update($this->db->dbprefix('accountbank'),$data,$clause);
		$this->session->set_flashdata('msg_success',lang('edit_success'));			
		redirect(site_url('accountbank'));
	}
	
	function deletes()
    {
        $idaccountbank=$this->input->post('idaccountbank');
		$this->db->where('idaccountbank', $idaccountbank);
        $this->db->delete($this->db->dbprefix('accountbank'));
        $this->session->set_flashdata('msg_success',lang('delete_success'));			
		redirect(site_url('accountbank'));
    }	
	
}
?>