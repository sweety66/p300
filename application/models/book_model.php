<?php
class Book_Model extends CI_Model{

	public function saveBook($data){
		$this->db->insert('tbl_book', $data);
	}
}