<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobSummaryController extends CI_Controller 
{
	 
	function __construct()
	{
	  	parent::__construct(); 		
		$this->load->helper(array('common_helper', 'string', 'form', 'security'));
		$this->load->library(array('form_validation', 'email'));
		$this->load->model('CommonModel');
				

	}	

	public function job_summary()
	{
		$this->db->where('status <>', 'Delete');
		$this->db->order_by('id', 'desc');
		$banner_data=$this->db->get('tbl_job_summary')->result();
		$this->data['banner_data']=$banner_data;

		$this->data['page_title']='NNIT | Job Summary';
		$this->data['subview']='setting/job_summary';
		$this->load->view('admin/layout/default', $this->data);
	}

	public function add_job_summary()
	{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('location', 'location', 'required');
			$this->form_validation->set_rules('experience', 'experience', 'required');
			if ($this->form_validation->run())
            {
		        $name=$this->input->post('name');
		        $location=$this->input->post('location');
		        $experience=$this->input->post('experience');
		        $description=$this->input->post('description');
        		$data=array(
				'uniqcode' => random_string('alnum',30),
				'name' => $name,
				'location' => $location,
				'experience' => $experience,
				'description' => $description,
				'datetime' => date('Y-m-d H:i:s')
				);
		        	$this->db->where('name', $name);
					$query = $this->db->get('tbl_job_summary');		
					$banner_row = $query->num_rows();
					if($banner_row == 0)
					{
						$this->db->insert('tbl_job_summary', $data);
						$this->session->set_flashdata('success', 'Job summary added successfully.');	
						redirect('admin/job_summary');
					}
					else
					{
						$this->session->set_flashdata('error', 'Job summary name already exists!');	
						redirect('admin/job_summary');
					}	
            }
            else
            {
            	$this->session->set_flashdata('error', 'Please fill in all the files!');	
				redirect('admin/job_summary');
            }
	}
	public function view($uniqcode)
	{
		$this->db->where('status <>', 'Delete');
		$this->db->order_by('id', 'desc');
		$banner_data=$this->db->get('tbl_job_summary')->result();
		$this->data['banner_data']=$banner_data;

		$this->db->where('status <>', 'Delete');
		$this->db->where('uniqcode', $uniqcode);
		$job_summary_data=$this->db->get('tbl_job_summary')->row();
		$this->data['job_summary_data']=$job_summary_data;

		$this->data['page_title']='NNIT | Job Summary';
		$this->data['subview']='setting/job_summary_update';
		$this->load->view('admin/layout/default', $this->data);
	}
	public function status()
	{
		$uniqcode=$this->input->post('uniqcode');
		$this->db->where('status <>', 'Delete');
		$this->db->where('uniqcode', $uniqcode);
		$get_data=$this->db->get('tbl_job_summary')->row();

		if($get_data->status=='Active')
		{
			$data=array(
			'status'=>'Inactive',
			'datetime'=>date('Y-m-d H:i:s'),
			);
		}
		elseif($get_data->status=='Inactive')
		{
			$data=array(
			'status'=>'Active',
			'datetime'=>date('Y-m-d H:i:s'),
			);
		}
		$this->db->where('uniqcode', $uniqcode);
		$this->db->update('tbl_job_summary', $data);
	}
	public function update_job_summary()
	{
	   $this->load->library('form_validation');
	   $this->form_validation->set_rules('name', 'Name', 'required');
	   $this->form_validation->set_rules('location', 'location', 'required');
	   $this->form_validation->set_rules('experience', 'experience', 'required');
			if ($this->form_validation->run())
            {
		        $name=$this->input->post('name');
		        $location=$this->input->post('location');
		        $experience=$this->input->post('experience');
		        $description=$this->input->post('description');
		        $uniqcode=$this->input->post('uniqcode');
        		$this->db->where('status <>', 'Delete');
				$this->db->where('uniqcode <>', $uniqcode);
				$job_summary_row=$this->db->get('tbl_job_summary')->row();		
				if(!empty($job_summary_row))
				{
					$data=array(
					'name'=>$name,
					'location'=>$location,
					'experience'=>$experience,	
					'description'=> $description,
					'update_datetime' => date('Y-m-d H:i:s')
					);
					$this->db->where('uniqcode', $uniqcode);
					$update=$this->db->update('tbl_job_summary', $data);
					$this->session->set_flashdata('success', 'Job summary update successfully..');	
					redirect('admin/job_summary');
				}
				else
				{
					$this->session->set_flashdata('error', 'Job summary name already exists!');	
					redirect('admin/job_summary');
				}
			}
        	else
        	{
           		$this->session->set_flashdata('error', 'Please fill in all the files!');	
				redirect('admin/job_summary');
        	}
		}

	public function destroy($uniqcode)
	{
      	$data=array(
        'status'=>'Delete',
        'update_datetime'=>date('Y-m-d H:i:s'),
    	);
	  	$this->db->where('uniqcode', $uniqcode);
	  	$this->db->update('tbl_job_summary', $data);
	 	$this->session->set_flashdata('success', 'Job Summary deleted successfully');                     
	 	redirect('admin/job_summary');
	}

	
}