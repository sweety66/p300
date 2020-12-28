<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('dep_model');
		$data=array();
	}
	public function adddepartment(){
		$data['title']='Add Department Name';
		$data['header']=$this->load->view('inc/header',$data,TRUE);
		$data['sidebar']=$this->load->view('inc/sidebar','',TRUE);
		$data['depadd']=$this->load->view('inc/departmentadd','',TRUE);
		$this->load->view('adddepartment',$data);
	}
	public function addDepartmentForm(){
		$data['depname'] = $this->input->post('depname');
		
		$depname = $data['depname'];
		if (empty($depname)){
			$sdata = array();
			$sdata['msg'] = '<span style="color:red">Field Must not be Empty !</span>';
			$this->session->set_flashdata($sdata);
			redirect("department/adddepartment");
		}else{
			$this->dep_model->saveDepartment($data);
			$sdata = array();
			$sdata['msg'] = '<span style="color:green">Data Added Succesfully !</span>';
			$this->session->set_flashdata($sdata);
			redirect("department/adddepartment");
		}
	}
	public function departmentlist(){
		$data['title']	='Department List';
		$data['header']	=$this->load->view('inc/header',$data,TRUE);
		$data['sidebar']=$this->load->view('inc/sidebar','',TRUE);
		$data['depdata']= $this->dep_model->getAllDepartmentData();
		$data['listdep']=$this->load->view('inc/listdepartment',$data,TRUE);
		$this->load->view('departmentlist',$data);
	}
	public function editdepartment($id){
		$data['title']='Edit Department';
		$data['header']=$this->load->view('inc/header',$data,TRUE);
		$data['sidebar']=$this->load->view('inc/sidebar','',TRUE);
		$data['depById']= $this->dep_model->getDepartmentById($id);
		$data['editdep']=$this->load->view('inc/depedit',$data,TRUE);
		$this->load->view('editdepartment', $data);
	}
	public function updateDepartment(){
		$data['depid'] = $this->input->post('depid');
		$data['depname'] = $this->input->post('depname');
		$depid = $data['depid'];
		$depname = $data['depname'];
		if (empty($depname)){
			$sdata = array();
			$sdata['msg'] = '<span style="color:red">Field Must not be Empty !</span>';
			$this->session->set_flashdata($sdata);
			redirect("department/editdepartment/".$depid);
		}else{
			$this->dep_model->UpdateDepName($data);
			$sdata = array();
			$sdata['msg'] = '<span style="color:green">Data Updated Succesfully !</span>';
			$this->session->set_flashdata($sdata);
			redirect("department/editdepartment/".$depid);
		}
	}
	public function deldepartment($id){
		$this->dep_model->delDepartmentByid($id);
		$sdata = array();
		$sdata['msg'] = '<span style="color:green">Data Deleted Succesfully !</span>';
		$this->session->set_flashdata($sdata);
		redirect("department/departmentlist");
	}
}