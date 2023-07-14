<?php


$jsonCompany = array();
$jsonData = array();
$openlist = array();

foreach ($company as $companydata) {

  $jsonCompany[] = $companydata['name'];

  $sql = $this->CommonModal->runQuery("SELECT COUNT(*) AS total_records, SUM(CASE WHEN attendance = '1' THEN 1 ELSE 0 END) AS present_records  FROM tbl_work_update WHERE  MONTH(create_date) = MONTH(CURDATE()) AND  `company` =  '" . $companydata['did'] . "'");
  $daysInMonth = date('t');

  $attendancePercentage = 0;

  if ($sql != '') {
    foreach ($sql as $row) {
      $totalRecords = $row['total_records'];
      $presentRecords = $row['present_records'];

      $attendancePercentage = $totalRecords > 0 ? round(($presentRecords / $daysInMonth) * 100, 2) : 0;

      $attendancePercentage = number_format($attendancePercentage);

      $jsonData[] = $attendancePercentage;
    }
  }

  $fq = $this->CommonModal->runQuery("SELECT SUM(qc.qc_accepted) AS total_qc_accepted FROM tbl_qc_update qc WHERE company_id =  '" . $companydata['did'] . "'  AND qc.date =  '" . date('Y-m-d') . "' ")[0];
  $raw = $this->CommonModal->runQuery("SELECT * FROM `tbl_raw_material` WHERE company =  '" . $companydata['did'] . "'  AND date =  '" . date('Y-m-d') . "' ")[0];

  $openlist = $fq['total_qc_accepted'] > 0 ? round(($fq['total_qc_accepted'] / $raw['raw']) * 100, 2) : 0;

  if (is_finite($openlist)) {
    $openlist[] = '0';
  } else {
    $openlist[] = $openlist;
  }
}

$jsonCompany = json_encode($jsonCompany);
$jsonData = json_encode($jsonData);
$openlist = json_encode($openlist);
?>

<div class="row mt-3 mb-3">
  <div class="col-xl-6 col-xxl-6">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Attendance Graph</h4>
      </div>
      <div class="card-body">
        <canvas id="chartOne" style="width:100%;max-width:600px"></canvas>
      </div>
    </div>
  </div>
  <div class="col-xl-6 col-xxl-6">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Open % For QC</h4>
      </div>
      <div class="card-body">
        <canvas id="chartTwo" style="width:100%;max-width:600px"></canvas>
      </div>
    </div>
  </div>
</div>
<script src="<?= base_url() ?>assets/admin/vendor/chart.js/Chart.bundle.min.js"></script>

<!-- Chart piety plugin files -->
<!--<script src="<?= base_url() ?>assets/admin/vendor/peity/jquery.peity.min.js"></script>-->

<!-- Apex Chart -->
<!--<script src="<?= base_url() ?>assets/admin/vendor/apexchart/apexchart.js"></script>-->


<script>
  //Chart One
  var xValues = <?= $jsonCompany ?>;
  var yValues = <?= $jsonData ?>;
  var barColors = ["red", "green", "blue", "orange", "brown"];

  new Chart("chartOne", {
    type: "bar",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      legend: {
        display: false
      },
      title: {
        display: true,
        text: "Attendance Graph",
        color: '#000'
      }
    }
  });

  //Chart Two
  var xValuesTwo = <?= $jsonCompany ?>;
  var yValuesTwo = <?= $openlist ?>;
  var barColorsTwo = ["red", "green", "blue", "orange", "brown"];

  new Chart("chartTwo", {
    type: "bar",
    data: {
      labels: xValuesTwo,
      datasets: [{
        backgroundColor: barColorsTwo,
        data: yValuesTwo
      }]
    },
    options: {
      legend: {
        display: false
      },
      title: {
        display: true,
        text: "Open % For QC",
        color: '#000'
      }
    }
  });
</script>

