<?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Grievance_model extends CI_Model

{

public function __construct()

{

parent::__construct();

}

  public function list_common($table){
		$this->db->select('*');
 		$this->db->from($table);
 		$this->db->where('flag','0');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function searchpolicy($query)
	{
		$this->db->select('*');
		$this->db->like('policy_no', $query);
		$this->db->order_by('id','desc');
 		$this->db->from('form');		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function policy_data($policy_no)
	{
		$this->db->select('form.*,company.name as com_name,team_leader.name as tl_name');
		$this->db->from('form');
		$this->db->join('company', 'form.company_name = company.id', 'left');
		$this->db->join('team_leader', 'form.tl = team_leader.id', 'left');
		$this->db->where('form.policy_no', $policy_no);
		$this->db->where('form.flag','0');
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
   
}


