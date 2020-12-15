<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_perpus'); //Load the Model here   
        if ($this->session->userdata('status') != "login" && $this->uri->segment('2') != 'daftar' && $this->uri->segment('2') != 'signup') {
            // echo $this->uri->segment(2);exit;
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

    function ganti_password()
    {
        $this->load->view('member/ganti_password');
    }

    function update_password()
    {
        $pass_baru = $this->input->post('pass_baru');
        $pass_confirm = $this->input->post('pass_confirm');

        $this->form_validation->set_rules('pass_baru', 'Password Baru Harus Diisi', 'required');
        $this->form_validation->set_rules('pass_confirm', 'Password tidak sesuai', 'required');
        if ($this->form_validation->run() == true && $pass_baru == $pass_confirm) {
            $data = array('password' => md5($pass_baru));
            $where = array('email' => $this->session->userdata('email'));
            $res = $this->M_perpus->update_data('anggota', $data, $where);
            if ($res) {
                redirect(base_url() . 'member/ganti_password?status=success');
            } else {
                redirect(base_url() . 'member/ganti_password?status=error');
            }
        } else {
            redirect(base_url() . 'member/ganti_password?status=failed');
        }
    }

    function daftar()
    {
        $this->load->view('daftar');
    }

    function signup()
    {
        $nama = $this->input->post('nama');
        $no_telp = $this->input->post('no_telp');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $alamat = $this->input->post('alamat');

        $this->form_validation->set_rules('nama', 'Nama Anggota', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('conf_password', 'Password', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == TRUE) {

            $data = array(
                'nama_anggota' => $nama,
                'alamat' => $alamat,
                'email' => $email,
                'no_telp' => $no_telp,
                'password' => md5($password)
            );
            $res = $this->M_perpus->insert_data('anggota', $data);
            if ($res) {
                redirect(base_url());
            } else {
                redirect(base_url() . 'member/daftar?pesan=error');
            }
        } else {
            echo validation_errors();exit;
            $this->session->set_flashdata('form_errors', validation_errors());
            redirect(base_url() . 'member/daftar?pesan=error');
        }
    }

    public function pinjam()
    {
        $id_anggota = $this->session->userdata('id');
        $id_buku = $this->input->post('buku');
        $tgl_pinjam = $this->input->post('tgl_pinjam');
        $tgl_kembali = $this->input->post('tgl_kembali');
        $denda = str_replace('Rp. ', '', $this->input->post('denda'));
        $denda = str_replace('.', '', $denda);
        $this->form_validation->set_rules('anggota', 'Anggota', 'required');
        $this->form_validation->set_rules('buku', 'Buku', 'required');
        $this->form_validation->set_rules('tgl_pinjam', 'Tanggal pinjam', 'required');
        $this->form_validation->set_rules('tgl_kembali', 'Tanggal kembali', 'required');
        $this->form_validation->set_rules('denda', 'Denda harian', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'tanggal_pencatatan' => date('Y-m-d'),
                'id_user' => $id_anggota,
                'id_buku' => $id_buku,
                'tanggal_pinjam' => $tgl_pinjam,
                'tanggal_kembali' => $tgl_kembali,
                'denda' => $denda,
                'status_peminjaman' => 1,
            );
            $res = $this->M_perpus->insert_data('transaksi', $data);
            if ($res) {
                redirect(base_url() . 'admin/tambah_transaksi/?status=success');
            } else {
                redirect(base_url() . 'admin/tambah_transaksi/?status=failed');
            }
        } else {
            $this->session->set_flashdata('form_errors', validation_errors());
            redirect(base_url() . 'admin/tambah_transaksi/?status=failed');
        }
    }

    function pinjam_buku($id)
    {
        $data['buku'] = $this->M_perpus->katalog_buku($id)->row();
        $this->load->view('member/pinjam-buku', $data);
    }

    function save_pinjam()
    {
        $id = $this->input->post('id');
        $tgl_pinjam = $this->input->post('pinjam');
        $tgl_kembali = $this->input->post('kembali');
        $this->form_validation->set_rules('pinjam', 'Tanggal pinjam', 'required');
        $this->form_validation->set_rules('kembali', 'Tanggal kembali', 'required');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'tanggal_pencatatan' => date('Y-m-d'),
                'id_user' => $this->session->userdata('id'),
                'id_buku' => $id,
                'tanggal_pinjam' => $tgl_pinjam,
                'tanggal_kembali' => $tgl_kembali,
            );
            $res = $this->M_perpus->insert_data('transaksi', $data);
            if ($res) {
                redirect(base_url() . 'member/peminjaman/?status=success');
            } else {
                redirect(base_url() . 'member/buku/?status=failed');
            }
        } else {
            $this->session->set_flashdata('form_errors', validation_errors());
            redirect(base_url() . 'member/pinjam_buku/?status=failed');
        }
    }

    function peminjaman()
    {
        $w = 'id_user = ' . $this->session->userdata('id');
        $data['trans'] = $this->M_perpus->transaksi($w)->result();
        $this->load->view('member/peminjaman', $data);
    }

    function batal_pinjam($id)
    {
        if (!empty($id)) {
            $data = array('batal' => 1);
            $where = array('id_pinjam' => $id);
            $res = $this->M_perpus->update_data('transaksi', $data, $where);
            echo $res;
            exit;
            if ($res ==  true) {
                $w = 'id_user = ' . $this->session->userdata('id');
                $data['trans'] = $this->M_perpus->transaksi($w)->result();
                $this->load->view('member/peminjaman', $data);
            }
        }
    }
}
