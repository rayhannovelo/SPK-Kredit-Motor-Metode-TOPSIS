<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_konsumen extends CI_Model{

    public function ambil_konsumen() {
        $this->db->join('motor', 'motor.id_motor = konsumen.id_motor');
        return $this->db->get('konsumen')->result_array();
    }

    public function ambil_konsumen_aktif() {
        $this->db->where('status', 1);
        $this->db->join('motor', 'motor.id_motor = konsumen.id_motor');
        return $this->db->get('konsumen')->result_array();
    }

    public function ambil_konsumen_byid($id_konsumen) {
        $this->db->where('id_konsumen', $id_konsumen);
        $this->db->join('motor', 'motor.id_motor = konsumen.id_motor');
        return $this->db->get('konsumen')->result_array();
    }

    public function ambil_laporan_konsumen() {
        return $this->db->query('SELECT
            (SELECT COUNT(`id_konsumen`)  FROM `konsumen` WHERE MONTHNAME(`tanggal_pembelian`) = 
            "January") as "Januari",
            (SELECT COUNT(`id_konsumen`)  FROM `konsumen` WHERE MONTHNAME(`tanggal_pembelian`) = 
            "February") as "Februari",
            (SELECT COUNT(`id_konsumen`)  FROM `konsumen` WHERE MONTHNAME(`tanggal_pembelian`) = 
            "March") as "Maret",
            (SELECT COUNT(`id_konsumen`)  FROM `konsumen` WHERE MONTHNAME(`tanggal_pembelian`) = 
            "April") as "April",
            (SELECT COUNT(`id_konsumen`)  FROM `konsumen` WHERE MONTHNAME(`tanggal_pembelian`) = 
            "May") as "Mei",
            (SELECT COUNT(`id_konsumen`)  FROM `konsumen` WHERE MONTHNAME(`tanggal_pembelian`) = 
            "June") as "Juni",
            (SELECT COUNT(`id_konsumen`)  FROM `konsumen` WHERE MONTHNAME(`tanggal_pembelian`) = 
            "July") as "Juli",
            (SELECT COUNT(`id_konsumen`)  FROM `konsumen` WHERE MONTHNAME(`tanggal_pembelian`) = 
            "August") as "Agustus",
            (SELECT COUNT(`id_konsumen`)  FROM `konsumen` WHERE MONTHNAME(`tanggal_pembelian`) = 
            "September") as "September",
            (SELECT COUNT(`id_konsumen`)  FROM `konsumen` WHERE MONTHNAME(`tanggal_pembelian`) = 
            "October") as "Oktober",
            (SELECT COUNT(`id_konsumen`)  FROM `konsumen` WHERE MONTHNAME(`tanggal_pembelian`) = 
            "November") as "November",
            (SELECT COUNT(`id_konsumen`)  FROM `konsumen` WHERE MONTHNAME(`tanggal_pembelian`) = 
            "December") as "Desember"
            FROM `konsumen` LIMIT 1')->result();
    }

    public function tambah_konsumen($data) {
        $this->db->insert('konsumen', $data);
        return $this->db->insert_id();
    }

    public function edit_konsumen($id_konsumen, $data) {
        $this->db->where('id_konsumen', $id_konsumen);
        $this->db->update('konsumen', $data);
    }

    public function hapus_konsumen($id_konsumen) {
        $this->db->where('id_konsumen', $id_konsumen);
        $this->db->delete('konsumen');
    }   

    public function jumlah_konsumen_aktif() {
        $this->db->where('status', 1);
        return $this->db->get('konsumen')->num_rows();
    }
}