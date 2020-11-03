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
                <h3 class="card-title">Data Pemesanan Barang</h3>
              </div>
              <div class="clearfix">
              </div>

              <div class="card-body">
                <form action="<?php echo base_url("Pemesanan_barang/add") ?>" method="post" role="form">
                  <div class="row">
                    <div class="col-sm-10">
                      <!-- text input -->
                      <div class="form-group">
                        <label>ID Pemensanan</label>
                        <div class="col-md-4 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" id="id_pemesanan" name="id_pemesanan" placeholder="Enter ..." required="required">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control has-feedback-left" id="single_cal2" placeholder="Expired" name="tanggal" required="required">
                      </div>
                    </div>
                  </div>
                      <!-- text input -->
                      <div class="form-group">
                        <label>ID Customers</label>
                        <div class="col-md-4 col-sm-7 col-xs-12">
													<select class="select2 form-control" id="id_customers" name="id_customers" required>
														<option value="&nbsp"></option>
														<?php foreach ($cs as $key) : ?>
															<option value="<?php echo $key->id_customers ?>"><?php echo $key->id_customers ?> | <?php echo $key->nama_customers ?></option>
														<?php endforeach ?>
													</select>
                        </div>
                      </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Nama Customers</label>
                        <input type="text" class="form-control" id="nama_cs" name="nama_cs" readonly /></input>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>alamat</label>
                        <input type="text" class="form-control" id="alamat_cs" name="alamat_cs" readonly /></input>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="number" class="form-control" id="no_telp_cs" name="no_telp_cs" readonly /></input>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Alamat Tujuan</label>
                        <input type="text" class="form-control" id="alamat_perusahaan_cs" name="alamat_perusahaan_cs" readonly /></input>
                      </div>
                    </div>
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
                        <h4 class="modal-title" id="myModalLabel">Data Barang</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                <div class="modal-body">
              <!-- form start -->
              <!-- <form action="<?php echo base_url("Data_barang/tambah") ?>" method="post" class="form-horizontal form-label-left"> -->
                <!-- <div class="card-body"> -->
                  <div class="form-group">
										<label class="control-label">ID Barang</label>
										<select class="form-control" style="width: 100%;" id="id_barang_isi" name="id_barang_isi">
											<option value="&nbsp"></option>
											<?php foreach ($id as $key) : ?>
												<option value="<?php echo $key->id_barang ?>"><?php echo $key->id_barang ?> | <?php echo $key->nama_produk ?></option>
											<?php endforeach ?>
										</select>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk_isi" name="nama_produk_isi" placeholder="Nama Produk" required="required" readonly="readonly">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis</label>
                    <input type="text" class="form-control" id="jenis_isi" name="jenis_isi" placeholder="Jenis" required="required" readonly="readonly"> 
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori</label>
                    <input type="text" class="form-control" id="kategori_isi" name="kategori_isi" placeholder="Kategori" required="required" readonly="readonly">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Satuan</label>
                    <input type="text" class="form-control" id="satuan_isi" name="satuan_isi" placeholder="Satuan" required="required" readonly="readonly"> 
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga</label>
                    <input type="number" min="0" class="form-control" id="harga_isi" name="harga_isi" placeholder="RP" required="required" readonly="readonly">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Exp</label>
                    <input type="date" class="form-control" id="exp_isi" name="exp_isi" required="required">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">jumlah</label>
                    <input type="number" min="0" class="form-control" id="stock_isi" name="stock_isi" placeholder="Jumlah" required="required">
                  </div>
                  <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="reset" class="btn btn-danger">Reset</button>
              <button type="button" id="modal-submit" class="btn btn-success" data-dismiss="modal">Submit</button>
            </div>
          <!-- </form> -->
        </div>
      </div>
    </div>
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
                    <th>Harga</th>
                    <th>Exp</th>
                    <th>jumlah</th>
                    <th>Sub total</th>
                    <th>action</th>
                  </tr>
                  </thead>
                  <tbody id="pemesanan">
                </table>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 ">
                  <button type="submit" id="submit" name="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<script>
$(document).ready(function() {
	$("#id_barang_isi").select2({
		placeholder: "Masukkan no Kode barang",
		minimumInputLength: 1
	});
	$("#id_customers").select2({
		placeholder: "Masukkan ID Customers",
		minimumInputLength: 1
	});
	$("#id_customers").on("change", function() {
		var id_customers = $("#id_customers").val();
		$.ajax({
			url: "<?php echo base_url("pemesanan_barang/data_customers") ?>",
			type: "POST",
			dataType: "JSON",
			data: {
				id_customers: id_customers
			},
			cache: false,
			success: function(data) {
				$("#nama_cs").val(data.nama_customers);
				$("#alamat_cs").val(data.alamat);
				$("#no_telp_cs").val(data.no_telp);
				$("#alamat_perusahaan_cs").val(data.alamat_perusahaan);
			}
		})
	});

	$("#id_barang_isi").on("change", function() {
		var id_barang = $("#id_barang_isi").val();

		$.ajax({
			url: "<?php echo base_url("pemesanan_barang/data_barang") ?>",
			type: "POST",
			dataType: "JSON",
			data: {
				id_barang: id_barang
			},
			cache: false,
			success: function(data) {
				$("#nama_produk_isi").val(data.nama_produk);
				$("#jenis_isi").val(data.jenis);
				$("#kategori_isi").val(data.kategori);
				$("#satuan_isi").val(data.satuan);
				$("#harga_isi").val(data.harga);
			}
		})
	});

//modal
	// $("#modal-submit").on("click", function() {
	// 	var id_barang_isi = $("#id_barang_isi").val();
	// 	var nama_produk_isi = $("#nama_produk_isi").val();
	// 	var jenis_isi = $("#jenis_isi").val();
	// 	var kategori_isi = $("#kategori_isi").val();
	// 	var satuan_isi = $("#satuan_isi").val();
	// 	var harga_isi = $("#harga_isi").val();
	// 	var exp_isi = $("#exp_isi").val();
	// 	var stock_isi = $("#stock_isi").val();

	// 	$.ajax({
	// 		url: "<?php echo base_url("Data_barang/tambah") ?>",
	// 		type: "POST",
	// 		data: {
	// 			id_barang_isi: id_barang_isi,
	// 			nama_produk_isi: nama_produk_isi,
	// 			jenis_isi: jenis_isi,
	// 			kategori_isi: kategori_isi,
	// 			satuan_isi: satuan_isi,
	// 			harga_isi: harga_isi,
	// 			exp_isi: exp_isi,
	// 			stock_isi: stock_isi,
	// 		},
	// 		cache: false,
	// 		success: function(data) {
	// 			console.log('success')
	// 		}
	// 	})
	// });

	$('#add_cart').on('click', function() {
		var barang = $("#id_barang_isi").val();
		var nama_produk = $("#nama_produk_isi").val();
		var qty = $("#stock_isi").val();
		var harga = $("#harga_isi").val();
		var jenis = $("#jenis_isi").val();
		var kategori = $("#kategori_isi").val();
		var satuan = $("#satuan_isi").val();
		var exp = $("#single_cal4").val();

		$.ajax({

			url: "<?php echo base_url('kasir/pembelian_obat/cart'); ?>",
			method: "POST",
			data: {
				barang: barang,
				nama_produk: nama_produk,
				qty: qty,
				harga: harga,
				jenis: jenis,
				kategori: kategori,
				satuan: satuan,
				exp: exp
			},
			success: function(data) {
				$('#pemesanan').html(data);
				document.getElementById("id_barang_isi").value = "";
				document.getElementById("nama_produk_isi").value = "";
				document.getElementById("stock_isi").value = "";
				document.getElementById("harga_isi").value = "";
				document.getElementById("jenis_isi").value = "";
				document.getElementById("kategori_isi").value = "";
				document.getElementById("satuan_isi").value = "";
			}
		});
	});
});

$('#pemesanan').load("<?php echo base_url('pemesanan_barang/load_cart'); ?>");

$(document).on('click', '#remove_cart', function() {
	var row_id = $(this).attr("data-id");


	$.ajax({
		url: "<?php echo site_url('pemesanan_barang/hapus_cart'); ?>",
		method: "POST",
		data: {
			row_id: row_id
		},
		success: function(data) {
			$('#pembelian').html(data);
		}
	});
});

</script>
