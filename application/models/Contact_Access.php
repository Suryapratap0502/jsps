<?php
if (!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Contact_Access extends CI_Model

{

    public function __construct()

    {

        parent::__construct();
    }

    public function getuserlist()

    {

        $this->db->select('*');
        $this->db->where('flag','0');
        $query = $this->db->get('admin');
        $this->db->where('admin_role' != 'Master');

        return $query;
    }
    public function list_common($table){
		$this->db->select('*');
 		$this->db->from($table);
 		$this->db->where('flag','0');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
    public function delete($table,$id,$data)
  {
    $this->db->where('id',$id);
	$this->db->update($table,$data);
	return true;
  
  }
  public function list_common_where3($table,$where,$id){
    $this->db->select('*');
    $this->db->where($where,$id);
    $this->db->where('flag','0');
    $this->db->order_by('id','desc');	
     $this->db->from($table);		
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
}
  public function list_data($string,$where,$id){
  $this->db->select($string);
  $this->db->where($where,$id);
  $this->db->where('flag','0');
  $this->db->order_by('id','desc');	
   $this->db->from('contact_access');		
  $query = $this->db->get();
  $result = $query->result_array();
  return $result;
}
  public function list_common_list()
  {
    $this->db->select('admin.*,contact_access.*,admin.name as user_name');
    $this->db->from('contact_access');
    $this->db->join('admin', 'admin.id = contact_access.user_id', 'inner');
    $this->db->where('admin.flag', '0');
    $this->db->where('contact_access.flag', '0');
    $this->db->order_by('contact_access.id','desc');
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }
}
