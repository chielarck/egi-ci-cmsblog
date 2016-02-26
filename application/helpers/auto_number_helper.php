<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('autoNumber')) {

	function autoNumber($table,$field,$str) {
		$CI = get_instance();
		$CI->load->model('app_model');
		$get = $CI->app_model->getNum($table,$field);
		foreach($get->result_array() as $b) { 
			if($b['id'] == '') {
				$no = $str.'1';
			} else {
				$loop = $b['id'];
				$loop++;
				$no = $loop;
			}
		}
		return $no;
	}
}