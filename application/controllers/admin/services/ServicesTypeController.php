<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServicesTypeController extends CI_Controller 
{
	 
	function __construct()
	{
	  	parent::__construct(); 		
		$this->load->helper(array('common_helper', 'string', 'form', 'security'));
		$this->load->library(array('form_validation', 'email'));
		$this->load->model('CommonModel');			

	}	

	public function services_type()
	{
		$this->db->where('status <>', 'Delete');
		$this->db->order_by('id', 'desc');
		$ser_type_data=$this->db->get('tbl_services_type')->result();
		$this->data['ser_type_data']=$ser_type_data;

		$this->db->where('status <>', 'Delete');
		$this->db->order_by('id', 'asc');
		$service_data=$this->db->get('tbl_services')->result();
		$this->data['service_data']=$service_data;

		$this->data['page_title']='NNIT | Services Type';
		$this->data['subview']='services/services_type';
		$this->load->view('admin/layout/default', $this->data);
	}

	public function services_add()
	{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('services_type', 'Services type', 'required');
			$this->form_validation->set_rules('develop_name', 'Develop name', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			if ($this->form_validation->run())
            {
		        $services_type=$this->input->post('services_type');
		        $develop_name=$this->input->post('develop_name');
		        $description=$this->input->post('description');
		        $banner_description=$this->input->post('banner_description');
        		$data=array(
				'uniqcode' => random_string('alnum',30),
				'services_type' => $services_type,
				'develop_name' => $develop_name,
				'description' => $description,
				'datetime' => date('Y-m-d H:i:s')
				);
		        	$this->db->where('develop_name', $develop_name);
					$query = $this->db->get('tbl_services_type');		
					$ser_type_row = $query->num_rows();
					if($ser_type_row == 0)
					{
						$services_upload_image='';   
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
								$config['new_image'] = 'webroot/admin/services/'.$image_data['file_name'];
								$config['width'] = 500;
								$config['height'] = 400;
								$this->load->library('image_lib', $config);
								$this->image_lib->clear();
								$this->image_lib->initialize($config);
								$services_upload_image=$image_data['raw_name'].'_thumb'.$image_data['file_ext'];
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
						$data['image']=$services_upload_image;
						$this->db->insert('tbl_services_type', $data);
						$this->session->set_flashdata('success', 'Services type added successfully.');	
						redirect('admin/services_type');
					}
					else
					{
						$this->session->set_flashdata('error', 'Develop name already exists!');	
						redirect('admin/services_type');
					}	
            }
            else
            {
            	$this->session->set_flashdata('error', 'Please fill in all the files!');	
				redirect('admin/services_type');
            }
	}
	public function status()
	{
		$uniqcode=$this->input->post('uniqcode');
		$this->db->where('status <>', 'Delete');
		$this->db->where('uniqcode', $uniqcode);
		$get_data=$this->db->get('tbl_services_type')->row();

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
		$this->db->update('tbl_services_type', $data);
	}
	public function edit_service_type()
	{
		$uniqcode=$this->input->post('uniqcode');
		$this->db->where('status <>', 'Delete');
		$this->db->where('uniqcode', $uniqcode);
		$service_row=$this->db->get('tbl_services_type')->row();

		$this->db->where('status <>', 'Delete');
		$this->db->order_by('id', 'asc');
		$service_data=$this->db->get('tbl_services')->result();
		$this->data['service_data']=$service_data;

		echo '
				<div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Services Type</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form  action="'.base_url('admin/services_type/update').'" id="puja" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="uniqcode" value="'.$service_row->uniqcode.'">
								<input type="hidden" name="old_image" value="'.$service_row->image.'">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div class="form-group">
                                            <img src="'.base_url('webroot/admin/services/'.$service_row->image.'').'" id="upload_services" onclick="get_upload_services()" class="add_img_button">
                                                <input type="file" class="image-upload select_image" name="image" class="validate[required]" id="services_input_upload" style="display: none" accept=".jpg,.jpeg,.png" onchange="services_show_photo(this)">     
                                        </div> 
                                    </div> 
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Services Type</label>
                                            <select id="services_type" name="services_type" class="form-control validate[required]" data-errormessage-value-missing="Services type is required" data-prompt-position="bottomLeft">';
                                             foreach($service_data as $service){?>
                                                <?php if($service->uniqcode==$service_row->services_type)
                                                {?>
                                                    <option value="<?=$service->uniqcode;?>" selected><?=$service->services_name?></option>

                                                <?php }else{?>

                                                    <option value="<?=$service->uniqcode;?>"><?=$service->services_name?></option>
                                                <?php }?>
                                                
                                            <?php }?>
                                            </select>    
                                        </div>  
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Develop Name</label>
                                            <input type="text" name="develop_name" id="develop_name" class="form-control validate[required]" data-errormessage-value-missing="Develop name is required" data-prompt-position="bottomLeft" placeholder="Enter develop name" maxlength="200" value="<?=$service_row->develop_name?>">     
                                        </div> 
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>Description</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="description" id="description" class="form-control validate[required]" data-errormessage-value-missing="Description is required" data-prompt-position="bottomLeft"placeholder="Enter description" ><?=$service_row->description?></textarea> 
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
				$("#services_type").validationEngine();
				});
			</script>
			<?php
		

	}
	public function update_service_type()
	{
	    $this->load->library('form_validation');
		$this->form_validation->set_rules('services_type', 'Services type', 'required');
		$this->form_validation->set_rules('develop_name', 'Develop name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		if($this->form_validation->run())
		{
			$uniqcode=$this->input->post('uniqcode');
			$old_image=$this->input->post('old_image');
			$services_type=$this->input->post('services_type');
	        $develop_name=$this->input->post('develop_name');
	        $description=$this->input->post('description');  
			if($_FILES['image']['name'] == "")
			{
				$this->db->where('status <>', 'Delete');
				$this->db->where('develop_name', $develop_name);
				$this->db->where('uniqcode <>', $uniqcode);
				$service_row=$this->db->get('tbl_services_type')->row();
				if(empty($service_row))
				{
					$data=array(
					'develop_name'=> $develop_name,
					'services_type'=> $services_type,
					'description'=> $description,
					'update_datetime' => date('Y-m-d H:i:s')
					);
					$this->db->where('uniqcode', $uniqcode);
					$update=$this->db->update('tbl_services_type', $data);
					$this->session->set_flashdata('success', 'Services type update successfully.');
					redirect('admin/services_type');
				}
				else
				{
					$this->session->set_flashdata('error', 'Develop name already exists!');
					redirect('admin/services_type');
				}
			}
			else
			{
				$services_upload_image=''; 
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
						$config['new_image'] = 'webroot/admin/services/'.$image_data['file_name'];
						$config['width'] = 500;
						$config['height'] = 400;
						$this->load->library('image_lib', $config);
						$this->image_lib->clear();
						$this->image_lib->initialize($config);
						$services_upload_image=$image_data['raw_name'].'_thumb'.$image_data['file_ext'];
						if (!$this->image_lib->resize())
						{
							$this->handle_error($this->image_lib->display_errors());
						}
						$file = FCPATH.'/webroot/admin/all_images/'.$image_data['file_name'];
						if(file_exists($file))
						{
							unlink($file);
						}

						$file = FCPATH.'/webroot/admin/services/'.$old_image;
						if(file_exists($file))
						{
							unlink($file);
						}
					}
				}
				$this->db->where('status <>', 'Delete');
				$this->db->where('develop_name', $develop_name);
				$this->db->where('uniqcode <>', $uniqcode);
				$service_type_row=$this->db->get('tbl_services_type')->row();
				if(empty($service_type_row))
				{
					$data=array(
					'develop_name'=> $develop_name,
					'services_type'=> $services_type,
					'description'=> $description,
					'image'=>$services_upload_image,
					'update_datetime' => date('Y-m-d H:i:s')
					);
					$this->db->where('uniqcode', $uniqcode);
					$update=$this->db->update('tbl_services_type', $data);
					$this->session->set_flashdata('success', 'Services type update successfully.');
					redirect('admin/services_type');
				}
				else
				{
					$this->session->set_flashdata('error', 'Develop name already exists!');
					redirect('admin/services_type');
				}	
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'Please fill in all the files!');
			redirect('admin/services_type');
		}
	}

	public function destroy($uniqcode)
	{
      	$data=array(
        'status'=>'Delete',
        'update_datetime'=>date('Y-m-d H:i:s'),
    	);
	  	$this->db->where('uniqcode', $uniqcode);
	  	$this->db->update('tbl_services_type', $data);
	 	$this->session->set_flashdata('success', 'Services type deleted successfully');                     
	 	redirect('admin/services_type');
	}

	
}