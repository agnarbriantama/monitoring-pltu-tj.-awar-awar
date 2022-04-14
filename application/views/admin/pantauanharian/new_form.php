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

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/PantauanHarian/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('admin/PantauanHarian/add'); ?>" method="POST" enctype="multipart/form-data">

							<div class="form-group">
								<label for="id_gardu">Nama Gardu</label>
								<select id="id_gardu" name="id_gardu" class="form-control" required>
									<option value="">Pilih Gardu</option>
									<?php foreach ($Gardu as $gardu) : ?>
										<option value="<?php echo $gardu->id_gardu ?>"><?= $gardu->nama_gardu ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<!-- <div class="form-group">
								<label for="nama_gardu">Nama Gardu</label>
								<input class="form-control" type="text" name="nama_gardu" placeholder="Masukkan Nama Gardu" required />
							</div> -->

							<div class="form-group">
								<label for="suhu">Suhu</label>
								<input class="form-control" type="text" name="suhu" required />
							</div>
							<div class="form-group">
								<label for="suhu">Arus</label>
								<input class="form-control" type="text" name="arus" required />
							</div>

							<!-- <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <div>
                  <label><input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki"> Laki-laki</label>
                  <label><input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan"> Perempuan</label>
                </div>
              </div> -->

							<div class="form-group">
								<label for="cosphi">Cosphi</label>
								<input class="form-control" type="text" name="cosphi" placeholder="" required />
							</div>

							<div class="form-group">
								<label for="tgl_pantauan">Tanggal Pantauan</label>
								<input class="form-control" type="date" name="tgl_pantauan" required />
							</div>
							<div class="form-group">
								<label for="tanggal_konfirmasi">Tegangan</label>
								<input class="form-control" type="tegangan" name="tegangan" placeholder="Tegangan" required />
							</div>
							
							<div class="form-group custom-file">
								<label for="gambar" class="custom-file-label">Foto Gardu</label>
								<input class="form-control custom-file-input" type="file" name="gambar" required />
							</div>

							<div class="form-group">
								<label for="kondisi">Status</label>
								<input class="form-control" type="text" name="kondisi" required />
							</div>

							<div class="form-group">
								<label for="lokasi_pantauan">Lokasi Pantauan</label>
								<input class="form-control" type="text" name="lokasi_pantauan" required />
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* jika data tidak ada isikan (-)
						<br>
						* kolom wajib terisi semua
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

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
