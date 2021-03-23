<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller 
{
	function __construct()
	{

	  	parent::__construct(); 		
		$this->load->helper(array('common_helper', 'string'));		
		if($this->session->userdata('adminDetails')==NULL)
		{
		   return redirect('/');
		}
			$this->load->model('CommonModel');
	} 
	public function index()
	{	
	
		$this->data['page_title']='NNIT | Dashboard';
		$this->data['subview']='dashboard/dashboard';
		$this->data['logo_icons']=$this->CommonModel->RetriveRecordByWhereRow('tbl_logo',['status'=>'Active'],'image');
		$this->data['foot_con'] = $this->CommonModel->RetriveRecordByWhereRow('tbl_contact',['status'=>'Active'],'footer_copy_right');
		$this->data['logo_count']=$this->CommonModel->CountWhere('tbl_logo',['status' => 'Active']);
		$this->data['banner_count']=$this->CommonModel->CountWhere('tbl_banner',['status'=>'Active']);
		$this->data['business_count']=$this->CommonModel->CountWhere('tbl_business',['status'=>'Active']);
		$this->data['job_apply_count']=$this->CommonModel->CountWhere('tbl_job_apply',['status'=>'Active']);
		$this->data['job_summary_count']=$this->CommonModel->CountWhere('tbl_job_summary',['status'=>'Active']);
		$this->data['contact_count']=$this->CommonModel->CountWhere('tbl_contact',['status'=>'Active']);
		$this->data['mission_count']=$this->CommonModel->CountWhere('tbl_mission',['status'=>'Active']);
		$this->data['portfolio_count']=$this->CommonModel->CountWhere('tbl_portfolio',['status'=>'Active']);
		$this->data['query_count']=$this->CommonModel->CountWhere('tbl_query',['status'=>'Active']);
		$this->data['service_count']=$this->CommonModel->CountWhere('tbl_services',['status'=>'Active']);
		$this->data['service_type_count']=$this->CommonModel->CountWhere('tbl_services_type',['status'=>'Active']);
		$this->data['technologies_count']=$this->CommonModel->CountWhere('tbl_technologies',['status'=>'Active']);
		$this->data['vision_count']=$this->CommonModel->CountWhere('tbl_vision',['status'=>'Active']);
		$this->data['why_choose_count']=$this->CommonModel->CountWhere('tbl_why_choose',['status'=>'Active']);
		$this->data['work_flow_count']=$this->CommonModel->CountWhere('tbl_work_flow',['status'=>'Active']);
		


		$this->load->view('admin/layout/default', $this->data);
	}


}
