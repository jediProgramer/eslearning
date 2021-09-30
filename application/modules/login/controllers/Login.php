<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->helper(array('form','url'));
		$this->load->helper('text');
		$this->load->model('model_login');
		$this->load->model('model');
		$this->load->library(array('form_validation','Recaptcha'));
		$this->lang->load('text_lang', 'indonesia');
	}
	
	public function index()
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
		$data['menu'] = "login";
		$data['menutitle'] = lang('login');
		$data['idlanguage'] = $rowlanguage->idlanguage;
		$data['databannerberanda']=$this->model->ambildata($this->db->dbprefix('bannerberanda'));
		$data['captcha']=$this->recaptcha->getWidget();
		$data['script_captcha']=$this->recaptcha->getScriptTag();
		$data['content'] = 'login/content';
		$data['meta'] = 'login/meta';
		$data['css'] = 'login/css';
		$data['javascript'] = 'login/js';
		$this->load->view('home/home',$data);
	}
	
	public function loginprocess()
	{
		$recaptcha = $this->input->post('recaptcha');
		$response = $this->recaptcha->verifyResponse($recaptcha);
		$language = 'indonesia';
		$this->load->library('user_agent');
		$email=$this->input->post('email');
		$password=md5($this->input->post('password'));
		
		$this->load->model('model_login','',TRUE);
		$cekdata=$this->model_login->ceklogin($this->db->dbprefix('users'),$email,$password,'6','1');
		
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
			if($cekdata)
			{
				foreach ($cekdata as $datalogin)
				{
					$iduser=$datalogin['iduser'];
					$fullname=$datalogin['fullname'];
					$email=$datalogin['email'];
					$roles=$datalogin['roles'];
					$username=$datalogin['username'];
					$profilepicture=$datalogin['profilepicture'];
				}
				
				$dlogin=array(
					'iduser'=>$iduser,
					'fullname'=>$fullname,
					'roles'=>$roles,
					'email'=>$email,
					'username'=>$username,
					'profilepicture'=>$profilepicture,
					'language'=>$language,
					'session_id'=>date('YmdHis'),				
					'login_time'=>date('YmdHis'),
					'logged_in'=>true,
					'last_act_time'=>date('YmdHis')
				);
				
				$this->user_logs=array(
					'iduser'=>$iduser,					
					'username'=>$username,					
					'session_id'=>date('YmdHis'),
					'browser'=>$this->agent->browser(),
					'log_addr'=>$this->input->ip_address(),					
					'login_time'=>date('YmdHis'),
					'last_act_time'=>date('YmdHis')
				);
				$this->model->simpandata($this->db->dbprefix('userlogs'),$this->user_logs);
				$clause=array('iduser'=>$iduser);
				$data=array(
					'login'=>'1'
				);
				$this->model->update($this->db->dbprefix('users'),$data,$clause);
				$this->session->set_userdata($dlogin);
				
				$msg=array(	
					'msg'=>'true',
					'roles'=>$roles,
					'msg_success'=>lang('success_message_login')
				);
				echo json_encode($msg);
			}
			else
			{
				$msg=array(	
					'msg'=>'false',
					'msg_error'=>lang('error_message_login')
				);
				echo json_encode($msg);
			}	
		}
	}
	
	public function logout()
	{
		$iduser=$this->session->userdata('iduser');
		$clause=array('iduser'=>$iduser);
		$data=array(
			'login'=>'0'
		);
		$this->model->update($this->db->dbprefix('users'),$data,$clause);
		
		$dlogin=array(
					'iduser'=>'',
					'fullname'=>'',
					'roles'=>'',
					'email'=>'',
					'username'=>'',
					'profilepicture'=>'',
					'session_id'=>'',				
					'login_time'=>'',
					'logged_in'=>false,
					'last_act_time'=>''
				);
		$session_id=$this->session->userdata('session_id');
		$data=array('logout_time'=>date('YmdHis'),'session_id'=>$session_id);
		$clause=array('session_id'=>$session_id);
		if($this->model->update($this->db->dbprefix('userlogs'),$data,$clause))
		{		
			$this->session->unset_userdata($dlogin);
			$this->session->sess_destroy();		
			redirect(site_url('home'));
		}	
	}
	
	public function forgotpassword()
	{
		$language = 'indonesia';
		$recaptcha = $this->input->post('recaptcha');
		$response = $this->recaptcha->verifyResponse($recaptcha);
		
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
		$data['menu'] = "login/forgotpassword";
		$data['menutitle'] = lang('forgot_password');
		$data['captcha']=$this->recaptcha->getWidget();
		$data['script_captcha']=$this->recaptcha->getScriptTag();
		$data['idlanguage'] = $rowlanguage->idlanguage;
		$data['databannerberanda']=$this->model->ambildata($this->db->dbprefix('bannerberanda'));
		$data['content'] = 'login/forgotpassword';
		$data['meta'] = 'login/meta';
		$data['css'] = 'login/css';
		$data['javascript'] = 'login/js';
		$this->load->view('home/home',$data);
	}
	
	public function forgotpwdsend()
    {
		$language = 'indonesia';
		$recaptcha = $this->input->post('recaptcha');
		$response = $this->recaptcha->verifyResponse($recaptcha);
		
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
			
			if($emailtotal=="1")
			{
				$queryiduser = $this->db->query("SELECT iduser FROM `".$this->db->dbprefix('users')."` WHERE email='".$this->input->post('email')."'");
				$rowiduser = $queryiduser->row();
				$iduser = $rowiduser->iduser;	
					
				$emailweb="admin@erlanggastudio.com";
				$admin="Admin Erlangga Studio";
				$subject="Atur Ulang Kata Sandi Akun Erlangga Studio";
				$message="Klik Link berikut untuk atur ulang katasandi Anda ".base_url()."login/resetpassword/".$iduser."\n, jangan balas email ini.";
				
				
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
				
				$msg=array(	
					'msg'=>'true',
					'msg_success'=>lang('success_message_forgotpwd')
				);	
				echo json_encode($msg);
			}	
			else
			{	
				$msg=array(	
					'msg'=>'false',
					'msg_error'=>lang('error_message_forgotpwd')
				);
				echo json_encode($msg);
			}
		}
	}

	public function resetpassword($iduser)
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
		$data['iduser'] = $iduser;
		$data['menu'] = "login/resetpassword";
		$data['menutitle'] = lang('reset_password');
		$data['captcha']=$this->recaptcha->getWidget();
		$data['script_captcha']=$this->recaptcha->getScriptTag();
		$data['idlanguage'] = $rowlanguage->idlanguage;
		$data['databannerberanda']=$this->model->ambildata($this->db->dbprefix('bannerberanda'));
		$data['content'] = 'login/resetpassword';
		$data['meta'] = 'login/meta';
		$data['css'] = 'login/css';
		$data['javascript'] = 'login/js';
		$this->load->view('home/home',$data);
	}	
	
	public function saveresetpassword()
	{
		$iduser = $this->input->post('iduser');
		$recaptcha = $this->input->post('recaptcha');
		$response = $this->recaptcha->verifyResponse($recaptcha);
		
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
			$data=array(	
				'password'=>md5($this->input->post('password'))
			);
			$clause=array('iduser'=>$iduser);
			$this->model->update($this->db->dbprefix('users'),$data,$clause);
			$msg=array(	
					'msg'=>'true',
					'msg_success'=>lang('success_message_resetpwd')
			);	
			echo json_encode($msg);
		}
	}
	
}
