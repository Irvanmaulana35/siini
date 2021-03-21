<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        sesiAdmin();
        $this->load->model('m_mahasiswa');
        $this->load->model('m_dosen');
        $this->load->model('m_admin');
        $this->load->model('m_matkul');
        $this->load->model('m_nilai');
    }
    public function index()
    {
        redirect('admin/dashboard', 'refresh');
    }
    public function dashboard()
    {
        $data = array(
            'title' => 'Dashboard | Panel Admin SIINI', 'mtk'   => $this->db->query("SELECT * FROM tbl_matakuliah")->num_rows(),
            'mhs'   => $this->db->query("SELECT * FROM tbl_mahasiswa")->num_rows(),
            'dsn'   => $this->db->query("SELECT * FROM tbl_dosen")->num_rows(),
            'adm'   => $this->db->query("SELECT * FROM tbl_admin")->num_rows()
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }

    public function mahasiswa()
    {
        $data = array(
            'title' => 'Data Mahasiswa | Panel Admin SIINI',
            'mhs'   => $this->m_mahasiswa->data()
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/mahasiswa_list');
        $this->load->view('admin/footer');
    }
    public function mahasiswa_tambah()
    {
        if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto();
            $this->m_mahasiswa->simpan($uploadFoto);
            $this->session->set_flashdata('simpan', 'Mahasiswa baru berhasil tersimpan ...');
            redirect('admin/mahasiswa');
        } else {
            $data = array('title' => 'Tambah Mahasiswa | Panel Admin SIINI');
            $this->load->view('admin/header', $data);
            $this->load->view('admin/mahasiswa_tambah');
            $this->load->view('admin/footer');
        }
    }
    public function mahasiswa_edit()
    {
        if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto();
            $this->m_mahasiswa->update($uploadFoto);
            $this->session->set_flashdata('simpan', 'Mahasiswa berhasil diperbaharui ...');
            redirect('admin/mahasiswa');
        } else {
            if ($nim = $this->uri->segment(3)) {
                $data = array('title' => 'Edit Mahasiswa | Panel Admin SIINI', 'mhs'    => $this->db->get_where('tbl_mahasiswa', array('nim' => $nim))->row_array());
                $this->load->view('admin/header', $data);
                $this->load->view('admin/mahasiswa_edit');
                $this->load->view('admin/footer');
            } else {
                redirect('admin/mahasiswa');
            }
        }
    }

    public function mahasiswa_hapus()
    {
        if ($nim = $this->uri->segment(3)) {
            if (!empty($nim)) {
                $this->db->where('nim', $nim);
                $this->db->delete('tbl_mahasiswa');
            }
            $this->session->set_flashdata('simpan', 'Mahasiswa berhasil terhapus ...');
            redirect('admin/mahasiswa');
        } else {
            redirect('admin/mahasiswa');
        }
    }

    public function dosen()
    {
        $data = array(
            'title' => 'Data Dosen | Panel Admin SIINI',
            'dsn'   => $this->m_dosen->data()
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/dosen_list');
        $this->load->view('admin/footer');
    }

    public function dosen_tambah()
    {
        if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto();
            $this->m_dosen->simpan($uploadFoto);
            $this->session->set_flashdata('simpan', 'Dosen baru berhasil tersimpan ...');
            redirect('admin/dosen');
        } else {
            $data = array('title' => 'Tambah Dosen | Panel Admin SIINI');
            $this->load->view('admin/header', $data);
            $this->load->view('admin/dosen_tambah');
            $this->load->view('admin/footer');
        }
    }

    public function dosen_edit()
    {
        if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto();
            $this->m_dosen->update($uploadFoto);
            $this->session->set_flashdata('simpan', 'Dosen berhasil diperbaharui ...');
            redirect('admin/dosen');
        } else {
            if ($nid = $this->uri->segment(3)) {
                $data = array(
                    'title'  => 'Edit Dosen | Panel Admin SIINI',
                    'dsn'    => $this->db->get_where('tbl_dosen', array(
                        'nid' => $nid
                    ))->row_array()
                );
                $this->load->view('admin/header', $data);
                $this->load->view('admin/dosen_edit');
                $this->load->view('admin/footer');
            } else {
                redirect('admin/dosen');
            }
        }
    }
    public function dosen_hapus()
    {
        if ($nid = $this->uri->segment(3)) {
            if (!empty($nid)) {
                $this->db->where('nid', $nid);
                $this->db->delete('tbl_dosen');
            }
            $this->session->set_flashdata('simpan', 'Dosen berhasil terhapus ...');
            redirect('admin/dosen');
        } else {
            redirect('admin/dosen');
        }
    }

    public function user()
    {
        $data = array(
            'title' => 'Data Admin | Panel Admin SIINI',
            'adm'   => $this->m_admin->data()
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/admin_list');
        $this->load->view('admin/footer');
    }

    public function user_tambah()
    {
        if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto();
            $this->m_admin->simpan($uploadFoto);
            $this->session->set_flashdata('simpan', 'Admin baru berhasil tersimpan ...');
            redirect('admin/user');
        } else {
            $data = array('title' => 'Tambah Admin | Panel Admin SIINI');
            $this->load->view('admin/header', $data);
            $this->load->view('admin/admin_tambah');
            $this->load->view('admin/footer');
        }
    }

    public function user_edit()
    {
        if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto();
            $this->m_admin->update($uploadFoto);
            $this->session->set_flashdata('simpan', 'Admin berhasil diperbaharui ...');
            redirect('admin/user');
        } else {
            if ($username = $this->uri->segment(3)) {
                $data = array(
                    'title'  => 'Edit Admin | Panel Admin SIINI',
                    'adm'    => $this->db->get_where(
                        'tbl_admin',
                        array('username' => $username)
                    )->row_array()
                );
                $this->load->view('admin/header', $data);
                $this->load->view('admin/admin_edit');
                $this->load->view('admin/footer');
            } else {
                redirect('admin/user');
            }
        }
    }

    public function user_hapus()
    {
        if ($username = $this->uri->segment(3)) {
            if (!empty($username)) {
                $this->db->where('username', $username);
                $this->db->delete('tbl_admin');
            }
            $this->session->set_flashdata('simpan', 'Admin berhasil terhapus ...');
            redirect('admin/user');
        } else {
            redirect('admin/user');
        }
    }

    public function matkul()
    {
        $data = array(
            'title' => 'Data Mata Kuliah | Panel Admin SIINI',
            'mtk'   => $this->m_matkul->data()
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/matkul_list');
        $this->load->view('admin/footer');
    }

    public function matkul_tambah()
    {
        if (isset($_POST['submit'])) {
            $this->m_matkul->simpan();
            $this->session->set_flashdata('simpan', 'Mata Kuliah baru berhasil tersimpan ...');
            redirect('admin/matkul');
        } else {
            $data = array('title' => 'Tambah Mata Kuliah | Panel Admin SIINI', 'dsn'   => $this->m_dosen->data());
            $this->load->view('admin/header', $data);
            $this->load->view('admin/matkul_tambah');
            $this->load->view('admin/footer');
        }
    }

    public function matkul_edit()
    {
        if (isset($_POST['submit'])) {
            $this->m_matkul->update();
            $this->session->set_flashdata('simpan', 'Mata Kuliah berhasil diperbaharui ...');
            redirect('admin/matkul');
        } else {
            if ($kode_mk = $this->uri->segment(3)) {
                $data = array(
                    'title'  => 'Edit Mata Kuliah | Panel Admin SIINI',
                    'mtk'    => $this->db->get_where(
                        'tbl_matakuliah',
                        array('kode_mk' => $kode_mk)
                    )->row_array(), 'dsn'   => $this->m_dosen->data()
                );
                $this->load->view('admin/header', $data);
                $this->load->view('admin/matkul_edit');
                $this->load->view('admin/footer');
            } else {
                redirect('admin/matkul');
            }
        }
    }
    public function matkul_hapus()
    {
        if ($kode_mk = $this->uri->segment(3)) {
            if (!empty($kode_mk)) {
                $this->db->where('kode_mk', $kode_mk);
                $this->db->delete('tbl_matakuliah');
            }
            $this->session->set_flashdata('simpan', 'Mata Kuliah berhasil terhapus ...');
            redirect('admin/matkul');
        } else {
            redirect('admin/matkul');
        }
    }
    public function nilai()
    {
        $data = array(
            'title' => 'Daftar Nilai Mahasiswa | Panel Admin SIINI',
            'nil'   => $this->m_nilai->data()
        );
        $this->load->view('admin/header', $data);
        $this->load->view('admin/nilai_list');
        $this->load->view('admin/footer');
    }
    public function nilai_tambah()
    {
        if (isset($_POST['submit'])) {
            $this->m_nilai->simpan();
            $this->session->set_flashdata('simpan', 'Nilai Mahasiswa baru berhasil tersimpan ...');
            redirect('admin/nilai');
        } else {
            $data = array('title' => 'Transkasi Nilai | Panel Admin SIINI', 'mhs'   => $this->m_mahasiswa->data(), 'mtk'   => $this->m_matkul->data());
            $this->load->view('admin/header', $data);
            $this->load->view('admin/nilai_tambah');
            $this->load->view('admin/footer');
        }
    }
    public function nilai_edit()
    {
        if (isset($_POST['submit'])) {
            $this->m_nilai->update();
            $this->session->set_flashdata('simpan', 'Nilai berhasil diperbaharui ...');
            redirect('admin/nilai');
        } else {
            if ($nim = $this->uri->segment(3)) {
                $data = array('title'  => 'Edit Nilai Mahasiswa | Panel Admin SIINI', 'nil'    => $this->db->get_where('tbl_nilai', array('nim' => $nim))->row_array());
                $this->load->view('admin/header', $data);
                $this->load->view('admin/nilai_edit');
                $this->load->view('admin/footer');
            } else {
                redirect('admin/nilai');
            }
        }
    }

    public function profil_saya()
    {
        if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto();
            $this->m_admin->update($uploadFoto);
            $this->session->set_flashdata('simpan', 'Profil kamu diperbaharui ...');
            redirect('admin/profil_saya');
        } else {
            $data = array(
                'title'  => 'Profil Saya | Panel Admin SIINI',
                'ps'    => $this->db->get_where(
                    'tbl_admin',
                    array(
                        'username' => $this->session->userdata('username')
                    )
                )->row_array()
            );
            $this->load->view('admin/header', $data);
            $this->load->view('admin/profil_saya');
            $this->load->view('admin/footer');
        }
    }
    public function upload_foto()
    {
        $config['upload_path']          = './public/img/';
        $config['allowed_types']     = 'jpg|jpeg|png|gif|bmp';
        $config['max_size']             = 2048;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('filefoto');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }
}
