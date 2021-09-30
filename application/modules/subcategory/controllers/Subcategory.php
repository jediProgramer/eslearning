<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Subcategory extends CI_Controller {
 
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
		$data['data']=$this->model->ambildata($this->db->dbprefix('subcategory'));
		$data['content'] = 'subcategory/list';
		$data['css'] = 'subcategory/css';
		$data['javascript'] = 'subcategory/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambah()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datalanguage']=$this->model->ambildata($this->db->dbprefix('language'));
		$data['datacategory']=$this->model->ambildata($this->db->dbprefix('category'));
		$data['content'] = 'subcategory/tambah';
		$data['css'] = 'subcategory/css';
		$data['javascript'] = 'subcategory/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function edit($idsubcategory)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idsubcategory'] = $idsubcategory;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('subcategory'),'idsubcategory',$data['idsubcategory']);
		$data['datalanguage']=$this->model->ambildata($this->db->dbprefix('language'));
		$data['datacategory']=$this->model->ambildata($this->db->dbprefix('category'));
		$data['content'] = 'subcategory/edit';
		$data['css'] = 'subcategory/css';
		$data['javascript'] = 'subcategory/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function saves()
    {
		$iduser = $this->session->userdata('iduser');
		$config['upload_path'] = './assets/files/subcategory/';
		$config['allowed_types'] = 'png|jpg';
		$config['max_size'] = '20480';
		$image = $_FILES['image']['name'];
		$path="./assets/files/subcategory/";
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload('image'))
		{
			//$error=$this->upload->display_errors('<p>', '</p>');
			$this->session->set_flashdata('msg_error',lang('upload_error'));
			redirect(site_url('subcategory'));
		}
		else
		{	
			$config['image_library'] = 'gd2';
			$config['source_image'] = './assets/files/subcategory/'.$image;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 600;
			$config['height']      = 400;

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			$this->image_lib->clear();
			
			$data=array(
			'idcategory '=>$this->input->post('idcategory'),		
			'iduser'=>$iduser,
			'idlanguage'=>$this->input->post('idlanguage'),
			'title'=>$this->input->post('title'),
			'description'=>$this->input->post('description'),
			'image'=>$image,
			'date'=>date('Y-m-d'),
			'time'=>date('h:i:s')
			);
		}
		
		$this->model->simpandata($this->db->dbprefix('subcategory'),$data);
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('subcategory'));
	}	
	
	public function updates()
    {
		$idsubcategory=$this->input->post('idsubcategory');
		$iduser = $this->session->userdata('iduser');
			
		if(!empty($_FILES['image']['name']))
		{
			$config['upload_path'] = './assets/files/subcategory/';
			$config['allowed_types'] = 'png|jpg';
			$config['max_size'] = '20480';
			$image = $_FILES['image']['name'];
			$path="./assets/files/subcategory/";
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('image'))
			{
				//$error=$this->upload->display_errors('<p>', '</p>');
				$this->session->set_flashdata('msg_error',lang('upload_error'));
				redirect(site_url('subcategory'));
			}
			else
			{	
				$queryimg = $this->db->query("SELECT image FROM `".$this->db->dbprefix('subcategory')."` WHERE idsubcategory='".$idsubcategory."'");
				$row = $queryimg->row();
				$picturepath="./assets/files/subcategory/".$row->image;	
				unlink($picturepath);
				
				$file=$row->image;
				$pieces = explode(".", $file);
				$nameimage=$pieces[0];
				$typeimage=$pieces[1];
				$thumb_file=$nameimage."_thumb.".$typeimage;
				$thumb_file_path="./assets/files/subcategory/".$thumb_file;
				unlink($thumb_file_path);
				
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/files/subcategory/'.$image;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width']         = 600;
				$config['height']      = 400;

				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$this->image_lib->clear();
				
				$data=array(
				'idcategory '=>$this->input->post('idcategory'),	
				'iduser'=>$iduser,
				'idlanguage'=>$this->input->post('idlanguage'),
				'title'=>$this->input->post('title'),
				'description'=>$this->input->post('description'),
				'image'=>$image
				);
			}
		}
		else
		{
			$data=array(
			'idcategory '=>$this->input->post('idcategory'),		
			'iduser'=>$iduser,
			'idlanguage'=>$this->input->post('idlanguage'),
			'title'=>$this->input->post('title'),
			'description'=>$this->input->post('description')
			);
		}		
		$clause=array('idsubcategory'=>$idsubcategory);
		$this->model->update($this->db->dbprefix('subcategory'),$data,$clause);
		$this->session->set_flashdata('msg_success',lang('edit_success'));			
		redirect(site_url('subcategory'));
	}
	
	function deletes()
    {
        $idsubcategory=$this->input->post('idsubcategory');
		
		$queryimg = $this->db->query("SELECT image FROM `".$this->db->dbprefix('subcategory')."` WHERE idsubcategory='".$idsubcategory."'");
		$row = $queryimg->row();
		$picturepath="./assets/files/subcategory/".$row->image;	
		unlink($picturepath);
		
		$file=$row->image;
		$pieces = explode(".", $file);
		$nameimage=$pieces[0];
		$typeimage=$pieces[1];
		$thumb_file=$nameimage."_thumb.".$typeimage;
		$thumb_file_path="./assets/files/subcategory/".$thumb_file;
		unlink($thumb_file_path);
		
		$this->db->where('idsubcategory', $idsubcategory);
        $this->db->delete($this->db->dbprefix('subcategory'));
        $this->session->set_flashdata('msg_success',lang('delete_success'));			
		redirect(site_url('subcategory'));
    }	
	
}
?>