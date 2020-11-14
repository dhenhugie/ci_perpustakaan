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
        $data['transaksi'] = $this->M_perpus->get_query('SELECT * FROM transaksi LIMIT 6')->result();
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
            $res = $this->M_perpus->update_data('admin', $data, $where);
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
        $data['rak'] = array('Rak 1', 'Rak 2');
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
            redirect(base_url() . 'admin/tambah_buku/?status=failed');
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

    function edit_buku()
    {
        $id = $this->uri->segment(3);
        $buku = $this->M_perpus->katalog_buku($id)->result();
        $data['kategori'] = $this->M_perpus->get_data('kategori')->result();
        $data['rak'] = array('Rak 1', 'Rak 2');
        $data['id'] = $id;

        foreach ($buku as $key) {
            $data['id'] = $key->id_buku;
            $data['judul'] = $key->judul_buku;
            $data['pengarang'] = $key->pengarang;
            $data['penerbit'] = $key->penerbit;
            $data['isbn'] = $key->isbn;
            $data['nama_kategori'] = $key->nama_kategori;
            $data['id_kategori'] = $key->id_kategori;
            $data['thnterbit'] = $key->tahun_terbit;
            $data['jumlah'] = $key->jumlah_buku;
            $data['lokasi'] = $key->lokasi;
            $data['status'] = $key->status_buku;
            $data['gambar'] = $key->gambar;
        }
        $this->load->view('admin/edit-buku', $data);
    }

    function update_buku()
    {
        $id_buku = $this->input->post('id');
        $kategori = $this->input->post('kategori');
        $judul_buku = $this->input->post('judul');
        $pengarang = $this->input->post('pengarang');
        $penerbit = $this->input->post('penerbit');
        $tahun_terbit = $this->input->post('thnterbit');
        $isbn = $this->input->post('isbn');
        $jumlah_buku = $this->input->post('jumlah');
        $lokasi = $this->input->post('lokasi');
        $status_buku = $this->input->post('status');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('judul', 'Judul Buku', 'required');
        $this->form_validation->set_rules('status', 'Status Buku', 'required');
        if ($this->form_validation->run() != false) {
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['file_name'] = 'gambar' . time();
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $image = $this->upload->data();
                $data = array(
                    'id_kategori' => $kategori,
                    'judul_buku' => $judul_buku,
                    'pengarang' => $pengarang,
                    'penerbit' => $penerbit,
                    'tahun_terbit' => $tahun_terbit,
                    'isbn' => $isbn,
                    'jumlah_buku' => $jumlah_buku,
                    'lokasi' => $lokasi,
                    'status_buku' => $status_buku,
                    'gambar' => $image['file_name']
                );
                $where = array(
                    'id_buku' => $id_buku
                );

                $this->M_perpus->update_data('buku', $data, $where);
                redirect(base_url() . 'admin/buku');
            } else {
                $data = array(
                    'id_kategori' => $kategori,
                    'judul_buku' => $judul_buku,
                    'pengarang' => $pengarang,
                    'penerbit' => $penerbit,
                    'tahun_terbit' => $tahun_terbit,
                    'isbn' => $isbn,
                    'jumlah_buku' => $jumlah_buku,
                    'lokasi' => $lokasi,
                    'status_buku' => $status_buku
                );
                $where = array(
                    'id_buku' => $id_buku
                );
                $this->M_perpus->update_data('buku', $data, $where);
                redirect(base_url() . 'admin/buku');
            }
        }else {
            $this->session->set_flashdata('form_errors', validation_errors());
            redirect(base_url() . 'admin/edit_buku/' . $id_buku . '/?status=failed');
        }
    }

    function anggota()
    {
        $data['anggota'] = $this->M_perpus->get_data('anggota')->result();
        $this->load->view('admin/anggota', $data);
    }

    function tambah_anggota()
    {
        $this->load->view('admin/tambah-anggota');
    }

    function save_anggota()
    {
        $nama = $this->input->post('nama');
        $gender = $this->input->post('gender');
        $no_telp = $this->input->post('no_telp');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $alamat = $this->input->post('alamat');

        $this->form_validation->set_rules('nama', 'Nama Anggota', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelmain', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == TRUE) {

            $data = array(
                'nama_anggota' => $nama,
                'alamat' => $alamat,
                'gender' => $gender,
                'email' => $email,
                'no_telp' => $no_telp,
                'password' => md5($password)
            );
            $res = $this->M_perpus->insert_data('anggota', $data);
            if ($res) {
                redirect(base_url() . 'admin/tambah_anggota/?status=success');
            } else {
                redirect(base_url() . 'admin/tambah_anggota/?status=failed');
            }
        } else {
            $this->session->set_flashdata('form_errors', validation_errors());
            redirect(base_url() . 'admin/tambah_anggota/?status=failed');
        }
    }

    function edit_anggota()
    {
        $id = $this->uri->segment(3);
        $where = array('id_anggota' => $id);
        $anggota = $this->M_perpus->get_data_single('anggota', $where)->result();
        $data['id'] = $id;

        foreach ($anggota as $key) {
            $data['id'] = $key->id_anggota;
            $data['nama'] = $key->nama_anggota;
            $data['alamat'] = $key->alamat;
            $data['no_telp'] = $key->no_telp;
            $data['email'] = $key->email;
            $data['gender'] = $key->gender;
            $data['password'] = $key->password;
        }
        // print_r($data);exit;
        $this->load->view('admin/edit-anggota', $data);
    }

    function update_anggota()
    {
        $this->load->helper('security');
        $id_anggota = $this->input->post('id');
        $nama = $this->input->post('nama');
        $gender = $this->input->post('gender');
        $no_telp = $this->input->post('no_telp');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $password_old = $this->input->post('password_old');
        $password_new = $this->input->post('password_new');
        $alamat = $this->input->post('alamat');
        // echo $this->input->post('password') .' - '. md5($this->input->post('password_old'));exit;
        $this->form_validation->set_rules('nama', 'Nama Anggota', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelmain', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        $this->form_validation->set_rules('password_new', 'Password baru', 'required');
        $this->form_validation->set_rules('password_old', 'Password lama', 'required');
        // $this->form_validation->set_rules('password', 'Password', 'required|md5|trim|xss_clean|matches[password_old]');

        if ($this->form_validation->run() != false && $password == md5($password_old)) {

            $data = array(
                'nama_anggota' => $nama,
                'alamat' => $alamat,
                'gender' => $gender,
                'email' => $email,
                'no_telp' => $no_telp,
                'password' => md5($password_new)
            );
            $where = array(
                'id_anggota' => $id_anggota
            );
            $this->M_perpus->update_data('anggota', $data, $where);
            redirect(base_url() . 'admin/anggota');
        } else {
            $this->session->set_flashdata('form_errors', validation_errors());
            $status = $password == md5($password_old) ? 'failed' : 'failedemail';
            redirect(base_url() . 'admin/edit_anggota/' . $id_anggota . '/?status=' . $status);
        }
    }

    function hapus_anggota($id)
    {
        $where = array('id_anggota' => $id);
        $res = $this->M_perpus->hapus_data('anggota', $where);
        
        redirect(base_url() . 'admin/anggota?status=success');
    }
}
