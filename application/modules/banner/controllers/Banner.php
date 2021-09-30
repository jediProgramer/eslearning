<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Banner extends CI_Controller {
 
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
	
	public function halamanberandaweb()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datahalamanberandaweb']=$this->model->ambildata($this->db->dbprefix('bannerberanda'));
		$data['content'] = 'banner/listbannerberanda';
		$data['css'] = 'banner/css';
		$data['javascript'] = 'banner/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function halamanweb()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datamenuutamaweb']=$this->model->ambildata($this->db->dbprefix('menuutama'));
		$data['datamenukeduaweb']=$this->model->ambildata($this->db->dbprefix('menukedua'));
		$data['datamenuketigaweb']=$this->model->ambildata($this->db->dbprefix('menuketiga'));
		$data['content'] = 'banner/listbannerhalaman';
		$data['css'] = 'banner/css';
		$data['javascript'] = 'banner/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambahbannerberandaweb()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datalanguage']=$this->model->ambildata($this->db->dbprefix('language'));
		$data['content'] = 'banner/tambahbannerberandaweb';
		$data['css'] = 'banner/css';
		$data['javascript'] = 'banner/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function kelolabannermenuweb($menu,$idmenu)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['menu'] = $menu;
		$data['idmenu'] = $idmenu;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		
		if($menu=="menuutama")
		{
			$data['data']=$this->model->ambildataById($this->db->dbprefix('bannerweb'),'idmenuutama',$data['idmenu']);	
			$query = $this->db->query("SELECT menu FROM `".$this->db->dbprefix('menuutama')."` WHERE idmenuutama='".$data['idmenu']."'");
			$row = $query->row();
			$data['namamenu'] = $row->menu;
		}	
		else if($menu=="menukedua")
		{
			$data['data']=$this->model->ambildataById($this->db->dbprefix('bannerweb'),'idmenukedua',$data['idmenu']);
			$query = $this->db->query("SELECT menu FROM `".$this->db->dbprefix('menukedua')."` WHERE idmenukedua='".$data['idmenu']."'");
			$row = $query->row();
			$data['namamenu'] = $row->menu;
		}
		else if($menu=="menuketiga")
		{
			$data['data']=$this->model->ambildataById($this->db->dbprefix('bannerweb'),'idmenuketiga',$data['idmenu']);
			$query = $this->db->query("SELECT menu FROM `".$this->db->dbprefix('menuketiga')."` WHERE idmenuketiga='".$data['idmenu']."'");
			$row = $query->row();
			$data['namamenu'] = $row->menu;
			
		}	
		
		$data['content'] = 'banner/kelolabannermenuweb';
		$data['css'] = 'banner/css';
		$data['javascript'] = 'banner/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function editbannerberandaweb($idbanner)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idbanner'] = $idbanner;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['databannerberandaweb']=$this->model->ambildataById($this->db->dbprefix('bannerberanda'),'idbanner',$data['idbanner']);
		$data['datalanguage']=$this->model->ambildata($this->db->dbprefix('language'));
		$data['content'] = 'banner/editbannerberandaweb';
		$data['css'] = 'banner/css';
		$data['javascript'] = 'banner/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function savebannerberandaweb()
    {
		$iduser = $this->session->userdata('iduser');
		$config['upload_path'] = './assets/files/banners/';
		$config['allowed_types'] = 'jpg';
		$config['max_size'] = '20480';
		$image = $_FILES['image']['name'];
		$pieces = explode(".", $image);
		$nameimage=$pieces[0];
		$typeimage=$pieces[1];
		$fileimagename="bannerhome.".$typeimage;
		$config['file_name'] = $fileimagename;
		$path="./assets/files/banners/";
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload('image'))
		{
			//$error=$this->upload->display_errors('<p>', '</p>');
			$this->session->set_flashdata('msg_error',lang('upload_error'));
			redirect(site_url('banner/halamanberandaweb'));
		}
		else
		{	
			$config['image_library'] = 'gd2';
			$config['source_image'] = './assets/files/banners/'.$fileimagename;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 250;
			$config['height']      = 70;

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			$this->image_lib->clear();
			
			$data=array(	
			'iduser'=>$iduser,
			'idlanguage'=>$this->input->post('idlanguage'),
			'text'=>$this->input->post('text'),
			'image'=>$fileimagename
			);
		}
		
		$this->model->simpandata($this->db->dbprefix('bannerberanda'),$data);
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('banner/halamanberandaweb'));
	}	
	
	public function savebannerhalamanweb()
    {
		$iduser = $this->session->userdata('iduser');
		$namamenu=$this->input->post('namamenu');
		$menu=$this->input->post('menu');
		$config['upload_path'] = './assets/files/banners/';
		$config['allowed_types'] = 'png|jpg';
		$config['max_size'] = '20480';
		$image = $_FILES['image']['name'];
		$path="./assets/files/banners/";
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload('image'))
		{
			//$error=$this->upload->display_errors('<p>', '</p>');
			$this->session->set_flashdata('msg_error',lang('upload_error'));
			redirect(site_url('banner/halamanweb'));
		}
		else
		{	
			$config['image_library'] = 'gd2';
			$config['source_image'] = './assets/files/banners/'.$image;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 250;
			$config['height']      = 70;

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			$this->image_lib->clear();
			
			if($menu=="menuutama")
			{
				$data=array(
				'idmenuutama'=>$this->input->post('idmenu'),	
				'iduser'=>$iduser,
				'title'=>$this->input->post('title'),
				'subtitle'=>$this->input->post('subtitle'),
				'image'=>$image
				);
			}	
			else if($menu=="menukedua")
			{
				$data=array(
				'idmenukedua'=>$this->input->post('idmenu'),	
				'iduser'=>$iduser,
				'title'=>$this->input->post('title'),
				'subtitle'=>$this->input->post('subtitle'),
				'image'=>$image
				);
			}
			else if($menu=="menuketiga")
			{
				$data=array(
				'idmenuketiga'=>$this->input->post('idmenu'),	
				'iduser'=>$iduser,
				'title'=>$this->input->post('title'),
				'subtitle'=>$this->input->post('subtitle'),
				'image'=>$image
				);
			}				
		}
		
		$this->model->simpandata($this->db->dbprefix('bannerweb'),$data);
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('banner/halamanweb'));
	}	
	
	public function updatebannerberandaweb()
    {
		$idbanner=$this->input->post('idbanner');
		$iduser = $this->session->userdata('iduser');
			
		if(!empty($_FILES['image']['name']))
		{
		
			$config['upload_path'] = './assets/files/banners/';
			$config['allowed_types'] = 'png|jpg';
			$config['max_size'] = '20480';
			$image = $_FILES['image']['name'];
			$pieces = explode(".", $image);
			$nameimage=$pieces[0];
			$typeimage=$pieces[1];
			$fileimagename="bannerhome.".$typeimage;
			$config['file_name'] = $fileimagename;
			$path="./assets/files/banners/";
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('image'))
			{
				//$error=$this->upload->display_errors('<p>', '</p>');
				$this->session->set_flashdata('msg_error',lang('upload_error'));
				redirect(site_url('banner/halamanberandaweb'));
			}
			else
			{	
				$queryimg = $this->db->query("SELECT image FROM `".$this->db->dbprefix('bannerberanda')."` WHERE idbanner='".$idbanner."'");
				$row = $queryimg->row();
				$picturepath="./assets/files/banners/".$row->image;	
				unlink($picturepath);
				
				$file=$row->image;
				$pieces = explode(".", $file);
				$nameimage=$pieces[0];
				$typeimage=$pieces[1];
				$thumb_file=$nameimage."_thumb.".$typeimage;
				$thumb_file_path="./assets/files/banners/".$thumb_file;
				unlink($thumb_file_path);
				
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/files/banners/'.$fileimagename;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width']         = 250;
				$config['height']      = 70;

				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$this->image_lib->clear();
				
				$data=array(	
				'iduser'=>$iduser,
				'idlanguage'=>$this->input->post('idlanguage'),
				'text'=>$this->input->post('text'),
				'image'=>$fileimagename
				);
			}
		}
		else
		{
			$data=array(	
			'iduser'=>$iduser,
			'idlanguage'=>$this->input->post('idlanguage'),
			'text'=>$this->input->post('text')
			);
		}		
		$clause=array('idbanner'=>$idbanner);
		$this->model->update($this->db->dbprefix('bannerberanda'),$data,$clause);
		$this->session->set_flashdata('msg_success',lang('edit_success'));			
		redirect(site_url('banner/halamanberandaweb'));
	}
	
	public function updatebannerhalamanweb()
    {
		$idbannerweb=$this->input->post('idbannerweb');
		$iduser = $this->session->userdata('iduser');
		$namamenu=$this->input->post('namamenu');
		$menu=$this->input->post('menu');
		
		if(!empty($_FILES['image']['name']))
		{
			$config['upload_path'] = './assets/files/banners/';
			$config['allowed_types'] = 'png|jpg';
			$config['max_size'] = '20480';
			$image = $_FILES['image']['name'];
			$path="./assets/files/banners/";
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('image'))
			{
				//$error=$this->upload->display_errors('<p>', '</p>');
				$this->session->set_flashdata('msg_error',lang('upload_error'));
				redirect(site_url('banner/halamanberandaweb'));
			}
			else
			{	
				$queryimg = $this->db->query("SELECT image FROM `".$this->db->dbprefix('bannerweb')."` WHERE idbannerweb='".$idbannerweb."'");
				$row = $queryimg->row();
				$picturepath="./assets/files/banners/".$row->image;	
				unlink($picturepath);
				
				$file=$row->image;
				$pieces = explode(".", $file);
				$nameimage=$pieces[0];
				$typeimage=$pieces[1];
				$thumb_file=$nameimage."_thumb.".$typeimage;
				$thumb_file_path="./assets/files/banners/".$thumb_file;
				unlink($thumb_file_path);
				
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/files/banners/'.$image;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width']         = 250;
				$config['height']      = 70;

				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$this->image_lib->clear();
				
				
				if($menu=="menuutama")
				{
					$data=array(
					'idmenuutama'=>$this->input->post('idmenu'),	
					'iduser'=>$iduser,
					'title'=>$this->input->post('title'),
					'subtitle'=>$this->input->post('subtitle'),
					'image'=>$image
					);
				}	
				else if($menu=="menukedua")
				{
					$data=array(
					'idmenukedua'=>$this->input->post('idmenu'),	
					'iduser'=>$iduser,
					'title'=>$this->input->post('title'),
					'subtitle'=>$this->input->post('subtitle'),
					'image'=>$image
					);
				}
				else if($menu=="menuketiga")
				{
					$data=array(
					'idmenuketiga'=>$this->input->post('idmenu'),	
					'iduser'=>$iduser,
					'title'=>$this->input->post('title'),
					'subtitle'=>$this->input->post('subtitle'),
					'image'=>$image
					);
				}	
			}
		}
		else
		{
			if($menu=="menuutama")
			{
				$data=array(
				'idmenuutama'=>$this->input->post('idmenu'),	
				'iduser'=>$iduser,
				'title'=>$this->input->post('title'),
				'subtitle'=>$this->input->post('subtitle')
				);
			}	
			else if($menu=="menukedua")
			{
				$data=array(
				'idmenukedua'=>$this->input->post('idmenu'),	
				'iduser'=>$iduser,
				'title'=>$this->input->post('title'),
				'subtitle'=>$this->input->post('subtitle')
				);
			}
			else if($menu=="menuketiga")
			{
				$data=array(
				'idmenuketiga'=>$this->input->post('idmenu'),	
				'iduser'=>$iduser,
				'title'=>$this->input->post('title'),
				'subtitle'=>$this->input->post('subtitle')
				);
			}
		}		
		$clause=array('idbannerweb'=>$idbannerweb);
		$this->model->update($this->db->dbprefix('bannerweb'),$data,$clause);	
		$this->session->set_flashdata('msg_success',lang('edit_success'));	
		redirect(site_url('banner/halamanweb'));
	}
	
	
	function deletebannerberandaweb()
    {
        $idbanner=$this->input->post('idbanner');
		
		$queryimg = $this->db->query("SELECT image FROM `".$this->db->dbprefix('bannerberanda')."` WHERE idbanner='".$idbanner."'");
		$row = $queryimg->row();
		$picturepath="./assets/files/banners/".$row->image;	
		unlink($picturepath);
		
		$file=$row->image;
		$pieces = explode(".", $file);
		$nameimage=$pieces[0];
		$typeimage=$pieces[1];
		$thumb_file=$nameimage."_thumb.".$typeimage;
		$thumb_file_path="./assets/files/banners/".$thumb_file;
		unlink($thumb_file_path);
		
		$this->db->where('idbanner', $idbanner);
        $this->db->delete($this->db->dbprefix('bannerberanda'));
        $this->session->set_flashdata('msg_success',lang('delete_success'));			
		redirect(site_url('banner/halamanberandaweb'));
    }	
	
}
?>