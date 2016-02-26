<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	/**
	 * @author 		: Egi Gusniawan Pradana
	 * @keterangan	: controller khusus untuk halaman admin
	 */

	public function index() {
		$data['product'] = $this->app_model->getContentProduk('produk',9,0);
		$data['berita']  = $this->app_model->getContentBerita('berita',3,0);
		$this->load->view('template/egiest-style1/bg_top.php');
		$this->load->view('template/egiest-style1/bg_page_product.php',$data);
		$this->load->view('template/egiest-style1/bg_bottom.php');
	}


	public function detail($id,$title) {
		$data['berita']  = $this->app_model->getContentBerita('berita',3,0);
		$data['product'] = $this->app_model->getDetailProduk('produk',$id);
		$this->load->view('template/egiest-style1/bg_top.php');
		$this->load->view('template/egiest-style1/bg_product.php',$data);
		$this->load->view('template/egiest-style1/bg_bottom.php');
	}
}