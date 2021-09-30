<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Incomereport extends CI_Controller {
 
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
		$this->load->library('pdf');
	}
	
	function day($bulan)
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
		$day=$dayname;
		return $day;
	}
	
	function money($nilai, $pecahan = 0) 
	{
		return number_format($nilai, $pecahan, ',', '.');
	}
	
	public function index()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataOrder($this->db->dbprefix('payment'),'DESC','date');
		$data['content'] = 'incomereport/list';
		$data['css'] = 'incomereport/css';
		$data['javascript'] = 'incomereport/js';
		$this->load->view('admin/admin',$data);
    }
	
	function filterdate(){
		
		$month = $this->input->post('month');
		$years = $this->input->post('years');
		
        $data['data'] = $this->model->getRowsMY($month,$years);
        //load the view
        $this->load->view('incomereport/filterdata', $data, false);
    }	
	
	public function reportprint($month,$years)
    {
		$month=$month;
		$years=$years;
		
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
		
		$split=explode('-',$years."-".$month);
		$year_t=$split[0];
		$moth_t=$split[1];
		$month_c=$this->day($moth_t);
		
		$html_content ="<!DOCTYPE html>
			<html lang='en'>
			  <head>
				<meta charset='utf-8'>
				<title>".lang('icome_report')." - ".$month_c." ".$year_t."</title>
				<!-- Google Font -->
				<link href='https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap' rel='stylesheet'>  
			  </head>
			  <body>
				  <div id='logo'>
					<img src='http://localhost/codedume/assets/codedume/img/logo.png' >
				  </div>
				  <h1>".lang('icome_report').", ".$month_c." ".$year_t."</h1>
				<br/><br/>  
				<table id='example1' class='table table-bordered table-striped'>
				<thead>
				<tr>
				  <th>".lang('no')."</th>
				  <th>".lang('courses')."</th>
				  <th>".lang('name')."</th>
				  <th>".lang('date_payment')."</th>
				  <th>".lang('amount_payment_adm')."</th>
				</tr>
				</thead>
				<tbody>";
					$i = 0;	
					$total=0;
					$query_r = $this->db->query("SELECT * FROM  ".$this->db->dbprefix('payment')." ".$param_month." ".$param_years."");
					$data=$query_r->result(); 	
					foreach($data as $do)
					{ 
					$i++;
					
					$querycourses = $this->db->query("SELECT * FROM `".$this->db->dbprefix('courses')."` WHERE idcourses='".$do->idcourses."'");
					$rowcorses = $querycourses->row();
					$title=$rowcorses->title;
					$price=$rowcorses->price;
					
					$queryuser = $this->db->query("SELECT * FROM `".$this->db->dbprefix('users')."` WHERE iduser='".$do->iduser."'");
					$rowuser = $queryuser->row();
					$fullname=$rowuser->fullname;
					
					$split=explode('-',$do->date);
					$tahun=$split[0];
					$bulan=$split[1];
					$tgl=$split[2];
					$bulanind=$this->day($bulan);
					
					$total=$total+$do->price;	
				$html_content .="<tr>
				  <td>#".$do->idpayment."</td>
				  <td>".$title."</td>
				  <td>".$fullname."</td>
				  <td>".$tgl." ".$bulanind." ".$tahun."</td>
				  <td>".lang('curency_ind')." ".$this->money($do->price)."</td>
				</tr>";
					}
				$html_content .="</tbody>
				<tfoot>
				<tr>
				  <th colspan='4'><center>".lang('total')."</center></th>
				  <th>".lang('curency_ind')." ".$this->money($total)."</th>
				</tr>
				</tfoot>
				</table>
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
				  background-color: #000000;
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
		$this->pdf->stream(lang('icome_report')." - ".$month_c." ".$year_t.".pdf", array("Attachment"=>0));
    }
	
}
?>