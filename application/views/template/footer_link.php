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

<!--<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> -->
<!--<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">-->

<!--<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>



<script>
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf' , 'csv'
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
                window.location.href = "<?= base_url('Admin_Dashboard/update_type') ?>";
            } else {

                window.location.href = "<?= base_url('company-select?accinfo=') ?>" + selectedValue;
            }
        });


    });


    window.onload = () => {
        let sliderImagesBox = document.querySelectorAll('.cards-box');
        sliderImagesBox.forEach(el => {
            let imageNodes = el.querySelectorAll('.card:not(.hide)')
            let arrIndexes = []; // Index array
            (() => {
                // The loop that added values to the arrIndexes array for the first time
                let start = 0;
                while (imageNodes.length > start) {
                    arrIndexes.push(start++);
                }
            })();

            let setIndex = (arr) => {
                for (let i = 0; i < imageNodes.length; i++) {
                    imageNodes[i].dataset.slide = arr[i] // Set indexes
                }
            }
            el.addEventListener('click', () => {
                arrIndexes.unshift(arrIndexes.pop());
                setIndex(arrIndexes)
            })
            setIndex(arrIndexes) // The first indexes addition
        });
    };
</script>

<script>
    $(document).ready(function() {
        $('#loadMoreBtn').click(function() {
            $('.card-body').toggleClass('mhcart');
        });
        $('#loadMoreBtn2').click(function() {
            $('.card-body').toggleClass('mhcart');
        });
    });
</script>

