<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Profile extends CI_Controller {
 
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
		$data['datacountries']=$this->model->selectbox($this->db->dbprefix('countries'),'id');
		$data['dataroles']=$this->model->selectbox($this->db->dbprefix('roles'),'idroles');
		$data['daftaruser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['content'] = 'profile/editusers';
		$data['css'] = 'profile/css';
		$data['javascript'] = 'profile/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function updateusers()
    {
		$iduser=$this->input->post('iduser');
		$emailweb="adminsystem-cs@upi.edu";
		$input_password_lama = md5($this->input->post('oldpassword'));
		$query_pwd = $this->db->query("SELECT password FROM `".$this->db->dbprefix('users')."` WHERE iduser='".$iduser."'");
		$row = $query_pwd->row();
		$password_lama=$row->password;
		
		//print_r($input_password_lama);
		//exit();
		if(!empty($this->input->post('oldpassword')) && empty($this->input->post('password'))) 
		{
			$this->session->set_flashdata('msg_error',lang('new_password_error'));			
			redirect(site_url('profile'));
		}
		
		if($this->input->post('password')!="")
		{
			
			if($input_password_lama!=$password_lama)
			{
				$this->session->set_flashdata('msg_error',lang('old_password_error'));			
				redirect(site_url('profile'));
			}
			
			if(!empty($_FILES['profilepicture']['name']))
			{
				$config['upload_path'] = './assets/files/users/';
				$config['allowed_types'] = 'png|jpg';
				$config['max_size'] = '20480';
				$fileprofilepicture = $_FILES['profilepicture']['name'];
				$path="./assets/files/users/";
				$this->load->library('upload', $config);
				
				if (!$this->upload->do_upload('profilepicture'))
				{
					//$error=$this->upload->display_errors('<p>', '</p>');
					$this->session->set_flashdata('msg_error',lang('upload_error'));
					redirect(site_url('profile'));
				}
				else
				{	
					$queryimg = $this->db->query("SELECT profilepicture FROM `".$this->db->dbprefix('users')."` WHERE iduser='".$iduser."'");
					$row = $queryimg->row();
					$picturepath="./assets/files/users/".$row->profilepicture;
					unlink($picturepath);					
					
					$data=array(		
							'fullname'=>$this->input->post('fullname'),
							'username'=>$this->input->post('username'),
							'password'=>md5($this->input->post('password')),
							'email'=>$this->input->post('email'),
							'phoneno'=>$this->input->post('phoneno'),
							'jobs'=>$this->input->post('jobs'),
							'institution'=>$this->input->post('institution'),
							'country'=>$this->input->post('country'),
							'profilepicture'=>$fileprofilepicture
					);
				}
			}	
			else
			{
				$data=array(		
						'fullname'=>$this->input->post('fullname'),
						'username'=>$this->input->post('username'),
						'password'=>md5($this->input->post('password')),
						'email'=>$this->input->post('email'),
						'phoneno'=>$this->input->post('phoneno'),
						'jobs'=>$this->input->post('jobs'),
						'institution'=>$this->input->post('institution'),
						'country'=>$this->input->post('country')
				);
			}	
		}	
		else
		{
			if(!empty($_FILES['profilepicture']['name']))
			{
				$config['upload_path'] = './assets/files/users/';
				$config['allowed_types'] = 'png|jpg';
				$config['max_size'] = '20480';
				$fileprofilepicture = $_FILES['profilepicture']['name'];
				$path="./assets/files/users/";
				$this->load->library('upload', $config);
				
				if (!$this->upload->do_upload('profilepicture'))
				{
					//$error=$this->upload->display_errors('<p>', '</p>');
					$this->session->set_flashdata('msg_error',lang('upload_error'));
					redirect(site_url('profile'));
				}
				else
				{	
					$queryimg = $this->db->query("SELECT profilepicture FROM `".$this->db->dbprefix('users')."` WHERE iduser='".$iduser."'");
					$row = $queryimg->row();
					$picturepath="./assets/files/users/".$row->profilepicture;
					unlink($picturepath);
					
					$data=array(		
							'fullname'=>$this->input->post('fullname'),
							'username'=>$this->input->post('username'),
							'email'=>$this->input->post('email'),
							'phoneno'=>$this->input->post('phoneno'),
							'jobs'=>$this->input->post('jobs'),
							'institution'=>$this->input->post('institution'),
							'country'=>$this->input->post('country'),
							'profilepicture'=>$fileprofilepicture
					);
				}	
			}
			else
			{
				$data=array(		
						'fullname'=>$this->input->post('fullname'),
						'username'=>$this->input->post('username'),
						'email'=>$this->input->post('email'),
						'phoneno'=>$this->input->post('phoneno'),
						'jobs'=>$this->input->post('jobs'),
						'institution'=>$this->input->post('institution'),
						'country'=>$this->input->post('country')
				);
			}		
		}
		$clause=array('iduser'=>$iduser);
		$this->model->update($this->db->dbprefix('users'),$data,$clause);
		$email_config = Array
				(
				  // deretan baris konfigurasi email library tambahkan ini :
				  'mailtype' => 'html'
				);	
				$this->load->library('email',$email_config);
				$this->email->set_newline("\r\n");
				$this->email->from($emailweb, "Admin Codedume");
				$this->email->to($this->input->post('email'));  
				$this->email->subject("Acount Info");
				$this->email->message("Halo ".$this->input->post('fullname').",\n this your username and password \n"."\n\nUsername : ".$this->input->post('username')."\n\nPassword:".$this->input->post('password')."\n\Admin, do not reply this email, thanks.");
				$this->email->send();
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('profile'));
	}
	
}
?>