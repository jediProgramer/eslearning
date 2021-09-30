<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Permissions extends CI_Controller {
 
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
		$data['dataroles']=$this->model->ambildataById($this->db->dbprefix('roles'),'iduser',$data['iduser']);
		$data['content'] = 'permissions/listpermissions';
		$data['css'] = 'permissions/css';
		$data['javascript'] = 'permissions/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambahpermissions($idroles)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idroles'] = $idroles;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datarolesglobal']=$this->model->ambildataById($this->db->dbprefix('roles'),'idroles',$data['idroles']);
		$data['dataactivitylog']=$this->model->ambildata($this->db->dbprefix('userlogs'));
		$data['content'] = 'permissions/tambahpermissions';
		$data['css'] = 'permissions/css';
		$data['javascript'] = 'permissions/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function savepermissions() 
	{
		$idroles=$this->input->post('idroles');
		$queryz = $this->db->query("SELECT * FROM ".$this->db->dbprefix('permissions')." WHERE idroles='".$idroles."'");
		if ($queryz->num_rows() >= 1)
		{
			$query = $this->db->query("SELECT * FROM ".$this->db->dbprefix('navigation')."");
			$datanav=$query->result();
			foreach ($datanav as $dn)
			{
				$queryz = $this->db->query("SELECT * FROM ".$this->db->dbprefix('subnavigation')." WHERE idnavigation='$dn->idnavigation'");
				if ($queryz->num_rows() >= 1)
				{
					
					$datasubnav=$queryz->result();
					foreach ($datasubnav as $dsn)
					{
						$data=array(	
						'idnavcategory'=>$this->input->post("idnavcategorysparent$dn->idnavigation"),
						'idnavigation'=>$this->input->post("idnavigationsparent$dn->idnavigation"),
						'idsubnavigation'=>$this->input->post("idsunavigationchild$dsn->idsubnavigation"),
						'users_access'=>$this->input->post("permissionschild$dsn->idsubnavigation")
						);
						$clause=array('idsubnavigation'=>$dsn->idsubnavigation,'idroles'=>$idroles);
						$this->model->update($this->db->dbprefix('permissions'),$data,$clause);
					}
				}
				else
				{	
					$data=array(	
						'idnavcategory'=>$this->input->post("idnavcategorysparent$dn->idnavigation"),
						'idnavigation'=>$this->input->post("idnavigationsparent$dn->idnavigation"),
						'idsubnavigation'=>0,
						'users_access'=>$this->input->post("permissionsparent$dn->idnavigation")
					);
					$clause=array('idnavigation'=>$dn->idnavigation,'idroles'=>$idroles);
					$this->model->update($this->db->dbprefix('permissions'),$data,$clause);
				}	
			}
		}
		else
		{
			$query = $this->db->query("SELECT * FROM ".$this->db->dbprefix('navigation')."");
			$datanav=$query->result();
			foreach ($datanav as $dn)
			{
				$queryz = $this->db->query("SELECT * FROM ".$this->db->dbprefix('subnavigation')." WHERE idnavigation='$dn->idnavigation'");
				if ($queryz->num_rows() >= 1)
				{
					
					$datasubnav=$queryz->result();
					foreach ($datasubnav as $dsn)
					{
						$data=array(	
						'idroles'=>$idroles,
						'idnavcategory'=>$this->input->post("idnavcategorysparent$dn->idnavigation"),
						'idnavigation'=>$this->input->post("idnavigationsparent$dn->idnavigation"),
						'idsubnavigation'=>$this->input->post("idsunavigationchild$dsn->idsubnavigation"),
						'users_access'=>$this->input->post("permissionschild$dsn->idsubnavigation")
						);
						$this->model->simpandata($this->db->dbprefix('permissions'),$data);
					}
				}
				else
				{	
					$data=array(	
						'idroles'=>$idroles,
						'idnavcategory'=>$this->input->post("idnavcategorysparent$dn->idnavigation"),
						'idnavigation'=>$this->input->post("idnavigationsparent$dn->idnavigation"),
						'idsubnavigation'=>0,
						'users_access'=>$this->input->post("permissionsparent$dn->idnavigation")
					);
					$this->model->simpandata($this->db->dbprefix('permissions'),$data);
				}	
			}
		}
		$this->session->set_flashdata('msg_success',lang('save_success'));			
		redirect(site_url('permissions'));
	}
}
?>