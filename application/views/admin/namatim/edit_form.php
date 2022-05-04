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

						<a href="<?php echo site_url('admin/NamaTim/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<?php foreach ($tim as $timm) : ?>

							<form action="<?php echo site_url('admin/NamaTim/edit'); ?>" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="id_tim" value="<?php echo $timm->id_tim; ?>" />

								<div class="form-group">
									<label for="nama_tim">Nama Tim</label>
									<input class="form-control <?php echo form_error('nama_tim') ? 'is-invalid' : '' ?>" type="text" name="nama_tim" placeholder="Nama Tim" value="<?php echo $timm->nama_tim; ?>" />
								</div>
								<input class="btn btn-success" type="submit" name="btn" value="Save" />
							</form>

						<?php endforeach; ?>

					</div>

					<div class="card-footer small text-muted">
						* jika data tidak ada isikan (-)
						<br>
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
