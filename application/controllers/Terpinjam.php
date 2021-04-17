<?php
date_default_timezone_set('Asia/Jakarta');

class Terpinjam extends CI_Controller
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
            'terpinjam'     => $this->m_inventori->getData(array('status' => "dipinjam"), "pinjam_brg")->result(),
            'title'         => 'Barang Terpinjam',
            'user'              => $this->m_inventori->getData(array('id' => $this->session->userdata('id')), 'akun')->row(),
        );
        $this->template->load('template/template', 'terpinjam', $data);
        # code...
    }


    //modal view 
    public function modalpinjam()
    {
        $id  = $this->input->post('id');
        $data = array(
            'data'          => $this->m_inventori->getData(array('id' => $id), "pinjam_brg")->row(),
            'user'           => $this->m_inventori->getData(array('id' => $this->session->userdata('id')), 'akun')->row(),
        );
        $this->load->view('modaldetailpinjam', $data);
    }

    public function back($id, $idbarang)
    {
        //ambil detail barang di pinjam
        $info = $this->m_inventori->getData(array('id' => $id), 'pinjam_brg')->row();
        $dataUpdate = array(
            'status'    => $info->status_sebelumnya,
            'posisi'    => $info->posisi_sebelumnya,
        );
        //update data status
        $dataStatus = array(
            'status'                => "kembali",
            'tgl_pengembalian'      => date('Y-m-d '),
            'jam_kembali'           => date('H:i:s')
        );
        $update  = $this->m_inventori->update("pinjam_brg", $dataStatus, array('id' => $id));
        $update1 = $this->m_inventori->update("tbl_barang", $dataUpdate, array('id' => $idbarang));
        if ($update > 0 && $update1 > 0) {
            $this->session->set_flashdata('info', 'barang kembali');
            redirect('Terpinjam');
        } else {
            $this->session->set_flashdata('error', 'gagal kembali');
            redirect('Terpinjam');
        }
    }
}
