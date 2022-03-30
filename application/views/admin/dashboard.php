<?php $this->load->view('templates_admin/header');?>
<?php $this->load->view('templates_admin/sidebar_akun');?>
<!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Perubahan Stok Hari ini</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->db->count_all('stok') ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Earnings (Annual) Card Example -->
                                <div class="col-3 col-md-6 mb-4">
                                    <div class="card border-left-success shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Jumlah Ikan</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->db->count_all('ikan') ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg">

                                <!-- Basic Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary text-center">Grafik Penjualan</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="myAreaChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="col-lg">

                                <!-- Basic Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary text-center">Penjualan Yang Sedang Diproses</h6>
                                    </div>
                                    <div class="card-body">
                                        <table id="tables" class="table table-hover text-nowrap">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nomor Penjualan</th>
                                                    <th>Nama Pembeli</th>
                                                    <th>Total Harga</th>
                                                    <th>Tanggal Dibuat</th>
                                                </tr>
                                            </thead>
                                            <?php 
                                            $no=1;
                                            foreach ($proses as $prs):
                                            ?>
                                                <tr>
                                                    <td><?= $no++?></td>
                                                    <td><?= $prs->no_penjualan?></td>
                                                    <td><?= $prs->nama_pembeli?></td>
                                                    <td>Rp <?= number_format($prs->total_harga,0,',','.')?></td>
                                                    <td><?= $prs->tanggal_dibuat?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            <!-- End of Main Content -->

<?php 
    $penjualan = "";
    $tanggal = "";
  foreach ($grafik1 as $row) :
    $pjl1 = $row->jumlah;
    // $penjualan .= "'$pjl'" . ",";

    $tgl = substr($row->tanggal_dibuat,8,-9);
    $tanggal .= "'$tgl'" . ",";
  endforeach;

  foreach ($grafik2 as $row) :
    $pjl2 = $row->jumlah;
    // $penjualan .= "'$pjl'" . ",";

    $tgl = substr($row->tanggal_dibuat,8,-9);
    $tanggal .= "'$tgl'" . ",";
  endforeach;

  foreach ($grafik3 as $row) :
    $pjl3 = $row->jumlah;
    // $penjualan .= "'$pjl'" . ",";

    $tgl = substr($row->tanggal_dibuat,8,-9);
    $tanggal .= "'$tgl'" . ",";
  endforeach;

  foreach ($grafik4 as $row) :
    $pjl4 = $row->jumlah;
    // $penjualan .= "'$pjl'" . ",";

    $tgl = substr($row->tanggal_dibuat,8,-9);
    $tanggal .= "'$tgl'" . ",";
  endforeach;

    $test = "'$pjl1',"."'$pjl2',"."'$pjl3',"."'$pjl4'";
?>
<?php $this->load->view('templates_admin/footer');?>
<script>
    // Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Januari','Februari','Maret','April','Juni','Juli'],
    datasets: [{
      label: "Jumlah Penjualan Perbulan",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: 
      [<?= $test ?>],

    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '$' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

</script>
<script>
  $(document).ready(function() {
    $('#tables').DataTable();
} );
</script>