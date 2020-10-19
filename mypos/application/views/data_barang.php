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
                <h3 class="card-title">Data Barang</h3>
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
                        <h4 class="modal-title">Data Barang</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                <div class="modal-body">
              <!-- form start -->
              <form action="<?php echo base_url("Data_barang/tambah") ?>" method="post" class="form-horizontal form-label-left">
                <!-- <div class="card-body"> -->
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Barang</label>
                    <input type="text" class="form-control" id="id_barang_isi" name="id_barang_isi" value="<?php echo $kode ?>" readonly="readonly" required="required">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk_isi" name="nama_produk_isi" placeholder="Nama Produk" required="required">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis</label>
                    <select required class="form-control" id="jenis_isi" name="jenis_isi">
                      <option>--pilih--</option>
                      <option>Kopi</option>
                      <option>Kakao</option>
                    </select> 
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori</label>
                    <input type="text" class="form-control" id="kategori_isi" name="kategori_isi" placeholder="Kategori" required="required">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Satuan</label>
                    <select required class="form-control" id="satuan_isi" name="satuan_isi">
                      <option>--pilih--</option>
                      <option>Butir</option>
                      <option>Batang</option>
                      <option>Kg</option>
                      <option>Entres</option>
                    </select> 
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga</label>
                    <input type="number" min="0" class="form-control" id="harga_isi" name="harga_isi" placeholder="RP" required="required">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Exp</label>
                    <input type="date" class="form-control" id="exp_isi" name="exp_isi" required="required">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Stock</label>
                    <input type="number" min="0" class="form-control" id="stock_isi" name="stock_isi" placeholder="Stock" required="required">
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
    <?php foreach ($barang as $key) : ?>
      <div class="modal fade" id="update<?php echo $key->id_barang ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url("Data_barang/edit") ?>" method="post" class="form-horizontal form-label-left">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Barang</label>
                    <input type="text" class="form-control" id="id_barang_edit" name="id_barang_edit" value="<?php echo $key->id_barang ?>" readonly="readonly" required="required">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk_edit" name="nama_produk_edit" placeholder="Nama Produk" required="required" value="<?php echo $key->nama_produk ?>">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis</label>
                    <select required class="form-control" id="jenis_edit" name="jenis_edit">
                      <option>--pilih--</option>
                      <option>Kopi</option>
                      <option>Kakao</option>
                    </select> 
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori</label>
                    <input type="text" class="form-control" id="kategori_edit" name="kategori_edit" placeholder="Kategori" required="required" value="<?php echo $key->kategori ?>">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Satuan</label>
                    <select required class="form-control" id="satuan_edit" name="satuan_edit">
                      <option>--pilih--</option>
                      <option>Butir</option>
                      <option>Batang</option>
                      <option>Kg</option>
                      <option>Entres</option>
                    </select> 
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga</label>
                    <input type="number" min="0" class="form-control" id="harga_edit" name="harga_edit" placeholder="RP" required="required" value="<?php echo $key->harga ?>">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Exp</label>
                    <input type="date" class="form-control" id="exp_edit" name="exp_edit" required="required" value="<?php echo $key->exp ?>">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Stock</label>
                    <input type="number" min="0" class="form-control" id="stock_edit" name="stock_edit" placeholder="Stock" required="required" value="<?php echo $key->stock ?>">
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
                    <th>ID Barang</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Jenis</th>
                    <th>Satuan</th>
                    <th>harga</th>
                    <th>action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($barang as $key) : ?>
                      <tr>
                        <td><?php echo $key->id_barang ?></td>
                        <td><?php echo $key->nama_produk ?></td>
                        <td><?php echo $key->jenis ?></td>
                        <td><?php echo $key->kategori ?></td>
                        <td><?php echo $key->satuan ?></td>
                        <td><?php echo $key->harga ?></td>
                        <td>
                           <div class="form-group">
                              <a id="id_barang_edit" name="id_barang_edit" href="#" data-toggle="modal" data-target="#update<?php echo $key->id_barang ?>" class="btn btn-primary btn-sm glyphicon glyphicon-pencil">Edit</a>

                              <a id="id_barang_hapus" name="id_barang_hapus" href="#" data-toggle="modal" data-target="#delete<?php echo $key->id_barang ?>" class="btn btn-danger btn-sm glyphicon glyphicon-remove">Hapus</a>
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
<?php foreach ($barang as $key) : ?>
       <div class="modal fade" id="delete<?php echo $key->id_barang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Hapus Data Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">INGAT !!! Data yang sudah terhapus tidak dapat di kembalikan lagi.</div>
            <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo base_url("data_barang/hapus/$key->id_barang") ?>">Hapus</a>
                </div>
            </div>
        </div>
        </div>
<?php endforeach ?>