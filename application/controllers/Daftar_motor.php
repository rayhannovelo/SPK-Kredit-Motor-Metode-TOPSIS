<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_motor extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->simple_login->cek_login(1);
		$this->load->model('m_kriteria');
		$this->load->model('m_motor');
	}

	public function compose_view($main_view, $data)
	{
		$this->load->view('admin/header', $data);
		$this->load->view($main_view, $data);
		$this->load->view('admin/footer');
	}

	public function index()
	{
		$data['title'] = "Daftar Motor";
		$data['active'] = "daftar_motor";
		$data['daftar_motor'] = $this->m_motor->ambil_motor();

		$this->compose_view('admin/daftar_motor', $data);
	}

	public function tambah_motor()
	{
		$data['title'] = "Form Tambah Motor";
		$data['active'] = "daftar_motor";
		$data['motor'] = $this->m_motor->ambil_motor();

		$this->compose_view('admin/tambah_motor', $data);
	}

	public function tambah_motor_form() {
		date_default_timezone_set('Asia/Jakarta');

		$data = array(
			'merk' => $this->input->post('merk'),
			'tipe' => $this->input->post('tipe'),
			'warna' => $this->input->post('warna'),
			'harga' => $this->input->post('harga'),
			'harga_dp' => $this->input->post('harga_dp')
		);

		$this->m_motor->tambah_motor($data);

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Motor Berhasil Ditambahkan!</div>');

		redirect('daftar_motor');
	}

	public function edit_motor($id_motor)
	{
		$data['title'] = "Form Edit Motor";
		$data['active'] = "daftar_motor";
		$data['motor'] = $this->m_motor->ambil_motor_byid($id_motor);

		$this->compose_view('admin/edit_motor', $data);
	}

	public function edit_motor_form($id_motor) {
		$data = array(
			'merk' => $this->input->post('merk'),
			'tipe' => $this->input->post('tipe'),
			'warna' => $this->input->post('warna'),
			'harga' => $this->input->post('harga'),
			'harga_dp' => $this->input->post('harga_dp')
		);

		$this->m_motor->edit_motor($id_motor, $data);
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Motor Berhasil Diedit!</div>');

		redirect('daftar_motor');
	}

	public function hapus_motor($id_motor)
	{
		$this->m_motor->hapus_motor($id_motor);
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Motor Berhasil Dihapus!</div>');

		redirect('daftar_motor');
	}

	public function ubah_status($id_motor, $status)
	{
		$this->m_motor->edit_motor($id_motor, array('status' => $status));
		if($status == 1) {
			$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Motor Diaktifkan!</div>');
		}else {
			$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Motor Dinonaktifkan!</div>');
		}

		redirect('daftar_motor');
	}
}
