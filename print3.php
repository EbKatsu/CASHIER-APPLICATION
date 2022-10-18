<?php 
  require 'config.php';
  include $view;
  $lihat = new view($config);
  $toko = $lihat -> toko();
  $hasil = $lihat -> jmlbeban(); 
  $hasl = $lihat -> jumlah_nota();
  $jmllabarugi = $hasl['bayar'] - $hasil['bayar'];
?>
<html>
  <head>
    <title>print</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
  </head>
  <body>
    <script>window.print();</script>
    <div class="container">
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
          <center>
            <p><?php echo $toko['nama_toko'];?></p>
            <p><?php echo $toko['alamat_toko'];?></p>
            <p>Tanggal : <?php  echo date("j F Y, G:i");?></p>
          </center>
          <table class="table table-bordered" style="width:100%;">
            <tr>
              <td>No.</td>
              <td>Pendapatan</td>
              <td>Beban</td>
              <td>Laba Rugi</td>
            </tr>
            <?php $no=1; ?>
            <tr>
              <td><?php echo $no;?></td>
              <td>Rp.<?php echo number_format($hasl['bayar']);?>,-</td>
              <td>Rp.<?php echo number_format($hasil['bayar']);?>,-</td>
              <td>Rp.<?php echo number_format($jmllabarugi);?></td>
            </tr>
           
          </table>
          
          <div class="clearfix"></div>
          
        </div>
        <div class="col-sm-4"></div>
      </div>
    </div>
  </body>
</html>
