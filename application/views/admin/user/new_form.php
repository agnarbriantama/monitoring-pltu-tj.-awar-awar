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

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/User/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('admin/User/add'); ?>" method="POST" enctype="multipart/form-data">

							<div class="form-group">
								<label for="username">Username</label>
								<input class="form-control" type="text" name="username" placeholder="Username" required />
							</div>

							<div class="form-group">
								<label for="password">Password</label>
								<input class="form-control" type="password" name="password" placeholder="Password" required />
							</div>

							<div class="form-group">
								<label for="email">Email</label>
								<input class="form-control" type="email" name="email" placeholder="Email" required />
							</div>

							<div class="form-group">
								<label for="full_name">Full Name</label>
								<input class="form-control" type="text" name="full_name" placeholder="Full Name" required />
							</div>

							<div class="form-group">
								<label for="phone">Nomor HP</label>
								<input class="form-control" type="number" name="phone" placeholder="Nomor HP" required />
							</div>

							<div class="form-group">
								<label for="level_id">Level</label>
								<select class="form-control" id="level_id">
									<option>Super Admin</option>
									<option>Ketua Tim</option>
									<option>Anggota Tim</option>
								</select>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

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

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
