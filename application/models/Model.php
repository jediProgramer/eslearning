<?php
    class Model extends CI_Model
	{
		private $tabledb;	

		private $fields= array();

		private $data= array();

		private $clause = array();
		
		function __construct()
		{
			parent::__construct();
		}
		
		function simpandata($tabel,$data)
		{
			$this->db->insert($tabel,$data);
		}
		
		public function update($table,$data,$clause='') 
		{	

			if ($clause!='')
			{	//Update data berdasarkan id

				return $this->db->update($table,$data,$clause);
			}
			else
			{	//Update seluruh data di table
				return $this->db->update($table,$data);
			}
		}
		
		public function select($table,$clause='') 
		{			
			if($clause!='')
			{	//Pilih data berdasarkan id

				$this->query=$this->db->get_where($table,$clause);
			}
			else
			{  // pilih semua data
				$this->query=$this->db->get($table);
			}
			return $this->query->result();
		}
		
		public function ambildata($tabel)
		{
			$row=array();
			$sql=$this->db->query("SELECT * FROM $tabel");
			if($sql->num_rows()>0)
			{
				$row=$sql->result_array();
			}
			return $row;
		}
		
		public function ambildataOrder($tabel,$order,$param)
		{
			$row=array();
			$sql=$this->db->query("SELECT * FROM $tabel ORDER BY $param $order");
			if($sql->num_rows()>0)
			{
				$row=$sql->result_array();
			}
			return $row;
		}
		
		public function ambildataById($tabel,$iduser,$isi)
		{
			$row=array();
			$sql=$this->db->query("SELECT * FROM $tabel WHERE $iduser='".$isi."'");
			if($sql->num_rows()>0)
			{
				$row=$sql->result_array();
			}
			return $row;
		}
		
		public function ambildataByBtwn($tabel,$k1,$i1,$i2)
		{
			$row=array();
			$sql=$this->db->query("SELECT * FROM $tabel WHERE $k1 BETWEEN '".$i1."' AND '".$i2."'");
			if($sql->num_rows()>0)
			{
				$row=$sql->result_array();
			}
			return $row;
		}
		
		public function ambildataByIdStatus($tabel,$iduser,$isi,$status,$isistatus)
		{
			$row=array();
			$sql=$this->db->query("SELECT * FROM $tabel WHERE $iduser='".$isi."' AND $status='".$isistatus."'");
			if($sql->num_rows()>0)
			{
				$row=$sql->result_array();
			}
			return $row;
		}
		
		public function ambildataByIdOrder($tabel,$iduser,$isi,$order)
		{
			$row=array();
			$sql=$this->db->query("SELECT * FROM $tabel WHERE $iduser='".$isi."' ORDER by ".$order." DESC");
			if($sql->num_rows()>0)
			{
				$row=$sql->result_array();
			}
			return $row;
		}
		
		function selectbox($tabel,$order)
		{
			$sqlprov ="SELECT * FROM  ".$tabel." ORDER BY ".$order."";
			$q = $this->db->query($sqlprov);
			return $q->result();
		}
		
		function selectboxbyid($tabel,$col,$order,$id)
		{
			$sqlkokab ="SELECT * FROM  ".$tabel." WHERE ".$col."='".$id."' ORDER BY ".$order."";
			$q = $this->db->query($sqlkokab);
			return $q->result();
		}
		
		public function insertFotos($data = array()){
			$insert = $this->db->insert_batch('filesfoto',$data);
			return $insert?true:false;
		}
		
		function data($tabel,$number,$offset,$order)
		{
			$sqlprov ="SELECT * FROM  ".$tabel." ORDER BY ".$order." DESC LIMIT ".$number.",".$offset." ";
			$q = $this->db->query($sqlprov);
			return $q->result();
		}
		
		function jumlah_data($tabel)
		{
			return $this->db->get($tabel)->num_rows();
		}
		
		function data_search($tabel,$number,$offset,$order,$keyword)
		{
			$sqlprov ="SELECT * FROM  ".$tabel." WHERE title LIKE '%".$keyword."%' ORDER BY ".$order." DESC LIMIT ".$number.",".$offset." ";
			$q = $this->db->query($sqlprov);
			return $q->result();
		}
		
		function jumlah_data_search($tabel,$keyword)
		{
			$sql="SELECT * FROM  ".$tabel." WHERE title LIKE '%".$keyword."%'";
			$query = $this->db->query($sql);
			return $query->num_rows();
		}

		function search_courses($title,$idlanguage){
			$this->db->like('title', $title , 'both');
			$this->db->where('idlanguage=', $idlanguage);
			$this->db->order_by('title', 'ASC');
			$this->db->limit(10);
			return $this->db->get('courses')->result();
		}
		
		function save_db_json($dbname,$data){
			$result=$this->db->insert($dbname,$data);
			return $result;
		}
		
		function get_data($idvalue,$idlangaugevalue,$database,$idsql,$idlanguagesql){
			$query = $this->db->get_where($database, array($idsql => $idvalue, $idlanguagesql => $idlangaugevalue));
			return $query;
		}
		
		function getRows($idlanguage,$params = array()){
			$this->db->select('*');
			$this->db->from('courses');
			$this->db->where('idlanguage=', $idlanguage);
			$this->db->where('idcoursetype=', '2');
			//print_r($params);
			//exit();
			
			//filter data by searched keywords
			if(!empty($params['search']['keywords']))
			{
				$this->db->like('title',$params['search']['keywords']);
			}
			
			//sort data by ascending or desceding order
			if(!empty($params['search']['sortBy']))
			{
				if($params['search']['sortBy']=="lastest")
				{
				   $this->db->order_by('date','desc');
				}
				else if($params['search']['sortBy']=="top") 
				{
					$this->db->where('favorite>=','50');
				}
			}	
			
			//sort data by category
			if(!empty($params['search']['category']))
			{
				if($params['search']['category']!="0")
				{
					$this->db->where('idcategory=',$params['search']['category']);
				}
			}	
			
			//sort data by subcategory
			if(!empty($params['search']['subcategory']))
			{
				if($params['search']['subcategory']!="0")
				{
					$this->db->where('idsubcategory=',$params['search']['subcategory']);
				}
			}	
			
			//set start and limit
			if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
				$this->db->limit($params['limit'],$params['start']);
			}elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
				$this->db->limit($params['limit']);
			}
			//get records
			$query = $this->db->get();
			
			if($query->num_rows() > 0)
			{
				return ($query->num_rows() > 0)?$query->result_array():FALSE;
			}
			else
			{
				return $query->result_array();
			}		
			//return fetched data
			//return ($query->num_rows() > 0)?$query->result_array():FALSE;
		}
		
		function getRowsInstructorCourses($idlanguage,$params = array()){
			
			//filter data by searched keywords
			if(!empty($params['search']['iduser']))
			{
				$param="AND b.iduser='".$params['search']['iduser']."'";
			}
			else
			{
				$param="";
			}	

			$sql="SELECT * FROM  ".$this->db->dbprefix('courses')." a, ".$this->db->dbprefix('instructors')." b WHERE a.idcourses=b.idcourses AND a.idlanguage='".$idlanguage."' ".$param." ";
			
			//get records
			$query = $this->db->query($sql);
			
			if($query->num_rows() > 0)
			{
				return ($query->num_rows() > 0)?$query->result_array():FALSE;
			}
			else
			{
				return $query->result_array();
			}		
		}
		
		function getRowsMY($month,$years){
			
			//filter data by searched keywords
			if(!empty($month))
			{
				$param_month="WHERE month(date) ='".$month."'";
			}
			else
			{
				$param_month="";
			}

			if(!empty($years))
			{
				$param_years="AND year(date) ='".$years."'";
			}
			else
			{
				$param_years="";
			}		

			$sql="SELECT * FROM  ".$this->db->dbprefix('payment')." ".$param_month." ".$param_years." ";
			
			//get records
			$query = $this->db->query($sql);
			
			if($query->num_rows() > 0)
			{
				return ($query->num_rows() > 0)?$query->result_array():FALSE;
			}
			else
			{
				return $query->result_array();
			}		
		}

	}
?>