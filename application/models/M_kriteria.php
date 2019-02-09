<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kriteria extends CI_Model{

    public function ambil_kriteria() {
        return $this->db->get('kriteria')->result_array();
    }

     public function ambil_kriteria_sebagian() {
        $this->db->where('id_kriteria >', 3);
        return $this->db->get('kriteria')->result_array();
    }

    public function ambil_subkriteria() {
        return $this->db->get('sub_kriteria')->result_array();
    }

    public function ambil_kriteria_byid($id_kriteria) {
        $this->db->where('id_kriteria', $id_kriteria);
        return $this->db->get('kriteria')->result_array();
    }

    public function ambil_subkriteria_byid($id_kriteria) {
        $this->db->where('id_kriteria', $id_kriteria);
        return $this->db->get('sub_kriteria')->result_array();
    }

    public function ambil_jumlah_kriteria() {
        return $this->db->get('kriteria')->num_rows();
    }

    public function tambah_kriteria($data) {
        $this->db->insert('kriteria', $data);
        return $this->db->insert_id();
    }

    public function tambah_subkriteria($data) {
        $this->db->insert('sub_kriteria', $data);
    }

    public function edit_kriteria($id_kriteria, $data) {
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->update('kriteria', $data);
    }

    public function hapus_kriteria($id_kriteria) {
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->delete('kriteria');
    }

    public function hapus_subkriteria($id_kriteria) {
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->delete('sub_kriteria');
    }

    // Nilai Evaluasi

    public function tambah_nilai($data) {
        $this->db->insert('nilai_evaluasi', $data);
        return $this->db->insert_id();
    }

    public function tambah_subnilai($data) {
        $this->db->insert('sub_nilai', $data);
    }

    public function edit_nilai($id_evaluasi, $nilai) {
        $this->db->set('nilai', $nilai);
        $this->db->where('id_evaluasi', $id_evaluasi);
        $this->db->update('nilai_evaluasi');
    }

    public function edit_nilai_full($id_konsumen, $id_kriteria, $nilai) {
        $this->db->set('nilai', $nilai);
        $this->db->where('id_konsumen', $id_konsumen);
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->update('nilai_evaluasi');
    }

    public function ambil_nilai_bykriteria($id_konsumen, $id_kriteria) {
        $this->db->where('id_konsumen', $id_konsumen);
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->limit(1);
        return $this->db->get('nilai_evaluasi')->row()->nilai;
    }

    public function ambil_nilai() {
        return $this->db->query('SELECT `konsumen`.`id_konsumen`, `id_konsumen`, `nama_konsumen`,
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "1" AND `nilai_evaluasi`.`id_konsumen` = `konsumen`.`id_konsumen`) as `kepribadian`, 
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "2" AND `nilai_evaluasi`.`id_konsumen` = `konsumen`.`id_konsumen`) as `kemampuan`, 
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "3" AND `nilai_evaluasi`.`id_konsumen` = `konsumen`.`id_konsumen`) as `penghasilan`, 
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "4" AND `nilai_evaluasi`.`id_konsumen` = `konsumen`.`id_konsumen`) as `jaminan`, 
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "5" AND `nilai_evaluasi`.`id_konsumen` = `konsumen`.`id_konsumen`) as `kondisi`
            FROM `konsumen` WHERE `status` = "1"')->result_array();
    }

    /* public function ambil_nilai_byid($id_konsumen) {
        return $this->db->query('SELECT `konsumen`.`id_konsumen`, `id_konsumen`, `nama_konsumen`,
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "1" AND `nilai_evaluasi`.`id_konsumen` = `konsumen`.`id_konsumen`) as `kepribadian`, 
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "2" AND `nilai_evaluasi`.`id_konsumen` = `konsumen`.`id_konsumen`) as `kemampuan`, 
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "3" AND `nilai_evaluasi`.`id_konsumen` = `konsumen`.`id_konsumen`) as `penghasilan`, 
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "4" AND `nilai_evaluasi`.`id_konsumen` = `konsumen`.`id_konsumen`) as `jaminan`, 
            (SELECT `nilai` FROM `nilai_evaluasi` WHERE `id_kriteria` = "5" AND `nilai_evaluasi`.`id_konsumen` = `konsumen`.`id_konsumen`) as `kondisi`
            FROM `konsumen` WHERE `id_konsumen` = '.$id_konsumen)->result_array();
    } */

    public function ambil_nilai_byid($id_konsumen) {
        $this->db->where('id_konsumen', $id_konsumen);
        return $this->db->get('nilai_evaluasi')->result_array();
    }

    public function ambil_id_evaluasi($id_konsumen) {
        $this->db->where('id_kriteria', 1);
        $this->db->where('id_konsumen', $id_konsumen);
        return $this->db->get('nilai_evaluasi')->row()->id_evaluasi;
    }

    public function ambil_subnilai_byid($id_evaluasi) {
        $this->db->where('id_evaluasi', $id_evaluasi);
        return $this->db->get('sub_nilai')->result_array();
    }

    public function edit_subnilai($id_subnilai, $subnilai) {
        $this->db->set('subnilai', $subnilai);
        $this->db->where('id_subnilai', $id_subnilai);
        $this->db->update('sub_nilai');
    }
}