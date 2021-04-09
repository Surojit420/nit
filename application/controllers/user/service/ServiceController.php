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
	
	
	public function index($service)
	{
		$service_name=strtoupper(str_replace('-',' ',str_replace('and','&',$service)));
		//  echo $service_name ;
		// die();
		// exit();
		//$this->data['page_title']='NIT | Service';
		$where_clause=array(
			'status'=>'Active'
		);
		$select='services_name';
		$this->data['services_details']=$this->CommonModel->RetriveRecordByWhere('tbl_services',['services_name'=>$service_name],'uniqcode');
		$this->data['services_details']=$this->CommonModel->RetriveRecordByWhere('tbl_services_type',['services_type'=>$service_name],'uniqcode');

		$select='uniqcode,services_name,services_icon,description,services_images';
		$this->data['servics']=$this->CommonModel->RetriveRecordByWhere('tbl_services',$where_clause,$select);
		$where_clause=array(
			'status'=>'Active',
			'services_name'=>$service_name
		);
		$this->data['banner_image']=$this->CommonModel->RetriveRecordByWhereRow('tbl_pages',['status'=>'Active','type'=>'Services','name'=>$service_name],'image');
		$this->data['title']=$this->CommonModel->RetriveRecordByWhereRow('tbl_pages',['status'=>'Active','type'=>'services','name'=>$service_name],'head');
		$this->data['title_common']=$this->CommonModel->RetriveRecordByWhereRow('tbl_pages',['status'=>'Active','type'=>'common','name'=>'common'],'head');
			$this->data['body']=$this->CommonModel->RetriveRecordByWhereRow('tbl_pages',['status'=>'Active','type'=>'services','name'=>$service_name],'start_body,close_body');
			$this->data['body_common']=$this->CommonModel->RetriveRecordByWhereRow('tbl_pages',['status'=>'Active','type'=>'common','name'=>'common'],'start_body,close_body');
		$select='services_name,services_images,banner_description';
		$this->data['services_details']=$this->CommonModel->RetriveRecordByWhereRow('tbl_services',$where_clause,$select);
		$service_value=$this->CommonModel->RetriveRecordByWhereRow('tbl_services',['status'=>'Active','services_name'=>$service_name],'uniqcode');
		$service_id=$service_value->uniqcode;
		$where_clause=array(
			'status'=>'Active',
			'services_type'=>$service_id
		);
		// pr($where_clause);
		// die();
		// exit();
			
		


		$select='uniqcode,develop_name,image,description';
		$this->data['servics_type']=$this->CommonModel->RetriveRecordByWhere('tbl_services_type',$where_clause,$select);
		// $service_code=$this->CommonModel->RetriveRecordByWhereRow('tbl_services_type',$where_clause,'uniqcode');
		// $service_type_id=$service_code->uniqcode;
		// echo $service_type_id;
		// die();
		$this->data['servics_type_pages']=$this->CommonModel->RetriveRecordByWhere('tbl_pages',['name'=>$service_name,'status'=>'active'],'*');
		//exit();
			$this->data['title']=$this->CommonModel->RetriveRecordByWhereRow('tbl_pages',['status'=>'Active','type'=>'services','name'=>$service_name],'head');
			$this->data['body']=$this->CommonModel->RetriveRecordByWhereRow('tbl_pages',['status'=>'Active','type'=>'services','name'=>$service_name],'start_body,close_body');
		$this->data['company_address']=$this->CommonModel->RetriveRecordByWhereRow('tbl_contact',['status'=>'Active'],'*');
		$this->data['logo']=$this->CommonModel->RetriveRecordByWhereRow('tbl_logo',['status'=>'Active'],'*');
		$this->data['subview']='service/service';
		$this->load->view('user/layout/default', $this->data);
	}

}
    