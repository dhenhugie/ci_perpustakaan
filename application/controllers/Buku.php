<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url() . '?error');
        }
    }

    function index(){
        $data['buku'] = $this->M_perpus->get_data('buku')->result();
        $data['anggota'] = $this->M_perpus->get_data('anggota')->result();
        // $this->load->view('buku', $data);
    }

    public function katalog_detail(){
        $id = $this->uri->segment(3);
        $buku = $this->M_perpus->katalog_buku($id)->result();

        foreach ($buku as $key) {
            // id_buku, judul_buku, pengarang, penerbit, isbn, gambar, nama_kategori
            $data['id'] = $key->id_buku;
            $data['judul'] = $key->judul_buku;
            $data['pengarang'] = $key->pengarang;
            $data['penerbit'] = $key->penerbit;
            $data['isbn'] = $key->isbn;
            $data['kategori'] = $key->nama_kategori;
        }
        $this->load->view('detail_buku');
    }
}