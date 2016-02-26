<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {

	public function index() {
		$data['banner'] = $this->app_model->getContentBanner('banner');
		$data['berita'] = $this->app_model->getContentBerita('berita',3,0);
		$data['produk'] = $this->app_model->getContentProduk('produk',8,0);
		$data['gallery'] = $this->app_model->getContentGallery('gallery',6,0);
		$this->load->view('template/egiest-style1/bg_top.php');
		$this->load->view('template/egiest-style1/bg_content.php',$data);
		$this->load->view('template/egiest-style1/bg_bottom.php');
	}

	public function page() {
		$data['page'] = $this->app_model->getDetailHalaman('halaman',$this->uri->segment(2));
		$this->load->view('template/egiest-style1/bg_top.php');
		$this->load->view('template/egiest-style1/tes.php',$data);
		$this->load->view('template/egiest-style1/bg_bottom.php');
	}
}