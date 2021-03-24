<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogoController extends CI_Controller 
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

	public function logo()
	{
		$this->db->where('status <>', 'Delete');
		$this->db->order_by('id', 'desc');
		$logo_data=$this->db->get('tbl_logo')->result();
		$this->data['logo_data']=$logo_data;

		$this->data['page_title']='NNIT | Logo';
		$this->data['subview']='setting/logo';
		$this->data['logo_icons']=$this->CommonModel->RetriveRecordByWhereRow('tbl_logo',['status'=>'Active'],'image');
		$this->data['foot_con'] = $this->CommonModel->RetriveRecordByWhereRow('tbl_contact',['status'=>'Active'],'footer_copy_right');
		$this->load->view('admin/layout/default', $this->data);
	}

	public function logo_add()
	{	
		$logo_upload_image=''; 
		if(!empty($_FILES['image']['name']))
		{
			$config['upload_path'] = FCPATH.'/webroot/admin/all_images/';
			$config['allowed_types'] = '*';
			$config['encrypt_name'] = TRUE;
			$config['max_size'] = 1024;
			$config['file_name'] = $_FILES['image']['name'];
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('image'))
			{
				$image_data = $this->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = $image_data['full_path'];
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['new_image'] = 'webroot/admin/logo/web/'.$image_data['file_name'];
				$config['width'] = 500;
				$config['height'] = 400;
				$this->load->library('image_lib', $config);
				$this->image_lib->clear();
				$this->image_lib->initialize($config);
				$logo_upload_image=$image_data['raw_name'].'_thumb'.$image_data['file_ext'];
				if (!$this->image_lib->resize())
				{
					$this->handle_error($this->image_lib->display_errors());
				}

				$config['image_library'] = 'gd2';
				$config['source_image'] = $image_data['full_path'];
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['new_image'] = 'webroot/admin/logo/mobile/'.$image_data['file_name'];
				$config['width'] = 300;
				$config['height'] = 200;
				$this->load->library('image_lib', $config);
				$this->image_lib->clear();
				$this->image_lib->initialize($config);
				$logo_upload_image=$image_data['raw_name'].'_thumb'.$image_data['file_ext'];
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
		        $data=array(
				'uniqcode' => random_string('alnum',30),
				'image' => $logo_upload_image,
				'datetime' => date('Y-m-d H:i:s')
				);
				$this->db->where('status', 'Active');
		        $active = $this->db->get('tbl_logo');
		        $active_row = $active->num_rows();
		        if($active_row == 0)
		        {
		        	$this->db->where('status <>', 'Delete');
					$this->db->where('image', $logo_upload_image);
		        	$query = $this->db->get('tbl_logo');		
    				$count_row = $query->num_rows(); 
    			  	if($count_row == 0) 
		              	{
		              		$this->db->insert('tbl_logo', $data);
		              		$this->session->set_flashdata('success', 'Logo added successfully.');	
							redirect('admin/logo');
		              	}
		              	else
		              	{
		              		$this->session->set_flashdata('error', 'Logo  already exists!');	
							redirect('admin/logo');
		              	}
		        }
		        else
		        {
		        	$this->session->set_flashdata('error', 'Logo already exists!');	
					redirect('admin/logo');	
		        }
	}
	public function status()
	{
		$uniqcode=$this->input->post('uniqcode');
		$this->db->where('status <>', 'Delete');
		$this->db->where('uniqcode', $uniqcode);
		$get_data=$this->db->get('tbl_logo')->row();

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
		$this->db->update('tbl_logo', $data);
	}
	public function edit_logo()
	{
		$uniqcode=$this->input->post('uniqcode');
		$this->db->where('status <>', 'Delete');
		$this->db->where('uniqcode', $uniqcode);
		$logo_row=$this->db->get('tbl_logo')->row();
		echo '
				<div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Logo</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form  action="'.base_url('admin/logo/update').'" id="puja" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="uniqcode" value="'.$logo_row->uniqcode.'">
								<input type="hidden" name="old_image" value="'.$logo_row->image.'">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div class="form-group">
                                            <img src="'.base_url('webroot/admin/logo/web/'.$logo_row->image.'').'" id="upload_logo" onclick="get_upload_logo()" class="add_img_button">
                                            <input type="file" class="image-upload select_image" name="image" class="validate[required]" id="logo_input_upload" style="display: none" accept=".jpg,.jpeg,.png" onchange="logo_show_photo(this)">     
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
				$("#logo").validationEngine();
				});
			</script>
		';

	}
	public function update_logo_data()
	{
		$uniqcode=$this->input->post('uniqcode');
		$old_image=$this->input->post('old_image');
		$logo_upload_image=''; 
		if(!empty($_FILES['image']['name']))
		{
			$config['upload_path'] = FCPATH.'/webroot/admin/all_images/';
			$config['allowed_types'] = '*';
			$config['encrypt_name'] = TRUE;
			$config['max_size'] = 1024;
			$config['file_name'] = $_FILES['image']['name'];
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('image'))
			{
				$image_data = $this->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = $image_data['full_path'];
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['new_image'] = 'webroot/admin/logo/web/'.$image_data['file_name'];
				$config['width'] = 500;
				$config['height'] = 400;
				$this->load->library('image_lib', $config);
				$this->image_lib->clear();
				$this->image_lib->initialize($config);
				$logo_upload_image=$image_data['raw_name'].'_thumb'.$image_data['file_ext'];
				if (!$this->image_lib->resize())
				{
					$this->handle_error($this->image_lib->display_errors());
				}

				$config['image_library'] = 'gd2';
				$config['source_image'] = $image_data['full_path'];
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['new_image'] = 'webroot/admin/logo/mobile/'.$image_data['file_name'];
				$config['width'] = 300;
				$config['height'] = 200;
				$this->load->library('image_lib', $config);
				$this->image_lib->clear();
				$this->image_lib->initialize($config);
				$logo_upload_image=$image_data['raw_name'].'_thumb'.$image_data['file_ext'];
				if (!$this->image_lib->resize())
				{
					$this->handle_error($this->image_lib->display_errors());
				}
				$file = FCPATH.'/webroot/admin/all_images/'.$image_data['file_name'];
				if(file_exists($file))
				{
					unlink($file);
				}

				$file = FCPATH.'/webroot/admin/logo/mobile/'.$old_image;
				if(file_exists($file))
				{
					unlink($file);
				}

				$file = FCPATH.'/webroot/admin/logo/web/'.$old_image;
				if(file_exists($file))
				{
					unlink($file);
				}
			}
		}
		$this->db->where('status <>', 'Delete');
		$this->db->where('uniqcode <>', $uniqcode);
		$logo_row=$this->db->get('tbl_logo')->row();
		if(empty($logo_row))
		{
			$data=array(
			'image'=>$logo_upload_image,
			'update_datetime' => date('Y-m-d h:i:s')
			);
			$this->db->where('uniqcode', $uniqcode);
			$update=$this->db->update('tbl_logo', $data);
			$this->session->set_flashdata('success', 'logo update successfully.');
			redirect('admin/logo');
		}
		else
		{
			$this->session->set_flashdata('error', 'logo name already exists!');
			redirect('admin/logo');
		}	
	}

	public function destroy($uniqcode)
	{
      	$data=array(
        'status'=>'Delete',
        'update_datetime'=>date('Y-m-d H:i:s'),
    	);
	  	$this->db->where('uniqcode', $uniqcode);
	  	$this->db->update('tbl_logo', $data);
	  	$delete_pic=$this->CommonModel->RetriveRecordByWhereRow('tbl_logo',['uniqcode'=>$uniqcode],'image');
	  	$old_image=$delete_pic->image;

	  	$file = FCPATH.'/webroot/admin/logo/mobile/'.$old_image;
	  	// pr($file);
	  	// die();
		if(file_exists($file))
		{
			unlink($file);
		}
		$file = FCPATH.'/webroot/admin/logo/web/'.$old_image;
		if(file_exists($file))
		{
			unlink($file);
		}
	 	$this->session->set_flashdata('success', 'Logo deleted successfully');                     
	 	redirect('admin/logo');
	}

	
}