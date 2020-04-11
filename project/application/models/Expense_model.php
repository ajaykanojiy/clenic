<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Expense_model extends CI_Model
{

    public $table = 'expense';
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
	$this->db->or_like('date', $q);
	$this->db->or_like('transaction_id', $q);
	$this->db->or_like('category', $q);
	$this->db->or_like('subcategory', $q);
	$this->db->or_like('Item_detail', $q);
	$this->db->or_like('paying_employee', $q);
	$this->db->or_like('amount_paid', $q);
	$this->db->or_like('payment_mode', $q);
	$this->db->or_like('building_id', $q);
	$this->db->or_like('room_id', $q);
	$this->db->or_like('room_type', $q);
	$this->db->or_like('sic_bill', $q);
	$this->db->or_like('comment', $q);
	$this->db->or_like('vendor_bill', $q);
	$this->db->or_like('shop_name', $q);
	$this->db->or_like('vendor_type', $q);
	$this->db->or_like('location', $q);
	$this->db->or_like('mobile', $q);
	$this->db->or_like('asset_id', $q);
	$this->db->or_like('model', $q);
	$this->db->or_like('manufacturing_company', $q);
	$this->db->or_like('warranty', $q);
	$this->db->or_like('stayinclass_asset_id', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('date', $q);
	$this->db->or_like('transaction_id', $q);
	$this->db->or_like('category', $q);
	$this->db->or_like('subcategory', $q);
	$this->db->or_like('Item_detail', $q);
	$this->db->or_like('paying_employee', $q);
	$this->db->or_like('amount_paid', $q);
	$this->db->or_like('payment_mode', $q);
	$this->db->or_like('building_id', $q);
	$this->db->or_like('room_id', $q);
	$this->db->or_like('room_type', $q);
	$this->db->or_like('sic_bill', $q);
	$this->db->or_like('comment', $q);
	$this->db->or_like('vendor_bill', $q);
	$this->db->or_like('shop_name', $q);
	$this->db->or_like('vendor_type', $q);
	$this->db->or_like('location', $q);
	$this->db->or_like('mobile', $q);
	$this->db->or_like('asset_id', $q);
	$this->db->or_like('model', $q);
	$this->db->or_like('manufacturing_company', $q);
	$this->db->or_like('warranty', $q);
	$this->db->or_like('stayinclass_asset_id', $q);
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

/* End of file Expense_model.php */
/* Location: ./application/models/Expense_model.php */
/* Please DO NOT modify this information : */
/* Generated On Codeigniter2020-02-16 12:00:48 */
