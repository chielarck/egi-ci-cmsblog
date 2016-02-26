<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * @author 		: Egi Gusniawan Pradana
	 * @keterangan	: controller khusus untuk halaman admin
	 */

	public function _construct() {
		session_start();
	}

	public function index() {
		$cek = $this->session->userdata('logged_in');
		if(empty($cek)) {	
			$this->load->view('all/bg_top.php');
			$this->load->view('admin/bg_login.php');
			$this->load->view('all/bg_bottom.php');
		} else {			
			header('location:'.base_url().'admin/beranda');
		}
	}

	public function doLogin() {
		$u = $this->input->post('username',TRUE);
		$p = $this->input->post('password',TRUE);
		$_SESSION['ses_kcfinder']=array();
        $_SESSION['ses_kcfinder']['disabled'] = false;
        $_SESSION['ses_kcfinder']['uploadURL'] = "../content_upload";			
		$this->app_model->getLogin($u,$p);
	}

	public function beranda() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)) {
			$this->load->view('all/bg_top.php');
			$this->load->view('all/bg_head.php');			
			$this->load->view('all/bg_sidebar.php');
			$this->load->view('admin/bg_home.php');
			$this->load->view('all/bg_bottom.php');
		} else {
			header('location:'.base_url().'admin');
		}
	}

	public function berita() {
		$cek = $this->session->userdata('logged_in');		
		if(!empty($cek)) {
			$page=$this->uri->segment(3);
			$limit=8;
			if(!$page) {
				$offset = 0;
			} else {
				$offset = $page;
			}	

			$data['berita'] = $this->app_model->getBerita('berita',$limit,$offset);
			$total_hal = $this->app_model->getAllBerita('berita');
			$config['base_url'] = base_url() . 'admin/berita';
			$config['total_rows'] = $total_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

			$this->pagination->initialize($config);
			$data['paginator'] =$this->pagination->create_links();

			$this->load->view('all/bg_top.php');
			$this->load->view('all/bg_head.php');			
			$this->load->view('all/bg_sidebar.php');
			$this->load->view('admin/bg_berita.php',$data);
			$this->load->view('all/bg_bottom.php');
		} else {
			header('location:'.base_url().'admin');
		}
	}

	public function tambahBerita() {
		$cek = $this->session->userdata('logged_in');
		$data['id'] =  autoNumber('berita','id','BR');
		$data['kategori'] = $this->app_model->getKategoriBy('kategori','Berita');
		if(!empty($cek)) {
			$this->load->view('all/bg_top.php');
			$this->load->view('all/bg_head.php');			
			$this->load->view('all/bg_sidebar.php');
			$this->load->view('admin/bg_tambah_berita.php',$data);
			$this->load->view('all/bg_bottom.php');
		} else {
			header('location:'.base_url().'admin');
		}
	}

	public function doTambahBerita() {	
		$data['id']	= $this->input->post('id_berita',TRUE);
		$ext = end((explode(".", $_FILES["gambar_berita"]["name"])));
		$this->upload->initialize(array(	
					"allowed_types"	=> "gif|jpg|png",
					"file_name"		=> $data['id'].'.'.$ext,			
					"upload_path"	=> FCPATH."assets/berita"
		));		
		$file = $this->upload->data();
		$this->upload->do_upload("gambar_berita");
	
		$data['judul_berita']	= $this->input->post('judul_berita',TRUE);
		$data['isi_berita']		= $this->input->post('isi_berita',TRUE);
		$data['kategori']		= $this->input->post('kategori',TRUE);
		$data['tgl']			= strtotime(date('Y-m-d H:i:s'));
		$data['status']			= $this->input->post('status',TRUE);
		$data['gambar_berita']	= $file['file_name'];

		$this->app_model->insertBerita('berita',$data);
		header('location:'.base_url().'admin/berita');
	}

	public function editBerita() {
		$cek = $this->session->userdata('logged_in');
		$data['data'] = $this->app_model->getEditBerita('berita',$this->uri->segment(3));
		$data['kategori'] = $this->app_model->getKategoriBy('kategori','Berita');
		if(!empty($cek)) {
			$this->load->view('all/bg_top.php');
			$this->load->view('all/bg_head.php');			
			$this->load->view('all/bg_sidebar.php');
			$this->load->view('admin/bg_edit_berita.php',$data);
			$this->load->view('all/bg_bottom.php');
		} else {
			header('location:'.base_url().'admin');
		}
	}

	public function doEditBerita() {
		$data['id']	= $this->input->post('id_berita',TRUE);
		$ext = end((explode(".", $_FILES["gambar_berita"]["name"])));
		$this->upload->initialize(array(	
					"allowed_types"	=> "gif|jpg|png",
					"file_name"		=> $data['id'].'.'.$ext,		
					"upload_path"	=> FCPATH."assets/berita"
		));		
		$file = $this->upload->data();
		if(!empty($_FILES['gambar_berita']['name'])) {
			$data['gambar_berita']	= $file['file_name'];		
		}			
			$this->upload->do_upload("gambar_berita");
			$id = $this->input->post('id_berita',TRUE);
			$where = array('id'=>$id);
			$data['judul_berita']	= $this->input->post('judul_berita',TRUE);
			$data['isi_berita']		= $this->input->post('isi_berita',TRUE);
			$data['kategori']		= $this->input->post('kategori',TRUE);
			$data['tgl']			= strtotime(date('Y-m-d H:i:s'));
			$data['status']			= $this->input->post('status',TRUE);					

			$this->app_model->goEditBerita('berita',$data,$where);
			header('location:'.base_url().'admin/berita');
	}


	public function hapusBerita() {
		$getId 	= $this->input->post('check');
		$data['kategori'] = $this->app_model->getKategoriBy('kategori','Berita');
		if(!empty($getId)) {			
			if(isset($_POST['hapus'])) {
				foreach($getId as $x) {			
				$this->app_model->deleteBerita('berita',$x);
				unlink(FCPATH."assets/berita/".$x);
				}
				header('location:'.base_url().'admin/berita');
			}			
		} else {
			echo '<script>
					alert("Berita belum dipilih");
					document.location.href="berita";
				  </script>';
		}		
	}


	public function produk() {
		$cek = $this->session->userdata('logged_in');		
		if(!empty($cek)) {
			$page=$this->uri->segment(3);
			$limit=8;
			if(!$page) {
				$offset = 0;
			} else {
				$offset = $page;
			}	

			$data['produk'] = $this->app_model->getProduk('produk',$limit,$offset);
			$total_hal = $this->app_model->getAllBerita('produk');
			$config['base_url'] = base_url() . 'admin/produk';
			$config['total_rows'] = $total_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

			$this->pagination->initialize($config);
			$data['paginator'] =$this->pagination->create_links();

			$this->load->view('all/bg_top.php');
			$this->load->view('all/bg_head.php');			
			$this->load->view('all/bg_sidebar.php');
			$this->load->view('admin/bg_produk.php',$data);
			$this->load->view('all/bg_bottom.php');
		} else {
			header('location:'.base_url().'admin');
		}
	}

	public function tambahProduk() {
		$cek = $this->session->userdata('logged_in');
		$data['id'] =  autoNumber('produk','id','PR');
		$data['kategori'] = $this->app_model->getKategoriBy('kategori','Produk');
		if(!empty($cek)) {
			$this->load->view('all/bg_top.php');
			$this->load->view('all/bg_head.php');			
			$this->load->view('all/bg_sidebar.php');
			$this->load->view('admin/bg_tambah_produk.php',$data);
			$this->load->view('all/bg_bottom.php'); 
		} else {
			header('location:'.base_url().'admin');
		}
	}

	public function doTambahProduk() {	
		$data['id']		= $this->input->post('id_produk',TRUE);		
		$ext = end((explode(".", $_FILES["gambar_produk"]["name"])));
		$this->upload->initialize(array(	
					"allowed_types"	=> "gif|jpg|png",
					"file_name"		=> $data['id'].'.'.$ext,	
					"upload_path"	=> FCPATH."assets/produk"
		));		
		$file = $this->upload->data();
		$this->upload->do_upload("gambar_produk");
	
		$data['kategori']		= $this->input->post('kategori',TRUE);
		$data['nama_produk']	= $this->input->post('nama_produk',TRUE);
		$data['keterangan']		= $this->input->post('keterangan',TRUE);
		$data['gambar_produk']	= $file['file_name'];
		$data['status']			= $this->input->post('status',TRUE);

		$this->app_model->insertProduk('produk',$data);
		header('location:'.base_url().'admin/produk');
	}

	public function editProduk() {
		$cek = $this->session->userdata('logged_in');
		$data['data'] = $this->app_model->getEditProduk('produk',$this->uri->segment(3));
		$data['kategori'] = $this->app_model->getKategoriBy('kategori','Produk');
		if(!empty($cek)) {
			$this->load->view('all/bg_top.php');
			$this->load->view('all/bg_head.php');			
			$this->load->view('all/bg_sidebar.php');
			$this->load->view('admin/bg_edit_produk.php',$data);
			$this->load->view('all/bg_bottom.php');
		} else {
			header('location:'.base_url().'admin');
		}
	}

	public function doEditProduk() {
		$id = $this->input->post('id_produk',TRUE);
		$where = array('id'=>$id);
		$ext = end((explode(".", $_FILES["gambar_produk"]["name"])));
		$this->upload->initialize(array(	
					"allowed_types"	=> "gif|jpg|png",
					"file_name"		=> $id.'.'.$ext,	
					"upload_path"	=> FCPATH."assets/produk"
		));		
		$file = $this->upload->data();
		if(!empty( $_FILES["gambar_produk"]["name"])) {
			$data['gambar_produk']	= $file['file_name'];						
		}			
			$this->upload->do_upload("gambar_produk");					
			$data['nama_produk']	= $this->input->post('nama_produk',TRUE);
			$data['keterangan']		= $this->input->post('keterangan',TRUE);
			$data['kategori']		= $this->input->post('kategori',TRUE);	
			$data['status']			= $this->input->post('status',TRUE);					

			$this->app_model->goEditProduk('produk',$data,$where);
			header('location:'.base_url().'admin/produk');
	}	

	public function hapusProduk() {
		$getId 	= $this->input->post('check');	
		$data['kategori'] = $this->app_model->getKategoriBy('kategori','Produk');	
		if(!empty($getId)) {			
			if(isset($_POST['hapus'])) {
				foreach($getId as $x) {				
				$this->app_model->deleteProduk('produk',$x);
				unlink(FCPATH."assets/produk/".$x);
				}
				header('location:'.base_url().'admin/produk');
			}
			
		} else {
			echo '<script>
					alert("produk belum dipilih");
					document.location.href="produk";
				  </script>';
		}		
	}


	/******KATEGORI******/

	public function kategori() {
		$cek = $this->session->userdata('logged_in');		
		if(!empty($cek)) {
			$page=$this->uri->segment(3);
			$limit=8;
			if(!$page) {
				$offset = 0;
			} else {
				$offset = $page;
			}	

			$data['kategori'] = $this->app_model->getKategori('kategori',$limit,$offset);
			$total_hal = $this->app_model->getAllKategori('kategori');
			$config['base_url'] = base_url() . 'admin/kategori/';
			$config['total_rows'] = $total_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

			$this->pagination->initialize($config);
			$data['paginator'] =$this->pagination->create_links();

			$this->load->view('all/bg_top.php');
			$this->load->view('all/bg_head.php');			
			$this->load->view('all/bg_sidebar.php');
			$this->load->view('admin/bg_kategori.php',$data);
			$this->load->view('all/bg_bottom.php');
		} else {
			header('location:'.base_url().'admin');
		}
	}

	public function tambahKategori() {
		$cek = $this->session->userdata('logged_in');		
		if(!empty($cek)) {
			$data['id'] =  autoNumber('kategori','id','KG');
			$this->load->view('all/bg_top.php');
			$this->load->view('all/bg_head.php');			
			$this->load->view('all/bg_sidebar.php');
			$this->load->view('admin/bg_tambah_kategori.php',$data);
			$this->load->view('all/bg_bottom.php');
		} else {
			header('location:'.base_url().'admin');
		}
	}

	public function doTambahKategori() {	
		$data['id']	= $this->input->post('id_kategori',TRUE);		
		$data['jenis_kategori']	= $this->input->post('jenis_kategori',TRUE);
		$data['nama_kategori']	= strtolower($this->input->post('nama_kategori',TRUE));	
		
		$x = $this->app_model->insertKategori('kategori',$data);
		if($x == false) {
			echo '<script>
					alert("Nama Kategori sudah digunakan");
					document.location.href="tambahKategori";
				  </script>';	
		} else {
			header('location:'.base_url().'admin/kategori');
		}
		
	}

	public function editKategori() {
		$cek = $this->session->userdata('logged_in');
		$data['data'] = $this->app_model->getEditKategori('kategori',$this->uri->segment(3));
		$data['kategori'] = $this->app_model->getKategoriBy('kategori','Produk');
		if(!empty($cek)) {
			$this->load->view('all/bg_top.php');
			$this->load->view('all/bg_head.php');			
			$this->load->view('all/bg_sidebar.php');
			$this->load->view('admin/bg_edit_kategori.php',$data);
			$this->load->view('all/bg_bottom.php');
		} else {
			header('location:'.base_url().'admin');
		}
	}

	public function doEditKategori() {
		$id = $this->input->post('id_kategori',TRUE);
		$where = array('id'=>$id);
		$data['nama_kategori']	= strtolower($this->input->post('nama_kategori',TRUE));	
		$data['jenis_kategori']	= $this->input->post('jenis_kategori',TRUE);		

		$this->app_model->goEditHalaman('kategori',$data,$where);
		header('location:'.base_url().'admin/kategori');
	}

	public function hapusKategori() {
		$data 	= $this->input->post('check');
		if(!empty($data)) {				
			if(isset($_POST['hapus'])) {
				foreach($data as $x) {
				$id['id'] = $x;
				$this->app_model->deleteHalaman('kategori',$id);
				}
				header('location:'.base_url().'admin/kategori');
			}			
		} else {
			echo '<script>
					alert("Kategori belum dipilih");
					document.location.href="kategori";
				  </script>';
		}		
	}

	/******END KATEGORI******/



	/******HALAMAN******/

	public function halaman() {
		$cek = $this->session->userdata('logged_in');		
		if(!empty($cek)) {
			$page=$this->uri->segment(3);
			$limit=8;
			if(!$page) {
				$offset = 0;
			} else {
				$offset = $page;
			}	

			$data['halaman'] = $this->app_model->getHalaman('halaman',$limit,$offset);
			$total_hal = $this->app_model->getAllHalaman('halaman');
			$config['base_url'] = base_url() . 'admin/halaman/';
			$config['total_rows'] = $total_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

			$this->pagination->initialize($config);
			$data['paginator'] =$this->pagination->create_links();

			$this->load->view('all/bg_top.php');
			$this->load->view('all/bg_head.php');			
			$this->load->view('all/bg_sidebar.php');
			$this->load->view('admin/bg_halaman.php',$data);
			$this->load->view('all/bg_bottom.php');
		} else {
			header('location:'.base_url().'admin');
		}
	}

	public function tambahHalaman() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)) {
			$data['id'] =  autoNumber('halaman','id','HL');
			$this->load->view('all/bg_top.php');
			$this->load->view('all/bg_head.php');			
			$this->load->view('all/bg_sidebar.php');
			$this->load->view('admin/bg_tambah_halaman.php',$data);
			$this->load->view('all/bg_bottom.php');
		} else {
			header('location:'.base_url().'admin');
		}
	}

	public function doTambahHalaman() {	
		$data['id']				= $this->input->post('id_halaman',TRUE);		
		$data['judul_halaman']	= $this->input->post('judul_halaman',TRUE);
		$data['isi_halaman']	= $this->input->post('isi_halaman',TRUE);
		$data['url_halaman']	= strtolower(removeChar($this->input->post('judul_halaman',TRUE)));
		$data['status']			= $this->input->post('status',TRUE);

		$this->app_model->insertHalaman('halaman',$data);
		header('location:'.base_url().'admin/halaman');
	}

	public function editHalaman() {
		$cek = $this->session->userdata('logged_in');
		$data['data'] = $this->app_model->getEditHalaman('halaman',$this->uri->segment(3));
		if(!empty($cek)) {
			$this->load->view('all/bg_top.php');
			$this->load->view('all/bg_head.php');			
			$this->load->view('all/bg_sidebar.php');
			$this->load->view('admin/bg_edit_halaman.php',$data);
			$this->load->view('all/bg_bottom.php');
		} else {
			header('location:'.base_url().'admin');
		}
	}

	public function doEditHalaman() {
		$id = $this->input->post('id_halaman',TRUE);
		$where = array('id'=>$id);
		$data['judul_halaman']	= $this->input->post('judul_halaman',TRUE);
		$data['isi_halaman']	= $this->input->post('isi_halaman',TRUE);	
		$data['url_halaman']	= strtolower(removeChar($this->input->post('judul_halaman',TRUE)));	
		$data['status']			= $this->input->post('status',TRUE);

		$this->app_model->goEditHalaman('halaman',$data,$where);
		header('location:'.base_url().'admin/halaman');
	}

	public function hapusHalaman() {
		$data 	= $this->input->post('check');

		if(!empty($data)) {			
			if(isset($_POST['hapus'])) {
				foreach($data as $x) {
				$id['id'] = $x;
				$this->app_model->deleteHalaman('halaman',$id);
				}
				header('location:'.base_url().'admin/halaman');
			}
			
		} else {
			echo '<script>
					alert("Halaman belum dipilih");
					document.location.href="halaman";
				  </script>';
		}		
	}
	/******END HALAMAN******/



	/******GALLERY******/

	public function gallery() {
		$cek = $this->session->userdata('logged_in');		
		if(!empty($cek)) {
			$page=$this->uri->segment(3);
			$limit=8;
			if(!$page) {
				$offset = 0;
			} else {
				$offset = $page;
			}	

			$data['gallery'] = $this->app_model->getGallery('gallery',$limit,$offset);
			$total_hal = $this->app_model->getAllGallery('gallery');
			$config['base_url'] = base_url() . 'admin/gallery/';
			$config['total_rows'] = $total_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

			$this->pagination->initialize($config);
			$data['paginator'] =$this->pagination->create_links();

			$this->load->view('all/bg_top.php');
			$this->load->view('all/bg_head.php');			
			$this->load->view('all/bg_sidebar.php');
			$this->load->view('admin/bg_gallery.php',$data);
			$this->load->view('all/bg_bottom.php');
		} else {
			header('location:'.base_url().'admin');
		}
	}


	public function actGallery() {	
		$data 	= $this->input->post('check');
		$this->upload->initialize(array(	
					"allowed_types"	=> "gif|jpg|png",
					"file_name"		=> $_FILES["files"]["name"],		
					"upload_path"	=> FCPATH."assets/gallery"
			));		
		$file = $this->upload->data();	
			if(isset($_POST['hapus'])) {
				if(!empty($data)) {
					foreach($data as $x) {
						$id['nama_file'] = $x;						
						$this->app_model->deleteGallery('gallery',$id);
						unlink(FCPATH."assets/gallery/".$x);										
					}										
					header('location:'.base_url().'admin/gallery');
				} else {
					echo '<script>
							alert("Hapus gagal ! pilih foto terlebih dahulu");
							document.location.href="gallery";
						  </script>';
				}
			} elseif(isset($_POST['upload'])) {				
				if($this->upload->do_multi_upload("files")) {
					foreach($file['file_name'] as $key) {
						$foto['nama_file'] = $key;
						$this->app_model->insertGallery('gallery',$foto);
					}
					header('location:'.base_url().'admin/gallery');
				}else {
					echo '<script>
							alert("gagal upload");
							document.location.href="gallery";
						  </script>';
				}
			} else {
				echo '<script>
						alert("belum memilih foto");
						document.location.href="gallery";
					  </script>';
			}
	}

	/******END GALLERY******/



	/******MENU******/

	public function menu() {
		$cek = $this->session->userdata('logged_in');		
		
		if(!empty($cek)) {
			$page=$this->uri->segment(3);
			$limit=8;
			if(!$page) {
				$offset = 0;
			} else {
				$offset = $page;
			}	

			$data['menu'] = $this->app_model->getMenu('menu',$limit,0);
			$data['halaman'] = $this->app_model->getAllHalaman('halaman');
			$data['kategori'] = $this->app_model->getAllKategori('kategori');
			$total_hal = $this->app_model->getAllMenu('menu');
			$config['base_url'] = base_url() . 'admin/menu/';
			$config['total_rows'] = $total_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

			$this->pagination->initialize($config);
			$data['paginator'] =$this->pagination->create_links();
			$this->load->view('all/bg_top.php');
			$this->load->view('all/bg_head.php');			
			$this->load->view('all/bg_sidebar.php');
			$this->load->view('admin/bg_menu.php',$data);
			$this->load->view('all/bg_bottom.php');
		} else {
			header('location:'.base_url().'admin');
		}
	}

	public function tambahMenu() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)) {
			$this->load->view('all/bg_top.php');
			$this->load->view('all/bg_head.php');			
			$this->load->view('all/bg_sidebar.php');
			$this->load->view('admin/bg_tambah_menu.php');
			$this->load->view('all/bg_bottom.php');
		} else {
			header('location:'.base_url().'admin');
		}
	}

	public function doTambahMenuHal() {			
		$getHal				= $this->input->post('halaman_menu',TRUE);
		foreach($getHal as $x) {
			$data['nama_menu'] = $x;
			$data['jenis_menu']	= 'primary';		
			$data['url_menu']	= base_url().'page/'.strtolower(removeChar($x));
			$data['for'] = 'page';	
			$data['status']		= 'tampil';
			$this->app_model->insertMenu('menu',$data);
		}		
		header('location:'.base_url().'admin/menu');
	}

	public function doTambahMenuKat() {			
		$getHal				= $this->input->post('kategori_menu',TRUE);
		foreach($getHal as $x) {
			$data['nama_menu'] = ucwords($x);
			$data['jenis_menu']	= 'primary';		
			$data['url_menu']	= base_url().'category/'.strtolower(removeChar($x));	
			$data['for'] = 'category';	
			$data['status']		= 'tampil';
			$this->app_model->insertMenu('menu',$data);
		}		
		header('location:'.base_url().'admin/menu');
	}

	public function doTambahMenuLink() {			
		$data['nama_menu'] = $this->input->post('nama_menu',TRUE);
		$data['jenis_menu']	= 'primary';		
		$data['url_menu']	= $this->input->post('url_menu',TRUE);
		$data['status']		= 'tampil';
		$this->app_model->insertMenu('menu',$data);
			
		header('location:'.base_url().'admin/menu');
	}

	public function editMenu() {
		$cek = $this->session->userdata('logged_in');
		$data['data'] = $this->app_model->getEditMenu('menu',$this->uri->segment(3));
		$data['all_menu'] = $this->app_model->getListMenu('menu',$this->uri->segment(3));
		if(!empty($cek)) {
			$this->load->view('all/bg_top.php');
			$this->load->view('all/bg_head.php');			
			$this->load->view('all/bg_sidebar.php');
			$this->load->view('admin/bg_edit_menu.php',$data);
			$this->load->view('all/bg_bottom.php');
		} else {
			header('location:'.base_url().'admin');
		}
	}

	public function doEditMenu() {
		$id = $this->input->post('id_menu',TRUE);
		$where = array('id_menu'=>$id);
		$data['jenis_menu']	= $this->input->post('jenis_menu',TRUE);
		$data['nama_menu']	= $this->input->post('nama_menu',TRUE);	
		$data['status']		= $this->input->post('status',TRUE);
		if($this->input->post('for_menu',TRUE) == null) {
			$data['url_menu']	= $this->input->post('url_menu',TRUE);	
		} else {
			$data['url_menu']	= base_url().$this->input->post('for_menu',TRUE).'/'.strtolower(removeChar($this->input->post('nama_menu',TRUE)));		
		}
		
		

		$this->app_model->goEditMenu('menu',$data,$where);
		header('location:'.base_url().'admin/menu');
	}

	public function hapusMenu() {
		$where = array('id_menu'=>$this->uri->segment(3));
		$this->app_model->deleteMenu('menu',$where);
		header('location:'.base_url().'admin/menu');		
	}

	/******END MENU******/		




	public function banner() {
		$cek = $this->session->userdata('logged_in');		
		$data['banner'] = $this->app_model->getBanner('banner');
		if(!empty($cek)) {
			$this->load->view('all/bg_top.php');
			$this->load->view('all/bg_head.php');			
			$this->load->view('all/bg_sidebar.php');
			$this->load->view('admin/bg_banner.php',$data);
			$this->load->view('all/bg_bottom.php');
		} else {
			header('location:'.base_url().'admin');
		}
	}


	public function actBanner() {
		$getId 	= $this->input->post('check');
		if(!empty($getId)) {			
			if(isset($_POST['edit'])) {
				if(count($getId) > 1) {
					echo '<script>
							alert("Hanya dapat memilih satu banner");
							document.location.href="banner";
						  </script>';
				} else {
					foreach($getId as $x) {
						//$id['id'] 	= $x;
						$data['data'] 		= $this->app_model->getIdBanner('banner',$x);
					}
				}
				$this->load->view('all/bg_top.php');
				$this->load->view('all/bg_sidebar.php');
				$this->load->view('admin/bg_edit_banner.php',$data);
				$this->load->view('all/bg_bottom.php');
			}		
			
		} else {
			echo '<script>
					alert("Banner belum dipilih");
					document.location.href="banner";
				  </script>';
		}		
	}

	public function editBanner() {
		$getId= $this->input->post('id_banner',TRUE);
		$ext = end((explode(".", $_FILES["gambar_banner"]["name"])));
		$this->upload->initialize(array(	
					"allowed_types"	=> "gif|jpg|png",
					"file_name"		=> $getId.'.'.$ext,		
					"upload_path"	=> FCPATH."assets/banner"
		));		
		$file = $this->upload->data();
		$where = array('id'=>$getId);
		if(!empty($_FILES['gambar_banner']['name'])) {
			$data['nama_file']	= $file['file_name'];	
			$this->upload->do_upload("gambar_banner");
			$this->app_model->editBanner('banner',$data,$where);
			header('location:'.base_url().'admin/banner');
		} else {
			header('location:'.base_url().'admin/banner');
		}
		
	}


	public function logout() {
		$cek = $this->session->userdata('logged_in');
		if(empty($cek)) {
			header('location:'.base_url().'admin');
		}
		else {
			$this->session->destroy();
			header('location:'.base_url().'admin');
		}
	}

}