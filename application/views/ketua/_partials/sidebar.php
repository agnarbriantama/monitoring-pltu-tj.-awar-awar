<!-- Sidebar -->
<ul class="sidebar navbar-nav">
	<li class="nav-item <?php echo $this->uri->segment(2) == 'Gardu' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('ketua/Gardu') ?>">
			<i class="fa fa-list"></i>
			<span>Data Gardu</span></a>
	</li>
	<br>
	<li class="nav-item <?php echo $this->uri->segment(2) == 'PantauanHarian' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('ketua/PantauanHarian') ?>">
			<i class="fa fa-book"></i>
			<span>Data Pantauan Harian</span></a>
	</li>
</ul>
