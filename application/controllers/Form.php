<?php

date_default_timezone_set('Asia/Jakarta');

class Form extends CI_Controller
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
            'master'        =>  $this->m_inventori->get("tbl_barang")->result(),
            'title'         => "Form Pinjam",
            'user'              => $this->m_inventori->getData(array('id' => $this->session->userdata('id')), 'akun')->row(),
        );
        $this->template->load("template/template", "formpinjam", $data);
    }

    public function pinjam()
    {
        $id                    = $this->input->post('idbarang');
        $idpinjam              = $this->input->post('idpinjam');
        $kdbarang              = $this->input->post('kdbarang');
        $namabarang            = $this->input->post('nama_brg');
        $kategori              = $this->input->post('kategori_brg');
        $peminjam              = $this->input->post('peminjam');
        $tgl_kembali           = $this->input->post('tgl_kembali');
        $tgl_pinjam            = $this->input->post('tgl_pinjam');
        $posisi_sebelumnya     = $this->input->post('posisi_sebelumnya');
        $status_sebelumnya     = $this->input->post('status_sebelumnya');
        $petugas               = $this->input->post('petugas');
        //data array peminjaman barang
        $dataPinjam     = array(
            'idpinjam'              => $idpinjam,
            'peminjam'              => $peminjam,
            'nama_brg'              => $namabarang,
            'kode_brg'              => $kdbarang,
            'kategori_brg'          => $kategori,
            'tgl_pinjam'            => $tgl_pinjam,
            'tgl_kembali'           => $tgl_kembali,
            'petugas'               => $petugas,
            'status'                => "dipinjam",
            'idbarang'              => $id,
            'status_sebelumnya'     => $status_sebelumnya,
            'posisi_sebelumnya'     => $posisi_sebelumnya,
        );

        //data update status barang di master
        $dataUpdate  = array(
            'status'        => 'dipinjam',
            'posisi'        => $peminjam
        );

        $updateStatus = $this->m_inventori->update("tbl_barang", $dataUpdate, array('id' => $id));
        if ($updateStatus > 0) {
            $input = $this->m_inventori->input($dataPinjam, "pinjam_brg");
            if ($input > 0) {
                echo "successfull";
            } else {
                echo "failed";
            }
        } else {
            echo "failed";
        }
    }
}
