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
                <h3 class="card-title">Data Customers</h3>
              </div>
              <div class="clearfix">
              </div>
              <div calss="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                  Tambah Data
                </button>
                <!-- Tambah Data -->
                <div class="modal fade" id="modal-lg">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Data Customers</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                <div class="modal-body">
              <!-- form start -->
              <form action="<?php echo base_url("Data_customers/tambah") ?>" method="post" class="form-horizontal form-label-left">
                <!-- <div class="card-body"> -->
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Customers</label>
                    <input type="text" class="form-control" id="id_customers_isi" name="id_customers_isi" value="<?php echo $kode ?>" readonly="readonly" required="required">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Customers</label>
                    <input type="text" class="form-control" id="nama_customers_isi" name="nama_customers_isi" placeholder="Nama Customers" required="required">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Perusahaan</label>
                    <input type="text" class="form-control" id="nama_perusahaan_isi" name="nama_perusahaan_isi" placeholder="Nama Perusahaan" required="required">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                    <input type="text" class="form-control" id="alamat_isi" name="alamat_isi" placeholder="Alamat" required="required">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">No. Telp</label>
                    <input type="text" class="form-control" id="no_telp_isi" name="no_telp_isi" placeholder="No.Telp" required="required">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat Perusahaan</label>
                    <input type="text" class="form-control" id="alamat_perusahaan_isi" name="alamat_perusahaan_isi" placeholder="Alamat Perusahaan" required="required">
                  </div>
                  <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="reset" class="btn btn-danger">Reset</button>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
    <!-- Edit Data -->
    <?php foreach ($customers as $key) : ?>
      <div class="modal fade" id="update<?php echo $key->id_customers ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Customers</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url("Data_customers/edit") ?>" method="post" class="form-horizontal form-label-left">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Customers</label>
                    <input type="text" class="form-control" id="id_customers_edit" name="id_customers_edit" value="<?php echo $key->id_customers ?>" readonly="readonly" required="required">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Customers</label>
                    <input type="text" class="form-control" id="nama_customers_edit" name="nama_customers_edit" placeholder="Nama Customers" required="required" value="<?php echo $key->nama_customers ?>">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Perusahaan</label>
                    <input type="text" class="form-control" id="nama_perusahaan_edit" name="nama_perusahaan_edit" placeholder="Nama Perusahaan" required="required" value="<?php echo $key->nama_perusahaan ?>">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                    <input type="text" class="form-control" id="alamat_edit" name="alamat_edit" placeholder="Alamat" required="required" value="<?php echo $key->alamat ?>">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">No. Telp</label>
                    <input type="text" class="form-control" id="no_telp_edit" name="no_telp_edit" placeholder="No. Telp" required="required" value="<?php echo $key->no_telp ?>">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat Perusahaan</label>
                    <input type="text" class="form-control" id="alamat_perusahaan_edit" name="alamat_perusahaan_edit" placeholder="Alamat Perusahaan" required="required" value="<?php echo $key->alamat_perusahaan ?>">
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="reset" class="btn btn-primary">Reset</button>
                  <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </form>   
            </div>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
      <!-- /.card-header -->
       <div class="card-body">
           <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID Customers</th>
                    <th>Nama Customers</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    <th>Alamat Perusahaan</th>
                    <th>action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($customers as $key) : ?>
                      <tr>
                        <td><?php echo $key->id_customers ?></td>
                        <td><?php echo $key->nama_customers ?></td>
                        <td><?php echo $key->nama_perusahaan ?></td>
                        <td><?php echo $key->alamat ?></td>
                        <td><?php echo $key->no_telp ?></td>
                        <td><?php echo $key->alamat_perusahaan ?></td>
                        <td>
                           <div class="form-group">
                              <a id="id_barang_edit" name="id_barang_edit" href="#" data-toggle="modal" data-target="#update<?php echo $key->id_customers ?>" class="btn btn-primary btn-sm glyphicon glyphicon-pencil">Edit</a>

                              <a id="id_barang_hapus" name="id_barang_hapus" href="#" data-toggle="modal" data-target="#delete<?php echo $key->id_customers ?>" class="btn btn-danger btn-sm glyphicon glyphicon-remove">Hapus</a>
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
  </div>
</div>
<!-- Delete Data -->
<?php foreach ($customers as $key) : ?>
       <div class="modal fade" id="delete<?php echo $key->id_customers ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Hapus Data Customers</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">INGAT !!! Data yang sudah terhapus tidak dapat di kembalikan lagi.</div>
            <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo base_url("data_customers/hapus/$key->id_customers") ?>">Hapus</a>
                </div>
            </div>
        </div>
        </div>
<?php endforeach ?>