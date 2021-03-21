 <div class="content-wrapper">
     <section class="content-header">
         <h1>Data Admin<small>Master Data</small></h1>
         <ol class="breadcrumb">
             <li><a href="<?= base_URL() ?>admin/dashboard"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
             <li><i class="fa fa-database"></i>&nbsp; Master Data</li>
             <li class="active"><i class="fa fa-user"></i>&nbsp; Data Admin</li>
         </ol>
     </section>
     <section class="content">
         <?php if ($this->session->flashdata('simpan')) {
                echo "<div class='callout callout-success' id='alert'><h4><i class='icon fa fa-check'></i>&nbsp; BERHASIL</h4><p>" . $this->session->flashdata('simpan') . "</p></div>";
            } else if ($this->session->flashdata('gagal')) {
                echo "<div class='callout callout-danger' id='alert'><h4><i class='icon fa fa-ban'></i>&nbsp; GAGAL</h4><p>" . $this->session->flashdata('gagal') . "</p></div>";
            } else if ($this->session->flashdata('salah')) {
                echo "<div class='callout callout-warning' id='alert'><h4><i class='icon fafa-warning'></i>&nbsp; PERINGATAN</h4><p>" . $this->session->flashdata('salah') . "</p></div>";
            } ?>
         <div class="box box-primary">
             <div class="box-header">
                 <h3 class="box-title"><a href="<?= base_URL() ?>admin/user_tambah" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i>&nbsp; Tambah</a></h3>
             </div>
             <div class="box-body">
                 <table id="example1" class="table table-bordered table-striped">
                     <thead>
                         <tr>
                             <th width="10%">
                                 <center>NO</center>
                             </th>
                             <th>
                                 <center>FOTO</center>
                             </th>
                             <th>
                                 <center>USERNAME</center>
                             </th>
                             <th>NAMA</th>
                             <th width="15%">
                                 <center>AKSI</center>
                             </th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $no = 1;
                            foreach ($adm as $a) : ?><?php $foto = 'default.jpg';
                                                        if ($a->foto && file_exists('public/img/' . $a->foto)) {
                                                            $foto = $a->foto;
                                                        } ?><tr>
                             <td align="center"><?= $no ?>.</td>
                             <td align="center"><img src="<?= base_URL() . 'public/img/' . $a->foto ?>" class="img-circle" alt="foto profil" style="height: 40px; width: 40px" /></td>
                             <td align="center"><?= $a->username ?></td>
                             <td><?= $a->nama_admin ?></td>
                             <td align="center"><?php if ($a->username == $this->session->userdata('username')) { ?><span class="label label-primary">Ini User Kamu</span><?php } else { ?><a href="<?= base_URL() ?>admin/user_edit/<?= $a->username ?>" class="btn btn-xs btn-warning btn-flat" title="Edit Data"><i class="fa fa-edit"></i></a><a href="<?= base_URL() ?>admin/user_hapus/<?= $a->username ?>" onclick="return confirm('Kamu yakin ingin menghapus data ini ?')" class="btn btn-xs btn-danger btn-flat" title="Hapus Data"><i class="fa fa-trash"></i></a><?php } ?></td>
                         </tr>
                     <?php $no++;
                            endforeach; ?></tbody>
                 </table>
             </div>
         </div>
 </div>
 </section>
 </div>