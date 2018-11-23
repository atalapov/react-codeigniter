<?php
function load_theme($name, $vars = array()){
	$default = array(
		'title' => '',
		'subtitle' => ''
	);
	$data = array_merge($default,$vars);
	$CI =& get_instance();
    $CI->load->view('template/header',$data);
    $CI->load->view($name,$data);
    $CI->load->view('template/footer',$data);
}
function load_theme_sidebar($name, $vars = array()){
	$default = array(
		'title' => '',
		'subtitle' => ''
	);
	$data = array_merge($default,$vars);
	$CI =& get_instance();
    $CI->load->view('template/header',$data);
    $CI->load->view('template/sidebar',$data);
    $CI->load->view($name,$data);
    $CI->load->view('template/footer',$data);
}
function get_content_header(){
	$CI->load->view('template/sidebar',$data);
}
function get_content_footer(){
	$CI->load->view('template/sidebar',$data);
}
function get_breadcome(){
	$CI->load->view('template/sidebar',$data);
}