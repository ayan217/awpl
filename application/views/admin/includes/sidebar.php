<div class="container-fluid page-body-wrapper">
	<nav class="sidebar sidebar-offcanvas" id="sidebar">
		<ul class="nav">
			<li class="nav-item">
				<a class="nav-link" href="<?= ADMIN_URL ?>Dashboard">
					<i class="mdi mdi-grid-large menu-icon"></i>
					<span class="menu-title">Dashboard</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= ADMIN_URL ?>Depot">
					<i class="mdi mdi-grid-large menu-icon"></i>
					<span class="menu-title">Manage Depot</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= ADMIN_URL ?>Users">
					<i class="mdi mdi-grid-large menu-icon"></i>
					<span class="menu-title">Manage Admin Users</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-bs-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
					<i class="menu-icon mdi mdi-floor-plan"></i>
					<span class="menu-title">Manage Users</span>
					<i class="menu-arrow"></i>
				</a>
				<div class="collapse" id="ui-basic1">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item"> <a class="nav-link" href="<?= ADMIN_URL ?>Users/approved_users">Approved</a></li>
						<li class="nav-item"> <a class="nav-link" href="<?= ADMIN_URL ?>Users/pending_users">Pending</a></li>
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= ADMIN_URL ?>Products">
					<i class="mdi mdi-grid-large menu-icon"></i>
					<span class="menu-title">Manage Products</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= ADMIN_URL ?>Orders">
					<i class="mdi mdi-grid-large menu-icon"></i>
					<span class="menu-title">Manage Orders</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= ADMIN_URL ?>sales">
					<i class="mdi mdi-grid-large menu-icon"></i>
					<span class="menu-title">Periodical sales statement</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-bs-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
					<i class="menu-icon mdi mdi-floor-plan"></i>
					<span class="menu-title">CMS</span>
					<i class="menu-arrow"></i>
				</a>
				<div class="collapse" id="ui-basic2">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item"> <a class="nav-link" href="<?= ADMIN_URL ?>CMS/about">About</a></li>
						<li class="nav-item"> <a class="nav-link" href="<?= ADMIN_URL ?>CMS/terms">Terms & Conditions</a></li>
						<li class="nav-item"> <a class="nav-link" href="<?= ADMIN_URL ?>CMS/privacy">Privacy Policy</a></li>
						<li class="nav-item"> <a class="nav-link" href="<?= ADMIN_URL ?>CMS/faq">FAQ</a></li>
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= ADMIN_URL ?>change-password">
					<i class="mdi mdi-grid-large menu-icon"></i>
					<span class="menu-title">Change Password</span>
				</a>
			</li>
		</ul>
	</nav>