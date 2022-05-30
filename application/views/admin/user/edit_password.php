<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/User/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<?php foreach ($User as $akun) : ?>

							<form action="<?= base_url('admin/user/editpassword/' . $akun->user_id) ?>" method="POST" enctype="multipart/form-data">

								<input type="hidden" name="id" value="<?php echo $akun->user_id; ?>" />

								<div class="form-group">
									<!-- <label for="password">Password <span style="color: red; font-size: 12px; font-style: italic;">(*Optional)</span></label> -->
									<label for="password">Password</label>
									<input minlength="8" maxlength="500" class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" type="password" name="new_password1" id="new_password1" placeholder="Ubah Password" value="" />
									<?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>

								<div class="form-group">
									<!-- <label for="password">Password <span style="color: red; font-size: 12px; font-style: italic;">(*Optional)</span></label> -->
									<label for="password">Konfirmasi Password <span style="color: red; font-size: 12px; font-style: italic;">* Masukkan ulang password</span></label>
									<input minlength="8" maxlength="500" class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" type="password" name="new_password2" id="new_password2" placeholder="Konfirmasi Password" value="" />

								</div>

								<input class="btn btn-success" type="submit" name="btn" value="Save" />
							</form>

						<?php endforeach; ?>

					</div>

					<div class="card-footer small text-muted">
						* kolom wajib terisi semua
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->

		<?php $this->load->view("admin/_partials/scrolltop.php") ?>
		<?php $this->load->view("admin/_partials/modal.php") ?>
		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
