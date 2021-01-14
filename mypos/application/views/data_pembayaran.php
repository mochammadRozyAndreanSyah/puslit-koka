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
                <h3 class="card-title">Data Pembayaran</h3>
              </div>
              <!--Edit data -->
              <?php foreach ($pembayaran as $key) : ?>
      <div class="modal fade" id="update<?php echo $key->id_pembayaran ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Pembayaran</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url("Data_pembayaran/edit") ?>" method="post" class="form-horizontal form-label-left">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Pembayaran</label>
                    <input type="text" class="form-control" id="id_pembayaran" name="id_pembayaran" value="<?php echo $key->id_pembayaran ?>" readonly="readonly" required="required">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Pembayaran</label>
                    <input type="text" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran" placeholder="Tanggal Pembayaran" readonly="readonly" required="required" value="<?php echo $key->tanggal_pembayaran ?>">
                  </div>                  
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Potongan</label>
                    <input type="text" class="form-control" id="potongan" name="potongan" placeholder="RP"  required="required" value="<?php echo $key->potongan ?>">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Tagihan</label>
                    <input type="number" min="0" class="form-control" id="total_tagihan" name="total_tagihan" placeholder="RP" readonly="readonly" required="required" value="<?php echo $key->total_tagihan ?>">
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Term 1</label>
                    <input type="text" class="form-control" id="term_1" name="term_1" placeholder=""  required="required" value="<?php echo $key->term_1 ?>">
                  </div>
                  <div class="form-group">
                    <label>Term 2</label>                
                    <input type="file" name="term_2" class="form-control" id="term_2"value="<?php echo $key->term_2 ?>">
                    <input type="hidden" name="old_image" value="<?php echo $key->term_2 ?>" />
                  </div>
                  <div class="form-group">
                    <label>Term 3</label>                
                    <input type="file" name="term_3" class="form-control" id="term_3"value="<?php echo $key->term_3 ?>">
                    <input type="hidden" name="old_image" value="<?php echo $key->term_3 ?>" />
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                    <select required class="form-control" id="status" name="status">
                      <option>--pilih--</option>
                      <option>Lunas</option>
                      <option>Belum Lunas</option>
                    </select> 
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
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Pembayaran</th>
                  <th>Tanggal Pembayaran</th>
                  <th>Potongan</th>
                  <th>Total Tagihan</th>
                  <th>Term 1</th>
                  <th>Term 2</th>
                  <th>Term 3</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($pembayaran as $key) : 
                  $image1 = base_url("upload/buktipembayaran/"). $key->term_1;
                  $image2 = base_url("upload/buktipembayaran/"). $key->term_2;
                  $image3 = base_url("upload/buktipembayaran/"). $key->term_3;
                  ?>
                  
                  <tr>
                    <td><?php echo $key->id_pembayaran ?></td>
                    <td><?php echo $key->tanggal_pembayaran ?></td>
                    <td><?php echo $key->potongan ?></td>
                    <td><?php echo $key->total_tagihan ?></td>
                    <td><a href="<?=$image1; ?>" data-caption="<?php echo $key->id_pembayaran ?>" data-fancybox> <img class="img-fluid" style="height: 80px; width:80px;" src=<?=$image1; ?>></a></td>
                    <td><a href="<?=$image2; ?>" data-caption="<?php echo $key->id_pembayaran ?>" data-fancybox> <img class="img-fluid" style="height: 80px; width:80px;" src=<?=$image2; ?>></a></td>
                    <td><a href="<?=$image3; ?>" data-caption="<?php echo $key->id_pembayaran ?>" data-fancybox> <img class="img-fluid" style="height: 80px; width:80px;" src=<?=$image3; ?>></a></td>
                    
                    <td><?php echo $key->status ?></td>
                    <td>
                           <div class="form-group">
                              <a id="id_pembayaran_edit" name="id_pembayaran_edit" href="#" data-toggle="modal" data-target="#update<?php echo $key->id_pembayaran ?>" class="btn btn-primary">Edit</a>                  
                              <a class="btn btn-success"  href="<?= base_url('Data_Pembayaran/print/').$key->id_pembayaran?>" target="_blank"> Cetak</a>
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


