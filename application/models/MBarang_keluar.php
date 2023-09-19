<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MBarang_keluar extends CI_Model
{

    public $table = 'barang_keluar';
    public $id = 'id_barang_keluar';
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
        $this->db->like('id_barang_keluar', $q);
	$this->db->or_like('kode_barang', $q);
	$this->db->or_like('sisa_barang', $q);
	$this->db->or_like('tanggal_keluar', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }
    function total_rows_filter($q = NULL,$tanggal_awal,$tanggal_akhir) {
        $this->db->where('tanggal_keluar >=', $tanggal_awal);
        $this->db->where('tanggal_keluar <=', $tanggal_akhir);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data_filter($limit, $start = 0, $q = NULL,$tanggal_awal,$tanggal_akhir) {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('tanggal_keluar >=', $tanggal_awal);
        $this->db->where('tanggal_keluar <=', $tanggal_akhir);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_barang_keluar', $q);
	$this->db->or_like('kode_barang', $q);
	$this->db->or_like('sisa_barang', $q);
	$this->db->or_like('tanggal_keluar', $q);
	$this->db->or_like('status', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
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

/* End of file MBarang_keluar.php */
/* Location: ./application/models/MBarang_keluar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-08-07 15:13:49 */
/* http://harviacode.com */