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

						<a href="<?php echo site_url('admin/KetuaTim/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<?php foreach ($KetuaTim as $kunci) : ?>

							<form action="<?php echo site_url('admin/KetuaTim/edit'); ?>" method="POST" enctype="multipart/form-data">
								<!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/KetuaTim/edit/ID --->

								<input type="hidden" name="id" value="<?php echo $kunci->id_ketuatim; ?>" />

								<div class="form-group">
									<label for="nama_ketuatim">Nama Ketua Tim</label>
									<input class="form-control <?php echo form_error('nama_ketuatim') ? 'is-invalid' : '' ?>" type="text" name="nama_ketuatim" placeholder="Nama Ketua Tim" value="<?php echo $kunci->nama_ketuatim; ?>" required />
								</div>

								<div class="form-group">
									<label for="tgl_lahir">Tanggal Lahir</label>
									<input class="form-control <?php echo form_error('tgl_lahir') ? 'is-invalid' : '' ?>" type="date" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?php echo $kunci->tgl_lahir ?>" required />
									<div class="invalid-feedback">
										<?php echo form_error('tgl_lahir') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="jml_ang_tim">Jumlah Anggota Tim</label>
									<input class="form-control <?php echo form_error('jml_ang_tim') ? 'is-invalid' : '' ?>" type="text" name="jml_ang_tim" placeholder="Jumlah Anggota Tim" value="<?php echo $kunci->jml_ang_tim ?>" required />
									<div class="invalid-feedback">
										<?php echo form_error('jml_ang_tim') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="nama_tim">Nama Tim</label>
									<input class="form-control <?php echo form_error('nama_tim') ? 'is-invalid' : '' ?>" type="text" name="nama_tim" placeholder="nama_tim" value="<?php echo $kunci->nama_tim ?>" required />
									<div class="invalid-feedback">
										<?php echo form_error('nama_tim') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="no_hp">Nomor HP</label>
									<input class="form-control <?php echo form_error('no_hp') ? 'is-invalid' : '' ?>" type="text" name="no_hp" placeholder="Nomor Hp" value="<?php echo $kunci->no_hp ?>" required />
									<div class="invalid-feedback">
										<?php echo form_error('no_hp') ?>
									</div>
								</div>

								<div class="form-group custom-file">
									<label for="foto_ketuatim custom-file-label">Foto Ketua Tim</label>
									<div><img src="<?php echo base_url('./assets/imguser/') . $kunci->foto_ketuatim ?>" border="0" width="70px" height="70px" /></div>
									<input class="form-control <?php echo form_error('foto_ketuatim') ? 'is-invalid' : '' ?>" type="file" name="foto_ketuatim" placeholder="Foto Ketua Tim" />
									<input class="custom-file-input" type="hidden" name="fotolama" value="<?php echo $kunci->foto_ketuatim; ?>" />
									<div class="invalid-feedback">
										<?php echo form_error('foto_ketuatim') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="domisili">Domisili</label>
									<textarea class="form-control <?php echo form_error('domisili') ? 'is-invalid' : '' ?>" name="domisili" placeholder="domisili"><?php echo $kunci->domisili ?></textarea>
									<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
									<script>
										CKEDITOR.replace('domisili');
									</script>
									<div class="invalid-feedback">
										<?php echo form_error('domisili') ?>
									</div>
								</div>

								<input class="btn btn-success" type="submit" name="btn" value="Save" />
							</form>

						<?php endforeach; ?>

					</div>

					<div class="card-footer small text-muted">
						* kolom wajib terisi semua
						<br>
						* maksimal ukuran file foto 2 MB
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
