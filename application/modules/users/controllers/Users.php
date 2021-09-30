<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Users extends CI_Controller {
 
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
		$data['daftaruser']=$this->model->ambildataById($this->db->dbprefix('users'),'addby',$data['iduser']);
		$data['content'] = 'users/listusers';
		$data['css'] = 'users/css';
		$data['javascript'] = 'users/js';
		$this->load->view('admin/admin',$data);
	}
	
	public function instructors()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['daftaruser']=$this->model->ambildataById($this->db->dbprefix('users'),'roles','5');
		$data['content'] = 'users/listinstruktur';
		$data['css'] = 'users/css';
		$data['javascript'] = 'users/js';
		$this->load->view('admin/admin',$data);
	}
	
	public function educationinstructors($iduser)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['iduser_web'] = $iduser;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datapendidikan']=$this->model->ambildataById($this->db->dbprefix('education'),'iduser',$data['iduser_web']);
		$data['content'] = 'users/listpendidikan';
		$data['css'] = 'users/css';
		$data['javascript'] = 'users/js';
		$this->load->view('admin/admin',$data);
	}	
	
	public function tambahusers()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datacountries']=$this->model->selectbox($this->db->dbprefix('countries'),'id');
		$data['dataroles']=$this->model->selectbox($this->db->dbprefix('roles'),'idroles');
		$data['daftaruser']=$this->model->ambildata($this->db->dbprefix('users'));
		$data['content'] = 'users/tambahusers';
		$data['css'] = 'users/css';
		$data['javascript'] = 'users/js';
		$this->load->view('admin/admin',$data);
	}
	
	public function tambahinstructors()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datacountries']=$this->model->selectbox($this->db->dbprefix('countries'),'id');
		$data['dataroles']=$this->model->selectbox($this->db->dbprefix('roles'),'idroles');
		$data['content'] = 'users/tambahinstruktur';
		$data['css'] = 'users/css';
		$data['javascript'] = 'users/js';
		$this->load->view('admin/admin',$data);
	}
	
	public function tambaheducation($iduser)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['iduser_web'] = $iduser;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['dataeducationlevel']=$this->model->ambildata($this->db->dbprefix('educationlevel'));
		$data['datanegara']=$this->model->ambildata($this->db->dbprefix('countries'));
		$data['content'] = 'users/tambaheducation';
		$data['css'] = 'users/css';
		$data['javascript'] = 'users/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function editusers($iduser)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['iduser_web'] = $iduser;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datacountries']=$this->model->selectbox($this->db->dbprefix('countries'),'id');
		$data['dataroles']=$this->model->selectbox($this->db->dbprefix('roles'),'idroles');
		$data['daftaruser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser_web']);
		$data['content'] = 'users/editusers';
		$data['css'] = 'users/css';
		$data['javascript'] = 'users/js';
		$this->load->view('admin/admin',$data);
	}
	
	public function editinstructors($iduser)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['iduser_web'] = $iduser;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datacountries']=$this->model->selectbox($this->db->dbprefix('countries'),'id');
		$data['dataroles']=$this->model->selectbox($this->db->dbprefix('roles'),'idroles');
		$data['daftaruser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser_web']);
		$data['content'] = 'users/editinstruktur';
		$data['css'] = 'users/css';
		$data['javascript'] = 'users/js';
		$this->load->view('admin/admin',$data);
	}
	
	public function editeducation($iduser,$ideducation)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['iduser_web'] = $iduser;
		$data['ideducation'] = $ideducation;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('education'),'ideducation',$data['ideducation']);
		$data['dataeducationlevel']=$this->model->ambildata($this->db->dbprefix('educationlevel'));
		$data['datanegara']=$this->model->ambildata($this->db->dbprefix('countries'));
		$data['content'] = 'users/editeducation';
		$data['css'] = 'users/css';
		$data['javascript'] = 'users/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function saveusers()
    {
		$addby = $this->session->userdata('iduser');
		$tgl=date('y-m-d');
		$pieces= explode("-",$tgl);
		$rand = substr(md5(microtime()),rand(0,26),5);
		$iduser="u".$pieces[0].$pieces[1].$rand;
		$emailweb="admin@codedume.com";
		$data=array(	
				'iduser'=>$iduser,
				'fullname'=>$this->input->post('fullname'),
				'username'=>$this->input->post('username'),
				'password'=>md5($this->input->post('password')),
				'email'=>$this->input->post('email'),
				'phoneno'=>$this->input->post('phoneno'),
				'jobs'=>$this->input->post('jobs'),
				'institution'=>$this->input->post('institution'),
				'country'=>$this->input->post('country'),
				'active'=>$this->input->post('active'),
				'roles'=>$this->input->post('roles'),
				'addby'=>$addby
			);
		$this->model->simpandata($this->db->dbprefix('users'),$data);
		$email_config = Array
				(
				  // deretan baris konfigurasi email library tambahkan ini :
				  'mailtype' => 'html'
				);	
				$this->load->library('email',$email_config);
				$this->email->set_newline("\r\n");
				$this->email->from($emailweb, "Admin Codume");
				$this->email->to($this->input->post('email'));  
				$this->email->subject("Info Akun");
				$this->email->message("Halo ".$this->input->post('fullname').",\n this is your username and password \n"."\n\nUsername : ".$this->input->post('username')."\n\nPassword:".$this->input->post('password')."\n\Admin, do not reply this email, thanks.");
				$this->email->send();
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('users'));
	}	

	public function saveinstructors()
    {
		$addby = $this->session->userdata('iduser');
		$tgl=date('y-m-d');
		$pieces= explode("-",$tgl);
		$rand = substr(md5(microtime()),rand(0,26),5);
		$iduser="u".$pieces[0].$pieces[1].$rand;
		$emailweb="admin@codedume.com";
		$data=array(	
				'iduser'=>$iduser,
				'fullname'=>$this->input->post('fullname'),
				'username'=>$this->input->post('username'),
				'password'=>md5($this->input->post('password')),
				'email'=>$this->input->post('email'),
				'phoneno'=>$this->input->post('phoneno'),
				'jobs'=>$this->input->post('jobs'),
				'institution'=>$this->input->post('institution'),
				'country'=>$this->input->post('country'),
				'active'=>$this->input->post('active'),
				'profile'=>$this->input->post('profile'),
				'roles'=>'5',
				'addby'=>$addby
			);
		$this->model->simpandata($this->db->dbprefix('users'),$data);
		$email_config = Array
				(
				  // deretan baris konfigurasi email library tambahkan ini :
				  'mailtype' => 'html'
				);	
				$this->load->library('email',$email_config);
				$this->email->set_newline("\r\n");
				$this->email->from($emailweb, "Admin Codume");
				$this->email->to($this->input->post('email'));  
				$this->email->subject("Info Akun");
				$this->email->message("Halo ".$this->input->post('fullname').",\n this is your username and password \n"."\n\nUsername : ".$this->input->post('username')."\n\nPassword:".$this->input->post('password')."\n\Admin, do not reply this email, thanks.");
				$this->email->send();
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('users/instructors'));
	}	

	public function saveeducation()
    {
		$data=array(	
		'iduser'=>$this->input->post('iduser'),
		'level'=>$this->input->post('level'),
		'field_of_study'=>$this->input->post('field_of_study'),
		'college'=>$this->input->post('college'),
		'city'=>$this->input->post('city'),
		'country'=>$this->input->post('country'),
		'graduation_year'=>$this->input->post('graduation_year')
		);
		$this->model->simpandata($this->db->dbprefix('education'),$data);
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('users/educationinstructors/'.$this->input->post('iduser')));
	}
	
	public function updateusers()
    {
		$iduser=$this->input->post('iduser');
		$emailweb="adminsystem-cs@upi.edu";
		$data=array(		
				'fullname'=>$this->input->post('fullname'),
				'username'=>$this->input->post('username'),
				'password'=>md5($this->input->post('password')),
				'email'=>$this->input->post('email'),
				'phoneno'=>$this->input->post('phoneno'),
				'jobs'=>$this->input->post('jobs'),
				'institution'=>$this->input->post('institution'),
				'country'=>$this->input->post('country'),
				'active'=>$this->input->post('active'),
				'roles'=>$this->input->post('roles')
			);
		$clause=array('iduser'=>$iduser);
		$this->model->update($this->db->dbprefix('users'),$data,$clause);
		$email_config = Array
				(
				  // deretan baris konfigurasi email library tambahkan ini :
				  'mailtype' => 'html'
				);	
				$this->load->library('email',$email_config);
				$this->email->set_newline("\r\n");
				$this->email->from($emailweb, "Admin Codume");
				$this->email->to($this->input->post('email'));  
				$this->email->subject("Acount Info");
				$this->email->message("Halo ".$this->input->post('fullname').",\n this is your username and password \n"."\n\nUsername : ".$this->input->post('username')."\n\nPassword:".$this->input->post('password')."\n\Admin, do not reply this email, thanks.");
				$this->email->send();
		$this->session->set_flashdata('msg_success',lang('edit_success'));			
		redirect(site_url('users'));
	}

	public function updateinstructors()
    {
		$iduser=$this->input->post('iduser');
		$emailweb="adminsystem-cs@upi.edu";
		$data=array(		
				'fullname'=>$this->input->post('fullname'),
				'username'=>$this->input->post('username'),
				'password'=>md5($this->input->post('password')),
				'email'=>$this->input->post('email'),
				'phoneno'=>$this->input->post('phoneno'),
				'jobs'=>$this->input->post('jobs'),
				'institution'=>$this->input->post('institution'),
				'country'=>$this->input->post('country'),
				'active'=>$this->input->post('active'),
				'profile'=>$this->input->post('profile'),
				'roles'=>'5'
			);
		$clause=array('iduser'=>$iduser);
		$this->model->update($this->db->dbprefix('users'),$data,$clause);
		$email_config = Array
				(
				  // deretan baris konfigurasi email library tambahkan ini :
				  'mailtype' => 'html'
				);	
				$this->load->library('email',$email_config);
				$this->email->set_newline("\r\n");
				$this->email->from($emailweb, "Admin Codume");
				$this->email->to($this->input->post('email'));  
				$this->email->subject("Acount Info");
				$this->email->message("Halo ".$this->input->post('fullname').",\n this is your username and password \n"."\n\nUsername : ".$this->input->post('username')."\n\nPassword:".$this->input->post('password')."\n\Admin, do not reply this email, thanks.");
				$this->email->send();
		$this->session->set_flashdata('msg_success',lang('edit_success'));			
		redirect(site_url('users/instructors'));
	}

	public function updateeducation()
    {
		$ideducation=$this->input->post('ideducation');
		$data=array(
		'level'=>$this->input->post('level'),
		'field_of_study'=>$this->input->post('field_of_study'),
		'college'=>$this->input->post('college'),
		'city'=>$this->input->post('city'),
		'country'=>$this->input->post('country'),
		'graduation_year'=>$this->input->post('graduation_year')
		);
		$clause=array('ideducation'=>$ideducation);
		$this->model->update($this->db->dbprefix('education'),$data,$clause);
		$this->session->set_flashdata('msg_success',lang('edit_success'));		
		redirect(site_url('users/educationinstructors/'.$this->input->post('iduser')));
	}
	
	function deleteusers()
    {
        $iduser=$this->input->post('iduser');
		$this->db->where('iduser', $iduser);
        $this->db->delete($this->db->dbprefix('users'));
        $this->session->set_flashdata('msg_success',lang('delete_success'));			
		redirect(site_url('users'));
	}
	
	function deleteeducation()
    {
        $ideducation=$this->input->post('ideducation');
		$iduser=$this->input->post('iduser');
		$this->db->where('ideducation', $ideducation);
        $this->db->delete($this->db->dbprefix('education'));
        $this->session->set_flashdata('msg_success',lang('delete_success'));			
		redirect(site_url('users/educationinstructors/'.$iduser));
    }
	
}
?>