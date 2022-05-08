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
						<a class="btn btn-primary" href="<?php echo site_url('admin/PantauanHarian/relasi') ?>"><i class="fas fa-plus"></i> Tambah Data</a>
						<!-- // ! whatsapp -->
						<a onclick="whatsapp()" style="float: right;" class="btn btn-success ml-2 text-light"><i class="fa fa-whatsapp"></i> Whatsapp</a>
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
							<table class="table cell-border table-hover table-striped text-center" id="dataTables" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Tim</th>
										<th>Nama Gardu</th>
										<th>Suhu</th>
										<th>Arus</th>
										<th>Cosphi</th>
										<th>Tanggal</th>
										<th>Tegangan</th>
										<th>Bukti Data</th>
										<th>Status</th>
										<th>Lokasi Pantauan</th>
										<th>Pengirim</th>
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
												<?php echo $datpan->nama_tim ?>
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
												<?php echo $datpan->tgl_pantauan ?>
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
												<a class="text-monospace text-decoration-none" target="_blank" href="https://www.google.com/maps?q=<?php echo $datpan->lokasi_pantauan ?>">Lihat Lokasi</a>
											</td>
											<td width="100">
												<?php echo $datpan->username ?>
											</td>
											<!-- // ! action -->
											<td width="250">
												<a style="width: 100px;" href="<?php echo site_url('admin/pantauanharian/edit/' . $datpan->id_pantauan) ?>" class="btn btn-small btn-outline-primary mb-3 w-60"><i class="fas fa-edit"></i> Ubah</a>
												<a style="width: 100px;" onclick="deleteConfirm('<?php echo site_url('admin/pantauanharian/delete/' . $datpan->id_pantauan) ?>')" href="#!" class="btn btn-small btn-outline-danger mb-3 w-60"><i class="fas fa-trash"></i> Hapus</a>
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
				// "scrollX": true,
				// "scrollY": "350px",
				"scrollCollapse": true,
				"paging": true,
				// scrollY: '250px',
				dom: 'Bfrtip',
				buttons: [{
						title: 'Data Pantauan Harian Monitoring Gardu',
						extend: 'copyHtml5',
						text: 'COPY <i class="fa fa-files-o"></i>',
						titleAttr: 'Copy',
						className: 'btn-default',
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6, 8, 9],
							// stripHtml: false
						}

					},
					{
						title: 'Data Pantauan Harian Monitoring Gardu',
						extend: 'excelHtml5',
						text: 'EXCEL <i class="fa fa-file-excel-o"></i>',
						titleAttr: 'Excel',
						className: 'btn-success',
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6, 8, 9],
							// stripHtml: false
						}
					},
					{
						title: 'Data Pantauan Harian Monitoring Gardu',
						extend: 'csvHtml5',
						text: 'CSV <i class="fa fa-file-text-o"></i>',
						titleAttr: 'CSV',
						className: 'btn-info',
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6, 8, 9],
							// stripHtml: false
						}
					},
					{
						title: 'Data Pantauan Harian Monitoring Gardu',
						extend: 'pdfHtml5',
						// orientation: 'landscape',
						text: 'PDF <i class="fa fa-file-pdf-o"></i>',
						titleAttr: 'PDF',
						className: 'btn-danger',
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6, 8, 9],
							// stripHtml: false
						}
					},
					{
						title: 'Data Pantauan Harian Monitoring Gardu',
						extend: 'print',
						// orientation: 'landscape',	
						text: 'PRINT <i class="fa fa-print"></i>',
						titleAttr: 'print',
						className: 'btn-warning text-white',
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6, 7, 9],
							stripHtml: false
						},
						customize: function(win) {
							$(win.document.body)
								.css('font-size', '10pt');

							$(win.document.body).find('table')
								.addClass('compact')
								.css('font-size', 'inherit');
						}
					},
				],
				dom: "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
					"<'row'<'col-md-12'tr>>" +
					"<'row'<'col-md-5'i><'col-md-7'p>>",
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
		});
	</script>
	<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>


</body>

</html>
