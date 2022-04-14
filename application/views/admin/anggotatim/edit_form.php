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

						<a href="<?php echo site_url('admin/AnggotaTim/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<?php foreach ($AnggotaTim as $ang) : ?>

							<form action="<?php echo site_url('admin/AnggotaTim/edit'); ?>" method="POST" enctype="multipart/form-data">
								<!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/AnggotaTim/edit/ID --->

								<input type="hidden" name="id" value="<?php echo $ang->id_anggotatim; ?>" />

								<!-- <div class="form-group">
									<label for="nama_tim">Nama Tim</label>
									<input class="form-control <?php echo form_error('nama_tim') ? 'is-invalid' : '' ?>" name="nama_tim" placeholder="Nama Tim" value="<?php echo $ang->nama_tim; ?>" required />
									<div class="invalid-feedback">
										<?php echo form_error('nama_tim') ?>
									</div>
								</div> -->

								<div class="form-group">
									<label for="id_ketuatim">Nama Tim</label>
									<select id="id_ketuatim" name="id_ketuatim" class="form-control" required>
										<option value="">Pilih Tim</option>
										<?php foreach ($KetuaTim as $ketuatim) : ?>
											<option value="<?php echo $ketuatim->id_ketuatim ?>"><?= $ketuatim->nama_tim ?></option>
										<?php endforeach; ?>
									</select>
								</div>

								<div class="form-group">
									<label for="nama_anggota">Nama Anggota</label>
									<input class="form-control <?php echo form_error('nama_anggota') ? 'is-invalid' : '' ?>" type="text" name="nama_anggota" placeholder="Nama Anggota" value="<?php echo $ang->nama_anggota ?>" required />
									<div class="invalid-feedback">
										<?php echo form_error('nama_anggota') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="no_hp">Nomor HP</label>
									<input class="form-control <?php echo form_error('no_hp') ? 'is-invalid' : '' ?>" type="text" name="no_hp" placeholder="Nomor HP" value="<?php echo $ang->no_hp ?>" required />
									<div class="invalid-feedback">
										<?php echo form_error('no_hp') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="domisili">Domisili</label>
									<input class="form-control <?php echo form_error('domisili') ? 'is-invalid' : '' ?>" type="text" name="domisili" placeholder="Domisili" value="<?php echo $ang->domisili ?>" required />
									<div class="invalid-feedback">
										<?php echo form_error('domisili') ?>
									</div>
								</div>

								<div class="form-group">
									<label for="tahun_kerja">Tahun Kerja</label>
									<textarea class="form-control <?php echo form_error('tahun_kerja') ? 'is-invalid' : '' ?>" name="tahun_kerja" placeholder="Tahun Kerja"><?php echo $ang->tahun_kerja ?></textarea>
									<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
									<script>
										CKEDITOR.replace('tahun_kerja');
									</script>
									<div class="invalid-feedback">
										<?php echo form_error('tahun_kerja') ?>
									</div>
								</div>

								<input class="btn btn-success" type="submit" name="btn" value="Save" />
							</form>

						<?php endforeach; ?>

					</div>

					<div class="card-footer small text-muted">
						* jika data tidak ada isikan (-)
						<br>
						* jika kolom kurang silakan isikan pada kolom tambahan
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
