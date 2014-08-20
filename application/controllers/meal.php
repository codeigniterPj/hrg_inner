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
 		$arrProject = $this->common->generatePj(array('鲜粥道'),"project");
 		$data['project'] = $arrProject;
 		$data['border'] = 1;
 		//$data['menuid'] = $menuid;
 		$this->load->view('/meal/meal_book',$data);
 	}

 	function meal_book_ok()
 	{
 		// $md = array('8888',$menuid);
 		// $this->mauth->get_auth($this->session->userdata('power'),$md); 	
 		$this->load->model('/meal/meal_book');
 		$arrProject = $this->common->generateSelPjByid(array('鲜粥道'),"project",$this->input->post('project'));
 		$data['project'] = $arrProject;
 		$data['menudata'] = $this->meal_book->menulist();
 		//$data['menuid'] = $menuid;
 		$data['border'] = 1;
 		$this->load->view('/meal/meal_book',$data);
 	}

 	function meal_check_person()
 	{

 		$this->load->view('/meal/check_person');
 	}

	function meal_check_restaurant()
 	{
 		$arrProject = $this->common->generatePj(array('鲜粥道'),"project");
 		$data['project'] = $arrProject;
 		$data['border'] = 1;
 		$this->load->view('/meal/check_restaurant',$data);
 	}


 	function meal_check_person_ok()
 	{
 		$this->load->model('/meal/meal_book');
 		$customer_name = $this->input->post('customer_name');
 		$this->meal_book->meal_check_person_ok('123');
 		$this->load->view('/meal/check_person');
 		//$this->load->view('/meal/meal_check',$data);
 	}

 	function meal_check_restaurant_ok()
 	{
 		$project = $this->input->post('project');
 		$this->load->model('/meal/meal_book');
 		$arrProject = $this->common->generateSelPjByid(array('鲜粥道'),"project",$this->input->post('project'));
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
 		$data_list = $this->input->post('data_list');
 		$this->load->model('/meal/meal_book');
 		$this->meal_book->insert_orderlist($data_list);
 		print_r("下单成功");
 	}

  	function meal_statistics()
 	{
 		$this->load->model('/meal/meal_book');
 		$this->meal_book->meal_statistics();

 	}	


}

?>