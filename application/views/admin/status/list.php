<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
</head>

<body id=" page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">
				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
				<!-- // ! Alert -->
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
					<!-- // ! view sortir by date -->
					<div class="card-body">
						<div class="row">
							<div class="col col-8"></div>
							<div class="col col-2 text-center">
								<label style="font-size: 14px;" for="startdate">Mulai Tanggal</label>
								<input class="form-control text-center" type="text" id="min" name="min" placeholder="Tanggal Mulai" />
							</div>
							<div class="col col-2 text-center">
								<label style="font-size: 14px;" for="enddate">Akhir Tanggal</label>
								<input class="form-control text-center" type="text" id="max" name="max" placeholder="Tanggal Selesai" />
							</div>
						</div>
						<hr>
						<!-- // ! datatable -->
						<div class="table-responsive">
							<table class="table cell-border table-hover table-striped text-center display" id="dataTables" width="100%" cellspacing="0">
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
										<th>Status</th>
										<th>Lokasi Pantauan</th>
										<th>Bukti Data</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($Status as $stat) : ?>
										<tr>
											<td width="10">
												<?php echo $no++ ?>
											</td>
											<td>
												<?php echo $stat->nama_tim ?>
											</td>
											<td>
												<?php echo $stat->nama_gardu ?>
											</td>
											<td>
												<?php echo $stat->suhu ?>
											</td>
											<td>
												<?php echo $stat->arus ?>
											</td>
											<td>
												<?php echo $stat->cosphi ?>
											</td>
											<td>
												<?php echo $stat->tgl_pantauan ?>
											</td>
											<td>
												<?php echo $stat->tegangan ?>
											</td>
											<td>
												<?php echo $stat->username ?>
											</td>
											<td>
											<?php
												if ($stat->status == 0) {
												?>
													<span class="badge badge-warning"><i class="fa fa-clock-o" aria-hidden="true"></i> Pending</span>
												<?php
												} else {
													echo $stat->status == 1 ? '<span class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i> Diterima</span>' : '<span class="badge badge-danger"><i class="fa fa-times" aria-hidden="true"></i> Ditolak</span>';
												}
												?>

											</td>
											<td>
												<a class="text-monospace text-decoration-none" target="_blank" href="https://www.google.com/maps?q=<?php echo $stat->lokasi_pantauan ?>"><i class="fa fa-map-marker" aria-hidden="true"></i> Lokasi</a>
											</td>
											<td>
												<img src="<?= base_url('assets/imgpantauan/' . $stat->gambar) ?>" width="70px" height="50px">
											</td>
											<!-- // ! action -->
											<td width="250">
												<a style="width: 100px;" href="<?php echo site_url('admin/pantauanharian/edit/' . $stat->id_pantauan) ?>" class="btn btn-small btn-primary mb-3 w-60"><i class="fas fa-edit"></i> Ubah</a>
												<a style="width: 100px;" onclick="deleteConfirm('<?php echo site_url('admin/pantauanharian/delete/' . $stat->id_pantauan) ?>')" href="#!" class="btn btn-small btn-danger mb-3 w-60"><i class="fas fa-trash"></i> Hapus</a>
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
		// ! untuk hapus
		function deleteConfirm(url) {
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}

		// ! untuk whatsapp
		function whatsapp() {
			$('#waModal').modal();
		}

		// ! untuk datatable
		$(document).ready(function() {

			var table = $('#dataTables').DataTable({
				"bInfo": false,
				lengthChange: true,
				"scrollCollapse": true,
				"paging": true,
				lengthMenu: [
					[5, 10, 25, 50, -1],
					[5, 10, 25, 50, "All"]
				],
				lengthChange: true,
			});


			table.buttons().container()
				.appendTo('#dataTables_wrapper .col-md-6:eq(0)');
		});

		// ! sortir by date
		var minDate, maxDate;

		$.fn.dataTable.ext.search.push(
			function(settings, data, dataIndex) {
				var min = minDate.val();
				var max = maxDate.val();
				var date = new Date(data[6]);

				if (
					(min === null && max === null) ||
					(min === null && date <= max) ||
					(min <= date && max === null) ||
					(min <= date && date <= max)
				) {
					return true;
				}
				return false;
			}
		);

		$(document).ready(function() {
			// Create date inputs
			minDate = new DateTime($('#min'), {
				format: 'YYYY MMMM Do '
			});
			maxDate = new DateTime($('#max'), {
				format: 'YYYY MMMM Do'
			});

			// DataTables initialisation
			var table = $('#dataTables').DataTable();

			// Refilter the table
			$('#min, #max').on('change', function() {
				table.draw();
			});

			// ! sortir per column
			$(".filterhead").not(":eq(9), :eq(10), :eq(11), :eq(12)").each(function(i) {
				// $(".filterhead").each(function(i) {
				// var select = $('<select><option value=""></option></select>')
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
