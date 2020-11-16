<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pemesanan</h3>
              </div>             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode Pemesanan</th>
                  <th>ID Customers</th>
                  <th>Tanggal</th>
                  <th>Total Harga</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($pemesanan as $key) : ?>
                  <tr>
                    <td><?php echo $key->id_pemesanan ?></td>
                    <td><?php echo $key->id_customers ?></td>
                    <td><?php echo $key->tanggal ?></td>
                    <td><?php echo $key->total_harga ?></td>
                    <td>
                    <div class="form-group">
                    <a class="btn btn-warning"  href="<?= base_url('Data_Pemesanan/print/').$key->id_pemesanan?>" target="_blank" class="fa fa-print"> CETAK </button></a>
                    </div>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Detail Pemesanan</h3>
              </div>             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode Pemesanan</th>
                  <th>ID Barang</th>
                  <th>Nama Produk</th>
                  <th>Kategori</th>
                  <th>Jenis</th>
                  <th>Satuan</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Sub Total</th>
                  <!-- <th>Action</th> -->
                </tr>
              </thead>
              <tbody>
                <?php foreach ($dp as $key) : ?>
                  <tr>
                    <td><?php echo $key->id_pemesanan ?></td>
                    <td><?php echo $key->id_barang ?></td>
                    <td><?php echo $key->nama_produk ?></td>
                    <td><?php echo $key->kategori ?></td>
                    <td><?php echo $key->jenis ?></td>
                    <td><?php echo $key->satuan ?></td>
                    <td><?php echo $key->qty ?></td>
                    <td><?php echo $key->harga ?></td>
                    <td><?php echo $key->subtotal ?></td>
                    <!-- <td>
                    <a class="btn btn-block btn-success">Print</a>
                    </td> -->
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->