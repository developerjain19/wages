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
							<?php if (sessionId('switch') == '1') { ?>
								<li class="name-first-letter">Switch Account</li>
								<li>

									<div class="bd-highlight">
										<div>
											<input type="radio" id="html" name="switchacc" value="1" class="form-check-input rediobuttons" <?= ((sessionId('position') == '1') ? 'checked' : '') ?>>
											<span class="rediofont" for="html">Admin</span>
										</div>

										<div>
											<input type="radio" id="javascript" name="switchacc" value="3" class="form-check-input rediobuttons" <?= ((sessionId('position') == '3') ? 'checked' : '') ?>>
											<span class="rediofont" for="javascript">Team Leader</span>
										</div>


										<div>
											<input type="radio" id="javascript" name="switchacc" value="5" class="form-check-input rediobuttons" <?= ((sessionId('position') == '5') ? 'checked' : '') ?>>
											<span class="rediofont" for="javascript">QC</span>
										</div>
									</div>

								</li>

							<?php
							}
							?>

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

							<?php if (sessionId('position') == '1' || sessionId('position') == '2') { ?>
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
									<a href="<?= base_url('dispatch-add') ?>">
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>Dispatch</span>
											</div>
											<div class="ms-auto">
												<i class="fa fa-arrow-right"></i>

											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="<?= base_url('raw-material-add') ?>">
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>Raw Material</span>
											</div>
											<div class="ms-auto">
												<i class="fa fa-arrow-right"></i>

											</div>
										</div>
									</a>
								</li>
							<?php
							}
							?>
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

							<?php if (sessionId('position') == '1' || sessionId('position') == '2') { ?>
								<li>
									<a href="<?= base_url('company-list') ?>">
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>Company List</span>

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
									<a href="<?= base_url('incentive-range-list') ?>">
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>Incentives</span>

											</div>
											<div class="ms-auto">
												<i class="fa fa-arrow-right"></i>

											</div>
										</div>
									</a>
								</li>


							<?php
							}
							?>
							<?php if (sessionId('position') == '1') { ?>
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

							<?php
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>