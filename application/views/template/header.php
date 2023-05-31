<div class="nav-header">
	<a href="<?= base_url() ?>" class="brand-logo">
		Wages Management
	</a>

</div>

<div class="header">
	<div class="header-content">
		<nav class="navbar navbar-expand">
			<div class="collapse navbar-collapse justify-content-between">
				<div class="header-left">

				</div>
				<ul class="navbar-nav header-right main-notification">

					<li class="nav-item dropdown notification_dropdown ">
						<a class="nav-link bell bell-link" href="javascript:void(0)">

							<div class="header-info">
								<span><?= sessionId('name') ?></span>
							</div>
						</a>
					</li>

					<!-- <li class="nav-item dropdown header-profile">
						<a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">

							<div class="header-info">
								<span><?= sessionId('name') ?></span>
								</div>
						</a>
						<div class="dropdown-menu dropdown-menu-end">


							<a href="<?= base_url('staff-list') ?>" class="dropdown-item ai-icon">
								<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
									<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
									<circle cx="12" cy="7" r="4"></circle>
								</svg>
								<span class="ms-2">Staff List </span>
							</a>

							<a href="<?= base_url('labour-list') ?>" class="dropdown-item ai-icon">
								<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
									<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
									<circle cx="12" cy="7" r="4"></circle>
								</svg>
								<span class="ms-2">Labour List </span>
							</a>

							<a href="<?= base_url('permission-role') ?>" class="dropdown-item ai-icon">
								<i class="fa fa-lock" aria-hidden="true"></i>
								<span class="ms-2">Permissions </span>
							</a>

							<a href="<?= base_url('logout') ?>" class="dropdown-item ai-icon">
								<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
									<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
									<polyline points="16 17 21 12 16 7"></polyline>
									<line x1="21" y1="12" x2="9" y2="12"></line>
								</svg>
								<span class="ms-2">Logout </span>
							</a>
						</div>
					</li> -->
				</ul>
			</div>
		</nav>
	</div>
</div>

<div class="chatbox">
	<div class="chatbox-close"></div>
	<div class="custom-tab-1">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-bs-toggle="tab" href="#notes">Menu</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-bs-toggle="tab" href="#alerts"><i class="fa fa-cog text-white" aria-hidden="true"></i></a>
			</li>
			<!-- <li class="nav-item">
				<a class="nav-link" data-bs-toggle="tab" href="#chat">Chat</a>
			</li> -->
		</ul>
		<div class="tab-content">

			<div class="tab-pane fade" id="alerts" role="tabpanel">
				<div class="card mb-sm-3 mb-md-0 contacts_card">

					<div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body1">
						<ul class="contacts">

							<li class="active">
								<a href="<?= base_url('my-profile') ?>">
									<div class="d-flex bd-highlight">
										<div class="img_cont primary"><i class="fa fa-user"></i></div>
										<div class="user_info">
											<span>My Profile</span>

										</div>
									</div>
								</a>
							</li>
							<li class="name-first-letter">Switch Account</li>
							<li>

								<a href="<?= base_url('Login/logout') ?>">
									<div class="bd-highlight">
										<input type="radio" id="html" name="fav_language" value="HTML" class="form-check-input rediobuttons" checked>
										<span class="rediofont" for="html">Admin</span>
										<br>

										<input type="radio" id="javascript" name="fav_language" value="JavaScript" class="form-check-input rediobuttons">
										<span class="rediofont" for="javascript">HR </span>
										<br>

										<input type="radio" id="javascript" name="fav_language" value="JavaScript" class="form-check-input rediobuttons">
										<span class="rediofont" for="javascript">QC</span>
									</div>
								</a>
							</li>


							<li>
								<a href="<?= base_url('Login/logout') ?>">
									<div class="d-flex bd-highlight">
										<div class="img_cont primary"><i class="fa fa-lock"></i></div>
										<div class="user_info">
											<span>Logout</span>

										</div>
									</div>
								</a>
							</li>



						</ul>
					</div>
					<div class="card-footer"></div>
				</div>
			</div>
			<div class="tab-pane fade active show" id="notes">
				<div class="card mb-sm-3 mb-md-0 note_card">

					<div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body2">
						<ul class="contacts">
							<li class="active">
								<a href="<?= base_url('staff-list') ?>">
									<div class="d-flex bd-highlight">
										<div class="user_info">
											<span>Staff List</span>

										</div>
										<div class="ms-auto">
											<i class="fa fa-arrow-right"></i>

										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="<?= base_url('labour-list') ?>">
									<div class="d-flex bd-highlight">
										<div class="user_info">
											<span>Labour List</span>

										</div>
										<div class="ms-auto">
											<i class="fa fa-arrow-right"></i>

										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="<?= base_url('division-list') ?>">
									<div class="d-flex bd-highlight">
										<div class="user_info">
											<span>Division List</span>

										</div>
										<div class="ms-auto">
											<i class="fa fa-arrow-right"></i>

										</div>
									</div>
								</a>
							</li>

							<li>
								<a href="<?= base_url('resource-type-list') ?>">
									<div class="d-flex bd-highlight">
										<div class="user_info">
											<span>Resource Type</span>

										</div>
										<div class="ms-auto">
											<i class="fa fa-arrow-right"></i>

										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="<?= base_url('permission-role') ?>">
									<div class="d-flex bd-highlight">
										<div class="user_info">
											<span>Set User Permission</span>

										</div>
										<div class="ms-auto">
											<i class="fa fa-arrow-right"></i>

										</div>
									</div>
								</a>
							</li>

						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>