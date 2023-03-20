<?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Form_model extends CI_Model

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
  
  public function policy_count($table,$current_date,$three_month_date)
  {
  		$this->db->select('count(*)');
 		$this->db->from($table);
 		$this->db->where('expiry_date BETWEEN "'. $current_date. '" and "'. $three_month_date.'"');
    	$query = $this->db->get();  
		$cnt = $query->row_array();
		return $cnt['count(*)'];

  }

  public function count_member($table,$where,$id)
  {
	$this->db->select('count(*)');
 		$this->db->from($table);
 		$this->db->where($where,$id);
		 $this->db->where('flag','0');
    	$query = $this->db->get();  
		$cnt = $query->row_array();
		return $cnt['count(*)'];
  }
  public function update_common($table, $data, $where, $id)
  {
    $this->db->where($where, $id);
    $this->db->update($table, $data);
    return true;
  }
  
  public function list_common($table){
		$this->db->select('*');
 		$this->db->from($table);
 		$this->db->where('flag','0');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
  
 public function get_renewal_data($table, $current_date, $three_month_date,$limit = NULL,$offset= NULL)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('policy_end_date BETWEEN "' . $current_date . '" and "' . $three_month_date . '"');
		if (!empty($limit)) {
			$this->db->limit($limit, $offset);
		}
		$query = $this->db->get();
		return $query;
	}
	public function get_renewal_count($table, $current_date, $three_month_date,$limit = NULL,$offset= NULL)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('policy_end_date BETWEEN "' . $current_date . '" and "' . $three_month_date . '"');
		if (!empty($limit)) {
			$this->db->limit($limit, $offset);
		}
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	
	}
  public function check_api_data($table,$name,$email,$contact,$log_id,$cust_id)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('proposer_name', $name);
		$this->db->where('email', $email);
		$this->db->where('contact', $contact);
    	$this->db->where('log_id', $log_id);
    	$this->db->where('cust_id', $cust_id);
		$this->db->where('flag', '0');
		$query = $this->db->get();
		return $query->num_rows();
	}
  public function check_badges($table,$where,$item)
  {
  		$this->db->select('count(id)');
 		$this->db->from($table);
 		$this->db->where($where,$item);
		$query = $this->db->get();  
		$cnt = $query->row_array();
		return $cnt['count(id)'];
  }
  
  public function count_disp($table,$where,$item,$where2,$item2)
  {
  		$this->db->select('distinct(disposition)');
 		$this->db->from($table);
 		$this->db->where($where,$item);
    	$this->db->where($where2,$item2);
    	$this->db->group_by('disposition');
    	$query = $this->db->get();  
		$cnt = $query->num_rows();
		return $cnt;
  }
  
  public function show_disp($table,$where,$item,$where2,$item2)
  {
    	$this->db->select('disposition as disp_id');
 		$this->db->from($table);
 		$this->db->where($where,$item);
    	$this->db->where($where2,$item2);
    	$this->db->group_by('disposition');
    	$this->db->order_by('id','desc');
    	$query = $this->db->get();  
		$cnt = $query->result_array();
		return $cnt;
  }
  
  public function fetch_verify_data($table,$where,$id)
  {
  		$this->db->select('*');
		$this->db->where($where,$id);
    	$this->db->group_by('done_by_module');	
    	$this->db->order_by('id','desc');	
 		$this->db->from($table);		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
  
  }
  
  public function fetch_insured_details($table,$where,$id)
  {
  		$this->db->select('*');
		$this->db->where($where,$id);
		$this->db->order_by('id','desc');	
 		$this->db->from($table);		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
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
  
  public function claim_details_policy_wise($table,$where,$id)
  {
    	$this->db->select('*');
		$this->db->where($where,$id);
		$this->db->where('flag','0');
    	$this->db->group_by('claim_intimation_no');
		$this->db->order_by('id','desc');	
 		$this->db->from($table);		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
  }
  
  public function list_common_where4($table,$where1,$policy_no,$where2,$id)
  {
  		$this->db->select('*');
		$this->db->where($where1,$policy_no);
    	$this->db->or_where($where2,$id);
		$this->db->order_by('id','desc');	
 		$this->db->from($table);		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
  
  }
  
  public function getcity_fun($item)
  {
 		$this->db->select('*');
		$this->db->like('name', $item);
		$this->db->order_by('id','desc');
 		$this->db->from('city');		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
  }
  
  public function getremark($table,$where1,$id,$where2,$id2)
  {
  	$this->db->select('*');
		$this->db->where($where1,$id);
    $this->db->where($where2,$id2);
		$this->db->order_by('id','desc');	
 		$this->db->from($table);		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
  
  
  
  }
  
  
  	public function fetch_disposition_name($table,$where,$id){
		$this->db->select('*');
		$this->db->where($where,$id);
 		$this->db->from($table);		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}  

	function display_sp_single4($table, $where, $id)
  {
    $query = $this->db->where($where, $id);
    $query = $this->db->get($table);
    return true;
  }


public function userData($admin_email)
{
$this->db->select('admin');
$this->db->where('email', $admin_email);
$query = $this->db->get('admin');


return $query->row();

}

public function master_data_count($table, $where, $id, $limit = null, $offset = null)
	{
		$this->db->select('id');
      $this->db->from($table);
      $this->db->where($where, $id);

      if (!empty($limit)) {
        $this->db->limit($limit, $offset);
      }

      $query = $this->db->get();
      $result = $query->num_rows();
      return $result;
	}
  public function master_count()
	{
		$this->db->select('*');
		$this->db->from('form');
		$this->db->where('flag !=', '2');

		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
	public function masterData($limit = null, $offset = null)
	{

		$this->db->select('*');
		$this->db->from('form');
		$this->db->where('flag !=', '2');
		if (!empty($limit)) {
			$this->db->limit($limit, $offset);
		  }
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

public function getlogdata($id,$short)
{
  // $query = $this->db->query("SELECT fdr.*,sd.module_name,sd.form_id,sd.user_id,sd.docs_name,sd.sale_docs from form_disposition_remark fdr left join sale_docs sd on fdr.form_id = sd.form_id where fdr.form_id=$id");
  // $query = $this->db->get();
  // return $query->result_array();

  /* $this->db->select('fdr.*,sd.module_name,sd.form_id,sd.user_id,sd.docs_name,sd.sale_docs,sd.policy_no,sd.created_at as sd_created_at,fdr.created_at as fdr_created_at');
			$this->db->from('form_disposition_remark fdr');
			$this->db->join('sale_docs sd', 'fdr.form_id = sd.form_id', 'left');
			$this->db->where('fdr.form_id', $id);
      $this->db->where('fdr.done_by_module', 'underwriter_verifier');
  	$this->db->group_by('sd.docs_name');
      $query = $this->db->get();
			$result = $query->result_array();
			return $result; */
  
  $this->db->select('*');
			$this->db->from('sale_docs');
			$this->db->where('sale_docs.form_id', $id);
      $this->db->where('sale_docs.done_by_module', 'underwriter_verifier');
  $this->db->where('sale_docs.module_name', 'underwriter_verifier');
  	  $query = $this->db->get();
			$result = $query->result_array();
			return $result;
}

public function getlogdata_operation($id,$short)
{
  		/*	$this->db->select('fdr.*,sd.module_name,sd.form_id,sd.user_id,sd.docs_name,sd.sale_docs,sd.policy_no');
			$this->db->from('form_disposition_remark fdr');
			$this->db->join('sale_docs sd', 'fdr.form_id = sd.form_id', 'inner');
			$this->db->where('fdr.form_id', $id);
        	$this->db->where('fdr.done_by_module', 'operations');
  			$this->db->group_by('sd.docs_name');
         	$query = $this->db->get();
			$result = $query->result_array();
			return $result; */
  
  			$this->db->select('*');
			$this->db->from('sale_docs');
			$this->db->where('sale_docs.form_id', $id);
      $this->db->where('sale_docs.done_by_module', 'operations');
  $this->db->where('sale_docs.module_name', 'operations');
  	  $query = $this->db->get();
			$result = $query->result_array();
			return $result;
}

public function getlogdata_services($id,$short)
{
 /* $this->db->select('fdr.*,sd.module_name,sd.form_id,sd.user_id,sd.docs_name,sd.sale_docs,sd.policy_no');
  $this->db->from('form_disposition_remark fdr');
  $this->db->join('sale_docs sd', 'fdr.form_id = sd.form_id', 'left');
  $this->db->where('fdr.form_id', $id);
  $this->db->where('fdr.done_by_module', 'services');
  $query = $this->db->get();
  $result = $query->result_array();
  return $result;  */
  
  $this->db->select('*');
			$this->db->from('sale_docs');
			$this->db->where('sale_docs.form_id', $id);
      $this->db->where('sale_docs.done_by_module', 'services');
  $this->db->where('sale_docs.module_name', 'services');
  	  $query = $this->db->get();
			$result = $query->result_array();
			return $result;
}

public function getlogdata_renewals($id,$short)
{
 $this->db->select('*');
			$this->db->from('sale_docs');
			$this->db->where('sale_docs.form_id', $id);
      $this->db->where('sale_docs.done_by_module', 'renewals');
  $this->db->where('sale_docs.module_name', 'renewals');
  	  $query = $this->db->get();
			$result = $query->result_array();
			return $result;
}

public function initiated_claim_list($limit = NULL, $offset = NULL)
{
	$this->db->select('claim.*,form.id as form_id,form.policy_end_date,claim.id as claim_id');
	$this->db->from('form');
	$this->db->join('claim', 'claim.policy_no = form.policy_no', 'inner');
	$this->db->where('form.flag', '0');
  	$this->db->where('claim.flag', '0');
  	$this->db->group_by('claim.policy_no');
  	if (!empty($limit)) {
			$this->db->limit($limit, $offset);
		}
	$query = $this->db->get();
	$result = $query->result_array();
	return $result;
}
public function initiated_claim_count()
	{
		$this->db->select('form.*,claim.*,form.id as form_id,claim.id as claim_id');
		$this->db->from('form');
		$this->db->join('claim', 'claim.policy_no = form.policy_no', 'inner');
		$this->db->where('form.flag', '0');
		$this->db->where('claim.flag', '0');
		$this->db->group_by('claim.policy_no');
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
public function searchpolicy($content, $string)
	{
		$where = "form.policy_no not in (Select policy_no from claim) and form." . $content . " like '%" . $string . "%'";
		$this->db->select('*,form.policy_no as form_policy,form.id as form_id,form.contact as form_contact,form.email as form_email');
		$this->db->from('form');
		$this->db->join('claim', 'claim.policy_no = form.policy_no', 'left');
		$this->db->where($where);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

public function fetch_call_reminder_data($table)
{
	// $this->db->select('*');
	// $this->db->from($table);
	// $this->db->where('CURRENT_TIMESTAMP() >=', 'call_time');
	// $this->db->where('reminder_flag','0');
  	// $query = $this->db->get();
	// $result = $query->result_array();
	// return $result;

	$this->db->select('TIMESTAMPDIFF(minute, CURRENT_TIMESTAMP(),call_time) as minute, call_reminder.*');
	$this->db->from($table);
	//$this->db->where('CURRENT_TIMESTAMP() >=', 'call_time');
	$this->db->where('reminder_flag','0');
	$this->db->limit('1');
  	$query = $this->db->get();
	$result = $query->row();
	return $result;
}
public function get_underwriter_remark($id,$present_date_y)
	{
		$this->db->select('form.*,form_disposition_remark.*,LEFT(form_disposition_remark.created_at,4)');
		$this->db->from('form');
		$this->db->join('form_disposition_remark', 'form_disposition_remark.form_id = form.id', 'inner');
		$this->db->where('form_disposition_remark.form_id', $id);
		$this->db->where('form_disposition_remark.done_by_module', 'underwriter_verifier');
		$this->db->where('form.flag', '0');
		$this->db->where('LEFT(form_disposition_remark.created_at,4)',$present_date_y);
		$this->db->order_by('form.id', 'asc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function get_operation_remark($id,$present_date_y)
	{
		$this->db->select('form.*,form_disposition_remark.*,LEFT(form_disposition_remark.created_at,4)');
		$this->db->from('form');
		$this->db->join('form_disposition_remark', 'form_disposition_remark.form_id = form.id', 'inner');
		$this->db->where('form_disposition_remark.form_id', $id);
		$this->db->where('form_disposition_remark.done_by_module', 'operations');
		$this->db->where('form.flag', '0');
		$this->db->where('LEFT(form_disposition_remark.created_at,4)',$present_date_y);
		$this->db->order_by('form.id', 'asc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function get_service_remark($id,$present_date_y)
	{
		$this->db->select('form.*,form_disposition_remark.*,LEFT(form_disposition_remark.created_at,4)');
		$this->db->from('form');
		$this->db->join('form_disposition_remark', 'form_disposition_remark.form_id = form.id', 'inner');
		$this->db->where('form_disposition_remark.form_id', $id);
		$this->db->where('form_disposition_remark.done_by_module', 'services');
		$this->db->where('form.flag', '0');
		$this->db->where('LEFT(form_disposition_remark.created_at,4)',$present_date_y);
		$this->db->order_by('form.id', 'asc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
  
 public function get_claim_remark($table,$where,$policy_no,$present_date_y)
	{
		$this->db->select('*');
		$this->db->where($where, $policy_no);
		$this->db->where('flag', '0');
		$this->db->where('LEFT(created_at,4)',$present_date_y);
		$this->db->order_by('id', 'asc');
		$this->db->from($table);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function get_renewal_remark($id,$present_date_y)
	{
		$this->db->select('form.*,sub_desposition.*,LEFT(form.created_at,4)');
		$this->db->from('form');
		$this->db->join('sub_desposition', 'sub_desposition.form_id = form.id', 'inner');
		$this->db->where('sub_desposition.form_id', $id);
		$this->db->where('sub_desposition.module', 'renewals');
		$this->db->where('form.flag', '0');
		$this->db->where('LEFT(form.created_at,4)', $present_date_y);
		$this->db->order_by('form.id', 'asc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
  public function data_after_search_claim($policy_no)
	{
		$this->db->select('*');
		$this->db->where('policy_no', $policy_no);
		if(is_numeric($policy_no)){
		$this->db->or_where('contact', $policy_no);
		}
		$this->db->or_where('email', $policy_no);
		$this->db->where('flag', '0');
		$this->db->order_by('id', 'asc');
		$this->db->from('form');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}



//filer by name


 

  
   
}


