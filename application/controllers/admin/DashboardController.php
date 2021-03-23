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
		$this->load->view('admin/layout/default', $this->data);
	}


}
