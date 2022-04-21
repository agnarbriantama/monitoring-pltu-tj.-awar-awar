<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("ketua/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("ketua/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("ketua/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("ketua/_partials/breadcrumb.php") ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('ketua/Gardu/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('ketua/Gardu/add'); ?>" method="POST" enctype="multipart/form-data">

							<div class="form-group">
								<label for="nama_gardu">Nama Gardu</label>
								<input class="form-control" type="text" name="nama_gardu" placeholder="Nama Gardu" required />
							</div>

							<div class="form-group custom-file">
								<label class="custom-file-label" for="gambar_gardu">Foto Gardu  <i class="fa fa-upload"></i></label>
								<input class="form-control custom-file-input" type="file" name="gambar_gardu" placeholder="Foto Gardu" required />
							</div>

							<input class="btn btn-success mt-2" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* kolom wajib terisi semua
						<br>
						* maksimal ukuran file foto 2 MB
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("ketua/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->


		<?php $this->load->view("ketua/_partials/scrolltop.php") ?>
		<?php $this->load->view("ketua/_partials/modal.php") ?>
		<?php $this->load->view("ketua/_partials/js.php") ?>

</body>

</html>
