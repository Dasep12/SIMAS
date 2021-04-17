<?php


class Logout extends CI_Controller
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
        $this->session->sess_destroy();
        redirect('Login');
    }
}