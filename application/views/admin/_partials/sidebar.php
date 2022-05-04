<!-- Sidebar -->
<ul class="sidebar navbar-nav">
	<li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('admin') ?>">
			<i class="fas fa-tachometer-alt"></i>
			<span> Dashboard</span>
		</a>
	</li>

	<div class="ml-2">Data Master</div>
	
	<li class="nav-item <?php echo $this->uri->segment(2) == 'User' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('admin/User') ?>">
			<i class="fa fa-info"></i>
			<span> Data Pengguna</span></a>
	</li>

	<li class="nav-item <?php echo $this->uri->segment(2) == 'NamaTim' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('admin/NamaTim') ?>">
			<i class="fa fa-users"></i>
			<span> Nama Tim</span></a>
	</li>

	<li class="nav-item <?php echo $this->uri->segment(2) == 'Gardu' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('admin/Gardu') ?>">
			<i class="fa fa-list"></i>
			<span> Data Gardu</span></a>
	</li>
	
	<div class="ml-2">Data Transaksi</div>
	
	<li class="nav-item <?php echo $this->uri->segment(2) == 'PantauanHarian' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('admin/PantauanHarian') ?>">
			<i class="fa fa-book"></i>
			<span> Data Pantauan Harian</span></a>
	</li>
	<div class="ml-2">Logout</div>
	<li class="nav-item">
		<a class="nav-link" style="color: #909294;" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out"></i> Logout</a>
	</li>

	<!-- <div class="sb-sidenav-footer">
		<div class="small">Logged in as:</div>
		Start Bootstrap
	</div> -->
</ul>
