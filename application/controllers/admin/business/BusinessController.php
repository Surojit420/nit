<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BusinessController extends CI_Controller 
{
	 
	function __construct()
	{
	  	parent::__construct(); 		
		$this->load->helper(array('common_helper', 'string', 'form', 'security'));
		$this->load->library(array('form_validation', 'email'));
		$this->load->model('CommonModel');			

	}	

	public function business()
	{
		$this->db->where('status <>', 'Delete');
		$this->db->order_by('id', 'desc');
		$business_data=$this->db->get('tbl_business')->result();
		$this->data['business_data']=$business_data;

		$this->data['page_title']='NNIT | Business';
		$this->data['subview']='business/business';
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