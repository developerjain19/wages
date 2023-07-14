<?php
$jsonCompany = array();
$successrate = array();
$worktoday = array();

foreach ($company as $companydatap) {

  $jsonCompany[] = $companydatap['name'];

  $sql2 = $this->CommonModal->runQuery("SELECT  SUM(qc_accepted) AS QCaccepted , SUM(quantity) AS mqty FROM tbl_qc_update WHERE  MONTH(create_date) = MONTH(CURDATE()) AND  `company_id` =  '" . $companydatap['did'] . "'");


  $successrate = $sql2['mqty'] > 0 ? round(($sql2['QCaccepted'] / $sql2['mqty']) * 100, 2) : 0;

  if (is_finite($successrate)) {
    $successrate[] = '0';
  } else {
    $successrate[] = $successrate;
  }

  $fqc = $this->CommonModal->runQuery("SELECT SUM(fqc_accepted) AS total_fqc_accepted FROM tbl_work_update WHERE company =  '" . $companydatap['did'] . "'  AND date =  '" . date('Y-m-d') . "' ")[0];
  $raw = $this->CommonModal->runQuery("SELECT * FROM `tbl_raw_material` WHERE company =  '" . $companydatap['did'] . "'  AND date =  '" . date('Y-m-d') . "' ")[0];

  $worktoday = $fqc['total_fqc_accepted'] > 0 ? round(($fqc['total_fqc_accepted'] / $raw['raw']) * 100, 2) : 0;

  if (is_finite($worktoday)) {
    $worktoday[] = '0';
  } else {
    $worktoday[] = $worktoday;
  }
}

$jsonCompany = json_encode($jsonCompany);
$successrate = json_encode($successrate);
$worktoday = json_encode($worktoday);
?>

<div class="row mt-3 mb-3">
  <div class="col-xl-6 col-xxl-6">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Work Today</h4>
      </div>
      <div class="card-body">
        <canvas id="chartthree" style="width:100%;max-width:600px"></canvas>
      </div>
    </div>
  </div>
  <div class="col-xl-6 col-xxl-6">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">QC Success Rate</h4>
      </div>
      <div class="card-body">
        <canvas id="chartfour" style="width:100%;max-width:600px"></canvas>
      </div>
    </div>
  </div>
</div>
<script src="<?= base_url() ?>assets/admin/vendor/chart.js/Chart.bundle.min.js"></script>

<script>
  //Chart three
  var xValuesthree = <?= $jsonCompany ?>;
  var yValuesthree = <?= $worktoday ?>;
  var barColorsthree = ["red", "green", "blue", "orange", "brown"];

  new Chart("chartthree", {
    type: "bar",
    data: {
      labels: xValuesthree,
      datasets: [{
        backgroundColor: barColorsthree,
        data: yValuesthree
      }]
    },
    options: {
      legend: {
        display: false
      },
      title: {
        display: true,
        text: "Work Today",
        color: '#000'
      }
    }
  });

  //Chart Four
  var xValuesfour = <?= $jsonCompany ?>;
  var yValuesfour = <?= $successrate ?>;
  var barColorsfour = ["red", "green", "blue", "orange", "brown"];

  new Chart("chartfour", {
    type: "bar",
    data: {
      labels: xValuesfour,
      datasets: [{
        backgroundColor: barColorsfour,
        data: yValuesfour
      }]
    },
    options: {
      legend: {
        display: false
      },
      title: {
        display: true,
        text: "QC Success Rate",
        color: '#000'
      }
    }
  });
</script>