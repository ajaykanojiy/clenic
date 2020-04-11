<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Allotment_model extends CI_Model
{

    public $table = 'allotment';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {   $login_type= $this->session->userdata('type');
           $log_id=$this->session->userdata('reg_id');  
         if($login_type==3){
            $this->db->where('customer_id',$log_id);
            $this->db->where('status',1);
             $this->db->order_by($this->id, $this->order);
           return $this->db->get($this->table)->result();
         }
          elseif($login_type==2){
            $this->db->where('employee_id',$log_id);
            $this->db->where('status',1);
             $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
         }else{
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
      }
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('customer_id', $q);
	$this->db->or_like('employee_id', $q);
	$this->db->or_like('building_id', $q);
	$this->db->or_like('room_id', $q);
	$this->db->or_like('rent', $q);
	$this->db->or_like('from_date', $q);
	$this->db->or_like('to_date', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('customer_id', $q);
	$this->db->or_like('employee_id', $q);
	$this->db->or_like('building_id', $q);
	$this->db->or_like('room_id', $q);
	$this->db->or_like('rent', $q);
	$this->db->or_like('from_date', $q);
	$this->db->or_like('to_date', $q);
	$this->db->or_like('status', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Allotment_model.php */
/* Location: ./application/models/Allotment_model.php */
/* Please DO NOT modify this information : */
/* Generated On Codeigniter2020-02-07 09:39:38 */
