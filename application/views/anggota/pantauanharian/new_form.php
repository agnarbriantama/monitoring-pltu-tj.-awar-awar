<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("anggota/_partials/head.php") ?>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.map"></script>

<body id="page-top">

	<?php $this->load->view("anggota/_partials/navbar.php") ?>
	<div id="wrapper">
		<?php $this->load->view("anggota/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">
				<?php $this->load->view("anggota/_partials/breadcrumb.php") ?>

				<div class="card mb-3">
					<div class="card-header"></div>
					<div class="card-body">

						<form action="<?php echo site_url('anggota/PantauanHarian/add'); ?>" method="POST" enctype="multipart/form-data">
							<?php echo $this->session->flashdata('berhasil'); ?>
							<div class="form-group">
								<label for="id_gardu">Nama Gardu</label>
								<select id="id_gardu" name="id_gardu" class="form-control" required>
									<option value="">Pilih Gardu</option>
									<?php foreach ($Gardu as $gardu) : ?>
										<option value="<?php echo $gardu->id_gardu ?>"><?= $gardu->nama_gardu ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label for="suhu">Suhu</label>
								<input class="form-control" type="text" name="suhu" required />
							</div>
							<div class="form-group">
								<label for="suhu">Arus</label>
								<input class="form-control" type="text" name="arus" required />
							</div>

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
								<input class="form-control" type="text" name="tegangan" placeholder="Tegangan" required />
							</div>

							<div class="form-group">
								<label for="lokasi_pantauan">Lokasi <em>(klik tombol Get Location)</em></label>
								<input class="form-control" id="lokasi" type="text" name="lokasi_pantauan" placeholder="Lokasi" required readonly />
							</div>

							<div class="form-group">
								<h6>Klik Tombol ini <button class="btn btn-outline-info btn-sm" name="lokasi_pantauan" onclick="getLocation()">Get Location</button> sebelum mengirimkan data</h6>
							</div>

							<div class="form-group custom-file mt-2 mb-3">
								<label for="gambar" class="custom-file-label">Foto Bukti Di Tempat Gardu</label>
								<input class="form-control custom-file-input" type="file" name="gambar" required />
							</div>

							<input class="btn btn-success float-right" type="submit" name="btn" value="Save" />

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
				<?php $this->load->view("anggota/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->


		<?php $this->load->view("anggota/_partials/scrolltop.php") ?>
		<?php $this->load->view("anggota/_partials/modal.php") ?>
		<?php $this->load->view("anggota/_partials/js.php") ?>

		<script>
			var x = document.getElementById("lokasi");

			function getLocation() {
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(showPosition);
				} else {
					x.innerHTML = "Geolocation is not supported by this browser.";
				}
			}

			function showPosition(position) {
				// x.innerHTML = "Latitude: " + position.coords.latitude +
				// 	" || Longitude: " + position.coords.longitude;
				x.value = position.coords.latitude + "," + position.coords.longitude
			}
		</script>

</body>

</html>
