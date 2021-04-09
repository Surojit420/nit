<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PortfolioController extends CI_Controller 
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
		
		$this->data['banner_data']= $this->CommonModel->RetriveRecordByWhereOrderby('tbl_pages',['status<>'=>'Delete','type'=>'portfolio','name'=>'portfolio'],'id','desc');

		$this->data['page_title']='NNIT | Portfolio';
		$this->data['subview']='pages/portfolio';
		$this->data['logo_icons']=$this->CommonModel->RetriveRecordByWhereRow('tbl_logo',['status'=>'Active'],'image');
		$this->data['foot_con'] = $this->CommonModel->RetriveRecordByWhereRow('tbl_contact',['status'=>'Active'],'footer_copy_right');
		$this->load->view('admin/layout/default', $this->data);
	}

	public function add()
	{
			
		       
		        $description=$this->input->post('description');
		        $head=$this->input->post('head');
		        $start_body=$this->input->post('start_body');
		        $close_body=$this->input->post('close_body');	
        		$data=array(
				'uniqcode' => random_string('alnum',30),
				'head' => $head,
				'close_body' => $close_body,
				'start_body' => $start_body,
				'description' => $description,
				'status' => 'Active',
				'type' =>'portfolio',
				'name'=>'portfolio',
				'current_date' => date('Y-m-d H:i:s')
				);
		        	
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
								$config['new_image'] = 'webroot/admin/bannerportfolio/'.$image_data['file_name'];
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
							

						}
						$data['image']=$banner_upload_image;
						$this->db->insert('tbl_pages', $data);
						$this->session->set_flashdata('success', 'Portfolio added successfully.');	
						redirect('admin/page-portfolio');
					}
					
           
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
                            <h4 class="card-title">portfolio</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form  action="'.base_url('admin/pages/portfolio/update').'" id="portfolio" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="uniqcode" value="'.$banner_row->uniqcode.'">
								<input type="hidden" name="old_image" value="'.$banner_row->image.'">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div class="form-group">
                                            <img src="'.base_url('webroot/admin/bannerportfolio/'.$banner_row->image.'').'" id="upload_portfolio" onclick="get_upload_portfolio()" class="add_img_button">
                                                <input type="file" class="image-upload select_image" name="image" class="validate[required]" id="portfolio_input_upload" style="display: none" accept=".jpg,.jpeg,.png" onchange="portfolio_show_photo(this)">     
                                        </div> 
                                    </div> 
        
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>Description</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="description" id="description" class="form-control "  data-prompt-position="bottomLeft"placeholder="Enter description" >'.$banner_row->description.'</textarea> 
                                       </div> 
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                           <label>head</label>
                                           <textarea rows="2" cols="30" style="resize: none;"  name="head" id="description" class="form-control "  data-prompt-position="bottomLeft"placeholder="Enter head" >'.$banner_row->head.'</textarea> 
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
                                           <textarea rows="2" cols="30" style="resize: none;"  name="close_body" id="description" class="form-control" data-prompt-position="bottomLeft"placeholder="Enter close_body" >'.$banner_row->close_body.'</textarea> 
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
		// $this->form_validation->set_rules('description', 'Description', 'required');
		// if($this->form_validation->run())
		// {
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
					$this->session->set_flashdata('success', 'portfolio update successfully.');
					redirect('admin/page-portfolio');
				
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
						$config['new_image'] = 'webroot/admin/bannerportfolio/'.$image_data['file_name'];
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

						$file = FCPATH.'/webroot/admin/bannerportfolio/'.$old_image;
						if(file_exists($file))
						{
							unlink($file);
						}
					}
				}
					$data=array(
					'description'=> $description,
					'image'=>$banner_upload_image,
					'head'=>$head,
					'start_body' => $start_body,
					'close_body' => $close_body,
					'update_datetime' => date('Y-m-d H:i:s')
					);
					$this->db->where('uniqcode', $uniqcode);
					$update=$this->db->update('tbl_pages', $data);
					$this->session->set_flashdata('success', 'Pages update successfully.');
					redirect('admin/page-portfolio');
			}
		// }
		// else
		// {
		// 	$this->session->set_flashdata('error', 'Please fill in all the files!');
		// 	redirect('admin/page-portfolio');
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
	  	$delete_pic=$this->CommonModel->RetriveRecordByWhereRow('tbl_pages',['uniqcode'=>$uniqcode],'image');
	  	$old_image=$delete_pic->image;
	  	$file = FCPATH.'/webroot/admin/bannerportfolio/'.$old_image;
		if(file_exists($file))
		{
			unlink($file);
		}
	 	$this->session->set_flashdata('success', 'Portfolio deleted successfully');                     
	 	redirect('admin/page-portfolio');
	}

	
}