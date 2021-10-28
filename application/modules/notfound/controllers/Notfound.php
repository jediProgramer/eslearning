<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Notfound extends CI_Controller {
 
    function __construct()
	{
		parent::__construct();
		$language = $this->session->userdata('language');
		$this->session->set_userdata('language','indonesia');
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper(array('form','url'));
		$this->load->helper('text');
		$this->load->model('model');
		// Load default language
		$language = $this->session->userdata('language');
		$this->lang->load('text_lang', $language);
	}
	
	
	
	public function index()
	{
		$language = $this->session->userdata('language');
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
		$data['menu'] = "notfound";
		$data['menutitle'] = lang('notfound_page');
		$data['idlanguage'] = $rowlanguage->idlanguage;
		$data['databannerberanda']=$this->model->ambildata($this->db->dbprefix('bannerberanda'));
		$data['content'] = 'notfound/content';
		$data['meta'] = 'notfound/meta';
		$data['css'] = 'notfound/css';
		$data['javascript'] = 'notfound/js';
		$this->load->view('edumy/edumy',$data);
		
	}
	
}
?>