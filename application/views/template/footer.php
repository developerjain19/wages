<!-- <div class="footer">
	<div class="copyright">
		<p>Copyright © 2023 Wages Management All Rights Reserved</p>
	</div>
</div> -->


<div class="fixed-fotter-menu">
	<ul class="footer-menu">
		<li><a href="<?= base_url('dashboard') ?>"> <img src="<?= base_url('assets/admin/') ?>images/home.png" alt="icon"> </a></li>
		<?php if (sessionId('position') == '1' || sessionId('position') == '2') { ?>

			<li><a href="javascript:void(0)" class="add-icon" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"> <img src="<?= base_url('assets/admin/') ?>images/add.png" alt="icon"> </a></li>
		<?php } elseif (sessionId('position') == '3') { ?>

			<li><a href="<?= base_url('work-update-add') ?>" class="add-icon"> <img src="<?= base_url('assets/admin/') ?>images/add.png" alt="icon"> </a></li>
		<?php
		} else {
		?> <li><a href="<?= base_url('qc-update') ?>" class="add-icon"> <img src="<?= base_url('assets/admin/') ?>images/add.png" alt="icon"> </a></li>
		<?php
		}
		?>



		<li><a href="<?= base_url('reporting') ?>"> <img src="<?= base_url('assets/admin/') ?>images/notes.png" alt="icon"> </a></li>
	</ul>
</div>

<div class="modal fade" id="exampleModalCenter">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">	
			<div class="modal-header">
				<!-- <h5 class="modal-title">ADD</h5> -->
				<button type="button" class="btn-close" data-bs-dismiss="modal">
				</button>
			</div>
			<div class="modal-body text-center">
				<?php if ($this->workUpdate == '1') { ?>
					<a href="<?= base_url('work-update-add') ?>" class="btn btn-primary">Work Update
					</a>
				<?php
				}
				?>
				<?php if ($this->QC == '1') { ?>
					<a href="<?= base_url('qc-update') ?>" class="btn btn-primary">QC Update
					</a>
				<?php
				}
				?>
			</div>

		</div>
	</div>
</div>