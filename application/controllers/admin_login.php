<?php
	class admin_login extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			  $this->load->helper(array('form', 'url'));
			  $this->load->model('user_model');
			  $this->load->helper('form');
			  $this->load->library('form_validation');
			  $this->load->helper('file');
		}
		
		function index()
		{
			$this->load->view('./login');	
		}
		
		function downFile(){
			
 	    $this->load->helper('download');
 	    	$filename = "";
		foreach ($_POST as $key => $value) {
			$filename = $value;
		}
 		/*$filename = $_GET["q"]; 
 		$arr = explode(".",$filename);
 		$end = $arr[1];
 		header('Content-Encoding: utf-8');
        header("Content-type: application/x-png");
        header("Accept-Ranges: bytes");
        header('Content-Transfer-Encoding: binary' );
        header("Content-Disposition: attachment; filename=" .$filename);*/
		$data = file_get_contents("./uploads/$filename"); // 读文件内容
		force_download($filename, $data);
	

 		//$filename =$this->input->post("file_name");
 		/*$file = @ fopen("./uploads/$filename","r"); 
 		Header("Content-type: application/octet-stream;charset=utf-8"); 
		Header("Content-Disposition: attachment; filename=" . $filename); 
		while (!feof ($file )) { 
		echo fread($file ,50000);
		}
		fclose($file );		

		}
*/
	}
		function logining()
		{
			$this->load->model('news_model');
			$this->load->model('files_model');
			$data['name']=$_POST['username'];
			$data['password']=$_POST['password'];
			//print_r(md5($data['password']));
			$data['news'] = $this->news_model->get_news();
			$data['file_name']=$this->files_model->get_filename();
			$query=$this->db->query("select hr_admin_password from hr_admin_user limit 1;");
			
			if($query->num_rows()>0)
			{
				$row=$query->row();
				
				
				if(md5($data['password']) == $row->hr_admin_password)
				{
					
					$this->load->view('home',$data);

				}
				else
				{
					print_r('用户名或密码错误');
					$this->load->view('login');
		
				}
			}
			else
			{
				 	print_r('用户名或密码错误');
					$this->load->view('login');
				}
		}
	}
?>