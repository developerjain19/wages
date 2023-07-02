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
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

<script>
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf'
        ]
    });
</script>

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


    $(document).ready(function() {
        // Add change event listener to radio buttons
        $('.rediobuttons').change(function() {
            // Get the selected value
            var selectedValue = $('input[name=switchacc]:checked').val();

            if (selectedValue == '1') {
                window.location.href = "<?= base_url('update_type') ?>";
            } else {

                window.location.href = "<?= base_url('select-divisions?accinfo=') ?>" + selectedValue;
            }
        });
    });
</script>