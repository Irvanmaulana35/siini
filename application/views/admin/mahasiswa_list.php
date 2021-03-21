<div class="content-wrapper">
    <section class="content-header">
        <h1>Data Mahasiswa<small>Master Data</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_URL() ?>admin/dashboard"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li><i class="fa fa-database"></i>&nbsp; Master Data</li>
            <li class="active"><i class="fa fa-users"></i>&nbsp; Data Mahasiswa</li>
        </ol>
    </section>
    <section class="content">
        <?php if ($this->session->flashdata('simpan')) {
            echo "<div class='callout callout-success' id='alert'><h4><i class='icon fa fa-check'></i>&nbsp; BERHASIL</h4><p>" . $this->session->flashdata('simpan') . "</p></div>";
        } else if ($this->session->flashdata('gagal')) {
            echo "<div class='callout callout-danger' id='alert'><h4><i class='icon fa fa-ban'></i>&nbsp; GAGAL</h4><p>" . $this->session->flashdata('gagal') . "</p></div>";
        } else if ($this->session->flashdata('salah')) {
            echo "<div class='callout callout-warning' id='alert'><h4><i class='icon fa fa-warning'></i>&nbsp; PERINGATAN</h4><p>" . $this->session->flashdata('salah') . "</p></div>";
        } ?>

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><a href="<?= base_URL() ?>admin/mahasiswa_tambah" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i>&nbsp; Tambah</a></h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="10%">
                                <center>NO</center>
                            </th>
                            <th>
                                <center>NIM</center>
                            </th>
                            <th>
                                <center>NAMA</center>
                            </th>
                            <th>
                                <center>FOTO</center>
                            </th>
                            <th>
                                <center>JENIS KELAMIN</center>
                            </th>
                            <th>
                                <center>JURUSAN</center>
                            </th>
                            <th>
                                <center>JENJANG</center>
                            </th>
                            <th width="15%">
                                <center>AKSI</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($mhs as $m) : ?>
                            <?php $foto = 'default.jpg';
                            if ($m->foto && file_exists('public/img/' . $m->foto)) {
                                $foto = $m->foto;
                            } ?><tr>
                                <td align="center"><?= $no++ ?>.</td>
                                <td align="center"><?= $m->nim ?></td>
                                <td align="center"><?= $m->nama_mhs ?></td>
                                <td align="center"><img src="<?= base_URL() . 'public/img/' . $foto ?>" class="img-circle" alt="foto profil" style="height: 100px; width: 100px" /></td>
                                <td align="center"><?= $m->jk_mhs ?></td>
                                <td align="center"><?= $m->jurusan_mhs ?></td>
                                <td align="center"><?= $m->jenjang_mhs ?></td>
                                <td align="center"><a href="<?= base_URL() ?>admin/mahasiswa_edit/<?= $m->nim ?>" class="btn btn-xs btn-warning btn-flat" title="Edit Data"><i class="fa fa-edit"></i></a><a href="<?= base_URL() ?>admin/mahasiswa_hapus/<?= $m->nim ?>" onclick="return confirm('Kamu yakin ingin menghapus data ini ?')" class="btn btn-xs btn-danger btn-flat" title="Hapus Data"><i class="fa fa-trash"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>
</section>
</div>