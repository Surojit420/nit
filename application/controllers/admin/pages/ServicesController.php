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

	public function index()
	{
		
		$this->data['ser_type_data']=$this->CommonModel->RetriveRecordByWhereOrderby('tbl_pages',['status<>'=>'Delete','type'=>'services'],'id','desc');

		$this->db->where('status <>', 'Delete');
		$this->db->order_by('id', 'asc');
		$service_data=$this->db->get('tbl_services')->result();
		$this->data['service_data']=$service_data;

		$this->data['page_title']='NNIT | Services Type';
		$this->data['subview']='pages/services';
		$this->data['logo_icons']=$this->CommonModel->RetriveRecordByWhereRow('tbl_logo',['status'=>'Active'],'image');
		$this->data['foot_con'] = $this->CommonModel->RetriveRecordByWhereRow('tbl_contact',['status'=>'Active'],'footer_copy_right');
		$this->load->view('admin/layout/default', $this->data);
	}

	public function add()
	{
			
		        $services_type=$this->input->post('services_type');
		        $description=$this->input->post('description');
		        $head=$this->input->post('head');
		        $start_body=$this->input->post('start_body');
		        $close_body=$this->input->post('close_body');	
        		$data=array(
				'uniqcode' => random_string('alnum',30),
				'name'=> $services_type,
				'description' => $description,
				'head' => $head,
				'type'=> 'services',
				'start_body' => $start_body,
				'close_body' => $close_body,
				'current_date' => date('Y-m-d H:i:s')
				);
		        	
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
								$config['new_image'] = 'webroot/admin/bannerservices/'.$image_data['file_name'];
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
						$this->db->insert('tbl_pages', $data);
						$this->session->set_flashdata('success', 'Services type added successfully.');	
						redirect('admin/page-services');
            
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
		$service_row=$this->db->get('tbl_pages')->row();

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
                                <form  action="'.base_url('admin/pages/services/update').'" id="puja" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="uniqcode" value="'.$service_row->uniqcode.'">
								<input type="hidden" name="old_image" value="'.$service_row->image.'">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div class="form-group">
                                            <img src="'.base_url('webroot/admin/bannerservices/'.$service_row->image.'').'" id="upload_services" onclick="get_upload_services()" class="add_img_button">
                                                <input type="file" class="image-upload select_image" name="image" class="validate[required]" id="services_input_upload" style="display: none" accept=".jpg,.jpeg,.png" onchange="services_show_photo(this)">     
                                        </div> 
                                    </div> 
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Services Type</label>
                                            <select id="services_type" name="services_type" class="form-control "  data-prompt-position="bottomLeft">';
                                             foreach($service_data as $service){?>
                                                <?php if($service->services_name==$service_row->name)
                                                {?>
                                                    <option value="<?=$service->services_name;?>" selected><?=$service->services_name?></option>

                                                <?php }
                                                else
                                                {
                                                	?>

                                                    <option value="<?=$service->services_name;?>"><?=$service->services_name?></option>
                                                <?php }?>
                                                
                                            <?php }?>
                                            </select>    
                                        </div>  
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>Description</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="description" id="description" class="form-control " data-prompt-position="bottomLeft"placeholder="Enter description" ><?=$service_row->description?></textarea> 
                                       </div> 
                                    </div>
                                     <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>head</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="head" id="description" class="form-control" data-prompt-position="bottomLeft"placeholder="Enter head" ><?=$service_row->head?></textarea> 
                                       </div> 
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>start_body</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="start_body" id="description" class="form-control" data-prompt-position="bottomLeft"placeholder="Enter start body" ><?=$service_row->start_body?></textarea> 
                                       </div> 
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>close_body</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="close_body" id="description" class="form-control" data-prompt-position="bottomLeft"placeholder="Enter close_body" ><?=$service_row->close_body?></textarea> 
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
                                             
	public function update()
	{
	    $this->load->library('form_validation');
		$this->form_validation->set_rules('description', 'Description', 'required');
		if($this->form_validation->run())
		{
			$uniqcode=$this->input->post('uniqcode');
			$old_image=$this->input->post('old_image');
			$head=$this->input->post('head');
			$start_body=$this->input->post('start_body');
			$close_body=$this->input->post('close_body');
	        $description=$this->input->post('description');
			if($_FILES['image']['name'] == "")
			{
					$data=array(
					'description'=> $description,
					'head' => $head,
					'close_body' => $close_body,
					'start_body' => $start_body,
					'update_datetime' => date('Y-m-d H:i:s')
					);
					$this->db->where('uniqcode', $uniqcode);
					$update=$this->db->update('tbl_pages', $data);
					$this->session->set_flashdata('success', 'services update successfully.');
					redirect('admin/page-services');
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
						$config['new_image'] = 'webroot/admin/bannerservices/'.$image_data['file_name'];
						$config['width'] = 500;
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

						$file = FCPATH.'/webroot/admin/bannerservices/'.$old_image;
						if(file_exists($file))
						{
							unlink($file);
						}
					}
				}
				$this->db->where('status <>', 'Delete');
				$this->db->where('uniqcode <>', $uniqcode);
				$banner_row=$this->db->get('tbl_pages')->row();
				$data=array(
				'head'=>$head,
				'close_body' => $close_body,
				'start_body' => $start_body,
				'description'=> $description,
				'image'=>$banner_upload_image,
				'update_datetime' => date('Y-m-d H:i:s')
				);
				$this->db->where('uniqcode', $uniqcode);
				$update=$this->db->update('tbl_pages', $data);
				$this->session->set_flashdata('success', 'services update successfully.');
				redirect('admin/page-services');		
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'Please fill in all the files!');
			redirect('admin/page-services');
		}
	}

	public function destroy($uniqcode)
	{
      	$data=array(
        'status'=>'Delete',
        'update_datetime'=>date('Y-m-d H:i:s'),
    	);
	  	$this->db->where('uniqcode', $uniqcode);
	  	$this->db->update('tbl_pages', $data);
	  	$delete_pic=$this->CommonModel->RetriveRecordByWhereRow('tbl_pages',['uniqcode'=>$uniqcode],'image');
	  	$old_image=$delete_pic->image;
	  	$file = FCPATH.'/webroot/admin/bannerservices/'.$old_image;
		if(file_exists($file))
		{
			unlink($file);
		}
	 	$this->session->set_flashdata('success', 'Services type deleted successfully');                     
	 	redirect('admin/page-services');
	}

	
}