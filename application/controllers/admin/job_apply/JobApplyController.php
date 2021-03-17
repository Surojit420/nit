<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobApplyController extends CI_Controller 
{
	 
	function __construct()
	{
	  	parent::__construct(); 		
		$this->load->helper(array('common_helper', 'string', 'form', 'security'));
		$this->load->library(array('form_validation', 'email'));
		$this->load->model('CommonModel');
				

	}	

	public function job_apply()
	{
		$this->db->where('status <>', 'Delete');
		$this->db->order_by('id', 'desc');
		$job_apply_data=$this->db->get('tbl_job_apply')->result();
		$this->data['job_apply_data']=$job_apply_data;

		$this->data['page_title']='NNIT | Job Apply';
		$this->data['subview']='job_apply/job_apply';
		$this->load->view('admin/layout/default', $this->data);
	}

	// public function status()
	// {
	// 	$uniqcode=$this->input->post('uniqcode');
	// 	$this->db->where('status <>', 'Delete');
	// 	$this->db->where('uniqcode', $uniqcode);
	// 	$get_data=$this->db->get('tbl_job_summary')->row();

	// 	if($get_data->status=='Active')
	// 	{
	// 		$data=array(
	// 		'status'=>'Inactive',
	// 		'datetime'=>date('Y-m-d H:i:s'),
	// 		);
	// 	}
	// 	elseif($get_data->status=='Inactive')
	// 	{
	// 		$data=array(
	// 		'status'=>'Active',
	// 		'datetime'=>date('Y-m-d H:i:s'),
	// 		);
	// 	}
	// 	$this->db->where('uniqcode', $uniqcode);
	// 	$this->db->update('tbl_job_summary', $data);
	// }

	// public function destroy($uniqcode)
	// {
 //      	$data=array(
 //        'status'=>'Delete',
 //        'update_datetime'=>date('Y-m-d H:i:s'),
 //    	);
	//   	$this->db->where('uniqcode', $uniqcode);
	//   	$this->db->update('tbl_job_summary', $data);
	//  	$this->session->set_flashdata('success', 'Job Summary deleted successfully');                     
	//  	redirect('admin/job_summary');
	// }

	
}