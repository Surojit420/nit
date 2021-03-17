<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MoreInfoController extends CI_Controller 
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
	public function career()
	{
		$where_clause=array(
			'status'=>'Active'
		);
		$select='uniqcode,services_name,services_icon,description';
		$this->data['servics']=$this->CommonModel->RetriveRecordByWhere('tbl_services',$where_clause,$select);
		$this->data['page_title']='NIT | Career';
		$this->data['subview']='career/career';
		$this->load->view('user/layout/default', $this->data);
	}

	public function blog()
	{
		$where_clause=array(
			'status'=>'Active'
		);
		$select='uniqcode,services_name,services_icon,description';
		$this->data['servics']=$this->CommonModel->RetriveRecordByWhere('tbl_services',$where_clause,$select);
		$this->data['page_title']='NIT | Blog';
		$this->data['subview']='blog/blog';
		$this->load->view('user/layout/default', $this->data);
	}

	public function quotetion()
	{
		$where_clause=array(
			'status'=>'Active'
		);
		$select='uniqcode,services_name,services_icon,description';
		$this->data['servics']=$this->CommonModel->RetriveRecordByWhere('tbl_services',$where_clause,$select);
		$this->data['page_title']='NIT | Quotetion';
		$this->data['subview']='quotetion/quotetion';
		$this->load->view('user/layout/default', $this->data);
	}

}
    