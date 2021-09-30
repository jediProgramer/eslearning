<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Home extends CI_Controller {
 
    function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper(array('form','url'));
		$this->load->helper('text');
		$this->load->model('model');
		$this->lang->load('text_lang', 'indonesia');
		$this->load->library("geolib/geolib");
	}
	
	public function index()
    {
		
		//$ip = $this->input->ip_address();
		//echo "<pre>";
		//$data = $this->geolib->ip_info();
		$data = $this->geolib->ip_info("198.211.100.32");
		//print_r($data);
		//echo "</pre>";
		//echo $data['geoplugin_countryName'];
		$data=array(
			'country'=>$data['geoplugin_countryName'],
			'menu'=>'home',
			'ip'=>$data['geoplugin_request']
		);
		$simpandata=$this->model->simpandata($this->db->dbprefix('visitors'),$data);
		$language = 'indonesia';
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
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
		$data['menu'] = "home";
		$data['menutitle'] = lang('home');
		$data['idlanguage'] = $rowlanguage->idlanguage;
		$data['databannerberanda']=$this->model->ambildata($this->db->dbprefix('bannerberanda'));
		$data['content'] = 'home/content';
		$data['meta'] = 'home/meta';
		$data['css'] = 'home/css';
		$data['javascript'] = 'home/js';
		$this->load->view('home/home',$data);
	}
	
	function get_autocomplete(){
		$language = $this->session->userdata('language');
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		$idlanguage = $rowlanguage->idlanguage;

		if (isset($_GET['term'])) {
		  	$result = $this->model->search_courses($_GET['term'],$idlanguage);
		   	if (count($result) > 0) {
		    foreach ($result as $row)
		     	$arr_result[] = array(
					'label'			=> $row->title,
				);
		     	echo json_encode($arr_result);
		   	}
		}
	}

}
?>