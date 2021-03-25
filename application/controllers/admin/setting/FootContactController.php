<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FootContactController extends CI_Controller 
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

	public function footer_contact()
	{
		$this->db->where('status <>', 'Delete');
		$this->db->order_by('id', 'desc');
		$contact_data=$this->db->get('tbl_contact')->result();
		$this->data['contact_data']=$contact_data;

		$this->data['page_title']='NNIT | footer Contact';
		$this->data['subview']='setting/footer_contact';
		$this->data['logo_icons']=$this->CommonModel->RetriveRecordByWhereRow('tbl_logo',['status'=>'Active'],'image');
		$this->data['foot_con'] = $this->CommonModel->RetriveRecordByWhereRow('tbl_contact',['status'=>'Active'],'footer_copy_right');
		$this->load->view('admin/layout/default', $this->data);
	}

	public function contact_add()
	{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('phone_no', 'Contact', 'required|is_natural|min_length[10]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('footer_copy_right', 'Footer copy right', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('about_us', 'About us', 'required');
			$this->form_validation->set_rules('contact_us', 'Contact us', 'required');
			if ($this->form_validation->run())
            {
		        $phone_no=$this->input->post('phone_no');
		        $email=$this->input->post('email');
		        $footer_copy_right=$this->input->post('footer_copy_right');
		        $address=$this->input->post('address');
		        $about_us = $this->input->post('about_us');
		        $contact_us = $this->input->post('contact_us');
		        $contact_map = $this->input->post('contact_map');
		        $facebook = $this->input->post('facebook');
		        $linkedin = $this->input->post('linkedin');
		        $twitter = $this->input->post('twitter');
		        $instagram = $this->input->post('instagram');
		        $data=array(
				'uniqcode' => random_string('alnum',30),
				'phone_no' => $phone_no,
				'email' => $email,
				'footer_copy_right' => $footer_copy_right,
				'address'=> $address,
				'about_us'=> $about_us,
				'contact_us'=> $contact_us,
				'contact_map' => $contact_map,
				'link' => serialize(array('facebook' => $facebook,'twitter' =>  $twitter,'linkedin' => $linkedin,'instagram' =>$instagram)),
				'datetime' => date('Y-m-d H:i:s')
				);
				$this->db->where('status', 'Active');
		        $active = $this->db->get('tbl_contact');
		        $active_row = $active->num_rows();
		        if($active_row == 0)
		        {
		        	$this->db->where('phone_no', $phone_no);
					$query = $this->db->get('tbl_contact');		
					$count_row = $query->num_rows();
					if($count_row == 0)
					{
						$contact_upload_image='';   
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
								$config['new_image'] = 'webroot/admin/contact/'.$image_data['file_name'];
								$config['width'] = 500;
								$config['height'] = 400;
								$this->load->library('image_lib', $config);
								$this->image_lib->clear();
								$this->image_lib->initialize($config);
								$contact_upload_image=$image_data['raw_name'].'_thumb'.$image_data['file_ext'];
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
						$data['contact_images']=$contact_upload_image;
						$this->db->insert('tbl_contact', $data);
						$this->session->set_flashdata('success', 'Contact added successfully.');	
						redirect('admin/footer_contact');
					}
					else
					{
						$this->session->set_flashdata('error', 'Contact phone no already exists!');	
						redirect('admin/footer_contact');
					}
		        }
		        else
		        {
		        	$this->session->set_flashdata('error', 'Contact already exists!');	
					redirect('admin/footer_contact');
		        } 	
            }
            else
            {
            	$this->session->set_flashdata('error', 'Please fill in all the files!');	
				redirect('admin/footer_contact');
            }
	}
	public function status()
	{
		$uniqcode=$this->input->post('uniqcode');
		$this->db->where('status <>', 'Delete');
		$this->db->where('uniqcode', $uniqcode);
		$get_data=$this->db->get('tbl_contact')->row();

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
		$this->db->update('tbl_contact', $data);
	}
	public function edit_contact()
	{
		$uniqcode=$this->input->post('uniqcode');
		$this->db->where('status <>', 'Delete');
		$this->db->where('uniqcode', $uniqcode);
		$contact_row=$this->db->get('tbl_contact')->row();
		echo '
				<div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Footer & Contact</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form  action="'.base_url('admin/footer_contact/update').'" id="puja" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="uniqcode" value="'.$contact_row->uniqcode.'">
								<input type="hidden" name="old_image" value="'.$contact_row->contact_images.'">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div class="form-group">
                                            <img src="'.base_url('webroot/admin/contact/'.$contact_row->contact_images.'').'" id="upload_contact" onclick="get_upload_contact()" class="add_img_button">
                                            <input type="file" class="image-upload select_image" name="image" class="validate[required]" id="contact_input_upload" style="display: none" accept=".jpg,.jpeg,.png" onchange="contact_show_photo(this)">     
                                        </div> 
                                    </div> 
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" id="email" class="form-control validate[required,custom[email]]" data-errormessage-value-missing="Email is required" data-prompt-position="bottomLeft" placeholder="Enter email" maxlength="200" value="'.$contact_row->email.'">      
                                        </div> 
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" name="phone_no" id="phone_no" class="form-control validate[required,custom[phone],minSize[10],maxSize[10]]" data-errormessage-value-missing="Phone no is required" data-prompt-position="bottomLeft" placeholder="Enter phone no" maxlength="200" value="'.$contact_row->phone_no.'">     
                                        </div> 
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Footer Copyright</label>
                                            <input type="text" name="footer_copy_right" id="footer_copy_right" class="form-control validate[required]" data-errormessage-value-missing="Footer copy right" data-prompt-position="bottomLeft" placeholder="Enter footer copyright" maxlength="200" value="'.$contact_row->footer_copy_right.'">     
                                        </div> 
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>Contact Address</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="address" id="address" class="form-control validate[required]" data-errormessage-value-missing="Address is required" data-prompt-position="bottomLeft"placeholder="Enter contact address" >'.$contact_row->address.'</textarea> 
                                       </div> 
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>About Us</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="about_us" id="about_us" class="form-control validate[required]" data-errormessage-value-missing="About is required" data-prompt-position="bottomLeft"placeholder="Enter about us" >'.$contact_row->about_us.'</textarea> 
                                       </div> 
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>Contact Us</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="contact_us" id="contact_us" class="form-control validate[required]" data-errormessage-value-missing="Contact is required" data-prompt-position="bottomLeft"placeholder="Enter contact us" >'.$contact_row->contact_us.'</textarea> 
                                       </div> 
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>Contact Map Iframe</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="contact_map" id="contact_map" class="form-control" data-errormessage-value-missing="Contact map iframe" data-prompt-position="bottomLeft"placeholder="Enter map iframe" >'.$contact_row->contact_map.'</textarea> 
                                       </div> 
                                    </div>';
  								 
                                   
                                      $social=array();
                                      $social= unserialize($contact_row->link);
                                     
                                    foreach ($social as $keys => $values) {
                                   
                                    echo '<div class="col-lg-6">
                                        <div class="form-group">
                                            Icones
                                        <select class="form-control form-control-lg selectpicker" name="<?=$keys?>">
                                            <option selected="true" data-content="<i class="fa fa'.$keys.'" aria-hidden="true"></i> <?=$keys?>" ></option> 
                                        </select>
                                    </div> 
                                    </div>
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Link</label>
                                            <input type="text" name="<?=$keys?>" id="link" class="form-control validate[required]" data-errormessage-value-missing="link is required" data-prompt-position="bottomLeft" placeholder="<?=$key?> link" maxlength="200" value="'.$value.'">     
                                        </div>
                                    </div>';
                                  }
           				echo'</div>
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
				$("#fot_contact").validationEngine();
				});
			</script>
		';

	}
	public function update_contact_data()
	{
	    $this->load->library('form_validation');
		$this->form_validation->set_rules('phone_no', 'Contact', 'required|is_natural|min_length[10]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('footer_copy_right', 'Footer copy right', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('about_us', 'About us', 'required');
		$this->form_validation->set_rules('contact_us', 'Contact us', 'required');
		if($this->form_validation->run())
		{
			$uniqcode=$this->input->post('uniqcode');
			$old_image=$this->input->post('old_image');
			$phone_no=$this->input->post('phone_no');
	        $email=$this->input->post('email');
	        $footer_copy_right=$this->input->post('footer_copy_right');
	        $address=$this->input->post('address');
	        $about_us=$this->input->post('about_us');
	        $contact_us=$this->input->post('contact_us');
	        $contact_map=$this->input->post('contact_map');
			if($_FILES['image']['name'] == "")
			{
				$this->db->where('status <>', 'Delete');
				$this->db->where('phone_no', $phone_no);
				$this->db->where('uniqcode <>', $uniqcode);
				$contact_row=$this->db->get('tbl_contact')->row();
				if(empty($contact_row))
				{
					$data=array(
					'phone_no'=> $phone_no,
					'email'=> $email,
					'footer_copy_right'=> $footer_copy_right,
					'address'=> $address,
					'about_us'=>$about_us,
					'contact_us'=>$contact_us,
					'contact_map'=>$contact_map,
					'update_datetime' => date('Y-m-d H:i:s')
					);
					$this->db->where('uniqcode', $uniqcode);
					$update=$this->db->update('tbl_contact', $data);
					$this->session->set_flashdata('success', 'Contact update successfully.');
					redirect('admin/footer_contact');
				}
				else
				{
					$this->session->set_flashdata('error', 'Contact phone no already exists!');
					redirect('admin/footer_contact');
				}
			}
			else
			{
				$contact_upload_image=''; 
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
						$config['new_image'] = 'webroot/admin/contact/'.$image_data['file_name'];
						$config['width'] = 500;
						$config['height'] = 400;
						$this->load->library('image_lib', $config);
						$this->image_lib->clear();
						$this->image_lib->initialize($config);
						$contact_upload_image=$image_data['raw_name'].'_thumb'.$image_data['file_ext'];
						if (!$this->image_lib->resize())
						{
							$this->handle_error($this->image_lib->display_errors());
						}
						$file = FCPATH.'/webroot/admin/all_images/'.$image_data['file_name'];
						if(file_exists($file))
						{
							unlink($file);
						}

						$file = FCPATH.'/webroot/admin/contact/'.$old_image;
						if(file_exists($file))
						{
							unlink($file);
						}
					}
				}
				$this->db->where('status <>', 'Delete');
				$this->db->where('phone_no', $phone_no);
				$this->db->where('uniqcode <>', $uniqcode);
				$event_row=$this->db->get('tbl_contact')->row();
				if(empty($event_row))
				{
					$data=array(
					'phone_no'=> $phone_no,
					'email'=> $email,
					'footer_copy_right'=> $footer_copy_right,
					'address'=> $address,
					'about_us'=>$about_us,
					'contact_us'=>$contact_us,
					'contact_map'=>$contact_map,
					'contact_images'=>$contact_upload_image,
					'update_datetime' => date('Y-m-d H:i:s')
					);
					$this->db->where('uniqcode', $uniqcode);
					$update=$this->db->update('tbl_contact', $data);
					$this->session->set_flashdata('success', 'Contact update successfully.');
					redirect('admin/footer_contact');
				}
				else
				{
					$this->session->set_flashdata('error', 'Contact phone no already exists!');
					redirect('admin/footer_contact');
				}	
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'Please fill in all the files!');
			redirect('admin/footer_contact');
		}
	}

	public function destroy($uniqcode)
	{
      	$data=array(
        'status'=>'Delete',
        'update_datetime'=>date('Y-m-d H:i:s'),
    	);
	  	$this->db->where('uniqcode', $uniqcode);
	  	$this->db->update('tbl_contact', $data);
	  	$delete_pic=$this->CommonModel->RetriveRecordByWhereRow('tbl_contact',['uniqcode'=>$uniqcode],'image');
	  	$old_image=$delete_pic->image;
	  	$file = FCPATH.'/webroot/admin/contact/'.$old_image;
		if(file_exists($file))
		{
			unlink($file);
		}
	 	$this->session->set_flashdata('success', 'Contact deleted successfully');                     
	 	redirect('admin/footer_contact');
	}

	
}