<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("ketua/_partials/head.php") ?>
	<script src="<?php echo base_url('assets/Chart.js') ?>"></script>
</head>

<body id="page-top" style="padding-top: 66px;">

	<?php $this->load->view("ketua/_partials/navbar.php") ?>

	<div id="wrapper">

		<?php $this->load->view("ketua/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">
			</div>
			<!-- /.container-fluid -->
			<div>
				<h5 class="text-center mb-3 mt-3">Grafik Kinerja Anggota</h5>
				<canvas id="myChart"></canvas>
				<?php
				//Inisialisasi nilai variabel awal
				$jum_data = "";
				$jumlah = null;
				foreach ($hasil as $item) {
					$username = $item->username;
					$jum_data .= "'$username'" . ", ";
					$jum = $item->total;
					$jumlah .= "$jum" . ", ";
				}
				?>
			</div>

			<script>
				var ctx = document.getElementById('myChart').getContext('2d');
				var chart = new Chart(ctx, {
					// The type of chart we want to create
					type: 'bar',
					// The data for our dataset
					data: {
						labels: [<?php echo $jum_data; ?>],
						// "scrollX": true,
						datasets: [{
							label: 'Jumlah Data Kinerja Anggota ',
							pointStyle: 'circle',
							pointBorderWidth: '3',
							// pointBorderColor: '#00c0ef',
							pointBackgroundColor: 'rgb(65, 105, 225)',
							backgroundColor: ['rgba(255, 255, 0, 0.2)', 'rgba(255, 8, 111, 0.2)', 'rgba(154, 220, 255, 0.2)', 'rgba(255, 178, 166, 0.2)'],
							fill: true,
							// scrollX: true,
							borderColor: ['rgb(255,160,122)'],
							data: [<?php echo $jumlah; ?>]
						}]
					},

					// Configuration options go here
					options: {
						responsive: true,
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
			<?php $this->load->view("ketua/_partials/footer.php") ?>
		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->

	<?php $this->load->view("ketua/_partials/scrolltop.php") ?>
	<?php $this->load->view("ketua/_partials/modal.php") ?>
	<?php $this->load->view("ketua/_partials/js.php") ?>

</body>

</html>
