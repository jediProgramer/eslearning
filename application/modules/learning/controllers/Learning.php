<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Learning extends CI_Controller {
 
    function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url('login'));
		}
		$this->session->set_userdata('language','indonesia');
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper(array('form','url'));
		$this->load->helper('text');
		$this->load->model('model');
		//$this->load->library('pdf');
		$this->load->library('Ajax_pagination');
		$this->load->library('Ajax_pagination_category');
		$this->load->library('Ajax_pagination_instructors');
		// Load per page
        $this->perPage = 8;
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
	
	public function courses()
    {
		$language = $this->session->userdata('language');
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		$idlanguage = $rowlanguage->idlanguage;
		
		$data = array();
		
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in) {

			$data['logged_in'] = "false";
		}
		else
		{
			$data['logged_in'] = $logged_in;
		}
		$data['menu'] = "learning/courses";
		$data['idusers'] = $this->session->userdata('iduser');
		$data['fullname'] = $this->session->userdata('fullname');
		$data['roles'] = $this->session->userdata('roles');
		$data['email'] = $this->session->userdata('email');
		$data['username'] = $this->session->userdata('username');
		$data['profilepicture'] = $this->session->userdata('profilepicture');
		$data['menutitle'] = lang('learning_dashboard');
		$data['idlanguage'] = $rowlanguage->idlanguage;
		$data['datacategory']=$this->model->ambildata($this->db->dbprefix('category'));
		
		$querycl = $this->db->query("SELECT COUNT(*) AS total FROM `".$this->db->dbprefix('courses')."` WHERE idcoursetype='2' AND idlanguage='".$idlanguage."'");
		$rowcl = $querycl->row();
		$totalcourseslanguage=$rowcl->total;
		if($totalcourseslanguage=="0")
		{
			$totalRec = "0";
		}	
		else
		{	
			//total rows count
			$totalRec = count($this->model->getRows($idlanguage));
        }
		
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'learning/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['posts'] = $this->model->getRows($idlanguage,array('limit'=>$this->perPage));
		
		$data['content'] = 'learning/courses';
		$data['meta'] = 'learning/meta_courses';
		$data['css'] = 'learning/css_courses';
		$data['javascript'] = 'learning/js_courses';
		$this->load->view('home/home',$data);
    }
	
	public function searchcourses()
    {
		$language = $this->session->userdata('language');
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		$idlanguage = $rowlanguage->idlanguage;
		
		$keywords = $this->input->post('search');
		
		$conditions = array();
		$conditions['search']['keywords'] = $keywords;
        $conditions['limit'] = $this->perPage;
		
		$data = array();
		
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in) {

			$data['logged_in'] = "false";
		}
		else
		{
			$data['logged_in'] = $logged_in;
		}
		$data['menu'] = "learning/searchcourses";
		$data['idusers'] = $this->session->userdata('iduser');
		$data['fullname'] = $this->session->userdata('fullname');
		$data['roles'] = $this->session->userdata('roles');
		$data['email'] = $this->session->userdata('email');
		$data['username'] = $this->session->userdata('username');
		$data['profilepicture'] = $this->session->userdata('profilepicture');
		$data['menutitle'] = lang('learning_dashboard');
		$data['idlanguage'] = $rowlanguage->idlanguage;
		$data['datacategory']=$this->model->ambildata($this->db->dbprefix('category'));
		
		$totalRec = count($this->model->getRows($idlanguage,$conditions));
		
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'learning/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
		//$config['uri_segment']   = '4';
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['posts'] = $this->model->getRows($idlanguage,$conditions);
		
		$data['content'] = 'learning/courses';
		$data['meta'] = 'learning/meta_courses';
		$data['css'] = 'learning/css_courses';
		$data['javascript'] = 'learning/js_courses';
		$this->load->view('home/home',$data);
    }
	
	public function coursescategory($idcategory,$idsubcategory)
    {
		$language = $this->session->userdata('language');
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		$idlanguage = $rowlanguage->idlanguage;
		
		$data = array();
		
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in) {

			$data['logged_in'] = "false";
		}
		else
		{
			$data['logged_in'] = $logged_in;
		}
		$data['menu'] = "learning/coursescategory";
		$data['idusers'] = $this->session->userdata('iduser');
		$data['fullname'] = $this->session->userdata('fullname');
		$data['roles'] = $this->session->userdata('roles');
		$data['email'] = $this->session->userdata('email');
		$data['username'] = $this->session->userdata('username');
		$data['profilepicture'] = $this->session->userdata('profilepicture');
		$data['menutitle'] = lang('learning_dashboard');
		$data['idlanguage'] = $rowlanguage->idlanguage;
		$data['idcategory'] = $idcategory;
		$data['idsubcategory'] = $idsubcategory;
		$data['datacategory']=$this->model->ambildata($this->db->dbprefix('category'));
		$data['datasubcategory']=$this->model->ambildataById($this->db->dbprefix('subcategory'),'idcategory',$data['idcategory']);
		
		$conditionspage = array();
		$conditionspage['search']['category'] = $idcategory;
		if($data['idsubcategory'] != "0")
		{	
			$conditionspage['search']['subcategory'] = $idsubcategory;
		}
		//total rows count
        $totalRec = count($this->model->getRows($idlanguage,$conditionspage));
		//echo $totalRec;
		//exit();
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'learning/ajaxPaginationDataCategory';
        //$config['total_rows']  = $totalRec;
		$config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
		if($data['idsubcategory']=="0")
		{	
			$config['uri_segment']   = '4';
		}
		else
		{
			$config['uri_segment']   = '5';
		}	
        $this->ajax_pagination_category->initialize($config);
		
		$conditions = array();
		$conditions['search']['category'] = $idcategory;
        $conditions['limit'] = $this->perPage;
        
        //get the posts data
        $data['posts'] = $this->model->getRows($idlanguage,$conditions);
		
		$data['content'] = 'learning/coursescategory';
		$data['meta'] = 'learning/meta_coursescategory';
		$data['css'] = 'learning/css_coursescategory';
		$data['javascript'] = 'learning/js_coursescategory';
		$this->load->view('home/home',$data);
    }
	
	function ajaxPaginationData(){
		$language = $this->session->userdata('language');
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		$idlanguage = $rowlanguage->idlanguage;
		
        $conditions = array();
        
        //calc offset number
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        
        //set conditions for search
        $keywords = $this->input->post('keywords');
        $sortBy = $this->input->post('sortBy');
		$category = $this->input->post('category');
		$subcategory = $this->input->post('subcategory');
		
        if(!empty($keywords)){
            $conditions['search']['keywords'] = $keywords;
        }
        if(!empty($sortBy)){
            $conditions['search']['sortBy'] = $sortBy;
        }
		if(!empty($category)){
            $conditions['search']['category'] = $category;
        }
		if(!empty($subcategory)){
            $conditions['search']['subcategory'] = $subcategory;
        }
        
        //total rows count
        //$totalRec = count($this->model->getRows($idlanguage,array($conditions)));
		$totalRec = count($this->model->getRows($idlanguage, $conditions));
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'learning/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        
        //get posts data
        $data['posts'] = $this->model->getRows($idlanguage,$conditions);
        $data['idlanguage'] = $rowlanguage->idlanguage;
        //load the view
        $this->load->view('learning/ajax-pagination-data', $data, false);
    }
	
	function ajaxPaginationDataCategory(){
		$language = $this->session->userdata('language');
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		$idlanguage = $rowlanguage->idlanguage;
		
        $conditions = array();
        
        //calc offset number
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        
        //set conditions for search
        $keywords = $this->input->post('keywords');
        $sortBy = $this->input->post('sortBy');
		$category = $this->input->post('category');
		$subcategory = $this->input->post('subcategory');
		
        if(!empty($keywords)){
            $conditions['search']['keywords'] = $keywords;
        }
        if(!empty($sortBy)){
            $conditions['search']['sortBy'] = $sortBy;
        }
		if(!empty($category)){
            $conditions['search']['category'] = $category;
        }
		if(!empty($subcategory)){
            $conditions['search']['subcategory'] = $subcategory;
        }
        
        //total rows count
        $totalRec = count($this->model->getRows($idlanguage,$conditions));
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'learning/ajaxPaginationDataCategory';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
		$config['uri_segment']   = '3';
        $this->ajax_pagination_category->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        
        //get posts data
        $data['posts'] = $this->model->getRows($idlanguage,$conditions);
        $data['idlanguage'] = $rowlanguage->idlanguage;
        //load the view
        $this->load->view('learning/ajax-pagination-data-category', $data, false);
    }
	
	function get_sub_category(){
        $language = $this->session->userdata('language');
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		$idlanguage = $rowlanguage->idlanguage;
		
		$idcategory = $this->input->post('id',TRUE);
        $data = $this->model->get_data($idcategory,$idlanguage,$this->db->dbprefix('subcategory'),'idcategory','idlanguage')->result();
        echo json_encode($data);
    }
	
	public function coursesdetail($idcourses)
    {
		$language = $this->session->userdata('language');
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		
		$queryccn = $this->db->query("SELECT COUNT(*) AS total FROM `".$this->db->dbprefix('courses')."` WHERE idcoursetype='2' AND idlanguage='".$rowlanguage->idlanguage."'");
		$rowccn = $queryccn->row();
		$totalcourses=$rowccn->total;
		if($totalcourses=="0")
		{
			redirect(base_url('home'));
		}	
		
		$querycn = $this->db->query("SELECT title FROM `".$this->db->dbprefix('courses')."` WHERE idcourses='".$idcourses."'");
		$rowcn = $querycn->row();
		$coursestitle=$rowcn->title;
		
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in) {

			$data['logged_in'] = "false";
		}
		else
		{
			$data['logged_in'] = $logged_in;
		}
		$data['menu'] = "learning/coursesdetail/".$idcourses."";
		$data['idusers'] = $this->session->userdata('iduser');
		$data['fullname'] = $this->session->userdata('fullname');
		$data['roles'] = $this->session->userdata('roles');
		$data['email'] = $this->session->userdata('email');
		$data['username'] = $this->session->userdata('username');
		$data['profilepicture'] = $this->session->userdata('profilepicture');
		$data['idcourses']=$idcourses;
		$data['datacourses']=$this->model->ambildataById($this->db->dbprefix('courses'),'idcourses',$data['idcourses']);
		$data['datacountries']=$this->model->selectbox($this->db->dbprefix('countries'),'id');
		$data['menutitle'] = lang('courses');
		$data['coursestitle'] = $coursestitle;
		$data['idlanguage'] = $rowlanguage->idlanguage;
		$data['content'] = 'learning/coursesdetail';
		$data['meta'] = 'learning/meta';
		$data['css'] = 'learning/css';
		$data['javascript'] = 'learning/js';
		$this->load->view('home/home',$data);
    }
	
	public function contentcourses($idcourses,$idcontent)
    {
		$language = $this->session->userdata('language');
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		
		$queryccn = $this->db->query("SELECT COUNT(*) AS total FROM `".$this->db->dbprefix('courses')."` WHERE idcourses='".$idcourses."' AND idlanguage='".$rowlanguage->idlanguage."'");
		$rowccn = $queryccn->row();
		$totalcourses=$rowccn->total;
		if($totalcourses=="0")
		{
			redirect(base_url('home'));
		}	
		
		$querycn = $this->db->query("SELECT title,idcategory FROM `".$this->db->dbprefix('courses')."` WHERE idcourses='".$idcourses."'");
		$rowcn = $querycn->row();
		$coursestitle=$rowcn->title;
		$idcategory=$rowcn->idcategory;
		
		$queryidsyllabus = $this->db->query("SELECT title,idsyllabus FROM `".$this->db->dbprefix('content')."` WHERE idcourses='".$idcourses."' AND idcontent='".$idcontent."'");
		$rowidsyllabus = $queryidsyllabus->row();
		$contenttitle=$rowidsyllabus->title;
		$idsyllabus=$rowidsyllabus->idsyllabus;
		
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in) {

			$data['logged_in'] = "false";
		}
		else
		{
			$data['logged_in'] = $logged_in;
		}
		
		
		$data['menu'] = "learning/contentcourses/".$idcourses."/".$idcontent;
		$data['idusers'] = $this->session->userdata('iduser');
		$data['fullname'] = $this->session->userdata('fullname');
		$data['roles'] = $this->session->userdata('roles');
		$data['email'] = $this->session->userdata('email');
		$data['username'] = $this->session->userdata('username');
		$data['profilepicture'] = $this->session->userdata('profilepicture');
		
		$querycekidcontent= $this->db->query("SELECT COUNT(*) AS totalidcontent FROM `".$this->db->dbprefix('contentprogress')."` WHERE idcourses='".$idcourses."' AND idcontent='".$idcontent."'");
		$rowcekidcontent = $querycekidcontent->row();
		$totalidcontent=$rowcekidcontent->totalidcontent;
		
		if($totalidcontent=="0")
		{
			$data=array(	
				'idcontent'=>$idcontent,
				'idcourses'=>$idcourses,
				'idsyllabus'=>$idsyllabus,
				'iduser'=>$this->session->userdata('iduser'),
				'progress'=>'1',
				'date'=>date('Y-m-d')
			);
			$this->model->simpandata($this->db->dbprefix('contentprogress'),$data);
			redirect(site_url('learning/contentcourses/'.$idcourses.'/'.$idcontent));
		}	
		
		$data['idcourses']=$idcourses;
		$data['idcontent']=$idcontent;
		$data['idsyllabus']=$idsyllabus;
		$data['idcategory']=$idcategory;
		$data['datacourses']=$this->model->ambildataById($this->db->dbprefix('courses'),'idcourses',$data['idcourses']);
		$data['datacontent']=$this->model->ambildataById($this->db->dbprefix('content'),'idcontent',$data['idcontent']);
		$data['datacountries']=$this->model->selectbox($this->db->dbprefix('countries'),'id');
		$data['menutitle'] = lang('courses');
		$data['coursestitle'] = $coursestitle;
		$data['contenttitle'] = $contenttitle;
		$data['idlanguage'] = $rowlanguage->idlanguage;
		$data['content'] = 'learning/contentcourses';
		$data['meta'] = 'learning/meta';
		$data['css'] = 'learning/css_contentcourses';
		$data['javascript'] = 'learning/js_contentcourses';
		$this->load->view('home/home',$data);
    }
	
	public function printcertificate($idusers,$idcourses)
    {
		$language = $this->session->userdata('language');
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		$idlanguage= $rowlanguage->idlanguage;
		
		$queryccn = $this->db->query("SELECT COUNT(*) AS total FROM `".$this->db->dbprefix('courses')."` WHERE idcourses='".$idcourses."' AND idlanguage='".$rowlanguage->idlanguage."'");
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
		
		$querycn = $this->db->query("SELECT title FROM `".$this->db->dbprefix('courses')."` WHERE idcourses='".$idcourses."'");
		$rowcn = $querycn->row();
		$coursestitle=$rowcn->title;
		
		$querymaxidcp = $this->db->query("SELECT MAX(idcontentprogress) AS maxidcp FROM `".$this->db->dbprefix('contentprogress')."` WHERE idcourses='".$idcourses."' AND iduser='".$idusers."'");
		$rowmaxidcp = $querymaxidcp->row();
		$maxidcp = $rowmaxidcp->maxidcp;
		
		$querydategrad = $this->db->query("SELECT date  FROM `".$this->db->dbprefix('contentprogress')."` WHERE idcourses='".$idcourses."' AND iduser='".$idusers."' AND idcontentprogress='".$maxidcp."'");
		$rowdategrad = $querydategrad->row();
		$dategrad = $rowdategrad->date;
		
		// ===== Date =====
		$split=explode('-',$dategrad);
		$tahun=$split[0];
		$bulan=$split[1];
		$tgl=$split[2];
		$tahun_plus=$tahun + 1;
		$mount=$this->day($bulan,$idlanguage);	
		$year_grad = $tgl." ".$mount." ".$tahun;
		$year_exp = $tgl." ".$mount." ".$tahun_plus;
		$exp_date = $tahun_plus."-".$bulan."-".$tgl;
		
		
		// ===== Cert No =====
		$rand1 = rand(0,9);
		$rand2 = rand(1,9);
		$rand3 = rand(2,9);
		$rand4 = rand(3,9);
		$rand5 = rand(4,9);
		$randcert = $rand1.$rand2.$rand3.$rand4.$rand5;
		$nocert = "CE-ESLEARNIG-C".$idcourses."-".$tgl."/".$bulan."/".$tahun."-".$randcert;
		
		// ===== Cert No Veritify =====
		$nocertvert = $idusers.$idcourses.$tgl.$bulan.$tahun.$randcert;
		
		$querycek = $this->db->query("SELECT COUNT(*) AS total FROM `".$this->db->dbprefix('veritificationceklist')."` WHERE idcourses='".$idcourses."' AND iduser='".$idusers."'");
		$rowcek = $querycek->row();
		$totalcek=$rowcek->total;
		
		if($totalcek=="0")
		{
			$data=array(	
				'idveritification'=>$nocertvert,
				'iduser'=>$idusers,
				'idcourses'=>$idcourses,
				'certnumber'=>$nocert,
				'graduatedate'=>$dategrad,
				'expiredate'=>$exp_date
			);
			$this->model->simpandata($this->db->dbprefix('veritificationceklist'),$data);
		}	
		
		$querycert = $this->db->query("SELECT * FROM `".$this->db->dbprefix('veritificationceklist')."` WHERE idcourses='".$idcourses."' AND iduser='".$idusers."'");
		$rowcert = $querycert->row();
		$veritification_u = $rowcert->idveritification;
		$certnumber_u = $rowcert->certnumber;
		$dategrad_u = $rowcert->graduatedate;
		$dateexp_u = $rowcert->expiredate;
		
		$split=explode('-',$dategrad_u);
		$tahun_u=$split[0];
		$bulan_u=$split[1];
		$tgl_u=$split[2];
		$mount_u=$this->day($bulan_u,$idlanguage);	
		$year_grad_u = $tgl_u." ".$mount_u." ".$tahun_u;
		$split_exp = explode('-',$dateexp_u);
		$tahun_exp_u= $split_exp[0];
		$bulan_exp_u= $split_exp[1];
		$tgl_exp_u = $split_exp[2];
		$mount_exp_u = $this->day($bulan_exp_u,$idlanguage);	
		$year_exp_u = $tgl_exp_u." ".$mount_exp_u." ".$tahun_exp_u;
		
		$data['menu'] = "learning/printcertificate/".$idusers."/".$idcourses;
		$data['idusers'] = $this->session->userdata('iduser');
		$data['fullname'] = $this->session->userdata('fullname');
		$data['roles'] = $this->session->userdata('roles');
		$data['email'] = $this->session->userdata('email');
		$data['username'] = $this->session->userdata('username');
		$data['profilepicture'] = $this->session->userdata('profilepicture');
		$data['idcourses']=$idcourses;
		$data['datacourses']=$this->model->ambildataById($this->db->dbprefix('courses'),'idcourses',$data['idcourses']);
		$data['datacountries']=$this->model->selectbox($this->db->dbprefix('countries'),'id');
		$data['menutitle'] = lang('courses');
		$data['coursestitle'] = $coursestitle;
		
		$fullname = $this->session->userdata('fullname');
		
		$html_content ="<html>
		<head>
        <title>".lang('cert_file')." - ".$coursestitle." - ".$fullname."</title>	
		<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap' rel='stylesheet'>  
		<!-- Certificate CSS -->
		<style>
		body {
			font-family: 'Open Sans', sans-serif;
			text-align: 'justify';
		}
		.banner-container {
		  background-color: #080808;
		  color: #ffffff;
		  font-family: 'Open Sans', sans-serif;
		  padding: 10px;
		}
		.body-container {
		  background-color: #ffffff;
		  color: #080808;
		  font-family: 'Open Sans', sans-serif;
		  padding: 10px;
		  text-align:center;
		  line-height: normal;
		}
		.signature-image {
			border-bottom-style: solid;
			display: block;
			background-repeat: no-repeat;
			background-position: center bottom;
		}
		</style>
		<!-- / Certificate CSS -->
		</head>";
		$html_content .="<body>
		<!-- Header -->
		<div class='banner-container'>
			<table border='0' width='100%'>
				<tr>
				<td align='left'><img src='".base_url()."assets/eslearning/img/logo_footer.png' width='120'><br/><center></td>
				<td>&nbsp;&nbsp;&nbsp;</td>
				<td align='right'><font style='font-size:10px; text-align:right'>Nomor : ".$certnumber_u."</font></td>
				</tr>
			</table>	
		</div>
		<!-- / Header -->
		<!-- Body -->
		<div class='body-container'>
			<font font style='font-size:12px'>".lang('cert_a')."</font><br/>
			<font style='font-size:18px'><b>".$fullname."</b></font><br/>
			<font font style='font-size:12px'>".lang('cert_b')." :</font><br/>
			<font style='font-size:18px'><b>".$coursestitle."</b></font><br/>
			<font font style='font-size:12px'>".lang('cert_c')." ".$year_grad_u.", ".lang('cert_d')." ".$year_exp_u." </font>
			<br/><br/><br/><br/>
			<center><img src='".base_url()."assets/eslearning/img/erlangga_signature.png' width='200' class='signature-image'></center>
			<font font style='font-size:12px'><b>Erlangga</b></font><br/>
			<font font style='font-size:12px'>".lang('cert_e')."</font><br/>
			<font font style='font-size:10px'>".lang('cert_f')." : ".base_url()."veritfycertification/".$veritification_u."</font>
		</div>
		<!-- / Body -->
		</body>
		</html>";
		
		$this->pdf->set_paper('A5','landscape');
		$this->pdf->load_html($html_content);
		$this->pdf->render();
		$this->pdf->stream(lang('cert_file')." - ".$coursestitle." - ".$fullname.".pdf", array("Attachment"=>0));
    }
	
	public function addcourses()
    {
		$iduser= $this->session->userdata('iduser');
		$idcourses= $this->input->post('idcourses');
		$price= $this->input->post('price');
		$rand1 = rand(0,9);
		$rand2 = rand(1,9);
		$rand3 = rand(2,9);
		$rand4 = rand(3,9);
		$rand5 = rand(4,9);
		$idorder=$rand1.$rand2.$rand3.$rand4.$rand5;
			
		if($price!="0")
		{
			$data=array(	
				'idorder '=>$idorder,
				'iduser'=>$iduser,
				'idcourses'=>$this->input->post('idcourses'),
				'status'=>'1',
				'date'=>date('Y-m-d')
			);
			$this->model->save_db_json($this->db->dbprefix('order'),$data);
			$msg=array(	
				'msg'=>'true',
				'msg_success'=>lang('success_message_order')
			);	
			echo json_encode($msg);
		}	
		else
		{	
			$data=array(	
				'iduser'=>$iduser,
				'idcourses'=>$this->input->post('idcourses'),
				'date'=>date('Y-m-d')
			);
			$this->model->save_db_json($this->db->dbprefix('enroll'),$data);
			$msg=array(	
				'msg'=>'true',
				'msg_success'=>lang('success_message_enroll')
			);	
			echo json_encode($msg);
		}
	}

	public function addfavorite()
    {
		$iduser= $this->session->userdata('iduser');
		$idcourses= $this->input->post('idcourses');
		
		$cekidcategory = $this->db->query("SELECT idcategory FROM `".$this->db->dbprefix('courses')."` WHERE idcourses='".$idcourses."'");
		$rowcekidcategory = $cekidcategory->row();
		$idcategory = $rowcekidcategory->idcategory;
		
		$cekfav = $this->db->query("SELECT COUNT(*) AS totalfav FROM `".$this->db->dbprefix('favorite')."` WHERE idcourses='".$idcourses."' AND iduser='".$iduser."'");
		$rowcekfav = $cekfav->row();
		$totalfav = $rowcekfav->totalfav;
			
		if($totalfav>="1")
		{
			$cekidfav = $this->db->query("SELECT idfavorite FROM `".$this->db->dbprefix('favorite')."` WHERE idcourses='".$idcourses."' AND iduser='".$iduser."'");
			$rowcekidfav = $cekidfav->row();
			$idfavorite = $rowcekidfav->idfavorite;
			$this->db->where('idfavorite ', $idfavorite );
			$this->db->delete($this->db->dbprefix('favorite'));
			
			$cekfav = $this->db->query("SELECT favorite FROM `".$this->db->dbprefix('courses')."` WHERE idcourses='".$idcourses."'");
			$rowcekfav = $cekfav->row();
			$favorite = $rowcekfav->favorite;
			$totfav=$favorite-1;
			
			$datafav=array(	
				'favorite'=>$totfav
			);
			
			$clause=array('idcourses'=>$idcourses);
			$this->model->update($this->db->dbprefix('courses'),$datafav,$clause);
			
			$cekfavcategory = $this->db->query("SELECT favorite FROM `".$this->db->dbprefix('category')."` WHERE idcategory='".$idcategory."'");
			$rowcekfavcategory = $cekfavcategory->row();
			$favoritecategory = $rowcekfavcategory->favorite;
			$totfavcategory=$favoritecategory-1;
			
			$datafavcategory=array(	
				'favorite'=>$totfavcategory
			);
			
			$clausecategory=array('idcategory'=>$idcategory);
			$this->model->update($this->db->dbprefix('category'),$datafavcategory,$clausecategory);
			
			$msg=array(	
				'msg'=>'true',
				'msg_success'=>lang('favorite_msg_delete')
			);	
			echo json_encode($msg);
		}	
		else
		{	
			$data=array(	
				'iduser'=>$iduser,
				'idcourses'=>$this->input->post('idcourses'),
				'date'=>date('Y-m-d')
			);
			$this->model->save_db_json($this->db->dbprefix('favorite'),$data);
			
			$cekfav = $this->db->query("SELECT favorite FROM `".$this->db->dbprefix('courses')."` WHERE idcourses='".$idcourses."'");
			$rowcekfav = $cekfav->row();
			$favorite = $rowcekfav->favorite;
			$totfav=$favorite+1;
			
			$datafav=array(	
				'favorite'=>$totfav
			);
			
			$clause=array('idcourses'=>$idcourses);
			$this->model->update($this->db->dbprefix('courses'),$datafav,$clause);
			
			$cekfavcategory = $this->db->query("SELECT favorite FROM `".$this->db->dbprefix('category')."` WHERE idcategory='".$idcategory."'");
			$rowcekfavcategory = $cekfavcategory->row();
			$favoritecategory = $rowcekfavcategory->favorite;
			$totfavcategory=$favoritecategory+1;
			
			$datafavcategory=array(	
				'favorite'=>$totfavcategory
			);
			
			$clausecategory=array('idcategory'=>$idcategory);
			$this->model->update($this->db->dbprefix('category'),$datafavcategory,$clausecategory);
			
			$msg=array(	
				'msg'=>'true',
				'msg_success'=>lang('favorite_msg_success')
			);	
			echo json_encode($msg);
		}
	}		
	
	public function helpfullcommentyes()
    {
		$idreview= $this->input->post('idreview');
		$idcourses= $this->input->post('idcourses');
		$iduser= $this->input->post('iduser');
		
		$querytrr = $this->db->query("SELECT COUNT(*) AS totalrr FROM `".$this->db->dbprefix('reviewreport')."` WHERE iduser='".$iduser."' AND idcourses='".$idcourses."' AND idreview='".$idreview."'");
		$rowtrr = $querytrr->row();
		$totalrr = $rowtrr->totalrr;
		if($totalrr=="0")
		{
			$datareview=array(	
				'idreview'=>$idreview,
				'idcourses'=>$idcourses,
				'iduser'=>$iduser,
				'yes'=>'1',
				'no'=>'0',
				'date'=>date('Y-m-d')
			);	
			$this->model->save_db_json($this->db->dbprefix('reviewreport'),$datareview);
			
			$msg=array(	
				'msg'=>'true',
				'msg_success'=>lang('favorite_msg_helpfull_success')
			);	
			echo json_encode($msg);
		}
		else
		{
			$datareview=array(	
				'yes'=>'1',
				'no'=>'0',
			);
			
			$clause=array(
				'idreview'=>$idreview,
				'idcourses'=>$idcourses,
				'iduser'=>$iduser
			);
			$this->model->update($this->db->dbprefix('reviewreport'),$datareview,$clause);
			
			$msg=array(	
				'msg'=>'true',
				'msg_success'=>lang('favorite_msg_helpfull_success')
			);	
			echo json_encode($msg);
		}			
	}	
	
	public function helpfullcommentno()
    {
		$idreview= $this->input->post('idreview');
		$idcourses= $this->input->post('idcourses');
		$iduser= $this->input->post('iduser');
			
		$querytrr = $this->db->query("SELECT COUNT(*) AS totalrr FROM `".$this->db->dbprefix('reviewreport')."` WHERE iduser='".$iduser."' AND idcourses='".$idcourses."' AND idreview='".$idreview."'");
		$rowtrr = $querytrr->row();
		$totalrr = $rowtrr->totalrr;
		if($totalrr=="0")
		{
			$datareview=array(	
			'idreview'=>$idreview,
			'idcourses'=>$idcourses,
			'iduser'=>$iduser,
			'yes'=>'0',
			'no'=>'1',
			'date'=>date('Y-m-d')
			);	
			$this->model->save_db_json($this->db->dbprefix('reviewreport'),$datareview);
			
			$msg=array(	
				'msg'=>'true',
				'msg_success'=>lang('favorite_msg_helpfull_success')
			);	
			echo json_encode($msg);
		}
		else
		{		
			$datareview=array(	
				'yes'=>'0',
				'no'=>'1',
			);
			
			$clause=array(
				'idreview'=>$idreview,
				'idcourses'=>$idcourses,
				'iduser'=>$iduser
			);
			$this->model->update($this->db->dbprefix('reviewreport'),$datareview,$clause);
			
			$msg=array(	
				'msg'=>'true',
				'msg_success'=>lang('favorite_msg_helpfull_success')
			);	
			echo json_encode($msg);
		}	
	}	
	
	public function helpfullcommentreport()
    {
		$idreview= $this->input->post('idreview');
		$idcourses= $this->input->post('idcourses');
		$iduser= $this->input->post('iduser');
		$reportcoment= $this->input->post('reportcoment');
		$querytrr = $this->db->query("SELECT COUNT(*) AS totalrr FROM `".$this->db->dbprefix('reviewreport')."` WHERE iduser='".$iduser."' AND idcourses='".$idcourses."' AND idreview='".$idreview."'");
		$rowtrr = $querytrr->row();
		$totalrr = $rowtrr->totalrr;
		if($totalrr=="0")
		{
			$datareview=array(	
			'idreview'=>$idreview,
			'idcourses'=>$idcourses,
			'iduser'=>$iduser,
			'report'=>'1',
			'reportcoment'=>$reportcoment,
			'date'=>date('Y-m-d')
			);	
			$this->model->save_db_json($this->db->dbprefix('reviewreport'),$datareview);
			
			$msg=array(	
				'msg'=>'true',
				'msg_success'=>lang('reporting_msg_success')
			);	
			echo json_encode($msg);
		}
		else
		{		
			$datareview=array(	
				'report'=>'1',
				'reportcoment'=>$reportcoment,
			);
			
			$clause=array(
				'idreview'=>$idreview,
				'idcourses'=>$idcourses,
				'iduser'=>$iduser
			);
			$this->model->update($this->db->dbprefix('reviewreport'),$datareview,$clause);
			
			$msg=array(	
				'msg'=>'true',
				'msg_success'=>lang('reporting_msg_success')
			);	
			echo json_encode($msg);
		}	
	}	
	
	public function helpfullcancelledreport()
    {
		$idreview= $this->input->post('idreview');
		$idcourses= $this->input->post('idcourses');
		$iduser= $this->input->post('iduser');
		$datareview=array(	
			'report'=>'0',
			'reportcoment'=>'',
		);
		
		$clause=array(
			'idreview'=>$idreview,
			'idcourses'=>$idcourses,
			'iduser'=>$iduser
		);
		$this->model->update($this->db->dbprefix('reviewreport'),$datareview,$clause);
		
		$msg=array(	
			'msg'=>'true',
			'msg_success'=>lang('reporting_msg_cancel')
		);	
		echo json_encode($msg);
	}	
	
	public function reportmaterialcourses()
    {
		$idcourses= $this->input->post('idcourses');
		$idcontent= $this->input->post('idcontent');
		$idsyllabus= $this->input->post('idsyllabus');
		$iduser= $this->input->post('iduser');
		$reportcoment= $this->input->post('reportcoment');
		$data=array(	
		'idcourses'=>$idcourses,
		'idcontent'=>$idcontent,
		'idsyllabus'=>$idsyllabus,
		'iduser'=>$iduser,
		'reportcoment'=>$reportcoment,
		'date'=>date('Y-m-d')
		);	
		$this->model->save_db_json($this->db->dbprefix('reportmaterialcourses'),$data);
		
		$msg=array(	
			'msg'=>'true',
			'msg_success'=>lang('reporting_msg_success')
		);	
		echo json_encode($msg);
	}	
	
	public function feedbackcourses()
    {
		$idcourses= $this->input->post('idcourses');
		$iduser= $this->input->post('iduser');
		$rating= $this->input->post('rating');
		$feedbackComent= $this->input->post('feedbackComent');
		
		$querycrc = $this->db->query("SELECT COUNT(*) AS totalreview FROM `".$this->db->dbprefix('review')."` WHERE idcourses='".$idcourses."' AND iduser='".$iduser."'");
		$rowcrc = $querycrc->row();
		$totalreview = $rowcrc->totalreview;
		
		
		if($totalreview>=1)
		{
			$queryidr = $this->db->query("SELECT idreview  FROM `".$this->db->dbprefix('review')."` WHERE idcourses='".$idcourses."' AND iduser='".$iduser."'");
			$rowidr = $queryidr->row();
			$idreview = $rowidr->idreview;
			$data=array(
			'rating'=>$rating,
			'coment'=>$feedbackComent,
			'date'=>date('Y-m-d')
			);	
			$clause=array(
			'idreview'=>$idreview,
			'idcourses'=>$idcourses,
			'iduser'=>$iduser
			);
			$this->model->update($this->db->dbprefix('review'),$data,$clause);
			
			$msg=array(	
				'msg'=>'true',
				'msg_success'=>lang('feedback_msg_success')
			);	
			echo json_encode($msg);
		}
		else
		{	
			$data=array(	
			'idcourses'=>$idcourses,
			'iduser'=>$iduser,
			'rating'=>$rating,
			'coment'=>$feedbackComent,
			'date'=>date('Y-m-d')
			);	
			$this->model->save_db_json($this->db->dbprefix('review'),$data);
			
			$msg=array(	
				'msg'=>'true',
				'msg_success'=>lang('feedback_msg_success')
			);	
			echo json_encode($msg);
		}
	}
	
	public function instructorsdetail($iduser)
    {
		$language = $this->session->userdata('language');
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		$idlanguage = $rowlanguage->idlanguage;
		
		$data = array();
		
		$logged_in = $this->session->userdata('logged_in');
		if (!$logged_in) {

			$data['logged_in'] = "false";
		}
		else
		{
			$data['logged_in'] = $logged_in;
		}
		$data['menu'] = "academy/instructorsdetail/".$iduser;
		$data['idusers'] = $this->session->userdata('iduser');
		$data['fullname'] = $this->session->userdata('fullname');
		$data['roles'] = $this->session->userdata('roles');
		$data['email'] = $this->session->userdata('email');
		$data['username'] = $this->session->userdata('username');
		$data['profilepicture'] = $this->session->userdata('profilepicture');
		$data['instructure'] = $iduser;
		$data['menutitle'] = lang('profile_instructors');
		$data['idlanguage'] = $rowlanguage->idlanguage;
		
		$conditionspage = array();
		$conditionspage['search']['iduser'] = $iduser;
        $totalRec = count($this->model->getRowsInstructorCourses($idlanguage,$conditionspage));
		//echo $totalRec;
		//exit();
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'learning/ajaxPaginationDataInstructors';
        //$config['total_rows']  = $totalRec;
		$config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
		$config['uri_segment']   = '4';
        $this->ajax_pagination_instructors->initialize($config);
		
		$conditions = array();
		$conditions['search']['iduser'] = $iduser;
        $conditions['limit'] = $this->perPage;
		$conditions['search']['iduser'] = $iduser;
        
        //get the posts data
        $data['posts'] = $this->model->getRowsInstructorCourses($idlanguage,$conditions);
		
		$data['content'] = 'learning/profile';
		$data['meta'] = 'learning/meta_profile';
		$data['css'] = 'learning/css_profile';
		$data['javascript'] = 'learning/js_profile';
		$this->load->view('home/home',$data);
    }
	
	function ajaxPaginationDataInstructors(){
		$language = $this->session->userdata('language');
		$querylanguage = $this->db->query("SELECT idlanguage FROM `".$this->db->dbprefix('language')."` WHERE LOWER(language)='".$language."'");
		$rowlanguage = $querylanguage->row();
		$idlanguage = $rowlanguage->idlanguage;
		
        $conditions = array();
        
        //calc offset number
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        
        //set conditions for search
        $iduser = $this->input->post('iduser');
        $conditionspage['search']['iduser'] = $iduser;
        
        //total rows count
        //$totalRec = count($this->model->getRows($idlanguage,array($conditions)));
		$totalRec = count($this->model->getRowsInstructorCourses($idlanguage, $conditionspage));
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'learning/ajaxPaginationDataInstructors';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
		$config['uri_segment']   = '3';
        $this->ajax_pagination_instructors->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
		$conditions['search']['iduser'] = $iduser;
        
        //get posts data
        $data['posts'] = $this->model->getRowsInstructorCourses($idlanguage,$conditions);
        $data['idlanguage'] = $rowlanguage->idlanguage;
        //load the view
        $this->load->view('learning/ajax-pagination-data-profile', $data, false);
    }
}
?>