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

				<!-- Icon Cards-->
				<br>
				<div class="row">
					<div class="col-xl-4 col-sm-4 mb-3">
						<div class="card text-white bg-primary o-hidden h-100">
							<div class="card-body">
								<div class="card-body-icon">
									<i class="fas fa-fw fa-user-tie"></i>
								</div>
								<div class="mr-10 mb-5 ">
									<h4>Jumlah Ketua Tim Yang Terdata : <?php echo $this->db->count_all('tb_ketuatim'); ?></h4>
								</div>
							</div>
							<a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('admin/KetuaTim/index') ?>">
								<span class="float-left">Lihat Lebih Detail</span>
								<span class="float-right">
									<i class="fas fa-angle-right"></i>
								</span>
							</a>
						</div>
					</div>
					<div class="col-xl-4 col-sm-4 mb-3">
						<div class="card text-white bg-warning o-hidden h-100">
							<div class="card-body">
								<div class="card-body-icon">
									<i class="fas fa-fw fa-users"></i>
								</div>
								<div class="mr-10 mb-5">
									<h4>Jumlah Anggota Tim Yang Terdata : <?php echo $this->db->count_all('tb_anggotatim'); ?></h4>
								</div>
							</div>
							<a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('admin/AnggotaTim/index') ?>">
								<span class="float-left">Lihat Lebih Detail</span>
								<span class="float-right">
									<i class="fas fa-angle-right"></i>
								</span>
							</a>
						</div>
					</div>
					<div class="col-xl-4 col-sm-4 mb-3">
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

</body>

</html>
