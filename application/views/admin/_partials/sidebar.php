<!-- Sidebar -->
<ul class="sidebar navbar-nav">
	<li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('admin') ?>">
			<i class="fas fa-fw fa-desktop"></i>
			<span>Master POS</span>
		</a>
	</li>
	<br>
	<!-- <li class="nav-item <?php echo $this->uri->segment(2) == 'KetuaTim' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('admin/KetuaTim') ?>">
			<i class="fas fa-fw fa-user"></i>
			<span>Data Ketua Tim</span></a>
	</li>
	<br>
	<li class="nav-item <?php echo $this->uri->segment(2) == 'AnggotaTim' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('admin/AnggotaTim') ?>">
			<i class="fas fa-fw fa-users"></i>
			<span>Data Anggota Tim</span></a>
	</li>
	<br> -->
	<li class="nav-item <?php echo $this->uri->segment(2) == 'Gardu' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('admin/Gardu') ?>">
			<i class="fa fa-list"></i>
			<span>Data Gardu</span></a>
	</li>
	<br>
	<li class="nav-item <?php echo $this->uri->segment(2) == 'PantauanHarian' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('admin/PantauanHarian') ?>">
			<i class="fa fa-book"></i>
			<span>Data Pantauan Harian</span></a>
	</li>
	<br>
	<li class="nav-item <?php echo $this->uri->segment(2) == 'User' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('admin/User') ?>">
			<i class="fa fa-info"></i>
			<span>Data Pengguna</span></a>
	</li>
</ul>
