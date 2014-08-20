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
 		// $md = array('8888',$menuid);
 		// $this->mauth->get_auth($this->session->userdata('power'),$md);
 		$restaurant_list = $this->meal_book->get_restaurant();
 		$arrProject = $this->common->generatePjByid_value($restaurant_list,"project");
 		$data['project'] = $arrProject;
 		$data['border'] = 1;
 		//$data['menuid'] = $menuid;
 		$this->load->view('/meal/meal_book',$data);
 	}

 	function meal_book_ok()
 	{
 		// $md = array('8888',$menuid);
 		// $this->mauth->get_auth($this->session->userdata('power'),$md); 	
 		$restaurant_list = $this->meal_book->get_restaurant();
 		$arrProject = $this->common->generateSelPjByid_value($restaurant_list,"project",$this->input->post('project'));
 		$data['project'] = $arrProject;
 		$data['menudata'] = $this->meal_book->menulist();
 		$data['m_name'] = $this->input->cookie("meal_book_confirm_name");
 		//$data['menuid'] = $menuid;
 		$data['border'] = 1;
 		$this->load->view('/meal/meal_book',$data);
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
 		$response = $this->meal_book->meal_check_restaurant_ok($project);
 		$data['response'] = $response;
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
 		$starttime = strtotime(date("Y-m-d" , time()) . "11:00:00");
 		$endtime = strtotime(date("Y-m-d" , time()) . "11:40:00");
 		//$nowtime = strtotime(date("Y-m-d" , time()) . "11:30:00");
		$nowtime = strtotime(date("Y-m-d H:i:s", time()));
		$customer_name = $this->input->post('customer_name');
		if($nowtime > $starttime && $nowtime < $endtime)
		{
 		$data_list = $this->input->post('data_list');
 		$this->meal_book->insert_orderlist($data_list);
  		//$this->form_validation->set_rules('customer_name','您的大名', 'required');
 		$customer_name = $this->input->post('customer_name');
 		$this->input->set_cookie("meal_book_confirm_name",$customer_name,36000000000);
 		$arrProject = $this->common->generateSelPjByid(array('鲜粥道'),"project",$this->input->post('project'));
 		$data['project'] = $arrProject;
 		$this->load->view('/meal/meal_book',$data);
 		}
 		else
 		{
 			$data['customer_name'] = $customer_name;
 			$this->load->view('/meal/meal_error',$data);
 		}
 	}

  	function meal_statistics()
 	{
 		$this->meal_book->meal_statistics();
 	}	
}

?>