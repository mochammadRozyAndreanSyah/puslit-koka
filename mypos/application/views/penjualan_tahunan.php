<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Penjualan Tahunan</h3>
              </div>
              <div class="clearfix">
              </div>
              <div calss="card-body">
                <div class="col-md-2">
                  <div class="form-group">
                      <button type="button" class="btn btn-success">Print</button>
                  </div>
                </div>
              <form>
              <div class="col-md-2">
                <div class="form-group">
                  <label for="">Tahun</label>
                  <div class="input-group">
                    <select class="form-control" id="tahun" name="tahun" required="required">
                      <?php foreach ($year as $key) : ?>
                        <option value="<?php echo $key->year ?>"><?php echo $key->year ?></option>
                      <?php endforeach; ?>
                    </select>
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-primary" id="filter">Filter</button>
                    </span>
                  </div>
                </div>
              </div>
              </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>NO</th>
                    <th>ID Pembayaran</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Potongan</th>
                    <th>Total Tagihan</th>
                  </tr>
                  </thead>
                  <tbody id="table">                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>

<!-- <script>
    function print_d() {
      var tanggal = $("#single_cal2").val();

      window.open("<?php echo base_url("kasir/Laporan_harian/print/") ?>" + tanggal, "_blank");
    }
  </script> -->
  <script type="text/javascript">
  $(document).ready(function() {
    $("#filter").on("click", function() {
      
      var year = $("#tahun").val();

      $.ajax({
        url: "<?php echo base_url("penjualan_tahunan/show_cart") ?>",
        method: "POST",
        data: {
         
          tahun: tahun
        },
        success: function(data) {
          $('#table').html(data);
        }
      })
    });

    $('#table').load("<?php echo base_url('Penjualan_Tahunan/load_cart'); ?>");
  })
</script> 