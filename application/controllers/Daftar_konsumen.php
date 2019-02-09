<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_konsumen extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->simple_login->login_public();
		$this->load->model('m_konsumen');
		$this->load->model('m_kriteria');
		$this->load->model('m_motor');
	}

	public function compose_view($main_view, $data)
	{
		if($this->session->userdata('level') == 1) {
			$this->load->view('admin/header', $data);
			$this->load->view($main_view, $data);
			$this->load->view('admin/footer');
		}elseif($this->session->userdata('level') == 2) {
			$this->load->view('pimpinan/header', $data);
			$this->load->view($main_view, $data);
			$this->load->view('pimpinan/footer');
		}else {
			$this->load->view('ca/header', $data);
			$this->load->view($main_view, $data);
			$this->load->view('ca/footer');
		}
	}

	public function index()
	{
		$data['title'] = "Daftar Konsumen";
		$data['active'] = "daftar_konsumen";
		$data['daftar_konsumen'] = $this->m_konsumen->ambil_konsumen();

		$this->compose_view('admin/daftar_konsumen', $data);
	}

	public function tambah_konsumen()
	{
		$data['title'] = "Form Tambah Konsumen";
		$data['active'] = "daftar_konsumen";
		$data['motor'] = $this->m_motor->ambil_motor();
		$data['kriteria'] = $this->m_kriteria->ambil_kriteria_sebagian();
		$data['sub_kriteria'] = $this->m_kriteria->ambil_subkriteria();

		$this->compose_view('admin/tambah_konsumen', $data);
	}

	public function tambah_konsumen_form() {
		date_default_timezone_set('Asia/Jakarta');

		$data = array(
			'id_motor' => $this->input->post('id_motor'),
			'nama_konsumen' => $this->input->post('nama_konsumen'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama' => $this->input->post('agama'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'agama' => $this->input->post('agama'),
			'tanggal_pembelian' => date('Y-m-d'),
			'pendapatan_konsumen' => $this->input->post('pendapatan_konsumen'),
			'pendapatan_pasangan' => $this->input->post('pendapatan_pasangan'),
			'pengeluaran_tanggungan' => $this->input->post('pengeluaran_tanggungan'),
			'angsurang_perbulan' => $this->input->post('angsurang_perbulan'),
			'status' => 1
		);

		$id_konsumen = $this->m_konsumen->tambah_konsumen($data);

		foreach ($this->input->post('nilai_kriteria') as $key1 => $nilai_kriteria) {
			$nilai = array(
				'id_konsumen' => $id_konsumen,
				'id_kriteria' => ($key1 + 1),
				'nilai' => $nilai_kriteria
			);

			$id_evaluasi = $this->m_kriteria->tambah_nilai($nilai);

			if($key1 == 0) { // kriteria 1 (Kepribadian)
				$total_subnilai = 0;
				foreach($this->input->post('subnilai_kriteria') as $key2 => $value) {
					$sub_nilai = array(
						'id_evaluasi' => $id_evaluasi,
						'subnilai' => $value
					);

					$this->m_kriteria->tambah_subnilai($sub_nilai);

					$total_subnilai += $value;
				}
				$this->m_kriteria->edit_nilai($id_evaluasi, $this->parameter_nilai($total_subnilai));
			}elseif ($key1 == 1) { // kriteria 2 (Uang Muka)
				$harga = $this->m_motor->ambil_harga($this->input->post('id_motor'));
				$harga_dp = $this->m_motor->ambil_harga_dp($this->input->post('id_motor'));

				$uang_muka = ($harga_dp * 100) / $harga;

				$this->m_kriteria->edit_nilai($id_evaluasi, $this->parameter_uangmuka($uang_muka));
			}elseif ($key1 == 2) { // kriteria 3 (Kemampuan)
				$pendapatan_konsumen = $this->input->post('pendapatan_konsumen');
				$pendapatan_pasangan = $this->input->post('pendapatan_pasangan');
				$pengeluaran_tanggungan = $this->input->post('pengeluaran_tanggungan');
				$angsurang_perbulan =  $this->input->post('angsurang_perbulan');

				$iir = ($angsurang_perbulan * 100) / ($pendapatan_konsumen + $pendapatan_pasangan - $pengeluaran_tanggungan);

				$this->m_kriteria->edit_nilai($id_evaluasi, $this->parameter_kemampuan($iir));
			}
		}
		
		/* foreach($this->db->get('kriteria')->result_array() as $key => $value) {
			$nilai = array(
				'id_konsumen' => $id_konsumen,
				'id_kriteria' => $value['id_kriteria'],
				'nilai' => $this->input->post('nilai_kriteria['.$key.']')
			);

			$id_evaluasi = $this->m_kriteria->tambah_nilai($nilai);

			if($value['id_kriteria'] == 1) {
				$total_subnilai = 0;
				foreach($this->input->post('subnilai_kriteria') as $key => $value) {
					$sub_nilai = array(
						'id_evaluasi' => $id_evaluasi,
						'subnilai' => $value
					);

					$this->m_kriteria->tambah_subnilai($sub_nilai);

					$total_subnilai += $value;
				}

				$this->m_kriteria->edit_nilai($id_evaluasi, $this->parameter_nilai($total_subnilai));
			}elseif ($value['id_kriteria'] == 2) {
				$harga = $this->m_motor->ambil_harga($this->input->post('id_motor'));
				$harga_dp = $this->m_motor->ambil_harga_dp($this->input->post('id_motor'));

				$uang_muka = ($harga_dp * 100) / $harga;

				$this->m_kriteria->edit_nilai($id_evaluasi, $this->parameter_uangmuka($uang_muka));
			}elseif ($value['id_kriteria'] == 3) {
				$pendapatan_konsumen = $this->input->post('pendapatan_konsumen');
				$pendapatan_pasangan = $this->input->post('pendapatan_pasangan');
				$pengeluaran_tanggungan =$this->input->post('pengeluaran_tanggungan');
				$angsurang_perbulan =  $this->input->post('angsurang_perbulan');

				$iir = ($angsurang_perbulan * 100) / ($pendapatan_konsumen + $pendapatan_pasangan - $pengeluaran_tanggungan);

				$this->m_kriteria->edit_nilai($id_evaluasi, $this->parameter_kemampuan($iir));
			}
		} */

		print_r(($this->input->post('nilai_kriteria')));

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Konsumen Berhasil Ditambahkan!</div>');

		redirect('daftar_konsumen');
	}

	public function edit_konsumen($id_konsumen)
	{
		$data['title'] = "Form Edit Konsumen";
		$data['active'] = "daftar_konsumen";
		$data['id_konsumen'] = $id_konsumen;
		$data['daftar_konsumen'] = $this->m_konsumen->ambil_konsumen_byid($id_konsumen);
		$data['motor'] = $this->m_motor->ambil_motor();
		$data['nilai'] = $this->m_kriteria->ambil_nilai_byid($id_konsumen);
		$data['subnilai'] = $this->m_kriteria->ambil_subnilai_byid($this->m_kriteria->ambil_id_evaluasi($id_konsumen));
		$data['kriteria'] = $this->m_kriteria->ambil_kriteria_sebagian();
		$data['sub_kriteria'] = $this->m_kriteria->ambil_subkriteria();

		$this->compose_view('admin/edit_konsumen', $data);
	}

	public function edit_konsumen_form($id_konsumen) {
		date_default_timezone_set('Asia/Jakarta');

		$data = array(
			'id_motor' => $this->input->post('id_motor'),
			'nama_konsumen' => $this->input->post('nama_konsumen'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama' => $this->input->post('agama'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'agama' => $this->input->post('agama'),
			// 'tanggal_pembelian' => date('Y-m-d'),
			'pendapatan_konsumen' => $this->input->post('pendapatan_konsumen'),
			'pendapatan_pasangan' => $this->input->post('pendapatan_pasangan'),
			'pengeluaran_tanggungan' => $this->input->post('pengeluaran_tanggungan'),
			'angsurang_perbulan' => $this->input->post('angsurang_perbulan')
		);

		$this->m_konsumen->edit_konsumen($id_konsumen, $data);

		foreach ($this->input->post('nilai_kriteria') as $key1 => $nilai_kriteria) {
			if($key1 == 0) { // kriteria 1 (Kepribadian)
				$total_subnilai = 0;
				$id_subnilai = $this->input->post('id_subnilai');
				$id_evaluasi = $this->input->post('id_evaluasi');
				foreach($this->input->post('subnilai_kriteria') as $key2 => $value) {
					$sub_nilai = array(
						'id_evaluasi' => $id_evaluasi,
						'subnilai' => $value
					);

					$this->m_kriteria->edit_subnilai($id_subnilai, $value);

					$total_subnilai += $value;
					$id_subnilai++;
				}
				$this->m_kriteria->edit_nilai($id_evaluasi, $this->parameter_nilai($total_subnilai));
			}elseif ($key1 == 1) { // kriteria 2 (Uang Muka)
				$id_evaluasi++;
				$harga = $this->m_motor->ambil_harga($this->input->post('id_motor'));
				$harga_dp = $this->m_motor->ambil_harga_dp($this->input->post('id_motor'));

				$uang_muka = ($harga_dp * 100) / $harga;

				$this->m_kriteria->edit_nilai($id_evaluasi, $this->parameter_uangmuka($uang_muka));
			}elseif ($key1 == 2) { // kriteria 3 (Kemampuan)
				$id_evaluasi++;
				$pendapatan_konsumen = $this->input->post('pendapatan_konsumen');
				$pendapatan_pasangan = $this->input->post('pendapatan_pasangan');
				$pengeluaran_tanggungan = $this->input->post('pengeluaran_tanggungan');
				$angsurang_perbulan =  $this->input->post('angsurang_perbulan');

				$iir = ($angsurang_perbulan * 100) / ($pendapatan_konsumen + $pendapatan_pasangan - $pengeluaran_tanggungan);

				$this->m_kriteria->edit_nilai($id_evaluasi, $this->parameter_kemampuan($iir));
			}

			if($key1 > 2) {
				foreach ($this->input->post('id_evaluasi1') as $a => $id_evaluasi1) {
					foreach ($this->input->post('id_kriteria1') as $b => $id_kriteria1) {
						if($a == $b && ($key1+1) == $id_kriteria1) {
								$this->m_kriteria->edit_nilai($id_evaluasi1, $nilai_kriteria);
						}
					}	
				}
			}
		}

		/* foreach($this->db->get('kriteria')->result_array() as $key => $value) {

			$this->m_kriteria->edit_nilai_full($id_konsumen, $value['id_kriteria'], $this->input->post('nilai_kriteria['.$key.']'));

			if($value['id_kriteria'] == 1) {
				$total_subnilai = 0;
				$id_subnilai = $this->input->post('id_subnilai');
				$id_evaluasi = $this->input->post('id_evaluasi');
				foreach($this->input->post('subnilai_kriteria') as $key => $value) {

					$this->m_kriteria->edit_subnilai($id_subnilai, $value);

					$total_subnilai += $value;
					$id_subnilai++;
				}

				$this->m_kriteria->edit_nilai($id_evaluasi, $this->parameter_nilai($total_subnilai));
			}
		} */

		print_r(($this->input->post('id_kriteria1[]')));

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Konsumen Berhasil Diperbarui!</div>');

		redirect('daftar_konsumen');
	}

	public function hapus_konsumen($id_konsumen)
	{
		$this->m_konsumen->hapus_konsumen($id_konsumen);
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Konsumen Berhasil Dihapus!</div>');

		redirect('daftar_konsumen');
	}

	public function ubah_status($id_konsumen, $status)
	{
		$this->m_konsumen->edit_konsumen($id_konsumen, array('status' => $status));
		if($status == 1) {
			$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Konsumen Diaktifkan!</div>');
		}else {
			$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Konsumen Dinonaktifkan!</div>');
		}

		redirect('daftar_konsumen');
	}

	public function parameter_nilai($nilai)
	{
		if($nilai == 30) {
			return 5;
		}elseif ($nilai == 25) {
			return 4;
		}elseif ($nilai == 20) {
			return 3;
		}elseif ($nilai == 15) {
			return 2;
		}
	}

	public function parameter_uangmuka($dp)
	{
		if($dp < 15) {
			return 1;
		}elseif ($dp >= 16 && $dp <= 20) {
			return 2;
		}elseif ($dp >= 21 && $dp <= 25) {
			return 3;
		}elseif ($dp >= 26 && $dp <= 30) {
			return 4;
		}elseif ($dp > 30) {
			return 5;
		}
	}

	public function parameter_kemampuan($irr)
	{
		if($irr > 40) {
			return 1;
		}elseif ($irr >= 31 && $irr <= 40) {
			return 2;
		}elseif ($irr >= 21 && $irr <= 30) {
			return 3;
		}elseif ($irr >= 11 && $irr <= 20) {
			return 4;
		}elseif ($irr <= 10) {
			return 5;
		}
	}
}
