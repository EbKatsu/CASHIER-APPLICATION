 <!--sidebar end-->

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
 <!--main content start-->
 <section id="main-content">
 	<section class="wrapper">

 		<div class="row">
 			<div class="col-lg-12 main-chart">
 				<h3>Data menu</h3>
 				<br />
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

 				<?php
					$sql = " select * from menu where stok <= 3";
					$row = $config->prepare($sql);
					$row->execute();
					$r = $row->rowCount();
					if ($r > 0) {
					?>
 				<?php
						echo "
								<div class='alert alert-warning'>
									<span class='glyphicon glyphicon-info-sign'></span> Ada <span style='color:red'>$r</span> menu yang Stok tersisa sudah kurang dari 3 items. silahkan pesan lagi !!
									<span class='pull-right'><a href='index.php?page=menu&stok=yes'>Cek menu <i class='fa fa-angle-double-right'></i></a></span>
								</div>
								";
					}
					?>

 				<!-- Trigger the modal with a button -->

 				<button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal">
 					<i class="fa fa-plus"></i> Insert Data</button>
 				<a href="index.php?page=menu&stok=yes" style="margin-right :0.5pc ;" class="btn btn-warning btn-md pull-right">
 					<i class="fa fa-list"></i> Sortir Stok Kurang</a>
 				<a href="index.php?page=menu" style="margin-right :0.5pc;" class="btn btn-success btn-md pull-right">
 					<i class="fa fa-refresh"></i> Refresh Data</a>
 				<div class="clearfix"></div>
 				<br />

 				<!-- view menu -->
 				<div class="modal-view">
 					<table class="table table-bordered table-striped" id="example1">
 						<thead>
 							<tr style="background:#DFF0D8;color:#333;">
 								<th>No.</th>
 								<th>ID menu</th>
 								<th>Nama menu</th>
 								<th>Stok</th>
 								<th>Harga Jual</th>
 								<th>Aksi</th>
 							</tr>
 						</thead>
 						<tbody>

 							<?php
								$totalJual = 0;
								$totalStok = 0;
								if ($_GET['stok'] == 'yes') {
									$hasil = $lihat->menu_stok();
								} else {
									$hasil = $lihat->menu();
								}
								$no = 1;
								foreach ($hasil as $isi) {
								?>
 								<tr>
 									<td><?php echo $no; ?></td>
 									<td><?php echo $isi['id_menu']; ?></td>
 									<td><?php echo $isi['nama_menu']; ?></td>
 									<td>
 										<?php if ($isi['stok'] == '0') { ?>
 											<button class="btn btn-danger"> Habis</button>
 										<?php } else { ?>
 											<?php echo $isi['stok']; ?>
 										<?php } ?>
 									</td>
 									<td>Rp.<?php echo number_format($isi['harga_jual']); ?>,-</td>
 									<td>
 										<?php if ($isi['stok'] <=  '3') { ?>
 											<form method="POST" action="fungsi/edit/edit.php?stok=edit">
 												<input type="text" name="restok" class="form-control">
 												<input type="hidden" name="id" value="<?php echo $isi['id_menu']; ?>" class="form-control">
 												<button class="btn btn-primary btn-sm">
 													Restok
 												</button>
 												<a href="fungsi/hapus/hapus.php?menu=hapus&id=<?php echo $isi['id_menu']; ?>" onclick="javascript:return confirm('Hapus Data menu ?');">
 													<button class="btn btn-danger btn-sm">Hapus</button></a>
 											</form>
 										<?php } else { ?>
 											<a href="index.php?page=menu/details&menu=<?php echo $isi['id_menu']; ?>"><button class="btn btn-primary btn-xs">Details</button></a>

 											<a href="index.php?page=menu/edit&menu=<?php echo $isi['id_menu']; ?>"><button class="btn btn-warning btn-xs">Edit</button></a>
 											<a href="fungsi/hapus/hapus.php?menu=hapus&id=<?php echo $isi['id_menu']; ?>" onclick="javascript:return confirm('Hapus Data menu ?');"><button class="btn btn-danger btn-xs">Hapus</button></a>
 										<?php } ?>


 								</tr>
 							<?php
									$no++;
									$totalJual += $isi['harga_jual'] * $isi['stok'];
									$totalStok += $isi['stok'];
								}
								?>
 						</tbody>
 						<tfoot>
 							<tr>
 								<th colspan="3">Total </td>
 								<th><?php echo $totalStok; ?></td>
 								<th>Rp.<?php echo number_format($totalJual); ?>,-</td>
 								<th colspan="2" style="background:#ddd"></th>
 							</tr>
 						</tfoot>
 					</table>
 				</div>
 				<div class="clearfix" style="margin-top:7pc;"></div>
 				<!-- end view menu -->
 				<!-- tambah menu MODALS-->
 				<!-- Modal -->

 				<div id="myModal" class="modal fade" role="dialog">
 					<div class="modal-dialog">
 						<!-- Modal content-->
 						<div class="modal-content" style=" border-radius:0px;">
 							<div class="modal-header" style="background:#285c64;color:#fff;">
 								<button type="button" class="close" data-dismiss="modal">&times;</button>
 								<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah menu</h4>
 							</div>
 							<form action="fungsi/tambah/tambah.php?menu=tambah" method="POST">
 								<div class="modal-body">

 									<table class="table table-striped bordered">

 										<?php
											$format = $lihat->menu_id();
											?>
 										<tr>
 											<td>ID menu</td>
 											<td><input type="text" readonly="readonly" required value="<?php echo $format; ?>" class="form-control" name="id"></td>
 										</tr>
 										<tr>
 											<td>Nama menu</td>
 											<td><input type="text" placeholder="Nama menu" required class="form-control" name="nama"></td>
 										</tr>
 										<tr>
 											<td>Deskripsi menu</td>
 											<td><input type="text" placeholder="Deskripsi menu" required class="form-control" name="deskripsi"></td>
 										</tr>
 										<tr>
 											<td>Harga Jual</td>
 											<td><input type="number" placeholder="Harga Jual" required class="form-control" name="jual"></td>
 										</tr>
 										<tr>
 											<td>Stok</td>
 											<td><input type="number" required Placeholder="Stok" class="form-control" name="stok"></td>
 										</tr>
 										<tr>
 											<td>Tanggal Input</td>
 											<td><input type="" required readonly="readonly" class="form-control" value="<?php echo  date("Y-m-d"); ?>" name="tgl_input"></td>
 										</tr>
 									</table>
 								</div>
 								<div class="modal-footer">
 									<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button>
 									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 								</div>
 							</form>
 						</div>
 					</div>

 				</div>
 			</div>
 	</section>
 </section>