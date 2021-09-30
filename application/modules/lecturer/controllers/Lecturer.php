<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Lecturer extends CI_Controller {
 
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
	}
	
	public function index()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['daftarlecturer']=$this->model->ambildata($this->db->dbprefix('lecturer'));
		$data['content'] = 'lecturer/listlecturer';
		$data['css'] = 'lecturer/css';
		$data['javascript'] = 'lecturer/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambahlecturer()
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['datapangkat']=$this->model->selectbox($this->db->dbprefix('pangkat'),'idpangkat');
		$data['datagolongan']=$this->model->selectbox($this->db->dbprefix('golongan'),'golongan');
		$data['datajafung']=$this->model->selectbox($this->db->dbprefix('jafung'),'idjafung');
		$data['datajabatan']=$this->model->selectbox($this->db->dbprefix('jabatan'),'idjabatan');
		$data['dataprodi']=$this->model->selectbox($this->db->dbprefix('prodi'),'prodi');
		$data['datakbk']=$this->model->selectbox($this->db->dbprefix('kbk'),'idkbk');
		$data['content'] = 'lecturer/tambahlecturer';
		$data['css'] = 'lecturer/css';
		$data['javascript'] = 'lecturer/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function editlecturer($idlecturer)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idlecturer'] = $idlecturer;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('lecturer'),'idlecturer',$data['idlecturer']);
		$data['datagolongan']=$this->model->selectbox($this->db->dbprefix('golongan'),'idgolongan');
		$data['datapangkat']=$this->model->selectbox($this->db->dbprefix('pangkat'),'idpangkat');
		$data['datajafung']=$this->model->selectbox($this->db->dbprefix('jafung'),'idjafung');
		$data['datajabatan']=$this->model->selectbox($this->db->dbprefix('jabatan'),'idjabatan');
		$data['dataprodi']=$this->model->selectbox($this->db->dbprefix('prodi'),'prodi');
		$data['datakbk']=$this->model->selectbox($this->db->dbprefix('kbk'),'idkbk');
		$data['content'] = 'lecturer/editlecturer';
		$data['css'] = 'lecturer/css';
		$data['javascript'] = 'lecturer/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function viewlecturer($idlecturer)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idlecturer'] = $idlecturer;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('lecturer'),'idlecturer',$data['idlecturer']);
		$data['datapendidikan']=$this->model->ambildataById($this->db->dbprefix('education'),'idlecturer',$data['idlecturer']);
		$data['datapengajaran']=$this->model->ambildataById($this->db->dbprefix('teach'),'idlecturer',$data['idlecturer']);
		$data['datapenelitian']=$this->model->ambildataById($this->db->dbprefix('research'),'idlecturer',$data['idlecturer']);
		$data['datapengabdian']=$this->model->ambildataById($this->db->dbprefix('dedication'),'idlecturer',$data['idlecturer']);
		$data['datapublikasi']=$this->model->ambildataById($this->db->dbprefix('publication'),'idlecturer',$data['idlecturer']);
		$data['datapenghargaan']=$this->model->ambildataById($this->db->dbprefix('reward'),'idlecturer',$data['idlecturer']);
		$data['datahki']=$this->model->ambildataById($this->db->dbprefix('hki'),'idlecturer',$data['idlecturer']);
		$data['content'] = 'lecturer/viewlecturer';
		$data['css'] = 'lecturer/css';
		$data['javascript'] = 'lecturer/js';
		$data['profil'] = 'lecturer/profildosen';
		$data['pendidikan'] = 'lecturer/listpendidikan';
		$data['pengajaran'] = 'lecturer/listpengajaran';
		$data['penelitian'] = 'lecturer/listpenelitian';
		$data['pengabdian'] = 'lecturer/listpengabdian';
		$data['publikasi'] = 'lecturer/listpublikasi';
		$data['penghargaan'] = 'lecturer/listpenghargaan';
		$data['hki'] = 'lecturer/listhki';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambaheducation($idlecturer)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idlecturer'] = $idlecturer;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('lecturer'),'idlecturer',$data['idlecturer']);
		$data['datajenjang']=$this->model->ambildata($this->db->dbprefix('jenjang'));
		$data['datanegara']=$this->model->ambildata($this->db->dbprefix('countries'));
		$data['content'] = 'lecturer/tambaheducation';
		$data['css'] = 'lecturer/css';
		$data['javascript'] = 'lecturer/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambahteach($idlecturer)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idlecturer'] = $idlecturer;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('lecturer'),'idlecturer',$data['idlecturer']);
		$data['datasemester']=$this->model->ambildata($this->db->dbprefix('semester'));
		$data['content'] = 'lecturer/tambahteach';
		$data['css'] = 'lecturer/css';
		$data['javascript'] = 'lecturer/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambahresearch($idlecturer)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idlecturer'] = $idlecturer;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('lecturer'),'idlecturer',$data['idlecturer']);
		$data['dataskema']=$this->model->ambildata($this->db->dbprefix('skema'));
		$data['datajenis']=$this->model->ambildata($this->db->dbprefix('jenis'));
		$data['content'] = 'lecturer/tambahresearch';
		$data['css'] = 'lecturer/css';
		$data['javascript'] = 'lecturer/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambahdedication($idlecturer)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idlecturer'] = $idlecturer;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('lecturer'),'idlecturer',$data['idlecturer']);
		$data['dataskemapengabdian']=$this->model->ambildata($this->db->dbprefix('skemapengabdian'));
		$data['content'] = 'lecturer/tambahdedication';
		$data['css'] = 'lecturer/css';
		$data['javascript'] = 'lecturer/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambahpublication($idlecturer)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idlecturer'] = $idlecturer;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('lecturer'),'idlecturer',$data['idlecturer']);
		$data['datapublikasi']=$this->model->ambildata($this->db->dbprefix('publikasi'));
		$data['content'] = 'lecturer/tambahpublication';
		$data['css'] = 'lecturer/css';
		$data['javascript'] = 'lecturer/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambahreward($idlecturer)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idlecturer'] = $idlecturer;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('lecturer'),'idlecturer',$data['idlecturer']);
		$data['content'] = 'lecturer/tambahreward';
		$data['css'] = 'lecturer/css';
		$data['javascript'] = 'lecturer/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function tambahhki($idlecturer)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idlecturer'] = $idlecturer;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('lecturer'),'idlecturer',$data['idlecturer']);
		$data['datajenishki']=$this->model->ambildata($this->db->dbprefix('jenishki'));
		$data['content'] = 'lecturer/tambahhki';
		$data['css'] = 'lecturer/css';
		$data['javascript'] = 'lecturer/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function editeducation($idlecturer,$ideducation)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idlecturer'] = $idlecturer;
		$data['ideducation'] = $ideducation;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('education'),'ideducation',$data['ideducation']);
		$data['datajenjang']=$this->model->ambildata($this->db->dbprefix('jenjang'));
		$data['datanegara']=$this->model->ambildata($this->db->dbprefix('countries'));
		$data['content'] = 'lecturer/editeducation';
		$data['css'] = 'lecturer/css';
		$data['javascript'] = 'lecturer/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function editteach($idlecturer,$idteach)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idlecturer'] = $idlecturer;
		$data['idteach'] = $idteach;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('teach'),'idteach',$data['idteach']);
		$data['datasemester']=$this->model->ambildata($this->db->dbprefix('semester'));
		$data['content'] = 'lecturer/editteach';
		$data['css'] = 'lecturer/css';
		$data['javascript'] = 'lecturer/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function editresearch($idlecturer,$idresearch)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idlecturer'] = $idlecturer;
		$data['idresearch'] = $idresearch;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('research'),'idresearch',$data['idresearch']);
		$data['dataskema']=$this->model->ambildata($this->db->dbprefix('skema'));
		$data['datajenis']=$this->model->ambildata($this->db->dbprefix('jenis'));
		$data['content'] = 'lecturer/editresearch';
		$data['css'] = 'lecturer/css';
		$data['javascript'] = 'lecturer/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function editdedication($idlecturer,$iddedication)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idlecturer'] = $idlecturer;
		$data['iddedication'] = $iddedication;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('dedication'),'iddedication',$data['iddedication']);
		$data['dataskemapengabdian']=$this->model->ambildata($this->db->dbprefix('skemapengabdian'));
		$data['content'] = 'lecturer/editdedication';
		$data['css'] = 'lecturer/css';
		$data['javascript'] = 'lecturer/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function editpublication($idlecturer,$idpublication)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idlecturer'] = $idlecturer;
		$data['idpublication'] = $idpublication;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('publication'),'idpublication',$data['idpublication']);
		$data['datapublikasi']=$this->model->ambildata($this->db->dbprefix('publikasi'));
		$data['content'] = 'lecturer/editpublication';
		$data['css'] = 'lecturer/css';
		$data['javascript'] = 'lecturer/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function editreward($idlecturer,$idreward)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idlecturer'] = $idlecturer;
		$data['idreward'] = $idreward;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('reward'),'idreward',$data['idreward']);
		$data['content'] = 'lecturer/editreward';
		$data['css'] = 'lecturer/css';
		$data['javascript'] = 'lecturer/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function edithki($idlecturer,$idhki)
    {
		$data['iduser'] = $this->session->userdata('iduser');
		$data['roles'] = $this->session->userdata('roles');
		$data['idlecturer'] = $idlecturer;
		$data['idhki'] = $idhki;
		$data['datauser']=$this->model->ambildataById($this->db->dbprefix('users'),'iduser',$data['iduser']);
		$data['data']=$this->model->ambildataById($this->db->dbprefix('hki'),'idhki',$data['idhki']);
		$data['datajenishki']=$this->model->ambildata($this->db->dbprefix('jenishki'));
		$data['content'] = 'lecturer/edithki';
		$data['css'] = 'lecturer/css';
		$data['javascript'] = 'lecturer/js';
		$this->load->view('admin/admin',$data);
    }
	
	public function savelecturer()
    {
		$iduser = $this->session->userdata('iduser');
		$config['upload_path'] = '../assets/files/lecturer/';
		$config['allowed_types'] = 'png|jpg';
		$config['max_size'] = '20480';
		$picture = $_FILES['picture']['name'];
		$path="../assets/files/lecturer/";
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload('picture'))
		{
			//$error=$this->upload->display_errors('<p>', '</p>');
			$this->session->set_flashdata('msg_error','File tidak bisa diupload, cek tipe file Anda');
			redirect(site_url('lecturer'));
		}
		else
		{	
			$config['image_library'] = 'gd2';
			$config['source_image'] = '../assets/files/lecturer/'.$picture;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 369;
			$config['height']      = 300;

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			$this->image_lib->clear();
			
			$data=array(	
			'iduser'=>$iduser,
			'nip'=>$this->input->post('nip'),
			'nidn'=>$this->input->post('nidn'),
			'fullname'=>$this->input->post('fullname'),
			'golongan'=>$this->input->post('golongan'),
			'pangkat'=>$this->input->post('pangkat'),
			'jafung'=>$this->input->post('jafung'),
			'jabatan'=>$this->input->post('jabatan'),
			'programmes'=>$this->input->post('programmes'),
			'kbk'=>$this->input->post('kbk'),
			'phoneno'=>$this->input->post('phoneno'),
			'email'=>$this->input->post('email'),
			'website'=>$this->input->post('website'),
			'picture'=>$picture,
			'address'=>$this->input->post('address'),
			'profile'=>$this->input->post('profile'),
			'research_areas'=>$this->input->post('research_areas'),
			'research_interests'=>$this->input->post('research_interests'),
			'sinta_id'=>$this->input->post('sinta_id'),
			'scopus_id'=>$this->input->post('scopus_id'),
			'google_scholar_id'=>$this->input->post('google_scholar_id')
			);
		}
		
		$this->model->simpandata($this->db->dbprefix('lecturer'),$data);
		$this->session->set_flashdata('msg_success','Data dosen sudah disimpan');			
		redirect(site_url('lecturer'));
	}	
	
	public function saveeducation()
    {
		$idlecturer=$this->input->post('idlecturer');
		$iduser = $this->session->userdata('iduser');
		$data=array(	
		'idlecturer'=>$this->input->post('idlecturer'),
		'iduser'=>$iduser,
		'jenjang'=>$this->input->post('jenjang'),
		'bidang_studi'=>$this->input->post('bidang_studi'),
		'perguruan_tinggi'=>$this->input->post('perguruan_tinggi'),
		'kota'=>$this->input->post('kota'),
		'negara'=>$this->input->post('negara'),
		'tahun_lulus'=>$this->input->post('tahun_lulus')
		);
		$this->model->simpandata($this->db->dbprefix('education'),$data);
		$this->session->set_flashdata('msg_success','Data pendidikan dosen sudah disimpan');			
		redirect(site_url('lecturer/viewlecturer/'.$idlecturer));
	}

	public function saveteach()
    {
		$idlecturer=$this->input->post('idlecturer');
		$iduser = $this->session->userdata('iduser');
		$data=array(	
		'idlecturer'=>$this->input->post('idlecturer'),
		'iduser'=>$iduser,
		'semester'=>$this->input->post('semester'),
		'tahun'=>$this->input->post('tahun'),
		'kode_mk'=>$this->input->post('kode_mk'),
		'nama_mk'=>$this->input->post('nama_mk'),
		'kode_kelas'=>$this->input->post('kode_kelas')
		);
		$this->model->simpandata($this->db->dbprefix('teach'),$data);
		$this->session->set_flashdata('msg_success','Data pengajaran dosen sudah disimpan');			
		redirect(site_url('lecturer/viewlecturer/'.$idlecturer));
	}	
	
	public function saveresearch()
    {
		$idlecturer=$this->input->post('idlecturer');
		$iduser = $this->session->userdata('iduser');
		$data=array(	
		'idlecturer'=>$this->input->post('idlecturer'),
		'iduser'=>$iduser,
		'skema'=>$this->input->post('skema'),
		'judul'=>$this->input->post('judul'),
		'jenis'=>$this->input->post('jenis'),
		'jabatan'=>$this->input->post('jabatan'),
		'tahun'=>$this->input->post('tahun')
		);
		$this->model->simpandata($this->db->dbprefix('research'),$data);
		$this->session->set_flashdata('msg_success','Data penelitian dosen sudah disimpan');			
		redirect(site_url('lecturer/viewlecturer/'.$idlecturer));
	}	
	
	public function savededication()
    {
		$idlecturer=$this->input->post('idlecturer');
		$iduser = $this->session->userdata('iduser');
		$data=array(	
		'idlecturer'=>$this->input->post('idlecturer'),
		'iduser'=>$iduser,
		'skema'=>$this->input->post('skema'),
		'judul'=>$this->input->post('judul'),
		'kota'=>$this->input->post('kota'),
		'jabatan'=>$this->input->post('jabatan'),
		'tahun'=>$this->input->post('tahun')
		);
		$this->model->simpandata($this->db->dbprefix('dedication'),$data);
		$this->session->set_flashdata('msg_success','Data pengabdian dosen sudah disimpan');			
		redirect(site_url('lecturer/viewlecturer/'.$idlecturer));
	}	
	
	public function savepublication()
    {
		$idlecturer=$this->input->post('idlecturer');
		$iduser = $this->session->userdata('iduser');
		$data=array(	
		'idlecturer'=>$this->input->post('idlecturer'),
		'iduser'=>$iduser,
		'jenis'=>$this->input->post('jenis'),
		'judul'=>$this->input->post('judul'),
		'penerbit'=>$this->input->post('penerbit'),
		'tahun'=>$this->input->post('tahun'),
		'volume'=>$this->input->post('volume'),
		'link'=>$this->input->post('link')
		);
		$this->model->simpandata($this->db->dbprefix('publication'),$data);
		$this->session->set_flashdata('msg_success','Data publikasi dosen sudah disimpan');			
		redirect(site_url('lecturer/viewlecturer/'.$idlecturer));
	}
	
	public function savereward()
    {
		$idlecturer=$this->input->post('idlecturer');
		$iduser = $this->session->userdata('iduser');
		$data=array(	
		'idlecturer'=>$this->input->post('idlecturer'),
		'iduser'=>$iduser,
		'penghargaan'=>$this->input->post('penghargaan'),
		'kategori'=>$this->input->post('kategori'),
		'lembaga'=>$this->input->post('lembaga'),
		'tahun'=>$this->input->post('tahun')
		);
		$this->model->simpandata($this->db->dbprefix('reward'),$data);
		$this->session->set_flashdata('msg_success','Data penghargaan dosen sudah disimpan');			
		redirect(site_url('lecturer/viewlecturer/'.$idlecturer));
	}
	
	public function savehki()
    {
		$idlecturer=$this->input->post('idlecturer');
		$iduser = $this->session->userdata('iduser');
		$data=array(	
		'idlecturer'=>$this->input->post('idlecturer'),
		'iduser'=>$iduser,
		'jenis'=>$this->input->post('jenis'),
		'judul'=>$this->input->post('judul'),
		'nomor'=>$this->input->post('nomor'),
		'lembaga'=>$this->input->post('lembaga'),
		'tahun'=>$this->input->post('tahun')
		);
		$this->model->simpandata($this->db->dbprefix('hki'),$data);
		$this->session->set_flashdata('msg_success','Data HKI dosen sudah disimpan');			
		redirect(site_url('lecturer/viewlecturer/'.$idlecturer));
	}
	
	public function updatelecturer()
    {
		$idlecturer=$this->input->post('idlecturer');
		$iduser = $this->session->userdata('iduser');
			
		if(!empty($_FILES['picture']['name']))
		{
			$config['upload_path'] = '../assets/files/lecturer/';
			$config['allowed_types'] = 'png|jpg';
			$config['max_size'] = '20480';
			$picture = $_FILES['picture']['name'];
			$path="../assets/files/lecturer/";
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('picture'))
			{
				//$error=$this->upload->display_errors('<p>', '</p>');
				$this->session->set_flashdata('msg_error','File tidak bisa diupload, cek tipe file Anda');
				redirect(site_url('lecturer'));
			}
			else
			{	
				$queryimg = $this->db->query("SELECT picture FROM `".$this->db->dbprefix('lecturer')."` WHERE idlecturer='".$idlecturer."'");
				$row = $queryimg->row();
				$imagepath="../assets/files/lecturer/".$row->picture;	
				unlink($imagepath);
				
				$file=$row->picture;
				$pieces = explode(".", $file);
				$nameimage=$pieces[0];
				$typeimage=$pieces[1];
				$thumb_file=$nameimage."_thumb.".$typeimage;
				$thumb_file_path="../assets/files/lecturer/".$thumb_file;
				unlink($thumb_file_path);
				
				$config['image_library'] = 'gd2';
				$config['source_image'] = '../assets/files/lecturer/'.$picture;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width']         = 600;
				$config['height']      = 400;

				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$this->image_lib->clear();
				
				$data=array(	
				'iduser'=>$iduser,
				'nip'=>$this->input->post('nip'),
				'nidn'=>$this->input->post('nidn'),
				'fullname'=>$this->input->post('fullname'),
				'golongan'=>$this->input->post('golongan'),
				'pangkat'=>$this->input->post('pangkat'),
				'jafung'=>$this->input->post('jafung'),
				'jabatan'=>$this->input->post('jabatan'),
				'programmes'=>$this->input->post('programmes'),
				'kbk'=>$this->input->post('kbk'),
				'phoneno'=>$this->input->post('phoneno'),
				'email'=>$this->input->post('email'),
				'website'=>$this->input->post('website'),
				'picture'=>$picture,
				'address'=>$this->input->post('address'),
				'profile'=>$this->input->post('profile'),
				'research_areas'=>$this->input->post('research_areas'),
				'research_interests'=>$this->input->post('research_interests'),
				'sinta_id'=>$this->input->post('sinta_id'),
				'scopus_id'=>$this->input->post('scopus_id'),
				'google_scholar_id'=>$this->input->post('google_scholar_id')
				);
			}
		}
		else
		{
			$data=array(	
			'iduser'=>$iduser,
			'nip'=>$this->input->post('nip'),
			'nidn'=>$this->input->post('nidn'),
			'fullname'=>$this->input->post('fullname'),
			'golongan'=>$this->input->post('golongan'),
			'pangkat'=>$this->input->post('pangkat'),
			'jafung'=>$this->input->post('jafung'),
			'jabatan'=>$this->input->post('jabatan'),
			'programmes'=>$this->input->post('programmes'),
			'kbk'=>$this->input->post('kbk'),
			'phoneno'=>$this->input->post('phoneno'),
			'email'=>$this->input->post('email'),
			'website'=>$this->input->post('website'),
			'address'=>$this->input->post('address'),
			'profile'=>$this->input->post('profile'),
			'research_areas'=>$this->input->post('research_areas'),
			'research_interests'=>$this->input->post('research_interests'),
			'sinta_id'=>$this->input->post('sinta_id'),
			'scopus_id'=>$this->input->post('scopus_id'),
			'google_scholar_id'=>$this->input->post('google_scholar_id')
			);
		}		
		$clause=array('idlecturer'=>$idlecturer);
		$this->model->update($this->db->dbprefix('lecturer'),$data,$clause);
		$this->session->set_flashdata('msg_success','Data dosen sudah diubah');			
		redirect(site_url('lecturer'));
	}
	
	public function updateeducation()
    {
		$ideducation=$this->input->post('ideducation');
		$idlecturer=$this->input->post('idlecturer');
		$iduser = $this->session->userdata('iduser');
		$data=array(
		'iduser'=>$iduser,
		'jenjang'=>$this->input->post('jenjang'),
		'bidang_studi'=>$this->input->post('bidang_studi'),
		'perguruan_tinggi'=>$this->input->post('perguruan_tinggi'),
		'kota'=>$this->input->post('kota'),
		'negara'=>$this->input->post('negara'),
		'tahun_lulus'=>$this->input->post('tahun_lulus')
		);
		$clause=array('ideducation'=>$ideducation);
		$this->model->update($this->db->dbprefix('education'),$data,$clause);
		$this->session->set_flashdata('msg_success','Data pendidikan dosen sudah diubah');			
		redirect(site_url('lecturer/viewlecturer/'.$idlecturer));
	}
	
	public function updateteach()
    {
		$idteach=$this->input->post('idteach');
		$idlecturer=$this->input->post('idlecturer');
		$iduser = $this->session->userdata('iduser');
		$data=array(
		'iduser'=>$iduser,
		'semester'=>$this->input->post('semester'),
		'tahun'=>$this->input->post('tahun'),
		'kode_mk'=>$this->input->post('kode_mk'),
		'nama_mk'=>$this->input->post('nama_mk'),
		'kode_kelas'=>$this->input->post('kode_kelas')
		);
		$clause=array('idteach'=>$idteach);
		$this->model->update($this->db->dbprefix('teach'),$data,$clause);
		$this->session->set_flashdata('msg_success','Data pengajaran dosen sudah diubah');			
		redirect(site_url('lecturer/viewlecturer/'.$idlecturer));
	}
	
	public function updateresearch()
    {
		$idresearch=$this->input->post('idresearch');
		$idlecturer=$this->input->post('idlecturer');
		$iduser = $this->session->userdata('iduser');
		$data=array(
		'iduser'=>$iduser,
		'skema'=>$this->input->post('skema'),
		'judul'=>$this->input->post('judul'),
		'jenis'=>$this->input->post('jenis'),
		'jabatan'=>$this->input->post('jabatan'),
		'tahun'=>$this->input->post('tahun')
		);
		$clause=array('idresearch'=>$idresearch);
		$this->model->update($this->db->dbprefix('research'),$data,$clause);
		$this->session->set_flashdata('msg_success','Data penelitian dosen sudah diubah');			
		redirect(site_url('lecturer/viewlecturer/'.$idlecturer));
	}
	
	public function updatededication()
    {
		$iddedication =$this->input->post('iddedication');
		$idlecturer=$this->input->post('idlecturer');
		$iduser = $this->session->userdata('iduser');
		$data=array(
		'iduser'=>$iduser,
		'skema'=>$this->input->post('skema'),
		'judul'=>$this->input->post('judul'),
		'kota'=>$this->input->post('kota'),
		'jabatan'=>$this->input->post('jabatan'),
		'tahun'=>$this->input->post('tahun')
		);
		$clause=array('iddedication'=>$iddedication );
		$this->model->update($this->db->dbprefix('dedication'),$data,$clause);
		$this->session->set_flashdata('msg_success','Data pengabdian dosen sudah diubah');			
		redirect(site_url('lecturer/viewlecturer/'.$idlecturer));
	}
	
	public function updatepublication()
    {
		$idpublication =$this->input->post('idpublication');
		$idlecturer=$this->input->post('idlecturer');
		$iduser = $this->session->userdata('iduser');
		$data=array(
		'iduser'=>$iduser,
		'jenis'=>$this->input->post('jenis'),
		'judul'=>$this->input->post('judul'),
		'penerbit'=>$this->input->post('penerbit'),
		'tahun'=>$this->input->post('tahun'),
		'volume'=>$this->input->post('volume'),
		'link'=>$this->input->post('link')
		);
		$clause=array('idpublication'=>$idpublication );
		$this->model->update($this->db->dbprefix('publication'),$data,$clause);
		$this->session->set_flashdata('msg_success','Data publikasi dosen sudah diubah');			
		redirect(site_url('lecturer/viewlecturer/'.$idlecturer));
	}
	
	public function updatereward()
    {
		$idreward=$this->input->post('idreward');
		$idlecturer=$this->input->post('idlecturer');
		$iduser = $this->session->userdata('iduser');
		$data=array(
		'iduser'=>$iduser,
		'penghargaan'=>$this->input->post('penghargaan'),
		'kategori'=>$this->input->post('kategori'),
		'lembaga'=>$this->input->post('lembaga'),
		'tahun'=>$this->input->post('tahun')
		);
		$clause=array('idreward'=>$idreward);
		$this->model->update($this->db->dbprefix('reward'),$data,$clause);
		$this->session->set_flashdata('msg_success','Data penghargaan dosen sudah diubah');			
		redirect(site_url('lecturer/viewlecturer/'.$idlecturer));
	}
	
	public function updatehki()
    {
		$idhki=$this->input->post('idhki');
		$idlecturer=$this->input->post('idlecturer');
		$iduser = $this->session->userdata('iduser');
		$data=array(
		'iduser'=>$iduser,
		'jenis'=>$this->input->post('jenis'),
		'judul'=>$this->input->post('judul'),
		'nomor'=>$this->input->post('nomor'),
		'lembaga'=>$this->input->post('lembaga'),
		'tahun'=>$this->input->post('tahun')
		);
		$clause=array('idhki'=>$idhki);
		$this->model->update($this->db->dbprefix('hki'),$data,$clause);
		$this->session->set_flashdata('msg_success','Data HKI dosen sudah diubah');			
		redirect(site_url('lecturer/viewlecturer/'.$idlecturer));
	}

	function deletelecturer()
    {
        $idlecturer=$this->input->post('idlecturer');
		
		$queryimg = $this->db->query("SELECT picture FROM `".$this->db->dbprefix('lecturer')."` WHERE idlecturer='".$idlecturer."'");
		$row = $queryimg->row();
		$picturepath="../assets/files/lecturer/".$row->picture;	
		unlink($picturepath);
		
		$file=$row->picture;
		$pieces = explode(".", $file);
		$nameimage=$pieces[0];
		$typeimage=$pieces[1];
		$thumb_file=$nameimage."_thumb.".$typeimage;
		$thumb_file_path="../assets/files/lecturer/".$thumb_file;
		unlink($thumb_file_path);
		
		$this->db->where('idlecturer', $idlecturer);
        $this->db->delete($this->db->dbprefix('lecturer'));
        $this->session->set_flashdata('msg_success','Data dosen sudah dihapus');			
		redirect(site_url('lecturer'));
    }	
	
	function deleteeducation()
    {
        $ideducation=$this->input->post('ideducation');
		$idlecturer=$this->input->post('idlecturer');
		$this->db->where('ideducation', $ideducation);
        $this->db->delete($this->db->dbprefix('education'));
        $this->session->set_flashdata('msg_success','Data pendidikan dosen sudah dihapus');			
		redirect(site_url('lecturer/viewlecturer/'.$idlecturer));
    }
	
	function deleteteach()
    {
        $idteach=$this->input->post('idteach');
		$idlecturer=$this->input->post('idlecturer');
		$this->db->where('idteach', $idteach);
        $this->db->delete($this->db->dbprefix('teach'));
        $this->session->set_flashdata('msg_success','Data pengajaran dosen sudah dihapus');			
		redirect(site_url('lecturer/viewlecturer/'.$idlecturer));
    }
	
	function deleteresearch()
    {
        $idresearch=$this->input->post('idresearch');
		$idlecturer=$this->input->post('idlecturer');
		$this->db->where('idresearch', $idresearch);
        $this->db->delete($this->db->dbprefix('research'));
        $this->session->set_flashdata('msg_success','Data penelitian dosen sudah dihapus');			
		redirect(site_url('lecturer/viewlecturer/'.$idlecturer));
    }
	
	function deletededication()
    {
        $iddedication=$this->input->post('iddedication');
		$idlecturer=$this->input->post('idlecturer');
		$this->db->where('iddedication', $iddedication);
        $this->db->delete($this->db->dbprefix('dedication'));
        $this->session->set_flashdata('msg_success','Data pengabdian dosen sudah dihapus');			
		redirect(site_url('lecturer/viewlecturer/'.$idlecturer));
    }
	
	function deletepublication()
    {
        $idpublication=$this->input->post('idpublication');
		$idlecturer=$this->input->post('idlecturer');
		$this->db->where('idpublication', $idpublication);
        $this->db->delete($this->db->dbprefix('publication'));
        $this->session->set_flashdata('msg_success','Data publikasi dosen sudah dihapus');			
		redirect(site_url('lecturer/viewlecturer/'.$idlecturer));
    }
	
	function deletereward()
    {
        $idreward=$this->input->post('idreward');
		$idlecturer=$this->input->post('idlecturer');
		$this->db->where('idreward', $idreward);
        $this->db->delete($this->db->dbprefix('reward'));
        $this->session->set_flashdata('msg_success','Data penghargaan dosen sudah dihapus');			
		redirect(site_url('lecturer/viewlecturer/'.$idlecturer));
    }
	
	function deletehki()
    {
        $idhki=$this->input->post('idhki');
		$idlecturer=$this->input->post('idlecturer');
		$this->db->where('idhki', $idhki);
        $this->db->delete($this->db->dbprefix('hki'));
        $this->session->set_flashdata('msg_success','Data HKI dosen sudah dihapus');			
		redirect(site_url('lecturer/viewlecturer/'.$idlecturer));
    }
	
}
?>