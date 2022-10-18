 <!--sidebar end-->

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
 <!--main content start-->
 <section id="main-content">
 	<section class="wrapper">

 		<div class="row">
 			<div class="col-lg-12 main-chart">
 				<h3>Beban Beban</h3>
 				<br />
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
					$db_host = 'localhost'; // Nama Server
					$db_user = 'root'; // User Server
					$db_pass = ''; // Password Server
					$db_name = 'db_toko'; // Nama Database

					$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
					if (!$conn) {
						die('Gagal terhubung MySQL: ' . mysqli_connect_error());
					} ?>


 				<!-- Trigger the modal with a button -->

 				<button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal">
 					<i class="fa fa-plus"></i> Insert Data</button>
 				<a href="index.php?page=beban" style="margin-right :0.5pc;" class="btn btn-success btn-md pull-right">
 					<i class="fa fa-refresh"></i> Refresh Data</a>
 				<a href="print2.php?nm_user=<?php echo $_SESSION['admin']['user']; ?>
							" target="_blank">
 					<button class="btn btn-default">
 						<i class="fa fa-print"></i> Cetak
 					</button></a>
 				<div class="clearfix"></div>
 				<br />

 				<!-- view Beban -->
 				<div class="modal-view">
 					<table class="table table-bordered table-striped" id="example1">
 						<thead>
 							<tr style="background:#DFF0D8;color:#333;">
 								<th>No</th>
 								<th>ID Beban</th>
 								<th>Nama Beban</th>
 								<th>Biaya</th>
 								<th>Tanggal</th>
 								<th>Keterangan</th>
 								<th>Aksi</th>
 							</tr>
 						</thead>
 						<tbody>

 							<?php
								$hasil = $lihat->beban();
								$no = 1;
								foreach ($hasil as $row) {
								?>
 								<tr>
 									<td><?php echo $no; ?></td>
 									<td><?php echo $row['id_beban']; ?></td>
 									<td><?php echo $row['nama_beban']; ?></td>
 									<td>Rp.<?php echo number_format($row['biaya']); ?>,-</td>
 									<td><?php echo $row['tanggal']; ?></td>
 									<td><?php echo $row['keterangan']; ?></td>
 									<td>
 										<a href="index.php?page=beban/edit&beban=<?php echo $row['id_beban']; ?>"><button class="btn btn-warning btn-xs">Edit</button></a>
 										<a href="fungsi/hapus/hapus.php?beban=hapus&id=<?php echo $row['id_beban']; ?>" onclick="javascript:return confirm('Hapus Data Beban ?');"><button class="btn btn-danger btn-xs">Hapus</button></a>


 								</tr>
 							<?php
									$no++;
									$totalBeban += $row['biaya'];
								}
								?>
 						</tbody>

 						<tfoot>
 							<tr>
 								<th colspan="3">Total </td>
 								<th>Rp.<?php echo number_format($totalBeban); ?>,-</td>
 								<th colspan="3" style="background:#ddd"></th>
 							</tr>
 						</tfoot>
 					</table>
 				</div>
 				<div class="clearfix" style="margin-top:7pc;"></div>
 				<!-- end view Beban -->
 				<!-- tambah Beban MODALS-->
 				<!-- Modal -->

 				<div id="myModal" class="modal fade" role="dialog">
 					<div class="modal-dialog">
 						<!-- Modal content-->
 						<div class="modal-content" style=" border-radius:0px;">
 							<div class="modal-header" style="background:#285c64;color:#fff;">
 								<button type="button" class="close" data-dismiss="modal">&times;</button>
 								<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Beban</h4>
 							</div>
 							<form action="fungsi/tambah/tambah.php?beban=tambah" method="POST">
 								<div class="modal-body">

 									<table class="table table-striped bordered">

 										<?php
											$format = $lihat->beban_id();
											?>
 										<tr>
 											<td>ID User</td>
 											<td><input type="text" required value="<?php echo $format; ?>" class="form-control" name="id"></td>
 										</tr>
 										<tr>
 											<td>Nama Beban</td>
 											<td><input type="text" placeholder="Nama Beban" required class="form-control" name="nama_beban"></td>
 										</tr>
 										<tr>
 											<td>Biaya</td>
 											<td><input type="text" placeholder="Biaya" required class="form-control" name="biaya"></td>
 										</tr>
										 <tr>
 											<td>Tanggal</td>
 											<td><input type="date" placeholder="Tanggal" required class="form-control" name="tanggal"></td>
 										</tr>
										 <tr>
 											<td>Keterangan</td>
 											<td><input type="text" placeholder="Keterangan" required class="form-control" name="keterangan"></td>
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