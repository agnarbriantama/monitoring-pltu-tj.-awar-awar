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
						<a class="btn btn-primary" href="<?php echo site_url('admin/gardu/input') ?>"><i class="fas fa-plus"></i> Tambah Data</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover text-center table-striped" id="dataTables" width="100%" cellspacing="0">
								<thead>
									<tr class="text-center">
										<th style="max-width: 30px;">No</th>
										<th style="max-width: 200px;">Nama Gardu</th>
										<th>Foto Gardu</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($Gardu as $gardu) : ?>
										<tr>
											<td class="10"><br>
												<?php echo $no++ ?>
											</td>
											<td class="100"><br>
												<?php echo $gardu->nama_gardu ?>
											</td>
											<td width="200">
												<img src="<?php echo base_url('assets/imgpantauan/' . $gardu->gambar_gardu) ?>" height="80px" width="80px" alt="foto">
											</td>

											<td width="250"><br>
												<a href="<?php echo site_url('admin/Gardu/edit/' . $gardu->id_gardu) ?>" class="btn btn-small btn-outline-primary mb-3 w-60"><i class="fas fa-edit"></i> Ubah</a>
												<a onclick="deleteConfirm('<?php echo site_url('admin/gardu/delete/' . $gardu->id_gardu) ?>')" href="#!" class="btn btn-small btn-outline-danger mb-3 w-60"><i class="fas fa-trash"></i> Hapus</a>
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
				lengthMenu: [
					[5, 10, 25, 50, -1],
					[5, 10, 25, 50, "All"]
				],
				"bInfo": false,
				// "scrollX": true,
				// "scrollY": "350px",
				"scrollCollapse": true,
				"paging": true,
				lengthChange: true,
			});
			
			table.buttons().container()
				.appendTo('#dataTables_wrapper .col-md-6:eq(0)');
		});
	</script>
</body>

</html>
