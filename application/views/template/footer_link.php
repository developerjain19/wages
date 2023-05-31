<script src="<?= base_url() ?>assets/admin/vendor/global/global.min.js"></script>
<script src="<?= base_url() ?>assets/admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="<?= base_url() ?>assets/admin/vendor/chart.js/Chart.bundle.min.js"></script>

<!-- Chart piety plugin files -->
<script src="<?= base_url() ?>assets/admin/vendor/peity/jquery.peity.min.js"></script>

<!-- Apex Chart -->
<script src="<?= base_url() ?>assets/admin/vendor/apexchart/apexchart.js"></script>

<!-- Dashboard 1 -->
<script src="<?= base_url() ?>assets/admin/js/dashboard/dashboard-1.js"></script>

<script src="<?= base_url() ?>assets/admin/vendor/owl-carousel/owl.carousel.js"></script>
<script src="<?= base_url() ?>assets/admin/js/custom.js"></script>
<script src="<?= base_url() ?>assets/admin/js/deznav-init.js"></script>
<script src="<?= base_url() ?>assets/admin/js/demo.js"></script>
<script src="<?= base_url() ?>assets/admin/js/styleSwitcher.js"></script>

<script src="<?= base_url() ?>assets/admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/admin/js/plugins-init/datatables.init.js"></script>

<script>
    jQuery(document).ready(function() {
        setTimeout(function() {
            dezSettingsOptions.version = "dark";
            new dezSettings(dezSettingsOptions);
        }, 100);
    });
    window.setTimeout(function() {
        $('.alert').fadeTo(200, 0).slideUp(200, function() {
            $(this).remove();
        });
    }, 4000);


    var userPosition = <?= sessionId('position') ?>

    if(userPosition == '1')
    {
        
    }
   
</script>