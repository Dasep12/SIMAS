<?php

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (empty($this->session->userdata("id"))) {
            redirect("Logout");
        }
    }

    public function index()
    {
        $data = array(
            'title'     => 'Laporan',
            'user'              => $this->m_inventori->getData(array('id' => $this->session->userdata('id')), 'akun')->row(),
        );
        $this->template->load('template/template', 'laporan', $data);
    }


    //view report 
    public function report()
    {
        $menu  = $this->input->post('menu');
        //jika menu 1 maka load laporan master barang 
        if ($menu == 1) {
            $data = array(
                'data'      => $this->m_inventori->get("tbl_barang")->result()
            );
            $this->load->view('reportmasterbarang', $data);
        } else if ($menu == 2) {
            //jika menu 2 maka load laporan peminjaman barang
            $data = array(
                'data'      => $this->m_inventori->getData(array('status' => 'kembali'), "pinjam_brg")->result()
            );
            $this->load->view('reportpeminjaman', $data);
        }
    }
}
