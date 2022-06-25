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
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table cell-border table-hover table-striped text-center" id="dataTables" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th class="filterhead">No</th>
										<th class="filterhead">Nama Tim</th>
										<th class="filterhead">Nama Gardu</th>
										<th class="filterhead">Suhu</th>
										<th class="filterhead">Arus</th>
										<th class="filterhead">Daya</th>
										<th class="filterhead">Tanggal</th>
										<th class="filterhead">Tegangan</th>
										<th class="filterhead">Pengirim</th>
										<th class="filterhead"></th>
										<th class="filterhead"></th>
										<th class="filterhead"></th>
									</tr>
									<tr>
										<th>No</th>
										<th>Nama Tim</th>
										<th>Nama Gardu</th>
										<th>Suhu (°C)</th>
										<th>Arus (A)</th>
										<th>Daya (W)</th>
										<th>Tanggal</th>
										<th>Tegangan</th>
										<th>Pengirim</th>
										<th>Bukti Data</th>
										<th>Status</th>
										<th>Lokasi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($pantauan_tim as $datpan) : ?>
										<tr>
											<td width="10">
												<?php echo $no++ ?>
											</td>
											<td width="100">
												<?php echo $datpan->nama_tim ?>
											</td>
											<td width="100">
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
												<?php echo $datpan->tgl_pantauan ?>
											</td>
											<td width="100">
												<?php echo $datpan->tegangan ?>
											</td>
											<td width="100">
												<?php echo $datpan->username ?>
											</td>
											<td>
												<img src="<?= base_url('assets/imgpantauan/' . $datpan->gambar) ?>" width="70px" height="50px">
											</td>
											<td width="100">
												<?php
												if ($datpan->status == 0) {
												?>
													<span class="badge badge-warning"><i class="fa fa-clock-o" aria-hidden="true"></i> Pending</span>
												<?php
												} else {
													echo $datpan->status == 1 ? '<span class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i> Diterima</span>' : '<span class="badge badge-danger"><i class="fa fa-times" aria-hidden="true"></i> Ditolak</span>';
												}
												?>
											</td>
											<td width="100">
												<a class="text-monospace text-decoration-none" target="_blank" href="https://www.google.com/maps?q=<?php echo $datpan->lokasi_pantauan ?>"><i class="fa fa-map-marker" aria-hidden="true"></i> Lokasi</a>
											</td>
											<!-- <td width="250">
												<a href="<?php echo site_url('ketua/PantauanHarian/disetujui/' . $datpan->id_pantauan) ?>" class="btn btn-small btn-success mb-3 w-100"><i class="fa fa-check-square-o"></i> Setuju</a>
												<a href="<?php echo site_url('ketua/PantauanHarian/ditolak/' . $datpan->id_pantauan) ?>" href="#!" class="btn btn-small btn-danger w-100"><i class="fa fa-window-close-o"></i> Tolak</a>
											</td> -->
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
				// scrollY: '250px',
				// dom: 'Bfrtip',
				lengthMenu: [
					[5, 10, 25, 50, -1],
					[5, 10, 25, 50, "All"]
				],
				lengthChange: true,
			});
			table.buttons().container()
				.appendTo('#dataTables_wrapper .col-md-6:eq(0)');

				$(".filterhead").not(":eq(9), :eq(10),:eq(11)").each(function(i) {
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
