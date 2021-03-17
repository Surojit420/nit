<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChooseNitController extends CI_Controller 
{
	 
	function __construct()
	{
	  	parent::__construct(); 		
		$this->load->helper(array('common_helper', 'string', 'form', 'security'));
		$this->load->library(array('form_validation', 'email'));
		$this->load->model('CommonModel');
		
	}	

	public function choosenit()
	{
		$this->db->where('status <>', 'Delete');
		$this->db->order_by('id', 'desc');
		$tec_data=$this->db->get('tbl_why_choose')->result();
		$this->data['tec_data']=$tec_data;

		$this->data['page_title']='NNIT | Choose Nit';
		$this->data['subview']='setting/choosenit';
		$this->load->view('admin/layout/default', $this->data);
	}

	public function add_choosenit()
	{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Name', 'required');
			if ($this->form_validation->run())
            {
		        $name=$this->input->post('name');
        		$data=array(
				'uniqcode' => random_string('alnum',30),
				'name' => $name,
				'datetime' => date('Y-m-d H:i:s')
				);
		        	$this->db->where('name', $name);
					$query = $this->db->get('tbl_why_choose');		
					$tec_row = $query->num_rows();
					if($tec_row == 0)
					{
						$tec_upload_image='';   
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
								$config['new_image'] = 'webroot/admin/choosenit/'.$image_data['file_name'];
								$config['width'] = 500;
								$config['height'] = 400;
								$this->load->library('image_lib', $config);
								$this->image_lib->clear();
								$this->image_lib->initialize($config);
								$tec_upload_image=$image_data['raw_name'].'_thumb'.$image_data['file_ext'];
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
						$data['image']=$tec_upload_image;
						$this->db->insert('tbl_why_choose', $data);
						$this->session->set_flashdata('success', 'Data added successfully.');	
						redirect('admin/choosenit');
					}
					else
					{
						$this->session->set_flashdata('error', 'Name already exists!');	
						redirect('admin/choosenit');
					}	
            }
            else
            {
            	$this->session->set_flashdata('error', 'Please fill in all the files!');	
				redirect('admin/choosenit');
            }
	}
	public function status()
	{
		$uniqcode=$this->input->post('uniqcode');
		$this->db->where('status <>', 'Delete');
		$this->db->where('uniqcode', $uniqcode);
		$get_data=$this->db->get('tbl_why_choose')->row();

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
		$this->db->update('tbl_why_choose', $data);
	}
	public function edit_choosenit()
	{
		$uniqcode=$this->input->post('uniqcode');
		$this->db->where('status <>', 'Delete');
		$this->db->where('uniqcode', $uniqcode);
		$tec_row=$this->db->get('tbl_why_choose')->row();
		echo '
				<div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Choose Nit</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form  action="'.base_url('admin/choosenit/update').'" id="choosenit" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="uniqcode" value="'.$tec_row->uniqcode.'">
								<input type="hidden" name="old_image" value="'.$tec_row->image.'">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div class="form-group">
                                            <img src="'.base_url('webroot/admin/choosenit/'.$tec_row->image.'').'" id="upload_choosenit" onclick="get_upload_choosenit()" class="add_img_button">
                                                <input type="file" class="image-upload select_image" name="image" class="validate[required]" id="choosenit_input_upload" style="display: none" accept=".jpg,.jpeg,.png" onchange="choosenit_show_photo(this)">     
                                        </div> 
                                    </div> 
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Technologies Name</label>
                                            <input type="text" name="name" id="name" class="form-control validate[required]" data-errormessage-value-missing="Technologies name is required" data-prompt-position="bottomLeft" placeholder="Enter technologies name" maxlength="200" value="'.$tec_row->name.'">     
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
				$("#choosenit").validationEngine();
				});
			</script>
		';

	}
	public function update_choosenit()
	{
	    $this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'required');
		if($this->form_validation->run())
		{
			$uniqcode=$this->input->post('uniqcode');
			$old_image=$this->input->post('old_image');
			$name=$this->input->post('name');
			if($_FILES['image']['name'] == "")
			{
				$this->db->where('status <>', 'Delete');
				$this->db->where('name', $name);
				$this->db->where('uniqcode <>', $uniqcode);
				$tec_row=$this->db->get('tbl_why_choose')->row();
				if(empty($tec_row))
				{
					$data=array(
					'name'=> $name,
					'update_datetime' => date('Y-m-d H:i:s')
					);
					$this->db->where('uniqcode', $uniqcode);
					$update=$this->db->update('tbl_why_choose', $data);
					$this->session->set_flashdata('success', 'Data update successfully.');
					redirect('admin/choosenit');
				}
				else
				{
					$this->session->set_flashdata('error', 'Data name already exists!');
					redirect('admin/choosenit');
				}
			}
			else
			{
				$tec_upload_image=''; 
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
						$config['new_image'] = 'webroot/admin/choosenit/'.$image_data['file_name'];
						$config['width'] = 500;
						$config['height'] = 400;
						$this->load->library('image_lib', $config);
						$this->image_lib->clear();
						$this->image_lib->initialize($config);
						$tec_upload_image=$image_data['raw_name'].'_thumb'.$image_data['file_ext'];
						if (!$this->image_lib->resize())
						{
							$this->handle_error($this->image_lib->display_errors());
						}
						$file = FCPATH.'/webroot/admin/all_images/'.$image_data['file_name'];
						if(file_exists($file))
						{
							unlink($file);
						}

						$file = FCPATH.'/webroot/admin/choosenit/'.$old_image;
						if(file_exists($file))
						{
							unlink($file);
						}
					}
				}
				$this->db->where('status <>', 'Delete');
				$this->db->where('name', $name);
				$this->db->where('uniqcode <>', $uniqcode);
				$tec_row=$this->db->get('tbl_why_choose')->row();
				if(empty($tec_row))
				{
					$data=array(
					'name'=> $name,
					'image'=>$tec_upload_image,
					'update_datetime' => date('Y-m-d H:i:s')
					);
					$this->db->where('uniqcode', $uniqcode);
					$update=$this->db->update('tbl_why_choose', $data);
					$this->session->set_flashdata('success', 'Data update successfully.');
					redirect('admin/choosenit');
				}
				else
				{
					$this->session->set_flashdata('error', 'Data name already exists!');
					redirect('admin/choosenit');
				}	
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'Please fill in all the files!');
			redirect('admin/choosenit');
		}
	}

	public function destroy($uniqcode)
	{
      	$data=array(
        'status'=>'Delete',
        'update_datetime'=>date('Y-m-d H:i:s'),
    	);
	  	$this->db->where('uniqcode', $uniqcode);
	  	$this->db->update('tbl_why_choose', $data);
	 	$this->session->set_flashdata('success', 'Choose Nit deleted successfully');                     
	 	redirect('admin/choosenit');
	}	
}