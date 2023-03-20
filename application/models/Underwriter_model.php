 <?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Underwriter_model extends CI_Model

{

public function __construct()

{

parent::__construct();

}


  public function list_common($table){
		$this->db->select('*');
 		$this->db->from($table);
 		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
  
  public function fetch_sidebar_group_id($table,$where,$id){
		$this->db->select('*');
		$this->db->where($where,$id);
    	//$this->db->where('flag','0');
		//$this->db->order_by('sidebar_id','desc');	
 		$this->db->from($table);		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}  
  
  	 public function fetch_sidebar_group_id1($table,$where,$id){
		$this->db->select('*');
		$this->db->where($where,$id);
    	$this->db->where('flag','0');
		//$this->db->order_by('sidebar_id','desc');	
 		$this->db->from($table);		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}  


public function userData($admin_email)

{

$this->db->select('admin_email');



$this->db->where('admin_email', $admin_email);

$query = $this->db->get('master_admin');

return $query->row();

}

public function masterData()

{

$this->db->select('*');
$this->db->where('admin_role','Regional');
// $this->db->where('admin_status','Enable');
$query = $this->db->get('master_admin');  

         return $query;

}
public function deletesubadmin($id)
{
  $this->db->where('admin_user_id',$id);
  $this->db->delete('master_admin');
}

public function subadmineditmodel($id)
{
   // $id = $this->input->get("admin_user_id");

     $this->db->select('*');
        $this->db->from('master_admin');
        $this->db->where('admin_user_id',$id);
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
     
     if($searchName != ''){
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

  
   
}


