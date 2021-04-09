<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CommonController extends CI_Controller 
{
	  
	function __construct()
	{
	  	parent::__construct(); 		
		$this->load->helper(array('common_helper', 'string', 'form', 'security'));
		$this->load->library(array('form_validation', 'email'));
		$this->load->model('CommonModel');			
		if($this->session->userdata('adminDetails')==NULL)
		{
		   return redirect('/');
		}
	}	

	public function index()
	{
		$this->data['banner_data']= $this->CommonModel->RetriveRecordByWhereOrderby('tbl_pages',['status<>'=>'Delete','type'=>'common','name'=>'common'],'id','desc');

		$this->data['page_title']='NNIT | common';
		$this->data['subview']='pages/common';
		$this->data['logo_icons']=$this->CommonModel->RetriveRecordByWhereRow('tbl_logo',['status'=>'Active'],'image');
		$this->data['foot_con'] = $this->CommonModel->RetriveRecordByWhereRow('tbl_contact',['status'=>'Active'],'footer_copy_right');
		$this->load->view('admin/layout/default', $this->data);
	}

	public function add()
	{
			
		        $head=$this->input->post('head');
		        print_r($head);
		        $start_body=$this->input->post('start_body');
		        print_r($start_body);
		        $close_body=$this->input->post('close_body');	
        		print_r($close_body);
        		$data=array(
				'uniqcode' => random_string('alnum',30),
				'head' => $head,
				'close_body' => $close_body,	
				'start_body' => $start_body,
				'status' => 'Active',
				'name'=> 'common',
				'type' =>'common',
				'current_date' => date('Y-m-d H:i:s')
				);
						
						$apu=$this->db->insert('tbl_pages', $data);
						$this->session->set_flashdata('success', 'common added successfully.');	
						redirect('admin/page-common');
	}
					
	public function status()
	{
		$uniqcode=$this->input->post('uniqcode');	
		$this->db->where('status <>', 'Delete');
		$this->db->where('uniqcode', $uniqcode);
		$get_data=$this->db->get('tbl_pages')->row();

		if($get_data->status=='Active')
		{
			$data=array(
			'status'=>'Inactive',
			'update_datetime'=>date('Y-m-d H:i:s'),
			);
		}
		elseif($get_data->status=='Inactive')
		{
			$data=array(
			'status'=>'Active',
			'update_datetime'=>date('Y-m-d H:i:s'),
			);
		}
		$this->db->where('uniqcode', $uniqcode);
		$this->db->update('tbl_pages', $data);
	}
	public function edit()
	{
		$uniqcode=$this->input->post('uniqcode');
		$this->db->where('status <>', 'Delete');
		$this->db->where('uniqcode', $uniqcode);
		$banner_row=$this->db->get('tbl_pages')->row();
		echo '
				<div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">common</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form  action="'.base_url('admin/pages/common/update').'" id="portfolio" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="uniqcode" value="'.$banner_row->uniqcode.'">
                                <div class="row">
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>head</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="head" id="description" class="form-control " data-prompt-position="bottomLeft"placeholder="Enter head" >'.$banner_row->head.'</textarea> 
                                       </div> 
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>start_body</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="start_body" id="description" class="form-control " data-prompt-position="bottomLeft"placeholder="Enter start body" >'.$banner_row->start_body.'</textarea> 
                                       </div> 
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>close_body</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="close_body" id="description" class="form-control " data-prompt-position="bottomLeft"placeholder="Enter close_body" >'.$banner_row->close_body.'</textarea> 
                                       </div> 
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button class="btn btn-warning btn-primary pull-right m-t-n-xs grediant-btn" type="reset"><strong>Cancel</strong></button>
                                    <button type="submit" class="btn btn-primary" style="margin-left: 756px;"><strong>Save<strong></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>
				$(function () {
				$("#portfolio").validationEngine();
				});
			</script>
		';

	}
	public function update()
	{
	 //    $this->load->library('form_validation');
		// $this->form_validation->set_rules('head', 'head', 'required');
		// if($this->form_validation->run())
		// {
			$uniqcode=$this->input->post('uniqcode');
			$head=$this->input->post('head');
			$start_body=$this->input->post('start_body');
			$close_body=$this->input->post('close_body');
					$data=array(
					'head' => $head,
					'close_body' => $close_body,
					'start_body' => $start_body,
					'update_datetime' => date('Y-m-d H:i:s')
					);
					$this->db->where('uniqcode', $uniqcode);
					$update=$this->db->update('tbl_pages', $data);
					$this->session->set_flashdata('success', 'common update successfully.');
					redirect('admin/page-common');
			
				$this->db->where('status <>', 'Delete');
				$this->db->where('uniqcode <>', $uniqcode);
				$banner_row=$this->db->get('tbl_pages')->row();
				$data=array(
				'head'=>$head,
				'close_body' => $close_body,
				'start_body' => $start_body,
				'update_datetime' => date('Y-m-d H:i:s')
				);
				$this->db->where('uniqcode', $uniqcode);
				$update=$this->db->update('tbl_pages', $data);
				$this->session->set_flashdata('success', 'common update successfully.');
				redirect('admin/page-common');	
		// }
		// else
		// {
		// 	$this->session->set_flashdata('error', 'Please fill in all the files!');
		// 	redirect('admin/page-common');
		// }
	}

	public function destroy($uniqcode)
	{
      	$data=array(
        'status'=>'Delete',
        'update_datetime'=>date('Y-m-d H:i:s'),
    	);
	  	$this->db->where('uniqcode', $uniqcode);
	  	$this->db->update('tbl_pages', $data);
	 	$this->session->set_flashdata('success', 'common deleted successfully');                     
	 	redirect('admin/page-common');
	}

	
}