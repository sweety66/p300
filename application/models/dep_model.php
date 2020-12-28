<?php
class Dep_Model extends CI_Model{

	public function saveDepartment($data){
		$this->db->insert('tbl_dep', $data);
	}
	public function getAllDepartmentData(){
		$this->db->select('*');
		$this->db->from('tbl_dep');
		$this->db->order_by('depid', 'desc');
		$qresult = $this->db->get();
		$result  = $qresult->result();
		return $result; 
	}
	public function getDepartmentById($id){
		$this->db->select('*');
		$this->db->from('tbl_dep');
		$this->db->where('depid',$id);
		$qresult = $this->db->get();
		$result  = $qresult->row();
		return $result; 
	}
	public function UpdateDepName($data){
		$this->db->set('depname', $data['depname']);
		$this->db->where('depid',$data['depid']);
		$this->db->update('tbl_dep');
	}
	public function delDepartmentByid($id){
		$this->db->where('depid',$id);
		$this->db->delete('tbl_dep');
	}
}