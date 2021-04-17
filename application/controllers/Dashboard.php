<?php

class Dashboard extends CI_Controller
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
            'title'             => 'Dashboard',
            'terpinjam'         => $this->m_inventori->getData(array('status' => 'dipinjam'), 'pinjam_brg')->num_rows(),
            'user'              => $this->m_inventori->getData(array('id' => $this->session->userdata('id')), 'akun')->row(),
            'elektronik'        => $this->m_inventori->getData(array('kategori' => 'Elektronik'), 'tbl_barang')->num_rows(),
            'non_elektronik'    => $this->m_inventori->getData(array('kategori' => 'Non-Elektronik'), 'tbl_barang')->num_rows(),
            'telat'             => $this->m_inventori->range()
        );
        $this->template->load('template/template', 'dashboard', $data);
    }
}
