<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Pages extends CI_Controller {
 
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
	
	public function halamanweb()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datamenuutamaweb']=$this->model->ambildata($this->db->dbprefix('menuutama'));
		$data['datamenukeduaweb']=$this->model->ambildata($this->db->dbprefix('menukedua'));
		$data['datamenuketigaweb']=$this->model->ambildata($this->db->dbprefix('menuketiga'));
		$data['content'] = 'pages/listpageshalaman';
		$data['css'] = 'pages/css';
		$data['javascript'] = 'pages/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function kelolapagesmenuweb($menu,$idmenu)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['menu'] = $menu;
		$data['idmenu'] = $idmenu;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		
		if($menu=="menuutama")
		{
			$data['data']=$this->model->ambildataById($this->db->dbprefix('pagesweb'),'idmenuutama',$data['idmenu']);
			$query = $this->db->query("SELECT menu FROM `".$this->db->dbprefix('menuutama')."` WHERE idmenuutama='".$data['idmenu']."'");
			$row = $query->row();
			$data['namamenu'] = $row->menu;	
		}	
		else if($menu=="menukedua")
		{
			$data['data']=$this->model->ambildataById($this->db->dbprefix('pagesweb'),'idmenukedua',$data['idmenu']);
			$query = $this->db->query("SELECT menu FROM `".$this->db->dbprefix('menukedua')."` WHERE idmenukedua='".$data['idmenu']."'");
			$row = $query->row();
			$data['namamenu'] = $row->menu;
		}
		else if($menu=="menuketiga")
		{
			$data['data']=$this->model->ambildataById($this->db->dbprefix('pagesweb'),'idmenuketiga',$data['idmenu']);
			$query = $this->db->query("SELECT menu FROM `".$this->db->dbprefix('menuketiga')."` WHERE idmenuketiga='".$data['idmenu']."'");
			$row = $query->row();
			$data['namamenu'] = $row->menu;
		}	
		
		$data['content'] = 'pages/kelolapagesmenuweb';
		$data['css'] = 'pages/css';
		$data['javascript'] = 'pages/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function savepageshalamanweb()
    {
		$iduser = $this->session->userdata('iduser');
		$namamenu=$this->input->post('namamenu');
		$menu=$this->input->post('menu');
	
		if($menu=="menuutama")
		{
			$data=array(
			'idmenuutama'=>$this->input->post('idmenu'),	
			'iduser'=>$iduser,
			'pages'=>$this->input->post('pages'),
			'type'=>$this->input->post('type')
			);
			
			$data_link=array(	
			'link'=>'pages/detail/'.$this->input->post('idmenu')
			);
			$clause=array('idmenuutama'=>$this->input->post('idmenu'));
			$tabel='menuutama';
		}	
		else if($menu=="menukedua")
		{
			$data=array(
			'idmenukedua'=>$this->input->post('idmenu'),	
			'iduser'=>$iduser,
			'pages'=>$this->input->post('pages'),
			'type'=>$this->input->post('type')
			);
			
			$data_link=array(	
			'link'=>'pages/detail/'.$this->input->post('idmenu')
			);
			$clause=array('idmenukedua'=>$this->input->post('idmenu'));
			$tabel='menukedua';
		}
		else if($menu=="menuketiga")
		{
			$data=array(
			'idmenuketiga'=>$this->input->post('idmenu'),	
			'iduser'=>$iduser,
			'pages'=>$this->input->post('pages'),
			'type'=>$this->input->post('type')
			);
			
			$data_link=array(	
			'link'=>'pages/detail/'.$this->input->post('idmenu')
			);
			$clause=array('idmenuketiga'=>$this->input->post('idmenu'));
			$tabel='menuketiga';
		}	
			
		$this->model->simpandata($this->db->dbprefix('pagesweb'),$data);
		$this->model->update($this->db->dbprefix($tabel),$data_link,$clause);
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('pages/halamanweb'));
	}	
	
	public function updatepageshalamanweb()
    {
		$idpagesweb=$this->input->post('idpagesweb');
		$iduser = $this->session->userdata('iduser');
		$namamenu=$this->input->post('namamenu');
		$menu=$this->input->post('menu');
		
		if($menu=="menuutama")
		{
			$data=array(
			'idmenuutama'=>$this->input->post('idmenu'),	
			'iduser'=>$iduser,
			'pages'=>$this->input->post('pages'),
			'type'=>$this->input->post('type')
			);
			
			$data_link=array(	
			'link'=>'pages/detail/'.$this->input->post('idmenu')
			);
			$clause_link=array('idmenuutama '=>$this->input->post('idmenu'));
			$tabel='menuutama';
		}	
		else if($menu=="menukedua")
		{
			$data=array(
			'idmenukedua'=>$this->input->post('idmenu'),	
			'iduser'=>$iduser,
			'pages'=>$this->input->post('pages'),
			'type'=>$this->input->post('type')
			);
			
			$data_link=array(	
			'link'=>'pages/detail/'.$this->input->post('idmenu')
			);
			$clause_link=array('idmenukedua'=>$this->input->post('idmenu'));
			$tabel='menukedua';
		}
		else if($menu=="menuketiga")
		{
			$data=array(
			'idmenuketiga'=>$this->input->post('idmenu'),	
			'iduser'=>$iduser,
			'pages'=>$this->input->post('pages'),
			'type'=>$this->input->post('type')
			);
			
			$data_link=array(	
			'link'=>'pages/detail/'.$this->input->post('idmenu')
			);
			$clause_link=array('idmenuketiga'=>$this->input->post('idmenu'));
			$tabel='menuketiga';
		}	
		
		$clause=array('idpagesweb'=>$idpagesweb);
		$this->model->update($this->db->dbprefix('pagesweb'),$data,$clause);
		$this->model->update($this->db->dbprefix($tabel),$data_link,$clause_link);		
		$this->session->set_flashdata('msg_success',lang('edit_success'));	
		redirect(site_url('pages/halamanweb'));
	}
	
}
?>