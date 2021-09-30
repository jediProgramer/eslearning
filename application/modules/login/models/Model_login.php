<?php
    class Model_login extends CI_Model
	{
		//var $tabel='meowcms_users';
		
		
		function __construct()
		{
			parent::__construct();
		}
		
		public function ceklogin($tabel,$email,$password,$roles,$active)
		{
			$this->db->where('email',$email);
			$this->db->where('password',$password);
			$this->db->where('roles',$roles);
			$this->db->where('active',$active);
			$query=$this->db->get($tabel);
			if($query->num_rows()>0)
			{
				return $query->result_array();
			}
		}
		
	}
?>