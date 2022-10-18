 <!--sidebar end-->

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
 <!--main content start-->
 <?php
	$id = $_GET['menu'];
	$hasil = $lihat->menu_edit($id);
	?>
 <section id="main-content">
 	<section class="wrapper">

 		<div class="row">
 			<div class="col-lg-12 main-chart">
 				<a href="index.php?page=menu"><button class="btn btn-primary"><i class="fa fa-angle-left"></i> Balik </button></a>
 				<h3>Details menu</h3>
 				<?php if (isset($_GET['success-stok'])) { ?>
 					<div class="alert alert-success">
 						<p>Tambah Stok Berhasil !</p>
 					</div>
 				<?php } ?>
 				<?php if (isset($_GET['success'])) { ?>
 					<div class="alert alert-success">
 						<p>Tambah Data Berhasil !</p>
 					</div>
 				<?php } ?>
 				<?php if (isset($_GET['remove'])) { ?>
 					<div class="alert alert-danger">
 						<p>Hapus Data Berhasil !</p>
 					</div>
 				<?php } ?>
 				<table class="table table-striped">
 					<tr>
 						<td>ID menu</td>
 						<td><?php echo $hasil['id_menu']; ?></td>
 					</tr>
 					<tr>
 						<td>Nama menu</td>
 						<td><?php echo $hasil['nama_menu']; ?></td>
 					</tr>
 					<tr>
 						<td>Deskripsi menu</td>
 						<td><?php echo $hasil['deskripsi']; ?></td>
 					</tr>
 					<tr>
 						<td>Stok</td>
 						<td><?php echo $hasil['stok']; ?></td>
 					</tr>
 					<tr>
 						<td>Terjual</td>
 						<td><?php echo $hasil['terjual']; ?></td>
 					</tr>
 				</table>
 				<div class="clearfix" style="padding-top:16%;"></div>
 			</div>
 		</div>
 	</section>
 </section>