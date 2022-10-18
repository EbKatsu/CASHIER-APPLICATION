<?php 
	require 'config.php';
	include $view;
	$lihat = new view($config);
	$toko = $lihat -> toko();
	$hsl = $lihat -> beban();
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
							<td>Beban</td>
							<td>Keterangan</td>
							<td>Biaya</td>
						</tr>
						<?php $no=1; foreach($hsl as $isi){?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $isi['nama_beban'];?></td>
							<td><?php echo $isi['keterangan'];?></td>
							<td>Rp.<?php echo number_format( $isi['biaya']);?></td>
						</tr>
						<?php $no++; }?>
					</table>
					<div class="pull-right">
						<?php $hasil = $lihat -> jmlbeban(); ?>
						Total : Rp.<?php echo number_format($hasil['bayar']);?>,-
						<br/>
					</div>
					<div class="clearfix"></div>
					
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
	</body>
</html>
