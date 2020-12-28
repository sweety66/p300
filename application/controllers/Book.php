<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('book_model');
		$data=array();
	}
	public function addbook(){
		$data['title']='Add New Book';
		$data['header']=$this->load->view('inc/header',$data,TRUE);
		$data['sidebar']=$this->load->view('inc/sidebar','',TRUE);
		$data['content']=$this->load->view('inc/addbook',$data,TRUE);
		$this->load->view('home',$data);
	}
	public function addBookForm(){
		$data['bookname'] = $this->input->post('bookname');
		$data['dep']  = $this->input->post('dep');
		$data['author'] = $this->input->post('author');

		$name = $data['bookname'];
		$dep  = $data['dep'];
		$author = $data['author'];
		if (empty($name) && empty($dep) && empty($author)){
			$sdata = array();
			$sdata['msg'] = '<span style="color:red">Field Must not be Empty !</span>';
			$this->session->set_flashdata($sdata);
			redirect("book/addbook");
		}else{
			$this->book_model->saveBook($data);
			$sdata = array();
			$sdata['msg'] = '<span style="color:green">Book Data Added Succesfully !</span>';
			$this->session->set_flashdata($sdata);
			redirect("book/addbook");
		}
	}
}