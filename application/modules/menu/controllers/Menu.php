<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Menu extends CI_Controller {
 
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
	
	public function menuutamaweb()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datamenuutamaweb']=$this->model->ambildata($this->db->dbprefix('menuutama'));
		$data['content'] = 'menu/listmenuutamaweb';
		$data['css'] = 'menu/css';
		$data['javascript'] = 'menu/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function menukeduaweb()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datamenukeduaweb']=$this->model->ambildata($this->db->dbprefix('menukedua'));
		$data['content'] = 'menu/listmenukeduaweb';
		$data['css'] = 'menu/css';
		$data['javascript'] = 'menu/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function menuketigaweb()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datamenuketigaweb']=$this->model->ambildata($this->db->dbprefix('menuketiga'));
		$data['content'] = 'menu/listmenuketigaweb';
		$data['css'] = 'menu/css';
		$data['javascript'] = 'menu/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambahmenuutamaweb()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datalanguage']=$this->model->ambildata($this->db->dbprefix('language'));
		$data['content'] = 'menu/tambahmenuutamaweb';
		$data['css'] = 'menu/css';
		$data['javascript'] = 'menu/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambahmenukeduaweb()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datamenuutamaweb']=$this->model->ambildata($this->db->dbprefix('menuutama'));
		$data['content'] = 'menu/tambahmenukeduaweb';
		$data['css'] = 'menu/css';
		$data['javascript'] = 'menu/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambahmenuketigaweb()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datamenukeduaweb']=$this->model->ambildata($this->db->dbprefix('menukedua'));
		$data['content'] = 'menu/tambahmenuketigaweb';
		$data['css'] = 'menu/css';
		$data['javascript'] = 'menu/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function editmenuutamaweb($idmenuutama)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idmenuutama'] = $idmenuutama;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datamenuutamaweb']=$this->model->ambildataById($this->db->dbprefix('menuutama'),'idmenuutama',$data['idmenuutama']);
		$data['datalanguage']=$this->model->ambildata($this->db->dbprefix('language'));
		$data['content'] = 'menu/editmenuutamaweb';
		$data['css'] = 'menu/css';
		$data['javascript'] = 'menu/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function editmenukeduaweb($idmenukedua)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idmenukedua'] = $idmenukedua ;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datamenukeduaweb']=$this->model->ambildataById($this->db->dbprefix('menukedua'),'idmenukedua',$data['idmenukedua']);
		$data['datamenuutamaweb']=$this->model->ambildata($this->db->dbprefix('menuutama'));
		$data['content'] = 'menu/editmenukeduaweb';
		$data['css'] = 'menu/css';
		$data['javascript'] = 'menu/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function editmenuketigaweb($idmenuketiga)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idmenuketiga'] = $idmenuketiga ;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datamenuketigaweb']=$this->model->ambildataById($this->db->dbprefix('menuketiga'),'idmenuketiga',$data['idmenuketiga']);
		$data['datamenukeduaweb']=$this->model->ambildata($this->db->dbprefix('menukedua'));
		$data['content'] = 'menu/editmenuketigaweb';
		$data['css'] = 'menu/css';
		$data['javascript'] = 'menu/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function savemenutuamaweb()
    {
		$iduser = $this->session->userdata('iduser');
		$data=array(	
			'iduser'=>$iduser,
			'idlanguage'=>$this->input->post('idlanguage'),
			'menu'=>$this->input->post('menu'),
			'link'=>$this->input->post('link'),
			'main_menu'=>$this->input->post('main_menu'),
			'type'=>$this->input->post('type')
		);
		$this->model->simpandata($this->db->dbprefix('menuutama'),$data);
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('menu/menuutamaweb'));
	}	
	
	public function savemenukeduaweb()
    {
		$iduser = $this->session->userdata('iduser');
		$querybahasa = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('menuutama')."` WHERE idmenuutama =".$this->input->post('idmenuutama')."");
		$row = $querybahasa->row();
		$idlanguage=$row->idlanguage;
		$data=array(	
			'iduser'=>$iduser,
			'idmenuutama'=>$this->input->post('idmenuutama'),
			'idlanguage'=>$idlanguage,
			'menu'=>$this->input->post('menu'),
			'link'=>$this->input->post('link')
		);
		$this->model->simpandata($this->db->dbprefix('menukedua'),$data);
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('menu/menukeduaweb'));
	}	
	
	public function savemenuketigaweb()
    {
		$iduser = $this->session->userdata('iduser');
		$querybahasa = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('menukedua')."` WHERE idmenukedua =".$this->input->post('idmenukedua')."");
		$row = $querybahasa->row();
		$idlanguage=$row->idlanguage;
		$data=array(	
			'iduser'=>$iduser,
			'idmenukedua'=>$this->input->post('idmenukedua'),
			'idlanguage'=>$idlanguage,
			'menu'=>$this->input->post('menu'),
			'link'=>$this->input->post('link')
		);
		$this->model->simpandata($this->db->dbprefix('menuketiga'),$data);
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('menu/menuketigaweb'));
	}
	
	public function updatemenuutamaweb()
    {
		$idmenuutama =$this->input->post('idmenuutama');
		$iduser = $this->session->userdata('iduser');
		$data=array(	
			'iduser '=>$iduser ,
			'idlanguage'=>$this->input->post('idlanguage'),
			'menu'=>$this->input->post('menu'),
			'link'=>$this->input->post('link'),
			'main_menu'=>$this->input->post('main_menu'),
			'type'=>$this->input->post('type')
		);
		$clause=array('idmenuutama '=>$idmenuutama );
		$this->model->update($this->db->dbprefix('menuutama'),$data,$clause);
		$this->session->set_flashdata('msg_success',lang('edit_success'));			
		redirect(site_url('menu/menuutamaweb'));
	}
	
	public function updatemenukeduaweb()
    {
		$idmenukedua=$this->input->post('idmenukedua');
		$iduser = $this->session->userdata('iduser');
		$querybahasa = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('menuutama')."` WHERE idmenuutama =".$this->input->post('idmenuutama')."");
		$row = $querybahasa->row();
		$idlanguage=$row->idlanguage;
		$data=array(	
			'iduser'=>$iduser,
			'idmenuutama '=>$this->input->post('idmenuutama'),
			'idlanguage'=>$idlanguage,
			'menu'=>$this->input->post('menu'),
			'link'=>$this->input->post('link')
		);
		$clause=array('idmenukedua'=>$idmenukedua);
		$this->model->update($this->db->dbprefix('menukedua'),$data,$clause);
		$this->session->set_flashdata('msg_success',lang('edit_success'));			
		redirect(site_url('menu/menukeduaweb'));
	}
	
	public function updatemenuketigaweb()
    {
		$idmenuketiga=$this->input->post('idmenuketiga');
		$iduser = $this->session->userdata('iduser');
		$querybahasa = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('menukedua')."` WHERE idmenukedua =".$this->input->post('idmenukedua')."");
		$row = $querybahasa->row();
		$idlanguage=$row->idlanguage;
		$data=array(	
			'iduser'=>$iduser,
			'idmenukedua'=>$this->input->post('idmenukedua'),
			'idlanguage'=>$idlanguage,
			'menu'=>$this->input->post('menu'),
			'link'=>$this->input->post('link')
		);
		$clause=array('idmenuketiga'=>$idmenuketiga);
		$this->model->update($this->db->dbprefix('menuketiga'),$data,$clause);
		$this->session->set_flashdata('msg_success',lang('edit_success'));			
		redirect(site_url('menu/menuketigaweb'));
	}
	
	function deletemenuutamaweb()
    {
        $idmenuutama=$this->input->post('idmenuutama');
		$this->db->where('idmenuutama', $idmenuutama);
        $this->db->delete($this->db->dbprefix('menuutama'));
        $this->session->set_flashdata('msg_success',lang('delete_success'));			
		redirect(site_url('menu/menuutamaweb'));
    }	
	
	function deletemenukeduaweb()
    {
        $idmenukedua=$this->input->post('idmenukedua');
		$this->db->where('idmenukedua', $idmenukedua);
        $this->db->delete($this->db->dbprefix('menukedua'));
        $this->session->set_flashdata('msg_success',lang('delete_success'));			
		redirect(site_url('menu/menukeduaweb'));
    }
	
	function deletemenuketigaweb()
    {
        $idmenuketiga=$this->input->post('idmenuketiga');
		$this->db->where('idmenuketiga', $idmenuketiga);
        $this->db->delete($this->db->dbprefix('menuketiga'));
        $this->session->set_flashdata('msg_success',lang('delete_success'));			
		redirect(site_url('menu/menuketigaweb'));
    }
	
}
?>