<?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Company_model extends CI_Model

{

public function __construct()

{

parent::__construct();

}

public function takeUser($admin_email, $admin_password, $admin_role)

{

$this->db->select('*');

$this->db->from('master_admin');

$this->db->where('admin_email', $admin_email);

$this->db->where('admin_password', $admin_password);

$this->db->where('admin_status', 'Enable');
$this->db->where('admin_role', $admin_role);
$query = $this->db->get();
return $query->num_rows();

}
  
  public function list_common($table){
		$this->db->select('*');
 		$this->db->from($table);
 		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
  
  	 public function list_common_desposition($table){
		$this->db->select('*');
 		$this->db->from($table);
 		$this->db->where('flag','0');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
  
  	public function list_common_where3($table,$where,$id){
		$this->db->select('*');
		$this->db->where($where,$id);
		$this->db->order_by('id','desc');	
 		$this->db->from($table);		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}  


public function userData($admin_email)
{
$this->db->select('admin');
$this->db->where('email', $admin_email);
$query = $this->db->get('admin');

return $query->row();

}

public function masterData()
{

$this->db->select('*');
$this->db->from('company');
$this->db->where('flag !=', '2');
// $this->db->where('admin_status','Enable');
$query = $this->db->get();  

  return $query;

}
public function deletesubadmin($table,$id,$data)
{
  $this->db->where('id',$id);
	$this->db->update($table,$data);
	return true;
}

public function subadmineditmodel($table,$id)
{
   // $id = $this->input->get("admin_user_id");

     		$this->db->select('*');
        $this->db->from($table);
        $this->db->where('id',$id);
        $query = $this->db->get();

        return $query->result_array();
}



//filer by name


 public function getname($postData=null){

			$response = array();
			$draw = $postData['draw'];
			$start = $postData['start'];
			$rowperpage = $postData['length']; // Rows display per page
			$columnIndex = $postData['order'][0]['column']; // Column index
			$columnName = $postData['columns'][$columnIndex]['data']; // Column name
			$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
			$searchValue = $postData['search']['value']; // Search value

     	$name_search = $postData['name_search'];

      $search_arr = array();
     	$searchQuery = "";
     
     if($searchName!= ''){
        $search_arr[] = " name like '%".$name_search."%' ";
     }
     if(count($search_arr) > 0){
        $searchQuery = implode(" and ",$search_arr);
     }

     ## Total number of records without filtering
     $this->db->select('count(*) as allcount');
      $this->db->where('admin_role','Regional');
      $records = $this->db->get('master_admin')->result();
     $totalRecords = $records[0]->allcount;

     ## Total number of record with filtering
     $this->db->select('count(*) as allcount');
     if($searchQuery != '')
     $this->db->where($searchQuery);
   $this->db->where('admin_role','Regional');
     $records = $this->db->get('master_admin')->result();
     $totalRecordwithFilter = $records[0]->allcount;

     ## Fetch records
     $this->db->select('*');
     if($searchQuery != '')
     $this->db->where($searchQuery);
   $this->db->where('admin_role','Regional');
     $this->db->order_by($columnName, $columnSortOrder);
     $this->db->limit($rowperpage, $start);
     $records = $this->db->get('master_admin')->result();

     $data = array();

     foreach($records as $record ){

       $data[] = array( 
         "admin_name"=>$record->admin_name,
         "admin_email"=>$record->admin_email,
         "admin_contact"=>$record->admin_contact,
         "created_at"=>$record->created_at
         
       ); 
     }

     ## Response
     $response = array(
       "draw" => intval($draw),
       "iTotalRecords" => $totalRecords,
       "iTotalDisplayRecords" => $totalRecordwithFilter,
       "aaData" => $data
     );

     return $response; 
   }

  public function countrow($table)
  {
    $fetch_pass = $this->db->query("select COUNT(id) as count from " . $table . " where flag != 2");
    $result = $fetch_pass->row();
    echo $res = $result->count;
  }
   
}


