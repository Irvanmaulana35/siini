<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        sesiDosen();
        $this->load->model('m_mahasiswa');
        $this->load->model('m_dosen');
        $this->load->model('m_matkul');
        $this->load->model('m_nilai');
    }
    public function index()
    {
        redirect('dosen/dashboard', 'refresh');
    }
    public function dashboard()
    {
        $data = array('title' => 'Dashboard | Panel Dosen SIINI');
        $this->load->view('dosen/header', $data);
        $this->load->view('dosen/dashboard');
        $this->load->view('dosen/footer');
    }
    public function nilai()
    {
        $nid = $this->session->userdata('nid');
        $data = array(
            'title' => 'Daftar Nilai Mahasiswa | Panel Dosen SIINI',
            'nil'   => $this->db->query("SELECT * FROM tbl_nilai WHERE nid = '$nid'")->result()
        );
        $this->load->view('dosen/header', $data);
        $this->load->view('dosen/nilai_list');
        $this->load->view('dosen/footer');
    }

    public function nilai_tambah()
    {
        if (isset($_POST['submit'])) {
            $this->m_nilai->simpan();
            $this->session->set_flashdata('simpan', 'Nilai Mahasiswa baru berhasil tersimpan ...');
            redirect('dosen/nilai');
        } else {
            $nid = $this->session->userdata('nid');
            $data = array(
                'title' => 'Transkasi Nilai | Panel Dosen SIINI',
                'mhs'   => $this->m_mahasiswa->data(),
                'mtk'   => $this->db->query("SELECT * FROM tbl_matakuliah WHERE nid = '$nid'")->result()
            );
            $this->load->view('dosen/header', $data);
            $this->load->view('dosen/nilai_tambah');
            $this->load->view('dosen/footer');
        }
    }

    public function profil_saya()
    {
        if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto();
            $this->m_dosen->update($uploadFoto);
            $this->session->set_flashdata('simpan', 'Profil kamu diperbaharui ...');
            redirect('dosen/profil_saya');
        } else {
            $data = array('title'  => 'Profil Saya | Panel Dosen SIINI', 'ps'    => $this->db->get_where('tbl_dosen', array('nid' => $this->session->userdata('nid')))->row_array());
            $this->load->view('dosen/header', $data);
            $this->load->view('dosen/profil_saya');
            $this->load->view('dosen/footer');
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
