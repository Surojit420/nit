<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller 
{
	 
	function __construct()
	{
	  	parent::__construct(); 		
		$this->load->helper(array('common_helper', 'string', 'form', 'security'));
		$this->load->library(array('form_validation', 'email'));
		$this->load->model('CommonModel');	
	}	

	public function index()
	{		
			
		if(($this->session->userdata('adminDetails')!==NULL))
		{
		   redirect('admin/dashboard');
		}
		else 
		{
			$this->load->view('admin/login');
		}
	}

	public function forgotpass()
	{
		$this->load->view('admin/forgot_password');
	}
	
	public function verify()
	{
		$user_id =$this->security->xss_clean($this->input->post('user_id'));
		$password =md5($this->security->xss_clean($this->input->post('password')));	
		$view_password=$this->input->post('password');
		if($user_id!='' && $password!='')
		{
			$check=array(
				'email'=>$user_id,
				'password'=>$password
			);
			//pr($data);
			 //die;
            $count=$this->CommonModel->CountWhere('tbl_admin',$check);

			if(!empty($count))
			{
				$data1=array(
					'email'=>$user_id,
					'password'=>$password,
				);
				// pr($data1);
				// exit;
				$result =$this->CommonModel->RetriveRecordByWhereRow('tbl_admin', $data1,'*');			
				 // pr($result);
				 // die;
				if($result->is_delete=='N' && $result->is_active=='Active')
				{
					$this->session->set_userdata('adminDetails',$result);					
					$this->session->set_flashdata('success', 'You have logged in successfully.');	
					redirect('admin/dashboard');
				}
				else
				{
					$this->session->set_flashdata('error', 'Your account is verify.');	
					redirect('/');
				}
			}
			else
			{
				$data2=array(
				'mobile_no'=>$user_id,
				'password'=>$password
				);
            	$count=$this->CommonModel->CountWhere('tbl_admin',$data2);
            	if(!empty($count))
            	{
            		$data1=array(
					'mobile_no'=>$user_id,
					'password'=>$password,
					);
					$result =$this->CommonModel->RetriveRecordByWhereRow('tbl_admin',$data1,'*');			

					if($result->is_delete=='N' && $result->is_active=='Active')
					{
						$this->session->set_userdata('adminDetails',$result);					
						$this->session->set_flashdata('success', 'You have logged in successfully.');	
						//redirect('admin/dashboard');
					}
					else
					{
						$this->session->set_flashdata('error', 'Your account is verify.');	
						//redirect('/');
					}
            	}
            	else
            	{
            		$this->session->set_flashdata('error', 'Please enter your registered E-mail or Phone no and valid password.');	
					//redirect('/');
            	}
			}
		}	
	}

	public function forgotpassword()
	{
		if($this->input->post('email')!=''){

			$email=$this->input->post('email');
			$this->db->where('email', $email);
			$row=$this->db->get('tbl_admin')->row();
			if(!empty($row)){

				$password=randomPassword();

				$data=array(
					'password'=>md5($password)
				);
				$this->db->where('id', $row->id);
				$update=$this->db->update('tbl_admin', $data);
				$config = Array(
		          'protocol' => 'smtp',
		          'mailtype' => 'html', 
		          'charset' => 'utf-8',
		          'wordwrap' => TRUE

		      );
				$this->load->library('email', $config);				
				$from='bongtech.solution@gmail.com';		
				$from_name='Bongtech';
				$to_email=$email;
				$subject='Bongtech : Reset password';
				$message='<p>Dear '.$row->first_name.' '.$row->last_name.'</p><p> You have successfully changed your password. <br> Your new password is: '.$password.' </p><p>Warm Regards <br>Team Bongtech</p> <p><span style="color:red">This is an automated response. Please do not directly reply to this email.</span></p>';
				
				email_send();
				$this->email->from($from, $from_name);
				$this->email->to($to_email);
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->send();
								
				$this->session->set_flashdata('success', 'We have sent you a new password to your registered email.');
					redirect('/');

			}else{
				$this->session->set_flashdata('error', 'Email is not registered with us');
					redirect('admin/forgotpassword');
			}
		}
	}

	public function logout()
	{ 				
		$this->session->unset_userdata('adminDetails');				
	    redirect('/', 'refresh');
	}	

	public function resetpassword()
	{
		
		$id=$this->session->userdata('adminDetails')->id;
		if(!empty($_POST))
		{
			$old_pass=MD5($this->input->post('current_password'));

			$data=array(
				'id'=>$id,
				'password'=>$old_pass,
				'is_delete'=>'N',
				'is_active'=>'Active'
			);
			//  pr($data);
			// //print_r($old_pass);
			// die();
			// exit();
			$old_data=$this->CommonModel->Check_Old_Password('tbl_admin',$data);

			if(!empty($old_data))
			{
				$check_pass=MD5($this->input->post('password'));

				if($check_pass!=$old_data->password)
				{

					if($this->input->post('password')!='')
					{
						$data1=array('password'=>$check_pass);
						$this->db->where('id', $id);				
						$update=$this->db->update('tbl_admin', $data1);
						if($update)
						{
							$data2=array('id'=>$id);
							$result =$this->CommonModel->RetriveRecordByWhereRow('tbl_admin',$data1,'*');
							$this->session->unset_userdata('adminDetails');
							$this->session->set_userdata('adminDetails',$result);	
							$this->session->set_flashdata('success', 'Your password has been changed successfully!');
							//redirect('admin/changepassword');
						}

					}
				}
				else
				{
					$this->session->set_flashdata('error', 'Can not use old password!');
				}
			}
			else
			{

				$this->session->set_flashdata('error', 'Your current password are not correct!');
			}
		}

		$this->data['page_title']=' Change Password';
		$this->data['subview']='change_pass/index';
		$this->data['logo_icons']=$this->CommonModel->RetriveRecordByWhereRow('tbl_logo',['status'=>'Active'],'image');
		$this->data['foot_con'] = $this->CommonModel->RetriveRecordByWhereRow('tbl_contact',['status'=>'Active'],'footer_copy_right');
		$this->load->view('admin/layout/default', $this->data);
	}

	public function foorgot_pass_email()
	{
		$email=$this->input->post('email');

		$this->db->where('email', $email);
		$row=$this->db->get('tbl_admin')->row();

		if(!empty($row)){
		 
		 $email=false;
        }else{
           $email=true; 
        }
        echo $email;
	}
	
}
