<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Staff_model extends CI_Model
{

    public $table = 'staff';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
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
	$this->db->or_like('type', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('father_name', $q);
	$this->db->or_like('age', $q);
	$this->db->or_like('sex', $q);
	$this->db->or_like('address', $q);
	$this->db->or_like('mobile', $q);
	$this->db->or_like('salary', $q);
	$this->db->or_like('work_time', $q);
	$this->db->or_like('image', $q);
	$this->db->or_like('id_image', $q);
	$this->db->or_like('id_number', $q);
	$this->db->or_like('created at', $q);
	$this->db->or_like('date', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('type', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('father_name', $q);
	$this->db->or_like('age', $q);
	$this->db->or_like('sex', $q);
	$this->db->or_like('address', $q);
	$this->db->or_like('mobile', $q);
	$this->db->or_like('salary', $q);
	$this->db->or_like('work_time', $q);
	$this->db->or_like('image', $q);
	$this->db->or_like('id_image', $q);
	$this->db->or_like('id_number', $q);
	$this->db->or_like('created at', $q);
	$this->db->or_like('date', $q);
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


     function mobile_check($mobile)
    {
        $this->db->where('mobile', $mobile);
        $res= $this->db->get($this->table)->row();
        if($res){
            return 1;
        }else{
            return 2;
        }
    }

}

/* End of file Staff_model.php */
/* Location: ./application/models/Staff_model.php */
/* Please DO NOT modify this information : */
/* Generated On Codeigniter2020-04-13 13:16:58 */
