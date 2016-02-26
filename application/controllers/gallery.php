<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {

	/**
	 * @author 		: Egi Gusniawan Pradana
	 * @keterangan	: controller khusus untuk halaman admin
	 */

	public function index() {
		$this->load->view('template/egiest-style1/bg_top.php');
		$this->load->view('template/egiest-style1/bg_page_gallery.php');
		$this->load->view('template/egiest-style1/bg_bottom.php');
	}

	public function detail($id) {
		$this->load->view('template/egiest-style1/bg_top.php');
		$this->load->view('template/egiest-style1/bg_gallery.php');
		$this->load->view('template/egiest-style1/bg_bottom.php');
	}
}