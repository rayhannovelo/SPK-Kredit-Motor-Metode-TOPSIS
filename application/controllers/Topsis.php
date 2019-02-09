<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topsis extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->simple_login->login_super(2,3);
		$this->load->model('m_konsumen');
		$this->load->model('m_kriteria');
		$this->load->model('m_motor');
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
		$data['title'] = "Topsis";
		$data['active'] = "topsis";
		$data['daftar_konsumen'] = $this->m_konsumen->ambil_konsumen_aktif();
		$data['daftar_kriteria'] = $this->m_kriteria->ambil_kriteria();
		$data['jumlah_konsumen'] = $this->m_konsumen->jumlah_konsumen_aktif();
		$data['jumlah_kriteria'] = $this->m_kriteria->ambil_jumlah_kriteria();
		$data['nilai_kriteria'] = $this->m_kriteria->ambil_nilai();
        
        foreach($data['daftar_konsumen'] as $key1 => $p) { 
            foreach($data['daftar_kriteria'] as $key2 =>$nk) { 
                $data['nilai'][$key1][$key2] = $this->m_kriteria->ambil_nilai_bykriteria($p['id_konsumen'], $nk['id_kriteria']);
            }
        }

		$this->compose_view('admin/topsis', $data);
	}

	public function topsis($konsumen, $jumlah_konsumen, $kriteria, $nilai_kriteria, $jumlah_kriteria) {

        foreach($data['daftar_konsumen'] as $key1 => $p) { 
            foreach($data['daftar_kriteria'] as $key2 =>$nk) { 
                $data['nilai'][$key1][$key2] = $this->m_kriteria->ambil_nilai_bykriteria($p['id_konsumen'], $nk['id_kriteria']);
            }
        }

        $temp = 0;
        for($i = 0; $i < $jumlah_kriteria; $i++) { 
            for ($j = 0; $j < $jumlah_konsumen; $j++) { 
                $temp = $temp + pow($nilai[$j][$i], 2);
            }
            $pembagi[] = sqrt($temp);
            $temp = 0;
        }

        foreach($konsumen as $key => $p) { 
            foreach($nilai_kriteria as $nk) { 
	            if($p['id_konsumen'] == $nk['id_konsumen']) {
	        		for($i = 0; $i < $jumlah_kriteria; $i++) { 
	                   $ternomalisasi[$key][] = $nilai[$key][$i] / $pembagi[$i];
	                } 
           		}
           	}
       	}

       	foreach($konsumen as $key => $p) { 
            foreach($nilai_kriteria as $nk) { 
	            if($p['id_konsumen'] == $nk['id_konsumen']) {
	        		for($i = 0; $i < $jumlah_kriteria; $i++) { 
                        $ternomalisasi_terbobot[$key][] = $ternomalisasi[$key][$i] * $kriteria[$i]['bobot'];
                    } 
           		}
           	}
       	}

        $temp_positif = 0;
        $temp_negatif = 99999;
        for($i = 0; $i < $jumlah_kriteria; $i++) { 
            for ($j = 0; $j < $jumlah_konsumen; $j++) {
                if($temp_positif < $ternomalisasi_terbobot[$j][$i]){
                    $temp_positif = $ternomalisasi_terbobot[$j][$i];
                }
                if($temp_negatif > $ternomalisasi_terbobot[$j][$i]){
                    $temp_negatif = $ternomalisasi_terbobot[$j][$i];
                }
            }
            $a_positif[] = $temp_positif;
            $a_negatif[] = $temp_negatif;
            $temp_positif = 0;
            $temp_negatif = 99999;
        }

        $temp_positif = 0;
        $temp_negatif = 0;
        for($i = 0; $i < $jumlah_konsumen; $i++) { 
            for ($j = 0; $j < $jumlah_kriteria; $j++) { 
                $temp_positif = $temp_positif + (pow(($a_positif[$j] - $ternomalisasi_terbobot[$i][$j]), 2));
                $temp_negatif = $temp_negatif + (pow(($a_negatif[$j] - $ternomalisasi_terbobot[$i][$j]), 2));
            }
            $d_positif[] = sqrt($temp_positif);
            $d_negatif[] = sqrt($temp_negatif);
            $temp_positif = 0;
            $temp_negatif = 0;
        }

        for($i = 0; $i < $jumlah_konsumen; $i++) { 
            $v[] = $d_negatif[$i] / ($d_negatif[$i] + $d_positif[$i]);
        }

        return $v;
	}
}
