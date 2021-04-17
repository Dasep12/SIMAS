<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!empty($this->session->userdata("id"))) {
            redirect("Dashboard");
        }
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function auth()
    {
        $iduser   = $this->input->post('iduser');
        $pwd      = $this->input->post('password');

        $datauser  = $this->m_inventori->getData(['id_user' => $iduser, 'password' => md5($pwd)], 'akun');
        if ($datauser->num_rows() > 0) {
            $d  = $datauser->row();
            $this->session->set_userdata('id', $d->id);
            redirect('Dashboard');
        } else {
            $this->session->set_flashdata('failed', 'user tidak ditemukan');
            redirect('Login');
        }
    }
}
