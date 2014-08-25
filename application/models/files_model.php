<?php
class files_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_filename()
	{
		$query=$this->db->get('files');
		return $query->result_array();
	}
	public function insert_filename($a)
	{
		$this->load->helper('url');
		$file=array(
		'file_name' => $a
		);
		return $this->db->insert('files',$file);
	}
}
?>