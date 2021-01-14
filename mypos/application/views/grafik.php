<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
          
           <!-- AREA CHART -->
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Grafik Penjualan Per Bulan</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <form action="<?php echo base_url("grafik") ?>" method="post">
              <div class="col-md-offset-8">
                <div class="form-group">
                  <label for="">Tahun</label>
                  <div class="input-group">
                    <select class="form-control" id="tahun" name="tahun" required="required">
                      <?php foreach ($year as $key) : ?>
                        <option value="<?php echo $key->year ?>"><?php echo $key->year ?></option>
                      <?php endforeach; ?>
                    </select>
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-primary">Filter</button>
                    </span>
                  </div>
                </div>
              </div>
            </form>
              <div class="card-body">
                <div class="chart">
                  <canvas id="grafikperbulan"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- AREA CHART -->
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Grafik Penjualan Per Tahun</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>             
              <div class="card-body">
                <div class="chart">
                  <canvas id="grafikpertahun"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- AREA CHART -->
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Grafik Penjualan Barang</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>             
              <div class="card-body">
                <div class="chart">
                        <form action="<?php echo base_url("grafik") ?>" method="post">
                      <div class="col-md-offset-2">
                        <div class="form-group">
                          <label for="">Tahun</label>
                          <!-- <div class="input-group"> -->
                          <select class="form-control" id="tahun_barang" name="tahun_barang" required="required">
                            <?php foreach ($year as $key) : ?>
                              <option value="<?php echo $key->year ?>"><?php echo $key->year ?></option>
                            <?php endforeach; ?>
                          </select>
                          <!-- </div> -->
                          <!-- </div> -->
                          <!-- </div> -->
                          <!-- <div class="col-md-4"> -->
                          <!-- <div class="form-group"> -->
                          <label for="">Nama Obat dan Pabrik</label>
                          <div class="input-group">
                            <select class="form-control" id="id_barang" name="id_barang" required="required">
                              <?php foreach ($barang as $key) : ?>
                                <option value="<?php echo $key->id_barang ?>"><?php echo $key->nama_produk ?> | <?php echo $key->kategori ?></option>
                              <?php endforeach; ?>
                            </select>
                            <span class="input-group-btn">
                              <button type="submit" class="btn btn-primary">Filter</button>
                            </span>
                          </div>
                        </div>
                      </div>
                    </form>
                  <canvas id="grafikbarang"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <?php
          foreach ($data as $data_penjualan) {
            $total_penjualan_pertahun[] = $data_penjualan->total_penjualan;
            $tanggal_pertahun[] = $data_penjualan->tanggal;
          }
          ?>
          <?php
          foreach ($data_barang as $barang) {
            $total_penjualan_barang[] = $barang;
            // $total_penjualan_barang[] = $data_penjualan_barang->total_penjualan_barang;
            //   $merk[] = $data_penjualan_barang->merk;
            // echo $total_penjualan_barang;
          }
          ?>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
<script>
  if ($("#grafikperbulan").length) {
    var f = document.getElementById("grafikperbulan");
    new Chart(f, {
      type: "line",
      data: {
        labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
        datasets: [{
          label: "Grafik penjualan per Bulan",
          backgroundColor: "rgba(38, 185, 154, 0.31)",
          borderColor: "rgba(38, 185, 154, 0.7)",
          pointBorderColor: "rgba(38, 185, 154, 0.7)",
          pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: "rgba(220,220,220,1)",
          pointBorderWidth: 1,
          data: <?php echo json_encode($grafik); ?>
        }]
      }
    })
  }
  if ($("#grafikpertahun").length) {
    var f = document.getElementById("grafikpertahun");
    new Chart(f, {
      type: "line",
      data: {
        labels: <?php echo json_encode($tanggal_pertahun) ?>,
        datasets: [{
          label: "Grafik penjualan per Tahun",
          backgroundColor: "rgba(38, 185, 154, 0.31)",
          borderColor: "rgba(38, 185, 154, 0.7)",
          pointBorderColor: "rgba(38, 185, 154, 0.7)",
          pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: "rgba(220,220,220,1)",
          pointBorderWidth: 1,
          data: <?php echo json_encode($total_penjualan_pertahun); ?>
        }]
      }
    })
  }
  if ($("#grafikbarang").length) {
    var f = document.getElementById("grafikbarang");
    new Chart(f, {
      type: "line",
      data: {
        labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
        datasets: [{
          label: "Grafik penjualan barang",
          backgroundColor: "rgba(38, 185, 154, 0.31)",
          borderColor: "rgba(38, 185, 154, 0.7)",
          pointBorderColor: "rgba(38, 185, 154, 0.7)",
          pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: "rgba(220,220,220,1)",
          pointBorderWidth: 1,
          data: <?php echo json_encode($total_penjualan_barang); ?>
        }]
      }
    })
  }
</script>