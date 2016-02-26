<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('removeChar')) {

	function removeChar($string) {
  		$string = str_replace(' ', '-', $string);
	   	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
	   	return preg_replace('/-+/', '-', $string);
	}
}