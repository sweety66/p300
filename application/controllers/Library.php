<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library extends CI_Controller {

	public function index(){
		$this->home();
	}

	public function home(){
		$data=array();
		$data['title']='Library Management System';
		$data['header']=$this->load->view('inc/header',$data,TRUE);
		$data['sidebar']=$this->load->view('inc/sidebar','',TRUE);
		$data['content']=$this->load->view('inc/content','',TRUE);
		$this->load->view('home',$data);
	}
}
