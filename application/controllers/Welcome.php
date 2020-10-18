<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_perpus'); //Load the Model here   

	}
	public function index()
	{
		$this->load->view('login');
	}
	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() != false) {
			$where = array('username' => $username, 'password' => md5($password));
			$whereanggota = array('email' => $username, 'password' => md5($password));

			$dataadmin = $this->M_perpus->edit_data($where, 'admin');
			$dataanggota = $this->M_perpus->edit_data($whereanggota, 'anggota');
			//=====================================================================
			$d = $this->M_perpus->edit_data($where, 'admin')->row();
			$a = $this->M_perpus->edit_data($whereanggota, 'anggota')->row();

			if ($dataadmin->num_rows() > 0) {
				$session = array('id' => $d->id_admin, 'nama' => $d->nama_admin, 'username' => $d->username, 'status' =>'login', 'role'=>'admin');
				$this->session->set_userdata($session);
				redirect(base_url() . 'admin');
			} else if ($dataanggota->num_rows() > 0) {
				$session = array('id' => $d->id_anggota, 'nama' => $d->nama_anggota, 'email' => $d->email, 'status' =>'login','role'=>'member');
				$this->session->set_userdata($session);
				redirect(base_url() . 'member');
			} else {
				header("location:" . base_url() . "?pesan=error");
			}
		} else {
			$this->session->set_flashdata('alert', 'Anda Belum mengisi username atau password');
			$this->load->view('login');
		}
	}
}
