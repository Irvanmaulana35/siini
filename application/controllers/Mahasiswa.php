<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        sesiMahasiswa();
        $this->load->model('m_mahasiswa');
        $this->load->model('m_dosen');
        $this->load->model('m_matkul');
        $this->load->model('m_nilai');
    }
    public function index()
    {
        redirect('mahasiswa/dashboard', 'refresh');
    }
    public function dashboard()
    {
        $data = array('title' => 'Dashboard | Panel Mahasiswa SIINI');
        $this->load->view('mahasiswa/header', $data);
        $this->load->view('mahasiswa/dashboard');
        $this->load->view('mahasiswa/footer');
    }

    public function nilai()
    {
        $nim = $this->session->userdata('nim');
        $semester = $this->uri->segment(3);
        $data = array('title' => 'Daftar Nilai Mahasiswa | Panel Mahasiswa SIINI', 'nil'  => $this->m_nilai->getNilaiSemester(), 'smt'   => $this->m_nilai->getSemester($semester, $nim),);
        $this->load->view('mahasiswa/header', $data);
        $this->load->view('mahasiswa/nilai_list');
        $this->load->view('mahasiswa/footer');
    }

    public function profil_saya()
    {
        if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto();
            $this->m_mahasiswa->update($uploadFoto);
            $this->session->set_flashdata('simpan', 'Profil kamu diperbaharui ...');
            redirect('mahasiswa/profil_saya');
        } else {
            $data = array('title'  => 'Profil Saya | Panel Mahasiswa SIINI', 'ps'    => $this->db->get_where('tbl_mahasiswa', array('nim' => $this->session->userdata('nim')))->row_array());
            $this->load->view('mahasiswa/header', $data);
            $this->load->view('mahasiswa/profil_saya');
            $this->load->view('mahasiswa/footer');
        }
    }

    public function upload_foto()
    {
        $config['upload_path']          = './public/img/';
        $config['allowed_types']        = 'jpg|jpeg|png|gif|bmp';
        $config['max_size']             = 2048;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('filefoto');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }
}
