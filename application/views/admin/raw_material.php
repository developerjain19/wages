<?php $this->load->view('template/header_link'); ?>

<body>
    <div id="main-wrapper">

        <?php $this->load->view('template/header'); ?>
        <div class="content-body">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <?php if ($this->session->userdata('msg') != '') { ?>
                                <?= $this->session->userdata('msg'); ?>
                            <?php  }
                            $this->session->unset_userdata('msg'); ?>
                            <div class="card-header">
                                <h4 class="card-title"><?= $title ?></h4>

                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example23" class="display">
                                        <thead>
                                            <tr>
                                                <th>SNo</th>
                                                <th>Date</th>
                                                <th>company </th>
                                                <th>Raw Material</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;

                                            if (!empty($work)) {
                                                foreach ($work as $row) {

                                                    $divIn = getRowById('tbl_company', 'did', $row['company']);
                                            ?>
                                                    <tr class="<?= (($this->edit == '1') ? 'raw_material' : ''); ?>" data-id="<?= $row['id'] ?>">
                                                        <td><?= $i ?></td>
                                                        <td><?= $row['date'] ?></td>
                                                        <td><?= $divIn[0]['name'] ?>
                                                        </td>
                                                        <td> <?= $row['raw'] ?>KG</td>


                                                    </tr>
                                                

                                            <?php
                                                    $i++;
                                                }
                                            } else {
                                              
                                            }
                                            ?>
                                    </table>

                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('template/footer'); ?>
        </div>
        <?php $this->load->view('template/footer_link'); ?>
        <script>
            $(document).ready(function() {
                $('.raw_material').on('click', function() {
                    var raw_materialId = $(this).data('id');
                    window.location.href = "<?= base_url('raw-material-edit/') ?>" + raw_materialId;
                });
            });
        </script>



</body>

</html>