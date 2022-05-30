<!-- Sidebar -->
<ul class="sidebar navbar-nav">
	<li class="nav-item <?php echo $this->uri->segment(2) == 'Overview' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('ketua/Overview') ?>">
			<i class="fas fa-tachometer-alt"></i>
			<span> Dashboard</span></a>
	</li>

	<div class="ml-2">Data Master</div>

	<li class="nav-item <?php echo $this->uri->segment(2) == 'InfoTim' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('ketua/InfoTim') ?>">
			<i class="fa fa-info"></i>
			<span> Info Tim</span></a>
	</li>

	<li class="nav-item <?php echo $this->uri->segment(2) == 'Gardu' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('ketua/Gardu') ?>">
			<i class="fa fa-list"></i>
			<span> Data Gardu</span></a>
	</li>

	<div class="ml-2">Data POS</div>

	<li class="nav-item <?php echo $this->uri->segment(2) == 'PantauanHarian' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('ketua/PantauanHarian') ?>">
			<i class="fa fa-book"></i>
			<span> Data Pantauan Harian</span></a>
	</li>

	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true">Status Pantauan</a>
		<div class="dropdown-menu dropmenu">

			<!-- <a href="<?php echo site_url('ketua/Status/pending') ?>" class="dropdown-item dropitem item1 <?php echo $this->uri->segment(3) == 'pending' ? 'active' : '' ?>">
				<span><i class="fa fa-clock-o" aria-hidden="true"></i> Pending</span>
			</a> -->

			<a href="<?php echo site_url('ketua/Status/pending') ?>" class="dropdown-item dropitem item1 <?php echo $this->uri->segment(3) == 'pending' ? 'active' : '' ?>">
				<span><i class="fa fa-clock-o" aria-hidden="true"></i> Pending</span>
			</a>

			<a href="<?php echo site_url('ketua/Status/setuju') ?>" class="dropdown-item dropitem item2 <?php echo $this->uri->segment(3) == 'setuju' ? 'active' : '' ?>">
				<span><i class="fa fa-check" aria-hidden="true"></i> Terima</span>
			</a>
			
			<a href="<?php echo site_url('ketua/Status/tolak') ?>" class="dropdown-item dropitem item3 <?php echo $this->uri->segment(3) == 'tolak' ? 'active' : '' ?>">
				<span><i class="fa fa-times" aria-hidden="true"></i> Tolak</span>
			</a>
		</div>
	</li>

	<!-- <li class="nav-item">
		<a class="nav-link" style="color: #909294;" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out"></i> Logout</a>
	</li> -->
</ul>
