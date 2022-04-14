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
            <a href="<?php echo site_url('admin/AnggotaTim/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
          </div>
          <div class="card-body">

            <form action="<?php echo site_url('admin/AnggotaTim/add'); ?>" method="POST" enctype="multipart/form-data">

              <!-- <div class="form-group">
                <label for="id_ketuatim">Ketua Tim</label>
                <select id="id_ketuatim" name="id_ketuatim" class="form-control" required>
                  <option value="">Pilih Nama Tim</option>
                    <?php foreach ($KetuaTim as $ketuatim) : ?>
                      <option value="<?php echo $ketuatim->id_ketuatim ?>"><?= $ketuatim->nama_ketuatim ?></option>
                    <?php endforeach; ?>
                </select>
              </div>  -->

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
                <input class="form-control" type="text" name="nama_anggota" placeholder="Nama Anggota" required/>
              </div>

              <div class="form-group">
                <label for="no_hp">No HP</label>
                <input class="form-control" type="text" name="no_hp" placeholder="No HP" required/>
              </div>

              <div class="form-group">
                <label for="domisili">Domisili</label>
                <input class="form-control" type="text" name="domisili" placeholder="Domisili" required/>
              </div>

              <div class="form-group">
                <label for="tahun_kerja">Tahun Kerja</label>
                <div class="form-group">
                  <textarea id="tahun_kerja" name="tahun_kerja"></textarea>
                  <script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
                  <script>
                    CKEDITOR.replace('tahun_kerja');
                  </script>
                </div>
              </div>

              <input class="btn btn-success" type="submit" name="btn" value="Save" />
            </form>

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
