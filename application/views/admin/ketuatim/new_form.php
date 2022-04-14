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
            <a href="<?php echo site_url('admin/KetuaTim/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
          </div>
          <div class="card-body">

            <form action="<?php echo site_url('admin/KetuaTim/add'); ?>" method="POST" enctype="multipart/form-data">

              <div class="form-group">
                <label for="nama_ketuatim">Nama Ketua Tim</label>
                <input class="form-control" type="text" name="nama_ketuatim" placeholder="Nama Ketua Tim" required/>
              </div>
              
              <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input class="form-control" type="date" name="tgl_lahir" placeholder="Tanggal Lahir" required/>
              </div>

              <div class="form-group">
                <label for="jml_ang_tim">Jumlah Anggota Tim</label>
                <input class="form-control" type="number" name="jml_ang_tim" placeholder="Jumlah Anggota Tim" required/>
              </div>

              <div class="form-group">
                <label for="nama_tim">Nama Tim</label>
                <input class="form-control" type="text" name="nama_tim" placeholder="Nama Tim" required/>
              </div>

              <div class="form-group">
                <label for="no_hp">Nomor HP</label>
                <input class="form-control" type="number" name="no_hp" placeholder="Nomor HP" required/>
              </div>

              <div class="form-group custom-file">
                <label class="custom-file-label" for="foto_ketuatim">Foto Ketua Tim</label>
                <input class="form-control custom-file-input" type="file" name="foto_ketuatim" placeholder="Foto Ketua Tim" required/>
              </div>

              <div class="form-group">
                <label for="domisili">Domisili</label>
                <div class="form-group">
                  <textarea id="domisili" name="domisili"></textarea>
                  <script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
                  <script>
                    CKEDITOR.replace('domisili');
                  </script>
                </div>
              </div>

              <input class="btn btn-success" type="submit" name="btn" value="Save" />
            </form>

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
