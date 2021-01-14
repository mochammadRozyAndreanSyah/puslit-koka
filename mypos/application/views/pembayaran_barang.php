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
                <h3 class="card-title">Pembayaran Barang</h3>
              </div>
              <div class="clearfix">
              </div>
              <div class="card-body">
                <form name="myform" novalidate action="<?php echo base_url("Pembayaran_barang/add") ?>" method="post" role="form" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-10">
                      <!-- text input -->
                      <div class="form-group">
                        <label>ID Pembayaran</label>
                        <div class="col-md-4 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" id="id_pembayaran" name="id_pembayaran" placeholder="Enter ..." required="required">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control has-feedback-left" id="single_cal2" placeholder="Expired" name="tanggal_pembayaran" required="required">
                      </div>
                    </div>
                  </div>
                      <!-- text input -->
                      <div class="form-group">
                        <label>ID Pemesanan</label>
                        <div class="col-md-4 col-sm-7 col-xs-12">
													<select class="select2 form-control" id="id_pemesanan" name="id_pemesanan" required>
														<option value="&nbsp"></option>
														<?php foreach ($pb as $key) : ?>
															<option value="<?php echo $key->id_pemesanan ?>"><?php echo $key->id_pemesanan ?></option>
														<?php endforeach ?>
													</select>
                        </div>
                      </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>ID Customers</label>
                        <input type="text" class="form-control" id="id_pb" name="id_pb" readonly /></input>
                      </div>
                    </div>
                    <!-- <div class="col-sm-3">
                      <div class="form-group">
                        <label>Nama Customers</label>
                        <input type="text" class="form-control" id="nama_cs" name="nama_cs" readonly /></input>
                      </div>
                    </div> -->
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Tanggal Pemesanan</label>
                        <input type="text" class="form-control" id="tgl_pb" name="tgl_pb" readonly /></input>
                      </div>
                    </div>
                    <!-- <div class="col-sm-3">
                      <div class="form-group">
                        <label>Alamat Tujuan</label>
                        <input type="text" class="form-control" id="alamat_perusahaan_cs" name="alamat_perusahaan_cs" readonly /></input>
                      </div>
                    </div> -->
                  </div>
                </div>
      <!-- /.card-header -->
            <div class="form-group col-sm-12">
                <label class="control-label col-sm-8">Total</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" min="0" id="total_pb" name="total_pb" placeholder="Rp." readonly /></input>
                  </div>
            </div>
            <div class="form-group col-sm-12">
                <label class="control-label col-sm-8">Potongan</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" min="0" id="potongan" name="potongan" placeholder="Rp." required="required">
                  </div>
            </div>
            <div class="form-group col-sm-12">
                <label class="control-label col-sm-8">Total Tagihan</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" min="0" id="total_tagihan" name="total_tagihan" placeholder="Rp." readonly /></input>
                  </div>
            </div>
            
            <div class="alert alert-primary">
                <strong>Upload Bukti Pembayaran</strong>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="ExampleInputNama">Term 1</label>
                        <input type="file" name="term_1">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="ExampleInputNama">Term 2</label>
                        <input type="file" name="term_2">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="ExampleInputNama">Term 3</label>
                        <input type="file" name="term_3">
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-12">
                    <label class="control-label col-sm-8">Status Pembayaran</label>
                    <select required class="form-control col-sm-2" id="status" name="status">
                      <option>--pilih--</option>
                      <option>Lunas</option>
                      <option>Belum Lunas</option>
                    </select> 
                  </div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 ">
                  <button type="submit" id="submit" name="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
          </form>
            
          </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
</div>

<script>
$(document).ready(function() {
	
	$("#id_pemesanan").select({
		placeholder: "Masukkan ID Pemesanan",
		minimumInputLength: 1
	});

  $("#potongan").on("input", function() {
            var total_pb = $("#total_pb").val();
            var potongan = $('#potongan').val();
            var potongan_default = 0;
            var total_tagihan = total_pb - (potongan_default + potongan);
            $('#total_tagihan').val(total_tagihan);
        });

	$("#id_pemesanan").on("change", function() {
		var id_pemesanan = $("#id_pemesanan").val();
		$.ajax({
			url: "<?php echo base_url("pembayaran_barang/data_pemesanann") ?>",
			type: "POST",
			dataType: "JSON",
			data: {
				id_pemesanan: id_pemesanan
			},
			cache: false,
			success: function(data) {
				$("#id_pb").val(data.id_customers);
				$("#tgl_pb").val(data.tanggal);
        $("#total_pb").val(data.total_harga);
			}
		})
	});
});
</script>