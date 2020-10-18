<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $data['jmlbuku'] = $this->M_perpus->get_data('buku')->num_rows();
        $data['jmlanggota'] = $this->M_perpus->get_data('anggota')->num_rows();
        $data['jmltransaksi'] = $this->M_perpus->get_data('transaksi')->num_rows();
        $data['anggota'] = $this->M_perpus->get_query('SELECT * FROM ANGGOTA LIMIT 6')->result();
        $data['buku'] = $this->M_perpus->get_query('SELECT * FROM BUKU LIMIT 6')->result();
        $this->load->view('admin/home', $data);
    }

    function logout()
    {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key) {
            if ($key != 'id' && $key != 'nama' && $key != 'username' && $key != 'email' && $key != 'status' && $key != 'role') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect('welcome');
    }

    function ganti_password()
    {
        $this->load->view('ganti_password');
    }

    function update_password()
    {
        $pass_baru = $this->input->post('pass_baru');
        $pass_confirm = $this->input->post('pass_confirm');

        $this->form_validation->set_rules('pass_baru', 'Password Baru Harus Diisi', 'required');
        $this->form_validation->set_rules('pass_confirm', 'Password tidak sesuai', 'required');
        if ($this->form_validation->run() == true && $pass_baru == $pass_confirm) {
            $data = array('password' => md5($pass_baru));
            $where = array('id_admin' => $this->session->userdata('id'));
            $res = $this->M_perpus->update_data($data, $where, 'admin');
            if ($res) {
                redirect(base_url() . 'admin/ganti_password?status=success');
            } else {
                redirect(base_url() . 'admin/ganti_password?status=error');
            }
        } else {
            redirect(base_url() . 'admin/ganti_password?status=failed');
        }
    }

    function buku()
    {
        $data['buku'] = $this->M_perpus->get_data('buku')->result();
        $this->load->view('admin/buku', $data);
    }

    function tambah_buku()
    {
        $data['kategori'] = $this->M_perpus->get_data('kategori')->result();
        $this->load->view('admin/tambah-buku', $data);
    }

    function save_buku()
    {
        $tglinput = date('Y-m-d');
        $id_kategori = $this->input->post('kategori');
        $judul = $this->input->post('judul');
        $pengarang = $this->input->post('pengarang');
        $penerbit = $this->input->post('penerbit');
        $thnterbit = $this->input->post('thnterbit');
        $isbn = $this->input->post('isbn');
        $jumlah = $this->input->post('jumlah');
        $lokasi = $this->input->post('lokasi');
        $status = $this->input->post('status');

        $this->form_validation->set_rules('kategori', 'Kategori Buku', 'required');
        $this->form_validation->set_rules('judul', 'Judul Buku', 'required');
        $this->form_validation->set_rules('status', 'Status Buku', 'required');
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'jpeg|png|jpg';
            $config['max_sized'] = '2048';
            $config['file_name'] = 'gambar' . time();
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $image = $this->upload->data();
                $data = array(
                    'id_kategori' => $id_kategori,
                    'judul_buku' => $judul,
                    'pengarang' => $pengarang,
                    'penerbit' => $penerbit,
                    'tahun_terbit' => $thnterbit,
                    'isbn' => $isbn,
                    'jumlah_buku' => $jumlah,
                    'lokasi' => $lokasi,
                    'gambar' => $image['file_name'],
                    'tgl_input' => $tglinput,
                    'status_buku' => $status
                );
                $res = $this->M_perpus->insert_data('buku', $data);
                if ($res) {
                    redirect(base_url() . 'admin/tambah_buku/?status=success');
                } else {
                    redirect(base_url() . 'admin/tambah_buku/?status=failed');
                }
            } else {
                redirect(base_url() . 'admin/tambah_buku/?status=imagefailed');
            }
        } else {
            $this->session->set_flashdata('form_errors', validation_errors());
            redirect(base_url() . 'admin/tambah_/?status=failed');
        }
    }

    function hapus_buku($id, $gambar)
    {
        $where = array('id_buku' => $id);
        $res = $this->M_perpus->hapus_data('buku', $where);
        $path = './upload/' . $gambar;
        if (is_file($path)) {
            unlink($path);
            echo 'File has been deleted';
        }
        redirect(base_url() . 'admin/buku?status=success');
    }
}
