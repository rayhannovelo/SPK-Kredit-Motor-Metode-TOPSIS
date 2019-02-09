<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_kriteria extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->simple_login->login_super(2,3);
		$this->load->model('m_konsumen');
		$this->load->model('m_kriteria');
	}

	public function compose_view($main_view, $data)
	{
		if($this->session->userdata('level') == 3) {
			$this->load->view('ca/header', $data);
			$this->load->view($main_view, $data);
			$this->load->view('ca/footer');
		}else {
			$this->load->view('pimpinan/header', $data);
			$this->load->view($main_view, $data);
			$this->load->view('pimpinan/footer');
		}
	}

	public function index()
	{
		$data['title'] = "Daftar Kriteria";
		$data['active'] = "daftar_kriteria";
		$data['kriteria'] = $this->m_kriteria->ambil_kriteria();

		$this->compose_view('admin/daftar_kriteria', $data);
	}

	public function tambah_kriteria()
	{
		$data['title'] = "Daftar Kriteria";
		$data['active'] = "daftar_kriteria";

		$this->compose_view('admin/tambah_kriteria', $data);
	}

	public function tambah_kriteria_form()
	{
		$data = array(
			'nama_kriteria' => $this->input->post('nama_kriteria'),
			'bobot ' => $this->input->post('bobot')
		);
		$id_kriteria = $this->m_kriteria->tambah_kriteria($data);

		foreach ($this->m_konsumen->ambil_konsumen() as $key => $value) {
			$data = array(
				'id_konsumen' => $value['id_konsumen'],
				'id_kriteria' => $id_kriteria,
				'nilai' => 1
			);
			$this->m_kriteria->tambah_nilai($data);
		}

		foreach ($this->input->post('sub_kriteria') as $key1 => $subkriteria) {
			foreach ($this->input->post('index_nilai') as $key2 => $index_nilai) {
				if($key1 == $key2) {
					if($subkriteria != '') {
						$data = array(
							'id_kriteria' => $id_kriteria,
							'nama_subkriteria' => $subkriteria,
							'index_nilai' => $index_nilai
						);
						$this->m_kriteria->tambah_subkriteria($data);
					}
				}
			}
		}

		$this->session->set_flashdata('hasil','<div class="alert alert-success alert-dismissable text-center"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>Data Kriteria Berhasil Ditambahkan!</div>');
		redirect('daftar_kriteria');
	}

	public function edit_kriteria($id_kriteria)
	{
		$data['title'] = "Daftar Kriteria";
		$data['active'] = "daftar_kriteria";
		$data['kriteria'] = $this->m_kriteria->ambil_kriteria_byid($id_kriteria);
		$data['sub_kriteria'] = $this->m_kriteria->ambil_subkriteria_byid($id_kriteria);

		$this->compose_view('admin/edit_kriteria', $data);
	}

	public function edit_kriteria_form($id_kriteria)
	{
		$data = array(
			'nama_kriteria' => $this->input->post('nama_kriteria'),
			'bobot ' => $this->input->post('bobot')
		);
		$this->m_kriteria->edit_kriteria($id_kriteria, $data);

		$this->m_kriteria->hapus_subkriteria($id_kriteria);

		foreach ($this->input->post('sub_kriteria') as $key1 => $subkriteria) {
			foreach ($this->input->post('index_nilai') as $key2 => $index_nilai) {
				if($key1 == $key2) {
					if($subkriteria != '') {
						$data = array(
							'id_kriteria' => $id_kriteria,
							'nama_subkriteria' => $subkriteria,
							'index_nilai' => $index_nilai
						);
						$this->m_kriteria->tambah_subkriteria($data);
					}
				}
			}
		}

		$this->session->set_flashdata('hasil','<div class="alert alert-success alert-dismissable text-center"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>Data Kriteria Berhasil Diperbarui!</div>');
		redirect('daftar_kriteria');
	}

	public function hapus_kriteria($id_kriteria)
	{
		$this->m_kriteria->hapus_kriteria($id_kriteria);
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Kriteria Berhasil Dihapus!</div>');

		redirect('daftar_kriteria');
	}
}
