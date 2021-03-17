<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MissionController extends CI_Controller 
{
	 
	function __construct()
	{
	  	parent::__construct(); 		
		$this->load->helper(array('common_helper', 'string', 'form', 'security'));
		$this->load->library(array('form_validation', 'email'));
		$this->load->model('CommonModel');			

	}	

	public function mission()
	{
		$this->db->where('status <>', 'Delete');
		$this->db->order_by('id', 'desc');
		$mission_data=$this->db->get('tbl_mission')->result();
		$this->data['mission_data']=$mission_data;

		$this->data['page_title']='NNIT | Mission';
		$this->data['subview']='setting/mission';
		$this->load->view('admin/layout/default', $this->data);
	}

	public function add_mission()
	{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('description', 'Description', 'required');
			if ($this->form_validation->run())
            {
		        $description=$this->input->post('description');
        		$data=array(
				'uniqcode' => random_string('alnum',30),
				'description' => $description,
				'datetime' => date('Y-m-d H:i:s')
				);
				$this->db->where('status', 'Active');
		        $active = $this->db->get('tbl_mission');
		        $active_row = $active->num_rows();
		        if($active_row == 0)
		        {
		        	$this->db->where('description', $description);
					$query = $this->db->get('tbl_mission');		
					$banner_row = $query->num_rows();
					if($banner_row == 0)
					{
						$mission_upload_image='';   
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
								$config['new_image'] = 'webroot/admin/mission/'.$image_data['file_name'];
								$config['width'] = 500;
								$config['height'] = 400;
								$this->load->library('image_lib', $config);
								$this->image_lib->clear();
								$this->image_lib->initialize($config);
								$mission_upload_image=$image_data['raw_name'].'_thumb'.$image_data['file_ext'];
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
						$data['image']=$mission_upload_image;
						$this->db->insert('tbl_mission', $data);
						$this->session->set_flashdata('success', 'Mission added successfully.');	
						redirect('admin/mission');
					}
					else
					{
						$this->session->set_flashdata('error', 'Mission Description already exists!');	
						redirect('admin/mission');
					}
		        }
		        else
		        {
		        	$this->session->set_flashdata('error', 'Mission Description already exists!');	
					redirect('admin/mission');
		        }
		        		
            }
            else
            {
            	$this->session->set_flashdata('error', 'Please fill in all the files!');	
				redirect('admin/mission');
            }
	}
	
	public function status()
	{
		$uniqcode=$this->input->post('uniqcode');
		$this->db->where('status <>', 'Delete');
		$this->db->where('uniqcode', $uniqcode);
		$get_data=$this->db->get('tbl_mission')->row();

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
		$this->db->update('tbl_mission', $data);
	}
	public function edit_mission()
	{
		$uniqcode=$this->input->post('uniqcode');
		$this->db->where('status <>', 'Delete');
		$this->db->where('uniqcode', $uniqcode);
		$mission_row=$this->db->get('tbl_mission')->row();
		echo '
				<div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Mission Edit</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form  action="'.base_url('admin/mission/update').'" id="puja" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="uniqcode" value="'.$mission_row->uniqcode.'">
								<input type="hidden" name="old_image" value="'.$mission_row->image.'">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div class="form-group">
                                            <img src="'.base_url('webroot/admin/mission/'.$mission_row->image.'').'" id="upload_mission" onclick="get_upload_mission()" class="add_img_button">
                                                <input type="file" class="image-upload select_image" name="image" class="validate[required]" id="mission_input_upload" style="display: none" accept=".jpg,.jpeg,.png" onchange="mission_show_photo(this)">     
                                        </div> 
                                    </div> 
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>Description</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="description" id="description" class="form-control validate[required]" data-errormessage-value-missing="Description is required" data-prompt-position="bottomLeft"placeholder="Enter description" >'.$mission_row->description.'</textarea> 
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
				$("#mission").validationEngine();
				});
			</script>
		';

	}
	public function update_mission()
	{
	    $this->load->library('form_validation');
		$this->form_validation->set_rules('description', 'Description', 'required');
		if($this->form_validation->run())
		{
			$uniqcode=$this->input->post('uniqcode');
			$old_image=$this->input->post('old_image');
	        $description=$this->input->post('description');
			if($_FILES['image']['name'] == "")
			{
				$this->db->where('status <>', 'Delete');
				$this->db->where('description', $description);
				$this->db->where('uniqcode <>', $uniqcode);
				$banner_row=$this->db->get('tbl_mission')->row();
				if(empty($banner_row))
				{
					$data=array(
					'description'=> $description,
					'update_datetime' => date('Y-m-d H:i:s')
					);
					$this->db->where('uniqcode', $uniqcode);
					$update=$this->db->update('tbl_mission', $data);
					$this->session->set_flashdata('success', 'Mission update successfully.');
					redirect('admin/mission');
				}
				else
				{
					$this->session->set_flashdata('error', 'Mission Description already exists!');
					redirect('admin/mission');
				}
			}
			else
			{
				$mission_upload_image=''; 
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
						$config['new_image'] = 'webroot/admin/mission/'.$image_data['file_name'];
						$config['width'] = 500;
						$config['height'] = 400;
						$this->load->library('image_lib', $config);
						$this->image_lib->clear();
						$this->image_lib->initialize($config);
						$mission_upload_image=$image_data['raw_name'].'_thumb'.$image_data['file_ext'];
						if (!$this->image_lib->resize())
						{
							$this->handle_error($this->image_lib->display_errors());
						}
						$file = FCPATH.'/webroot/admin/all_images/'.$image_data['file_name'];
						if(file_exists($file))
						{
							unlink($file);
						}

						$file = FCPATH.'/webroot/admin/mission/'.$old_image;
						if(file_exists($file))
						{
							unlink($file);
						}
					}
				}
				$this->db->where('status <>', 'Delete');
				$this->db->where('description', $description);
				$this->db->where('uniqcode <>', $uniqcode);
				$banner_row=$this->db->get('tbl_mission')->row();
				if(empty($banner_row))
				{
					$data=array(
					'description'=> $description,
					'image'=>$mission_upload_image,
					'update_datetime' => date('Y-m-d H:i:s')
					);
					$this->db->where('uniqcode', $uniqcode);
					$update=$this->db->update('tbl_mission', $data);
					$this->session->set_flashdata('success', 'Mission update successfully.');
					redirect('admin/mission');
				}
				else
				{
					$this->session->set_flashdata('error', 'Mission description already exists!');
					redirect('admin/mission');
				}	
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'Please fill in all the files!');
			redirect('admin/mission');
		}
	}

	public function destroy($uniqcode)
	{
      	$data=array(
        'status'=>'Delete',
        'update_datetime'=>date('Y-m-d H:i:s'),
    	);
	  	$this->db->where('uniqcode', $uniqcode);
	  	$this->db->update('tbl_mission', $data);
	 	$this->session->set_flashdata('success', 'Mission deleted successfully');                     
	 	redirect('admin/mission');
	}

	
}