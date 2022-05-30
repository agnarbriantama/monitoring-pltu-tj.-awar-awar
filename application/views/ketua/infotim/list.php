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
					<?php
					foreach ($users_tim as $akun) : ?>
						<div class="card-header">
							<h3 class="text-uppercase font-weight-bold text-center">Nama Tim : <?php echo $akun->nama_tim ?></h3>
						</div>
					<?php endforeach; ?>

					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover table-striped text-center" id="dataTables" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th class="filterhead">No</th>
										<th class="filterhead">Nama</th>
										<th class="filterhead">Email</th>
										<th class="filterhead">Jabatan</th>
										<th class="filterhead"></th>
									</tr>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Email</th>
										<th>Jabatan</th>
										<th>Foto</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($users_ketua as $akun) : ?>
										<tr>
											<td width="10">
												<?php echo $no++ ?>
											</td>
											<td width="200">
												<?php echo $akun->full_name ?>
											</td>
											<td>
												<?php echo $akun->email ?>
											</td>
											<td>
												<?php echo $akun->nama_level ?>
											</td>
											<td width="150">
												<img src="<?= base_url('assets/imguser/' . $akun->gambar_user) ?>" width="70px" height="50px">
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

				$(".filterhead").not(":eq(4)").each(function(i) {
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
	<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>


</body>

</html>
