<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServicesController extends CI_Controller 
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

	public function services()
	{
		$this->db->where('status <>', 'Delete');
		$this->db->order_by('id', 'desc');
		$services_data=$this->db->get('tbl_services')->result();
		$this->data['services_data']=$services_data;

		$this->data['page_title']='NNIT | Services';
		$this->data['subview']='services/services';
		$this->data['logo_icons']=$this->CommonModel->RetriveRecordByWhereRow('tbl_logo',['status'=>'Active'],'image');
		$this->data['foot_con'] = $this->CommonModel->RetriveRecordByWhereRow('tbl_contact',['status'=>'Active'],'footer_copy_right');
		$this->load->view('admin/layout/default', $this->data);
	}

	public function service_add()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('services_name', 'Services Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('banner_description', 'Banner Description', 'required');
			if ($this->form_validation->run())
            {
            	$banner_upload_image='';
            	$icon_upload_image='';
            	if(!empty($_FILES['banner_image']['name']))
				{
					$config['upload_path']          = FCPATH.'/webroot/admin/all_images/';
		            $config['allowed_types']        = '*';
		            $config['encrypt_name'] 		= TRUE;
		            $config['max_size']             = 1024;
		            $config['file_name']          	= $_FILES['banner_image']['name'];
		            $this->load->library('upload', $config);
		            $this->upload->initialize($config);
		            if($this->upload->do_upload('banner_image'))
	            	{
	            		$image_data = $this->upload->data();
	                    $config['image_library'] = 'gd2';
	                    $config['source_image'] = $image_data['full_path']; 
	                    $config['create_thumb'] = TRUE;
	 					$config['maintain_ratio'] = TRUE;
	 					$config['new_image']    = 'webroot/admin/services_banner/'.$image_data['file_name'];
	                    $config['width'] = 400;
	                    $config['height'] = 400;
	                    $this->load->library('image_lib', $config);
                		$this->image_lib->clear();
						$this->image_lib->initialize($config);
						$banner_upload_image=$image_data['raw_name'].'_thumb'.$image_data['file_ext'];
					    if (!$this->image_lib->resize())
				     	{
	        				$this->handle_error($this->image_lib->display_errors());
	   					}
	   				    $file = FCPATH.'/webroot/admin/all_images/'.$image_data['file_name'];
    					if(file_exists($file))
    					{
        					unlink($file);
    					}
	             	}
        		}

        		if(!empty($_FILES['icon_image']['name']))
				{
					$config['upload_path']          = FCPATH.'/webroot/admin/all_images/';
		            $config['allowed_types']        = '*';
		            $config['encrypt_name'] 		= TRUE;
		            $config['max_size']             = 1024;
		            $config['file_name']          	= $_FILES['icon_image']['name'];
		            $this->load->library('upload', $config);
		            $this->upload->initialize($config);
		            if($this->upload->do_upload('icon_image'))
	            	{
	            		$image_data = $this->upload->data();
	                    $config['image_library'] = 'gd2';
	                    $config['source_image'] = $image_data['full_path']; 
	                    $config['create_thumb'] = TRUE;
	 					$config['maintain_ratio'] = TRUE;
	 					$config['new_image']    = 'webroot/admin/services_icon/'.$image_data['file_name'];
	                    $config['width'] = 400;
	                    $config['height'] = 400;
	                    $this->load->library('image_lib', $config);
                		$this->image_lib->clear();
						$this->image_lib->initialize($config);
						$icon_upload_image=$image_data['raw_name'].'_thumb'.$image_data['file_ext'];
					    if (!$this->image_lib->resize())
				     	{
	        				$this->handle_error($this->image_lib->display_errors());
	   					}
	   				    $file = FCPATH.'/webroot/admin/all_images/'.$image_data['file_name'];
    					if(file_exists($file))
    					{
        					unlink($file);
    					}
	             	}
        		}
        
        		$services_name=$this->input->post('services_name');
		        $description=$this->input->post('description');
		        $banner_description=$this->input->post('banner_description');
		        $data=array(
					'uniqcode' => random_string('alnum',30),
					'services_name' => $services_name,
					'description' => $description,
					'banner_description' => $banner_description,
					'services_images'=>$banner_upload_image,
					'services_icon'=>$icon_upload_image,
					'datetime' => date('Y-m-d H:i:s')
				);
				$this->db->where('services_name', $services_name);
				$this->db->where('status <>','Delete');
		        $query = $this->db->get('tbl_services');		
    			$count_row = $query->num_rows(); 
			  	if($count_row == 0) 
              	{
              		$this->db->insert('tbl_services',$data);
              		$this->session->set_flashdata('success', 'Services added successfully.');	
					redirect('admin/services');
              	}
              	else
              	{
              		$this->session->set_flashdata('error', 'Services name already exists!');	
					redirect('admin/services');
              	}           
        	}
            else
            {
            	$this->session->set_flashdata('error', 'Please fill in all the files!');	
				redirect('admin/services');
            }
	}
	public function status()
	{
		$uniqcode=$this->input->post('uniqcode');
		$this->db->where('status <>', 'Delete');
		$this->db->where('uniqcode', $uniqcode);
		$get_data=$this->db->get('tbl_services')->row();

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
		$this->db->update('tbl_services', $data);
	}
	public function edit_services()
	{
		$uniqcode=$this->input->post('uniqcode');
		$this->db->where('status <>', 'Delete');
		$this->db->where('uniqcode', $uniqcode);
		$services_row=$this->db->get('tbl_services')->row();
		echo '
				<div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Services Add</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form  action="'.base_url('admin/services/update').'" id="services" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="uniqcode" value="'.$services_row->uniqcode.'">
                                <input type="hidden" name="ser_img_icon" value="'.$services_row->services_icon.'">
                                <input type="hidden" name="ser_img" value="'.$services_row->services_images.'">
                                <div class="row">
                                	 <div class="col-lg-6">
                                        <div class="form-group">
                                        	<label>Services Banner Images</label>
                                            <img src="'.base_url('webroot/admin/services_banner/'.$services_row->services_images.'').'" id="upload_services_banner" onclick="get_upload_services_banner()" class="add_img_button">
                                                <input type="file" class="image-upload select_image" name="image" class="validate[required]" id="services_banner_input_upload" style="display: none" accept=".jpg,.jpeg,.png" onchange="services_banner_show_photo(this)">     
                                        </div> 
                                    </div>
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                        	<label>Services icon</label>
                                            <img src="'.base_url('webroot/admin/services_icon/'.$services_row->services_icon.'').'" id="upload_services_icon" onclick="get_upload_services_icon()" class="add_img_button">
                                                <input type="file" class="image-upload select_image" name="image" class="validate[required]" id="services_icon_input_upload" style="display: none" accept=".jpg,.jpeg,.png" onchange="services_icon_show_photo(this)">     
                                        </div> 
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Services Name</label>
                                            <input type="text" name="services_name" id="services_name" class="form-control validate[required]" data-errormessage-value-missing="Services name is required" data-prompt-position="bottomLeft" placeholder="Enter services name" maxlength="200" value="'.$services_row->services_name.'">      
                                        </div> 
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>Description</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="description" id="description" class="form-control validate[required]" data-errormessage-value-missing="Description is required" data-prompt-position="bottomLeft"placeholder="Enter description" >'.$services_row->description.'</textarea> 
                                       </div> 
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>Banner Description</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="banner_description" id="banner_description" class="form-control validate[required]" data-errormessage-value-missing="Banner description is required" data-prompt-position="bottomLeft"placeholder="Enter banner description" >'.$services_row->banner_description.'</textarea> 
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
				$("#services").validationEngine();
				});
			</script>
		';

	}
	public function update_services_data()
	{
	    $this->load->library('form_validation');
		$this->form_validation->set_rules('services_name', 'services name', 'required');
		
			if ($this->form_validation->run())
            {  
            		$uniqcode=$this->input->post('uniqcode');
              	    $services_name=$this->input->post('services_name');
        			$this->db->where('status <>', 'Delete');
					$this->db->where('services_name', $services_name);
					$this->db->where('uniqcode <>', $uniqcode);
					$services_all_row=$this->db->get('tbl_services')->row(); 
    			  	if(empty($services_all_row)){
					$data=array(
					'services_name'=> $services_name,
					'update_datetime' => date('Y-m-d H:i:s')
				);
				$this->db->where('uniqcode', $uniqcode);
				$update=$this->db->update('tbl_services', $data);
				$this->session->set_flashdata('success', 'Services name update successfully.');	
				redirect('admin/services');
				}
				else
				{
					$this->session->set_flashdata('error', 'Services name already exists!');	
					redirect('admin/services');
				}
                
            }
            else
            {
            	$this->session->set_flashdata('error', 'Please fill in all the files!');	
					redirect('admin/services');
            }
	}

	public function destroy($uniqcode)
	{
      	$data=array(
        'status'=>'Delete',
        'update_datetime'=>date('Y-m-d H:i:s'),
    	);
	  	$this->db->where('uniqcode', $uniqcode);
	  	$this->db->update('tbl_services', $data);
	 	$this->session->set_flashdata('success', 'Services name deleted successfully');                     
	 	redirect('admin/services');
	}

	
}