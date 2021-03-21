<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="<?= base_URL() ?>public/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_URL() ?>public/plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_URL() ?>public/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_URL() ?>public/plugins/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_URL() ?>public/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_URL() ?>public/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="<?= base_URL() ?>public/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="<?= base_URL() ?>public/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"> -->
    <link rel="stylesheet" href="<?= base_URL() ?>public/plugins/iCheck/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?php $usr = $this->db->get_where('tbl_admin', array('username' => $this->session->userdata('username')))->row_array();
    $foto = 'default.jpg';
    if ($usr['foto'] && file_exists('public/img/' . $usr['foto'])) {
        $foto = $usr['foto'];
    } ?>
</head>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="javascript:void(0)" class="logo">
                <span class="logo-mini"><b>P</b>A</span>
                <span class="logo-lg"><b>PANEL</b> ADMIN</span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="javascript:void(0)" class="sidebar-toggle" data-toggle="push-menu" role="button"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= base_URL() . 'public/img/' . $foto ?>" class="user-image" alt="Foto Profil"><span class="hidden-xs"><?= $usr['nama_admin'] ?></span></a>
                            <ul class="dropdown-menu">
                                <!--User image -->
                                <li class="user-header"><img src="<?= base_URL() . 'public/img/' . $foto ?>" class="img-circle" alt="Foto Profil">
                                    <p><strong><?= $usr['nama_admin'] ?></strong><small>Administrator</small></p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left"><a href="<?= base_URL() ?>admin/profil_saya" class="btn btn-default btn-flat">Profil Saya</a></div>
                                    <div class="pull-right"><a href="<?= base_URL() ?>auth/keluar" class="btn btn-default btn-flat">Keluar</a></div>
                                </li>
                            </ul>
                        </li>
                        <!--Control Sidebar Toggle Button -->
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image"><img src="<?= base_URL() . 'public/img/' . $foto ?>" class="img-circle" alt="Foto Profil"></div>
                    <div class="pull-left info">
                        <p><?= $usr['nama_admin'] ?></p><a href="javascript:void(0)"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU UTAMA</li>
                    <li <?php if ($this->uri->segment(2) == "dashboard") {
                            echo 'class="active"';
                        } ?>><a href="<?= base_URL() ?>admin/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                    <li <?php if ($this->uri->segment(2) == "mahasiswa" || $this->uri->segment(2) == "mahasiswa_tambah" || $this->uri->segment(2) == "mahasiswa_edit" || $this->uri->segment(2) == "dosen" || $this->uri->segment(2) == "dosen_tambah" || $this->uri->segment(2) == "dosen_edit" || $this->uri->segment(2) == "user" || $this->uri->segment(2) == "user_tambah" || $this->uri->segment(2) == "user_edit") {
                            echo 'class="treeview active"';
                        } else {
                            echo 'class="treeview"';
                        } ?>><a href="javascript:void(0)"><i class="fa fa-database"></i> <span>Master Data</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                            <li <?php if ($this->uri->segment(2) == "mahasiswa" || $this->uri->segment(2) == "mahasiswa_tambah" || $this->uri->segment(2) == "mahasiswa_edit") {
                                    echo 'class="active"';
                                } ?>><a href="<?= base_URL() ?>admin/mahasiswa"><i class="fa fa-users"></i> Mahasiswa</a></li>
                            <li <?php if ($this->uri->segment(2) == "dosen" || $this->uri->segment(2) == "dosen_tambah" || $this->uri->segment(2) == "dosen_edit") {
                                    echo 'class="active"';
                                } ?>><a href="<?= base_URL() ?>admin/dosen"><i class="fa fa-user-md"></i> Dosen</a></li>
                            <li <?php if ($this->uri->segment(2) == "user" || $this->uri->segment(2) == "user_tambah" || $this->uri->segment(2) == "user_edit") {
                                    echo 'class="active"';
                                } ?>><a href="<?= base_URL() ?>admin/user"><i class="fa fa-user"></i> Admin</a></li>
                        </ul>
                    </li>
                    <li <?php if ($this->uri->segment(2) == "matkul" || $this->uri->segment(2) == "matkul_tambah" || $this->uri->segment(2) == "matkul_edit") {
                            echo 'class="active"';
                        } ?>><a href="<?= base_URL() ?>admin/matkul"><i class="fa fa-book"></i> <span>Mata Kuliah</span></a></li>
                    <li <?php if ($this->uri->segment(2) == "nilai" || $this->uri->segment(2) == "nilai_tambah" || $this->uri->segment(2) == "nilai_edit") {
                            echo 'class="active"';
                        } ?>><a href="<?= base_URL() ?>admin/nilai"><i class="fa fa-calculator"></i> <span>Nilai</span></a></li>
                    <li class="header">MENU PENGGUNA</li>
                    <li <?php if ($this->uri->segment(2) == "profil_saya") {
                            echo 'class="active"';
                        } ?>><a href="<?= base_URL() ?>admin/profil_saya"><i class="fa fa-user-circle text-aqua"></i> <span>Profil Saya</span></a></li>
                    <li><a href="<?= base_URL() ?>auth/keluar"><i class="fa fa-sign-out text-red"></i> <span>Keluar</span></a></li>
                </ul>
            </section>
        </aside>