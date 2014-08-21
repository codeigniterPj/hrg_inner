<?php
	class meal_book extends CI_Model
	{
		private $tmpl;
		function __construct()
 		{
 			parent::__construct();
 			$this->load->helper('url');
 			$this->load->dbutil();
 			$this->load->library('table');
 			$this->tmpl = array(
            'table_open' => '<table align="center" width="50%" class="hovertable" >',
            
            'heading_row_start' => '<tr>',
            'heading_row_end' => '</tr>',
            'heading_cell_start' => '<th>',
            'heading_cell_end' => '</th>',
            
            'row_start' => '<tr id="ddd">',
            'row_end' => '</tr>',
            'cell_start' => '<td>',
            'cell_end' => '</td>',
            
            'row_alt_start' => '<tr>',
            'row_alt_end' => '</tr>',
            'cell_alt_start' => '<td>',
            'cell_alt_end' => '</td>',
            
            'table_close' => '</table>'
        );
        
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
 			//print_r($meallist);
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
	 		$time = date('y-m-d H:i:s',time());
	 		$sql = "SELECT * FROM order_list_person WHERE name = '$name' AND r_id = '$r_id'";
	 		$query = $this->db->query($sql);
	 		if($query->result())
	 		{
	 	        $nameid = $query->result()[0]->name_id;
	 	        //$r_id = $query->result()[0]->r_id;
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
	 					$sql = "SELECT * FROM restaurant_menu WHERE id = '$item_no'";
	 					$query = $this->db->query($sql);
	 					$type_id = $query->result()[0]->type_id;
	 					$sql = "SELECT * FROM restaurant_type WHERE type_id = '$type_id'";
	 					$query = $this->db->query($sql);
	 					$r_id = $query->result()[0]->restaurant_id;
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
	 					$sql = "SELECT * FROM restaurant_menu WHERE id = '$item_no'";
	 					$query = $this->db->query($sql);
	 					$type_id = $query->result()[0]->type_id;
	 					$sql = "SELECT * FROM restaurant_type WHERE type_id = '$type_id'";
	 					$query = $this->db->query($sql);
	 					$r_id = $query->result()[0]->restaurant_id;
	 				 	$sql = "INSERT INTO order_list VALUES('$nameid','$item_name','$item_amount','$item_no','$r_id')";
	 					$query = $this->db->query($sql);		
	 				}
	 		}

 		}

 		function meal_check_restaurant_ok($restaurant_id)
 		{
 			$restaurantid = $this->input->post('project');
 			$sql = "SELECT menu_name AS 菜名, SUM(number) AS 数量 FROM order_list WHERE r_id = '$restaurant_id' GROUP BY menu_name";
 			$query = $this->db->query($sql);
            $this->table->set_template($this->tmpl);
            $response = $this->table->generate($query);
            return $response;
 		}


 		function meal_check_person_ok($person_name)
 		{
 			$orderlist = array();
 			$sql = "SELECT
 					rt.restaurant_name AS 餐馆名,
					olp.`name` AS 名字,
					ol.menu_name AS 菜名,
					ol.number AS 数量,
					olp.order_date AS 最终下单时间

					FROM
						order_list_person AS olp,
						restaurant AS rt,
						order_list AS ol
					WHERE
						NAME = '$person_name'
					AND olp.r_id = rt.restaurant_id AND olp.name_id = ol.name_id AND olp.r_id = ol.r_id";
			//print_r($sql);
 			$query = $this->db->query($sql);
            $this->table->set_template($this->tmpl);
            $response = $this->table->generate($query);
            return $response;
 		}

 		function get_restaurant()
 		{
 			$array = array();
 			$sql = "SELECT * FROM restaurant";
 			$query = $this->db->query($sql);
 			foreach ($query->result() as $row) {
 				array_push($array, array($row->restaurant_id,$row->restaurant_name));
 			}
 			return $array;
 		}

	}

?>