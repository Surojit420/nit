<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller 
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
    

	public function business()
    {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('phone_no', 'phone_no', 'required');
        $this->form_validation->set_rules('subject', 'subject', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        if ($this->form_validation->run())
        {
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $phone_no=$this->input->post('phone_no');
            $subject=$this->input->post('subject');
            $description=$this->input->post('description');
            $data=array(
                'uniqcode' =>"bu".random_string('alnum',28),
                'name' => $name,
                'email' => $email,
                'phone_no' => $phone_no,
                'subject' => $subject,
                'description' => $description,
                'datetime' => date('Y-m-d h:i:s')
            );
            $this->CommonModel->insert('tbl_business',$data);
            $this->session->set_flashdata('success', 'Thank you for contact us.');    
            redirect('');
        }
        else
        {
            $this->session->set_flashdata('error', 'Please fill in all the files!');    
            redirect('query');
        }
    }

    public function query()
    {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('message', 'message', 'required');

        if ($this->form_validation->run())
        {
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $message=$this->input->post('message');
            $data=array(
                'uniqcode' =>"qu".random_string('alnum',28),
                'name' => $name,
                'email' => $email,
                'message' => $message,
                'datetime' => date('Y-m-d h:i:s')
            );
            $this->CommonModel->insert('tbl_query',$data);
            $this->session->set_flashdata('success', 'Your query added successfully.');    
            redirect('');
        }
        else
        {
            $this->session->set_flashdata('error', 'Please fill in all the files!');    
            redirect('');
        }
    }  

    public function subscribe()
    {
        $this->form_validation->set_rules('email', 'email', 'required');

        if ($this->form_validation->run())
        {
            $email=$this->input->post('email');
            $data=array(
                'uniqcode' =>"su".random_string('alnum',28),
                'email' => $email,
                'datetime' => date('Y-m-d h:i:s')
            );
            $this->CommonModel->insert('tbl_subscribe',$data);
            $this->session->set_flashdata('success', 'Thank you for subscribe.');    
            redirect('');
        }
        else
        {
            $this->session->set_flashdata('error', 'Please fill in all the files!');    
            redirect('');
        }
    }  
}
    