<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	/**
	 * @author 		: Egi Gusniawan Pradana
	 * 
	 */

	public function index() {
		$this->load->view('template/egiest-style1/bg_top.php');
		$this->load->view('template/egiest-style1/bg_page_news.php');
		$this->load->view('template/egiest-style1/bg_bottom.php');
	}

	public function detail($id) {
		$this->load->view('template/egiest-style1/bg_top.php');
		$this->load->view('template/egiest-style1/bg_news.php');
		$this->load->view('template/egiest-style1/bg_bottom.php');
	}
}