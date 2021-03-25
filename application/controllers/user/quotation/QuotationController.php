<?php
/**
 * 
 */
class QuotationController extends CI_Controller
{
	function __construct()
	{
	  	parent::__construct(); 		
	  	$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
	  	date_default_timezone_set('Asia/Kolkata');
		$this->load->helper(array('common_helper', 'string', 'form', 'security','url'));
		$this->load->library(array('form_validation', 'email'));
		$this->load->model('CommonModel');

				
	} 
	public function insert()
	{
		        $name=$this->input->post('name');
		        $email=$this->input->post('email');
		        $phone=$this->input->post('phone');
		        $budget=$this->input->post('budget');
		        $wbsite=$this->input->post('wbsite');
		       // $file=$this->input->post('file');
		        $subject=$this->input->post('subject');
		        $project=$this->input->post('project');
		        $config['upload_path']=FCPATH.'/webroot/user/career_file';
				$config['allowed_types']='pdf|doc|docx';
				$config['max_size']='2048';		
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('file'))
				{
				$this->session->set_flashdata('error',''.$this->upload->display_errors().'');
				redirect($_SERVER['HTTP_REFERER']);
				}
				else
				{
				$imageDetailArray = $this->upload->data();
				$image = $imageDetailArray['file_name'];
				}
				$data = array(
				'uniqcode' => random_string('alnum',30),
				'name' =>$name,
				'email' =>$email ,
				'phone_no' =>$phone ,
				 'budget' => $budget,
				 'wbsite' => $wbsite,
				'subject' => $subject,
				'project' => $project,	
				'datetime' => date('Y-m-d h:i:s')
				);
				
		        $this->db->insert('tbl_quotation',$data);
				$this->session->set_flashdata('success',"Sent Successfully! Thank you"." ".$name.", We will contact you shortly!");
				redirect($_SERVER['HTTP_REFERER']);
				 // $this->db->insert($tbl_quotation);
				 // {
				 // 	echo "asdfghjkl";
				 // }
	}
}
?>