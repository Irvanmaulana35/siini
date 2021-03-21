<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_mahasiswa extends CI_Model
{

    public $table = "tbl_mahasiswa";
    public function chekLogin($nim, $password)
    {
        $this->db->where('nim',  $nim);
        $this->db->where('password',  SHA1($password));
        $dosen = $this->db->get($this->table)->row_array();
        return $dosen;
    }
    public function data()
    {
        $query = "SELECT * FROM $this->table ORDER BY nim ASC";
        return $this->db->query($query)->result();
    }
    public function simpan($foto)
    {
        $data = array(
            'nim'               => $this->input->post('nim'),
            'password'          => SHA1($this->input->post('password')),
            'nama_mhs'          => $this->input->post('nama_mhs'),
            'jk_mhs'            => $this->input->post('jk_mhs'),
            'thn_akademik'      => $this->input->post('thn_akademik'),
            'jurusan_mhs'       => $this->input->post('jurusan_mhs'),
            'jenjang_mhs'       => $this->input->post('jenjang_mhs'),
            'kelas_program'     => $this->input->post('kelas_program'),
            'foto'              => $foto
        );
        $this->db->insert($this->table, $data);
    }

    public function update($foto)
    {
        if (empty($foto) and $this->input->post('password') == '') {
            $data = array('nama_mhs'       => $this->input->post('nama_mhs'), 'jk_mhs'         => $this->input->post('jk_mhs'), 'thn_akademik'   => $this->input->post('thn_akademik'), 'jurusan_mhs'    => $this->input->post('jurusan_mhs'), 'jenjang_mhs'    => $this->input->post('jenjang_mhs'), 'kelas_program'  => $this->input->post('kelas_program'));
        } else if (empty($foto) and $this->input->post('password') != '') {
            $data = array('password'       => SHA1($this->input->post('password')), 'nama_mhs'       => $this->input->post('nama_mhs'), 'jk_mhs'         => $this->input->post('jk_mhs'), 'thn_akademik'   => $this->input->post('thn_akademik'), 'jurusan_mhs'    => $this->input->post('jurusan_mhs'), 'jenjang_mhs'    => $this->input->post('jenjang_mhs'), 'kelas_program'  => $this->input->post('kelas_program'));
        } else if ($this->input->post('password') == '') {
            $data = array('nama_mhs'       => $this->input->post('nama_mhs'), 'jk_mhs'         => $this->input->post('jk_mhs'), 'thn_akademik'   => $this->input->post('thn_akademik'), 'jurusan_mhs'    => $this->input->post('jurusan_mhs'), 'jenjang_mhs'    => $this->input->post('jenjang_mhs'), 'kelas_program'  => $this->input->post('kelas_program'), 'foto'           => $foto);
        } else if ($this->input->post('password') != '') {
            $data = array('password'       => SHA1($this->input->post('password')), 'nama_mhs'       => $this->input->post('nama_mhs'), 'jk_mhs'         => $this->input->post('jk_mhs'), 'thn_akademik'   => $this->input->post('thn_akademik'), 'jurusan_mhs'    => $this->input->post('jurusan_mhs'), 'jenjang_mhs'    => $this->input->post('jenjang_mhs'), 'kelas_program'  => $this->input->post('kelas_program'), 'foto'           => $foto);
        }
        $nim = $this->input->post('nim');
        $this->db->where('nim', $nim);
        $this->db->update($this->table, $data);
    }
}
