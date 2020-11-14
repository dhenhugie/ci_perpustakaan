<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_perpus'); //Load the Model here   
        if ($this->session->userdata('status') != "login") {
            redirect(base_url() . '?pesan=error');
        }
    }

    public function index()
    {
        $this->buku();
    }

    public function buku()
    {
        $data['buku'] = $this->M_perpus->get_data('buku')->result();
        $this->load->view('member/buku', $data);
    }

    public function pinjam(){
        
    }
}
