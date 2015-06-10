<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('student_model','std');
	}

	public function index()
	{
		//$query = $this->db->get('student'); $data['rows'] = $query->result();
		$data['rows'] = $this->std->getStudent();
		$this->load->view('student/index',$data);
	}

	public function create()
	{
		$this->load->view('student/create');
	}

	public function store()
	{
		// $data = [
		// 			'name' => $this->input->post('txtname'),
		// 			'sex' => $this->input->post('txtsex'),
		// 			'adr' => $this->input->post('txtadr')
		// 		];
		$data = $this->input->post();
		if(!empty($data['name'] && $data['sex'] && $data['adr'])){
			$this->db->insert('student',$data);
			redirect('student/index');
		}
		else	
		{
			echo "Empty";
			// redirect('student/create');
		}
	}

	public function edit($id)
	{
		// $data['row'] = $this->std->getStudentEdit($id);
		$query = $this->db->get_where('student',['id' => $id]);
		$data['row'] = $query->row(); //return only 1 item or row
		$this->load->view('student/edit',$data);
	}

	public function update()
	{
		// $id = $this->input->post('txtid');
		$data = $this->input->post(); 
			// [
			// 'name' => $this->input->post('txtname'),
			// 'sex' => $this->input->post('txtsex'),
			// 'adr' => $this->input->post('txtadr')
			// ];
		$this->db->where('id',$data['id'])->update('student',$data);
		redirect('student/index');
	}

	public function destroy($id)
	{
		$this->db->where('id',$id)->delete('student');
		redirect('student/index');
	}
}
