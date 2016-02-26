<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('limitText')) {

	function limitText($str,$limit) {
		$str = wordwrap($str, $limit);
		$str = explode("\n", $str);
		$str = $str[0] . '...';
		return $str;
	}
}