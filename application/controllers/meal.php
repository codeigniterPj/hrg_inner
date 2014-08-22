<?php
	class meal extends CI_Controller {
	function __construct()
 	{
 		parent::__construct();
 		$this->load->helper('url');
 		//$this->load->model('Message');
 		$this->load->library('form_validation');
 		$this->load->helper('form');
 		//$this->load->model('mauth');
 		//$this->load->dbutil();
 		$this->load->helper('cookie');
 		$this->load->helper('file');
 		$this->load->library('pagination'); 
 		$this->load->library('table');
 		$this->load->model('common');
 		$this->load->model('/meal/meal_book');
 	}

 	function meal_book()
 	{
 		if($this->timeControl())
 		{
 			$restaurant_list = $this->meal_book->get_restaurant();
 			$arrProject = $this->common->generatePjByid_value($restaurant_list,"project");
 			$data['m_name'] = $this->input->cookie("meal_book_confirm_name");
 			$data['project'] = $arrProject;
 			$data['border'] = 1;
 			$this->load->view('/meal/meal_book',$data);
 		}
 		else
 		{
 			$this->load->view('/meal/meal_rank');
 		}
 	}

 	function meal_book_ok()
 	{
 		if($this->timeControl())
 		{
	 		$restaurant_list = $this->meal_book->get_restaurant();
	 		$arrProject = $this->common->generateSelPjByid_value($restaurant_list,"project",$this->input->post('project'));
	 		$data['project'] = $arrProject;
	 		$data['menudata'] = $this->meal_book->menulist();
	 		$data['m_name'] = $this->input->cookie("meal_book_confirm_name");
	 		$data['border'] = 1;
	 		$this->load->view('/meal/meal_book',$data);
	 	}
	 	else
	 	{
	 		$this->load->view('/meal/meal_rank');
	 	}
 	}

 	function meal_check_person()
 	{
 		$data['c_name'] = $this->input->cookie("person_name");
 		$this->load->view('/meal/check_person',$data);

 	}

	function meal_check_restaurant()
 	{
 		$restaurant_list = $this->meal_book->get_restaurant();
 		$arrProject = $this->common->generatePjByid_value($restaurant_list,"project");
 		$data['project'] = $arrProject;
 		$data['border'] = 1;
 		$this->load->view('/meal/check_restaurant',$data);
 	}


 	function meal_check_person_ok()
 	{
 		$this->load->model('/meal/meal_book');
 		$customer_name = $this->input->post('c_name');
 		$this->input->set_cookie("person_name",$customer_name,36000000000);
 		$data['c_name'] = $customer_name;
 		$data['response'] = $this->meal_book->meal_check_person_ok($customer_name);
 		$this->load->view('/meal/check_person',$data);
 		//$this->load->view('/meal/meal_check',$data);
 	}

 	function meal_check_restaurant_ok()
 	{
 		$project = $this->input->post('project');
 		$restaurant_list = $this->meal_book->get_restaurant();
 		$arrProject = $this->common->generateSelPjByid_value($restaurant_list,"project",$project);
 		$data['project'] = $arrProject;
 		$response_restaurant = $this->meal_book->meal_check_restaurant_ok($project);
 		$response_person = $this->meal_book->meal_check_per_restaurant_ok($project);
 		$data['response_restaurant'] = $response_restaurant;
 		$data['response_person'] = $response_person;
 		$this->load->view('/meal/check_restaurant',$data);
 		//$this->load->view('/meal/meal_check',$data);
 	}

 	function meal_rank()
 	{
 		$data='';
 		$this->load->view('/meal/meal_rank',$data);
 	}

 	function meal_book_confirm()
 	{	


		$customer_name = $this->input->post('customer_name');
		$this->input->set_cookie("meal_book_confirm_name",$customer_name,36000000000);
		$project = $this->input->post('project');
		$restaurant_list = $this->meal_book->get_restaurant();
 		$arrProject = $this->common->generateSelPjByid_value($restaurant_list,"project",$project);
 		$data['project'] = $arrProject;
		if($this->timeControl())
		{
 			$data_list = $this->input->post('data_list');
 			$this->meal_book->insert_orderlist($data_list);
 			$customer_name = $this->input->post('customer_name');
 			$this->load->view('/meal/meal_book',$data);
 		}
 		else
 		{
 			$data['customer_name'] = $customer_name;
 			$this->load->view('/meal/meal_error',$data);
 		}
 	}

	function meal_book_cancel()
	{
		$c_name = $this->input->post("customer_name");
		$this->meal_book->delete_orders($c_name);
		print_r($c_name);
	}
  	function meal_statistics()
 	{
 		$this->meal_book->meal_statistics();
 	}	

 	function timeControl()
 	{
 		$time_str = $this->readfromfile("time.config");
 		$time_arr = explode(",", $time_str);
 		$start_str = $time_arr[0];
 		$end_str = $time_arr[1];
 		$starttime = strtotime(date("Y-m-d" , time()) . $start_str);
 		$endtime = strtotime(date("Y-m-d" , time()) . $end_str);
		$nowtime = strtotime(date("Y-m-d H:i:s", time()));
		if($nowtime > $starttime && $nowtime < $endtime)
			return true;
		else
			return false;
 	}

 	function readfromfile($file)
 	{
 	    $filename = "./hrg_config/$file";
    	$handle = fopen($filename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'
    	//通过filesize获得文件大小，将整个文件一下子读到一个字符串中
    	$contents = fread($handle, filesize ($filename));
    	fclose($handle);
    	return $contents;
 	}
}

?>