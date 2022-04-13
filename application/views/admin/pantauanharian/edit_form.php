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

						<a href="<?php echo site_url('admin/DataPantauan/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<?php foreach ($PantauanHarian as $datpan) : ?>

							<form action="<?php echo site_url('admin/PantauanHarian/edit'); ?>" method="POST" enctype="multipart/form-data">
								<!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/UangKas/edit/ID --->

								<input type="hidden" name="id_pantauan" value="<?php echo $datpan->id_pantauan; ?>" />

								<div class="form-group">
									<label for="nama_gardu">Nama Gardu</label>
									<input class="form-control <?php echo form_error('nama_gardu') ? 'is-invalid' : '' ?>" type="text" name="nama_gardu" placeholder="Nama Gardu" value="<?php echo $datpan->nama_gardu; ?>" />
								</div>

								<div class="form-group">
									<label for="suhu">Suhu</label>
									<input class="form-control <?php echo form_error('suhu') ? 'is-invalid' : '' ?>" type="text" name="suhu" placeholder="Suhu" value="<?php echo $datpan->suhu; ?>" />
								</div>

								<div class="form-group">
									<label for="arus">Arus</label>
									<input class="form-control <?php echo form_error('arus') ? 'is-invalid' : '' ?>" type="text" name="arus" placeholder="Arus" value="<?php echo $datpan->arus; ?>" />
								</div>

								<div class="form-group">
									<label for="cosphi">cosphi</label>
									<input class="form-control <?php echo form_error('cosphi') ? 'is-invalid' : '' ?>" type="text" name="cosphi" placeholder="Cosphi" value="<?php echo $datpan->cosphi; ?>" />
								</div>

								<div class="form-group">
									<label for="cosphi">Tegangan</label>
									<input class="form-control <?php echo form_error('tegangan') ? 'is-invalid' : '' ?>" type="text" name="tegangan" placeholder="Tegangan" value="<?php echo $datpan->tegangan; ?>" />
								</div>

								<div class="form-group">
									<label for="tgl_pantauan">Tanggal Pantauan</label>
									<input class="form-control <?php echo form_error('tgl_pantauan') ? 'is-invalid' : '' ?>" type="date" name="tgl_pantauan" placeholder="tgl_pantauan" value="<?php echo $datpan->tgl_pantauan ?>" />
									<div class="invalid-feedback">
										<?php echo form_error('tgl_pantauan') ?>
									</div>
								</div>

								<?php
								// $gejala = explode(' , ', $datpan->gejala);
								?>

								<!-- <div class="form-group">
								<label for="gejala">Gejala</label>
								<div>
									<input type="checkbox" id="gejala" name="gejala[]" value="Demam" <?php in_array('Demam', $gejala) ? print "checked" : ""; ?>> Demam
									<input type="checkbox" id="gejala" name="gejala[]" value="Pusing" <?php in_array('Pusing', $gejala) ? print "checked" : ""; ?>> Pusing
									<input type="checkbox" id="gejala" name="gejala[]" value="Mual" <?php in_array('Mual', $gejala) ? print "checked" : ""; ?>> Mual
									<input type="checkbox" id="gejala" name="gejala[]" value="Batuk" <?php in_array('Batuk', $gejala) ? print "checked" : ""; ?>> Batuk
									<input type="checkbox" id="gejala" name="gejala[]" value="Pilek" <?php in_array('Pilek', $gejala) ? print "checked" : ""; ?>> Pilek
									<input type="checkbox" id="gejala" name="gejala[]" value="DLL" <?php in_array('DLL', $gejala) ? print "checked" : ""; ?>> DLL
								</div>
								<div class="invalid-feedback">
									<?php echo form_error('gejala') ?>
								</div>
							</div> -->



								<div class="form-group">
									<label for="gambar">Gambar</label>
									<input class="form-control <?php echo form_error('gambar') ? 'is-invalid' : '' ?>" type="date" name="gambar" placeholder="gambar" value="<?php echo $datpan->gambar ?>" />
									<div class="invalid-feedback">
										<?php echo form_error('gambar') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="lokasi_pantauan">Lokasi Pantauan</label>
									<input class="form-control <?php echo form_error('lokasi_pantauan') ? 'is-invalid' : '' ?>" type="text" name="lokasi_pantauan" placeholder="lokasi_pantauan" value="<?php echo $datpan->lokasi_pantauan; ?>" />
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

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
