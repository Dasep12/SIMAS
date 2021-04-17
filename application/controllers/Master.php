<?php


class Master extends CI_Controller
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
            'master'        => $this->m_inventori->get("tbl_barang")->result(),
            'title'         => 'Master',
            'user'          => $this->m_inventori->getData(array('id' => $this->session->userdata('id')), 'akun')->row(),
        );
        $this->template->load("template/template", "master", $data);
    }
    public function detail()
    {
        $id = $this->input->post('id');
        $data = array(
            'data'  => $this->m_inventori->getData(array('id' => $id), "tbl_barang")->row(),

        );
        $this->load->view('detailbarang', $data);
    }
    public function del($id)
    {
        $del = $this->m_inventori->delete(array('id' => $id), "tbl_barang");
        if ($del > 0) {
            $this->session->set_flashdata('info', 'data terhapus');
            redirect('Master');
        } else {
            $this->session->set_flashdata('error', 'data gagal terhapus');
            redirect('Master');
        }
    }

    public function formedit($id)
    {
        $data = array(
            'title'     => 'Form Edit',
            'data'  => $this->m_inventori->getData(array('id' => $id), "tbl_barang")->row(),
        );
        $this->template->load('template/template', 'formedit', $data);
        // $this->load->view('formedit');
    }

    public function update()
    {
        $id = $this->input->post('id');
        $kode_brg = $this->input->post('kode_brg');
        $nama_brg = $this->input->post('nama_brg');
        $tgl_beli = $this->input->post('tgl_beli');
        $status = $this->input->post('status');
        $kondisi = $this->input->post('kondisi');
        $posisi = $this->input->post('posisi');
        $kategori = $this->input->post('kategori');
        $data = array(
            'nama_brg'          => $nama_brg,
            'kode_brg'          => $kode_brg,
            'kategori'          => $kategori,
            'tgl_beli'          => $tgl_beli,
            'status'            => $status,
            'kondisi'           => $kondisi,
            'posisi'            => $posisi
        );
        $update = $this->m_inventori->update("tbl_barang", $data, array('id' => $id));
        if ($update > 0) {
            echo "update successfull";
        } else {
            echo "failed";
        }
    }
}
