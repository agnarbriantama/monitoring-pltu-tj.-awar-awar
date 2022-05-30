<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<!-- change chart js v3 -->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
	<!-- ... -->
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
				<div>
					<h5 class="text-center mb-3 mt-3">Grafik Jumlah Pantauan Harian</h5>
					<div class="form-group row">
						<div class="col-4 ml-3">
							<label for="">Start Date</label>
							<input type="date" class="form-control" id="startDate" value="2022-04-01" min="2022-01-01" max="2022-12-30">
						</div>
						<div class="col-5">
							<label for="">End Date</label>
							<input type="date" class="form-control" id="endDate" value="2022-04-30" min="2022-01-01" max="2022-12-30">
						</div>
					</div>
					<canvas id="myChart"></canvas>
					<?php
					$dateArray = array();
					$jmlArray = array();
					foreach ($hasil as $item) {
						$dateArray[] = $item->tgl_pantauan;
						$jmlArray[] = $item->total;
					}
					?>
				</div>

				<script>
					const label = <?php echo json_encode($dateArray) ?>;
					const dateChartJS = label.map((day, index) => {
						let dayjs = new Date(day);
						return dayjs.setHours(0, 0, 0, 0);
					});

					const ctx = document.getElementById('myChart').getContext('2d');
					const plugin = {
						id: 'custom_canvas_background_color',
						beforeDraw: (chart) => {
							const ctx = chart.canvas.getContext('2d');
							ctx.save();
							ctx.globalCompositeOperation = 'destination-over';
							ctx.fillStyle = ['rgba(255, 255, 0, 0.2)'];
							ctx.fillRect(0, 0, chart.width, chart.height);
							ctx.restore();
						}
					};
					const myChart = new Chart(ctx, {
						type: 'line',
						data: {
							labels: dateChartJS,
							datasets: [{
								label: 'Data Pantauan Harian ',
								data: <?php echo json_encode($jmlArray); ?>,
								pointBorderWidth: '3',
								pointBackgroundColor: 'rgb(65, 105, 225)',
								borderColor: ['rgb(255,160,122)'],
								borderWidth: 1
							}]
						},
						options: {
							scales: {
								x: {
									min: '2022-01-01',
									max: '2022-12-30',
									type: 'time',
									time: {
										unit: 'day'
									}
								},
								y: {
									beginAtZero: true
								}
							}
						},
						plugins: [plugin]
					});

					function Filter(date, type) {
						const startDate = new Date(date);
						console.log(startDate.setHours(0, 0, 0, 0));
						if (type == 'min') {
							myChart.options.scales.x.min = startDate.setHours(0, 0, 0, 0);
						} else {
							myChart.options.scales.x.max = startDate.setHours(0, 0, 0, 0);
						}
						myChart.update();
					}

					$(document).on('change', '#startDate', function() {
						Filter($(this).val(), 'min');
					})

					$(document).on('change', '#endDate', function() {
						Filter($(this).val(), 'max');
					})
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
