<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactController extends CI_Controller 
{ 
	function __construct()
	{
	  	parent::__construct(); 		
	  	$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
	  	date_default_timezone_set('Asia/Kolkata');
		$this->load->helper(array('common_helper', 'string', 'form', 'security','url'));
		$this->load->library(array('form_validation', 'email'));
		$this->load->model('CommonModel');
				
	} 
	
	
	public function index()
	{
		$where_clause=array(
			'status'=>'Active'
		);
		$select='uniqcode,services_name,services_icon,description';
		$this->data['servics']=$this->CommonModel->RetriveRecordByWhere('tbl_services',$where_clause,$select);
		$this->data['company_address']=$this->CommonModel->RetriveRecordByWhereRow('tbl_contact',['status'=>'Active'],'*');
		$this->data['banner_image']=$this->CommonModel->RetriveRecordByWhereRow('tbl_pages',['status'=>'Active','type'=>'contactus','name'=>'contactus'],'description,image');
		$this->data['title']=$this->CommonModel->RetriveRecordByWhereRow('tbl_pages',['status'=>'Active','type'=>'contactus','name'=>'contactus'],'head');
		$this->data['title_common']=$this->CommonModel->RetriveRecordByWhereRow('tbl_pages',['status'=>'Active','type'=>'common','name'=>'common'],'head');
			$this->data['body']=$this->CommonModel->RetriveRecordByWhereRow('tbl_pages',['status'=>'Active','type'=>'contactus','name'=>'contactus'],'start_body,close_body');
			$this->data['body_common']=$this->CommonModel->RetriveRecordByWhereRow('tbl_pages',['status'=>'Active','type'=>'common','name'=>'common'],'start_body,close_body');
		$this->data['logo']=$this->CommonModel->RetriveRecordByWhereRow('tbl_logo',['status'=>'Active'],'*');
		//$this->data['page_title']='NIT | Contact';
		$this->data['subview']='contact/contact';
		$this->load->view('user/layout/default', $this->data);
	}

}
    