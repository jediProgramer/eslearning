<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Academy extends CI_Controller {
 
    function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url('login'));
		}
		$language = $this->session->userdata('language');
		$this->session->set_userdata('language','indonesia');
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper(array('form','url'));
		$this->load->helper('text');
		$this->load->model('model');
		$this->load->library('pdf');
		// Load default language
		$language = $this->session->userdata('language');
		$this->lang->load('text_lang', $language);
	}
	
	function day($bulan,$idlanguage)
	{
		if($idlanguage=="1")
		{
			if($bulan=="01"){$dayname="Januari";}
			else if($bulan=="02"){$dayname="Februari";}
			else if($bulan=="03"){$dayname="Maret";}
			else if($bulan=="04"){$dayname="April";}
			else if($bulan=="05"){$dayname="Mei";}
			else if($bulan=="06"){$dayname="Juni";}
			else if($bulan=="07"){$dayname="Juli";}
			else if($bulan=="08"){$dayname="Agustus";}
			else if($bulan=="09"){$dayname="September";}
			else if($bulan=="10"){$dayname="Okttober";}
			else if($bulan=="11"){$dayname="November";}
			else if($bulan=="12"){$dayname="Desember";}
		}
		else if($idlanguage=="2")
		{
			if($bulan=="01"){$dayname="January";}
			else if($bulan=="02"){$dayname="February";}
			else if($bulan=="03"){$dayname="March";}
			else if($bulan=="04"){$dayname="April";}
			else if($bulan=="05"){$dayname="May";}
			else if($bulan=="06"){$dayname="June";}
			else if($bulan=="07"){$dayname="July";}
			else if($bulan=="08"){$dayname="August";}
			else if($bulan=="09"){$dayname="September";}
			else if($bulan=="10"){$dayname="Okttober";}
			else if($bulan=="11"){$dayname="November";}
			else if($bulan=="12"){$dayname="December";}
		}		
		$day=$dayname;
		return $day;
	}
	
	function stringreplacemoney($uang)
	{
		$str = preg_replace('/\./', '', $uang);	
		return $str;
	}
	
	function money($nilai, $pecahan = 0) 
	{
		return number_format($nilai, $pecahan, ',', '.');
	}
	
	public function dashboard()
    {
		$language = $this->session->userdata('language');
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in) {

			$data['logged_in'] = "false";
		}
		else
		{
			$data['logged_in'] = $logged_in;
		}
		$data['menu'] = "academy/dashboard";
		$data['idusers'] = $this->session->userdata('iduser');
		$data['fullname'] = $this->session->userdata('fullname');
		$data['roles'] = $this->session->userdata('roles');
		$data['email'] = $this->session->userdata('email');
		$data['username'] = $this->session->userdata('username');
		$data['profilepicture'] = $this->session->userdata('profilepicture');
		$data['menutitle'] = lang('academy_dashboard');
		$data['idlanguage'] = $rowlanguage->idlanguage;
		$data['data']=$this->model->ambildataById($this->db->dbprefix('enroll'),'iduser',$data['idusers']);
		$data['content'] = 'academy/content';
		$data['meta'] = 'academy/meta';
		$data['css'] = 'academy/css';
		$data['javascript'] = 'academy/js';
		$this->load->view('edumy/edumy',$data);
    }
	
	public function updateprofile()
    {
		$language = $this->session->userdata('language');
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in) {

			$data['logged_in'] = "false";
		}
		else
		{
			$data['logged_in'] = $logged_in;
		}
		$data['menu'] = "academy/updateprofile";
		$data['idusers'] = $this->session->userdata('iduser');
		$data['fullname'] = $this->session->userdata('fullname');
		$data['roles'] = $this->session->userdata('roles');
		$data['email'] = $this->session->userdata('email');
		$data['username'] = $this->session->userdata('username');
		$data['profilepicture'] = $this->session->userdata('profilepicture');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['idusers']);
		$data['datacountries']=$this->model->selectbox($this->db->dbprefix('countries'),'id');
		$data['menutitle'] = lang('edit_profile');
		$data['idlanguage'] = $rowlanguage->idlanguage;
		$data['content'] = 'academy/updateprofile';
		$data['profilepictureform'] = 'academy/profilepicture';
		$data['profileaccountform'] = 'academy/profileaccount';
		$data['profilepasswordform'] = 'academy/profilepassword';
		$data['profileemailform'] = 'academy/profileemail';
		$data['meta'] = 'academy/meta';
		$data['css'] = 'academy/css';
		$data['javascript'] = 'academy/js';
		$this->load->view('edumy/edumy',$data);
    }
	
	public function order()
    {
		$language = $this->session->userdata('language');
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in) {

			$data['logged_in'] = "false";
		}
		else
		{
			$data['logged_in'] = $logged_in;
		}
		$data['menu'] = "academy/order";
		$data['idusers'] = $this->session->userdata('iduser');
		$data['fullname'] = $this->session->userdata('fullname');
		$data['roles'] = $this->session->userdata('roles');
		$data['email'] = $this->session->userdata('email');
		$data['username'] = $this->session->userdata('username');
		$data['profilepicture'] = $this->session->userdata('profilepicture');
		$data['menutitle'] = lang('my_order');
		$data['idlanguage'] = $rowlanguage->idlanguage;
		$data['dataorder']=$this->model->ambildataById($this->db->dbprefix('order'),'iduser',$data['idusers']);
		$data['databank']=$this->model->ambildata($this->db->dbprefix('bank'));
		$data['dataaccountbank']=$this->model->ambildata($this->db->dbprefix('accountbank'));
		$data['content'] = 'academy/order';
		$data['meta'] = 'academy/meta';
		$data['css'] = 'academy/css';
		$data['javascript'] = 'academy/js';
		$this->load->view('edumy/edumy',$data);
    }
	
	public function payment()
    {
		$language = $this->session->userdata('language');
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in) {

			$data['logged_in'] = "false";
		}
		else
		{
			$data['logged_in'] = $logged_in;
		}
		$data['menu'] = "academy/payment";
		$data['idusers'] = $this->session->userdata('iduser');
		$data['fullname'] = $this->session->userdata('fullname');
		$data['roles'] = $this->session->userdata('roles');
		$data['email'] = $this->session->userdata('email');
		$data['username'] = $this->session->userdata('username');
		$data['profilepicture'] = $this->session->userdata('profilepicture');
		$data['menutitle'] = lang('payment');
		$data['idlanguage'] = $rowlanguage->idlanguage;
		$data['dataorder']=$this->model->ambildataByIdStatus($this->db->dbprefix('order'),'iduser',$data['idusers'],'status','3');
		$data['databank']=$this->model->ambildata($this->db->dbprefix('bank'));
		$data['dataaccountbank']=$this->model->ambildata($this->db->dbprefix('accountbank'));
		$data['content'] = 'academy/payment';
		$data['meta'] = 'academy/meta';
		$data['css'] = 'academy/css';
		$data['javascript'] = 'academy/js';
		$this->load->view('edumy/edumy',$data);
    }
	
	public function mycourses()
    {
		$language = $this->session->userdata('language');
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in) {

			$data['logged_in'] = "false";
		}
		else
		{
			$data['logged_in'] = $logged_in;
		}
		$data['menu'] = "academy/mycourses";
		$data['idusers'] = $this->session->userdata('iduser');
		$data['fullname'] = $this->session->userdata('fullname');
		$data['roles'] = $this->session->userdata('roles');
		$data['email'] = $this->session->userdata('email');
		$data['username'] = $this->session->userdata('username');
		$data['profilepicture'] = $this->session->userdata('profilepicture');
		$data['menutitle'] = lang('my_courses');
		$data['idlanguage'] = $rowlanguage->idlanguage;
		$data['data']=$this->model->ambildataById($this->db->dbprefix('enroll'),'iduser',$data['idusers']);
		$data['content'] = 'academy/mycourses';
		$data['meta'] = 'academy/meta';
		$data['css'] = 'academy/css';
		$data['javascript'] = 'academy/js';
		$this->load->view('edumy/edumy',$data);
    }
	
	public function myfavorite()
    {
		$language = $this->session->userdata('language');
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in) {

			$data['logged_in'] = "false";
		}
		else
		{
			$data['logged_in'] = $logged_in;
		}
		$data['menu'] = "academy/myfavorite";
		$data['idusers'] = $this->session->userdata('iduser');
		$data['fullname'] = $this->session->userdata('fullname');
		$data['roles'] = $this->session->userdata('roles');
		$data['email'] = $this->session->userdata('email');
		$data['username'] = $this->session->userdata('username');
		$data['profilepicture'] = $this->session->userdata('profilepicture');
		$data['menutitle'] = lang('my_favorite');
		$data['idlanguage'] = $rowlanguage->idlanguage;
		$data['data']=$this->model->ambildataById($this->db->dbprefix('favorite'),'iduser',$data['idusers']);
		$data['content'] = 'academy/favorite';
		$data['meta'] = 'academy/meta';
		$data['css'] = 'academy/css';
		$data['javascript'] = 'academy/js';
		$this->load->view('edumy/edumy',$data);
    }
	
	public function confirm($idorder)
    {
		$language = $this->session->userdata('language');
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in) {

			$data['logged_in'] = "false";
		}
		else
		{
			$data['logged_in'] = $logged_in;
		}
		$data['menu'] = "academy/confirm/".$idorder;
		$data['idusers'] = $this->session->userdata('iduser');
		$data['fullname'] = $this->session->userdata('fullname');
		$data['roles'] = $this->session->userdata('roles');
		$data['email'] = $this->session->userdata('email');
		$data['username'] = $this->session->userdata('username');
		$data['profilepicture'] = $this->session->userdata('profilepicture');
		$data['menutitle'] = lang('confirmation');
		$data['idlanguage'] = $rowlanguage->idlanguage;
		$data['idorder'] = $idorder;
		$data['dataorder']=$this->model->ambildataById($this->db->dbprefix('order'),'idorder',$idorder);
		$data['databank']=$this->model->ambildata($this->db->dbprefix('bank'));
		$data['dataaccountbank']=$this->model->ambildata($this->db->dbprefix('accountbank'));
		$data['content'] = 'academy/confirm';
		$data['meta'] = 'academy/meta';
		$data['css'] = 'academy/css';
		$data['javascript'] = 'academy/js';
		$this->load->view('edumy/edumy',$data);
    }
	
	public function savesprofilepicture()
    {
		$iduser = $this->session->userdata('iduser');
		
		$config['upload_path'] = './assets/files/users/';
		$config['allowed_types'] = 'png|jpg';
		$config['max_size'] = '20480';
		$image = $_FILES['image']['name'];
		$path="./assets/files/courses/";
		$this->load->library('upload', $config);
			
		if (!$this->upload->do_upload('image'))
		{
			$msg=array(	
				'msg'=>'false',
				'msg_error'=>lang('error_message_profilepicture')
			);
			echo json_encode($msg);
		}
		else
		{	
			$queryimg = $this->db->query("SELECT profilepicture FROM `".$this->db->dbprefix('users')."` WHERE iduser='".$iduser."'");
			$row = $queryimg->row();
			if($row->profilepicture!="")
			{
				$picturepath="./assets/files/users/".$row->profilepicture;	
				unlink($picturepath);
			}
			
			$data=array(	
			'profilepicture'=>$image
			);
		}	
		$clause=array('iduser'=>$iduser);
		$this->model->update($this->db->dbprefix('users'),$data,$clause);
		$msg=array(	
				'msg'=>'true',
				'msg_success'=>lang('success_message_profilepicture')
		);	
		echo json_encode($msg);
	}
	
	public function saveusersprofile()
    {
		$iduser = $this->session->userdata('iduser');
		$data=array(		
				'fullname'=>$this->input->post('fullname'),
				'username'=>$this->input->post('username'),
				'phoneno'=>$this->input->post('phoneno'),
				'jobs'=>$this->input->post('jobs'),
				'institution'=>$this->input->post('institution'),
				'profile'=>$this->input->post('profile'),
				'country'=>$this->input->post('country')
			);
		$clause=array('iduser'=>$iduser);
		$this->model->update($this->db->dbprefix('users'),$data,$clause);
		$msg=array(	
				'msg'=>'true',
				'msg_success'=>lang('success_message_profileaccount')
		);	
		echo json_encode($msg);
	}
	
	public function saveuserspassword()
    {
		$iduser = $this->session->userdata('iduser');
		
		$queryoldpwd = $this->db->query("SELECT password FROM `".$this->db->dbprefix('users')."` WHERE iduser ='".$iduser."' ");
		$rowoldpwd = $queryoldpwd->row();
		$oldpwd = $rowoldpwd->password;
		
		$queryecekpwd = $this->db->query("SELECT COUNT(*) AS pwdtotal FROM `".$this->db->dbprefix('users')."` WHERE iduser ='".$iduser."' AND password='".md5($this->input->post('new_password'))."'");
		$rowcekpwd = $queryecekpwd->row();
		$pwdtotal = $rowcekpwd->pwdtotal;	
		
		
		if($oldpwd<>md5($this->input->post('old_password')))
		{
			$msg=array(	
				'msg'=>'false',
				'msg_error'=>lang('error_message_oldpwd')
			);
			echo json_encode($msg);
		}
		else if($pwdtotal>="1")
		{
			$msg=array(	
				'msg'=>'false',
				'msg_error'=>lang('error_message_profilepwd')
			);
			echo json_encode($msg);
		}	
		else
		{	
			$data=array(		
					'password'=>md5($this->input->post('new_password'))
				);
			$clause=array('iduser'=>$iduser);
			$this->model->update($this->db->dbprefix('users'),$data,$clause);
			$msg=array(	
					'msg'=>'true',
					'msg_success'=>lang('success_message_profilepwd')
			);	
			echo json_encode($msg);
		}
	}
	
	public function saveusersemail()
    {
		$iduser = $this->session->userdata('iduser');
		$language = $this->session->userdata('language');
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		$idlanguage = $rowlanguage->idlanguage;
		
		$queryemailnew = $this->db->query("SELECT COUNT(*) AS emailnew FROM `".$this->db->dbprefix('emailtemp')."` WHERE iduser ='".$iduser."' ");
		$rowemailnew = $queryemailnew->row();
		$emailnew= $rowemailnew->emailnew;
		
		$queryemailold = $this->db->query("SELECT COUNT(*) AS emailold FROM `".$this->db->dbprefix('users')."` WHERE iduser ='".$iduser."' AND email='".$this->input->post('email_new')."'");
		$rowemailold = $queryemailold->row();
		$emailold = $rowemailold->emailold;	
		
		
		if($emailnew>="1")
		{
			$msg=array(	
				'msg'=>'false',
				'msg_error'=>lang('error_message_oldemail')
			);
			echo json_encode($msg);
		}
		else if($emailold>="1")
		{
			$msg=array(	
				'msg'=>'false',
				'msg_error'=>lang('error_message_profileemail')
			);
			echo json_encode($msg);
		}	
		else
		{	
			$emailweb="admin@eslearning.com";
			$admin="Admin Erlangga Studio";
			$subject="Aktivasi Pembaharuan Email Akun Erlangga Studio";
			$message="Klik Link berikut untuk memperbaharui Email Anda ".base_url()."registration/emailupdate/".$iduser."\n, jangan balas email ini.";
			
			
			$email_config = Array
			(
			  // deretan baris konfigurasi email library tambahkan ini :
			  'mailtype' => 'html'
			);	
			$this->load->library('email',$email_config);
			$this->email->set_newline("\r\n");
			$this->email->from($emailweb, $admin);
			$this->email->to($this->input->post('email_new'));  
			$this->email->subject($subject);
			$this->email->message($message);
			$this->email->send();
				
			
			$data=array(	
					'iduser'=>$iduser,
					'email'=>$this->input->post('email_new')
				);
			$this->model->simpandata($this->db->dbprefix('emailtemp'),$data);
			$msg=array(	
					'msg'=>'true',
					'msg_success'=>lang('success_message_profileemail')
			);	
			echo json_encode($msg);
		}
	}
	
	public function savesconfirm()
    {
		$iduser = $this->session->userdata('iduser');
		$idorder=$this->input->post('idorder');
		$sendingbank=$this->input->post('bank');
		$sendingaccountname=$this->input->post('accountname');
		$sendingaccountnumber=$this->input->post('accountnumber');
		$accountbank=$this->input->post('accountbank');
		$amount_payment=$this->input->post('amount_payment');
		
		if($amount_payment=="0"){$payment_money=0;}else if($amount_payment==""){$payment_money=0;}else{$payment_money=$this->stringreplacemoney($amount_payment);}
		
		$config['upload_path'] = './assets/files/paymentproof/';
		$config['allowed_types'] = 'png|jpg|pdf';
		$config['max_size'] = '20480';
		$files = $_FILES['files']['name'];
		$path="./assets/files/courses/";
		$this->load->library('upload', $config);
			
		if (!$this->upload->do_upload('files'))
		{
			$msg=array(	
				'msg'=>'false',
				'msg_error'=>lang('error_message_files')
			);
			echo json_encode($msg);
		}
		else
		{	
			$queryfile = $this->db->query("SELECT file FROM `".$this->db->dbprefix('order')."` WHERE idorder='".$idorder."'");
			$rowfile = $queryfile->row();
			if($rowfile->file!="")
			{
				$filespath="./assets/files/paymentproof/".$rowfile->file;	
				unlink($filespath);
			}
			
			$data=array(
			'sendingbank'=>$sendingbank,
			'sendingaccountnumber'=>$sendingaccountnumber,	
			'sendingaccountname'=>$sendingaccountname,
			'accountbank'=>$accountbank,
			'amountpayment'=>$payment_money,
			'status'=>'2',
			'datepayment'=>date('Y-m-d'),
			'file'=>$files
			);
			
			$clause=array('idorder'=>$idorder);
			$this->model->update($this->db->dbprefix('order'),$data,$clause);
			$msg=array(	
					'msg'=>'true',
					'msg_success'=>lang('success_message_files')
			);	
			echo json_encode($msg);
		}
	}
	
	public function invoiceprint($idorder)
    {
		$language = $this->session->userdata('language');
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		$idlanguage= $rowlanguage->idlanguage;
		
		$queryccn = $this->db->query("SELECT COUNT(*) AS total FROM `".$this->db->dbprefix('courses')."` WHERE idlanguage='".$rowlanguage->idlanguage."'");
		$rowccn = $queryccn->row();
		$totalcourses=$rowccn->total;
		if($totalcourses=="0")
		{
			redirect(base_url('home'));
		}	
		
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in) {

			$data['logged_in'] = "false";
		}
		else
		{
			$data['logged_in'] = $logged_in;
		}
		
		
		$data['idorder']=$idorder;
		
		$querorder = $this->db->query("SELECT * FROM `".$this->db->dbprefix('order')."` WHERE idorder='".$data['idorder']."'");
		$rowod = $querorder->row();
		$idcourses=$rowod->idcourses;
		
		$querycourses = $this->db->query("SELECT * FROM `".$this->db->dbprefix('courses')."` WHERE idcourses =".$idcourses."");
		$rowcorses = $querycourses->row();
		$title=$rowcorses->title;
		$price=$rowcorses->price;
		
		$querywc= $this->db->query("SELECT * FROM `".$this->db->dbprefix('webcontact')."`");
		$rowwc = $querywc->row();
		$email=$rowwc->email;
		$phonenumber=$rowwc->phonenumber;
		$address=$rowwc->address;
		
		$split=explode('-',$rowod->date);
		$tahun=$split[0];
		$bulan=$split[1];
		$tgl=$split[2];
		$bulanind=$this->day($bulan,$idlanguage);	
		
		$data['menu'] = "academy/invoiceprint/".$idorder;
		$data['idusers'] = $this->session->userdata('iduser');
		$data['fullname'] = $this->session->userdata('fullname');
		$data['roles'] = $this->session->userdata('roles');
		$data['email'] = $this->session->userdata('email');
		$data['username'] = $this->session->userdata('username');
		$data['profilepicture'] = $this->session->userdata('profilepicture');
		$data['menutitle'] = lang('invoice');
		$data['coursestitle'] = $title;
		
		$fullname = $this->session->userdata('fullname');

		$i = $idorder;
		$stri = (string)$i;
		$j = $stri[2];
		$k = $stri[3];
		$l = $stri[4];
		$money_digit = $j.$k.$l;
		$tax = 0.1 * $price;
		
		$grandtotal = $price + $tax + $money_digit;

		$html_content ="<!DOCTYPE html>
			<html lang='en'>
			  <head>
				<meta charset='utf-8'>
				<title>".lang('invoice')." - #".$idorder."</title>
				<!-- Google Font -->
				<link href='https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap' rel='stylesheet'>  
			  </head>
			  <body>
				  <div id='logo'>
					<img src='http://localhost/eslearning/assets/eslearning/img/eslogo.png' >
				  </div>
				  <h1>".lang('invoice')." - #".$idorder."</h1>
				  <table>
				  <thead>
				  <tr>
				  <td valign='top' class='invoice'>
					<b>".lang('invoice')."</b><br/>
					".lang('invoice_date')." : ".$tgl." ".$bulanind." ".$tahun."<br/>
					".lang('invoice_duedate')." : ".$tgl." ".$bulanind." ".$tahun.", ".lang('exp_invoice')." </br>
				  </td>
				  <td valign='top' class='company'>
				  <b>Erlangga Studio</b><br/>
					".$address."<br/>
					".$phonenumber."</br>
					".$email."<br/>
				  </td>";
					
					$query_ab = $this->db->query("SELECT * FROM ".$this->db->dbprefix('accountbank')."");
					$data_ab=$query_ab->result(); 
					foreach ($data_ab as $dab)
					{
				  $html_content .="<td valign='top' class='bank'>
					<b>".$dab->bank."</b><br/>
					".$dab->accountname."<br/>
					".$dab->accountnumber."<br/>
					</td>";
					}
				$html_content .="</tr>
				  </thead>
				  </table>
				  <table>
					<thead>
					  <tr>
						<th class='service'>".lang('service')."</th>
						<th class='desc'>".lang('courses')."</th>
						<th>".lang('price')."</th>
						<th>".lang('qty')."</th>
						<th>".lang('total')."</th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td class='service'>".lang('courses')."</td>
						<td class='desc'>".$title."</td>
						<td class='unit'>".lang('curency')." ".$this->money($price)."</td>
						<td class='qty'>1</td>
						<td class='total'>".lang('curency')." ".$this->money($price)."</td>
					  </tr>
					  <tr>
						<td colspan='4'>".lang('subtotal')."</td>
						<td class='total'>".lang('curency')." ".$this->money($price)."</td>
					  </tr>
					  <tr>
						<td colspan='4'>".lang('tax')."</td>
						<td class='total'>".lang('curency')." ".$this->money($tax)."</td>
					  </tr>
					  <tr>
						<td colspan='4'>".lang('digit_invoice')."</td>
						<td class='total'>".lang('curency')." ".$this->money($money_digit)."</td>
					  </tr>
					  <tr>
						<td colspan='4' class='grand total'>".lang('grand_total')."</td>
						<td class='grand total'>".lang('curency')." ".$this->money($grandtotal)."</td>
					  </tr>
					</tbody>
				  </table>
				  <div id='notices'>
					<div>".lang('notice').":</div>
					<div class='notice'>".lang('notice_warning').".</div>
				  </div>
				<footer>
				  ".lang('footer_invoice').".
				</footer>
				<style>
				.clearfix:after {
				  content: '';
				  display: table;
				  clear: both;
				}

				a {
				  color: #5D6975;
				  text-decoration: underline;
				}

				body {
				  margin: 0 auto; 
				  color: #001028;
				  background: #FFFFFF; 
				  font-family: 'Open Sans', sans-serif;
				}

				header {
				  padding: 10px 0;
				  margin-bottom: 30px;
				}

				#logo {
				  text-align: center;
				  margin-bottom: 10px;
				}

				#logo img {
				  width: 180px;
				  height: 40px;
				}

				h1 {
				  border-top: 1px solid  #5D6975;
				  border-bottom: 1px solid  #5D6975;
				  color: #ffffff;
				  font-size: 2.4em;
				  font-weight: normal;
				  text-align: center;
				  margin: 0 0 20px 0;
				  background-color: #007bff;
				}

				#bank {
				  line-height: 1.6;
				}

				#bank span {
				  color: #5D6975;
				  text-align: right;
				  width: 52px;
				  margin-right: 10px;
				  display: inline-block;
				  font-size: 0.8em;
				}

				#company {
				  text-align: left;
				  line-height: 1.6;
				}

				#bank div,
				#company div {
				  white-space: nowrap;        
				}

				table {
				  width: 100%;
				  border-collapse: collapse;
				  border-spacing: 0;
				  margin-bottom: 20px;
				}

				table tr:nth-child(2n-1) td {
				  background: #F5F5F5;
				}

				table th,
				table td {
				  text-align: center;
				}

				table th {
				  padding: 5px 20px;
				  color: #5D6975;
				  border-bottom: 1px solid #C1CED9;
				  white-space: nowrap;        
				  font-weight: normal;
				}

				table .service,
				table .desc {
				  text-align: left;
				}
				
				table .invoice {
				  text-align: left;
				  line-height: normal;
				}
				
				table .company {
				  text-align: left;
				  line-height: normal;
				}
				
				table .bank {
				  text-align: right;
				  line-height: normal;
				}

				table td {
				  padding: 20px;
				  text-align: right;
				}

				table td.service,
				table td.desc {
				  vertical-align: top;
				}

				table td.unit,
				table td.qty,
				table td.total {
				  font-size: 1.2em;
				}

				table td.grand {
				  border-top: 1px solid #5D6975;;
				}

				#notices .notice {
				  color: #5D6975;
				  font-size: 1.2em;
				  line-height: 1.6;
				}

				footer {
				  color: #5D6975;
				  width: 100%;
				  height: 30px;
				  position: absolute;
				  bottom: 0;
				  border-top: 1px solid #C1CED9;
				  padding: 8px 0;
				  text-align: center;
				}
				</style>
			  </body>
			</html>";
		
		$this->pdf->set_paper('A4','landscape');
		$this->pdf->load_html($html_content);
		$this->pdf->render();
		$this->pdf->stream(lang('invoice')." - #".$idorder.".pdf", array("Attachment"=>0));
    }
	
	public function receiptprint($idorder)
    {
		$language = $this->session->userdata('language');
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		$idlanguage= $rowlanguage->idlanguage;
		
		$queryccn = $this->db->query("SELECT COUNT(*) AS total FROM `".$this->db->dbprefix('courses')."` WHERE idlanguage='".$rowlanguage->idlanguage."'");
		$rowccn = $queryccn->row();
		$totalcourses=$rowccn->total;
		if($totalcourses=="0")
		{
			redirect(base_url('home'));
		}	
		
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in) {

			$data['logged_in'] = "false";
		}
		else
		{
			$data['logged_in'] = $logged_in;
		}
		
		
		$data['idorder']=$idorder;
		
		$querorder = $this->db->query("SELECT * FROM `".$this->db->dbprefix('order')."` WHERE idorder='".$data['idorder']."' AND status='3'");
		$rowod = $querorder->row();
		$idcourses=$rowod->idcourses;
		if($rowod->status =="1")
		{ 
			$status = lang('unpaid');
		}
		else if($rowod->status =="2")
		{
			$status = lang('in_process');
		}
		if($rowod->status =="3")
		{
			$status = lang('paid');
		}
		
		$querycourses = $this->db->query("SELECT * FROM `".$this->db->dbprefix('courses')."` WHERE idcourses =".$idcourses."");
		$rowcorses = $querycourses->row();
		$title=$rowcorses->title;
		$price=$rowcorses->price;
		
		$querywc= $this->db->query("SELECT * FROM `".$this->db->dbprefix('webcontact')."`");
		$rowwc = $querywc->row();
		$email=$rowwc->email;
		$phonenumber=$rowwc->phonenumber;
		$address=$rowwc->address;
		
		$split=explode('-',$rowod->datepayment);
		$tahun=$split[0];
		$bulan=$split[1];
		$tgl=$split[2];
		$bulanind=$this->day($bulan,$idlanguage);	
		
		$data['menu'] = "academy/invoiceprint/".$idorder;
		$data['idusers'] = $this->session->userdata('iduser');
		$data['fullname'] = $this->session->userdata('fullname');
		$data['roles'] = $this->session->userdata('roles');
		$data['email'] = $this->session->userdata('email');
		$data['username'] = $this->session->userdata('username');
		$data['profilepicture'] = $this->session->userdata('profilepicture');
		$data['menutitle'] = lang('invoice');
		$data['coursestitle'] = $title;
		
		$fullname = $this->session->userdata('fullname');

		$i = $idorder;
		$stri = (string)$i;
		$j = $stri[2];
		$k = $stri[3];
		$l = $stri[4];
		$money_digit = $j.$k.$l;
		$tax = 0.1 * $price;
		
		$grandtotal = $price + $tax + $money_digit;

		$html_content ="<!DOCTYPE html>
			<html lang='en'>
			  <head>
				<meta charset='utf-8'>
				<title>".lang('receipt')." - #".$idorder."</title>
				<!-- Google Font -->
				<link href='https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap' rel='stylesheet'>  
			  </head>
			  <body>
				  <div id='logo'>
					<img src='http://localhost/eslearning/assets/eslearning/img/eslogo.png' >
				  </div>
				  <h1>".lang('receipt')." - #".$idorder."</h1>
				  <table>
				  <thead>
				  <tr>
				  <td valign='top' class='invoice'>
					<b>".lang('receipt')."</b><br/>
					".lang('payment_date')." : ".$tgl." ".$bulanind." ".$tahun."<br/>
					".lang('status')." : ".$status."
				  </td>
				  <td valign='top' class='company'>
				  <b>Erlangga Studio</b><br/>
					".$address."<br/>
					".$phonenumber."</br>
					".$email."<br/>
				  </td></tr>
				  </thead>
				  </table>
				  <table>
					<thead>
					  <tr>
						<th class='service'>".lang('service')."</th>
						<th class='desc'>".lang('courses')."</th>
						<th>".lang('price')."</th>
						<th>".lang('qty')."</th>
						<th>".lang('total')."</th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td class='service'>".lang('courses')."</td>
						<td class='desc'>".$title."</td>
						<td class='unit'>".lang('curency')." ".$this->money($price)."</td>
						<td class='qty'>1</td>
						<td class='total'>".lang('curency')." ".$this->money($price)."</td>
					  </tr>
					  <tr>
						<td colspan='4'>".lang('subtotal')."</td>
						<td class='total'>".lang('curency')." ".$this->money($price)."</td>
					  </tr>
					  <tr>
						<td colspan='4'>".lang('tax')."</td>
						<td class='total'>".lang('curency')." ".$this->money($tax)."</td>
					  </tr>
					  <tr>
						<td colspan='4'>".lang('digit_invoice')."</td>
						<td class='total'>".lang('curency')." ".$this->money($money_digit)."</td>
					  </tr>
					  <tr>
						<td colspan='4' class='grand total'>".lang('grand_total')."</td>
						<td class='grand total'>".lang('curency')." ".$this->money($grandtotal)."</td>
					  </tr>
					</tbody>
				  </table>
				<footer>
				  ".lang('receipt_invoice').".
				</footer>
				<style>
				.clearfix:after {
				  content: '';
				  display: table;
				  clear: both;
				}

				a {
				  color: #5D6975;
				  text-decoration: underline;
				}

				body {
				  margin: 0 auto; 
				  color: #001028;
				  background: #FFFFFF; 
				  font-family: 'Open Sans', sans-serif;
				}

				header {
				  padding: 10px 0;
				  margin-bottom: 30px;
				}

				#logo {
				  text-align: center;
				  margin-bottom: 10px;
				}

				#logo img {
				  width: 180px;
				  height: 40px;
				}

				h1 {
				  border-top: 1px solid  #5D6975;
				  border-bottom: 1px solid  #5D6975;
				  color: #ffffff;
				  font-size: 2.4em;
				  font-weight: normal;
				  text-align: center;
				  margin: 0 0 20px 0;
				  background-color: #007bff;
				}

				#bank {
				  line-height: 1.6;
				}

				#bank span {
				  color: #5D6975;
				  text-align: right;
				  width: 52px;
				  margin-right: 10px;
				  display: inline-block;
				  font-size: 0.8em;
				}

				#company {
				  text-align: left;
				  line-height: 1.6;
				}

				#bank div,
				#company div {
				  white-space: nowrap;        
				}

				table {
				  width: 100%;
				  border-collapse: collapse;
				  border-spacing: 0;
				  margin-bottom: 20px;
				}

				table tr:nth-child(2n-1) td {
				  background: #F5F5F5;
				}

				table th,
				table td {
				  text-align: center;
				}

				table th {
				  padding: 5px 20px;
				  color: #5D6975;
				  border-bottom: 1px solid #C1CED9;
				  white-space: nowrap;        
				  font-weight: normal;
				}

				table .service,
				table .desc {
				  text-align: left;
				}
				
				table .invoice {
				  text-align: left;
				  line-height: normal;
				}
				
				table .company {
				  text-align: left;
				  line-height: normal;
				}
				
				table .bank {
				  text-align: right;
				  line-height: normal;
				}

				table td {
				  padding: 20px;
				  text-align: right;
				}

				table td.service,
				table td.desc {
				  vertical-align: top;
				}

				table td.unit,
				table td.qty,
				table td.total {
				  font-size: 1.2em;
				}

				table td.grand {
				  border-top: 1px solid #5D6975;;
				}

				#notices .notice {
				  color: #5D6975;
				  font-size: 1.2em;
				  line-height: 1.6;
				}

				footer {
				  color: #5D6975;
				  width: 100%;
				  height: 30px;
				  position: absolute;
				  bottom: 0;
				  border-top: 1px solid #C1CED9;
				  padding: 8px 0;
				  text-align: center;
				}
				</style>
			  </body>
			</html>";
		
		$this->pdf->set_paper('A4','landscape');
		$this->pdf->load_html($html_content);
		$this->pdf->render();
		$this->pdf->stream(lang('receipt')." - #".$idorder.".pdf", array("Attachment"=>0));
    }
	
	function deletefavorite()
    {
        $idfavorite=$this->input->post('idfavorite');
		
		$this->db->where('idfavorite', $idfavorite);
        $this->db->delete($this->db->dbprefix('favorite'));
		
		$msg=array(	
			'msg'=>'true',
			'msg_success'=>lang('favorite_msg_delete')
		);	
		echo json_encode($msg);
    }	
	
}
?>