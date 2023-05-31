<?php $this->load->view('template/header_link'); ?>

<body>

	<div id="main-wrapper">
		<?php $this->load->view('template/header'); ?>
		<div class="content-body" style="padding-bottom: 100px;">
			<div class="container-fluid">
				<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
					<h2 class="font-w600 title mb-2 me-auto">Hello <?= sessionId('name') ?></h2>
				</div>

				<?php if (sessionId('position') == '1' || sessionId('position') == '2') { ?>
					<?php $this->load->view('admin/admin-dashboard'); ?>

				<?php }
				if (sessionId('position') == '3') {
				?>
					<?php $this->load->view('admin/hr-dashboard'); ?>

				<?php
				}
				if (sessionId('position') == '5') {
				?>
					<?php $this->load->view('admin/qc-dashboard'); ?>


				<?php } ?>
			</div>
		</div>


		<?php $this->load->view('template/footer'); ?>
	</div>
	<?php $this->load->view('template/footer_link'); ?>
</body>

</html>