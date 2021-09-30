<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Infowebsite extends CI_Controller {
 
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
		$query_idlanguage = $this->db->query("SELECT MIN(idlanguage) AS idlanguage FROM ".$this->db->dbprefix('language')." ");
        $rowid = $query_idlanguage->row();
		$data['idlanguage'] =$rowid->idlanguage;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datawebinfo']=$this->model->ambildataById($this->db->dbprefix('webinfo'),'idlanguage',$data['idlanguage']);
		$data['datawebcontact']=$this->model->ambildata($this->db->dbprefix('webcontact'));
		$data['datawebsocialmedia']=$this->model->ambildata($this->db->dbprefix('websocialmedia'));
		$data['dataweblogo']=$this->model->ambildata($this->db->dbprefix('weblogo'));
		$data['datalanguage']=$this->model->ambildata($this->db->dbprefix('language'));
		$data['content'] = 'infowebsite/content';
		$data['css'] = 'infowebsite/css';
		$data['javascript'] = 'infowebsite/js';
		$this->load->view('admin/admin',$data);
	}
	
	public function detailprofile($idlanguage)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idlanguage'] = $idlanguage;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datawebinfo']=$this->model->ambildataById($this->db->dbprefix('webinfo'),'idlanguage',$idlanguage);
		$data['datawebcontact']=$this->model->ambildata($this->db->dbprefix('webcontact'));
		$data['datawebsocialmedia']=$this->model->ambildata($this->db->dbprefix('websocialmedia'));
		$data['dataweblogo']=$this->model->ambildata($this->db->dbprefix('weblogo'));
		$data['datalanguage']=$this->model->ambildata($this->db->dbprefix('language'));
		$data['content'] = 'infowebsite/content';
		$data['css'] = 'infowebsite/css';
		$data['javascript'] = 'infowebsite/js';
		$this->load->view('admin/admin',$data);
	}
	
	public function savewebinfo()
    {
		$idwebinfo=$this->input->post('idwebinfo');
		$idlanguage=$this->input->post('idlanguage');
		$iduser = $this->session->userdata('iduser');
		$query = $this->db->query("SELECT * FROM ".$this->db->dbprefix('webinfo')." WHERE idlanguage='$idlanguage'");
		if ($query->num_rows() >= 1)
		{
			$data=array(	
						'iduser'=>$iduser,
						'idlanguage '=>$this->input->post('idlanguage'),
						'websitename'=>$this->input->post('nama'),
						'keyword'=>$this->input->post('katakunci'),
						'author'=>$this->input->post('pembuatwebsite'),
						'year'=>$this->input->post('tahunwebsite'),
						'description'=>$this->input->post('deskripsi')
					);
			$clause=array('idwebinfo'=>$idwebinfo);
			$this->model->update($this->db->dbprefix('webinfo'),$data,$clause);
			$this->session->set_flashdata('msg_success',lang('edit_success'));			
			redirect(site_url('infowebsite'));
		}
		else
		{
			$data=array(	
						'iduser'=>$iduser,
						'idlanguage '=>$this->input->post('idlanguage'),
						'websitename'=>$this->input->post('nama'),
						'keyword'=>$this->input->post('katakunci'),
						'author'=>$this->input->post('pembuatwebsite'),
						'year'=>$this->input->post('tahunwebsite'),
						'description'=>$this->input->post('deskripsi')
					);
			$this->model->simpandata($this->db->dbprefix('webinfo'),$data);
			$this->session->set_flashdata('msg_success',lang('save_success'));			
			redirect(site_url('infowebsite'));
		}	
	}	
	
	public function savewebcontact()
    {
		$idwebcontact=$this->input->post('idwebcontact');
		$iduser = $this->session->userdata('iduser');
		$query = $this->db->query("SELECT * FROM ".$this->db->dbprefix('webcontact')." ");
		if ($query->num_rows() >= 1)
		{
			$data=array(	
						'iduser'=>$iduser,
						'email'=>$this->input->post('email'),
						'phonenumber'=>$this->input->post('telepon'),
						'address'=>$this->input->post('alamat')
					);
			$clause=array('idwebcontact'=>$idwebcontact);
			$this->model->update($this->db->dbprefix('webcontact'),$data,$clause);
			$this->session->set_flashdata('msg_success',lang('edit_success'));			
			redirect(site_url('infowebsite'));
		}
		else
		{
			$data=array(	
						'iduser'=>$iduser,
						'email'=>$this->input->post('email'),
						'phonenumber'=>$this->input->post('telepon'),
						'address'=>$this->input->post('alamat')
					);
			$this->model->simpandata($this->db->dbprefix('webcontact'),$data);
			$this->session->set_flashdata('msg_success',lang('save_success'));			
			redirect(site_url('infowebsite'));
		}	
	}	
	
	public function savewebsocialmedia()
    {
		$idwebsocialmedia=$this->input->post('idwebsocialmedia');
		$iduser = $this->session->userdata('iduser');
		$query = $this->db->query("SELECT * FROM ".$this->db->dbprefix('websocialmedia')." ");
		if ($query->num_rows() >= 1)
		{
			$data=array(	
						'iduser'=>$iduser,
						'facebook'=>$this->input->post('facebook'),
						'twitter'=>$this->input->post('twitter'),
						'youtube'=>$this->input->post('youtube'),
						'instagram'=>$this->input->post('instagram')
					);
			$clause=array('idwebsocialmedia'=>$idwebsocialmedia);
			$this->model->update($this->db->dbprefix('websocialmedia'),$data,$clause);
			$this->session->set_flashdata('msg_success',lang('edit_success'));			
			redirect(site_url('infowebsite'));
		}
		else
		{
			$data=array(	
						'iduser'=>$iduser,
						'facebook'=>$this->input->post('facebook'),
						'twitter'=>$this->input->post('twitter'),
						'youtube'=>$this->input->post('youtube'),
						'instagram'=>$this->input->post('instagram')
					);
			$this->model->simpandata($this->db->dbprefix('websocialmedia'),$data);
			$this->session->set_flashdata('msg_success',lang('save_success'));			
			redirect(site_url('infowebsite'));
		}	
	}	
	
	public function saveweblogo()
    {
		$idweblogo=$this->input->post('idweblogo');
		$iduser = $this->session->userdata('iduser');
		$query = $this->db->query("SELECT * FROM ".$this->db->dbprefix('weblogo')." ");
		if ($query->num_rows() >= 1)
		{
			if(!empty($_FILES['filelogo']['name']) && empty($_FILES['filefavicon']['name']))
			{
				$config['upload_path'] = '../assets/files/images/';
				$config['allowed_types'] = 'png';
				$config['max_size'] = '20480';
				$filelogo = $_FILES['filelogo']['name'];
				$path="../assets/files/images/";
				$this->load->library('upload', $config);
			
				if (!$this->upload->do_upload('filelogo'))
				{
					//$error=$this->upload->display_errors('<p>', '</p>');
					$this->session->set_flashdata('msg_error','File tidak bisa diupload, cek tipe file Anda');
					redirect(site_url('infowebsite'));
				}
				else
				{
					$queryimg = $this->db->query("SELECT logo FROM `".$this->db->dbprefix('weblogo')."` WHERE idweblogo='".$idweblogo."'");
					$row = $queryimg->row();
					$picturepath="../assets/files/images/".$row->logo;	
					unlink($picturepath);
					$data=array(	
							'iduser'=>$iduser,
							'logo'=>$filelogo
						);
					$clause=array('idweblogo'=>$idweblogo);
					$this->model->update($this->db->dbprefix('weblogo'),$data,$clause);
					$this->session->set_flashdata('msg_success',lang('edit_success'));			
					redirect(site_url('infowebsite'));
				}
			}
			else if(empty($_FILES['filelogo']['name']) && !empty($_FILES['filefavicon']['name']))
			{
				$config['upload_path'] = '../assets/files/images/';
				$config['allowed_types'] = 'png';
				$config['max_size'] = '20480';
				$filefavicon = $_FILES['filefavicon']['name'];
				$path="../assets/files/images/";
				$this->load->library('upload', $config);
			
				if (!$this->upload->do_upload('filefavicon'))
				{
					//$error=$this->upload->display_errors('<p>', '</p>');
					$this->session->set_flashdata('msg_error','File tidak bisa diupload, cek tipe file Anda');
					redirect(site_url('infowebsite'));
				}
				else
				{
					$queryimg = $this->db->query("SELECT favicon FROM `".$this->db->dbprefix('weblogo')."` WHERE idweblogo='".$idweblogo."'");
					$row = $queryimg->row();
					$picturepath="../assets/files/images/".$row->favicon;	
					unlink($picturepath);
					$data=array(	
							'iduser'=>$iduser,
							'favicon'=>$filefavicon
						);
					$clause=array('idweblogo'=>$idweblogo);
					$this->model->update($this->db->dbprefix('weblogo'),$data,$clause);
					$this->session->set_flashdata('msg_success',lang('edit_success'));			
					redirect(site_url('infowebsite'));
				}
			}
			else
			{
				$config['upload_path'] = '../assets/files/images/';
				$config['allowed_types'] = 'png';
				$config['max_size'] = '20480';
				$filelogo = $_FILES['filelogo']['name'];
				$filefavicon = $_FILES['filefavicon']['name'];
				$path="../assets/files/images/";
				$this->load->library('upload', $config);
				
				if (!$this->upload->do_upload('filelogo'))
				{
					//$error=$this->upload->display_errors('<p>', '</p>');
					$this->session->set_flashdata('msg_error','File tidak bisa diupload, cek tipe file Anda');
					redirect(site_url('infowebsite'));
				}
				else if (!$this->upload->do_upload('filefavicon'))
				{
					//$error=$this->upload->display_errors('<p>', '</p>');
					$this->session->set_flashdata('msg_error','File tidak bisa diupload, cek tipe file Anda');
					redirect(site_url('infowebsite'));
				}
				else
				{
					$queryimg1 = $this->db->query("SELECT logo FROM `".$this->db->dbprefix('weblogo')."` WHERE idweblogo='".$idweblogo."'");
					$row1 = $queryimg1->row();
					$picturepath1="../assets/files/images/".$row1->logo;
					unlink($picturepath1);
					
					$queryimg2 = $this->db->query("SELECT favicon FROM `".$this->db->dbprefix('weblogo')."` WHERE idweblogo='".$idweblogo."'");
					$row2 = $queryimg2->row();
					$picturepath2="../assets/files/images/".$row2->favicon;
					unlink($picturepath2);
					
					$data=array(	
							'iduser'=>$iduser,
							'logo'=>$filelogo,
							'favicon'=>$filefavicon
						);
					$clause=array('idweblogo'=>$idweblogo);
					$this->model->update($this->db->dbprefix('weblogo'),$data,$clause);
					$this->session->set_flashdata('msg_success',lang('edit_success'));			
					redirect(site_url('infowebsite'));
				}
			}
		}
		else
		{
			$config['upload_path'] = '../assets/files/images/';
			$config['allowed_types'] = 'png';
			$config['max_size'] = '20480';
			$filelogo = $_FILES['filelogo']['name'];
			$filefavicon = $_FILES['filefavicon']['name'];
			$path="../assets/files/images/";
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('filelogo'))
			{
				//$error=$this->upload->display_errors('<p>', '</p>');
				$this->session->set_flashdata('msg_error','File tidak bisa diupload, cek tipe file Anda');
				redirect(site_url('infowebsite'));
			}
			else if (!$this->upload->do_upload('filefavicon'))
			{
				//$error=$this->upload->display_errors('<p>', '</p>');
				$this->session->set_flashdata('msg_error','File tidak bisa diupload, cek tipe file Anda');
				redirect(site_url('infowebsite'));
			}
			else
			{
				$data=array(	
						'iduser'=>$iduser,
						'logo'=>$filelogo,
						'favicon'=>$filefavicon
					);
				$this->model->simpandata($this->db->dbprefix('weblogo'),$data);
				$this->session->set_flashdata('msg_success',lang('save_success'));			
				redirect(site_url('infowebsite'));
			}
		}	
	}	
}
?>