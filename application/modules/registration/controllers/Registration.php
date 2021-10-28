<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Registration extends CI_Controller {
 
    function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper(array('form','url'));
		$this->load->helper('text');
		$this->load->model('model');
		// Load default language
		$this->lang->load('text_lang', 'indonesia');
		$this->load->library(array('form_validation','Recaptcha'));
	}
	
	public function index()
    {
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in) {

			$data['logged_in'] = "false";
		}
		else
		{
			$data['logged_in'] = $logged_in;
		}
		$data['menu'] = "registration";
		$data['idlanguage'] = "1";
		$data['menutitle'] = lang('register');
		$data['databannerberanda']=$this->model->ambildata($this->db->dbprefix('bannerberanda'));
		$data['captcha']=$this->recaptcha->getWidget();
		$data['script_captcha']=$this->recaptcha->getScriptTag();
		$data['content'] = 'registration/content';
		$data['meta'] = 'registration/meta';
		$data['css'] = 'registration/css';
		$data['javascript'] = 'registration/js';
		$this->load->view('edumy/edumy',$data);
	}
	
	public function saveusers()
    {
		$language = $this->session->userdata('language');
		$recaptcha = $this->input->post('recaptcha');
		$response = $this->recaptcha->verifyResponse($recaptcha);
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		$idlanguage = $rowlanguage->idlanguage;
		$tgl=date('y-m-d');
		$pieces= explode("-",$tgl);
		$rand = substr(md5(microtime()),rand(0,26),5);
		$iduser="u".$pieces[0].$pieces[1].$rand;
		$data=array(	
			'iduser'=>$iduser,
			'fullname'=>$this->input->post('fullname'),
			'username'=>$this->input->post('username'),
			'password'=>md5($this->input->post('password')),
			'email'=>$this->input->post('email'),
			'roles'=>'6',
			'date'=>date('Y-m-d')
		);
			
		// Cek Recaptha
		if(!isset($response['success']) || $response['success'] <> true)
		{
			$msg=array(	
					'msg'=>'false',
					'msg_error'=>lang('error_message_recaptcha')
				);
			echo json_encode($msg);
		}
		else
		{
			$querycekemail = $this->db->query("SELECT COUNT(*) AS emailtotal FROM `".$this->db->dbprefix('users')."` WHERE email='".$this->input->post('email')."'");
			$rowcekemail = $querycekemail->row();
			$emailtotal = $rowcekemail->emailtotal;	
			
			if($emailtotal>="1")
			{
				$msg=array(	
					'msg'=>'false',
					'msg_error'=>lang('error_message_registration_email')
				);
				echo json_encode($msg);
			}	
			else
			{	
				$emailweb="admin@erlanggastudio.com";
				$admin="Admin Erlangga Studio";
				$subject="Aktivasi Akun Learning Erlangga Studio";
				$message="Klik Link berikut untuk mengkatifkan akun Anda ".base_url()."registration/activation/".$iduser."\n, jangan balas email ini.";
			
				
				$email_config = Array
				(
				  // deretan baris konfigurasi email library tambahkan ini :
				  'mailtype' => 'html'
				);	
				$this->load->library('email',$email_config);
				$this->email->set_newline("\r\n");
				$this->email->from($emailweb, $admin);
				$this->email->to($this->input->post('email'));  
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->send();
				
				$data=$this->model->save_db_json($this->db->dbprefix('users'),$data);
				$msg=array(	
					'msg'=>'true',
					'msg_success'=>lang('success_message_registration')
				);	
				echo json_encode($msg);
			}
		}
	}	
	
	public function activation($iduser)
	{
		$language = 'indonesia';
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in) {

			$data['logged_in'] = "false";
		}
		else
		{
			$data['logged_in'] = $logged_in;
		}
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		$iduser = $iduser;
		$data['menu'] = "registration/activation";
		$data['menutitle'] = lang('activation');
		$data['idlanguage'] = $rowlanguage->idlanguage;
		$data['script_captcha']=$this->recaptcha->getScriptTag();
		$data['databannerberanda']=$this->model->ambildata($this->db->dbprefix('bannerberanda'));
		$data['content'] = 'registration/activation';
		$data['meta'] = 'registration/meta';
		$data['css'] = 'registration/css';
		$data['javascript'] = 'registration/js';
		$this->load->view('edumy/edumy',$data);
		
		$data=array(	
			'active'=>'1'
		);
		$clause=array('iduser'=> $iduser);
		$this->model->update($this->db->dbprefix('users'),$data,$clause);
	}
	
	public function emailupdate($iduser)
	{
		$iduser = $iduser;
		$language = 'indonesia';
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in) {

			$data['logged_in'] = "false";
		}
		else
		{
			$data['logged_in'] = $logged_in;
			$data['idusers'] = $this->session->userdata('iduser');
			$data['fullname'] = $this->session->userdata('fullname');
			$data['roles'] = $this->session->userdata('roles');
			$data['email'] = $this->session->userdata('email');
			$data['username'] = $this->session->userdata('username');
			$data['profilepicture'] = $this->session->userdata('profilepicture');
		}
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		
		$queryemailtemp= $this->db->query("SELECT email FROM `".$this->db->dbprefix('emailtemp')."` WHERE iduser='".$iduser."'");
		$rowemailtemp = $queryemailtemp->row();
		$newemail = $rowemailtemp->email;
		
		$data['menu'] = "registration/emailupdate";
		$data['menutitle'] = lang('emailupdate');
		$data['script_captcha']=$this->recaptcha->getScriptTag();
		$data['idlanguage'] = $rowlanguage->idlanguage;
		$data['databannerberanda']=$this->model->ambildata($this->db->dbprefix('bannerberanda'));
		$data['content'] = 'registration/emailupdate';
		$data['meta'] = 'registration/meta';
		$data['css'] = 'registration/css';
		$data['javascript'] = 'registration/js';
		$this->load->view('edumy/edumy',$data);
		
		$data=array(	
			'email'=>$newemail
		);
		$clause=array('iduser'=> $iduser);
		$this->model->update($this->db->dbprefix('users'),$data,$clause);
	}
	
}
?>