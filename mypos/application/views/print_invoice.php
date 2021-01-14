<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css" media="print">
        @page {
    /* size: landscape; */
    margin: 0;

  }

  .body {
    margin:0in 0.2in 0in 0.3in;
    /* margin: 1.6cm;
    mso-header-margin:.5in;
    mso-footer-margin:.5in;
    mso-paper-source:4; */
    font-family: Arial, Helvetica, sans-serif;
   }

   .footer{
    position:absolute;
    /* right:0; */
    bottom:0;
  }
  p, td{
      font-size: 12px;
  }

    </style>
</head>
<!--  -->
<body >
    <h5 style="text-align:center;">PUSAT PENELITIAN KOPI DAN KAKAO INDONESIA<br> JL. PB. Sudirman 90, Jember, Jawa Timur, INDONESIA, Kode Pos. 68118<br> Telp. : (62331) 757130, 757132<br> Fax : (0331)-757131<br> E-mail : iccri@iccri.net</h5>

    <hr style="border-top : dotted 1px;">
        <div class="container">
            <table width="100%" cellspacing="0">
               <thead>
                <tr>
                    <th style=text-align:center;>No</th>
                    <th style=text-align:left;>ID Pembayaran</th>
                    <th style=text-align:left;>Tanggal Pembayaran</th>
                    <th style=text-align:left;> Potongan </th>
                    <th style=text-align:right;>Status Pembayaran</th>
                    <th style=text-align:right;>Tagihan</th>
                    
                    
                </tr>
            </thead>       
                <tbody>
                <?php
                $totalHarga = 0;
                $no = 1; foreach ($trans as $t): ?> 
                    <tr>
                        <td style=text-align:center;><?= $no++ ?>.</td>
                        <td style=text-align:left;><?php echo $t->id_pembayaran?></td>
                        <td style=text-align:left;><?php echo $t->tanggal_pembayaran?></td>
                        <td style=text-align:left;><?php echo $t->potongan?></td>
                        <td style=text-align:right;><?php echo $t->status?></td>
                        <td style=text-align:right;><?php echo $t->total_tagihan?></td>
                        
                    </tr>
                    <?php $totalHarga += $t->total_tagihan; endforeach ?>      
                </tbody>
                    <tr>         
                        <th style="text-align:right;" colspan="8">Total :</th>
                        <th style="text-align:right;" colspan="2">Rp. <?php echo $totalHarga?></th>

                    </tr>
                    <!-- <tr>         
                         <th style="text-align:right;" colspan="4">Bayar :</th>
                        <th style="text-align:right;" colspan="2">Rp. <?php echo $t->total_bayar?></th>
                    </tr>
                    <tr>         
                       <th style="text-align:right;" colspan="4">Kembali :</th>
                        <th style="text-align:right;" colspan="2">Rp. <?php echo $t->kembalian?> </th>
                    </tr> -->

            </table>
        </div>
       <div class="container">
            <table width="100%" cellspacing="0">
                <tr>
                    <th>Kode Pembayaram</th>
                    <td>: <?php echo $id_pembayaran?></td>
                </tr>
                <!-- <tr>
                    <th>Nama Customers</th>
                    <td>: <php echo $nama_customers?></td>
                </tr> -->
                <tr>
                    <th>Tanggal</th>
                    <td>: <?php echo $tanggal_pembayaran?></td>
                </tr>                
                <!-- <tr>
                    <th>Kasir</th>
                    <td>: <?= $this->session->userdata('username'); ?></td>
                </tr> -->
                <hr style="border-top : dotted 1px;">
            </table>
        </div>

    <hr style="border-top : dotted 1px;">
    <p style="text-align:center;">Layanan Konsumen : 0823-0158-6759</p>
    <p style="text-align:center;">BARANG YANG SUDAH DI BELI TIDAK DAPAT DI KEMBALIKAN LAGI TERIMA KASIH</p>
</body>
<script>
    window.print();
    // window.history.back();
</script>
</html>