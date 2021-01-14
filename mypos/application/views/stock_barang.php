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
                <h3 class="card-title">Stock Barang</h3>
              </div>             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Barang</th>
                  <th>Nama Produk</th>
                  <th>kategori</th>
                  <th>Jenis</th>
                  <th>Exp</th>
                  <th>Stock</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($barang as $key) : ?>
                  <tr>
                    <td><?php echo $key->id_barang ?></td>
                    <td><?php echo $key->nama_produk ?></td>
                    <td><?php echo $key->kategori ?></td>
                    <td><?php echo $key->jenis ?></td>
                    <td><?php echo $key->exp ?></td>
                    <td><?php echo $key->stock ?></td>
                  </tr>
                <?php endforeach ?>
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
<!-- ./wrapper -->