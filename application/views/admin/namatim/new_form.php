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
				<form method="post" action="<?= base_url('admin/namatim/proses') ?>">
					<div class="card mb-3">
						<div class="card-header">
							<a href="<?php echo site_url('admin/NamaTim/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
						</div>
						<div class="card-body">

							<div class="form-group">
								<label for="nama_tim">Nama Tim</label>
								<input class="form-control" type="text" name="nama_tim" required />
							</div>

							<input class="btn btn-success float-right" type="submit" value="Save" />

				</form>

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
