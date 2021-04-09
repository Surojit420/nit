<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller 
{ 
	function __construct()
	{
	  	parent::__construct(); 		
	  	$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
	  	date_default_timezone_set('Asia/Kolkata');
		$this->load->helper(array('common_helper', 'string', 'form', 'security','url','text_helper'));
		$this->load->library(array('form_validation', 'email'));
		$this->load->model('CommonModel');
	
				
	} 
	
	
	public function index()
	{

		// echo ADMIN_PATH;
		// die;
		$where_clause=array(
			'status'=>'Active'
		);
		$select='banner_name,image,description';
		$this->data['banner']=$this->CommonModel->RetriveRecordByWhere('tbl_banner',$where_clause,$select); 
		$where_clause=array(
			'status'=>'Active'
		);
		$select='uniqcode,services_name,services_icon,description';
		$this->data['servics']=$this->CommonModel->RetriveRecordByWhere('tbl_services',$where_clause,$select);
		$where_clause=array(
			'status'=>'Active'
		);
		$select='image,description';
		$this->data['mission']=$this->CommonModel->RetriveRecordByWhereRow('tbl_mission',$where_clause,$select);
		$where_clause=array(
			'status'=>'Active'
		);
		$select='image,description';
		$this->data['vision']=$this->CommonModel->RetriveRecordByWhereRow('tbl_vision',$where_clause,$select);
		$where_clause=array(
			'status'=>'Active'
		);
		$select='image,name,description';
		$this->data['technologies']=$this->CommonModel->RetriveRecordByWhere('tbl_technologies',$where_clause,$select);

		$where_clause=array(
			'status'=>'Active'
		);
		$select='project_name,image,project_link,description';
		$this->data['portfolio']=$this->CommonModel->RetriveRecordByWhere('tbl_portfolio',$where_clause,$select);

		$where_clause=array(
			'status'=>'Active'
		);
		$select='name,description,location,experience';
		$this->data['job_summary']=$this->CommonModel->RetriveRecordByWhere('tbl_job_summary',$where_clause,$select);
		$this->data['company_address']=$this->CommonModel->RetriveRecordByWhereRow('tbl_contact',['status'=>'Active'],'*');
		$this->data['logo']=$this->CommonModel->RetriveRecordByWhereRow('tbl_logo',['status'=>'Active'],'*');
		$this->data['why_choose_frist']=$this->CommonModel->RetriveRecordByWhereOrderbyLimit('tbl_why_choose',['status'=> 'Active'],'3','1','id','desc');
		$this->data['why_choose_last']=$this->CommonModel->RetriveRecordByWhereOrderbyLimit('tbl_why_choose',['status'=> 'Active'],'3','3','id','desc');
	//	$this->data['page_title']='Best IT Solution Company in Kolkata | NIT Solution Pvt. Ltd.';
		$this->data['subview']='home/home';
		//pr($this->data);
		//$this->load->view('user/home/home', $this->data);
		$this->load->view('user/layout/default', $this->data);
	}

}
    