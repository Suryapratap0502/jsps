<?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Report_model extends CI_Model

{

public function __construct()

{

parent::__construct();

}
public function list_common_where($table,$short_name,$limit = null, $offset = null){
	$this->db->select('*');
	$this->db->from($table);
	$this->db->where('updated_by_user_module',$short_name);
	$this->db->where('flag','0');
	if (!empty($limit)) {
	   $this->db->limit($limit, $offset);
	 }
   $query = $this->db->get();
   $result = $query->result_array();
   return $result;
}
  public function filterdate_listpage($short_name,$limit = null, $offset = null){
	$this->db->select('form.*,form_disposition_remark.*,form.id as form_id,form_disposition_remark.created_at as enforced_date');
	$this->db->from('form');
	$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');
	$this->db->where('form_disposition_remark.done_by_module',$short_name);
	$this->db->where('form.flag', '0');
	$this->db->where('form_disposition_remark.flag', '0');
	if (!empty($limit)) {
		$this->db->limit($limit, $offset);
	  }
	$query = $this->db->get();
	$result = $query->result_array();
	return $result;
} 
public function list_common($table,$limit = null, $offset = null)
{
        $this->db->select('*');
 		$this->db->from($table);
 		$this->db->where('flag','0');
		 if (!empty($limit)) {
			$this->db->limit($limit, $offset);
		  }
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
}
public function report_data($short_name, $limit = null, $offset = null)
	{
		$this->db->select('form.*,form_disposition_remark.*,form.id as form_id,form_disposition_remark.created_at as enforced_date');
		$this->db->from('form');
		$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');
		$this->db->where('form_disposition_remark.done_by_module', $short_name);
		$this->db->where('form.flag', '0');
		$this->db->where('form_disposition_remark.flag', '0');
		if (!empty($limit)) {
			$this->db->limit($limit, $offset);
		}
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}

public function renewal_report()
{
      $this->db->select('sub_desposition.form_id,sub_desposition.policy_no,sub_desposition.desposition_id,sub_desposition.sub_desposition_name,sub_desposition.remark as sub_remark,sub_desposition.action,sub_desposition.action,sub_desposition.condition,sub_desposition.module,form.*');
		$this->db->from('sub_desposition');
		$this->db->join('form', 'sub_desposition.form_id = form.id', 'inner');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
}
 public function claim_data($table, $where, $id, $limit = null, $offset = null)
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
  public function renewal_data( $limit = null, $offset = null)
	{
		$this->db->select('sub_desposition.form_id,sub_desposition.policy_no,sub_desposition.desposition_id,sub_desposition.sub_desposition_name,sub_desposition.remark as sub_remark,sub_desposition.action,sub_desposition.action,sub_desposition.condition,sub_desposition.module,form.*');
		$this->db->from('sub_desposition');
		$this->db->join('form', 'sub_desposition.form_id = form.id', 'inner');
		if (!empty($limit)) {
			$this->db->limit($limit, $offset);
		}
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}
   
}


