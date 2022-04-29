<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login Admin Website Monitoring Gardu</title>
	<link rel="icon" href="<?php echo base_url('assets/logoweb/logourlbaru.png') ?>" type="image/x-icon">

	<!-- Bootstrap core CSS-->
	<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/style.css') ?>" rel="stylesheet">
</head>

<body>
	<?php if ($this->session->flashdata('error')) : ?>
		<div class="alert alert-danger" role="alert">
			<?php echo $this->session->flashdata('error'); ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php $this->session->unset_userdata('error') ?>
	<?php endif; ?>
	<div class="d-flex justify-content-center align-items-center login-container">
		<form action="<?= base_url('auth/login'); ?>" method="POST" class="login-form text-center">
			<h1 class="mb-5 font-weight-light text-uppercase">Login Monitoring Gardu</h1>
			<?php echo $this->session->flashdata('login'); ?>
			<div class="form-group">
				<label class="d-flex flex-row" for="username">Username</label>
				<input type="text" name="username" class="form-control rounded-pill form-control-lg" placeholder="Username" required>
			</div>
			<div class="form-group">
				<label class="d-flex flex-row" for="password">Password</label>
				<input type="password" class="form-control rounded-pill form-control-lg" name="password" placeholder="*******" required>
			</div>
			<!-- <div class="forgot-link form-group d-flex justify-content-between align-items-center">
				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="remember">
					<label class="form-check-label" for="remember">Remember Password</label>
				</div>
				<a href="#">Forgot Password?</a>
			</div> -->
			<button type="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase">Log in</button>
		</form>
	</div>

</body>

</html>
