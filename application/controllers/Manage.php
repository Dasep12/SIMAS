<?php

class Manage extends CI_Controller
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
            'title'             => 'Manage Profile',
            'user'              => $this->m_inventori->getData(array('id' => $this->session->userdata('id')), 'akun')->row(),
            'data'              => $this->m_inventori->getData(['id' => 3], 'akun')->row()
        );
        $this->template->load('template/template', 'profile', $data);
    }

    public function update()
    {
        $id             = $this->input->post('id');
        $password       = $this->input->post('password');
        $nama           = $this->input->post('nama');
        $level          = $this->input->post('level');

        if ($password == "" || $password == null) {
            $data = array(
                'nama'      => $nama,
                'role'      => $level
            );
            $update = $this->m_inventori->update('akun', $data, ['id' => $id]);
            if ($update > 0) {
                echo 'data update';
            } else {
                echo 'tidak ada perubahan';
            }
        } else if ($password != "" || $password != null) {
            $data = array(
                'nama'      => $nama,
                'role'      => $level,
                'password'  => md5($password)
            );
            // print_r($data);
            $update = $this->m_inventori->update('akun', $data, ['id' => $id]);
            if ($update > 0) {
                echo 'data update';
            } else {
                echo 'tidak ada perubahan';
            }
        }
    }
}
