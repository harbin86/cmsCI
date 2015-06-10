<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

	
	public function getStudent()
	{
		$query = $this->db->get('student');
		return $query->result();
	}

	public function getStudentEdit($id)
	{
		// $this->db->where('id',$id);
		// $query = $this->db->where('id',$id)->get('student');
		$query = $this->db->get_where('student',['id' => $id]);
		return $query->row(); //return only 1 item or row
	}
}
