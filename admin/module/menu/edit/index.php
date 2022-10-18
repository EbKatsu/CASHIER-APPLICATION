 <!--sidebar end-->

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
 <!--main content start-->
 <?php
	$id = $_GET['menu'];
	$hasil = $lihat->menu_view($id);
	?>
 <section id="main-content">
 	<section class="wrapper">

 		<div class="row">
 			<div class="col-lg-12 main-chart">
 				<a href="index.php?page=menu"><button class="btn btn-primary"><i class="fa fa-angle-left"></i> Balik </button></a>
 				<h3>Details menu</h3>
 				<?php if (isset($_GET['success'])) { ?>
 					<div class="alert alert-success">
 						<p>Edit Data Berhasil !</p>
 					</div>
 				<?php } ?>
 				<?php if (isset($_GET['remove'])) { ?>
 					<div class="alert alert-danger">
 						<p>Hapus Data Berhasil !</p>
 					</div>
 				<?php } ?>
 				<table class="table table-striped">
 					<form action="fungsi/edit/edit.php?menu=edit" method="POST">
 						<tr>
 							<td>ID menu</td>
 							<td><input type="text" readonly="readonly" class="form-control" value="<?php echo $hasil['id_menu']; ?>" name="id"></td>
 						</tr>
 						<tr>
 							<td>Nama menu</td>
 							<td><input type="text" class="form-control" value="<?php echo $hasil['nama_menu']; ?>" name="nama"></td>
 						</tr>
 						<tr>
 							<td>Deskripsi menu</td>
 							<td><input type="text" class="form-control" value="<?php echo $hasil['deskripsi']; ?>" name="deskripsi"></td>
 						</tr>
 						<tr>
 							<td>Harga Jual</td>
 							<td><input type="number" class="form-control" value="<?php echo $hasil['harga_jual']; ?>" name="jual"></td>
 						</tr>
 						<tr>
 							<td>Stok</td>
 							<td><input type="number" class="form-control" value="<?php echo $hasil['stok']; ?>" name="stok"></td>
 						</tr>
 						<tr>
 							<td>Tanggal Update</td>
 							<td><input type="text" readonly="readonly" class="form-control" value="<?php echo  date("Y-m-d"); ?>" name="tgl"></td>
 						</tr>
 						<tr>
 							<td></td>
 							<td><button class="btn btn-primary"><i class="fa fa-edit"></i> Update Data</button></td>
 						</tr>
 					</form>
 				</table>
 				<div class="clearfix" style="padding-top:16%;"></div>
 			</div>
 		</div>
 	</section>
 </section>