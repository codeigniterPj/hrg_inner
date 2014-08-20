<?php
class User_model extends CI_Model {
 public function __construct()
  {
    $this->load->database();
  }
  public function get_user()
  {
    $query = $this->db->get('hr_admin_user');
    return $query->result_array();
  }
  
  public function set_user()
{
  $this->load->helper('url');
  
  $newdata = array(
    'hr_admin_name' => $this->input->post('username'),
    'hr_admin_password' => $this->input->post('password')
  );
  
  return $this->db->insert('user', $newdata);
}
  }
?>