<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Navigasi extends CI_Controller {
 
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
	
	public function kategori()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datanavcategory']=$this->model->ambildata($this->db->dbprefix('navcategory'));
		$data['content'] = 'navigasi/listkategori';
		$data['css'] = 'navigasi/css';
		$data['javascript'] = 'navigasi/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function navigasiadmin()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datanavigation']=$this->model->ambildata($this->db->dbprefix('navigation'));
		$data['content'] = 'navigasi/listnavigasi';
		$data['css'] = 'navigasi/css';
		$data['javascript'] = 'navigasi/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function subnavigasi()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datasubnavigation']=$this->model->ambildata($this->db->dbprefix('subnavigation'));
		$data['content'] = 'navigasi/listsubnavigasi';
		$data['css'] = 'navigasi/css';
		$data['javascript'] = 'navigasi/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambahnavkategori()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['content'] = 'navigasi/tambahnavkategori';
		$data['css'] = 'navigasi/css';
		$data['javascript'] = 'navigasi/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambahnavigasi()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datanavcategory']=$this->model->ambildata($this->db->dbprefix('navcategory'));
		$data['content'] = 'navigasi/tambahnavigasi';
		$data['css'] = 'navigasi/css';
		$data['javascript'] = 'navigasi/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambahsubnavigasi()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datanavigation']=$this->model->ambildata($this->db->dbprefix('navigation'));
		$data['content'] = 'navigasi/tambahsubnavigasi';
		$data['css'] = 'navigasi/css';
		$data['javascript'] = 'navigasi/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function editnavkategori($idnavcategory)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idnavcategory'] = $idnavcategory;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datanavcategory']=$this->model->ambildataById($this->db->dbprefix('navcategory'),'idnavcategory',$data['idnavcategory']);
		$data['content'] = 'navigasi/editnavkategori';
		$data['css'] = 'navigasi/css';
		$data['javascript'] = 'navigasi/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function editnavigasi($idnavigation)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idnavigation'] = $idnavigation ;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datanavigation']=$this->model->ambildataById($this->db->dbprefix('navigation'),'idnavigation',$data['idnavigation']);
		$data['datanavcategory']=$this->model->ambildata($this->db->dbprefix('navcategory'));
		$data['content'] = 'navigasi/editnavigasi';
		$data['css'] = 'navigasi/css';
		$data['javascript'] = 'navigasi/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function editsubnavigasi($idsubnavigation)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idsubnavigation'] = $idsubnavigation ;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datasubnavigation']=$this->model->ambildataById($this->db->dbprefix('subnavigation'),'idsubnavigation',$data['idsubnavigation']);
		$data['datanavigation']=$this->model->ambildata($this->db->dbprefix('navigation'));
		$data['content'] = 'navigasi/editsubnavigasi';
		$data['css'] = 'navigasi/css';
		$data['javascript'] = 'navigasi/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function savenavkategori()
    {
		$iduser = $this->session->userdata('iduser');
		$data=array(	
			'iduser'=>$iduser,
			'name'=>$this->input->post('name')
		);
		$this->model->simpandata($this->db->dbprefix('navcategory'),$data);
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('navigasi/kategori'));
	}	
	
	public function savenavigasi()
    {
		$iduser = $this->session->userdata('iduser');
		$data=array(	
			'iduser'=>$iduser,
			'idnavcategory '=>$this->input->post('idnavcategory'),
			'name'=>$this->input->post('name'),
			'icon'=>$this->input->post('icon'),
			'link'=>$this->input->post('link')
		);
		$this->model->simpandata($this->db->dbprefix('navigation'),$data);
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('navigasi/navigasiadmin'));
	}	
	
	public function savesubnavigasi()
    {
		$iduser = $this->session->userdata('iduser');
		$data=array(	
			'iduser'=>$iduser,
			'idnavigation'=>$this->input->post('idnavigation'),
			'name'=>$this->input->post('name'),
			'link'=>$this->input->post('link')
		);
		$this->model->simpandata($this->db->dbprefix('subnavigation'),$data);
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('navigasi/subnavigasi'));
	}
	
	public function updatenavkategori()
    {
		$idnavcategory=$this->input->post('idnavcategory');
		$iduser = $this->session->userdata('iduser');
		$data=array(	
			'iduser'=>$iduser,
			'name'=>$this->input->post('name')
		);
		$clause=array('idnavcategory'=>$idnavcategory);
		$this->model->update($this->db->dbprefix('navcategory'),$data,$clause);
		$this->session->set_flashdata('msg_success',lang('edit_success'));			
		redirect(site_url('navigasi/kategori'));
	}
	
	public function updatenavigasi()
    {
		$idnavigation=$this->input->post('idnavigation');
		$iduser = $this->session->userdata('iduser');
		$data=array(	
			'iduser'=>$iduser,
			'idnavcategory '=>$this->input->post('idnavcategory'),
			'name'=>$this->input->post('name'),
			'icon'=>$this->input->post('icon'),
			'link'=>$this->input->post('link')
		);
		$clause=array('idnavigation'=>$idnavigation);
		$this->model->update($this->db->dbprefix('navigation'),$data,$clause);
		$this->session->set_flashdata('msg_success',lang('edit_success'));			
		redirect(site_url('navigasi/navigasiadmin'));
	}
	
	public function updatesubnavigasi()
    {
		$idsubnavigation=$this->input->post('idsubnavigation');
		$iduser = $this->session->userdata('iduser');
		$data=array(	
			'iduser'=>$iduser,
			'idnavigation'=>$this->input->post('idnavigation'),
			'name'=>$this->input->post('name'),
			'link'=>$this->input->post('link')
		);
		$clause=array('idsubnavigation'=>$idsubnavigation);
		$this->model->update($this->db->dbprefix('subnavigation'),$data,$clause);
		$this->session->set_flashdata('msg_success',lang('edit_success'));			
		redirect(site_url('navigasi/subnavigasi'));
	}
	
	function deletenavkategori()
    {
        $idnavcategory=$this->input->post('idnavcategory');
		$this->db->where('idnavcategory', $idnavcategory);
        $this->db->delete($this->db->dbprefix('navcategory'));
        $this->session->set_flashdata('msg_success',lang('delete_success'));			
		redirect(site_url('navigasi/kategori'));
    }	
	
	function deletenavigasi()
    {
        $idnavigation=$this->input->post('idnavigation');
		$this->db->where('idnavigation', $idnavigation);
        $this->db->delete($this->db->dbprefix('navigation'));
        $this->session->set_flashdata('msg_success',lang('delete_success'));		
		redirect(site_url('navigasi/navigasiadmin'));
    }
	
	function deletesubnavigasi()
    {
        $idsubnavigation=$this->input->post('idsubnavigation');
		$this->db->where('idsubnavigation', $idsubnavigation);
        $this->db->delete($this->db->dbprefix('subnavigation'));
        $this->session->set_flashdata('msg_success',lang('delete_success'));			
		redirect(site_url('navigasi/subnavigasi'));
    }
	
}
?>