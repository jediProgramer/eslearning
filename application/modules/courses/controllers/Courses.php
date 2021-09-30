<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Courses extends CI_Controller {
 
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

	function stringreplacemoney($uang)
	{
		$str = preg_replace('/\./', '', $uang);	
		return $str;
	}
	
	public function index()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildata($this->db->dbprefix('courses'));
		$data['content'] = 'courses/list';
		$data['css'] = 'courses/css';
		$data['javascript'] = 'courses/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function content()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildata($this->db->dbprefix('courses'));
		$data['content'] = 'courses/listcontent';
		$data['css'] = 'courses/css';
		$data['javascript'] = 'courses/js';
		$this->load->view('admin/admin',$data);
    }

	public function addsyllabus($idcourses)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idcourses'] = $idcourses;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('syllabus'),'idcourses',$data['idcourses']);
		$data['content'] = 'courses/listsyllabus';
		$data['css'] = 'courses/css';
		$data['javascript'] = 'courses/js';
		$this->load->view('admin/admin',$data);
	}

	public function addinstructors($idcourses)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idcourses'] = $idcourses;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('instructors'),'idcourses',$data['idcourses']);
		$data['content'] = 'courses/listinstructors';
		$data['css'] = 'courses/css';
		$data['javascript'] = 'courses/js';
		$this->load->view('admin/admin',$data);
    }

	public function addcoursecontent($idcourses)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idcourses'] = $idcourses;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('syllabus'),'idcourses',$data['idcourses']);
		$data['content'] = 'courses/listcoursecontent';
		$data['css'] = 'courses/css';
		$data['javascript'] = 'courses/jscoursecontentlist';
		$this->load->view('admin/admin',$data);
	}

	public function tambah()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datalanguage']=$this->model->ambildata($this->db->dbprefix('language'));
		$data['datacoursetype']=$this->model->ambildata($this->db->dbprefix('coursetype '));
		$data['datacategory']=$this->model->ambildata($this->db->dbprefix('category'));
		$data['datasubcategory']=$this->model->ambildata($this->db->dbprefix('subcategory'));
		$data['datalevel']=$this->model->ambildata($this->db->dbprefix('level'));
		$data['datacurrency']=$this->model->ambildata($this->db->dbprefix('currency'));
		$data['content'] = 'courses/tambah';
		$data['css'] = 'courses/css';
		$data['javascript'] = 'courses/js';
		$this->load->view('admin/admin',$data);
	}
	
	public function tambahsyllabus($idcourses)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idcourses'] = $idcourses;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['content'] = 'courses/tambahsyllabus';
		$data['css'] = 'courses/css';
		$data['javascript'] = 'courses/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambahinstructors($idcourses)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idcourses'] = $idcourses;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datainstructors']=$this->model->ambildataById($this->db->dbprefix('users'),'roles','5');
		$data['content'] = 'courses/tambahinstructors';
		$data['css'] = 'courses/css';
		$data['javascript'] = 'courses/js';
		$this->load->view('admin/admin',$data);
	}

	public function tambahcoursecontent($idcourses,$idsyllabus)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idcourses'] = $idcourses;
		$data['idsyllabus'] = $idsyllabus;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['content'] = 'courses/tambahcoursecontent';
		$data['css'] = 'courses/css';
		$data['javascript'] = 'courses/jscoursecontent';
		$this->load->view('admin/admin',$data);
	}

	public function edit($idcourses)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idcourses'] = $idcourses;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('courses'),'idcourses',$data['idcourses']);
		$data['datalanguage']=$this->model->ambildata($this->db->dbprefix('language'));
		$data['datacoursetype']=$this->model->ambildata($this->db->dbprefix('coursetype '));
		$data['datacategory']=$this->model->ambildata($this->db->dbprefix('category'));
		$data['datasubcategory']=$this->model->ambildata($this->db->dbprefix('subcategory'));
		$data['datalevel']=$this->model->ambildata($this->db->dbprefix('level'));
		$data['datacurrency']=$this->model->ambildata($this->db->dbprefix('currency'));
		$data['content'] = 'courses/edit';
		$data['css'] = 'courses/css';
		$data['javascript'] = 'courses/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function editsyllabus($idcourses,$idsyllabus)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idcourses'] = $idcourses;
		$data['idsyllabus'] = $idsyllabus;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('syllabus'),'idsyllabus',$data['idsyllabus']);
		$data['content'] = 'courses/editsyllabus';
		$data['css'] = 'courses/css';
		$data['javascript'] = 'courses/js';
		$this->load->view('admin/admin',$data);
	}
	
	public function editinstructors($idcourses,$idinstructors)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idcourses'] = $idcourses;
		$data['idinstructors'] = $idinstructors;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('instructors'),'idinstructors',$data['idinstructors']);
		$data['datainstructors']=$this->model->ambildataById($this->db->dbprefix('users'),'roles','5');
		$data['content'] = 'courses/editinstructors';
		$data['css'] = 'courses/css';
		$data['javascript'] = 'courses/js';
		$this->load->view('admin/admin',$data);
	}
	
	public function editcoursecontent($idcontent,$idcourses,$idsyllabus)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idcontent'] = $idcontent;
		$data['idcourses'] = $idcourses;
		$data['idsyllabus'] = $idsyllabus;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('content'),'idcontent',$data['idcontent']);
		$data['content'] = 'courses/editcoursecontent';
		$data['css'] = 'courses/css';
		$data['javascript'] = 'courses/jscoursecontent';
		$this->load->view('admin/admin',$data);
    }

	public function saves()
    {
		$iduser = $this->session->userdata('iduser');
		$config['upload_path'] = './assets/files/courses/';
		$config['allowed_types'] = 'png|jpg';
		$config['max_size'] = '20480';
		$image = $_FILES['image']['name'];
		$path="./assets/files/courses/";
		$this->load->library('upload', $config);

		if($this->input->post('price')=="0"){$price=0;}else if($this->input->post('price')==""){$price=0;}else{$price=$this->stringreplacemoney($this->input->post('price'));}
		
		if (!$this->upload->do_upload('image'))
		{
			//$error=$this->upload->display_errors('<p>', '</p>');
			$this->session->set_flashdata('msg_error',lang('upload_error'));
			redirect(site_url('courses'));
		}
		else
		{	
			$config['image_library'] = 'gd2';
			$config['source_image'] = './assets/files/courses/'.$image;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 600;
			$config['height']      = 400;

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			$this->image_lib->clear();
			
			$data=array(	
			'idcoursetype'=>$this->input->post('idcoursetype'),
			'idcategory'=>$this->input->post('idcategory'),
			'idsubcategory'=>$this->input->post('idsubcategory'),
			'iduser'=>$iduser,
			'idlanguage'=>$this->input->post('idlanguage'),
			'idlevel'=>$this->input->post('idlevel'),
			'idcurrency'=>$this->input->post('idcurrency'),
			'title'=>$this->input->post('title'),
			'description'=>$this->input->post('description'),
			'image'=>$image,
			'price'=>$price,
			'date'=>date('Y-m-d'),
			'time'=>date('h:i:s'),
			'start_date'=>$this->input->post('start_date'),
			'end_date'=>$this->input->post('end_date'),
			'quota'=>$this->input->post('quota')
			);
		}
		
		$this->model->simpandata($this->db->dbprefix('courses'),$data);
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('courses'));
	}	

	public function savessyllabus()
    {
		$iduser = $this->session->userdata('iduser');
		$data=array(	
		'idcourses'=>$this->input->post('idcourses'),
		'iduser'=>$iduser,
		'syllabus'=>$this->input->post('syllabus'),
		'date'=>date('Y-m-d'),
		'time'=>date('h:i:s')
		);
		$this->model->simpandata($this->db->dbprefix('syllabus'),$data);
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('courses/addsyllabus/'.$this->input->post('idcourses')));
	}	

	public function savesinstructors()
    {
		$data=array(	
		'idcourses'=>$this->input->post('idcourses'),
		'iduser'=>$this->input->post('iduser'),
		'date'=>date('Y-m-d'),
		'time'=>date('h:i:s')
		);
		$this->model->simpandata($this->db->dbprefix('instructors'),$data);
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('courses/addinstructors/'.$this->input->post('idcourses')));
	}
	
	public function savescontentcourses()
    {
		$iduser = $this->session->userdata('iduser');
		$type=$this->input->post('type');
		$idcourses=$this->input->post('idcourses');
		$idsyllabus=$this->input->post('idsyllabus');

		if($type=="1")
		{
			$data=array(	
			'idcourses'=>$idcourses,
			'idsyllabus'=>$idsyllabus,
			'iduser'=>$iduser,
			'title'=>$this->input->post('title'),
			'description'=>$this->input->post('description'),
			'video'=>$this->input->post('video'),
			'duration'=>$this->input->post('duration'),
			'type'=>$type,
			'date'=>date('Y-m-d'),
			'time'=>date('h:i:s')
			);			
		}
		else if($type=="2")
		{
			$config['upload_path'] = './assets/files/courses_material/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = '20480';
			$files = $_FILES['files']['name'];
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('files'))
			{
				//$error=$this->upload->display_errors('<p>', '</p>');
				$this->session->set_flashdata('msg_error',lang('upload_error'));
				redirect(site_url('courses/addcoursecontent/'.$idcourses));
			}
			else
			{	
				$data=array(	
				'idcourses'=>$idcourses,
				'idsyllabus'=>$idsyllabus,
				'iduser'=>$iduser,
				'title'=>$this->input->post('title'),
				'description'=>$this->input->post('description'),
				'file'=>$files,
				'type'=>$type,
				'date'=>date('Y-m-d'),
				'time'=>date('h:i:s')
				);
			}
		}
		else if($type=="3")
		{
			$data=array(	
			'idcourses'=>$idcourses,
			'idsyllabus'=>$idsyllabus,
			'iduser'=>$iduser,
			'title'=>$this->input->post('title'),
			'description'=>$this->input->post('description'),
			'link'=>$this->input->post('link'),
			'type'=>$type,
			'date'=>date('Y-m-d'),
			'time'=>date('h:i:s')
			);			
		}	
		
		$this->model->simpandata($this->db->dbprefix('content'),$data);
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('courses/addcoursecontent/'.$idcourses));
	}	

	public function updates()
    {
		$idcourses=$this->input->post('idcourses');
		$iduser = $this->session->userdata('iduser');
		if($this->input->post('price')=="0"){$price=0;}else if($this->input->post('price')==""){$price=0;}else{$price=$this->stringreplacemoney($this->input->post('price'));}
		
			
		if(!empty($_FILES['image']['name']))
		{
			$config['upload_path'] = './assets/files/courses/';
			$config['allowed_types'] = 'png|jpg';
			$config['max_size'] = '20480';
			$image = $_FILES['image']['name'];
			$path="./assets/files/courses/";
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('image'))
			{
				//$error=$this->upload->display_errors('<p>', '</p>');
				$this->session->set_flashdata('msg_error',lang('upload_error'));
				redirect(site_url('courses'));
			}
			else
			{	
				$queryimg = $this->db->query("SELECT image FROM `".$this->db->dbprefix('courses')."` WHERE idcourses='".$idcourses."'");
				$row = $queryimg->row();
				$picturepath="./assets/files/courses/".$row->image;	
				unlink($picturepath);
				
				$file=$row->image;
				$pieces = explode(".", $file);
				$nameimage=$pieces[0];
				$typeimage=$pieces[1];
				$thumb_file=$nameimage."_thumb.".$typeimage;
				$thumb_file_path="./assets/files/courses/".$thumb_file;
				unlink($thumb_file_path);
				
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/files/courses/'.$image;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width']         = 600;
				$config['height']      = 400;

				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$this->image_lib->clear();
				
				$data=array(	
				'idcoursetype'=>$this->input->post('idcoursetype'),
				'idcategory'=>$this->input->post('idcategory'),
				'idsubcategory'=>$this->input->post('idsubcategory'),
				'iduser'=>$iduser,
				'idlanguage'=>$this->input->post('idlanguage'),
				'idlevel'=>$this->input->post('idlevel'),
				'idcurrency'=>$this->input->post('idcurrency'),
				'title'=>$this->input->post('title'),
				'description'=>$this->input->post('description'),
				'image'=>$image,
				'price'=>$price,
				'start_date'=>$this->input->post('start_date'),
				'end_date'=>$this->input->post('end_date'),
				'quota'=>$this->input->post('quota')
				);
			}
		}
		else
		{
			$data=array(	
			'idcoursetype'=>$this->input->post('idcoursetype'),
			'idcategory'=>$this->input->post('idcategory'),
			'idsubcategory'=>$this->input->post('idsubcategory'),
			'iduser'=>$iduser,
			'idlanguage'=>$this->input->post('idlanguage'),
			'idlevel'=>$this->input->post('idlevel'),
			'idcurrency'=>$this->input->post('idcurrency'),
			'title'=>$this->input->post('title'),
			'description'=>$this->input->post('description'),
			'price'=>$price,
			'start_date'=>$this->input->post('start_date'),
			'end_date'=>$this->input->post('end_date'),
			'quota'=>$this->input->post('quota')
			);
		}		
		$clause=array('idcourses'=>$idcourses);
		$this->model->update($this->db->dbprefix('courses'),$data,$clause);
		$this->session->set_flashdata('msg_success',lang('edit_success'));			
		redirect(site_url('courses'));
	}
	
	public function updatesyllabus()
    {
		$iduser = $this->session->userdata('iduser');
		$idcourses = $this->input->post('idcourses');
		$idsyllabus = $this->input->post('idsyllabus');
		$data=array(	
		'iduser'=>$iduser,
		'syllabus'=>$this->input->post('syllabus'),
		'date'=>date('Y-m-d'),
		'time'=>date('h:i:s')
		);
		$clause=array('idsyllabus'=>$idsyllabus);
		$this->model->update($this->db->dbprefix('syllabus'),$data,$clause);
		$this->session->set_flashdata('msg_success',lang('edit_success'));				
		redirect(site_url('courses/addsyllabus/'.$idcourses));
	}

	public function updateinstructors()
    {
		$idcourses = $this->input->post('idcourses');
		$idinstructors = $this->input->post('idinstructors');
		$data=array(	
		'iduser'=>$this->input->post('iduser'),
		'date'=>date('Y-m-d'),
		'time'=>date('h:i:s')
		);
		$clause=array('idinstructors'=>$idinstructors);
		$this->model->update($this->db->dbprefix('instructors'),$data,$clause);
		$this->session->set_flashdata('msg_success',lang('edit_success'));				
		redirect(site_url('courses/addinstructors/'.$idcourses));
	}

	public function updatescontentcourses()
	{
		$type=$this->input->post('type');
		$idcourses=$this->input->post('idcourses');
		$idcontent=$this->input->post('idcontent');

		if($type=="1")
		{
			$queryfiles = $this->db->query("SELECT file FROM `".$this->db->dbprefix('content')."` WHERE idcontent='".$idcontent."'");
			$row = $queryfiles->row();
			$filespath="./assets/files/courses_material/".$row->file;	
			unlink($filespath);

			$data=array(	
			'title'=>$this->input->post('title'),
			'description'=>$this->input->post('description'),
			'video'=>$this->input->post('video'),
			'file'=>"",
			'link'=>"",
			'duration'=>$this->input->post('duration'),
			'type'=>$type,
			'date'=>date('Y-m-d'),
			'time'=>date('h:i:s')
			);			
		}
		else if($type=="2")
		{
			if(!empty($_FILES['files']['name']))
			{
				$config['upload_path'] = './assets/files/courses_material/';
				$config['allowed_types'] = 'pdf';
				$config['max_size'] = '20480';
				$files = $_FILES['files']['name'];
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('files'))
				{
					//$error=$this->upload->display_errors('<p>', '</p>');
					$this->session->set_flashdata('msg_error',lang('upload_error'));
					redirect(site_url('courses/addcoursecontent/'.$idcourses));
				}
				else
				{	
					$queryfiles = $this->db->query("SELECT file FROM `".$this->db->dbprefix('content')."` WHERE idcontent='".$idcontent."'");
					$row = $queryfiles->row();
					$filespath="./assets/files/courses_material/".$row->file;	
					unlink($filespath);
					
					$data=array(	
					'title'=>$this->input->post('title'),
					'description'=>$this->input->post('description'),
					'video'=>"",
					'file'=>$files,
					'link'=>"",
					'type'=>$type,
					'date'=>date('Y-m-d'),
					'time'=>date('h:i:s')
					);
				}
			}
			else
			{
				$data=array(	
				'title'=>$this->input->post('title'),
				'description'=>$this->input->post('description'),
				'video'=>"",
				'link'=>"",
				'type'=>$type,
				'date'=>date('Y-m-d'),
				'time'=>date('h:i:s')
				);
			}			
		}
		else if($type=="3")
		{
			$queryfiles = $this->db->query("SELECT file FROM `".$this->db->dbprefix('content')."` WHERE idcontent='".$idcontent."'");
			$row = $queryfiles->row();
			$filespath="./assets/files/courses_material/".$row->file;	
			unlink($filespath);

			$data=array(	
			'title'=>$this->input->post('title'),
			'description'=>$this->input->post('description'),
			'video'=>"",
			'file'=>"",
			'link'=>$this->input->post('link'),
			'type'=>$type,
			'date'=>date('Y-m-d'),
			'time'=>date('h:i:s')
			);
		}

		$clause=array('idcontent'=>$idcontent);
		$this->model->update($this->db->dbprefix('content'),$data,$clause);
		$this->session->set_flashdata('msg_success',lang('edit_success'));				
		redirect(site_url('courses/addcoursecontent/'.$idcourses));
	}

	public function deletes()
    {
        $idcourses=$this->input->post('idcourses');
		
		$queryimg = $this->db->query("SELECT image FROM `".$this->db->dbprefix('courses')."` WHERE idcourses='".$idcourses."'");
		$row = $queryimg->row();
		$picturepath="./assets/files/courses/".$row->image;	
		unlink($picturepath);
		
		$file=$row->image;
		$pieces = explode(".", $file);
		$nameimage=$pieces[0];
		$typeimage=$pieces[1];
		$thumb_file=$nameimage."_thumb.".$typeimage;
		$thumb_file_path="./assets/files/courses/".$thumb_file;
		unlink($thumb_file_path);
		
		$this->db->where('idcourses', $idcourses);
        $this->db->delete($this->db->dbprefix('courses'));
        $this->session->set_flashdata('msg_success',lang('delete_success'));			
		redirect(site_url('courses'));
	}	
	
	public function deletessyllabus()
    {
		$idcourses=$this->input->post('idcourses');
		$idsyllabus=$this->input->post('idsyllabus');
		$this->db->where('idsyllabus', $idsyllabus);
        $this->db->delete($this->db->dbprefix('syllabus'));
        $this->session->set_flashdata('msg_success',lang('delete_success'));			
		redirect(site_url('courses/addsyllabus/'.$idcourses));
	}	
	
	public function deletesinstructors()
    {
		$idcourses=$this->input->post('idcourses');
		$idinstructors=$this->input->post('idinstructors');
		$this->db->where('idinstructors', $idinstructors);
        $this->db->delete($this->db->dbprefix('instructors'));
        $this->session->set_flashdata('msg_success',lang('delete_success'));			
		redirect(site_url('courses/addinstructors/'.$idcourses));
    }
	
	public function deletescoursecontent()
    {
        $idcourses=$this->input->post('idcourses');
		$idcontent=$this->input->post('idcontent');
		
		$queryfiles = $this->db->query("SELECT file FROM `".$this->db->dbprefix('content')."` WHERE idcontent='".$idcontent."'");
		$row = $queryfiles->row();
		$filespath="./assets/files/courses_material/".$row->file;	
		unlink($filespath);
		
		$this->db->where('idcontent', $idcontent);
        $this->db->delete($this->db->dbprefix('content'));
        $this->session->set_flashdata('msg_success',lang('delete_success'));			
		redirect(site_url('courses/addcoursecontent/'.$idcourses));
	}

}
?>