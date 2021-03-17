<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BannerController extends CI_Controller 
{
	 
	function __construct()
	{
	  	parent::__construct(); 		
		$this->load->helper(array('common_helper', 'string', 'form', 'security'));
		$this->load->library(array('form_validation', 'email'));
		$this->load->model('CommonModel');			

	}	

	public function banner()
	{
		$this->db->where('status <>', 'Delete');
		$this->db->order_by('id', 'desc');
		$banner_data=$this->db->get('tbl_banner')->result();
		$this->data['banner_data']=$banner_data;

		$this->data['page_title']='NNIT | Banner  ';
		$this->data['subview']='setting/banner';
		$this->load->view('admin/layout/default', $this->data);
	}

	public function banner_add()
	{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('banner_name', 'Banner name', 'required');
			if ($this->form_validation->run())
            {
		        $banner_name=$this->input->post('banner_name');
		        $description=$this->input->post('description');
        		$data=array(
				'uniqcode' => random_string('alnum',30),
				'banner_name' => $banner_name,
				'description' => $description,
				'datetime' => date('Y-m-d H:i:s')
				);
		        	$this->db->where('banner_name', $banner_name);
					$query = $this->db->get('tbl_banner');		
					$banner_row = $query->num_rows();
					if($banner_row == 0)
					{
						$banner_upload_image='';   
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
								$config['new_image'] = 'webroot/admin/banner/'.$image_data['file_name'];
								$config['width'] = 1500;
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
						$data['image']=$banner_upload_image;
						$this->db->insert('tbl_banner', $data);
						$this->session->set_flashdata('success', 'Banner added successfully.');	
						redirect('admin/banner');
					}
					else
					{
						$this->session->set_flashdata('error', 'Banner name already exists!');	
						redirect('admin/banner');
					}	
            }
            else
            {
            	$this->session->set_flashdata('error', 'Please fill in all the files!');	
				redirect('admin/banner');
            }
	}
	public function status()
	{
		$uniqcode=$this->input->post('uniqcode');
		$this->db->where('status <>', 'Delete');
		$this->db->where('uniqcode', $uniqcode);
		$get_data=$this->db->get('tbl_banner')->row();

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
		$this->db->update('tbl_banner', $data);
	}
	public function edit_banner()
	{
		$uniqcode=$this->input->post('uniqcode');
		$this->db->where('status <>', 'Delete');
		$this->db->where('uniqcode', $uniqcode);
		$banner_row=$this->db->get('tbl_banner')->row();
		echo '
				<div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Banner</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form  action="'.base_url('admin/banner/update').'" id="puja" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="uniqcode" value="'.$banner_row->uniqcode.'">
								<input type="hidden" name="old_image" value="'.$banner_row->image.'">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div class="form-group">
                                            <img src="'.base_url('webroot/admin/banner/'.$banner_row->image.'').'" id="upload_banner" onclick="get_upload_banner()" class="add_img_button">
                                                <input type="file" class="image-upload select_image" name="image" class="validate[required]" id="banner_input_upload" style="display: none" accept=".jpg,.jpeg,.png" onchange="banner_show_photo(this)">     
                                        </div> 
                                    </div> 
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Banner Name</label>
                                            <input type="text" name="banner_name" id="banner_name" class="form-control validate[required]" data-errormessage-value-missing="Banner name is required" data-prompt-position="bottomLeft" placeholder="Enter Banner name" maxlength="200" value="'.$banner_row->banner_name.'">     
                                        </div> 
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>Description</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="description" id="description" class="form-control validate[required]" data-errormessage-value-missing="Description is required" data-prompt-position="bottomLeft"placeholder="Enter description" >'.$banner_row->description.'</textarea> 
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
				$("#banner").validationEngine();
				});
			</script>
		';

	}
	public function update_banner()
	{
	    $this->load->library('form_validation');
		$this->form_validation->set_rules('banner_name', 'Banner name', 'required');
		if($this->form_validation->run())
		{
			$uniqcode=$this->input->post('uniqcode');
			$old_image=$this->input->post('old_image');
			$banner_name=$this->input->post('banner_name');
	        $description=$this->input->post('description');
			if($_FILES['image']['name'] == "")
			{
				$this->db->where('status <>', 'Delete');
				$this->db->where('banner_name', $banner_name);
				$this->db->where('uniqcode <>', $uniqcode);
				$banner_row=$this->db->get('tbl_banner')->row();
				if(empty($banner_row))
				{
					$data=array(
					'banner_name'=> $banner_name,
					'description'=> $description,
					'update_datetime' => date('Y-m-d H:i:s')
					);
					$this->db->where('uniqcode', $uniqcode);
					$update=$this->db->update('tbl_banner', $data);
					$this->session->set_flashdata('success', 'Banner update successfully.');
					redirect('admin/banner');
				}
				else
				{
					$this->session->set_flashdata('error', 'Banner name already exists!');
					redirect('admin/banner');
				}
			}
			else
			{
				$banner_upload_image=''; 
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
						$config['new_image'] = 'webroot/admin/banner/'.$image_data['file_name'];
						$config['width'] = 1500;
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

						$file = FCPATH.'/webroot/admin/banner/'.$old_image;
						if(file_exists($file))
						{
							unlink($file);
						}
					}
				}
				$this->db->where('status <>', 'Delete');
				$this->db->where('banner_name', $banner_name);
				$this->db->where('uniqcode <>', $uniqcode);
				$banner_row=$this->db->get('tbl_banner')->row();
				if(empty($banner_row))
				{
					$data=array(
					'banner_name'=> $banner_name,
					'description'=> $description,
					'image'=>$banner_upload_image,
					'update_datetime' => date('Y-m-d H:i:s')
					);
					$this->db->where('uniqcode', $uniqcode);
					$update=$this->db->update('tbl_banner', $data);
					$this->session->set_flashdata('success', 'Banner update successfully.');
					redirect('admin/banner');
				}
				else
				{
					$this->session->set_flashdata('error', 'Banner name already exists!');
					redirect('admin/banner');
				}	
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'Please fill in all the files!');
			redirect('admin/banner');
		}
	}

	public function destroy($uniqcode)
	{
      	$data=array(
        'status'=>'Delete',
        'update_datetime'=>date('Y-m-d H:i:s'),
    	);
	  	$this->db->where('uniqcode', $uniqcode);
	  	$this->db->update('tbl_banner', $data);
	 	$this->session->set_flashdata('success', 'Banner deleted successfully');                     
	 	redirect('admin/banner');
	}

	
}