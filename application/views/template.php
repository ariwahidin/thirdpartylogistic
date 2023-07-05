<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PK-3PL</title>
	<link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/dist/img/pandurasa_kharisma_pt.png">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/dataTables.checkboxes.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/datatables.min.css">


	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2/animate.min.css">
	<style>
		.swal2-popup {
			font-size: 1.6rem !important;
		}
	</style>
</head>
<style>
	/* Absolute Center Spinner */
	.loading {
		content: 'tunggu';
		position: fixed;
		z-index: 9999;
		height: 2em;
		width: 2em;
		overflow: show;
		margin: auto;
		top: 0;
		left: 0;
		bottom: 0;
		right: 0;
	}

	/* Transparent Overlay */
	.loading:before {
		content: 'tunggu';
		display: block;
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));
		background: -webkit-radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));
	}

	/* :not(:required) hides these rules from IE9 and below */
	.loading:not(:required) {
		/* hide "loading..." text */
		font: 0/0 a;
		color: transparent;
		text-shadow: none;
		background-color: transparent;
		border: 0;
	}

	.loading:not(:required):after {
		content: '';
		display: block;
		font-size: 10px;
		width: 1em;
		height: 1em;
		margin-top: -0.5em;
		-webkit-animation: spinner 150ms infinite linear;
		-moz-animation: spinner 150ms infinite linear;
		-ms-animation: spinner 150ms infinite linear;
		-o-animation: spinner 150ms infinite linear;
		animation: spinner 150ms infinite linear;
		border-radius: 0.5em;
		-webkit-box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
		box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
	}

	/* Animation */

	@-webkit-keyframes spinner {
		0% {
			-webkit-transform: rotate(0deg);
			-moz-transform: rotate(0deg);
			-ms-transform: rotate(0deg);
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
		}

		100% {
			-webkit-transform: rotate(360deg);
			-moz-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			-o-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}

	@-moz-keyframes spinner {
		0% {
			-webkit-transform: rotate(0deg);
			-moz-transform: rotate(0deg);
			-ms-transform: rotate(0deg);
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
		}

		100% {
			-webkit-transform: rotate(360deg);
			-moz-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			-o-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}

	@-o-keyframes spinner {
		0% {
			-webkit-transform: rotate(0deg);
			-moz-transform: rotate(0deg);
			-ms-transform: rotate(0deg);
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
		}

		100% {
			-webkit-transform: rotate(360deg);
			-moz-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			-o-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}

	@keyframes spinner {
		0% {
			-webkit-transform: rotate(0deg);
			-moz-transform: rotate(0deg);
			-ms-transform: rotate(0deg);
			-o-transform: rotate(0deg);
			transform: rotate(0deg);
		}

		100% {
			-webkit-transform: rotate(360deg);
			-moz-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			-o-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}
</style>
<div id="muncul_loading" class=""></div>

<body class="hold-transition skin-black-light sidebar-mini">
	<div id="wadah_loader">
		<div id="loader"></div>
	</div>
	<div class="wrapper">
		<header class="main-header">
			<a href="<?= base_url('dashboard') ?>" class="logo">
				<span class="logo-mini"><img src="<?= base_url() ?>assets/dist/img/pandurasa_kharisma_pt.png" style="max-width:30px;border-radius: 50%" alt=""></span>
				<span class="logo-lg"><b>3PL</b></span>
			</a>
			<nav class="navbar navbar-static-top">
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- User Account -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?= base_url() ?>assets/dist/img/user1234.png" class="user-image">
								<span class="hidden-xs"><?= $this->session->userdata('tpl_fullname') ?></span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-header">
									<img src="<?= base_url() ?>assets/dist/img/user1234.png" class="img-circle">
									<p><?= $this->session->userdata('tpl_fullname') ?>
									</p>
								</li>
								<li class="user-footer">
									<div class="pull-left">
									</div>
									<div class="pull-right">
										<a href="<?= site_url('logout') ?>" class="btn btn-flat bg-red">Sign out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<!-- Left side column -->
		<aside class="main-sidebar">
			<section class="sidebar">
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?= base_url() ?>assets/dist/img/user1234.png" class="img-circle">
					</div>
					<div class="pull-left info">
						<p><?= ucfirst($this->session->userdata('tpl_username')) ?></p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<!-- sidebar menu -->
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">MAIN NAVIGATION</li>
					<li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
						<a href="<?= site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
					</li>
					<li <?= $this->uri->segment(1) == 'tpl/po' ? 'class="active"' : '' ?>>
						<a href="<?= site_url('tpl/po') ?>"><i class="fa fa-folder"></i> <span>Purchase Order</span></a>
					</li>
					<!-- <li class="treeview <?= $this->uri->segment(1) == 'report' ? 'active' : '' ?>">
						<a href="#">
							<i class="fa fa-pie-chart"></i> <span>Reports</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<ul class="treeview-menu">
							<li <?= $this->uri->segment(1) == 'report' && $this->uri->segment(2) == 'sale' ? 'class="active"' : '' ?>>
								<a href="<?= site_url('report/sale') ?>"><i class="fa fa-circle-o"></i> Report 1</a>
							</li>
							<li <?= $this->uri->segment(1) == 'report' && $this->uri->segment(2) == 'sale' ? 'class="active"' : '' ?>>
								<a href="<?= site_url('report/sale') ?>"><i class="fa fa-circle-o"></i> Report 2</a>
							</li>
							<li <?= $this->uri->segment(1) == 'report' && $this->uri->segment(2) == 'sale' ? 'class="active"' : '' ?>>
								<a href="<?= site_url('report/sale') ?>"><i class="fa fa-circle-o"></i> Report 3</a>
							</li>
						</ul>
					</li> -->
				</ul>
			</section>
		</aside>

		<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
		<script src="<?= base_url() ?>assets/js/datatables.min.js"></script>
		<script src="<?= base_url() ?>assets/js/dataTables.checkboxes.min.js"></script>
		<script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
		<script>
			function loadingShow() {
				var div_loading = document.getElementById("muncul_loading");
				div_loading.classList.add("loading");
			}

			function loadingHide() {
				var div_loading = document.getElementById("muncul_loading");
				if (div_loading.classList.contains("loading") == true) {
					div_loading.classList.remove("loading")
				}
			}
		</script>
		<!-- Content Wrapper -->
		<div class="content-wrapper">
			<?php echo $contents ?>
		</div>

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 1.0
			</div>
			<strong> Third Party Logistics</strong></a></strong>
		</footer>

	</div>

	<script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

	<script src="<?= base_url() ?>assets/myjs/myjs.js"></script>
	<script>
		$(document).ready(function() {
			$('#table1').DataTable()
		})
	</script>
	<script>
		var flash = $('#flash').data('flash');
		if (flash) {
			Swal.fire({
				icon: 'success',
				title: 'Success',
				text: flash,
				showClass: {
					popup: 'animate__animated animate__fadeInDown'
				},
				hideClass: {
					pupup: 'animate__animated animate__fadeOutUp'
				}
			})
		}

		$(document).on('click', '#btn-hapus', function(e) {
			e.preventDefault();
			var link = $(this).attr('href');
			Swal.fire({
				title: 'Apakah Anda yakin?',
				text: "Data akan dihapus!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, hapus!',
				showClass: {
					popup: 'animate__animated animate__jackInTheBox'
				},
				hideClass: {
					pupup: 'animate__animated animate__zoomOut'
				}
			}).then((result) => {
				if (result.isConfirmed) {
					window.location = link;
				}
			})
		})
	</script>

</body>

</html>