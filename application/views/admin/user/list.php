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

				<?php if ($this->session->flashdata('fail')) : ?>
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('fail'); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php $this->session->unset_userdata('fail') ?>
				<?php endif; ?>
				
				<?php if ($this->session->flashdata('password')) : ?>
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('password'); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php $this->session->unset_userdata('password') ?>
				<?php endif; ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a class="btn btn-primary" href="<?php echo site_url('admin/User/input') ?>"><i class="fas fa-plus"></i> Tambah User</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover text-center table-striped" id="dataTables" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th class="filterhead">No</th>
										<th class="filterhead">Nama Lengkap</th>
										<th class="filterhead">Username</th>
										<th class="filterhead">Password</th>
										<th class="filterhead">Email</th>
										<th class="filterhead">Nama Tim</th>
										<th class="filterhead">Nomor HP</th>
										<th class="filterhead">Level</th>
										<th class="filterhead"></th>
										<th class="filterhead"></th>
									</tr>
									<tr>
										<th>No</th>
										<th>Nama Lengkap</th>
										<th>Username</th>
										<th>Password</th>
										<th>Email</th>
										<th>Nama Tim</th>
										<th>Nomor HP</th>
										<th>Level</th>
										<th>Foto User</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($User as $akun) : ?>
										<tr>
											<td width="10">
												<?php echo $no++ ?>
											</td>
											<td>
												<?php echo $akun->full_name ?>
											</td>
											<td>
												<?php echo $akun->username ?>
											</td>
											<td type="password">
												<?php
												echo substr($akun->password, 0, 8);
												?>
											</td>
											<td>
												<?php echo $akun->email ?>
											</td>
											<td>
												<?php echo $akun->nama_tim ?>
											</td>
											<td>
												<?php echo $akun->phone ?>
											</td>
											<td>
												<?php echo $akun->nama_level ?>
											</td>
											<td>
												<img src="<?= base_url('assets/imguser/' . $akun->gambar_user) ?>" width="70px" height="50px">
											</td>

											<td width="250">
												<a style="width: 170px;" href="<?php echo site_url('admin/User/edit/' . $akun->user_id) ?>" class="btn btn-small btn-primary text-white mb-3"><i class="fas fa-edit"></i> Ubah</a>
												<a style="width: 170px;" onclick="deleteConfirm('<?php echo site_url('admin/User/delete/' . $akun->user_id) ?>')" href="#!" class="btn btn-small btn-danger text-white mb-3"><i class="fas fa-trash"></i> Hapus</a>
												<a style="width: 170px;" href="<?php echo site_url('admin/User/editpassword/' . $akun->user_id) ?>" class="btn btn-small btn-secondary text-white mb-3"><i class="fas fa-key"></i> Ubah Password</a>
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

	<script>
		$(document).ready(function() {
			var table = $('#dataTables').DataTable({
				"bInfo": false,
				// "scrollX": true,
				// "scrollY": "350px",
				"scrollCollapse": true,
				"paging": true,
				lengthChange: true,
			});
			table.buttons().container()
				.appendTo('#dataTables_wrapper .col-md-6:eq(0)');

			$(".filterhead").not(":eq(8), :eq(9)").each(function(i) {
				var select = $('<select><option value=""></option></select>')
					.appendTo($(this).empty())
					.on('change', function() {
						var term = $(this).val();
						table.column(i).search(term, false, false).draw();
					});
				table.column(i).data().unique().sort().each(function(d, j) {
					select.append('<option value="' + d + '">' + d + '</option>')
				});
			});
		});
	</script>
</body>

</html>
