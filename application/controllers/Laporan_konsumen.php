<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_konsumen extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->simple_login->cek_login(2);
        $this->load->model('m_konsumen');
    }

    public function compose_view($main_view, $data)
    {
        $this->load->view('pimpinan/header', $data);
        $this->load->view($main_view, $data);
        $this->load->view('pimpinan/footer');
    }

    public function index()
    {
        $data['title'] = "Laporan Konsumen";
        $data['active'] = "laporan_konsumen";
        // $data['laporan_konsumen'] = $this->m_konsumen->ambil_laporan_konsumen();

        foreach($this->m_konsumen->ambil_laporan_konsumen() as $row)
        {
            $data['laporan_konsumen'][]=(float)$row->Januari;
            $data['laporan_konsumen'][]=(float)$row->Februari;
            $data['laporan_konsumen'][]=(float)$row->Maret;
            $data['laporan_konsumen'][]=(float)$row->April;
            $data['laporan_konsumen'][]=(float)$row->Mei;
            $data['laporan_konsumen'][]=(float)$row->Juni;
            $data['laporan_konsumen'][]=(float)$row->Juli;
            $data['laporan_konsumen'][]=(float)$row->Agustus;
            $data['laporan_konsumen'][]=(float)$row->September;
            $data['laporan_konsumen'][]=(float)$row->Oktober;
            $data['laporan_konsumen'][]=(float)$row->November;
            $data['laporan_konsumen'][]=(float)$row->Desember;
        }

        $this->compose_view('pimpinan/laporan_konsumen', $data);
    }
}
