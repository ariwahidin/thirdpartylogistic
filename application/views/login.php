<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login 3PL</title>
	<link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/dist/img/pandurasa_kharisma_pt.png">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2/animate.min.css">
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style>
	.swal2-popup {
		font-size: 1.6rem !important;
	}
</style>

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

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<span class="logo-lg"><img src="<?= base_url() ?>assets/dist/img/pandurasa_kharisma_pt.png" style="max-width:75px;border-radius: 5%;" alt=""></span>
			<br>
			<b style="font-size: 32px;">THIRD PARTY LOGISTICS</b>
		</div>
		<div class="login-box-body">
			<p class="login-box-msg">Sign in to start your session</p>
			<form method="post" id="loginForm">
				<div class="form-group has-feedback">
					<input type="text" name="username" class="form-control" placeholder="Username" required autofocus autocomplete="off">
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" name="password" class="form-control" placeholder="Password" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8"></div>
					<div class="col-xs-4">
						<button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#loginForm').submit(function(event) {
				event.preventDefault(); //Menghentikan pengiriman form secara default
				var formData = $(this).serialize(); //Mengambil data form
				$.ajax({
					url: '<?= base_url('login') ?>',
					method: 'POST',
					data: formData,
					dataType: 'JSON',
					success: function(response) {
						loadingShow()
						if (response.success == true) {
							loadingHide()
							Swal.fire({
								icon: 'success',
								title: 'Login Berhasil',
								showConfirmButton: false,
								timer: 1500
							}).then(() => {
								// Replace halaman saat ini dengan halaman tujuan
								window.location.replace('<?= base_url('dashboard') ?>');
							})
						} else {
							loadingHide()
							Swal.fire({
								icon: 'warning',
								title: 'Login Gagal',
								text: 'Username dan password salah',
							})
						}
					},
					error: function(xhr, status, error) {
						console.log(error);
					}
				});
			})
		})

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

</body>

</html>