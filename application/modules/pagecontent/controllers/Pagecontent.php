<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Pagecontent extends CI_Controller {
 
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
	
	public function pages($idmenuutama)
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
		
		$queryccn = $this->db->query("SELECT COUNT(*) AS total FROM `".$this->db->dbprefix('menuutama')."` WHERE idlanguage='".$rowlanguage->idlanguage."' AND idmenuutama='".$idmenuutama."'");
		$rowccn = $queryccn->row();
		$totalcourses=$rowccn->total;
		if($totalcourses=="0")
		{
			redirect(base_url('home'));
		}	
		
		$querypages = $this->db->query("SELECT menu FROM `".$this->db->dbprefix('menuutama')."` WHERE idlanguage='".$rowlanguage->idlanguage."' AND idmenuutama='".$idmenuutama."'");
		$rowpages = $querypages->row();
		$menu = $rowpages->menu;
		
		$data['menu'] = "pagecontent/pages/".$idmenuutama;
		$data['menutitle'] = $menu;
		$data['idlanguage'] = $rowlanguage->idlanguage;
		$data['idmenuutama'] = $idmenuutama;
		$data['databannerberanda']=$this->model->ambildata($this->db->dbprefix('bannerberanda'));
		$data['content'] = 'pagecontent/content';
		$data['meta'] = 'pagecontent/meta';
		$data['css'] = 'pagecontent/css';
		$data['javascript'] = 'pagecontent/js';
		$this->load->view('home/home',$data);
	}
	
}
?>