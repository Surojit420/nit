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

		$select='*';
		$where_clause=array(
			'status'=>'Active'
		);
		$this->data['job_summary']=$this->CommonModel->RetriveRecordByWhere('tbl_job_summary',$where_clause,$select);
		$this->data['contact']=$this->CommonModel->RetriveRecordByWhereRow('tbl_contact',$where_clause,'*');
		$this->data['email']=$this->CommonModel->RetriveRecordByWhereRow('tbl_contact',$where_clause,'*');
		$this->data['address']=$this->CommonModel->RetriveRecordByWhereRow('tbl_contact',$where_clause,'*');
		$this->data['logo']=$this->CommonModel->RetriveRecordByWhereRow('tbl_logo',['status'=>'Active'],'*'); 
		$this->data['company_address']=$this->CommonModel->RetriveRecordByWhereRow('tbl_contact',['status'=>'Active'],'*');
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

	public function quotation()
	{
		$where_clause=array(
			'status'=>'Active'
		);

		$select='uniqcode,services_name,services_icon,description';
		$this->data['servics']=$this->CommonModel->RetriveRecordByWhere('tbl_services',$where_clause,$select);
		$this->data['logo']=$this->CommonModel->RetriveRecordByWhereRow('tbl_logo',['status'=>'Active'],'*');
		$this->data['contact']=$this->CommonModel->RetriveRecordByWhereRow('tbl_contact',$where_clause,'*');
		$this->data['email']=$this->CommonModel->RetriveRecordByWhereRow('tbl_contact',$where_clause,'*');
		$this->data['address']=$this->CommonModel->RetriveRecordByWhereRow('tbl_contact',$where_clause,'*'); 
		$this->data['company_address']=$this->CommonModel->RetriveRecordByWhereRow('tbl_contact',['status'=>'Active'],'*');
		$this->data['page_title']='NIT | Quotation';
		$this->data['subview']='quotation/quotation';
		$this->load->view('user/layout/default', $this->data);
	}

	public function job_appication()
		{

		$this->form_validation->set_rules('name', 'ENTER YOUR NAME', 'trim|required');

		// $this->form_validation->set_rules('phone', 'ENTER YOUR CONTACT NO', 'trim|required');
		$this->form_validation->set_rules('position', 'ENTER POSITION', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{

		$this->session->set_flashdata('error','Something went wrong ! Try after Some time');
		redirect($_SERVER['HTTP_REFERER']);
		}
		else{
		$this->form_validation->set_rules('email', 'ENTER YOUR EMAIL', 'trim|required|is_unique[tbl_job_apply.email]');
		$this->form_validation->set_rules('phone', 'ENTER YOUR CONTACT NO', 'trim|required|is_unique[tbl_job_apply.phone]');

		if ($this->form_validation->run() == FALSE)
		{
		$this->session->set_flashdata('error','You are already applied, We will contact you shortly!');
		redirect($_SERVER['HTTP_REFERER']);
		}else{


		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$phone=$this->input->post('phone');
		$position=$this->input->post('position');
		$experience=$this->input->post('experience');


		$config['upload_path']=FCPATH.'/webroot/user/career_file';
		$config['allowed_types']='pdf|doc|docx';
		$config['max_size']='2048';		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if(!$this->upload->do_upload('file'))
		{
		$this->session->set_flashdata('error',''.$this->upload->display_errors().'');
		redirect($_SERVER['HTTP_REFERER']);
		}
		else
		{
		$imageDetailArray = $this->upload->data();
		$image = $imageDetailArray['file_name'];

		}

		$data = array(
		'uniqcode' => random_string('alnum',30),
		'name' =>$name,
		'email' =>$email ,
		'documents' =>$image,
		'phone' =>$phone ,
		'position' =>$position,
		'experience' =>$experience,
		'datetime' => date('Y-m-d h:i:s')
		);
		
        $this->db->insert('tbl_job_apply',$data);
		$this->session->set_flashdata('success',"Sent Successfully! Thank you"." ".$name.", We will contact you shortly!");
		redirect($_SERVER['HTTP_REFERER']);

		} }

		}

}
    