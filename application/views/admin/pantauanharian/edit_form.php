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

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/PantauanHarian/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<?php foreach ($PantauanHarian as $datpan) : ?>

							<form action="<?php echo base_url('admin/PantauanHarian/update_data/' . $datpan->id_pantauan); ?>" method="POST" enctype="multipart/form-data">

								<input type="hidden" name="id_pantauan" value="<?php echo $datpan->id_pantauan; ?>" />

								<div class="form-group">
									<label for="id_tim">Nama Tim</label>
									<select id="id_tim" name="id_tim" class="form-control" required>
										<option value="">Pilih Tim</option>
										<?php foreach ($tim as $timm) : ?>
											<option value="<?php echo $timm->id_tim ?>" <?= $datpan->id_tim == $timm->id_tim ? 'selected' : null ?>><?= $timm->nama_tim ?></option>

										<?php endforeach; ?>
									</select>
								</div>

								<div class="form-group">
									<label for="id_gardu">Nama Gardu</label>
									<select id="id_gardu" name="id_gardu" class="form-control" required>
										<option value="">Pilih Gardu</option>
										<?php foreach ($Gardu as $gardu) : ?>
											<option value="<?php echo $gardu->id_gardu ?>" <?= $datpan->id_gardu == $gardu->id_gardu ? 'selected' : null ?>><?= $gardu->nama_gardu ?></option>

										<?php endforeach; ?>
									</select>
								</div>

								<div class="form-group">
									<label for="suhu">Suhu (°C)</label>
									<input class="form-control <?php echo form_error('suhu') ? 'is-invalid' : '' ?>" type="number" name="suhu" placeholder="Suhu" value="<?php echo $datpan->suhu; ?>" />
								</div>

								<div class="form-group">
									<label for="arus">Arus (A)</label>
									<input class="form-control <?php echo form_error('arus') ? 'is-invalid' : '' ?>" type="number" name="arus" placeholder="Arus" value="<?php echo $datpan->arus; ?>" />
								</div>

								<div class="form-group">
									<label for="cosphi">Daya (W)</label>
									<input class="form-control <?php echo form_error('cosphi') ? 'is-invalid' : '' ?>" type="number" name="cosphi" placeholder="Cosphi" value="<?php echo $datpan->cosphi; ?>" />
								</div>

								<div class="form-group">
									<label for="tegangan">Tegangan</label>
									<input class="form-control <?php echo form_error('tegangan') ? 'is-invalid' : '' ?>" type="number" name="tegangan" placeholder="Tegangan" value="<?php echo $datpan->tegangan; ?>" />
								</div>

								<div class="form-group">
									<label for="tgl_pantauan">Tanggal Pantauan</label>
									<input class="form-control <?php echo form_error('tgl_pantauan') ? 'is-invalid' : '' ?>" type="date" name="tgl_pantauan" placeholder="tgl_pantauan" value="<?php echo $datpan->tgl_pantauan ?>" />
									<div class="invalid-feedback">
										<?php echo form_error('tgl_pantauan') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="gambar">Bukti Data</label>
									<div><img src="<?php echo base_url('./assets/imgpantauan/') . $datpan->gambar ?>" border="0" width="70px" height="70px" /></div>
									<input class="form-control <?php echo form_error('gambar') ? 'is-invalid' : '' ?>" type="file" name="gambar" placeholder="Gambar" />
									<input type="hidden" name="fotolama" value="<?php echo $datpan->gambar; ?>" />
									<div class="invalid-feedback">
										<?php echo form_error('gambar') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="kondisi">Status</label>
									<input class="form-control <?php echo form_error('kondisi') ? 'is-invalid' : '' ?>" type="text" name="kondisi" placeholder="Status" value="<?php echo $datpan->status; ?>" readonly />
								</div>

								<div class="form-group">
									<label for="lokasi_pantauan">Lokasi Pantauan</label>
									<input class="form-control <?php echo form_error('lokasi_pantauan') ? 'is-invalid' : '' ?>" type="text" name="lokasi_pantauan" placeholder="lokasi_pantauan" value="<?php echo $datpan->lokasi_pantauan; ?>" readonly />
								</div>

								<div class="form-group">
									<label for="pengirim">Pengirim</label>
									<input class="form-control <?php echo form_error('pengirim') ? 'is-invalid' : '' ?>" type="text" pattern="[A-Za-z ]+" name="pengirim" placeholder="Pengirim" value="<?php echo $datpan->username; ?>" />
								</div>

								<input class="btn btn-success" type="submit" name="btn" value="Save" />
							</form>

						<?php endforeach; ?>

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
		<?php $this->load->view("admin/_partials/modal.php") ?>
		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
