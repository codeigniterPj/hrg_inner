<?php
	class meal_book extends CI_Model
	{
		function __construct()
 		{
 			parent::__construct();
 			$this->load->helper('url');
 			$this->load->dbutil();
 		} 

 		function menulist()
 		{
 			$menu_list = array();
 			$menu_all = array();
 			$restaurantid = $this->input->post('project');
 			$sql = "SELECT * FROM restaurant_type WHERE restaurant_id = $restaurantid";
 			$query = $this->db->query($sql);
 			foreach ($query->result() as $row) {
 				$menu_content = array();
 				$sql = "SELECT * FROM restaurant_menu WHERE type_id = $row->type_id";
 				$query = $this->db->query($sql);
 				foreach ($query->result() as $row2) {
 					$menu_content[$row2->id] = $row2->meal_name . "," . $row2->meal_price;
 				} 
 				$menu_list[$row->type_name] = $menu_content;

 				unset($menu_content);
 				array_push($menu_all,$menu_list);
 				unset($menu_list);
 			}
 			//print_r($menu_all);
 			return $menu_all;

 		}

 		function insert_orderlist($meallist)
 		{
	  		$meallist = json_decode($meallist,true);
	 		//print_r($meallist);
	 		foreach ($meallist as $order => $info) {
	 			$name = $info['customer_name'];
	 			$orderlist = $info['orders_info'];
	 			$count = $info['total'];
	 		}			
	 		$time = date('y-m-d h:i:s',time());
	 		$sql = "SELECT * FROM order_list_person WHERE name = '$name'";
	 		$query = $this->db->query($sql);
	 		if($query->result())
	 		{
	 	        $nameid = $query->result()[0]->name_id;
	 			$sql = "UPDATE order_list_person SET price_all = '$count',order_date = '$time' WHERE name = '$name'";
	 			$query = $this->db->query($sql);
	 			$sql = "DELETE FROM order_list WHERE name_id = '$nameid'";
	 			$query = $this->db->query($sql);
	 			//print_r($)($orderlist);
	 			foreach ($orderlist as $row) {
	 					$menu_name = $row['item_name'];
	 					$number = $row['item_amount'];
	 					$count = $row['item_price'];
	 				 	$sql = "INSERT INTO order_list VALUES('$nameid','$menu_name','$number')";
	 					$query = $this->db->query($sql);		
	 				}


	 		}
	 		else
	 		{
	 			$sql = "INSERT INTO order_list_person VALUES('','$name','$count','$time')";
	 			$query = $this->db->query($sql);
	 			$sql = "SELECT * FROM order_list_person WHERE name = '$name'";
	 			$query = $this->db->query($sql);
	 			$nameid = $query->result()[0]->name_id;
	 			foreach ($orderlist as $row) {
	 					$menu_name = $row['item_name'];
	 					$number = $row['item_amount'];
	 					$count = $row['item_price'];
	 				 	$sql = "INSERT INTO order_list VALUES('$nameid','$menu_name','$number')";
	 					$query = $this->db->query($sql);		
	 				}
	 		}

 		}

 		function meal_statistics()
 		{
 			$sql = "SELECT SUM(number) , menu_name FROM order_list GROUP BY menu_name"; 
 		}

	}

?>