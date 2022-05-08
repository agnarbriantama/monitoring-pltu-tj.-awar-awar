<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Anda Yakin Untuk Logout?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Klik tombol logout jika anda yakin ingin melakukan logout, jika tidak klik tombol batal</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
				<a class="btn btn-primary" href="<?= site_url('auth/logout') ?>">Logout</a>
			</div>
		</div>
	</div>
</div>


<!-- Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Anda Yakin Akan Menghapus Data Ini?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
				<a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
			</div>
		</div>
	</div>
</div>

<?php
if (isset($_POST['kirim'])) {
	$nomortujuan  = $_POST['nomortujuan'];
	$pesan = $_POST['pesan'];

	echo "<script>window.location = 'https://api.whatsapp.com/send?phone=$nomortujuan&text=$pesan&source=&data='</script>";
}
?>

<!-- send Whatsapp -->
<div class="modal fade" id="waModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary text-white">
				<h5 class="modal-title" id="exampleModalLabel">Masukkan Nomor Dan Pesan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form target="_blank" method="post" action="">
					<div class="form-group">
						<label for="nomortujuan" class="col-form-label">Contoh : +62812xxxxxxxx</label>
						<input type="text" class="form-control nomortujuan" name="nomortujuan" id="nomortujuan" value="+62">
					</div>
					<div class="form-group">
						<label for="pesan" class="col-form-label">Contoh : Selamat Siang</label>
						<input type="text" class="form-control pesan" name="pesan" id="pesan" value="">
					</div>

			</div>
			<div class="modal-footer" style="background-color: #d8d8d8;">
				<!-- ?saat pop up muncul -->
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<input onclick="new.window()" id="submit" type="submit" name="kirim" class="btn btn-primary"></input>
			</div>
			</form>
		</div>
	</div>
</div>

<script>
	$('#submit').click(function() {
		$('#waModal').modal('hide');
	});
</script>
