 <?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Admin_permission extends CI_Model

{

public function __construct()

{

parent::__construct();

}





public function getadminroles()

{

$this->db->select('*');
//$this->db->where('admin_role','Caller');
// $this->db->where('admin_status','Enable');
$query = $this->db->get('admin');  
  

         return $query;

}
  
  public function getuserlist()

{

$this->db->select('*');
//$this->db->where('admin_role','Caller');
// $this->db->where('admin_status','Enable');
$query = $this->db->get('admin');  
  $this->db->where('admin_role' !='Master');

         return $query;

}

public function getcategory()

{

$this->db->select('*');
//$this->db->where('admin_role','Caller');
// $this->db->where('admin_status','Enable');
$query = $this->db->get('sidebar_subtrees');  

         return $query;

}

public function depadmineditmodel($id)
{
   // $id = $this->input->get("admin_user_id");

     $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('id',$id);
        $query = $this->db->get();

        return $query->result_array();
}


    public function deletecalleradmin($id)
{
  $this->db->where('id',$id);
  $this->db->delete('admin');
}

public function callereditmodel($id)
{
   // $id = $this->input->get("admin_user_id");

     $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('id',$id);
        $query = $this->db->get();

        return $query->result_array();
}


public function getPermission($id) {
   $this->db->select('*');
   $this->db->from('role_permission');
   $this->db->where('role_id',$id);
   $query = $this->db->get();

   return $query->result_array();
}



}
