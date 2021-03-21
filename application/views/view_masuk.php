<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SIINI | Masuk</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="<?= base_URL() ?>public/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="<?= base_URL() ?>public/login/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_URL() ?>public/plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_URL() ?>public/plugins/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?= base_URL() ?>public/login/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?= base_URL() ?>public/plugins/iCheck/square/blue.css">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-box-body">
			<div class="login-logo"><a href="<?= base_URL() ?>"><b>SIINI</b></a>
				<p class="login-box-msg" style="font-size: 20px"><i>Sistem Informasi Input Nilai</i></p>
			</div>
			<?php if ($this->session->flashdata('berhasil')) {
				echo '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i> &nbsp; ' . $this->session->flashdata('berhasil') . '</div>';
			} else if ($this->session->flashdata('gagal')) {
				echo '<div class="alert alert-danger alert-dismissable"><i class="fa fa-remove"></i> &nbsp; ' . $this->session->flashdata('gagal') . '</div>';
			} ?><?= form_open('auth/cekmasuk') ?><div class="form-group has-feedback"><input type="text" class="form-control" name="username" maxlength="20" placeholder="NIM / NID" required autofocus><span class="glyphicon glyphicon-user form-control-feedback"></span></div>
			<div class="form-group has-feedback"><input type="password" class="form-control" name="password" maxlength="50" placeholder="Password" required autofocus><span class="glyphicon glyphicon-lockform-control-feedback"></span></div>
			<hr>
			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox icheck"><label><input type="checkbox">&nbsp;&nbsp; Ingat Aku ?</label></div>
				</div>
				<!--/.col -->
				<div class="col-xs-4"><button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Masuk &nbsp;<i class="fa fa-sign-in"></i></button></div>
				<!--/.col -->
			</div><?= form_close() ?>
		</div>
		<hr>
		<div class="text-center">Hak Cipta &copy; <?= date('Y') ?> &nbsp; <a href="<?= base_URL() ?>"><strong>SIINI (Sistem Informasi Input Nilai)</strong></a></div>
		<hr>
	</div>

	<script src="<?= base_URL() ?>public/plugins/jquery/dist/jquery.min.js"></script>
	<script src="<?= base_URL() ?>public/login/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_URL() ?>public/plugins/iCheck/icheck.min.js"></script>
	<script>
		$(function() {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%'
			});
		});
	</script>
</body>

</html>