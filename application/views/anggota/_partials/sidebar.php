<!-- Sidebar -->
<ul class="sidebar navbar-nav">
	<li class="nav-item <?php echo $this->uri->segment(2) == 'PantauanHarian' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('anggota/PantauanHarian') ?>">
			<i class="fa fa-book"></i>
			<span>Data Pantauan Harian</span></a>
	</li>

	<li class="nav-item">
		<a class="nav-link" style="color: #909294;" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out"></i> Logout</a>
	</li>
</ul>
