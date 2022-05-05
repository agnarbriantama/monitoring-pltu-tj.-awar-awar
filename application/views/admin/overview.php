<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<script src="<?php echo base_url('assets/Chart.js') ?>"></script>
</head>

<body id="page-top" style="padding-top: 66px;">

	<?php $this->load->view("admin/_partials/navbar.php") ?>

	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<!-- Icon Cards-->
				<div class="row">
					<div class="col-xl-6 col-sm-6 mb-3">
						<div class="card text-white bg-danger o-hidden h-100">
							<div class="card-body">
								<div class="card-body-icon">
									<i class="fa fa-cogs"></i>
								</div>
								<div class="mr-10 mb-5">
									<h4>Jumlah User Yang Terdata : <?php echo $this->db->count_all('users'); ?></h4>
								</div>
							</div>
							<a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('admin/User/index') ?>">
								<span class="float-left">Lihat Lebih Detail</span>
								<span class="float-right">
									<i class="fas fa-angle-right"></i>
								</span>
							</a>
						</div>
					</div>
					<div class="col-xl-6 col-sm-6 mb-3">
						<div class="card text-white bg-primary o-hidden h-100">
							<div class="card-body">
								<div class="card-body-icon">
									<i class="fa fa-info"></i>
								</div>
								<div class="mr-10 mb-5">
									<h4>Data Pantauan Yang Tercatat : <?php echo $this->db->count_all('tb_pantauanharian'); ?></h4>
								</div>
							</div>
							<a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('admin/PantauanHarian/index') ?>">
								<span class="float-left">Lihat Lebih Detail</span>
								<span class="float-right">
									<i class="fas fa-angle-right"></i>
								</span>
							</a>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->
			<div>
				<h5 class="text-center mb-3 mt-3">Grafik Jumlah Pantauan Harian</h5>
				<canvas id="myChart"></canvas>
				<?php
				//Inisialisasi nilai variabel awal
				$jum_data = "";
				$jumlah = null;
				foreach ($hasil as $item) {
					$tgl = $item->tgl_pantauan;
					$jum_data .= "'$tgl'" . ", ";
					$jum = $item->total;
					$jumlah .= "$jum" . ", ";
				}
				?>
			</div>

			<script>
				var ctx = document.getElementById('myChart').getContext('2d');
				var chart = new Chart(ctx, {
					// The type of chart we want to create
					type: 'line',
					// The data for our dataset
					data: {
						labels: [<?php echo $jum_data; ?>],
						datasets: [{
							label: 'Data Pantauan Harian ',
							pointStyle: 'circle',
							pointBorderWidth: '3',
							// pointBorderColor: '#00c0ef',
							pointBackgroundColor: 'rgb(65, 105, 225)',
							backgroundColor: ['rgba(255, 255, 0, 0.2)'],
							fill: true,
							borderColor: ['rgb(255,160,122)'],
							data: [<?php echo $jumlah; ?>]
						}]
					},

					// Configuration options go here
					options: {
						scales: {
							yAxes: [{
								ticks: {
									beginAtZero: true
								}
							}]
						}
					}
				});
			</script>


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
