<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpanel extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->helper(array('form','url'));
		$this->load->helper('text');
		$this->load->model('model_login');
		$this->load->model('model');
		$this->lang->load('text_lang', 'indonesia');
		$this->load->library(array('form_validation','Recaptcha'));
		
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
		$data['content'] = 'adminpanel/content';
		$this->load->view('admin/adminpanel',$data);
	}
	
	public function loginprocess()
	{
		$language = 'indonesia';
		$recaptcha = $this->input->post('recaptcha');
		$response = $this->recaptcha->verifyResponse($recaptcha);
		$this->load->library('user_agent');
		$email=$this->input->post('email');
		$password=md5($this->input->post('password'));
		
		$this->load->model('model_login','',TRUE);
		$cekdata=$this->model_login->ceklogin($this->db->dbprefix('users'),$email,$password,'1','1');
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
			redirect(site_url('adminpanel'));
		}	
	}
	
}
