<?php $this->load->view('template/header_link'); ?>

<body>
    <div id="main-wrapper">
        <?php $this->load->view('template/header'); ?>
        <div class="content-body">
            <div class="container-fluid">
                <div class="row justify-content-center mb-5">
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?php if ($tag == 'edit') { ?>
                                        <a href="#" onclick="history.back()"><i class="fa fa-times"></i></a>
                                        <?php } ?><?= ucfirst($title) ?>
                                </h4>
                                <?php if ($tag == 'edit') {
                                    if ($this->delete == '1') {
                                ?>
                                        <a href="<?php echo base_url() . 'resource-type-list?BdID=' . encryptId($resource[0]['rid']) ?>" class="btn btn-danger shadow btn-xs sharp is_permission" onclick="return confirm('Are you sure to delete this data?')"><i class="fa fa-trash"></i></a>
                                    <?php }
                                } else { ?>
                                    <a href="<?= base_url('resource-type-list') ?>" class="btn btn-success btn-sm">Resource Type List <i class="fa fa-list"></i></a>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post">
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Title :</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="title" name="title" value="<?= (($tag == 'edit') ? $resource[0]['title'] : '')  ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label text-white">Wages Per Day :</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="wedge_per_day" value="<?= (($tag == 'edit') ? $resource[0]['wedge_per_day'] : '')  ?>" name="wedge_per_day">
                                            </div>
                                        </div>
                                        <div class="fieldGroup row mb-3 mt-5">
                                            <h5>Add incentive range</h5>
                                            <hr>
                                            <div class="col-md-3">
                                                <label class="col-form-label text-white">Minimum Qty :</label>
                                                <input type="text" class="form-control" id="min_qty" name="min_qty[]">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label text-white">Maximum Qty :</label>
                                                <input type="text" class="form-control" id="max_qty" name="max_qty[]">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="col-form-label text-white">Amount :</label>
                                                <input type="text" class="form-control" id="amount" name="amount[]">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="col-form-label text-white">Add More</label>
                                                <a href="javascript:void(0)" class="form-control btn btn-success btn-sm addMore"><i class="fa fa-plus"></i></a>
                                            </div>
                                        </div>
                                        <div class="fieldGroupCopy row mb-3" style="display: none;">
                                            <div class="col-md-3">
                                                <label class="col-form-label text-white">Minimum Qty :</label>
                                                <input type="text" class="form-control" id="min_qty" name="min_qty[]">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label text-white">Maximum Qty :</label>
                                                <input type="text" class="form-control" id="max_qty" name="max_qty[]">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="col-form-label text-white">Amount :</label>
                                                <input type="text" class="form-control" id="amount" name="amount[]">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="col-form-label text-white">
                                                    <br>
                                                </label>
                                                <a href="javascript:void(0)" class="form-control btn btn-danger remove"><i class="fa fa-minus"></i></a>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-5"></div>
                                            <div class="col-sm-5">
                                                <input type="submit" value="Submit" class="btn btn-info">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php if ($tag == 'edit') {
                    ?>

                        <div class="col-xl-6 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Update Incentives </h4>
                                    <div class="msg"></div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="display">
                                            <thead>
                                                <tr>

                                                    <th>Minimum Qty</th>
                                                    <th>Maximum Qty</th>
                                                    <th>Amount</th>
                                                    <!-- <th></th> -->
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $i = 1;
                                                if (!empty($insentive)) {
                                                    foreach ($insentive as $row) {
                                                ?>

                                                        <tr id="<?= $row['id'] ?>">

                                                            <td> <input type="number" class="form-control" id="min_qty<?= $row['id'] ?>" name="min_qty" value="<?= $row['min_qty'] ?>" ></td>
                                                            <td> <input type="number" class="form-control" id="max_qty<?= $row['id'] ?>" name="max_qty" value="<?= $row['max_qty'] ?>"> </td>
                                                            <td><input type="number" class="form-control" id="amount<?= $row['id'] ?>" name="amount" value="<?= $row['amount'] ?>"></td>
                                                            <td>
                                                                <button type="button" class="btn btn-xs btn-info light me-1 submit_form" data-id="<?= $row['id'] ?>">
                                                                    </span>Save</button>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0)" class="btn btn-xs btn-danger light me-1 delete_exp_btn" data-expid="<?= $row['id'] ?>"><i class="fa fa-times"></i></a>
                                                            </td>
                                                        </tr>

                                                <?php
                                                        $i++;
                                                    }
                                                } else {
                                                    echo  'No data';
                                                }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>



                </div>
            </div>
            <?php $this->load->view('template/footer'); ?>
        </div>
        <?php $this->load->view('template/footer_link'); ?>
        <script type="application/javascript">
            $(document).ready(function() {
                //group add limit
                var maxGroup = 200;
                //add more fields group
                $(".addMore").click(function() {
                    if ($('body').find('.fieldGroup').length < maxGroup) {
                        var fieldHTML = '<div class="fieldGroup row">' + $(".fieldGroupCopy").html() + '</div>';
                        $('body').find('.fieldGroup:last').after(fieldHTML);
                    } else {
                        alert('Maximum ' + maxGroup + ' groups are allowed.');
                    }
                });
                //remove fields group
                $("body").on("click", ".remove", function() {
                    $(this).parents(".fieldGroup").remove();
                });
            });
        </script>


        <script>
            $('.submit_form').click(function(e) {
                e.preventDefault();
                var insID = $(this).data('id');
                // console.log(insID);
                var tableRow = $(this).closest('tr');
                var min_qty = $('#min_qty' + insID).val();
                var max_qty = $('#max_qty' + insID).val();
                var amount = $('#amount' + insID).val();
                console.log(min_qty);
                console.log(max_qty);
                console.log(amount);

                var isEmpty = true;
                if (isEmpty == true) {

                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('Admin_Dashboard/edit_insentive') ?>',
                        data: {
                            min_qty: min_qty,
                            max_qty: max_qty,
                            amount: amount,
                            insID: insID
                        },

                        beforeSend: function() {
                            $(".submit_form" + insID).html("Loading.. <i class='fa fa-spin fa-spinner'></i>").attr('disabled', true);
                        },
                        success: function(response) {
                            $(".msg").html(response);
                            $(".submit_form" + insID).html("").attr('disabled', false);
                            $(".submit_form" + insID).text("Save");
                            tableRow.load();

                        },
                    });
                }
            });


            $(document).on("click", ".delete_exp_btn", function(e) {
                e.preventDefault();
                if (confirm("Do you really want to delete this record ?")) {
                    var tableRow = $(this).closest('tr');
                    var expId = $(this).data("expid");
                    $.ajax({
                        url: "<?= base_url('Admin_Dashboard/delete_insentive') ?>",
                        type: "POST",
                        data: {
                            expId: expId
                        },
                        success: function(response) {
                            $(".msg").html(response);
                            tableRow.find('td').fadeOut('fast',
                                function() {
                                    tableRow.remove();
                                }
                            );
                        }
                    });
                }
            });

            $(".success-alert").fadeTo(2000, 500).slideUp(500, function() {
                $(".success-alert").slideUp(500);
            });
        </script>

</body>

</html>