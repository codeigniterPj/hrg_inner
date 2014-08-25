<?php
	/**
	* 
	*/
	class upload extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->model("files_model");
		}
		 function index()
		 { 
		    $data['title'] = "File Uploader";
		    $this->load->view('upload_form',$data);
		 }
		 function uploading(){
		 	$config['upload_path'] = './uploads/';
		 	$config['allowed_type'] = 'png|jpg|gif|pdf|ppt|pptx|word|wordx|xls|xlsx|txt';
		 	$config['max_size'] = '100000';
		 	$config['max_height'] = '1080';
		 	$config['max_width'] = '1920';

		 	$this->load->library('upload',$config);

		 	if(!$this->upload->do_upload())
		 	{
		 		$data['error'] = $this->upload->display_errors();
   				$this->load->view('upload_form', $data['error']);
		 	}
		 	else
		 	{
		 		$data['upload_data'] = $this->upload->data();
		 		$filename['file_name'] = $data['upload_data']['file_name'];
   				$this->files_model->insert_filename($filename['file_name']);
   				$this->load->view('upload_success', $data);
		 	}
		 }

	}
?>