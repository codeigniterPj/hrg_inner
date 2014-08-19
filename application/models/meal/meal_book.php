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
 			print_r($meallist);
 			if(empty($meallist))
 				return;
	  		$meallist = json_decode($meallist,true);
	 		//print_r($meallist);
	 		foreach ($meallist as $order => $info) {
	 			$name = $info['customer_name'];
	 			$r_id = $info['restaurant_id'];
	 			$orderlist = $info['orders_info'];
	 			$count = $info['total'];
	 		}			
	 		$time = date('y-m-d h:i:s',time());
	 		$sql = "SELECT * FROM order_list_person WHERE name = '$name' AND r_id = '$r_id'";
	 		$query = $this->db->query($sql);
	 		if($query->result())
	 		{
	 	        $nameid = $query->result()[0]->name_id;
	 	        $r_id = $query->result()[0]->r_id;
	 			$sql = "UPDATE order_list_person SET price_all = '$count',order_date = '$time' WHERE name = '$name'";
	 			$query = $this->db->query($sql);
	 			$sql = "DELETE FROM order_list WHERE name_id = '$nameid'";
	 			$query = $this->db->query($sql);
	 			//print_r($)($orderlist);
	 			foreach ($orderlist as $row) {
	 					$item_no = $row['item_no'];
	 					$item_name = $row['item_name'];
	 					$item_amount = $row['item_amount'];
	 					$item_price = $row['item_price'];
	 				 	$sql = "INSERT INTO order_list VALUES('$nameid','$item_name','$item_amount','$item_no','$r_id')";
	 					$query = $this->db->query($sql);		
	 				}


	 		}
	 		else
	 		{
	 			$sql = "INSERT INTO order_list_person VALUES('','$name','$count','$time','$r_id')";
	 			$query = $this->db->query($sql);
	 			$sql = "SELECT * FROM order_list_person WHERE name = '$name'";
	 			$query = $this->db->query($sql);
	 			$nameid = $query->result()[0]->name_id;
	 			$r_id = $query->result()[0]->r_id;
	 			foreach ($orderlist as $row) {
	 					$item_no = $row['item_no'];
	 					$item_name = $row['item_name'];
	 					$item_amount = $row['item_amount'];
	 					$item_price = $row['item_price'];
	 				 	$sql = "INSERT INTO order_list VALUES('$nameid','$item_name','$item_amount','$item_no','$r_id')";
	 					$query = $this->db->query($sql);		
	 				}
	 		}

 		}

 		function meal_check_restaurant_ok($restaurant_id)
 		{
 			$sql = "SELECT SUM(number) , menu_name FROM order_list WHERE r_id = '$restaurant_id' GROUP BY menu_name";
 			$query = $this->db->query($sql);
 			print_r($query->result());

 		}


 		function meal_check_person_ok($person_name)
 		{
 			$orderlist = array();
 			$sql = "SELECT olp.`name`,olp.name_id,olp.order_date,olp.price_all,rt.restaurant_name,olp.r_id
					FROM
					order_list_person AS olp,
					restaurant AS rt
					WHERE
					NAME = '$person_name'
					AND olp.r_id = rt.restaurant_id";
 			//print_r($sql);
 			$query = $this->db->query($sql);
 			foreach ($query->result() as $row) {
 				$menu = array();
 				$order = array();
 				$r_id = $row->r_id;
 				$name_id = $row->name_id;
 				array_push($order, $row->order_date);
 				array_push($order, $row->price_all);
 				array_push($order, $row->restaurant_name);
 				$sql = "SELECT * FROM order_list WHERE r_id = '$r_id' AND name_id = '$name_id'";
 				$query = $this->db->query($sql);
 				foreach ($query->result() as $row_menu) {
					$menu_name =  $row_menu->menu_name;
					$number = $row_menu->number;
					array_push($menu, $menu_name);					
					array_push($menu, $number);
					//array_push($order, $menu);
					//array_push($orderlist, $order);
					//print_r($orderlist);
					//unset($menu);
 				}
 				array_push($order, $menu);
 				array_push($orderlist, $order);
 				unset($menu);
 				unset($order);
 			}

 			print_r($orderlist);
 		}

	}

?>