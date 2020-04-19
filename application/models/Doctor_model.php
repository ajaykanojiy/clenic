<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Doctor_model extends CI_Model
{

    public $table = 'doctor';
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
	$this->db->or_like('name', $q);
	$this->db->or_like('main_educaton', $q);
	$this->db->or_like('medical_reg_no', $q);
	$this->db->or_like('speciality', $q);
	$this->db->or_like('year_of_experience', $q);
	$this->db->or_like('patients_per_hour', $q);
	$this->db->or_like('fees', $q);
	$this->db->or_like('gender', $q);
	$this->db->or_like('image', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('createdat', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('main_educaton', $q);
	$this->db->or_like('medical_reg_no', $q);
	$this->db->or_like('speciality', $q);
	$this->db->or_like('year_of_experience', $q);
	$this->db->or_like('patients_per_hour', $q);
	$this->db->or_like('fees', $q);
	$this->db->or_like('gender', $q);
	$this->db->or_like('image', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('createdat', $q);
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

/* End of file Doctor_model.php */
/* Location: ./application/models/Doctor_model.php */
/* Please DO NOT modify this information : */
/* Generated On Codeigniter2020-04-13 13:16:23 */
