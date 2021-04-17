<?php

class User extends CI_Controller
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
            'title'             => 'Daftar User',
            'master'            => $this->m_inventori->get("akun")->result(),
            'user'              => $this->m_inventori->getData(array('id' => $this->session->userdata('id')), 'akun')->row(),
        );
        $this->template->load('template/template', 'user', $data);
    }

    public function tambah()
    {
        $iduser    = $this->input->post('id_user');
        $data   = array(
            'id_user'       => $iduser,
            'nama'          => $this->input->post('nama'),
            'password'      => md5($this->input->post('password')),
            'role'          => $this->input->post('level'),
        );
        $cekid   = $this->m_inventori->getData(['id_user' => $iduser], 'akun')->num_rows();
        if ($cekid > 0) {
            echo "id user sudah di gunakan";
        } else {
            $save  = $this->m_inventori->input($data, "akun");
            if ($save > 0) {
                echo "saved";
            } else {
                echo "failed";
            }
        }
    }

    public function del($id)
    {
        $del  = $this->m_inventori->delete(['id'  => $id], "akun");
        if ($del > 0) {
            $this->session->set_flashdata('info', 'data terhapus');
            redirect('User');
        } else {
            $this->session->set_flashdata('error', 'data gagal terhapus');
            redirect('User');
        }
    }

    public function detail()
    {
        $id = $this->input->post('id');
        $data = array(
            'data'  => $this->m_inventori->getData(array('id' => $id), "akun")->row(),

        );
        $this->load->view('modaluser', $data);
    }

    public function reset($id)
    {
        $data = array(
            'password'  => md5(123)
        );
        $update = $this->m_inventori->update("akun", $data, ['id' => $id]);
        if ($update > 0) {
            $this->session->set_flashdata('infopwd', 'password di  reset ke 123 ');
            redirect('User');
        } else {
            $this->session->set_flashdata('errorpwd', 'data gagal di reset');
            redirect('User');
        }
    }
}
