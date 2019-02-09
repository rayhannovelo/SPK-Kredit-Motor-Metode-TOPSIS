<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_motor extends CI_Model{

    public function ambil_motor() {
        return $this->db->get('motor')->result_array();
    }

    public function ambil_motor_byid($id_motor) {
        $this->db->where('id_motor', $id_motor);
        return $this->db->get('motor')->result_array();
    }

    public function ambil_harga($id_motor) {
        $this->db->where('id_motor', $id_motor);
        return $this->db->get('motor')->row()->harga;
    }

    public function ambil_harga_dp($id_motor) {
        $this->db->where('id_motor', $id_motor);
        return $this->db->get('motor')->row()->harga_dp;
    }

    public function tambah_motor($data) {
        $this->db->insert('motor', $data);
        return $this->db->insert_id();
    }

    public function edit_motor($id_motor, $data) {
        $this->db->where('id_motor', $id_motor);
        $this->db->update('motor', $data);
    }

    public function hapus_motor($id_motor) {
        $this->db->where('id_motor', $id_motor);
        $this->db->delete('motor');
    }   
}