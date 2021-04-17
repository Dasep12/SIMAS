<?php


class Terlambat extends CI_Controller
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
            'terlambat'     => $this->m_inventori->dataTerlambat(),
            'title'         => 'Terlambat Pengembalian',
            'user'          => $this->m_inventori->getData(array('id' => $this->session->userdata('id')), 'akun')->row(),
        );
        $this->template->load("template/template", "terlambat", $data);
    }
}
