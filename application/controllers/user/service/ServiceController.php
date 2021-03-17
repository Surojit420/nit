<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceController extends CI_Controller 
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
	
	
	public function index($service_id)
	{
		
		$this->data['page_title']='NIT | Service';
		$where_clause=array(
			'status'=>'Active'
		);
		$select='uniqcode,services_name,services_icon,description';
		$this->data['servics']=$this->CommonModel->RetriveRecordByWhere('tbl_services',$where_clause,$select);
		$where_clause=array(
			'status'=>'Active',
			'uniqcode'=>$service_id
		);
		$select='services_name,services_images,banner_description';
		$this->data['services_details']=$this->CommonModel->RetriveRecordByWhereRow('tbl_services',$where_clause,$select);
		$where_clause=array(
			'status'=>'Active',
			'services_type'=>$service_id
		);
		$select='uniqcode,develop_name,image,description';
		$this->data['servics_type']=$this->CommonModel->RetriveRecordByWhere('tbl_services_type',$where_clause,$select);
		//pr($this->data);
		$this->data['subview']='service/service';
		$this->load->view('user/layout/default', $this->data);
	}

}
    