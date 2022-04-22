<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("ketua/_partials/head.php") ?>
</head>

<body id=" page-top">

	<?php $this->load->view("ketua/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("ketua/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">
				<?php $this->load->view("ketua/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('success'); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php $this->session->unset_userdata('success') ?>
				<?php endif; ?>

				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php $this->session->unset_userdata('berhasil') ?>
				<?php endif; ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover table-striped text-center" id="dataTables" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Gardu</th>
										<th>Suhu</th>
										<th>Arus</th>
										<th>Cosphi</th>
										<th>Tanggal</th>
										<th>Tegangan</th>
										<th>Gambar</th>
										<th>Status</th>
										<th>Lokasi</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($PantauanHarian as $datpan) : ?>
										<tr>
											<td class="10">
												<?php echo $no++ ?>
											</td>
											<td class="100">
												<?php echo $datpan->nama_gardu ?>
											</td>
											<td width="100">
												<?php echo $datpan->suhu ?>
											</td>
											<td width="100">
												<?php echo $datpan->arus ?>
											</td>
											<td width="150">
												<?php echo $datpan->cosphi ?>
											</td>
											<td width="100">
												<?php echo dateindo($datpan->tgl_pantauan) ?>
											</td>
											<td width="100">
												<?php echo $datpan->tegangan ?>
											</td>
											<td>
												<img src="<?= base_url('assets/imgpantauan/' . $datpan->gambar) ?>" width="70px" height="50px">
											</td>
											<td width="100">
												<?php
												if ($datpan->status == 0) {
												?>
													<span class="badge badge-warning">Pending</span>
												<?php
												} else {
													echo $datpan->status == 1 ? '<span class="badge badge-success">Diterima</span>' : '<span class="badge badge-danger">Ditolak</span>';
												}
												?>
											</td>
											<td width="100">
												<a class="text-monospace text-decoration-none" target="_blank" href="https://www.google.com/maps?q=<?php echo $datpan->lokasi_pantauan ?>"><?php echo $datpan->lokasi_pantauan ?></a>
											</td>
											<td width="250">
												<a href="<?php echo site_url('ketua/PantauanHarian/disetujui/' . $datpan->id_pantauan) ?>" class="btn btn-small btn-outline-success mb-3 w-100"><i class="fa fa-check-square-o"></i> Setuju</a>
												<a onclick="deleteConfirm('<?php echo site_url('ketua/PantauanHarian/ditolak/' . $datpan->id_pantauan) ?>')" href="#!" class="btn btn-small btn-outline-danger w-100"><i class="fa fa-window-close-o"></i> Tolak</a>
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
			<?php $this->load->view("ketua/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->

	<?php $this->load->view("ketua/_partials/scrolltop.php") ?>
	<?php $this->load->view("ketua/_partials/modal.php") ?>
	<?php $this->load->view("ketua/_partials/js.php") ?>

	<script>
		$(document).ready(function() {
			var table = $('#dataTables').DataTable({
				lengthChange: false,
			});
			table.buttons().container()
				.appendTo('#dataTables_wrapper .col-md-6:eq(0)');
		});
	</script>
	<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>


</body>

</html>
