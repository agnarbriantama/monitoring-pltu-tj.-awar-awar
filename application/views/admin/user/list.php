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

				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('success'); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php $this->session->unset_userdata('success') ?>
				<?php endif; ?>

				<?php if ($this->session->flashdata('berhasil')) : ?>
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('berhasil'); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php $this->session->unset_userdata('berhasil') ?>
				<?php endif; ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a class="btn btn-primary" href="<?php echo site_url('admin/User/input') ?>"><i class="fas fa-plus"></i> Tambah User</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover text-center table-striped" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Lengkap</th>
										<th>Username</th>
										<th>Password</th>
										<th>Email</th>
										<th>Nama Tim</th>
										<th>Nomor HP</th>
										<th>Level</th>
										<th>Foto</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($User as $akun) : ?>
										<tr>
											<td class="10">
												<?php echo $no++ ?>
											</td>
											<td width="200">
												<?php echo $akun->full_name ?>
											</td>
											<td class="200">
												<?php echo $akun->username ?>
											</td>
											<td type="password">
												<?php echo $akun->password ?>
											</td>
											<td>
												<?php echo $akun->email ?>
											</td>
											<td>
												<?php echo $akun->nama_tim ?>
											</td>
											<td width="150">
												<?php echo $akun->phone ?>
											</td>
											<td>
											<?php echo $akun->nama_level ?>
											</td>
											<td width="150">
											<img src="<?= base_url('assets/imguser/' . $akun->gambar_user) ?>" width="70px" height="50px">
											</td>

											<td width="250">
												<a href="<?php echo site_url('admin/User/edit/' . $akun->user_id) ?>" class="btn btn-small text-primary"><i class="fas fa-edit"></i> Ubah</a>
												<a onclick="deleteConfirm('<?php echo site_url('admin/User/delete/' . $akun->user_id) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
											</td>
										</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
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

	<script>
		function deleteConfirm(url) {
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
	</script>
</body>

</html>
