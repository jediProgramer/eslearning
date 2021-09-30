<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Paymentreport extends CI_Controller {
 
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
		$data['data']=$this->model->ambildataByBtwn($this->db->dbprefix('order'),'status','2','3');
		$data['content'] = 'paymentreport/list';
		$data['css'] = 'paymentreport/css';
		$data['javascript'] = 'paymentreport/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function validate()
    {
		$idorder = $this->session->userdata('idorder');
		
		$queryorder = $this->db->query("SELECT * FROM `".$this->db->dbprefix('order')."` WHERE idorder =".$do["idorder"]."");
		$roworder = $queryorder->row();
		$idorder=$roworder->idorder;
		$iduser=$roworder->iduser;
		$idcourses=$roworder->idcourses;
		$idorder=$roworder->idorder;
		$price=$roworder->price;
		$datepayment=$roworder->datepayment;
		
		$data=array(
		'idpayment'=>$idorder,
		'iduser'=>$iduser,
		'idcourses'=>$idcourses,
		'idorder'=>$idorder,
		'price'=>$price,
		'datepayment'=>$datepayment
		);
		
		$this->model->simpandata($this->db->dbprefix('payment'),$data);
		
		$data_update=array(	
			'status'=>'3'
			);
		$clause=array('idorder'=>$idorder);
		$this->model->update($this->db->dbprefix('order'),$data_update,$clause);
		
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('paymentreport'));
	}	
	
}
?>